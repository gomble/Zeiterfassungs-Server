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
									<input type="text" name="user_name" pattern="[a-zA-Z0-9]{2,64}" class="login_input" id="login_input_username"  placeholder="Name" required />
								</div>
							</div>


							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="vorname" id="vorname" placeholder="Vorname" />
								</div>
							</div>
							
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="email" id="email" placeholder="Email" />
								</div>
							</div>
							
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="text" name="abteilung" id="abteilung" placeholder="Abteilung" />
								</div>
							</div>							
							
							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="password" name="passwort" id="passwort" placeholder="Passwort" />
								</div>
							</div>

							<div class="row 200%">
								<div class="12u">
									<ul class="actions">
										<li><input type="submit" value="Absenden" /></li>
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



<!-- Contact -->
<div class="wrapper style4">
	<article id="contact" class="container 75%">
		<header> </header>
		<div>
			<div class="row">
				<div class="12u"></div>
			</div>
			<div class="row">
				<div class="12u">
					<hr />
					<h3></h3>

					<hr />
				</div>
			</div>
		</div>