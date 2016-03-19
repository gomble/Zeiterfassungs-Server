<?php

/**
 * Class registration
 * handles the user registration
 */
class Registration
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */

    private function registerNewUser()
    {
        if (empty($_POST['user_nachname'])) {
            $this->errors[] = "Bitte Nachnamen angeben.";
        }elseif (empty($_POST['user_vorname'])){
        	$this->errors = 'Bitte Vornamen angeben.';
        }elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Bitte Passwort angeben.";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Passwörter stimmen nicht überein.";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Passwort muss länger als 6 Zeichen sein.";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Bitten E-Mail angeben.";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Die E-Mail Adresse darf nicht länger als 64 Zeichen sein.";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Ihre E-Mail Adresse hat nicht das Format einer E-Mail Adresse.";
        } elseif (!empty($_POST['user_nachname'])
            && !empty($_POST['user_vorname'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $user_nachname = $this->db_connection->real_escape_string(strip_tags($_POST['user_nachname'], ENT_QUOTES));
                $user_vorname = $this->db_connection->real_escape_string(strip_tags($_POST['user_vorname'], ENT_QUOTES));
                $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                $user_password = $_POST['user_password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "E-Mail Adresse bereits angemeldet.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_name,user_vorname, user_password_hash, user_email)
                            VALUES('" . $user_nachname . "', '" . $user_vorname . "','" . $user_password_hash . "', '" . $user_email . "');";
                    
                    $query_new_user_insert = $this->db_connection->query($sql);

                    echo $this->db_connection->query($sql);
                    
                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = 'Benutzer angelegt, Sie können sich nun <a href="index.php?site=login">anmelden</a>';
                    } else {
                        $this->errors[] = "Sorry, Ihre Registration ist fehlgeschlagen.";
                    }
                }
            } else {
                $this->errors[] = "Keine Datenbankverbindung.";
            }
        } else {
            $this->errors[] = "Ein Unbekannter Fehler ist aufgetreten.";
        }
    }
}
