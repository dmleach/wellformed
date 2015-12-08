<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Controller class for the site's post pages, called Singles in the template
* architecture
*/
class Single extends Template
{
    protected function getTemplateFilename()
    {
        return 'Single.twig';
    }

    public function setValues()
    {
        parent::setValues();

        $postsModel = new \dmleach\wellformed\models\Posts();

        $this->mergeValues(array (
            'posts' => $postsModel->getPostsFromLoop(1),
        ));
    }
}
