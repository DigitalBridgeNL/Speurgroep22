<?php
include('includes/header.php');
?>
<div id="login_pakket" class="reveal-modal medium">
<p class="grey_titel"> Inloggen </p>
<div class="large-6 columns">
	<form data-abide action="includes/verifyUser2.php" method="post">
		<label>Email adres:</label>
		<input type="email" name="email" required>
		<label>Wachtwoord: </label>
		<input type="password" name="wachtwoord" required>
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
<script>
    $( window ).load(function() {
    });
	
	function checkLogin(key)
	{
		if (document.getElementById("user").value == '')
		{
			$(document).ready(function() { $('#login_pakket').foundation('reveal', 'open'); });	
		}
		else 
		{
			window.location = "http://localhost/adverteren.php?pakket="+key;	
		}
	}
</script>
<div class="clear"></div>
<p class="grey_titel">Stap 1: Pakket kiezen</p>
	<h3 class="centerTxt"> Pakketten </h3>
	<div class="row">
		<div class="large-12 columns panel">
		<p> U staat met uw bedrijfsnaam (op alfabet) op Speurgroep, maar u kunt uw gegevens verder uitbreiden, voor betere plaatsing in de zoekmachines, met een van de onderstaande pakketten.</p>
		<p> Mocht uw bedrijf niet op Speurgroep te vinden zijn, laat het ons weten via info@speurgroep.nl</p>
		</div>
	</div>	
	<div class="row bgpakket">
		<form class="custom">
		<div class="large-6 columns labels">
		<h5>Pakketten</h5>
		<label for="checkbox1"><span></span>Naam van uw bedrijf </label>
		<label for="checkbox2"><span></span>Adresgegevens </label>
		<label for="checkbox3"><span></span>Telefoonnummer </label>
		<label for="checkbox1"><span></span>Mobiele telefoonnummer </label>
		<label for="checkbox2"><span></span>Internet adres </label>
		<label for="checkbox3"><span></span>E-mailadres </label>
		<label for="checkbox1"><span></span>Vermelding 1e pagina in door u gekozen regio </label>
		<label for="checkbox2"><span></span>Banner landelijk </label>
		<label for="checkbox3"><span></span>Extra informatie </label>
		<label for="checkbox1"><span></span>3 banners in een andere branche naar keuze </label>
		<label for="checkbox2"><span></span>8 foto`s van uw bedrijf / werk </label>
		<label for="checkbox3"><span></span>1 profielfoto / logo </label>
		<label for="checkbox1"><span></span>250 woorden op uw eigen pagina </label>
		<label for="checkbox2"><span></span>Eigen beheerpagina </label>
		<label for="checkbox3"><span></span>Gratis offerte ontvangen </label>
		</div>
		<div class="large-2 columns">
		<h5>1</h5>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<a href="voorbeelden.php?page=1" class="left">Voorbeeld</a>
		<p class='left'>EUR 30,00 p/mnd</p>
        <a href="#" class="left" onClick="checkLogin(1)">Bestellen </a>
		</div>
		<div class="large-2 columns">
		<h5>2</h5>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<a href="voorbeelden.php?page=2" class="left">Voorbeeld</a>
		<p class='left'>EUR 10,00 p/mnd</p>
        <a href="#" class="left" onClick="checkLogin(2)">Bestellen</a>
		</div>
		<div class="large-2 columns">
		<h5>Gratis</h5>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" CHECKED><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox1"><input type="checkbox" id="special1" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox2"><input type="checkbox" id="special2" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<label for="checkbox3"><input type="checkbox" id="special3" style="display: none;" disabled="disabled" ><span class="custom checkbox"></span> &nbsp; </label>
		<a href="voorbeelden.php?page=3" class="left">Voorbeeld</a>
		<p class='left'>EUR 0,00 p/mnd</p>
        <a href="#" class="left" onClick="checkLogin(3)">Bestellen</a>
		</div>
		</form>
	</div>	
<?php 
include('includes/footer.php');?>