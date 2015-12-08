<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Template is the ancestor for all pages within this theme. Elements that are
* common to every page of this site belong here
*/
class Template extends Base
{
    protected function getTemplateFilename()
    {
        return 'Template.twig';
    }

    public function setValues()
    {
        $head = new Head($this->twig);
        $this->mergeValues($head->getValues());

        $header = new Header($this->twig);
        $this->mergeValues($header->getValues());

        $footer = new Footer($this->twig);
        $this->mergeValues($footer->getValues());
    }
}
