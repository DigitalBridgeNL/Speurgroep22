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
			$zinbedrijf = $_POST['1zinbedrijf'];
			$bedrijfsvorm = $_POST['bedrijfsvorm'];
			$jarenervaring = $_POST['jarenervaring'];
			$aantalmdw = $_POST['aantalmdw'];
			$kvk = $_POST['kvk'];
			$profielfoto = ($_FILES['profielfoto']['name']);
			$foto1 = ($_FILES['foto1']['name']);
			$foto2 = ($_FILES['foto2']['name']);
			$foto3 = ($_FILES['foto3']['name']);
			$foto4 = ($_FILES['foto4']['name']);
			$foto5 = ($_FILES['foto5']['name']);
			$foto6 = ($_FILES['foto6']['name']);
			$foto7 = ($_FILES['foto7']['name']);
			$foto8 = ($_FILES['foto8']['name']);
			
			// Gegevens weergeven die ongeacht welk pakket altijd worden weergeven
			echo '
			<div class="row">
				<div class="large-12 columns panel">
					<table>
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
			
		if($previous_url == 'http://speurgroep.digitalbridge.nl/adverteren.php?pakket=3') // als pakket keuze 3 (gratis)
		{
			//Close tags van de standaard gegevens table en div row en column
			echo '	</table>
				</div>
			</div>';
			$pakket = 3;
			updatePakket3($pakket, $user,$contactpersoon,$bedrijfsnaam,$adres,$postcode,$plaats,$website,$email);
		}// close if statement check previous URL = pakket 3
		
	if($previous_url == 'http://speurgroep.digitalbridge.nl/adverteren.php?pakket=2') // als pakket keuze 2 (10 euro)
	{
	//Directory waar de foto`s worden opgeslagen
	$target = "../images/"; 
	$target = $target . basename( $_FILES['profielfoto']['name']);
	
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
					</table></div>';
					if ($uploadfotosucces == 1){
					echo'
					<div class="large-4 columns panel">
					<p> Uw profiel foto </p>
					<img src="'.$target.'" width="100px" height="50" />
					</div>
					';}
					else
					{ 
						echo 'uw foto is niet geupload probeer het opnieuw';
					};
					echo'	
			</div>
			';
			$pakket = 2;
			updatePakket2($pakket, $user,$contactpersoon,$bedrijfsnaam,$adres,$postcode,$plaats,$website,$email, $telefoonnummer1, $telefoonnummer2, $profielfoto);
	}// close if statement check previous URL = pakket 2
	
	if($previous_url == 'http://speurgroep.digitalbridge.nl/adverteren.php?pakket=1') // als pakket keuze 1 (30 euro)
	{
	//Directory waar de foto`s worden opgeslagen
	$target = "../images/"; 
	$targetp = $target . basename( $_FILES['profielfoto']['name']);
	$target1 = $target . basename( $_FILES['foto1']['name']);
	$target2 = $target . basename( $_FILES['foto2']['name']);
	$target3 = $target . basename( $_FILES['foto3']['name']);
	$target4 = $target . basename( $_FILES['foto4']['name']);
	$target5 = $target . basename( $_FILES['foto5']['name']);
	$target6 = $target . basename( $_FILES['foto6']['name']);
	$target7 = $target . basename( $_FILES['foto7']['name']);
	$target8 = $target . basename( $_FILES['foto8']['name']);

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
					</table></div>';
					if ($uploadfotosucces = 'p'){
					echo'
					<div class="large-4 columns panel">
					<p> Uw profiel foto </p>
					<img src="'.$targetp.'" width="100px" height="50" />
					</div>
					';}
					else
					{ 
						echo 'uw foto is niet geupload probeer het opnieuw';
					};
					echo'	
			</div>
			';
			echo '
			<div class="row">
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target1.'" width="100px" height="50"/>
				</a>
			</div>
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target2.'" width="100px" height="50"/>
				</a>
			</div>
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target3.'" width="100px" height="50" />
				</a>
			</div>
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target4.'" width="100px" height="50"/>
				</a>
			</div>
		 </div>
		 <br />
		  <div class="row">
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target5.'" width="100px" height="50"/>
				</a>
			</div>
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target6.'" width="100px" height="50"/>
				</a>
			</div>
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target7.'" width="100px" height="50"/>
				</a>
			</div>
			<div class="large-4 columns">
				<a class="th radius">
				<img src="'.$target8.'" width="100px" height="50"/>
				</a>
			</div>
		 </div>
		 ';
		 $pakket = 1;
		 updatePakket1($pakket, $user,$contactpersoon,$bedrijfsnaam,$adres,$postcode,$plaats,$website,$email, $telefoonnummer1, $telefoonnummer2, $profielfoto, $foto1, $foto2, $foto3, $foto4, $foto5, $foto6, $foto7, $foto8);
	}
	}//close if statement that checks if form has been submitted

?>
<input type="button" value="verder" />