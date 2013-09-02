<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		openDB();
		$category = $_GET["id"];
		$result = mysql_query("SELECT * FROM branche WHERE branche_categoryID = $category");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>