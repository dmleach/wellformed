<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : WellFormed
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130731
-->

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
		<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" /><link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="logo" class="container">
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
			<p><?php bloginfo('description') ?></p>
		</div>
		<div id="menu" class="container">
			<?php
				/* Place the main menu here. Code in functions.php works with
				   this call to allow customization of the menu via the admin
				   panel */
				wp_nav_menu(array ("theme_location" => "main-menu"));
			?>
		</div>
