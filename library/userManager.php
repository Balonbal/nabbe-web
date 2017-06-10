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

function get_user($login_type, $user_id) {
    //$user_id = (int) $user_id;
    print "Searching for user " . $user_id;
    if ($mysqli = open_database()) {
        $login_type = $mysqli->real_escape_string($login_type);
        print "\n$login_type";
        if ($statement = $mysqli->prepare("SELECT * FROM USER_IDS WHERE id_type='GOOGLE' AND service_id=?")) {
            $statement->bind_param("s", $user_id);
            $statement->execute();
            $statement->bind_result($id, $a, $b, $c);
            print "$a\n";
            while ($statement->fetch()) {
                var_dump($id);
                $statement->close();
                $mysqli->close();
                return $id;
            }
            print "$id\n";
            print($statement->error);
            $statement->close();
            $mysqli->close();
            return false;
        }
        print "NOPE";
    }
    throw Exception("MYSQL error");
}