<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBconnection.php');
		//Get ID from the branche name
		$brancheNaam = $_GET["branche"];
		$query = "SELECT id FROM branches WHERE name = '" . $brancheNaam . "'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$brancheID = $row['id'];

		if($brancheID)
		{
			$bedrijven = array();
			$bedrijvenSQL = mysql_query("SELECT * FROM join_bedrijf_branche WHERE branche_id = $brancheID");
			while($bedrijfRow = mysql_fetch_assoc($bedrijvenSQL))
			{
				$bedrijfID = $bedrijfRow['bedrijf_id'];
				//Retrieve the name of the bedrijf
				$bedrijfNameSQL = mysql_query("SELECT name, id FROM bedrijven WHERE id = $bedrijfID");
				$bedrijf = array();
				$row = mysql_fetch_assoc($bedrijfNameSQL);
				$bedrijf['name'] = $row['name'];
				$bedrijf['id'] = $row['id'];
				$bedrijven[] = $bedrijf;
			}
			$bedrijvenDic['bedrijven'] = $bedrijven;
			// Zet PHP array om naar JSON
			echo json_encode($bedrijvenDic);
		}		
		else echo 'N';
?>