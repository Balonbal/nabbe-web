<?php
$jwt = $_SERVER["HTTP_AUTHORIZATION"];
$jwt = substr($jwt, strlen("Bearer "));
require_once LIBRARY_PATH . "/userManager.php";
require_once LIBRARY_PATH . "/jwtManager.php";

if (!($jwt = decode_JWT($jwt))) {
    header("HTTP/1.0 401 Unauthorized");
    print(json_encode(["error" => "Please log in first"]));
    return;
}

if (!isset($_REQUEST["type"]) || empty($_REQUEST["type"])) {
    header("HTTP/1.0 501 Not Implemented");
    print(json_encode(["error" => "Request type does not exist"]));
    return;
}

switch ($_REQUEST["type"]) {
    case "edit":
        if (!($changes = json_decode(file_get_contents("php://input")))) {
            header("HTTP/1.0 400 Bad Request");
            print(json_encode(["error" => "Body must contain valid json"]));
            return;
        }
        $result = [];

        foreach ($changes as $prop => $val) {
            if (!is_string($prop) || !is_string($val)) {
                header("HTTP/1.0 400 Bad Request");
                print(json_encode(["error" => "Bad request format"]));
                return;
            }

            switch ($prop) {
                case "username":
                    if (!valid_username($val)) {
                        header("HTTP/1.0 400 Bad Request");
                        print(json_encode(["error" => "Invalid username"]));
                        return;
                    }

                    try {
                        change_username($val, $jwt->sub);
                        $result["new_username"] = $val;
                    } catch (Exception $e) {
                        header("HTTP/1.0 500 Internal Server Error");
                        print(json_encode(["error" => $e->getMessage()]));
                        return;
                    }

                    break;
                default:
                    header("HTTP/1.0 400 Bad Request");
                    print(json_encode(["error" => $prop . " is not a valid field"]));
                    return;
            }
        }

        print(json_encode($result));
        return;
    default:
        header("HTTP/1.0 501 Not Implemented");
        print(json_encode(["error" => "Request type does not exist"]));
        return;
}