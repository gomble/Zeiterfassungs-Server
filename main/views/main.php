<!-- Home -->
			<div class="wrapper style3 first">
				<article class="container" id="top">
					<div class="row">
						<div class="4u 12u(mobile)">
							<span class="image fit"><img src="images/clock.png" alt="" /></span>
						</div>
						<div class="8u 12u(mobile)">
							<header>
								<h1>Zeiterfassung</h1>
							</header>
							<?php 
							// ... ask if we are logged in here:
							if ($login->isUserLoggedIn()) {
								echo'Herzlich Willkommen in Ihrem Konto '.$_SESSION['user_email'];
							} else {
								echo'<p>Bitte <a href="index.php?site=register">registrieren</a> Sie sich oder <a href="index.php?site=login">loggen</a> sie sich ein. </p>';
							}
							
							if ($site=="logout")
								echo "Sie haben sich abgemeldet."
							?>						
						</div>
					</div>
				</article>
			</div>



