<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		$host = 'http://localhost/inloggen.php?';
		$email = $_GET['e'];
		openDB();
		$result = mysql_query("SELECT * FROM user WHERE username = '$email'");	
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 	
?>