<?php
require_once dirname(realpath(__FILE__)) . "/../vendor/autoload.php";
require_once dirname(realpath(__FILE__)) . "/config/configuration.php";

function open_database() {
    $nabbe = get_config();
    $mysqli = new mysqli(
        $nabbe->db->host,
        $nabbe->db->username,
        $nabbe->db->password,
        $nabbe->db->database
    );

    if ($mysqli->errno) {
        echo "MYSQL Error: " . $mysqli->connect_error;
        return false;
    }

    return $mysqli;
}

function get_user_uuid($user_id) {
    if ($mysqli = open_database()) {
        if ($statement = $mysqli->prepare("SELECT uuid FROM USERS WHERE id=?")) {
            $statement->bind_param("i", $user_id);
            $statement->execute();
            $statement->bind_result($uuid);
            if ($statement->fetch()) {
                $result = $uuid;
            } else {
                $result = false;
            }

            $statement->close();
            $mysqli->close();
            return $result;
        }
    }
}

function get_user_id($login_type, $user_id) {
    if ($mysqli = open_database()) {
        if ($statement = $mysqli->prepare("SELECT user_id FROM USER_IDS WHERE id_type=? AND service_id=?")) {
            //User id has to be a string as google subs are greater than MAX_INT
            $statement->bind_param("ss", $login_type, $user_id);
            $statement->execute();
            $statement->bind_result($id);
            if ($statement->fetch()) {
                $statement->close();
                $mysqli->close();
                return $id;
            }
            $statement->close();
            $mysqli->close();
            //No user found
            return false;
        }
    }
    throw Exception("MYSQL error");
}