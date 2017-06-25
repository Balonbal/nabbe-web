<?php
if (!isset($_REQUEST["type"]) || empty($_REQUEST["type"])) {
    header("404 Not Found");
    print(json_encode(["error" => "Request type does not exist"]));
}

if (username_test($_REQUEST["type"], $_REQUEST)) {
    print(json_encode(["status" => "Success"]));
}

function username_test($type, $req) {
    if (!isset($req["username"])) {
        header("400 Bad Request");
        print(json_encode(["error" => "Parameter username is required"]));
        return false;
    }
    switch ($type) {
        case "valid":
            if (!valid_username($req["username"])) {
                header("400 Bad Request");
                print(json_encode(["error" => "Username format is invalid"]));
                return false;
            }
            return true;
        case "available":
            if (!username_available($req["username"])) {
                header("400 Bad Request");
                print(json_encode(["error" => "Username is taken"]));
                return false;
            }
            return true;
        case "both":
            return username_test("valid", $req) && username_test("available", $req);
        default:
            header("400 Bad Request");
            print(json_encode(["error" => "Request type not supported"]));
            return false;
    }
}