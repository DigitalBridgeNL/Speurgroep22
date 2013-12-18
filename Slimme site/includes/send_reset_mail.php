<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		$host = 'http://localhost/inloggen.php?';
		$email = $_GET['e'];
		openDB();
		$salt = mysql_query("SELECT * FROM user WHERE username = '$email'");
		$row = mysql_fetch_array($salt);
		$zout = $row['salt'];
		$uid = $row['userID'];
		$random = generateRandomcode(10);
		$activatiecode = hash('sha256', $zout.$random);
		$insertActivation = mysql_query("UPDATE user SET activatiecode = '$activatiecode' WHERE username = '$email'");
		$content = '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html>
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			  <title>Reset Password</title>
			</head>
			<body>
			  <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px; border:1px solid black;">
				<div align="center">
				  <p>Geachte heer / mevrouw,</p>
			<p>We hebben een aanvraag voor het resetten van uw wachtwoord ontvangen. Mocht u dit zelf niet hebben aangevraagd neem dan contact op met applicatiebeheer@speurgroep.nl.</p>
            <p>Indien u deze aanvraag wel hebt ingediend klik dan op de onderstaande link om uw wachtwoord te resetten.</p>
            <a href="'.$host.'r=true&u='.$uid.'&h='.$activatiecode.'">Wachtwoord resetten</a>
				</div>
			  </div>
			</body>
			</html>';
			$sendTo = $email;
			$sendFrom = 'no-reply@speurgroep.nl';
			$onderwerp = 'Wachtwoord reset Mijn Speurgroep';
			$contactpersoon = '';
			$plaintext = '';
			$debug = 0;
			//verstuur een mail naar de persoon waarvan het wachtwoord gerest moet worden.
			mailto($sendTo, $sendFrom, $onderwerp, $content, $contactpersoon, $plaintext, $debug);	
?>