<!-- Anmelden -->
<div class="wrapper style1 first">
	<article class="container" id="top">
		<div class="row">
			<div class="4u 12u(mobile)">
				<span class="image fit"><img src="images/clock.png" alt="" /></span>
			</div>
			<div class="8u 12u(mobile)">
				<header>
					<h1>Login</h1>
				</header>
				
				<?php 
				if ($login->isUserLoggedIn()==false){
					echo '
						<div class="12u">
							<form  method="post" action="index.php?site=login" name="loginform">
								<div>
									<div class="row">
										<div class="6u 12u(mobile)">
											<input type="text" name="user_email"  class="login_input" id="login_input_username"  placeholder="Email" required />
										</div>
									</div>
		
									<div class="row">
										<div class="6u 12u(mobile)">
											<input type="password" name="user_password"  class="login_input" id="login_input_password" placeholder="Passwort" autocomplete="off" required />
										</div>
									</div>
									
									<div class="row 200%">
										<div class="12u">
											<ul class="actions">
												<li><input name="login" type="submit" value="Log in" /></li>
												<li><input type="reset" value="Clear" class="alt" /></li>
											</ul>
										</div>
									</div>
								</div>
							</form>
						</div>
						';
				}
				
				?>

				
				<?php
				// show potential errors / feedback (from login object)
				if (isset($login)) {
				    if ($login->errors) {
				        foreach ($login->errors as $error) {
				            echo $error;
				        }
				    }
				    if ($login->messages) {
				        foreach ($login->messages as $message) {
				            echo $message;
				        }
				    }
				    if ($login->isUserLoggedIn()){
				    	echo "Sie sind eingeloggt mit ".$_SESSION['user_email'].".";
				    }
				}
				?>
			</div>
		</div>
	</article>
</div>

