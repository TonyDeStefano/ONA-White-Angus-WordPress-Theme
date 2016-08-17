<?php

/** @var \OnaWhiteAngus\Controller $this */

$action = ( isset( $_GET['action'] ) ) ? $_GET['action'] : '';
$page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : '';

if ( $page == '' )
{
	if ( $this->getAttribute( 'page' ) == 'register' )
	{
		$page = 'register';
	}
	elseif ( $this->getAttribute( 'page' ) == 'resources' )
	{
		$page = 'resources';
	}
	elseif ( $this->getAttribute( 'page' ) == 'directory' )
	{
		$page = 'directory';
	}
}

?>

<?php if ( count( $this->getErrors() ) > 0 ) { ?>

	<div class="alert alert-danger">
		<ul>
			<?php foreach ( $this->getErrors() as $error ) { ?>
				<li><?php echo $error; ?></li>
			<?php } ?>
		</ul>
	</div>

<?php } ?>

<?php if ( $page == 'directory' ) { ?>

	<p>Directory coming soon ...</p>

<?php } elseif ( ! $this->getMember()->isMember() ) { ?>

	<?php if ( $action == 'signedup' && ! is_user_logged_in() ) { ?>

		<div class="alert alert-info">
			Thank you for registering! You can now log in below.
		</div>

	<?php } ?>

	<div class="row">

		<?php if ( $action != 'signedup' ) { ?>

			<div class="col-sm-8">

				<h3>Join the White Angus Association</h3>

				<form method="post">

					<?php

					wp_nonce_field( 'ona_white_angus_signup', 'ona_white_angus_nonce' );
					$current_user = wp_get_current_user();

					?>

					<input type="hidden" name="ona_white_angus_action" value="signup">

					<div class="form-group">
						<label for="email">Email <strong>*</strong></label>
						<input class="form-control" type="text" id="email" name="email" value="<?php echo ( isset( $_POST['email'] ) ) ? esc_html( $_POST['email'] ) : ( ( is_user_logged_in() ) ? $current_user->user_email : '' ); ?>">
					</div>

					<?php if ( ! is_user_logged_in() ) { ?>

						<div class="form-group">
							<label for="username">Username <strong>*</strong></label>
							<input class="form-control" type="text" id="username" name="username" value="<?php echo ( isset( $_POST['username'] ) ) ? esc_html( $_POST['username'] ) : ''; ?>">
						</div>

						<div class="form-group">
							<label for="password">Password <strong>*</strong></label>
							<input class="form-control" type="password" id="password" name="password" value="<?php echo ( isset( $_POST['password'] ) ) ? esc_html( $_POST['password'] ) : ''; ?>">
						</div>

					<?php } ?>

					<div class="form-group">
						<label for="fname">First Name <strong>*</strong></label>
						<input class="form-control" type="text" id="fname" name="fname" value="<?php echo ( isset( $_POST['fname'] ) ) ? esc_html( $_POST['fname'] ) : ( ( is_user_logged_in() ) ? $current_user->user_firstname : '' ); ?>">
					</div>

					<div class="form-group">
						<label for="lname">Last Name <strong>*</strong></label>
						<input class="form-control" type="text" id="lname" name="lname" value="<?php echo ( isset( $_POST['lname'] ) ) ? esc_html( $_POST['lname'] ) : ( ( is_user_logged_in() ) ? $current_user->user_lastname : '' ); ?>">
					</div>

					<div class="form-group">
						<label for="farm-name">Farm Name</label>
						<input class="form-control" type="text" id="farm-name" name="farm_name" value="<?php echo ( isset( $_POST['farm_name'] ) ) ? esc_html( $_POST['farm_name'] ) : ''; ?>">
					</div>

					<div class="form-group">
						<label for="address">Address <strong>*</strong></label>
						<input class="form-control" type="text" id="address" name="address" value="<?php echo ( isset( $_POST['address'] ) ) ? esc_html( $_POST['address'] ) : ''; ?>">
					</div>

					<div class="form-group">
						<label for="city">City <strong>*</strong></label>
						<input class="form-control" type="text" id="city" name="city" value="<?php echo ( isset( $_POST['city'] ) ) ? esc_html( $_POST['city'] ) : ''; ?>">
					</div>

					<div class="form-group">
						<label for="state">State <strong>*</strong></label>
						<input class="form-control" type="text" id="state" name="state" maxlength="2" value="<?php echo ( isset( $_POST['state'] ) ) ? esc_html( $_POST['state'] ) : ''; ?>">
					</div>

					<div class="form-group">
						<label for="zip">Zip <strong>*</strong></label>
						<input class="form-control" type="text" id="zip" name="zip" value="<?php echo ( isset( $_POST['zip'] ) ) ? esc_html( $_POST['zip'] ) : ''; ?>">
					</div>

					<div class="form-group">
						<label for="phone">Phone Number <strong>*</strong></label>
						<input class="form-control" type="text" id="phone" name="phone" value="<?php echo ( isset( $_POST['phone'] ) ) ? esc_html( $_POST['phone'] ) : ''; ?>">
					</div>

					<p>
						<button class="btn btn-default">
							Submit
						</button>
					</p>

				</form>

			</div>

		<?php } ?>

		<div class="col-sm-4">

			<?php if ( ! is_user_logged_in() ) { ?>

				<?php

				$args = array (
					'echo'           => TRUE,
					'redirect'       => $_SERVER['REQUEST_URI'],
					'form_id'        => 'loginform',
					'label_username' => __( 'Username' ),
					'label_password' => __( 'Password' ),
					'label_remember' => __( 'Remember Me' ),
					'label_log_in'   => __( 'Log In' ),
					'id_username'    => 'user_login',
					'id_password'    => 'user_pass',
					'id_remember'    => 'rememberme',
					'id_submit'      => 'wp-submit',
					'remember'       => TRUE,
					'value_username' => '',
					'value_remember' => FALSE
				);

				?>

				<h3>Already Signed Up?</h3>
				<p>If you have a login and password, enter them here.</p>

				<div id="ona_login_form">
					<?php wp_login_form( $args ); ?>
				</div>

				<p>
					<a href="/wp-login.php?action=lostpassword">Lost Password?</a>
				</p>

			<?php } ?>
		</div>
	</div>

<?php } elseif ( $page == 'register' ) { ?>

	<h3>Register Your Animal</h3>

<?php } elseif ( $page == 'resources' ) { ?>

	<h3>Member Resources</h3>

<?php } else { ?>

	<h3>My White Angus Account</h3>

<?php } ?>
