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
            $mysqli->close();
            $statement->close();
            return $result;
        }
    }
    throw new Exception("MYSQL Error");
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
    throw new Exception("MYSQL error");
}

function createUser($service_type, $service_id, $username) {
    if ($mysqli = open_database()) {
        $user = $mysqli->prepare("INSERT INTO USERS (user_name, uuid) VALUES (?, ?)");
        $user->bind_param("ss", $username, $username);
        $user->execute();
        $user_id = $user->insert_id;
        $user->close();

        $id = $mysqli->prepare("INSERT INTO USER_IDS (user_id, id_type, service_id) VALUES (?, ?, ?)");
        $id->bind_param("iss", $user_id, $service_type, $service_id);
        $id->execute();
        $id->close();

        $mysqli->close();

        return $username;
    }

    throw new Exception("MYSQL Error");
}

function valid_username($username) {
    return preg_match("/^\w{1,16}$/", $username) != false;
}

function change_username($username, $uuid) {
    if ($mysqli = open_database()) {
        if ($statement = $mysqli->prepare("UPDATE USERS SET user_name=? WHERE uuid=?")) {
            $statement->bind_param("ss", $username, $uuid);
            $statement->execute();
            $statement->close();
            $mysqli->close();
            return true;
        }
    }

    throw new Exception("MYSQL error");
}

function username_available($username) {
    $result = false;
    if ($mysqli = open_database()) {
        if ($statement = $mysqli->prepare("SELECT id FROM USERS WHERE uuid=? LIMIT 1")) {
            $statement->bind_param("s", $username);
            $statement->execute();
            if (!$statement->fetch()) {
                $result = true;
            }
            $statement->close();
            $mysqli->close();
        }
    }

    return $result;
}

