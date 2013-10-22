<!-- modals voor mijnspeurgroep pagina !-->
<div id="editWWSucces" class="reveal-modal small">
<p> Uw wachtwoord is met succes gereset!</p>
</div>
<div id="editBedrijfSucces" class="reveal-modal small">
<p> Uw gegevens zijn gewijzigd.</p>
</div>

<div id='meldingdetail' class='reveal-modal small'>
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


