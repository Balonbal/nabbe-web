<?php
include_once LIBRARY_PATH . "/userManager.php";

if (!isset($_REQUEST["type"])) {
    header("HTTP/1.0 404 Not Found");
    print(json_encode(["error" => "Request type could not be found"]));
}

switch ($_REQUEST["type"]) {
    case "active_users":
        $date = new DateTime();
        $date->sub(new DateInterval("P1D"));
        if ($mysqli = open_database()) {
            if ($statement = $mysqli->prepare("SELECT COUNT(*) FROM VISISTS WHERE time > ?")) {
                $statement->bind_param("s", $date->format("Y-m-d H:i:s"));
                $statement->execute();
                $statement->bind_result($count);
                if (!$statement->fetch()) $count = 0;

                $statement->close();

                $statement = $mysqli->prepare("SELECT COUNT(*) FROM USERS");
                $statement->execute();
                $statement->bind_result($total);
                if (!$statement->fetch()) $total = 0;

                $statement->close();
                $mysqli->close();

                print(json_encode(["active_users" => $count, "total_users" => $total]));
                return;
            }
        }

        header("HTTP/1.0 500 Internal Server Error");
        print(json_encode(["error" => "Something went wrong"]));
        return;
    default:
        header("HTTP/1.0 404 Not Found");
        print(json_encode(["error" => "Request type could not be found"]));
}