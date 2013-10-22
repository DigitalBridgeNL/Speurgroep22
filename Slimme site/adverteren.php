<?php
include('includes/header.php');
if (!empty($_SESSION['myusername'])){
$user = $_SESSION['myusername'];
$userdetails = get_users_details($user);
$row = mysql_fetch_array($userdetails);
$contactpersoon = $row['contactpersoon'];
$bedrijfsnaam = $row['bedrijfsnaam'];
$adres = $row['adres'];
$postcode = $row['postcode'];
$plaats = $row['plaats'];
$website = $row['website'];
$email = $row['email'];
$telefoonnummer1 = $row['telefoonnummer1'];
$telefoonnummer2 = $row['telefoonnummer2'];
$branche = $row['brancheID'];
}
?>
<script>
    $( window ).load(function() {
		var result = qs('pakket');
		if (result != 1){
			$('#option_pakket1_banner').hide();
			$('#option_pakket1_tekst').hide();
			$('#option_pakket1_specialisatie').hide();
			$('#option_pakket1_extrainfo').hide();
			$('#option_pakket1n2_telefoonnummer').hide();
			$('#option_pakket1_fotos').hide();
			$('#option_pakket1n2_profielfoto').hide();
			if (result == 2){
				$('#option_pakket1n2_telefoonnummer').show();
				$('#option_pakket1n2_profielfoto').show();
			}
		}
    });
</script>
<!-- Start van Contact categorie !-->
<div class="clear"></div>
<p class="grey_titel">Stap 2: Gegevens invullen</p>
<h3> Persoonlijke gegevens </h3>
<form enctype="multipart/form-data" class="custom" name="bestelling" onSubmit="submitForm()" method="post" action="includes/updateUser.php">
<div id="option_pakket1_banner">
<p class="grey_titel"> Kies uw branche(s) </p>
<div class="row panel">
	<div class="large-6 columns">
	  <label for="customDropdown3">Kies uw subgroep voor 1e extra plaatsing</label>
      <select id="customDropdown3" class="medium" name="subgroep1">
<?php
 		//retrieve all types from the database.
        $branches = branches();
        //Create a dropdown option for every type.
        while($row = mysql_fetch_array($branches))
        {
            echo "<option value='".$row['brancheID']."'>".$row['naam']."</option>";
        }
?>
      </select>
	  <label for="customDropdown4">Kies uw subgroep voor 2e extra plaatsing</label>
      <select id="customDropdown4" class="medium" name="subgroep2">
<?php
 		//retrieve all types from the database.
        $branches = branches();
        //Create a dropdown option for every type.
        while($row = mysql_fetch_array($branches))
        {
            echo "<option value='".$row['brancheID']."'>".$row['naam']."</option>";
        }
?>
      </select>
	  <label for="customDropdown5">Kies uw subgroep voor 3e extra plaatsing</label>
      <select id="customDropdown5" class="medium" name="subgroep3">
<?php
 		//retrieve all types from the database.
        $branches = branches();
        //Create a dropdown option for every type.
        while($row = mysql_fetch_array($branches))
        {
            echo "<option value='".$row['brancheID']."'>".$row['naam']."</option>";
        }
?>
      </select>
      </div>
	</div>
</div>
<div id="option_pakket1_tekst">
<p class="grey_titel"> Tekst beschrijving </p>
	<div class="row panel">
      <div class="large-6 columns">
        <label>Textarea Label</label>
        <textarea id="tekstarea" placeholder="Schrijf hier een passende reclametekst voor uw bedrijf (maximaal 250 woorden)" name="tekstbeschrijving"></textarea>
      </div>
    </div>
</div>
<div id="option_pakket1_specialisatie">
<p class="grey_titel"> Gespecialiseerd in: </p>
	<div class="row panel">	
		<div class="large-4 columns" id="specialisaties_chkbox">
        <?php 
			$user = $_SESSION['myusername'];
			$currentbranche = current_branche($user);
				$branche = mysql_fetch_array($currentbranche);
			$specialisaties = specialisaties($branche['brancheID']);
			 while($row = mysql_fetch_array($specialisaties))
        	{
				echo '<label for="checkbox1"><input type="checkbox" name="specialisatie'.$row['bs_id'].'" id="special1"><span class="custom checkbox"></span>'.$row['specialisatie'].'</label>';
			}
		?>
		</div>
        <div class="large-8 columns">
        	<div class="row">
            <p> Voer hier nieuwe specialisaties in voor uw branche die nog niet in de lijst voorkomen. </p>
            <input type="text"  class="left" id="value_specialisatie"/>
            <a href="javascript:;" class="right" onclick="add_specialisatie()"> Toevoegen </a>
            </div>
            <div class="row" id="specialisatie_add">
            </div>
        </div>
	</div>
</div>
<p class="grey_titel"> Uw bedrijfsgegevens </p>
	<div class='row panel'>
		<div class='large-9 columns'>
			<label>Contactpersoon</label><input type='text' name='contactpersoon' value='<?php echo $contactpersoon ?>'/>
			<label>Bedrijfsnaam</label><input type='text' name='bedrijfsnaam' value='<?php echo $bedrijfsnaam ?>'/>
			<label>Woon / Vestigingsadres</label><input type='text' name='adres' value='<?php echo $adres ?>'/>
			<label>Postcode</label><input type='text' name='postcode' value='<?php echo $postcode ?>'/>
			<label>Plaats</label><input type='text' name='plaats' value='<?php echo $plaats ?>'/>
			<label>Website</label><input type='text' name='website' value='<?php echo $website ?>'/>
			<label>E-Mailadres</label><input type='text' name='email' value='<?php echo $email ?>'/>
            <div id="option_pakket1n2_telefoonnummer">
			<label>Telefoonnummer</label><input type='text' name='telefoonnummer1' value='<?php echo $telefoonnummer1 ?>'/>
			<label>Mobiel telefoonnummer</label><input type='text' name='telefoonnummer2' value='<?php echo $telefoonnummer2 ?>'/>
            </div>
		</div>
	</div>
<div id="option_pakket1_extrainfo">
<p class="grey_titel"> Extra informatie</p>
	<div class='row panel'>
		<div class='large-9 columns'>
			<label>Beschrijf in een zin uw bedrijf</label><input type='text' name='1zinbedrijf' />
			<label>Bedrijfsvorm </label><input type='text' name='bedrijfsvorm' />
			<label>Hoeveel jaren ervaring heeft u?</label><input type='number'  name='jarenervaring' />
			<label>Aantal medewerkers</label><input type='number' name='aantalmdw' />
			<label>K.v.K nummer</label><input type='text' name='kvk' />
		</div>
	</div>
</div>

<div class="row">
<div class="large-12 columns panel callout">
<p> Heeft u alle gegevens ingevuld klik dan op de knop verder om door te gaan met uw bestelling. </p>
</div>
<input type="submit" class="button right" value="Verder" name="update" />
</div>
</form>
<?php include('includes/footer.php');?>