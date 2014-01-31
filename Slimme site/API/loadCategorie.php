<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBconnection.php');
				$catDic = array(); 
				//Retrieve all brancheID's belonging to that category
				$branches = array();
				$branchesSQL = mysql_query("SELECT * FROM branche");
				while($row = mysql_fetch_assoc($branchesSQL))
				{
					$brancheID = $row['brancheID'];
					$naam = $row['naam'];
					$categorie = $row['categorie'];
					$branche['naam'] = $naam;
					$branche['id'] = $brancheID;
					$catDic[$categorie][] = $branche;
				}
				$result = array();
				foreach($catDic as $key=>$value)
				{
					$branches = $catDic[$key];
					$cat['category'] = $key;
					$cat['branches'] = $branches; 
					$result[] = $cat;
				}
			// Zet PHP array om naar JSON
			echo json_encode($result);
?>