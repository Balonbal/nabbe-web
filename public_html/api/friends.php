<?php
include_once realpath(dirname(__FILE__)) . "/../../vendor/autoload.php";
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once LIBRARY_PATH . "/userManager.php";
include_once LIBRARY_PATH . "/jwtManager.php";
header("Content-Type: application/json");
$jwt = $_SERVER["HTTP_AUTHORIZATION"];
$jwt = substr($jwt, strlen("Bearer "));

//Only authorized users have friends
//Uhh, well, nabbe-friends anyway
$jwt = verify_user($jwt);

if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case "list":
            //TODO, example response follows
            print(json_encode([
                ["username" => "sly", "accepted" => true],
                ["username" => "aksei", "accepted" => true],
                ["username" => "hakun", "accepted" => false],
                ["username" => "ice_poseidon", "accepted" => true],
                ["username" => "me", "accepted" => false]
            ]));
            break;
        default:
            header("HTTP/1.0 501 Not Implemented");
            print(json_encode(["error" => "Request type does not exist"]));
    }
}