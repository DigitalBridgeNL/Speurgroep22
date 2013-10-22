<?php
include('includes/header.php');
?>
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

<div id="login_pakketten" class="reveal-modal medium">
<p class="grey_titel"> Inloggen </p>
<div class="large-6 columns">
	<form data-abide action="includes/verifyUser2.php" method="post">
		<label>Email adres:</label>
		<input type="email" name="email" required>
		<small class="error">Vul een e-mail adres in</small>
		<label>Wachtwoord: </label>
		<input type="password" name="wachtwoord" required>
		<small class="error">Wachtwoord is vereist</small>
		<input type=image alt="submit" class="right" src="images/inloggen.png" width="125px" height="50px"/>
	</form>
</div>
<div class="large-6 columns">
	<div class="panel">
		<p>Tekst waarom er ingelogd moet worden en dat er een mailtje is gestuurd met inlog gegevens. Indien deze niet is ontvangen kunnen zij contact opnemen met het email adres info@speurgroep.nl of direct een link maken waarbij ze hun account kunnen opvragen.</p>
	</div>
</div>
<a class="close-reveal-modal">&#215;</a>
</div>
<div id="wachtwoordAanmaken" class="reveal-modal medium">
<?php 

if (isset($_POST['wachtwoordAanmaken'])){
echo "<script type='text/javascript'> $(document).ready(function() { $('#editWW').foundation('reveal', 'open'); }); </script>";
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
<!-- Start van Contact categorie !-->
<div class="clear"></div>
<div class="loginLeft">
<?php get_contentPage(20); ?>
<a href="#" class="right" data-reveal-id="wachtwoordAanmaken"><img src="images/wachtwoordaanmaken.png" width="125px" height="50px" /></a>
</div>

<div class="loginRight">
	<p> Inloggen </p>
	<form data-abide action="includes/verifyUser.php" method="post">
		<table>
			<tr>
				<td>
				Email adres: <small>required</small>
				</td>
				<td>
				<input type="email" name="email" required>
				<small class="error">Vul een e-mail adres in</small>
				</td>
			</tr>
			<tr>
				<td>
				Wachtwoord: <small>required</small>
				</td>
				<td>
				<input type="password" name="wachtwoord" required>
				<small class="error">Wachtwoord is vereist</small>
				</td>
			</tr>
		</table>
		<a href="#" data-reveal-id="wachtwoordVergeten">Wachtwoord vergeten?</a>
		<input type=image alt="submit" src="images/inloggen.png" width="125px" height="50px"/>
	</form>
</div>



<?php 
include('includes/modals.php');
include('includes/footer.php');
?>