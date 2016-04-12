<?php
// include the configs / constants for the database connection
require_once ("/../login-classes/config/db.php");

// load the registration class
require_once ("geodata-class.php");

// create the geodata object.
// this object shows the gps coords from the user who is logged in
$geodata = new Geodata ();
?>

<!-- gps -->



<div class="wrapper">
	<article class="container" id="top">
		<div class="row">
			<div class="12u 12u(mobile)">
				<header>
					<h1>GPS Daten</h1>
				</header>

				<div class="12u">
					<form method="post" action="index.php?site=gps" name="gpsform">
						<div>

							<div class="row">
								<div class="6u 12u(mobile)">
									<input type="month" name="gps_date" class="login_input"
										value="<?php echo $geodata->get_month();  ?>" required />
								</div>
							</div>

							<div class="row 200%">
								<div class="12u">
									<ul class="actions">
										<li><input name="gps_submit" type="submit"
											value="Monat ändern" /></li>
									</ul>
								</div>
							</div>

						</div>
					</form>
				</div>

				<div id="wrapper">
					<table class="responstable">
						<tr>
							<th>Zeit</th>
							<th data-th=" Details">Latidude</th>
							<th>Longtidude</th>
						</tr>
						<?php $geodata->get_gps_data('5')?>
					</table>
				</div>
				
				<?php
				// show potential errors / feedback (from geodata object)
				if (isset ( $geodata )) {
					if ($geodata->errors) {
						foreach ( $geodata->errors as $error ) {
							echo $error;
						}
					}
					if ($geodata->messages) {
						foreach ( $geodata->messages as $message ) {
							echo $message;
						}
					}
				}
				?>
			</div>
		</div>
	</article>
</div>


