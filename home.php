<?php 
  $ACC_LVL=0; 
  require_once("inc/autorizacija.php"); 
  require_once("inc/dbconnect.php"); 
  require_once("inc/lib.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("modules/head.php") ?>
	<title>Home page</title>
  </head>
<body class="pocetna">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-sm-12 mainmenu">
		<nav id="mainmenu">
		  <?php include("modules/nav.php"); ?>
		</nav>
	  </div>
	</div>
	<div class="row">
	  <div class="col-sm-12 col-md-9 sadrzaj">
		<?php include_once("modules/user.php"); ?>				
	  </div>			
	</div>
  </div>
</body>
</html>
