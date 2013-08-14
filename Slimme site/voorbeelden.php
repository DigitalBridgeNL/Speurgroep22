<?php
include('includes/header.php');
?>
<script>
    $( window ).load(function() {
    });
	
	function showtel() {
		$('#tel_container').html('013-5321456');
	};
</script>
<!-- Start van Contact categorie !-->
<div class="clear"></div>
<div class='row'>
	<div class='large-3 columns'>
	<?php
	if ($_GET['page'] == 1 OR $_GET['page'] == 2)
	{
	?>
	<img class="panel" src="images/voorbeeld_logo.png" height="150px" width="150px" />
	<?php }?>
	</div>
	<div class="large-9 columns">
		<div class="row">
			<p class="grey_titel"> Slogan bedrijf.... </p>
		</div>
		<div class="row bgadvertentie">
		 <div class="row">
			<div class="large-12 columns">
			<?php
			if ($_GET['page'] == 1)
			{
			?>
			<h6 class="left"> Beschrijving </h6>
			<?php }?>
			<p class="right smallTxt"> 313 x gezien sinds 1 aug 13 </p>
			<div class="clear"></div>
			<?php
			if ($_GET['page'] == 1)
			{
			?>
			<p class="smallTxt"> Het slaginspercentage van onze rijschool is hoger dan het kringgemiddelde. <br />
			Onze rijschool bestaat sinds 190, dus we zijn al meer dan 20 jaar een begrip in Heerhugowaard, Alkmaar en omgeving. <br />
			Wij lessen met moderne auto`s: Hyundai i30 en Toyota Auris. <br />
			Wij zijn aangesloten bij de BOVAG, dus kwaliteit gegarandeerd! <br />
			Je lest altij dmet dezelfde instructeur en dezelfde auto. <br />
			Als je een tussentijdse toetsneemt, krijg je er gratis examengarantie bij! <br />
			Onze instructueurs geven geen advies op een intrest van ongeveer 1 of 2 uur. Wij vinden dat we in 2 uur tijd geen betrouwbaar advies kunnen geven. Je krijgt tijedns de gehele opleiding een betrouwbaar advies dat eventueel bijgesteld kan worden. Je zit dus nooit aan teveel lessen vast. <br />
			Wij hebben een instructice die is opgeleid in het geven van rijles aan mensen met rij- en faalangst en autisme. <br />
			Lespakketten vanaf EUR 1.130-, <br />
			Lesprijzen vanaf EUR 29,50 per les (50 min). <br />
			</p>
			<h6> Gespecialiseerd in </h6>
			<ul class="no_list smallTxt">
				<li>B</li>
				<li>BE</li>
				<li>A</li>
			<ul>
			<?php }?>
			</div>
		 </div>
		 <?php
			if ($_GET['page'] == 1)
			{
		?>
			<h6> Foto`s </h6>
		 <div class="row">
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_1.png' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_2.png' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_3.png' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_4.png' />
				</a>
			</div>
		 </div>
		 <br />
		  <div class="row">
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_5.png' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_6.png' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_7.png' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='../images/foto_8.png' />
				</a>
			</div>
		 </div>
		 <br /><br />
		 <?php }?>
			<div class="pakketVB1">
			<div class="large-12 columns panel bg_grey">
			<h6> Rijschool Oudeboom </h6>
			<hr />
		<?php
			if ($_GET['page'] == 1 OR $_GET['page'] == 2)
			{
		?>	
			<p class="blueTxt" id='tel_container' onclick="showtel();"> Toon telefoonnummer </p>
		<?php }?>
			<p><a href="#"> www.oudeboom.nl </a></p>
			<p> info@oudeboom.nl </p>
			<p> Kraaivenstraat 28 </p>
			<p> 5039 GJ Tilburg, Noord-Brabant </p>
			<a href="#" class="right"><img src="images/btn_email.png" width="125px" height="50px" /></a>
			</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php');?>