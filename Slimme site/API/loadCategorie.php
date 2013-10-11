<?php
		header('Content-type: application/json');
		// Verbinding met de database
		include('DBconnection.php');
		if($result)
		{
			$categories = array();
			while($category = mysql_fetch_assoc($result)) 
			{
				$categoryID = $category['id'];
				$catDic = array(); 
				$catDic['naam'] = $category['naam'];
				//Retrieve all brancheID's belonging to that category
				$branches = array();
				$branchesSQL = mysql_query("SELECT * FROM join_branche_branche_category WHERE category_id = $categoryID");
				while($branche = mysql_fetch_assoc($branchesSQL))
				{
					$brancheID = $branche['branche_id'];
					//Retrieve the name of the branche
					$brancheNameSQL = mysql_query("SELECT name FROM branches WHERE id = $brancheID");
					$row = mysql_fetch_assoc($brancheNameSQL);
					$brancheName = $row['name'];
					$branches[] = $brancheName;
				}
				$catDic['branches'] = $branches;
				$categories[$category['id']] = $catDic;
			}
			// Zet PHP array om naar JSON
			echo json_encode($categories);
		} 			
		else echo 'N';
?>