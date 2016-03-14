<!-- Home -->
			<div class="wrapper style1 first">
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
								echo'Herzlich Willkommen '.$_SESSION['user_name'];
							} else {
								echo'<p>Bitte <a href="index.php?site=register">registrieren</a> Sie sich oder <a href="index.php?site=login">loggen</a> sie sich ein. </p>';
							}
							?>						
						</div>
					</div>
				</article>
			</div>



		<!-- Contact -->
			<div class="wrapper style4">
				<article id="contact" class="container 75%">
					<header>

					</header>
					<div>
						<div class="row">
							<div class="12u">

							</div>
						</div>
						<div class="row">
							<div class="12u">
								<hr />
								<h3></h3>

								<hr />
							</div>
						</div>
					</div>