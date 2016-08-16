<?php

/** @var \OnaWhiteAngus\Controller $this */

?>

<?php if ( $this->getAttribute( 'page' ) == 'directory' ) { ?>

	<p>Directory coming soon ...</p>

<?php } elseif ( ! $this->member->isMember() ) { ?>

	<p>Log In or Register</p>

<?php } elseif ( $this->getAttribute( 'page' ) == 'register' ) { ?>

	<p>Register Your Animal</p>

<?php } elseif ( $this->getAttribute( 'page' ) == 'resources' ) { ?>

	<p>Member Resources</p>

<?php } else { ?>

	<p>My White Angus Account</p>

<?php } ?>
