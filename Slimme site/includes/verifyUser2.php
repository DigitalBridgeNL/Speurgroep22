<?php
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="speurgroep"; // Database name
$tbl_name="user"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername=$_POST['email'];
$mypassword=$_POST['wachtwoord'];

// To protect MySQL injection (more detail about MySQL injection )
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$result1 = mysql_query("SELECT * FROM $tbl_name WHERE username='$myusername'") or die('Error : '.mysql_error());
$row1 = mysql_fetch_array($result1);
$zout = $row1['salt'];
$mypassword = hash('sha256', $zout.$mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql) or die('Error : '.mysql_error());

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "index.php"
/*session_register("myusername");
session_register("mypassword");*/
session_start();
$_SESSION["myusername"]= $row['userID'];

header("location:".$_SERVER['HTTP_REFERER']."");
}
else {

header("location:login_notsuccessfull.php");
}
ob_end_flush();
?>