<?php
include('includes/header.php');
?>
<div class="clear"></div>
<p class="grey_titel">Stap 4: Betaling</p>
<div class="row">
	<div class="large-6 columns">
    <form class="custom" method="post" action="success.php">
    <label for="radio1"><input name="radio1" type="radio" id="radio1" style="display:none;"><span class="custom radio checked"></span> Rekening</label>
      <label for="radio1"><input name="radio1" type="radio" id="radio1" disabled style="display:none;"><span class="custom radio"></span> Ideal</label>
      <label for="radio1"><input name="radio1" type="radio" id="radio1" disabled style="display:none;"><span class="custom radio"></span> Incasso</label>
      <br /><br />
      <input type="submit" class="button success" value="Bestelling afronden" />
    </form>
    </div>
    <div class="large-6 columns">
    	<div class="panel">
        <p> Bij betaling op rekening kunt u de bestelling voltooien door het bedrag van EUR 30,00 over te maken op NL51INGB0006789975 tnv Speurgroep ovv UserID_07102013.</p>
        <p> De betaling zal binnen 1 werkdag worden verwerkt door de administratie. Waarna uw bestelling zal worden geactiveerd. </p>
        </div>
    </div>
    
</div>