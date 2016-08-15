<?php

/** @var \OnaWhiteAngus\Controller $this */
e
?>

<?php if ( $this->getAttribute( 'page' ) == 'directory' ) { ?>

	<p>Directory coming soon ...</p>

<?php } elseif ( ! is_user_logged_in() ) { ?>

	<p>Log In or Register</p>

<?php } elseif ( $this->getAttribute( 'page' ) == 'register' ) { ?>

	<p>Register Your Animal</p>

<?php } elseif ( $this->getAttribute( 'page' ) == 'resources' ) { ?>

	<p>Member Resources</p>

<?php } else { ?>

	<p>My White Angus Account</p>

<?php } ?>
