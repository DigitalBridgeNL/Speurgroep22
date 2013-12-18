<?php
include('includes/header.php');
if (isset($_GET['bedrijf'])){
$bedrijf = getBedrijfinfo($_GET['bedrijf']);
$bedrijf = mysql_fetch_array($bedrijf);
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
	if ($bedrijf['pakketid'] == 1 OR $bedrijf['pakketid'] == 2)
	{
	?>
	<img style="margin-left: 4%;" class="panel" src="<?php echo $bedrijf['profielfoto']?>" height="150px" width="150px" />
	<?php }?>
	</div>
	<div class="large-9 columns">
        <div class="row">
        	<div class="large-3 columns panel">
            <p class="smallB12"> Kvk	nummer </p>
            <hr />
            <p class="smallB11"><?php echo $bedrijf['kvknr'];?></p>
            </div>
            <div class="large-3 columns panel">
            <p class="smallB12"> Aantal Medewerkers </p>
            <hr />
            <p class="smallB11"><?php echo $bedrijf['aantalmdwkrs'];?></p>
            </div>
            <div class="large-3 columns panel">
            <p class="smallB12"> Hoeveel jr ervaring </p>
            <hr />
            <p class="smallB11"><?php echo $bedrijf['aantaljarenErvaring'];?></p>
            </div>
            <div class="large-3 columns panel">
            <p class="smallB12"> Bedrijfsvorn </p>
            <hr />
            <p class="smallB11"><?php echo $bedrijf['bedrijfsvorm'];?></p>
            </div>
        </div>
        <div class="row panel">
		 <div class="row">
			<div class="large-12 columns">
			<?php
			if ($bedrijf['pakketid'] == 1)
			{
			?>
			<h6 class="left"> Beschrijving </h6>
			<?php }?>
			<div class="clear"></div>
			<?php
			if ($bedrijf['pakketid'] == 1)
			{
			?>
			<p class="smallTxt">
			</p>
			<h6> Gespecialiseerd in </h6>
			<ul class="no_list smallTxt">
			<?php 
				$brancheID = getbrancheID_basedOnbedrijfid($_GET['bedrijf']);
			$specialisaties = specialisaties($brancheID);
			 while($row = mysql_fetch_array($specialisaties))
        	{
				echo '<li>'.$row['specialisatie'].'<li>';
			}
			?>
			<ul>
			<?php }?>
			</div>
		 </div>
		 <?php
			if ($bedrijf['pakketid'] == 1)
			{
		?>
			<h6> Foto`s </h6>
		 <div class="row">
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto1']; ?>' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto2']; ?>' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto3']; ?>' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto4']; ?>' />
				</a>
			</div>
		 </div>
		 <br />
		  <div class="row">
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto5']; ?>' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto6']; ?>' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto7']; ?>' />
				</a>
			</div>
			<div class="large-3 columns">
				<a class="th radius">
				<img src='<?php echo $bedrijf['foto8']; ?>' />
				</a>
			</div>
		 </div>
		 <br /><br />
		 <?php }?>
			<div class="pakketVB1">
			<div class="large-12 columns panel bg_grey">
			<h6><?php echo $bedrijf['bedrijfsnaam']; ?> </h6>
			<hr />
		<?php
			if ($bedrijf['pakketid'] == 1 OR $bedrijf['pakketid'] == 2)
			{
		?>	
			<p class="blueTxt" id='tel_container' onclick="showtel();"> Toon telefoonnummer </p>
		<?php }?>
			<p><a href="#http://<?php echo $bedrijf['website']; ?>"></a></p>
			<p><?php echo $bedrijf['email']; ?></p>
			<p><?php echo $bedrijf['adres']; ?></p>
			<p><?php echo $bedrijf['postcode'].', '.$bedrijf['plaats']; ?></p>
			<a href="#" class="right"><img src="images/btn_email.png" width="125px" height="50px" /></a>
			</div>
			</div>
		</div>
	</div>
</div>
<?php 
}
else {
	echo 'Geen bedrijf gevonden, zoek opnieuw!';
}
include('includes/footer.php');?>