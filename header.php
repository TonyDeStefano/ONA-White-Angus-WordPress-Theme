<?php

/** @var \OnaWhiteAngus\Controller $ona_controller */
global $ona_controller;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge" /><![endif]-->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-inverse navbar-ona navbar-gray visible-xs">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-3" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-3" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php foreach ( $ona_controller->get_menu_items( \OnaWhiteAngus\Controller::MENU_MAIN ) AS $menu_item ) { ?>
					<li>
						<a href="<?php echo $menu_item->url; ?>">
							<?php echo $menu_item->title; ?>
						</a>
					</li>
				<?php } ?>
				<?php foreach ( $ona_controller->get_menu_items( \OnaWhiteAngus\Controller::MENU_SECONDARY ) AS $menu_item ) { ?>
					<li>
						<a href="<?php echo $menu_item->url; ?>">
							<?php var_dump($menu_item->title); ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<nav class="navbar navbar-inverse navbar-ona navbar-yellow hidden-xs">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-1" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php foreach ( $ona_controller->get_menu_items( \OnaWhiteAngus\Controller::MENU_MAIN ) AS $menu_item ) { ?>
					<li>
						<a href="<?php echo $menu_item->url; ?>">
							<?php echo $menu_item->title; ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<nav class="navbar navbar-inverse navbar-ona navbar-gray hidden-xs">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-2" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-2" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php foreach ( $ona_controller->get_menu_items( \OnaWhiteAngus\Controller::MENU_SECONDARY ) AS $menu_item ) { ?>
					<li>
						<a href="<?php echo $menu_item->url; ?>">
							<?php echo $menu_item->title; ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<div id="cow-banner">
	<div class="yellow-arrow-down">
		<i class="fa fa-chevron-down" aria-hidden="true"></i>
	</div>
	<img src="<?php bloginfo('template_directory'); ?>/img/cow-banner.jpg" class="img">
	<div id="ona-logo">
		<a href="/">
			<img src="<?php bloginfo('template_directory'); ?>/img/ona-white-angus-top-logo.png">
		</a>
	</div>
</div>

<div id="ona-logo-mobile">
	<a href="/">
		<img src="<?php bloginfo('template_directory'); ?>/img/ona-white-angus-top-logo.png">
	</a>
</div>

<div class="ona-content">