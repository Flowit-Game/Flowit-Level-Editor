<?php

function begins_with($haystack, $needle) {
    return strpos($haystack, $needle) === 0;
}

function contains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
}

function resetLevel() {
    unset($_SESSION["level_data"]);
    $_SESSION["solved"] = false;
}

function loadConfig() {
    $configStr = @file_get_contents("config.json");
    return json_decode($configStr);
}

define("ROTATING", true);
define("BOMBS", true);

define("TYPE_EMPTY", 0);
define("TYPE_FLOW", 1);
define("TYPE_LIMIT", 2);
define("TYPE_DISABLED", 3);
define("TYPE_BOMB", 4);

define("COLOR_EMPTY", -1);
define("COLOR_RED", 1);
define("COLOR_GREEN", 2);
define("COLOR_BLUE", 3);
define("COLOR_YELLOW", 4);
define("COLOR_BLACK", 5);

define("COLOR_MAPPING", array(
    COLOR_EMPTY => "",
    COLOR_RED => "red",
    COLOR_GREEN => "green",
    COLOR_BLUE => "blue",
    COLOR_YELLOW => "yellow",
    COLOR_BLACK => "black",
));
