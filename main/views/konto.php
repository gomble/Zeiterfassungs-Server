<?php
// include the configs / constants for the database connection
require_once ("/../login-classes/config/db.php");

// load the registration class
require_once ("/../login-classes/classes/Userdata.php");

// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
$userdata = new Userdata ();
?>
<!-- Konto -->
<div class="wrapper style3 first">
	<article class="container" id="top">
		<div class="row">
			<div class="4u 12u(mobile)">
				<span class="image fit"><img src="images/clock.png" alt="" /></span>
			</div>
			<div class="8u 12u(mobile)">
				<header>
					<h1>Konto</h1>
				</header>
				<div class="12u">
					<form method="post" action="index.php?site=register"
						name="registerform">
						<div>
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="user_nachname" class="login_input"
										disabled="disabled"
										placeholder="<?php echo $userdata->get_user_name();?>"
										id="login_input_nachname" />
								</div>
							</div>

							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="user_vorname" class="login_input"
										disabled="disabled"
										placeholder="<?php echo $userdata->get_user_vorname();?>"
										id="login_input_vorname" />
								</div>
							</div>

							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="email" name="user_email" class="login_input"
										disabled="disabled"
										placeholder="<?php echo $userdata->get_user_email();?>"
										id="login_input_email" name="user_email" />
								</div>
							</div>
						</div>
					</form>
				</div>
				<?php
				// show potential errors / feedback (from registration object)
				if (isset ( $registration )) {
					if ($registration->errors) {
						foreach ( $registration->errors as $error ) {
							echo $error;
						}
					}
					if ($registration->messages) {
						foreach ( $registration->messages as $message ) {
							echo $message;
						}
					}
				}
				?>
							
			
						</div>
		</div>
	</article>
</div>



