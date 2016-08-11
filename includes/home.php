<div class="row ona-home-columns">
	<div class="col-sm-4">

		<p align="center">
			<i class="fa fa-sun-o" aria-hidden="true"></i>
		</p>
		<h2>A Cattle breed that can<br>handle warm climates</h2>
		<p>Content</p>
		<p align="center">
			<a class="btn btn-default btn-ona-yellow">About OWA</a>
		</p>

	</div>
	<div class="col-sm-4">

		<p align="center">
			<i class="fa fa-pagelines" aria-hidden="true"></i>
		</p>
		<h2>ONA White Angus Straws at<br>our marketplace</h2>
		<p>Content</p>
		<p align="center">
			<a class="btn btn-default btn-ona-yellow">Marketplace</a>
		</p>

	</div>
	<div class="col-sm-4">

		<p align="center">
			<i class="fa fa-book" aria-hidden="true"></i>
		</p>
		<h2>Register your cattle on our website today</h2>
		<p>Content</p>
		<p align="center">
			<a class="btn btn-default btn-ona-yellow">Register</a>
		</p>

	</div>
</div>

<?php if ( \OnaWhiteAngus\HoverCow::getHoverCowCount() > 0 ) { ?>

	<div class="row ona-home-cow hidden-xs">
		<div class="col-md-12">
			<h2>
				Why the ONA White Angus has the advantage in warm climates<br>
				<small>
					Hover over each circle below to find out
				</small>
			</h2>
		</div>
	</div>

	<div class="row hidden-xs">
		<div class="col-md-2"></div>
		<div class="col-md-4">
			<div id="ona-silhouette">
				<img src="<?php bloginfo('template_directory'); ?>/img/silhouette.png">
				<?php for ( $x = 1; $x <= 12; $x++ ) { ?>
					<?php $hover_cow = new \OnaWhiteAngus\HoverCow( $x ); ?>
					<?php if ( $hover_cow->hasData() ) { ?>
						<div
							class="ona-silhouette-over ona-silhouette-over-<?php echo $x; ?>"
							data-id="<?php echo $x; ?>"
							data-title="<?php echo esc_html( $hover_cow->getTitle() ); ?>"
							data-content="<?php echo esc_html( $hover_cow->getContent() ); ?>"></div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="ona-silhouette-text">
				<h2></h2>
				<p></p>
			</div>
		</div>
	</div>

<?php } ?>