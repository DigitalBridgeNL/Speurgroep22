<?php
include('includes/header.php');
?>
<!-- Start van Contact categorie !-->
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
				Email adres: <small>required</small>
				</td>
				<td>
				<input type="email" name="email" required>
				<small class="error">Vul een e-mail adres in</small>
				</td>
			</tr>
			<tr>
				<td>
				Wachtwoord: <small>required</small>
				</td>
				<td>
				<input type="password" name="wachtwoord" required>
				<small class="error">Wachtwoord is vereist</small>
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