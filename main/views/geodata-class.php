<?php
/**
 * Class Geodata
 * handles the geodata for googlemaps api
 */
class Geodata {
	/**
	 *
	 * @var object $db_connection The database connection
	 */
	private $db_connection = null;
	/**
	 *
	 * @var array $errors Collection of error messages
	 */
	public $errors = array ();
	/**
	 *
	 * @var array $messages Collection of success / neutral messages
	 */
	public $messages = array ();
	private $logged_in_user = null;
	private $coords = array ();
	
	
	private $month = null;
	private $dateform = null;
	

	
	
	public function __construct() {
		
		if (isset ( $_SESSION ["user_email"] )) {
			
			$this->logged_in_user = $_SESSION ["user_email"];
			
			if($this->db_connection()){
				
				$this->month = $this->get_current_month ();
				$this->dateform = $this->get_current_daymonthyear ();
				
				if (isset ( $_POST ["map_submit"]) || isset ( $_POST ["gps_submit"] ) ) {
					$this->change_daymonthyear ();
					$this->change_month ();
				}

			}
			
		}
		
	}
	private function change_month() {
		if (! empty ( $_POST ['gps_date'] )) {
			$this->month = $_POST ['gps_date'];
		}
	}
	
		private function change_daymonthyear() {
		if (! empty ( $_POST ['gps_date'] )) {
			$this->dateform = $_POST ['gps_date'];
		}
	}
	
	public function get_current_month() {
		return date ( "Y" ) . "-" . date ( "m" );
	}
	
		public function get_current_daymonthyear() {
		return date ( "Y" ) . "-" . date ( "m" ) . "-" .date ( "d" );
	}
	
	public function get_month() {
		return $this->month;
	}
	
		public function get_date() {
		return $this->dateform;
	}
	
	/**
	 * get coordinates from the user who is logged in
	 */
	public function get_coordinates($dateformat) {
		
		if ($this->db_connection()) {
			
			$sql = "SELECT geo.lat, geo.long, geo.timestamp FROM geo WHERE geo.timestamp LIKE '" . $dateformat . "%' AND geo.user= '" . $this->logged_in_user . "';";
			$query_check_coords = $this->db_connection->query ( $sql );
			
			if ($query_check_coords = $this->db_connection->query ( $sql )) {
				
				$number_of_rows = $query_check_coords->num_rows;
				$current_row = 0;
				
				/* fetch object array */
				while ( $row = $query_check_coords->fetch_row () ) {
					
					$current_row ++;
					
					printf ( "new google.maps.LatLng(" . $row [0] . "," . $row [1] . ")" );
					
					if (! ($current_row == $number_of_rows)) {
						printf ( ",\n" );
					}
				}
				
				/* free result set */
				$query_check_coords->close ();
			}
		}
	}
	public function get_workplace_coords() {
		
		if ($this->db_connection()) {
			
			$sql = "SELECT workplace.lat, workplace.long FROM workplace;";
			$query_check_coords = $this->db_connection->query ( $sql );
			
			if ($query_check_coords = $this->db_connection->query ( $sql )) {
				
				$number_of_rows = $query_check_coords->num_rows;
				$current_row = 0;
				
				/* fetch object array */
				while ( $row = $query_check_coords->fetch_row () ) {
					
					$current_row ++;
					
					printf ( "[" . $row [0] . "," . $row [1] . "]" );
					if (! ($current_row == $number_of_rows)) {
						printf ( ",\n" );
					}
				}
				
				/* free result set */
				$query_check_coords->close ();
			}
		}
	}
	public function get_workplace_coords_polygon() {
		
		if ($this->db_connection()) {
			
			$sql = "SELECT workplace.lat, workplace.long FROM workplace;";
			$query_check_coords = $this->db_connection->query ( $sql );
			
			if ($query_check_coords = $this->db_connection->query ( $sql )) {
				
				$number_of_rows = $query_check_coords->num_rows;
				$current_row = 0;
				
				/* fetch object array */
				while ( $row = $query_check_coords->fetch_row () ) {
					
					$current_row ++;
					
					printf ( "{lat: " . $row [0] . ", lng: " . $row [1] . "}" );
					
					if (! ($current_row == $number_of_rows)) {
						printf ( ",\n" );
					}
				}
				
				/* free result set */
				$query_check_coords->close ();
			}
		}
	}
	
	
	
	public function get_workplace_coords_polygon_buchung() {
		
		if ($this->db_connection()) {
			
			$sql = "SELECT workplace.lat, workplace.long FROM workplace;";
			$query_check_coords = $this->db_connection->query ( $sql );
			
			if ($query_check_coords = $this->db_connection->query ( $sql )) {
				
				$number_of_rows = $query_check_coords->num_rows;
				$current_row = 0;
				
				$gps_coordinate_workplace = array();
				
				/* fetch object array */
				while ( $row = $query_check_coords->fetch_row () ) {
					
					$temp = $row [0]." ".$row [1];
					
					$gps_coordinate_workplace[] = $temp;
					
				}
				
				/* free result set */
				$query_check_coords->close ();
			}
		}
		return $gps_coordinate_workplace;
	}
	
	
	
	
	
	/**
	 * get coordinates from the user who is logged in
	 */
	public function get_gps_data_print($date_format) {

		if ($this->db_connection()) {
			
			$sql = "SELECT geo.lat, geo.long, DATE_FORMAT(timestamp,'%d.%m.%Y %T') AS datum FROM geo WHERE geo.timestamp LIKE '" . $date_format . "%' AND geo.user = '" . $this->logged_in_user . "' ORDER BY datum ASC;";
			$query_check_coords = $this->db_connection->query ( $sql );
			
			if ($query_check_coords = $this->db_connection->query ( $sql )) {
				
				/* fetch object array */
				while ( $row = $query_check_coords->fetch_row () ) {
					printf ( "<tr>" );
					printf ( "<td>" . $row [2] . "</td>" );
					printf ( "<td>" . $row [0] . "</td>" );
					printf ( "<td>" . $row [1] . "</td>" );
					printf ( "</tr>" );
				}
				/* free result set */
				$query_check_coords->close ();
			}
		}
	}
	
		public function get_gps_data($date_format) {

		if ($this->db_connection()) {
			
			$sql = "SELECT geo.lat, geo.long, DATE_FORMAT(timestamp,'%d.%m.%Y %T') AS datum FROM geo WHERE geo.timestamp LIKE '" . $date_format . "%' AND geo.user = '" . $this->logged_in_user . "' ORDER BY datum ASC;";
			$query_check_coords = $this->db_connection->query ( $sql );
			
			if ($query_check_coords = $this->db_connection->query ( $sql )) {
				while ( $row = $query_check_coords->fetch_row () ) {
					$gps_coordinate_timestamp[] = 	array($row [2], $row [0], $row [1]);
																		
																		
				}
				$query_check_coords->close ();
			}
		}
		return $gps_coordinate_timestamp;
	}
	
	
	
	public function db_connection() {
		$this->db_connection = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		
		// change character set to utf8 and check it
		if (! $this->db_connection->set_charset ( "utf8" )) {
			$this->errors [] = $this->db_connection->error;
		}
		
		if (! $this->db_connection->connect_errno) {
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function calc_time($datum,$datum2) {
			
			$start = date_create($datum);
			$end = date_create($datum2);
			$diff=date_diff($end,$start);
			
			return $diff->format('%H:%I:%S');

	}	
	
	public function calc_time_date($datum) {
			$d=strtotime($datum);
			return date("d-m-Y", $d);
	}	
	
	public function calc_time_hour_minute($datum) {
			$d=strtotime($datum);
			return date("H:i:s", $d);
	}	
	
	
}

?>
