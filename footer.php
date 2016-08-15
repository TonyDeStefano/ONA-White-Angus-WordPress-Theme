<?php

/** @var \OnaWhiteAngus\Controller $ona_controller */
global $ona_controller;

?>

</div>

<div id="call-to-action" class="row">
	<div class="col-sm-8 col-left">
		<?php echo $ona_controller->getCallToAction(); ?>
	</div>
	<div class="col-sm-4 col-right">
		<?php if ( strlen( $ona_controller->getRegisterLink() ) > 0 ) { ?>
			<a href="<?php echo $ona_controller->getRegisterLink(); ?>">Register Now</a>
		<?php } ?>
	</div>
</div>

<div id="ona-footer" class="row">
	<div class="col-sm-4 hidden-xs">
		<img src="<?php bloginfo('template_directory'); ?>/img/ona-white-angus-logo.png">
	</div>
	<div class="col-sm-4">
		<h3>Contact Us</h3>
		<p>
			<?php if ( strlen( $ona_controller->getPhoneNumber() ) > 0 ) { ?>
				<?php echo $ona_controller->getPhoneNumber(); ?><br>
			<?php } ?>
			<?php echo $ona_controller->getAddress(); ?>
		</p>
	</div>
	<div class="col-sm-4">
		<?php if ( $ona_controller->hasSocialLinks() ) { ?>
			<h3>Follow Us</h3>
			<p>
				<?php if ( strlen( $ona_controller->getFacebookLink() ) > 0 ) { ?>
					<a href="<?php echo $ona_controller->getFacebookLink(); ?>" target="_blank">
						<i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $ona_controller->getTwitterLink() ) > 0 ) { ?>
					<a href="<?php echo $ona_controller->getTwitterLink(); ?>" target="_blank">
						<i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $ona_controller->getInstagramLink() ) > 0 ) { ?>
					<a href="<?php echo $ona_controller->getInstagramLink(); ?>" target="_blank">
						<i class="fa fa-instagram fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
				<?php if ( strlen( $ona_controller->getYouTubeLink() ) > 0 ) { ?>
					<a href="<?php echo $ona_controller->getYouTubeLink(); ?>" target="_blank">
						<i class="fa fa-youtube fa-fw" aria-hidden="true"></i>
					</a>
				<?php } ?>
			</p>
		<?php } ?>
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
					<li<?php if ( $menu_item->hasChildren() ) { ?> class="dropdown" <?php } ?>>
						<a href="<?php echo $menu_item->getUrl(); ?>"<?php if ( $menu_item->hasChildren() ) { ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"<?php } ?>>
							<?php echo $menu_item->getTitle(); ?>
							<?php if ( $menu_item->hasChildren() ) { ?>
								<span class="caret"></span>
							<?php } ?>
						</a>
						<?php if ( $menu_item->hasChildren() ) { ?>
							<ul class="dropdown-menu">
								<?php foreach ( $menu_item->getChildren() as $child ) { ?>
									<li>
										<a href="<?php echo $child->getUrl(); ?>">
											<?php echo $child->getTitle(); ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
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