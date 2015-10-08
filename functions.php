<?php

namespace dmleach\wellformed;

require_once("themefeatures.php");

$TemplateDirectory = get_template_directory_uri();

$Features = new \dmleach\wordpress\themes\ThemeFeatures();
$Features->addCustomBackground();
$Features->addCustomHeader(array (
    "height" => 500,
    "width" => 1200
));
$Features->addFeedLinks();
$Features->addPostThumbnails(300, 185);
$Features->registerMenus(array ("main-menu" => "Main menu"));
$Features->setContentWidth(1200);
