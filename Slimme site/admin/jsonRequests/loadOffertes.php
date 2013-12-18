<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('../../includes/DBinteraction.php');
		openDB();
		$result = mysql_query("SELECT o.offerte_id as offerte_id, be.bedrijfsnaam as bedrijfsnaam,  br.naam as branchenaam, o.consumer_mail as consumermail, o.omschrijving FROM offerte o, branche br, bedrijf be, user u WHERE u.userID = be.userid AND u.brancheID = br.brancheid AND be.bedrijfsid = o.bedrijf_id");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>