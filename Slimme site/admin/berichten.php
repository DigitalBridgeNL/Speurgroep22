<?php
	include('includes/header.php');
?>
<div class="clear"></div>
	<h1> Berichten </h1>
<div class="controls"><!-- alle onderstaande knoppen worden aangestuurd via het bestand json.js located in root/js/json.js!-->
    <button onClick="panelBericht();">Bericht versturen </button>
    <button onClick="panelOfferte();">Offerte overzicht </button>
    <button onClick="panelNieuwsbrief();">Nieuwsbrief uploaden </button>
</div>

<div class="content_berichten">
<!-- alle content wordt pas ingevoerd wanneer er op 1 van bovenstaande knoppen wordt geklikt. Bij elke klik op de knop wordt de voorgaande inhoud verwijderd en wordt de nieuwe inhoud die bij de ingedrukte knop horen toegevoegd aan de div content_berichten!-->
</div>

</div><!-- close div center !-->
