<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBinteraction.php');
		$currentuser = $_GET['u'];
		openDB();
		$result = mysql_query("SELECT o.offerte_id as offerte_id, o.consumer_mail as consumermail, o.omschrijving FROM offerte o, branche br, bedrijf be, user u WHERE u.userID = be.userid AND u.brancheID = br.brancheid AND be.bedrijfsid = o.bedrijf_id AND u.userID = '$currentuser'");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}
		// Zet PHP array om naar JSON
		echo json_encode($rows); 			
?>