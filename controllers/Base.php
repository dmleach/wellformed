<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* Base is the lowest level of inheritance among the output controllers. Data
* and functions that would be common to any WordPress theme belong in this
* class
*/
abstract class Base
{
    protected $twig;
    private $twigValues = array ();

    public function __construct($twig)
    {
        $this->twig = $twig;
        $this->setValues();
    }

    public function __toString()
    {
        // echo "<pre>" . print_r($this->twigValues, true) . "</pre>";
        $template = $this->getTemplateFilename();
        return $this->twig->render($template, $this->twigValues);
    }

    protected function getAdditionalStylesheets()
    {
        return array ();
    }

    private function getBaseStylesheets()
    {
        return array (
            get_stylesheet_uri(),
        );
    }

    protected function getStylesheets()
    {
        return array_merge(
            $this->getBaseStylesheets(),
            $this->getAdditionalStylesheets()
        );
    }

    protected function getTemplateFilename()
    {
        return 'Base.twig';
    }

    public function getValues()
    {
        $values = $this->twigValues;
        return $values;
    }

    protected function mergeValues($values)
    {
        $this->twigValues = array_merge($this->twigValues, $values);
    }

    protected function setValues()
    {
        $this->mergeValues(array (
            'html' => array (
                'lang' => get_language_attributes(),
            )
        ));
    }
}
