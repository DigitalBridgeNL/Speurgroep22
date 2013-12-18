<?php
include('includes/header.php');
if ($_SESSION['myusername'] == '')
{
    echo 'the session is empty';
}
else {
	if (isset($_POST['updatebedrijf'])){
		$user = $_SESSION['myusername'];
		$contactpersoon = $_POST['contactpersoon'];
		$bedrijfsnaam = $_POST['bedrijfsnaam'];
		$adres = $_POST['adres'];
		$postcode = $_POST['postcode'];
		$plaats = $_POST['plaats'];
		$website = $_POST['website'];
		$email = $_POST['email'];
		$telefoonnummer1 = $_POST['telefoonnummer1'];
		$telefoonnummer2 = $_POST['telefoonnummer2'];			
		updatebedrijf($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $user);
	}
?>
<!-- modals voor mijnspeurgroep pagina !-->
<div id="editWWSucces" class="reveal-modal small">
<p> Uw wachtwoord is met succes gereset!</p>
</div>
<div id="editBedrijfSucces" class="reveal-modal small">
<p> Uw gegevens zijn gewijzigd.</p>
<a class="close-reveal-modal">&#215;</a>
</div>

<div id='meldingDetail' class='reveal-modal small'>
<div id="contentMelding"></div>
<a class="close-reveal-modal">&#215;</a>
</div>

<div id="editWW" class="reveal-modal small">
<?php
	// wanneer er op verzenden is geklikt controleer of het e-mail adres bestaat.
	if ( isset( $_POST['editWW'] ) ) {
		echo 'dwadwadwa';
	$passNEW1 = $_POST['password_NEW1'];
	$passNEW2 = $_POST['password_NEW2'];
	if ($passNEW1 == $passNEW2) {
	openDB();
	$getSalt = mysql_query("SELECT salt FROM user WHERE userID='".$_SESSION['myusername']."'");
	$row = mysql_fetch_array($getSalt);
	$salt = $row['salt'];
	$passNEW1 = hash('sha256', $salt.$passNEW1);
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
			<form action="mijnSpeurgroep.php" method="post" class="panel">
				<label>Nieuw wachtwoord: </label>
				<input type="password" name="password_NEW1">
				<label>Wachtwoord nogmaals:</label>
				<input type="password" name="password_NEW2">
				<input type="submit" class="small button" name="editWW" />
			</form>
	<a class="close-reveal-modal">&#215;</a>
</div>
<div class="clear"></div>
<script>
    $( window ).load(function() {
        loadBedrijf();
		loadLogin();
		loadBranche();
		loadPakket();
		loadContract();
		loadMelding();
		loadOfferte();
    });
</script>


<div class="section-container tabs" data-section="tabs">
  <section>
    <p class="title" data-section-title><a href="#section1">Algemeen</a></p>
    <div class="content" data-slug="section1" data-section-content>
      <p>Hier vindt u alle algemene informatie over uw speurgroep account</p>
      <div class="section-container auto" data-section>
        <section>
          <p class="title"><a href="#section1-1">Inloggegevens</a></p>
          <div class="content panel" id="loadLogin">
            <p>Uw login gegevens worden geladen...</p>
          </div>
        </section>
        <section>
          <p class="title"><a href="#section1-2">Contract</a></p>
          <div class="content" id="loadContract">
            <p>Uw contract gegevens worden geladen...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section1-3">Gekozenbranches</a></p>
          <div class="content" id="loadBranches">
            <p>Uw branches worden geladen...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section1-4">Pakketkeuze</a></p>
          <div class="content" id="loadPakket">
            <p>Uw pakketkeuze wordt geladen...</p>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section1-5">Bedrijfsgegevens</a></p>
          <div class="content" id="loadBedrijf">
            <p>Uw bedrijfsgegevens worden geladen...</p>
          </div>
        </section>
    </div>
	</div>
  </section>
  <section>
    <p class="title" data-section-title><a href="#">Meldingen</a></p>
    <div class="content" data-slug="section2" data-section-content>
      <p>Hier vindt u alle informatie met betrekking tot meldingen, offertes van consumenten en nieuwsbrieven van speurgroep.</p>
	  <div class="section-container auto" data-section>
        <section>
          <p class="title"><a href="#section2-1">Offertes</a></p>
          <div class="content" id="loadOffertes">
         	
          </div>
        </section>
        <section>
          <p class="title"><a href="#section2-2">Mededelingen</a></p>
          <div class="content">
              <table>
             	<thead><th>Datum</th><th>Onderwerp</th><th>open</th></thead>
                <tbody id="loadMelding"></tbody>
              </table>
          </div>
        </section>
		<section>
          <p class="title"><a href="#section2-3">Nieuwsbrieven</a></p>
          <div class="content">
            <p>De nieuwsbrieven worden geladen...</p>
          </div>
        </section>
    </div>
    </div>
  </section>
</div>




<?php
include('includes/modals.php');
include('includes/footer.php');
}
?>