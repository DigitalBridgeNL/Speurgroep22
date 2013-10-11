<?php
$DB = mysql_connect("localhost", "root", "");
	    if (!$DB)
	    {
	        die('Could not connect to the database server: ' . mysql_error());
	    }
      	mysql_select_db("speurgroep", $DB) or die('Could not connect to the database. Database may not exist.' . mysql_error());
		$result = mysql_query("SELECT * FROM branche_categorie");
?>