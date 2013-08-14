<?php
include('includes/header.php');
?>
<script>
    $( window ).load(function() {
    });
</script>
<!-- Start van Contact categorie !-->
<div class="clear"></div>
<h3> Stap 1 </h3>
<p class="grey_titel"> Kies uw pakket </p>
<form class="custom panel">
	<div class="row">
		<div class="large-3 columns">
		  <label for="pakket1">
			<input name="pakket1" type="radio" id="pakket1" style="display:none;">
			<span class="custom radio"></span> Pakket 1
		  </label>
		  <label for="pakket2">
			<input name="pakket1" type="radio" id="pakket2" style="display:none;">
			<span class="custom radio"></span> Pakket 2
		  </label>
		  <label for="pakket3">
			<input name="pakket1" type="radio" id="pakket3" style="display:none;">
			<span class="custom radio"></span> Pakket 3
		  </label>
		  <label for="pakket4">
			<input name="pakket1" type="radio" id="pakket4" style="display:none;">
			<span class="custom radio"></span> Banner pakket
		  </label>
		</div>
	</div>
</form>
<p class="grey_titel"> Kies uw branche(s) </p>
<form class="custom panel">
<div class="row">
	<div class="large-6 columns">
      <label for="customDropdown1">Kies uw hoofdgroep</label>
      <select id="customDropdown1" class="medium">
        <option>This is another option</option>
        <option>This is another option too</option>
        <option>Look, a third option</option>
      </select>
	  <label for="customDropdown1">Kies uw subgroep</label>
      <select id="customDropdown1" class="medium">
        <option>This is another option</option>
        <option>This is another option too</option>
        <option>Look, a third option</option>
      </select>
	  <label for="customDropdown1">Kies uw subgroep voor 1e extra plaatsing</label>
      <select id="customDropdown1" class="medium">
        <option>This is another option</option>
        <option>This is another option too</option>
        <option>Look, a third option</option>
      </select>
	  <label for="customDropdown1">Kies uw subgroep voor 2e extra plaatsing</label>
      <select id="customDropdown1" class="medium">
        <option>This is another option</option>
        <option>This is another option too</option>
        <option>Look, a third option</option>
      </select>
	  <label for="customDropdown1">Kies uw subgroep voor 3e extra plaatsing</label>
      <select id="customDropdown1" class="medium">
        <option>This is another option</option>
        <option>This is another option too</option>
        <option>Look, a third option</option>
      </select>
	</div>
</div>
</form>
<p class="grey_titel"> Tekst beschrijving </p>
<form class="panel">
	<div class="row">
      <div class="large-6 columns">
        <label>Textarea Label</label>
        <textarea id="tekstarea" placeholder="Schrijf hier een passende reclametekst voor uw bedrijf (maximaal 250 woorden)"></textarea>
      </div>
    </div>
</form>
<p class="grey_titel"> Gespecialiseerd in: </p>
<form class="custom panel">
	<div class="row">	
		<div class="large-4 columns">
		  <label for="checkbox1"><input type="checkbox" id="special1" style="display: none;"><span class="custom checkbox"></span> A(L) </label>
		  <label for="checkbox2"><input type="checkbox" id="special2" style="display: none;"><span class="custom checkbox"></span> A(Z)</label>
		  <label for="checkbox3"><input type="checkbox" id="special3" style="display: none;"><span class="custom checkbox"></span> AM2</label>
		  <p> Extra`s </p>
		  <label for="checkbox2"><input type="checkbox" id="special2" style="display: none;"><span class="custom checkbox"></span> Rijsimulator</label>
		  <label for="checkbox3"><input type="checkbox" id="special3" style="display: none;"><span class="custom checkbox"></span> Theorieles</label>
		</div>
	</div>
</form>
<p class="grey_titel"> Uw bedrijfsgegevens </p>
<form class="panel">
	<div class='row'>
		<div class='large-9 columns'>
			<label>Contactpersoon</label><input type='text' name='contactpersoon' />
			<label>Bedrijfsnaam</label><input type='text' name='bedrijfsnaam' />
			<label>Woon / Vestigingsadres</label><input type='text' name='adres' />
			<label>Postcode</label><input type='text' name='postcode' />
			<label>Plaats</label><input type='text' name='plaats' />
			<label>Website</label><input type='text' name='website' />
			<label>E-Mailadres</label><input type='text' name='email' />
			<label>Telefoonnummer 1</label><input type='text' name='telefoonnummer1' />
			<label>Telefoonnummer 2</label><input type='text' name='telefoonnummer2' />
		</div>
	</div>
</form>
<p class="grey_titel"> Extra informatie</p>
<form class="panel">
	<div class='row'>
		<div class='large-9 columns'>
			<label>Beschrijf in een zin uw bedrijf</label><input type='text' name='contactpersoon' />
			<label>Bedrijfsvorm </label><input type='text' name='bedrijfsnaam' />
			<label>Hoeveel jaren ervaring heeft u?</label><input type='text' name='adres' />
			<label>Aantal medewerkers</label><input type='text' name='postcode' />
			<label>K.v.K nummer</label><input type='text' name='plaats' />
		</div>
	</div>
</form>
<?php include('includes/footer.php');?>