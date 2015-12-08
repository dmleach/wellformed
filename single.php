<?php

namespace dmleach\wellformed;

/* All the WordPress entry scripts must activate the autoloaders */
activateAutoloaders();

/* Scripts that will produce output must activate Twig */
$twig = activateTwig();

/* Instantiate the header controller and echo it as a string */
echo new controllers\Single($twig);
