<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBconnection.php');
		//Get ID from the branche name
		$brancheID = $_GET["branche"];

		if($brancheID)
		{
			$brancheInfo = mysql_query("SELECT * FROM branche WHERE brancheId = $brancheID");
			$row = mysql_fetch_assoc($brancheInfo);
			$branche = $row['naam'];
			$category = $row['categorie'];
			$bedrijven = array();
			$bedrijvenSQL = mysql_query("SELECT bedrijfId FROM bedrijf_branche WHERE brancheId = $brancheID");
			while($bedrijfRow = mysql_fetch_assoc($bedrijvenSQL))
			{
				$bedrijfID = $bedrijfRow['bedrijfId'];
				//Retrieve the name of the bedrijf 
				$bedrijfNameSQL = mysql_query("SELECT * FROM bedrijf WHERE bedrijfId = $bedrijfID");
				$bedrijf = array();
				$row = mysql_fetch_assoc($bedrijfNameSQL);
				$bedrijf['name'] = $row['bedrijfsnaam'];
				$bedrijf['id'] = $row['bedrijfId'];
				$bedrijf['locatie'] = $row['plaats'];
				$bedrijf['kort_bericht'] = $row['kort_bericht'];
				$abonnement = $row['abonnement'];
				$bedrijf['abonnement'] = $abonnement;
				$bedrijven[$abonnement][] = $bedrijf;
			}
			$result = array();
			$result['branche'] = $branche;
			$result['category'] = $category;
			$result['bedrijven'] = $bedrijven;
			// Zet PHP array om naar JSON
			echo json_encode($result);
		}		
		else echo 'N';
?>