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
  
  function updatebedrijf($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $user){
	//update naw gegevens + telefoonnummers
	 $sql = mysql_query("INSERT INTO bedrijf (bedrijfsid, userid, contactpersoon, bedrijfsnaam, adres, postcode, plaats, website, email, telefoonnummer1, telefoonnummer2) VALUES ('', '$user', '$contactpersoon', '$bedrijfsnaam', '$adres', '$postcode', '$plaats', '$website', '$email', '$telefoonnummer1', '$telefoonnummer2') ON DUPLICATE KEY UPDATE contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email', telefoonnummer1 = '$telefoonnummer1', telefoonnummer2 = '$telefoonnummer2'")or die('Could not enter data: ' . mysql_error());
	 
	 if ($sql){
		echo "<script type='text/javascript'> $(document).ready(function() { $('#editBedrijfSucces').foundation('reveal', 'open'); }); </script>"; 
	 }
	  
  }
  
  function insert_temp3($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $user){
	  
	openDB();
	// update naw gegevens
	mysql_query("INSERT INTO temp_user (bedrijfsid, userid, contactpersoon, bedrijfsnaam, adres, postcode, plaats, website, email) VALUES ('', '$user', '$contactpersoon', '$bedrijfsnaam', '$adres', '$postcode', '$plaats', '$website', '$email') ON DUPLICATE KEY UPDATE contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email'")or die('Could not enter data: ' . mysql_error());
  }
  
  function insert_temp2($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $user){
	  
	openDB();
	// update naw gegevens
	mysql_query("INSERT INTO temp_user (bedrijfsid, userid, contactpersoon, bedrijfsnaam, adres, postcode, plaats, website, email, telefoonnummer1, telefoonnummer2) VALUES ('', '$user', '$contactpersoon', '$bedrijfsnaam', '$adres', '$postcode', '$plaats', '$website', '$email', '$telefoonnummer1', '$telefoonnummer2') ON DUPLICATE KEY UPDATE contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email', telefoonnummer1 = '$telefoonnummer1', telefoonnummer2 = '$telefoonnummer2'")or die('Could not enter data: ' . mysql_error());
  }
  
  function insert_temp1($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $user, $beschrijving, $zinbedrijf, $bedrijfsvorm, $aantaljarenervaring, $aantalmdwkrs, $kvknr){
	  
	openDB();
	// update naw gegevens
	mysql_query("INSERT INTO temp_user (bedrijfsid, userid, contactpersoon, bedrijfsnaam, adres, postcode, plaats, website, email, telefoonnummer1, telefoonnummer2, tekst, zin1bedrijf, bedrijfsvorm, aantaljarenErvaring, aantalmdwkrs, kvknr) VALUES ('', '$user', '$contactpersoon', '$bedrijfsnaam', '$adres', '$postcode', '$plaats', '$website', '$email', '$telefoonnummer1', '$telefoonnummer2', '$beschrijving', '$zinbedrijf', '$bedrijfsvorm', '$aantaljarenervaring', '$aantalmdwkrs', '$kvknr') ON DUPLICATE KEY UPDATE contactpersoon = '$contactpersoon', bedrijfsnaam = '$bedrijfsnaam', adres = '$adres', postcode = '$postcode', plaats = '$plaats', website = '$website', email = '$email', telefoonnummer1 = '$telefoonnummer1', telefoonnummer2 = '$telefoonnummer2', tekst = '$beschrijving', zin1bedrijf = '$zinbedrijf', bedrijfsvorm = '$bedrijfsvorm', aantaljarenErvaring = '$aantaljarenervaring', aantalmdwkrs = '$aantalmdwkrs', kvknr = '$kvknr'") or die('Could not enter data: ' . mysql_error());
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
 
 function getBedrijfinfo($bedrijfsid){
	 openDB();
	$result = mysql_query("SELECT u.userID, b.bedrijfsnaam, b.adres, b.postcode, b.plaats, b.website, b.email, b.telefoonnummer1, b.telefoonnummer2, u.profielfoto, u.pakketid, ei.beschrijving, ei.bedrijfsvorm, ei.aantaljarenErvaring, ei.aantalmdwkrs, ei.kvknr, uf.foto1, uf.foto2, uf.foto3, uf.foto4, uf.foto5, uf.foto6, uf.foto7, uf.foto8 FROM bedrijf b, user u, extra_info ei, user_foto uf WHERE u.userID = b.userid AND u.userID = ei.user_ID AND u.userID = uf.userid AND b.bedrijfsid = '$bedrijfsid' GROUP BY u.userID")or die('Error ' . mysql_error());
	return $result;
	 
 }
 
 function getbrancheID_basedOnbedrijfid($bedrijfsid){
	  openDB();
	$result = mysql_query("SELECT u.brancheID FROM user u, branche br, bedrijf be WHERE u.userID = be.userID AND br.brancheID = u.brancheID AND be.bedrijfsID = '$bedrijfsid'")or die('Error ' . mysql_error());
	$row = mysql_fetch_array($result);
	return $row['brancheID']; 
 }
 
 function check_duplicate_username($username){
	$result = mysql_query("SELECT * FROM user WHERE username = '$username'");
	$count = mysql_num_rows($result);
	return $count; 
 }
 
 function mailto($sendTo, $sendFrom, $onderwerp, $content, $contactpersoon, $plaintext, $debug){
		date_default_timezone_set('Etc/UTC');
		require '../mail/PHPMailerAutoload.php';
			//Create a new PHPMailer instance
			$mail = new PHPMailer();
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = $debug;
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			$mail->Host = "smtp.ziggo.nl";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Username to use for SMTP authentication
			$mail->Username = "no-reply@nbrix.nl";
			//Password to use for SMTP authentication
			$mail->Password = "letmein4now";
			//Set who the message is to be sent from
			$mail->setFrom($sendFrom, 'NBrIX');
			//Set an alternative reply-to address
			$mail->addReplyTo($sendFrom, 'NBrIX');
			//Set who the message is to be sent to
			$mail->addAddress($sendTo, $contactpersoon);
			//Set the subject line
			$mail->Subject = $onderwerp;
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($content);
			//Replace the plain text body with one created manually
			$mail->AltBody = $plaintext;	
			if (!$mail->send()) {
				
			} else {
				
			}
			
		}
 
 

  
  
?>
