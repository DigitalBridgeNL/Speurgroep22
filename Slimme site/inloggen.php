<?php
include('includes/header.php');
?>
<div id="wachtwoordVergeten" class="reveal-modal small">

<div class="alert-box alert" style="display:none;">
  Gebruikersnaam bestaat niet, voer een bestaande gebruikersnaam in.
  <a href="" class="close">&times;</a>
</div>

<p>Vul uw e-mail adres in, om uw wachtwoord te resetten.</p>
<form>
	<input id="emailF" name="emailF" type="text" placeholder="Email" /> 
</form>
<a href="#" class="small button" onClick="request_reset_password();">Versturen</a>
</div>
<div class="clear"></div>
<div class="loginLeft">
<?php get_contentPage(20); ?>
<a href="#" class="right" data-reveal-id="wachtwoordAanmaken"><img src="images/wachtwoordaanmaken.png" width="125px" height="50px" /></a>
</div>

<div class="loginRight">
	<p> Inloggen </p>
	<form data-abide action="includes/verifyUser.php" method="post">
		<table>
			<tr>
				<td>
				Email adres:
				</td>
				<td>
				<input type="email" name="email" required>
				</td>
			</tr>
			<tr>
				<td>
				Wachtwoord:
				</td>
				<td>
				<input type="password" name="wachtwoord" required>
				</td>
			</tr>
		</table>
		<a href="#" data-reveal-id="wachtwoordVergeten">Wachtwoord vergeten?</a>
		<input type=image alt="submit" src="images/inloggen.png" width="125px" height="50px"/>
	</form>
</div>



<?php 
include('includes/modals.php');
include('includes/footer.php');
?>