<?php

namespace dmleach\wellformed;

function activateAutoloaders()
{
    /* Instantiate the template's autoloader */
    require_once('controllers' . DIRECTORY_SEPARATOR . 'Autoload.php');
    $Autoloader = new controllers\Autoload(__NAMESPACE__, __DIR__);

    /* Instantiate Composer's autoloader */
    require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
}

function activateTwig()
{
    /* Create the file loader */
    $twigLoader = new \Twig_Loader_Filesystem(
        __DIR__ . DIRECTORY_SEPARATOR . 'views'
    );

    /* Create the environment */
    $twigEnvironment = new \Twig_Environment($twigLoader);

    /* Add extensions to the environment */
    $allowedFunctions = array ('wp_head', 'wp_nav_menu');
    $extension = new \Umpirsky\Twig\Extension\PhpFunctionExtension(
        $allowedFunctions
    );
    $twigEnvironment->addExtension($extension);

    /* Return the environment object as the result of the function */
    return $twigEnvironment;
}

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

add_image_size('page-thumbnail', 300, 185, true);
