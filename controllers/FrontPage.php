<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Controller class for the site's homepage
*/
class FrontPage extends Template
{
    protected function getTemplateFilename()
    {
        return 'FrontPage.twig';
    }

    public function setValues()
    {
        parent::setValues();

        $header = get_custom_header();
        $postsModel = new \dmleach\wellformed\models\Posts();

        $this->mergeValues(array (
            'articles' => array (
                'sample-page' => $postsModel->getPageBySlug('about-soundscape'),
            ),
            'images' => array (
                'banner' => array (
                    'filepath' => $header->url,
                ),
            ),
            'links' => $postsModel->getRecent(3, 'episodes,jams'),
        ));
    }
}
