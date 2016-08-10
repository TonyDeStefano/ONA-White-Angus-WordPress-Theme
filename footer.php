<?php

/** @var \OnaWhiteAngus\Controller $ona_controller */
global $ona_controller;

?>

</div>

<div id="call-to-action" class="row">
	<div class="col-sm-8 col-left">
		Call to Action
	</div>
	<div class="col-sm-4 col-right">
		<a href="">Register Now</a>
	</div>
</div>

<div id="ona-footer" class="row">
	<div class="col-sm-4 hidden-xs">
		<img src="<?php bloginfo('template_directory'); ?>/img/ona-white-angus-logo.png">
	</div>
	<div class="col-sm-4">
		<h3>Contact Us</h3>
		<p>
			(509) 123-4567<br>
			12345 Main Street<br>
			Spokane, WA 99999
		</p>
	</div>
	<div class="col-sm-4">
		<h3>Follow Us</h3>
		<p>
			<i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
			<i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
			<i class="fa fa-instagram fa-fw" aria-hidden="true"></i>
			<i class="fa fa-youtube fa-fw" aria-hidden="true"></i>
		</p>
	</div>
</div>

<nav class="navbar navbar-inverse navbar-ona navbar-white hidden-xs">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-4" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar-4" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php foreach ( $ona_controller->get_menu_items( \OnaWhiteAngus\Controller::MENU_SECONDARY ) AS $menu_item ) { ?>
					<li>
						<a href="<?php echo $menu_item->url; ?>">
							<?php echo $menu_item->title; ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div id="ona-copyright">
	&copy; 2016 ONA WHITE ANGUS REGISTRY
</div>

<div id="ona-cows"></div>


<?php wp_footer(); ?>

</body>
</html>