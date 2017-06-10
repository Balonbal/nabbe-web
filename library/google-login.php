<?php
session_start();
require_once dirname(realpath(__FILE__)) . "/../vendor/autoload.php";
$redirectUri = "http://" . $_SERVER["HTTP_HOST"] . "/api/google-callback.php";

$client = new Google_Client();
$client->setAuthConfig(LIBRARY_PATH . "/config/google.json");
$client->setRedirectUri($redirectUri);
$client->setScopes(["email"]);

print htmlspecialchars($client->createAuthUrl());
