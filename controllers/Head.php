<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Controller for the common header that appears on all pages
*/
class Head extends Base
{
    protected function getAdditionalStylesheets()
    {
        return array (
            get_stylesheet_directory_uri() . DIRECTORY_SEPARATOR . 'soundscape.css',
            'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900',
            get_stylesheet_directory_uri() . DIRECTORY_SEPARATOR . 'fonts.css',
        );
    }

    protected function getTemplateFilename()
    {
        return 'Head.twig';
    }

    public function getValues()
    {
        return array (
            'html' => array (
                'charset' => get_bloginfo('charset', 'raw'),
                'description' => get_bloginfo('description', 'raw'),
                'keywords' => null,
                'lang' => get_language_attributes(),
                'stylesheets' => $this->getStylesheets(),
            )
        );
    }
}
