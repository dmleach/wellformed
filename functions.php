<?php

namespace dmleach\wellformed;

require_once("themefeatures.php");

use \dmleach\wordpress\themes\ThemeFeatures;

ThemeFeatures::addCustomBackground();
ThemeFeatures::addCustomHeader(array (
    "height" => 500,
    "width" => 1200
));
ThemeFeatures::addFeedLinks();
ThemeFeatures::addPostFormats(array ("audio"));
ThemeFeatures::addPostThumbnails(300, 185);
ThemeFeatures::addTitleTag();
ThemeFeatures::registerMenus(array ("main-menu" => "Main menu"));
ThemeFeatures::setContentWidth(1200);
