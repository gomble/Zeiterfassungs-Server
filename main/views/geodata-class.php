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
	
	/**
	 * the function "__construct()" automatically starts whenever an object of this class is created
	 */
	public function __construct() {
		if (isset ( $_SESSION ["user_id"] )) {
			
			$this->logged_in_user = $_SESSION ["user_id"];
			$monthdate = ('Y') . "-" . date ( 'm', strtotime ( '-1 month' ) );
			// $this->get_coordinates();
		}
	}
	
	/**
	 * get coordinates from the user who is logged in
	 */
	public function get_coordinates($month) {
		$this->db_connection = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		
		// change character set to utf8 and check it
		if (! $this->db_connection->set_charset ( "utf8" )) {
			$this->errors [] = $this->db_connection->error;
		}
		
		// if no connection errors (= working database connection)
		if (! $this->db_connection->connect_errno) {
			
			$sql = "SELECT geo.lat, geo.long, geo.timestamp FROM geo, users WHERE users.user_id = geo.user_id AND users.user_id = '" . $this->logged_in_user . "';";
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
		$this->db_connection = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		
		// change character set to utf8 and check it
		if (! $this->db_connection->set_charset ( "utf8" )) {
			$this->errors [] = $this->db_connection->error;
		}
		
		// if no connection errors (= working database connection)
		if (! $this->db_connection->connect_errno) {
			
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
		$this->db_connection = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		
		// change character set to utf8 and check it
		if (! $this->db_connection->set_charset ( "utf8" )) {
			$this->errors [] = $this->db_connection->error;
		}
		
		// if no connection errors (= working database connection)
		if (! $this->db_connection->connect_errno) {
			
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
	
	/**
	 * get coordinates from the user who is logged in
	 */
	public function get_gps_data($month) {
		$this->db_connection = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		
		// change character set to utf8 and check it
		if (! $this->db_connection->set_charset ( "utf8" )) {
			$this->errors [] = $this->db_connection->error;
		}
		
		// if no connection errors (= working database connection)
		if (! $this->db_connection->connect_errno) {
			
			$sql = "SELECT geo.lat, geo.long, DATE_FORMAT(timestamp,'%d.%m.%Y %T') AS datum FROM geo, users WHERE users.user_id = geo.user_id AND users.user_id = '" . $this->logged_in_user . "';";
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
}

?>