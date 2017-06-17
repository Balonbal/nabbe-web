<?php
$jwt = $_SERVER["HTTP_AUTHORIZATION"];
$jwt = substr($jwt, strlen("Bearer "));
require_once dirname(realpath(__FILE__)) . "/../../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/../../library/config/configuration.php";
require_once LIBRARY_PATH . "/userManager.php";
require_once LIBRARY_PATH . "/jwtManager.php";

try {
    if (!($jwt = decode_JWT($jwt))) {
        header("HTTP/1.0 401 Unauthorized");
        die();
    }

    if (isset($_REQUEST["change"])) {
        if ($_REQUEST["change"] == "username") {
            if (isset($_REQUEST["username"]) && !empty($_REQUEST["username"])) {
                $new_name = $_REQUEST["username"];
                if (valid_username($new_name)) {
                    $uuid = $jwt->sub;
                    try {
                        change_username($new_name, $uuid);
                        print(json_encode(["new_username" => $new_name]));
                    } catch (Exception $e) {
                        print($e);
                        header("HTTP/1.0 500 Internal Server Error");
                    }
                } else {
                    header("HTTP/1.0 400 Bad Request");
                    print(json_encode(["error" => "invalid username"]));
                }
            }else {
                header("HTTP/1.0 Bad Request");
                print(json_encode(["error" => "Username can not be empty"]));
            }
        } else {
            header("HTTP/1.0 501 Not implemented");
            print(json_encode(["error" => "Request type does not exist"]));
        }
    } else {
        //Not implemented
        header("HTTP/1.0 501 Not implemented");
        print(json_encode(["error" => "Request type does not exist"]));
    }
} catch (UnexpectedValueException $e) {
    header("HTTP/1.0 401 Unauthorized");
    print(json_encode(["error" => "Please log in first"]));
}

