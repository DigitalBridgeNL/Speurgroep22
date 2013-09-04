<?php
  
//----------------------------------------------------------------------Algemene functies
  function openDB()
  {
      $DB = mysql_connect("localhost", "root", "");
      if (!$DB)
      {
        die('Could not connect to the database server: ' . mysql_error());
      }
      mysql_select_db("speurgroep", $DB) or die('Could not connect to the database. Database may not exist.' . mysql_error());
  }
  
  function branches()
      	{
			openDB();
           $result = mysql_query("
           select brancheID, naam
           from branche order by naam");

           return $result;
       }
	   
  function current_branche($user)
  {
	openDB();
	$result = mysql_query("
           select brancheID
           from user where userID = '$user'"); 
	return $result;
	  
  }
  
  function updatePakket3($user, $contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email)
  {
	openDB();
	$pakketid = 3;
	// update naw gegevens
	mysql_query("UPDATE bedrijf SET contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email' WHERE userid = '$user'");
	 //update pakketkeuze + profiel foto
	mysql_query("UPDATE user SET pakketid = '$pakketid' WHERE userid = '$user'");
  }
  
  function updatePakket2($user, $contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $profielfoto)
  {
	openDB();
	$pakketid = 2;
	//update naw gegevens + telefoonnummers
	mysql_query("UPDATE bedrijf SET contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email', telefoonnummer1 = '$telefoonnummer1', telefoonnummer2 = '$telefoonnummer2' WHERE userid = '$user'");
	 //update pakketkeuze + profiel foto
	mysql_query("UPDATE user SET profielfoto = '$profielfoto', pakketid = '$pakketid' WHERE userid = '$user'");
  }
  
  function updatePakket1($user,$contactpersoon,$bedrijfsnaam,$adres,$postcode,$plaats,$website,$email, $telefoonnummer1, $telefoonnummer2, $profielfoto, $foto1, $foto2, $foto3, $foto4, $foto5, $foto6, $foto7, $foto8) 
  {
	 openDB();
	 $pakketid = 1;
	 //update naw gegevens + telefoonnummers
	 mysql_query("INSERT INTO bedrijf (bedrijfsid, userid, contactpersoon, bedrijfsnaam, adres, postcode, plaats, website, email, telefoonnummer1, telefoonnummer2) VALUES ('', '$user', '$contactpersoon', '$bedrijfsnaam', '$adres', '$postcode', '$plaats', '$website', '$email', '$telefoonnummer1', '$telefoonnummer2') ON DUPLICATE KEY UPDATE contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email', telefoonnummer1 = '$telefoonnummer1', telefoonnummer2 = '$telefoonnummer2'")or die('Could not enter data: ' . mysql_error());
	 //update pakketkeuze + profiel foto
	mysql_query("UPDATE user SET profielfoto = '$profielfoto', pakketid = '$pakketid' WHERE userid = '$user'");
	 //upload foto`s
	mysql_query("INSERT INTO user_foto (userid, foto1, foto2, foto3, foto4, foto5, foto6, foto7, foto8) VALUES ('$user', '$foto1', '$foto2', '$foto3', '$foto4', '$foto5', '$foto6', '$foto7', '$foto8') ON DUPLICATE KEY UPDATE foto1 = values(foto1), foto2 = values(foto2), foto3 = values(foto3), foto4 = values(foto4), foto5 = values(foto5), foto6 = values(foto6), foto7 = values(foto7), foto8 = values(foto8)") or die('Could not enter data: ' . mysql_error());
	  
  }
  
  function specialisaties($currentbranche)
  {
	openDB();
	$result = mysql_query("
           select bs_id, specialisatie
           from branche_specialisatie where brancheID = '$currentbranche'"); 
	return $result;	  
  }
  
  function get_users_details($user)
  {	 
	openDB();
	$result = mysql_query("SELECT b.contactpersoon, b.bedrijfsnaam, b.adres, b.postcode, b.plaats, b.website, b.email, b.telefoonnummer1, b.telefoonnummer2, u.brancheID FROM bedrijf b, user u WHERE u.userID = b.userid AND u.userID = '$user'");
	
	return $result;
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
  
  function generateRandomcode($length = 10) {
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
 
 

  
  
?>
