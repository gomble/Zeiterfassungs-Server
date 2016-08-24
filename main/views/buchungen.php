<?php
// include the configs / constants for the database connection
require_once(dirname(dirname(__FILE__)) . "/login-classes/config/db.php");

// load the registration class
require_once (dirname(__FILE__) . "/buchungen-class.php");

// create the geodata object.
// this object shows the gps coords from the user who is logged in
$buchungendata = new Buchungen ();
?>

<!-- Buchungen -->
			<div class="wrapper">
			<article class="container" id="top">
				<div class="row">
					<div class="12u 12u(mobile)">
						<header>
							<h1>Buchungen</h1>
						</header>
						<div class="12u">
							<form  method="post" action="index.php?site=buchungen" name="buchungenform">
								<div>

									<div class="row">
										<div class="6u 12u(mobile)">
											<input type="month" name="buchungen_date"  class="login_input"  value="<?php echo $buchungendata->get_month();  ?>" required />
										</div>
									</div>
													
									<div class="row 200%">
										<div class="12u">
											<ul class="actions">
												<li><input name="buchungen_submit" type="submit" value="Monat ändern" /></li>
											</ul>
										</div>
									</div>
									
								</div>
							</form>
						</div>
						<div id="map_canvas"></div>
						<?php
						// show potential errors / feedback (from geodata object)
						if (isset ( $buchungendata )) {
							if ($buchungendata->errors) {
								foreach ( $buchungendata->errors as $error ) {
									echo $error;
								}
							}
							if ($buchungendata->messages) {
								foreach ( $buchungendata->messages as $message ) {
									echo $message;
								}
							}
						}
						?>
					</div>
				</div>
			</article>
		</div>
	
		<div id="wrapper">
			<table class="responstable">
				<tr>
					<th>Datum</th>
					<th data-th="Driver details">Beginn</th>
					<th>Ende</th>
					<th>Ist</th>
					<th>Soll</th>
					<th>TSaldo</th>
					<th>Saldo</th>
				</tr>

				<tr>
					<td>01.03.16</td>
					<td>07:43</td>
					<td>16:22</td>
					<td>08:09</td>
					<td>07:36</td>
					<td>00:33</td>
					<td>14:59</td>
				</tr>

				<tr>
					<td>01.03.16</td>
					<td>07:43</td>
					<td>16:22</td>
					<td>08:09</td>
					<td>07:36</td>
					<td>00:33</td>
					<td>14:59</td>
				</tr>
				<tr>
					<td>01.03.16</td>
					<td>07:43</td>
					<td>16:22</td>
					<td>08:09</td>
					<td>07:36</td>
					<td>00:33</td>
					<td>14:59</td>
				</tr>
				<tr>
					<td>01.03.16</td>
					<td>07:43</td>
					<td>16:22</td>
					<td>08:09</td>
					<td>07:36</td>
					<td>00:33</td>
					<td>14:59</td>
				</tr>
				<tr>
					<td>01.03.16</td>
					<td>07:43</td>
					<td>16:22</td>
					<td>08:09</td>
					<td>07:36</td>
					<td>00:33</td>
					<td>14:59</td>
				</tr>

			</table>
		</div>
	</article>
</div>

