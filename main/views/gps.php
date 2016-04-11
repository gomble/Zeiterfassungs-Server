<?php
// include the configs / constants for the database connection
require_once ("/../login-classes/config/db.php");

// load the registration class
require_once ("geodata-class.php");

// create the geodata object.
//this object shows the gps coords from the user who is logged in
$geodata = new Geodata ();
?>

<!-- gps -->
<div class="wrapper style3">
	<article id="portfolio">
		<header>
			<h2>GPS Daten</h2>
		</header>
		<div id="wrapper">
			<table class="responstable">
				<tr>
					<th data-th="Driver details">Zeit</th>
					<th>Latidude</th>
					<th>Longtidude</th>
				</tr>

				<?php $geodata->get_gps_data('5')?>

			</table>
		</div>
	</article>
</div>

