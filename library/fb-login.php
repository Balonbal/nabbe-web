<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(realpath(__FILE__)) . "/../vendor/autoload.php";
$conf = json_decode(file_get_contents(dirname(realpath(__FILE__)) . "/config/fb.json"), true);

$fb = new \Facebook\Facebook($conf);

$helper = $fb->getRedirectLoginHelper();

$permissions = ["email"];
$loginUrl = $helper->getLoginUrl("http://nabbe.gabeorama.org/api/fb-callback.php", $permissions);
session_commit();

//print "<a class='btn btn-lg btn-block btn-social btn-facebook' href='" . htmlspecialchars($loginUrl) . "'><span class='fa fa-facebook'></span>Log in with facebook</a>";
//Print url
print htmlspecialchars($loginUrl);