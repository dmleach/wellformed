<?php

namespace dmleach\wellformed;

require_once("themefeatures.php");

use \dmleach\wordpress\themes\ThemeFeatures;

ThemeFeatures::addAll( array (
    "contentwidth" => 1200,
    "customheader" => array ("width" => 1200, "height" => 500),
    "menus" => array ("main-menu" => "Main menu"),
    "postformats" => array ("audio"),
    "postthumbnails" => array ("width" => 300, "height" => 185),
    "thememarkup" => array ("caption", "comment-form", "comment-list",
        "gallery", "search-form")
));
