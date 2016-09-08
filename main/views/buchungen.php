<?php
// include the configs / constants for the database connection
require_once(dirname(dirname(__FILE__)) . "/login-classes/config/db.php");

// load the registration class
require_once (dirname(__FILE__) . "/buchungen-class.php");
require_once (dirname(__FILE__) . "/pointlocation.php");
require_once (dirname(__FILE__) . "/geodata-class.php");



$geodata = new Geodata ();
$pointLocation = new pointLocation();


$gps_coords = $geodata->get_gps_data($geodata->get_month());

$workplace_coords = $geodata->get_workplace_coords_polygon_buchung();

$check_in_out = array();
$angemeldet = false;
$runde = 0;

	for($i = 0, $l = count($gps_coords); $i < $l; ++$i) {
		
		
		$temp = $gps_coords[$i][1]." ".$gps_coords[$i][2];	
		$value = $pointLocation->pointInPolygon($temp, $workplace_coords);
		
		
		if($value == "inside" OR $value == "boundary" OR $value == "vertex" ){
			
			if($angemeldet==false){
				$check_in_out[$runde][0] = $gps_coords[$i][0];
				$angemeldet = true;
				
			}else{
				
			}
			
		}else if ($value == "outside"){
			
			if($angemeldet==false){
				
			}else{
				$check_in_out[$runde][1] = $gps_coords[$i][0];
				$angemeldet = false;
				$runde++;
			}

		}
		
	}
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
											<input type="month" name="gps_date"  class="login_input"  value="<?php echo $geodata->get_month();  ?>" required />
										</div>
									</div>
													
									<div class="row 200%">
										<div class="12u">
											<ul class="actions">
												<li><input name="gps_submit" type="submit" value="Monat ändern" /></li>
											</ul>
										</div>
									</div>
									
								</div>
							</form>
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
	
		<div id="wrapper">
			<table class="responstable">
				<tr>
					<th>Datum</th>
					<th data-th="Driver details">Beginn</th>
					<th>Ende</th>
					<th>Ist</th>
				</tr>

				<?php
					for($i = 0, $l = count($check_in_out); $i < $l; ++$i) {
		
						//echo " \n".$check_in_out[$i][0]." - " .$check_in_out[$i][1];
						
						printf ( "<tr>" );
							printf ( "<td>" . $geodata->calc_time_date($check_in_out[$i][0]). "</td>" );
							printf ( "<td>" . $geodata->calc_time_hour_minute($check_in_out[$i][0]) . "</td>" );
							printf ( "<td>" . $geodata->calc_time_hour_minute($check_in_out[$i][1]) . "</td>" );
							printf ( "<td>" . $geodata->calc_time($check_in_out[$i][0],$check_in_out[$i][1]) . "</td>" );
						printf ( "</tr>" );
						
					}
				?>
			</table>
		</div>
	</article>
</div>
