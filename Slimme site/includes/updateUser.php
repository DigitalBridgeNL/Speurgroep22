<?php
include('header.php');
?>
<div class="clear"></div>
<p class="grey_titel"> Controleer uw gegevens </p>
<?php
$previous_url = $_SERVER['HTTP_REFERER']; // plaats de voorgaande URL in de variable
	// onderstaande zorgt ervoor dat wanneer er op een hyperlink wordt geklikt voor het opslaan van de gegevens de mysql insert function wordt geinitieerd.
	if (isset($_POST['update'])) // als het formulier submitted is doe onderstaande
	{
			$user = $_SESSION['myusername'];
			$hoofdgroep = $_POST['hoofdgroep'];
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
			$profielfoto = generateRandomcode(8).($_FILES['profielfoto']['name']);
			$foto1 = generateRandomcode(8).($_FILES['foto1']['name']);
			$foto2 = generateRandomcode(8).($_FILES['foto2']['name']);
			$foto3 = generateRandomcode(8).($_FILES['foto3']['name']);
			$foto4 = generateRandomcode(8).($_FILES['foto4']['name']);
			$foto5 = generateRandomcode(8).($_FILES['foto5']['name']);
			$foto6 = generateRandomcode(8).($_FILES['foto6']['name']);
			$foto7 = generateRandomcode(8).($_FILES['foto7']['name']);
			$foto8 = generateRandomcode(8).($_FILES['foto8']['name']);
			
			// Maak een tijdelijk tekst bestand aan waar de POST data in opgeslagen wordt.
			$filename = '../files/'.generateRandomcode(8).'bestelling.txt';// Het pad waar het bestand wordt opgeslagen.
			$_SESSION['tempFile'] = $filename; // sla de locatie van het bestand op in een sessie voor later gebruik
			$tempFile = fopen($filename, 'w') or die("can't open file");
			fclose($tempFile);	// sluit het bestand
			$content = serialize(array('user' => $user, 'contactpersoon' => $contactpersoon, 'bedrijfsnaam' => $bedrijfsnaam, 'adres' => $adres, 'postcode' => $postcode, 'plaats' => $plaats, 'website' => $website, 'email' => $email, 'telefoonnummer' => $telefoonnummer1, 'telefoonnummer2' => $telefoonnummer2, 'zinbedrijf' => $zinbedrijf, 'bedrijfsvorm' => $bedrijfsvorm, 'jarenervaring' => $jarenervaring, 'aantalmdw' => $aantalmdw, 'kvk' => $kvk, 'profielfoto' => $profielfoto, 'foto1' => $foto1, 'foto2' => $foto2, 'foto3' => $foto3, 'foto4' => $foto4, 'foto5' => $foto5, 'foto6' => $foto6, 'foto7' => $foto7, 'foto8' => $foto8));
			if (is_writable($filename)) {
			if (!$handle = fopen($filename, 'w')) {
				 echo "Gegevens konden niet worden opgeslagen";
				 exit;
			}
		 
			if (fwrite($handle, $content) === FALSE) {
				echo "Kan het bestand niet bewerken ($filename)";
				exit;
			}
		 
			//echo "Success, bestand ($filename) is opgeslagen";
		 
			fclose($handle);
			} 
			else 
			{
			echo "Het bestand is niet aan te passen";
			}
			
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
		}// close if statement check previous URL = pakket 3
		
	if($previous_url == 'http://localhost/adverteren.php?pakket=2') // als pakket keuze 2 (10 euro)
	{
	//Directory waar de foto`s worden opgeslagen
	$target = "../images/"; 
	$target = $target . $profielfoto;
	
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['profielfoto']['tmp_name'], $target)) 
	{
	 $uploadfotosucces = 1;
	}
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
	}// close if statement check previous URL = pakket 2
	
	if($previous_url == 'http://localhost/adverteren.php?pakket=1') // als pakket keuze 1 (30 euro)
	{
	//Directory waar de foto`s worden opgeslagen
	$target = "../images/"; 
	$targetp = $target . $profielfoto;
	$target1 = $target . $foto1;
	$target2 = $target . $foto2;
	$target3 = $target . $foto3;
	$target4 = $target . $foto4;
	$target5 = $target . $foto5;
	$target6 = $target . $foto6;
	$target7 = $target . $foto7;
	$target8 = $target . $foto8;

	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['profielfoto']['tmp_name'], $targetp)) 
	{
	 $uploadfotosucces = 'p';
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto1']['tmp_name'], $target1)) 
	{
	 $uploadfotosucces = 1;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto2']['tmp_name'], $target2)) 
	{
	 $uploadfotosucces = 2;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto3']['tmp_name'], $target3)) 
	{
	 $uploadfotosucces = 3;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto4']['tmp_name'], $target4)) 
	{
	 $uploadfotosucces = 4;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto5']['tmp_name'], $target5)) 
	{
	 $uploadfotosucces = 5;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto6']['tmp_name'], $target6)) 
	{
	 $uploadfotosucces = 6;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto7']['tmp_name'], $target7)) 
	{
	 $uploadfotosucces = 7;
	}
	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['foto8']['tmp_name'], $target8)) 
	{
	 $uploadfotosucces = 8;
	}
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
	}
	
	}//close if statement that checks if form has been submitted

?>
<div class="row">
<div class="large-12 columns panel callout">
<p> Indien uw gegevens niet correct zijn, klik dan op de terug knop hieronder. Ga anders verder met bestellen door op de knop volgende te klikken </p>
</div>

<a class="button left" href="../test.php">Terug</a>
<a class="button right" href="../betaling.php">Verder</a>
</div>