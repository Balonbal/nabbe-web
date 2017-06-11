<?php
include_once realpath(dirname(__FILE__)) . "/../../vendor/autoload.php";
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once LIBRARY_PATH . "/userManager.php";

function valid_username($username) {
    return preg_match("/^\w{1,16}$/", $username) != false;
}

if (isset($_GET["username"])) {
   if (!valid_username($_GET["username"])) {
        header("HTTP/1.0 400 Invalid username");
    } else if (!username_available($_GET["username"])) {
        header("HTTP/1.0 400 Username taken");
    } else {
       header("HTTP/1.0 200 OK");
   }
}