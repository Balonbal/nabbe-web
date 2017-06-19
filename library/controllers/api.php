<?php
require_once dirname(realpath(__FILE__)) . "/../../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/../config/configuration.php";
$done = true; //Disable rendering

//Api responses are json
header("Content-Type: Application/json");

if (!isset($_REQUEST["action"]) || empty($_REQUEST["action"]) || strpos($_REQUEST["action"], "/") !== false) {
    header("HTTP/1.0 400 Bad Request");
    print(json_encode(["error" => "Request type must be specified"]));
    return;
}

if (file_exists(API_PATH . "/" . $_REQUEST["action"]) . ".php") {
    //script exists, let it do it's thing
    include_once API_PATH . "/" . $_REQUEST["action"] . ".php";
} else {
    header("HTTP/1.0 501 Not Implemented");
    print(json_encode(["error" => "Request type does not exist"]));
}
