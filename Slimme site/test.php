<?php 
 
 //This is the directory where images will be saved 
 $target = "images/"; 
 $target = $target . basename( $_FILES['profielfoto']['name']); 
 
 //This gets all the other information from the form 
 $pic=($_FILES['profielfoto']['name']); 
 function openDB(){
 // Connects to your Database 
 mysql_connect("db2.hosting2go.nl", "m1_4ebf03ad", "4Lw3zYTx9S") or die(mysql_error()) ; 
 mysql_select_db("m1_4ebf03ad") or die(mysql_error()) ; 
 }
 openDB();
 //Writes the information to the database 
 mysql_query("INSERT INTO `dragons` VALUES ('', '$pic')") ; 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['profielfoto']['tmp_name'], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file ". basename( $_FILES['profielfoto']['name']). " has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 }
 
 if (isset($_POST['gege'])){
  //Retrieves data from MySQL 
 openDB();
 $data = mysql_query("SELECT * FROM dragons") or die(mysql_error()); 
 //Puts it into an array 
 while($info = mysql_fetch_array( $data )) 
 { 
 
 //Outputs the image and other data
 echo "<img src=http://www.yoursite.com/images/".$info['foto'] ."> <br>"; 
 }
 }
 ?> 

<form enctype="multipart/form-data" action="" method="POST"> 
<div id="option_pakket1n2_profielfoto">
	<p class="grey_titel"> Voeg uw profiel foto / logo toe</p>
    	<div class='row panel'>
			<div class='large-9 columns'>
            <input type="file" name="profielfoto" />
            </div>
     	</div>
</div>
<input type="submit" value="Add">
<input type="button" name="gege"> 
</form>