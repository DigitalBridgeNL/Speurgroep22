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

<div class="clear"></div>
<script>
    $( window ).load(function() {
        loadBedrijf();
		loadLogin();
		loadBranche();
		loadPakket();
		loadContract();
		loadMelding();
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
          <div class="content">
            <p>Uw offertes worden geladen...</p>
          </div>
        </section>
        <section>
          <p class="title"><a href="#section2-2">Mededelingen</a></p>
          <div class="content">
              <table>
             	<thead><th>Datum</th><th>Onderwerp</th><th>open</th></thead>
                <tbody id="loadMelding"></tbody>
              </table>
              <div id="meldingdetail"></div>
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