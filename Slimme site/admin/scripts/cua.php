<?php
include('../../includes/DBinteraction.php');
date_default_timezone_set('Etc/UTC');
require '../../mail/PHPMailerAutoload.php';
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="csv" required>
<select class="medium" name="branche" required>
<?php
 		//retrieve all types from the database.
        $branches = branches();
        //Create a dropdown option for every type.
        while($row = mysql_fetch_array($branches))
        {
            echo "<option value='".$row['brancheID']."'>".$row['naam']."</option>";
        }
?>
</select>
<input type="submit" name="uploadCSV">
</form>

<?php

if (isset($_POST['uploadCSV'])){
	$randomcode = generateRandomcode(10);
	move_uploaded_file($_FILES["csv"]["tmp_name"],
	"upload/".$randomcode."_" . $_FILES["csv"]["name"]);
	$location =  "upload/".$randomcode."_" . $_FILES["csv"]["name"];
	
	$f = $location;
	$token = ';';
	openDB();
	$previousEmail = '';
	$succesvolCount = 0;
	if (($handle = fopen($f, "r")) !== FALSE) {
  		while (($data = fgetcsv($handle, 2000, $token)) !== FALSE) {
				if (trim($data[4]) == ''){
					echo 'Geen E-mail adres ingevuld, controleer het csv bestand';
				}
				else
				{
					$currentEmail = trim($data[4]);
					$count = check_duplicate_username($currentEmail);
					if ($currentEmail == $previousEmail){
						echo 'Dubbele e-mail adres, record niet toegevoegd aan database. Betreft:'.trim($data[4]);		
					}
					else{
						if ($count != 0){
							echo 'User account naam bestaat al, record niet opgeslagen in de daabase. Betreft:'.trim($data[4]).'<br /> ';	
						}
						else{
					$previousEmail = $data[4];
					$bedrijfsnaam = trim($data[0]);
					$adres = trim($data[1]);
					$plaats = trim($data[2]);
					$postcode = trim($data[3]);
					$email = trim($data[4]);
					$telefoonnummer1 = trim($data[5]);
					$telefoonnummer2 = trim($data[6]);
					$website = trim($data[7]);
					$zout = generateRandomcode(10);
					$mypassword = generateRandomcode(10);
					$mypassword1 = hash('sha256', $zout.$mypassword);
					$branche = $_POST['branche'];
					
					mysql_query("INSERT INTO user (userID, brancheID, username, password, salt) VALUES('','$branche', '$email', '$mypassword1', '$zout')");
					$userid = mysql_insert_id();
					mysql_query("INSERT INTO bedrijf (bedrijfsid, userid, bedrijfsnaam, adres, postcode, plaats, website, email, telefoonnummer1, telefoonnummer2) VALUES('', '$userid', '$bedrijfsnaam', '$adres', '$plaats', '$postcode', '$website', '$email', '$telefoonnummer1', '$telefoonnummer2')");
					$succesvolCount++;
					
					
					////////////////////////////////////////////////////////////////////////////
					//MAIL DIE KLANTTTTT//
					////////////////////////////////////////////////////////////////////////////
					//Create a new PHPMailer instance
					$mail_content = '<html><body><h5>Geachte heer/mevrouw,'.$email.$mypassword.'</h5><p>We hebben een account aangemaakt voor de website van Speurgroep</p><p>Met vriendelijke groet,</p><br /><p>NBrIX Tilburg</p></body></html>';					
										
					
					$mail = new PHPMailer();
					//Tell PHPMailer to use SMTP
					$mail->isSMTP();
					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;
					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';
					//Set the hostname of the mail server
					$mail->Host = "smtp.nbrix.nl";
					//Set the SMTP port number - likely to be 25, 465 or 587
					$mail->Port = 25;
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;
					//Username to use for SMTP authentication
					$mail->Username = "peter.van.der.zande@nbrix.nl";
					//Password to use for SMTP authentication
					$mail->Password = "letmein4now";
					//Set who the message is to be sent from
					$mail->setFrom('no-reply@nbrix.nl', 'NBrIX');
					//Set an alternative reply-to address
					$mail->addReplyTo('no-reply@nbrix.nl', 'NBrIX');
					//Set who the message is to be sent to
					$mail->addAddress('vanderzande@hotmail.com', 'Peter van der Zande');
					//Set the subject line
					$mail->Subject = 'PHPMailer wachtwoord test';
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML($mail_content);
					//Replace the plain text body with one created manually
					$mail->AltBody = 'This is a plain-text message body';
					
					//send the message, check for errors
					if (!$mail->send()) {
						echo "Mailer Error: ";
					} else {
						echo "Een mail met de logingegevens is verstuurd naar ".$email."<br />";
					}
				  } // close if email adres al bestaat in user account.
  				} // close if email adres is dubbel
			}// close if email adres is leeg
		} // while loop
		echo "Er zijn in totaal <b>".$succesvolCount."</b> nieuwe bedrijven en user accounts toegevoegd.";
  		fclose($handle);
	} // close handle




} // close the if post uploadCSV

?>
