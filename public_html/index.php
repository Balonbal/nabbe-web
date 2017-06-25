<?php
session_start();
include_once realpath(dirname(__FILE__)) . "/../library/config/configuration.php";
include_once LIBRARY_PATH . "/jwtManager.php";
include_once LIBRARY_PATH . "/userManager.php";

if (isset($_SERVER["HTTP_AUTHORIZATION"])) {
    $jwt = $_SERVER["HTTP_AUTHORIZATION"];
    $jwt = substr($jwt, strlen("Bearer "));
} elseif (isset($_SESSION["nabbe-jwt"])) {
    $jwt = $_SESSION["nabbe-jwt"];
}

$page = "index"; //Default

if (isset($_REQUEST["page"]) && !empty($_REQUEST["page"])) {
    $page=$_REQUEST["page"];
}

//Update visit table
if (isset($jwt)) {
    try {
        if (!$jwt = decode_JWT($jwt)) unset($jwt);
        else update_visit($jwt->sub, $page);
    } catch (Exception $e) {
        unset($jwt);
    }

}

//Fetch data
if (strpos($page, "/") === false && file_exists(CONTROLLERS_PATH . "/" . $page . ".php")) {
    include_once CONTROLLERS_PATH . "/" . $page . ".php";
}

//Page does not require more -- for example api pages
if (isset($done) && $done) die();

$fullpath = PAGES_PATH . "/" . $page . ".php";
//Our special 404 page
if (!file_exists($fullpath) || strpos($page, "/") !== false) $fullpath = PAGES_PATH . "/404page.php";

/* BUILD CONTENT */
include_once TEMPLATES_PATH . "/header.php";
echo "<body>";
include_once TEMPLATES_PATH . "/navbar.php";
if (file_exists($fullpath)) {
    include_once $fullpath;
}
//Do something else? -- should give our 404 page

include_once TEMPLATES_PATH . "/footer.php";
?>
</body>
</html>