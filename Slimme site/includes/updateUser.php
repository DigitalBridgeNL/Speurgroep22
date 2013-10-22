<?php
include('header.php');
?>
<div class="clear"></div>
<p class="grey_titel"> Stap 3: Controleer uw gegevens </p>
<?php
$previous_url = $_SERVER['HTTP_REFERER']; // plaats de voorgaande URL in de variable
	// onderstaande zorgt ervoor dat wanneer er op een hyperlink wordt geklikt voor het opslaan van de gegevens de mysql insert function wordt geinitieerd.
	if (isset($_POST['update'])) // als het formulier submitted is doe onderstaande
	{
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
			$tekstbeschrijving = $_POST['tekstbeschrijving'];
			$zinbedrijf = $_POST['1zinbedrijf'];
			$bedrijfsvorm = $_POST['bedrijfsvorm'];
			$jarenervaring = $_POST['jarenervaring'];
			$aantalmdw = $_POST['aantalmdw'];
			$kvk = $_POST['kvk'];
			
			// Gegevens weergeven die ongeacht welk pakket altijd worden weergeven
			echo '
			<div class="row panel">
				<div class="large-6 columns">
				<label> <h4>Basis gegevens</h4> </label>
				<hr/>
					<table class="width100">
						<tr>
							<td>Contact persoon</td><td>'.$contactpersoon.'</td>
						</tr>
						<tr>
							<td>Bedrijfsnaam</td><td>'.$bedrijfsnaam.'</td>
						</tr>
						<tr>
							<td>Adres</td><td>'.$adres.'</td>
						</tr>
						<tr>
							<td>Postcode</td><td>'.$postcode.'</td>
						</tr>
						<tr>
							<td>Plaats</td><td>'.$plaats.'</td>
						</tr>
						<tr>
							<td>Website</td><td>'.$website.'</td>
						</tr>
						<tr>
							<td>Email</td><td>'.$email.'</td>
						</tr>
			';
			
		if($previous_url == 'http://localhost/adverteren.php?pakket=3') // als pakket keuze 3 (gratis)
		{
			//Close tags van de standaard gegevens table en div row en column
			echo '	</table>
				</div>
			</div>';
			insert_temp3($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $user);
		}// close if statement check previous URL = pakket 3
		
	if($previous_url == 'http://localhost/adverteren.php?pakket=2') // als pakket keuze 2 (10 euro)
	{
			// Plaats de extra gegevens voor pakket 2 (telefoonnummer en profiel foto)
			echo '		<tr>
							<td>Telefoonnummer</td><td>'.$telefoonnummer1.'</td>
						</tr>
						<tr>
							<td>Mobiel</td><td>'.$telefoonnummer2.'</td>
						</tr>
					</table></div>
			</div>
			';
			insert_temp2($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $user);
	}// close if statement check previous URL = pakket 2
	
	if($previous_url == 'http://localhost/adverteren.php?pakket=1') // als pakket keuze 1 (30 euro)
	{
	echo '
						<tr>
							<td>Mobiel</td><td>'.$telefoonnummer1.'</td>
						</tr>
						<tr>
							<td>Telefoonnummer</td><td>'.$telefoonnummer2.'</td>
						</tr>
					</table>
				</div>
				<div class="large-6 columns">
				<label> <h4>Extra informatie</h4> </label>
				<hr/>
					<table class="width100">
						<tr>
							<td>In 1 zin uw bedrijf</td><td>'.$zinbedrijf.'</td>
						</tr>
						<tr>
							<td>Bedrijfsvorm</td><td>'.$bedrijfsvorm.'</td>
						</tr>
						<tr>
							<td>Aantal jaren ervaring</td><td>'.$jarenervaring.'</td>
						</tr>
						<tr>
							<td>Aantal medewerkers</td><td>'.$aantalmdw.'</td>
						</tr>
						<tr>
							<td>Kvk</td><td>'.$kvk.'</td>
						</tr>
				</table>
				</div>	
			</div>
			<div class="row panel">
			<label> <h4>Tekstbeschrijving</h4> </label>
			<hr/>
				<p>'.$tekstbeschrijving.'</p>
			</div>	
			';
			insert_temp1($contactpersoon, $bedrijfsnaam, $adres, $postcode, $plaats, $website, $email, $telefoonnummer1, $telefoonnummer2, $user, $tekstbeschrijving, $zinbedrijf, $bedrijfsvorm, $jarenervaring, $aantalmdw, $kvk);
	}
	
	}//close if statement that checks if form has been submitted

?>
<div class="row">
<div class="large-12 columns panel callout">
<p> Indien uw gegevens niet correct zijn, klik dan op de terug knop hieronder. Ga anders verder met bestellen door op de knop volgende te klikken </p>
</div>

<a class="button left" href="<?php echo $previous_url ?>">Terug</a>
<a class="button right" href="../betaling.php">Verder</a>
</div>