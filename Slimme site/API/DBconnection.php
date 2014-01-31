<?php
$DB = mysql_connect("localhost", "root", "");
	    if (!$DB)
	    {
	        die('Could not connect to the database server: ' . mysql_error());
	    }
      	mysql_select_db("zjoef", $DB) or die('Could not connect to the database. Database may not exist.' . mysql_error());
?>