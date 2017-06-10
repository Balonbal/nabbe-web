<?php
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__)) . "/..");

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", LIBRARY_PATH . "/templates");

function get_config($name = "nabbe") {
    $name = substr($name, -4) === "json" ? $name : $name . ".json";
    return json_decode(file_get_contents(LIBRARY_PATH . "/config/" . $name));
}