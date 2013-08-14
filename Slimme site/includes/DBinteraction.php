<?php
  session_start();
  $DB;
  define("HOST", "db2.hosting2go.nl"); // The host you want to connect to.
  define("USER", "m1_4ebf03ad"); // The database username.
  define("PASSWORD", "4Lw3zYTx9S"); // The database password. 
  define("DATABASE", "m1_4ebf03ad"); // The database name.
  $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
  
//----------------------------------------------------------------------Algemene functies
  function openDB()
  {
      $DB = mysql_connect("db2.hosting2go.nl", "m1_4ebf03ad", "4Lw3zYTx9S");
      if (!$DB)
      {
        die('Could not connect to the database server: ' . mysql_error());
      }
      mysql_select_db("m1_4ebf03ad", $DB) or die('Could not connect to the database. Database may not exist.' . mysql_error());
  }

  function closeDB()
  {
      	//mysql_close($DB);
  }

  function showPages()
  {
		openDB();
		$result = mysql_query('SELECT id, name FROM page WHERE catid = 1');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 
  }
  
    function showAllpages()
  {
		openDB();
		$result = mysql_query('SELECT p.id, c.name as catname, p.name as pagename FROM categorie c, page p WHERE p.catid = c.id order by catname');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows);
		closeDB();
  }
  
  
  function getContactdata()
  {
		openDB();
		$result = mysql_query('SELECT username, kvknr, btwnr FROM user WHERE type = "owner"');
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 
		closeDB();
  }
  
  function loadHTML($pageID)
  {
	  
	  if (isset($_POST['submit']))
	{
		$updateTekst = $_POST['editor1'];
		OpenDB();
		$result = mysql_query("UPDATE page SET tekst='$updateTekst' WHERE id='$pageID'");
		if (!$result) {
    	die('Invalid query: ' . mysql_error());
		}
		CloseDB();
	}
		openDB();
		$result = mysql_query("SELECT tekst FROM page WHERE id='$pageID'");
		if (!$result) {
		die('Invalid query: ' . mysql_error());
		}
		$pageTekst = mysql_fetch_assoc($result);
		CloseDB();	
		
		echo '<form method="post" action="">
			<textarea id="editor1" name="editor1">';
		echo $pageTekst["tekst"];
		echo '
		</textarea>
			<script type="text/javascript">
				CKEDITOR.replace("editor1");
			</script>
		<p>
			<input type="submit" name="submit" />
		</p>
	</form>';
  }
  
  function get_contentPage($pageID)
  {
	  	openDB();
	  	// Haal JSON op en plaats in variabele
		// Voer een query uit dat de content van de page ophaalt.
		$resultContent = mysql_query("SELECT * FROM page WHERE id='$pageID'") or die(mysql_error());
		$rows = array();
		$row = mysql_fetch_array($resultContent);
		
		if ($row) 
		{
			$pageName	= $row['name'];
			$content    = $row['tekst'];
			
			echo '<p>'.$pageName.'</p>';
			echo $content;
			
		}
		closeDB();
  }
  
  function get_contentPageWithoutTitle($pageID)
  {
	  	openDB();
	  	// Haal JSON op en plaats in variabele
		// Voer een query uit dat de content van de page ophaalt.
		$resultContent = mysql_query("SELECT * FROM page WHERE id='$pageID'") or die(mysql_error());
		$rows = array();
		$row = mysql_fetch_array($resultContent);
		
		if ($row) 
		{
			$content    = $row['tekst'];
			echo $content;
			
		}
		closeDB();
  }
  
  function generateActivatiecode($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
	}
	
 function sendActivationMail($to, $activatiecode) {
	 $subject = "Activatie code";
	 $body = "Hoi,\n\nUw activatie code is $activatiecode";
		mail($to, $subject, $body);
 }
 
 
 function sec_session_start() {
        $session_name = 'sec_session_id'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(); // regenerated the session, delete the old one.  
}


function login($email, $password, $mysqli) {
   // Using prepared Statements means that SQL injection is not possible. 
   if ($stmt = $mysqli->prepare("SELECT userID, username, password, salt FROM user WHERE username = ? LIMIT 1")) { 
      $stmt->bind_param('s', $email); // Bind "$email" to parameter.
      $stmt->execute(); // Execute the prepared query.
      $stmt->store_result();
      $stmt->bind_result($user_id, $username, $db_password, $salt); // get variables from result.
      $stmt->fetch();
      $password = hash('sha512', $password.$salt); // hash the password with the unique salt.
 
      if($stmt->num_rows == 1) { // If the user exists
         // We check if the account is locked from too many login attempts
         if(checkbrute($user_id, $mysqli) == true) { 
            // Account is locked
            // Send an email to user saying their account is locked
            return false;
         } else {
         if($db_password == $password) { // Check if the password in the database matches the password the user submitted. 
            // Password is correct!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
               $_SESSION['user_id'] = $user_id; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
               $_SESSION['username'] = $username;
               $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
               // Login successful.
               return true;    
         } else {
            // Password is not correct
            // We record this attempt in the database
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            return false;
         }
      }
      } else {
         // No user exists. 
         return false;
      }
   }
}

function checkbrute($user_id, $mysqli) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) { 
      $stmt->bind_param('i', $user_id); 
      // Execute the prepared query.
      $stmt->execute();
      $stmt->store_result();
      // If there has been more than 5 failed logins
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}


function login_check($mysqli) {
   // Check if all session variables are set
   if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
     $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
     $username = $_SESSION['username'];
 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
     if ($stmt = $mysqli->prepare("SELECT password FROM user WHERE id = ? LIMIT 1")) { 
        $stmt->bind_param('i', $user_id); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
   } else {
     // Not logged in
     return false;
   }
}

  
  
?>
