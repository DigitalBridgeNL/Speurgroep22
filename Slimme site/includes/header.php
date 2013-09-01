<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Speurgroep</title>
  <link rel="stylesheet" href="../css/normalize.css" />
  <link href="../css/header.css" rel="stylesheet" type="text/css" />
  <link href="../css/contact.css" rel="stylesheet" type="text/css" />
  <link href="../css/mijnspeurgroep.css" rel="stylesheet" type="text/css" />
  <link href="../css/login.css" rel="stylesheet" type="text/css" />
  <link href="../css/home.css" rel="stylesheet" type="text/css" />
  <link href="../css/helpeninfo.css" rel="stylesheet" type="text/css" />
  <link href="../css/adverteren.css" rel="stylesheet" type="text/css" />
  <link href="../css/foundation.css" rel="stylesheet">
  <script type="text/javascript" src="../js/sha512.js"></script>
  <script type="text/javascript" src="../js/forms.js"></script>
  <script type="text/javascript" src="../js/functions.js"></script>
  <!-- Included JS Files (Compressed) -->
  <script src="../js/foundation/jquery.js"></script>
  <script src="../js/vendor/custom.modernizr.js"></script>
  <script src="../js/json.js"></script>
</head>

<body>
<?php include('DBinteraction.php'); 
$host = 'http://speurgroep.digitalbridge.nl/';
$currentbranche = current_branche($_SESSION['myusername']);
$branche = mysql_fetch_array($currentbranche);
?>
<form>
<input type="hidden" name="user" value="<?php echo $_SESSION['myusername'] ?>" id="user" />
</form>
<form>
<input type="hidden" name="branche" value="<?php echo $branche['brancheID'] ?>" id="branche" />
</form>
<div class="center">
<div class="logo">
<img src="../images/logo_2.png" width="200px" height="64px" />
</div>

<nav class="mainNav">
		<ul>
        	<li><a href="<?php echo $host;?>index.php">Home</a></li>
            <li><a href="<?php echo $host;?>mijnSpeurgroep.php">Mijn Speurgroep</a></li>
        	<li><a href="<?php echo $host;?>inloggen.php">Inloggen</a></li>
            <li><a href="<?php echo $host;?>contact.php">Contact</a></li>
        	<li><a href="<?php echo $host;?>helpNinfo.php?page=1">Help en Info</a></li>
		</ul>
</nav>