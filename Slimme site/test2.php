<?php
 //Retrieves data from MySQL 
  // Connects to your Database 
 mysql_connect("db2.hosting2go.nl", "m1_4ebf03ad", "4Lw3zYTx9S") or die(mysql_error()) ; 
 mysql_select_db("m1_4ebf03ad") or die(mysql_error()) ; 
 $data = mysql_query("SELECT * FROM dragons") or die(mysql_error()); 
 //Puts it into an array 
 while($info = mysql_fetch_array( $data )) 
 { 
 
 //Outputs the image and other data
 echo "<img src=http://speurgroep.digitalbridge.nl/images/".$info['foto'] ."> <br>"; 
 }
?>