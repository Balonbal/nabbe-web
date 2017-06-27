<?php
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__)) . "/..");

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", LIBRARY_PATH . "/templates");

defined("PAGES_PATH")
    or define("PAGES_PATH", LIBRARY_PATH . "/pages");

defined("CONTROLLERS_PATH")
    or define("CONTROLLERS_PATH", LIBRARY_PATH . "/controllers");

defined("API_PATH")
    or define("API_PATH", LIBRARY_PATH . "/api");

function get_config($name = "nabbe") {
    $name = substr($name, -4) === "json" ? $name : $name . ".json";
    return json_decode(file_get_contents(LIBRARY_PATH . "/config/" . $name));
}