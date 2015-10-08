<?php

namespace dmleach\wellformed;

require_once("themefeatures.php");

$Features = new \dmleach\wordpress\themes\ThemeFeatures();
$Features->addCustomBackground(array (
    "default-image" => get_bloginfo('template_directory') . "/assets/images/bg01.png"
));
$Features->addFeedLinks();
$Features->registerMenus(array ("main-menu" => "Main menu"));
$Features->setContentWidth(1200);
