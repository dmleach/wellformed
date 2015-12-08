<?php

/**
 * @author Dave Leach <dave@daveleach.work>
 * @copyright 2015 Dave Leach
 */

namespace dmleach\wellformed\controllers;

/**
* PSR-4 autoload controller
*/
class Autoload
{
    private $baseDirectory;
    private $namespace;

    public function __construct($namespace, $baseDirectory = __DIR__)
    {
        $this->namespace = $namespace;
        $this->baseDirectory = $baseDirectory;
        spl_autoload_register(array ($this, 'load'));
    }

    public function load($className)
    {
        /* If the class isn't part of this autoloader's namespace, ignore it */
        if ($this->removePrefix($this->namespace, $className)) {
            /* Start with the base directory */
            $directory = $this->baseDirectory;

            do {
                /* Check for a backslash in the current class name */
                $backslashPos = strpos($className, '\\');

                if ($backslashPos !== false) {
                    /* If there is a backslash, consider what comes before it
                       as a subdirectory of the current directory */
                    $subdirectory = substr($className, 0, $backslashPos);

                    /* Add the subdirectory to the current path */
                    $directory .= DIRECTORY_SEPARATOR . $subdirectory;

                    /* Remove the subdirectory from the class name */
                    $this->removePrefix($subdirectory, $className);
                }
            }
            while ($backslashPos !== false);

            /* Require the calculated path to the class */
            require_once($directory . DIRECTORY_SEPARATOR . $className . '.php');
        }
    }

    protected function removePrefix($prefix, &$whole)
    {
        $noError = (strpos($whole, $prefix) === 0);

        if ($noError) {
            $whole = substr($whole, strlen($prefix) + 1);
        }

        return $noError;
    }
}
