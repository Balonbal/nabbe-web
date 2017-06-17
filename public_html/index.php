<?php
session_start();
include_once realpath(dirname(__FILE__)) . "/../library/config/configuration.php";

$page = "index"; //Default

if (isset($_REQUEST["page"])) {
    $page=$_REQUEST["page"];
}

$fullpath = PAGES_PATH . "/" . $page . ".php";
//Our special 404 page
if (!file_exists($fullpath)) $fullpath = PAGES_PATH . "/404page.php";

include_once TEMPLATES_PATH . "/header.php";
echo "<body>";
include_once TEMPLATES_PATH . "/navbar.php";

if (file_exists($fullpath)) {
    include_once $fullpath;
}
//Do something else? -- should give our 404 page

include_once TEMPLATES_PATH . "/footer.php"; ?>
</body>
</html>