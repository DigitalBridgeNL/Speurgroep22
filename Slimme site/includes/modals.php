<!-- modals voor mijnspeurgroep pagina !-->
<div id="editWWSucces" class="reveal-modal small">
<p> Uw wachtwoord is met succes gereset!</p>
</div>

<div id="editWW" class="reveal-modal small">
<?php
	// wanneer er op verzenden is geklikt controleer of het e-mail adres bestaat.
	if ( isset( $_POST['editWW'] ) ) {
	$passNEW1 = $_POST['password_NEW1'];
	$passNEW2 = $_POST['password_NEW2'];
	if ($passNEW1 == $passNEW2) {
	openDB();
	$sql="UPDATE user SET password='$passNEW1' WHERE userID='".$_SESSION['myusername']."'";
	$result=mysql_query($sql) or die('Error : '.mysql_error());
	closeDB();
	echo "<script type='text/javascript'> $(document).ready(function() { $('#editWWSucces').foundation('reveal', 'open'); }); </script>";
	}
	else {
	echo '<p>Wachtwoorden komen niet overeen, probeer opnieuw</p>';
	echo "<script type='text/javascript'> $(document).ready(function() { $('#editWW').foundation('reveal', 'open'); }); </script>";
	}}
?>
		<p class="grey_titel"> Wachtwoord aanpassen </p>
			<form data-abide action="" method="post" class="panel">
				<label>Nieuw wachtwoord: <small>required</small></label>
				<input type="password" name="password_NEW1" required>
				<label>Wachtwoord nogmaals: <small>required</small></label>
				<input type="password" name="password_NEW2" required>
				<input type="submit" class="small button" name="editWW" />
			</form>
	<a class="close-reveal-modal">&#215;</a>
</div>

<!-- modals voor inloggen pagina !-->
<div id="wachtwoordAanmaken" class="reveal-modal medium">
<?php
	if ( isset( $_POST['wachtwoordAanmaken'] ) ) {
		openDB();
		$myusername=$_POST['emailadres'];
		$password = $_POST['wachtwoord'];
		// To protect MySQL injection (more detail about MySQL injection )
		$myusername = stripslashes($myusername);
		$myusername = mysql_real_escape_string($myusername);
		openDB();
		$sql="SELECT * FROM user WHERE username='$myusername'";
		$result=mysql_query($sql) or die('Error : '.mysql_error());
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		if($count==1){
		echo '<p>e-mail adres is al in gebruik</p><br /><a href="#" data-reveal-id="wachtwoordVergeten">Wachtwoord vergeten?</a>';
		echo "<script type='text/javascript'> $(document).ready(function() { $('#wachtwoordAanmaken').foundation('reveal', 'open'); }); </script>";
		}
		else
		{
		openDB();
		$sql="INSERT INTO user (userID, username, password) VALUES ('NULL', '$myusername', '$password')";
		$result=mysql_query($sql) or die('Error : '.mysql_error());
		}
		}
?>

<script type="text/javascript">
function valid()
{
if(document.register.emailadres.value == "")
{
alert ("Vul een Email adres in")
document.register.emailadres.focus();
return false;
}
if(document.register.wachtwoord.value == "")
{
alert ("Vul je wachtwoord in")
document.register.wachtwoord.focus();
return false;
}
if(document.register.wachtwoord2.value == "")
{
alert ("Vul nogmaals je wachtwoord in")
document.register.wachtwoord2.focus();
return false;
}

if(document.register.wachtwoord2.value !=  document.register.wachtwoord.value)
{
alert ("Wachtwoorden zijn niet gelijk")
document.register.wachtwoord.focus();
return false;
}
}
</script>
	<p class="grey_titel">Wachtwoord aanmaken</p>
	<form class="custom panel" method="post" action="" name="register" onsubmit="return valid();">
	<div class='row'>
		<div class='large-9 columns'>
			<label>Vul hier uw e-mail adres in:</label><input type='email' name='emailadres' />
			<label>Vul hier uw wachtwoord in:</label><input type='password' name='wachtwoord' />
			<label>Vul nogmaals uw wachtwoord in:</label><input type='password' name='wachtwoord2' />
			<label for="checkbox1"><input type="checkbox" id="checkbox1" style="display: none;" name="accept" required><span class="custom checkbox"></span> Ja , ik accepteer de <a href="helpNinfo.php?page=14">gebruikersvoorwaarden en privacybeleid</a>.<br />(tevens wordt u op de hoogte gebracht van informatie, nieuws, promotie`s, productwijzigingenen alle aanbiedingen van Speurgroep)</label>
            <p><input type="submit" alt="submit" class="small button" name="wachtwoordAanmaken"></p>
		</div>
	</div>
</form>
	
<a class="close-reveal-modal">&#215;</a>
</div>

<div id="wachtwoordVergeten" class="reveal-modal small">
  <?php
	// wanneer er op verzenden is geklikt controleer of het e-mail adres bestaat.
	if ( isset( $_POST['wwsubmit'] ) ) {
	$myusername=$_POST['email'];
	// To protect MySQL injection (more detail about MySQL injection )
	$myusername = stripslashes($myusername);
	$myusername = mysql_real_escape_string($myusername);
	openDB();
	$sql="SELECT * FROM user WHERE username='$myusername'";
	$result=mysql_query($sql) or die('Error : '.mysql_error());
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	if($count==1){
		echo "Er is een e-mail met een activatie code verstuurd naar ".$_POST['email'].".";
		$activatiecode = generateRandomcode(8);
		$sql="UPDATE user SET activatiecode ='$activatiecode' WHERE username='$myusername'";
		mysql_query($sql) or die('Error : '.mysql_error());
		//functie staat in DBinteraction
		sendActivationMail($myusername, $activatiecode);
	}
	else {
	echo 'Het ingevoerde email adres is niet bij ons bekend. Probeert u het opnieuw.';
	}
	// open reveal modal zodat de gebruiker bericht kan krijgen over het ingevoerde email adres
	echo "<script type='text/javascript'> $(document).ready(function() { $('#wachtwoordVergeten').foundation('reveal', 'open'); }); </script>";
	}
	
	// als het count niet 1 is, laat het formulier zien.
	if($count==!1){ ?>
    <p class="grey_titel">Wachtwoord vergeten?</p>
	<form data-abide action="" method="post" class="panel">
		<label>E-mail adres: <small>required</small></label>
		<input type="email" name="email" required>
		<small class="error">Vul een e-mail adres in</small>
		<input type="submit" class="small button" name="wwsubmit" />
	</form>
	<?php }?>
	<p><a href="#" data-reveal-id="activatieCode">Activatie code invoeren?</a></p>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="wwSucces" class="reveal-modal small">
<p class="grey_titel"> Uw wachtwoord is met succes gereset. U kunt nu hier inloggen </p>
<form data-abide action="includes/verifyUser.php" method="post">
	<label>Email adres: <small>required</small></label>
	<input type="email" name="email" required>
	<small class="error">Vul een e-mail adres in</small>
	<label>Wachtwoord: <small>required</small></label>
	<input type="password" name="wachtwoord" required>
	<small class="error">Wachtwoord is vereist</small>
	<input type=image alt="submit" src="images/inloggen.png" width="125" height="50">
	</form>
<a class="close-reveal-modal">&#215;</a>
</div>


<div id="activatieCode" class="reveal-modal small">
<?php
if ( isset( $_POST['acsubmit'] ) ) {
	$pass1 = $_POST['password1'];
	$pass2 = $_POST['password2'];
	$acode = $_POST['activatiecode'];
	$acode = stripslashes($acode);
	$acode = mysql_real_escape_string($acode);
	if ($pass1 == $pass2)
	{
	openDB();
	$sql="UPDATE user SET password ='$pass1' WHERE activatiecode='$acode'";
	$result=mysql_query($sql) or die('Error : '.mysql_error());
	echo "<script type='text/javascript'> $(document).ready(function() { $('#wwSucces').foundation('reveal', 'open'); }); </script>";
	}
	

}

?>
<p class="grey_titel">Activatie code invoeren</p>
<form data-abide action="" method="post" class="panel">
	<label>Activatie code: <small>required</small></label>
	<input type="text" name="activatiecode" required>
	<small class="error">Vul de activatiecode in</small>
	<label>Nieuw wachtwoord: <small>required</small></label>
	<input type="password" name="password1" required>
	<small class="error">Vul het nieuwe wachtwoord in</small>
	<label>Wachtwoord nogmaals: <small>required</small></label>
	<input type="password" name="password2" required>
	<small class="error">Vul wachtwoord nogmaals in</small>
	<input type="submit" class="small button" name="acsubmit" />
</form>
<a class="close-reveal-modal">&#215;</a>
</div>