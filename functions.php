<?php

namespace dmleach\wellformed;

/* Register the theme's menus, allowing customization of the menu via the admin
   panel.  */
function registerMenus()
{
    register_nav_menus(array (
        "main-menu" => "Main menu"
    ));
}

/* Register these functions to run during initialization */
add_action("init", "\\dmleach\\wellformed\\registerMenus");
