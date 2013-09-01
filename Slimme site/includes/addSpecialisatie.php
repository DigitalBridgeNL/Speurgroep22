<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		$currentuser = $_GET['id'];
		$currentBranche = $_GET['branche'];
		$specialisatie = $_GET['specialisatie'];
		openDB();
		$updateSpecialisaties = mysql_query("INSERT INTO branche_specialisatie (bs_id, brancheID, specialisatie, userID) VALUES('', '$currentBranche', '$specialisatie', '$currentuser')");
		$specialisaties = specialisaties($currentBranche);
		$rows = array();
		while($r = mysql_fetch_assoc($specialisaties)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>