<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once realpath(dirname(__FILE__)) . "/../../vendor/autoload.php";
include_once realpath(dirname(__FILE__)) . "/../../library/config/configuration.php";
include_once LIBRARY_PATH . "/userManager.php";
require_once LIBRARY_PATH . "/jwtManager.php";
$jwt = $_SERVER["HTTP_AUTHORIZATION"];
$jwt = substr($jwt, strlen("Bearer "));

if (isset($_GET["username"])) {
   if (!valid_username($_GET["username"])) {
        header("HTTP/1.0 400 Invalid username");
    } else if (!username_available($_GET["username"]) &&
       (!isset($_SESSION["nabbe-jwt"]) || strtoupper($_SESSION["nabbe-jwt"]) == strtoupper($_GET["username"]))) {
        header("HTTP/1.0 400 Username taken");
    } else {
       header("HTTP/1.0 200 OK");
   }
}