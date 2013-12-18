<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" ng-app > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Speurgroep | Admin panel</title>
  <link rel="stylesheet" href="../../css/normalize.css" />
  <link href="../../css/header.css" rel="stylesheet" type="text/css" />
  <link href="../../css/foundation.css" rel="stylesheet">
  <meta content="text/html; charset=utf-8" http-equiv="content-type" />
  <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="../../js/jquery.form.js"></script>
  <script type="text/javascript" src="../../js/json.js"></script>
  <link href="css/edit.css" rel="stylesheet" type="text/css">
  <link href="css/berichten.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include('../includes/DBinteraction.php'); 
?>
<div class="center">
<div class="logo">
<img src="../../images/logo_2.png" width="200px" height="64px" />
</div>

<nav class="mainNav">
		<ul>
        	<li><a href="../index.php">Speurgroep</a></li>
            <li><a href="edit.php">Pagina editor</a></li>
        	<li><a href="berichten.php">Berichten beheren</a></li>
            <li><a href="<?php echo $host;?>contact.php">Contact</a></li>
        	<li><a href="<?php echo $host;?>helpNinfo.php?page=1">Help en Info</a></li>
		</ul>
</nav>