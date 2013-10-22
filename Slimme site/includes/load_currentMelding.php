<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		$current_meldingID = $_GET['id'];
		openDB();
		$result = mysql_query("SELECT onderwerp, tekst FROM melding WHERE meldingID = '$current_meldingID'");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>