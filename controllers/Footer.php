<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Footer is the controller for all items that appear in the page footer, such
* as the rights information
*/
class Footer extends Base
{
    protected function getTemplateFilename()
    {
        return 'Footer.twig';
    }

    public function getValues()
    {
        return array (
            'rights' => array (
                'year' => date('Y'),
                'owner' => 'Woody and Suzi Harris',
                'terms' => 'All rights reserved'
            )
        );
    }
}
