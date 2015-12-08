<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Header is the controller for all items that appear in the page header, such
* as the banner graphic and nav menu
*/
class Header extends Base
{
    protected function getTemplateFilename()
    {
        return 'Header.twig';
    }

    public function getValues()
    {
        return array (
            'site' => array (
                'description' => get_bloginfo('description'),
                'name' => get_bloginfo('name')
            ),
            'url' => array (
                'home' => home_url()
            )
        );
    }
}
