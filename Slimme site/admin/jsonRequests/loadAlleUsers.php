<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('../../includes/DBinteraction.php');
		openDB();
		$result = mysql_query("SELECT * FROM user");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>