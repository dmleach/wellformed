<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wordpress\themes;

/**
 * The theme features class performs a series of settings and registrations
 * common to all themes. Based on the guide at:
 *
 * @link https://codex.wordpress.org/Theme_Features
 */
class ThemeFeatures {

    /**
     * Adds a configurable custom background to the theme
     *
     * @param array $OverrideValues An array of values that will be passed to
     *        the theme support function. Values in this array will overwrite
     *        any values in the default array that have the same index
     *
     * @return void
     */
    public function addCustomBackground($OverrideValues = array ())
    {
        $DefaultValues = array (
            "admin-head-callback"    => "",
            "admin-preview-callback" => "",
            "default-attachment"     => "",
            "default-color"          => "",
        	"default-image"          => "",
            "default-position-x"     => "",
        	"default-repeat"         => "",
        	"wp-head-callback"       => "_custom_background_cb"
        );

        add_theme_support (
            "custom-background",
            array_merge($DefaultValues, $OverrideValues)
        );
    }

    /**
     * Adds a configurable custom header to the theme
     *
     * @param array $OverrideValues An array of values that will be passed to
     *        the theme support function. Values in this array will overwrite
     *        any values in the default array that have the same index
     *
     * @return void
     */
    public function addCustomHeader($OverrideValues = array ())
    {
        $DefaultValues = array (
            "admin-head-callback"    => "",
            "admin-preview-callback" => "",
            "default-image"          => "",
            "default-text-color"     => "",
            "flex-height"            => false,
            "flex-width"             => false,
            "header-text"            => true,
            "height"                 => null,
            "random-default"         => false,
            "uploads"                => true,
            "width"                  => null,
            "wp-head-callback"       => ""
        );

        add_theme_support(
            "custom-header",
            array_merge($DefaultValues, $OverrideValues)
        );
    }

    /**
     * Add RSS feeds to the site
     *
     * @return void
     */
    public function addFeedLinks()
    {
    	add_theme_support("automatic-feed-links");
    }

    /**
     * Enable post thumbnails for the theme
     *
     * @param integer $Width Standard width of a post thumbnail image
     * @param integer $Height Standard height of a post thumbnail image
     *
     * @return void
     */
    public function addPostThumbnails($Width, $Height)
    {
        add_theme_support("post-thumbnails");
        set_post_thumbnail_size($Width, $Height);
    }

    /**
     * Register the theme's menus, allowing customization of the menu via the
     * admin panel
     *
     * @param array $MenuInfo An associative array of menu names indexed by
     *        location slug values (e.g. array ("main-menu" => "Main menu"))
     *
     * @return void
     */
    public function registerMenus($MenuInfo)
    {
        register_nav_menus($MenuInfo);
    }

    /**
     * Set the theme's width
     *
     * @param integer $Width The theme's maximum width, in pixels
     *
     * @return void
     */
    public function setContentWidth($Width)
    {
        if (isset($content_width) == false) {
            $content_width = $Width;
        }
    }
}
