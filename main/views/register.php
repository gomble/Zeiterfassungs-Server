<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<!-- Home -->
<div class="wrapper style1 first">
	<article class="container" id="top">
		<div class="row">
			<div class="4u 12u(mobile)">
				<span class="image fit"><img src="images/clock.png" alt="" /></span>
			</div>
			<div class="8u 12u(mobile)">
				<header>
					<h1>Registrieren</h1>
				</header>
				<div class="12u">
					<form  method="post" action="index.php?site=register" name="registerform">
						<div>
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="user_nachname"  class="login_input" id="login_input_nachname"  placeholder="Name" required />
								</div>
							</div>

							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="user_vorname"  class="login_input" id="login_input_vorname" placeholder="Vorname" required />
								</div>
							</div>
							
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="email" name="user_email" class="login_input"  id="login_input_email" name="user_email" placeholder="Email" required />
								</div>
							</div>
							
<!-- 							<div class="row"> -->
<!-- 								<div class="6u 12u(mobile)"> -->
<!-- 									<input type="text" name="user_abteilung" class="login_input" id="login_input_abteilung" placeholder="Abteilung" required/> -->
<!-- 								</div> -->
<!-- 							</div>							 -->
							
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="password" class="login_input" name="user_password_new" id="login_input_password_new" pattern=".{6,}" required autocomplete="off" placeholder="Passwort" />
								</div>
							</div>
							
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="password" class="login_input" name="user_password_repeat" id="login_input_password_repeat" pattern=".{6,}" required autocomplete="off" placeholder="Passwort" />
								</div>
							</div>
							
							<div class="row 200%">
								<div class="12u">
									<ul class="actions">
										<li><input name="register" type="submit" value="Absenden" /></li>
										<li><input type="reset" value="Clear" class="alt" /></li>
									</ul>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</article>
</div>

