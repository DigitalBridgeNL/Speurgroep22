<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('../../includes/DBinteraction.php');
		$userid = $_GET['u'];
		$onderwerp = $_GET['onderwerp'];
		$bericht = $_GET['bericht'];
		openDB();
		$insertMelding = mysql_query("INSERT INTO melding VALUES('', NOW(), '$onderwerp', '$bericht')");
		$meldingID = mysql_insert_id();
		$insertMeldingUser = mysql_query("INSERT INTO melding_user VALUES('', '$meldingID', '$userid')");
		$getEmail = mysql_query("SELECT * FROM user WHERE userID = '$userid'");
		$row = mysql_fetch_array($getEmail);
		$email = $row['username'];
		$sendFrom = "no-reply@speurgroep.nl";
		$content = "<p>Geachte Heer / Mevrouw,</p>
					<p>We hebben een bericht voor u. Log in op mijn speurgroep om het bericht in te zien.</p>
					<p>Met vriendelijke groet,</p>
					<p>Speurgroep</p>
		";
		$contactpersoon = '';
		$plaintext = '';
		$debug = 0;
		mailto($email, $sendFrom, $onderwerp, $content, $contactpersoon, $plaintext, $debug);			
?>