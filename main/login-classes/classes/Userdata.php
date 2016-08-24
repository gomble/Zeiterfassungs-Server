<?php

/**
 * Class Userdata
 * handles the user data function
 */
class Userdata {
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
	private $user_name = null;
	private $user_vorname = null;
	private $user_email = null;
	
	/**
	 * the function "__construct()" automatically starts whenever an object of this class is created,
	 * you know, when you do "$registration = new Registration();"
	 */
	public function __construct() {
		if (isset ( $_SESSION ["user_id"] )) {
			$this->logged_in_user = $_SESSION ["user_id"];
			
			$this->db_connection = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
			
			// change character set to utf8 and check it
			if (! $this->db_connection->set_charset ( "utf8" )) {
				$this->errors [] = $this->db_connection->error;
			}
			
			// if no connection errors (= working database connection)
			if (! $this->db_connection->connect_errno) {
				
				$sql = "SELECT users.user_name, users.user_vorname, users.user_email FROM users WHERE users.user_id = '" . $this->logged_in_user . "';";
				$query_check_coords = $this->db_connection->query ( $sql );
				
				if ($query_check_coords = $this->db_connection->query ( $sql )) {
					/* fetch object array */
					while ( $row = $query_check_coords->fetch_row () ) {
						$this->user_name = $row [0];
						$this->user_vorname = $row [1];
						$this->user_email = $row [2];
					}
					/* free result set */
					$query_check_coords->close ();
				}
			}
		}
	}
	public function get_user_name() {
		return $this->user_name;
	}
	public function get_user_vorname() {
		return $this->user_vorname;
	}
	public function get_user_email() {
		return $this->user_email;
	}
}
