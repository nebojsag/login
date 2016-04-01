<?php
    $ACC_LVL = 0;	
    require_once "inc/autorizacija.php"; 	
	require_once "inc/dbconnect.php";
	require_once "inc/lib.php";
	$status ='';
	
	if(isset($_POST['akcija']) and $_POST['akcija']=='login'){
		$u = $db->real_escape_string($_POST['username']);
		$p = md5($_POST['password']);
		
		$upit = " SELECT * FROM users WHERE username = '$u' AND password = '$p' ";
		$r = $db->query($upit);
		
		echo $r->num_rows;
		
		if($r->num_rows==1){	
			//korisnik postoji, kombinacija username/password postoji, korisnik ce biti ulogovan
			$user = $r->fetch_object();
			
			$_SESSION['username'] = $user->username;
			$_SESSION['user_id'] = $user->id;
			//$_SESSION['access_level'] = $user->access_level;
			
			//treba da zapamtim da je ulogovan i da redirektujem na home.php
			header("Location: home.php");
			
		} else {
			$status = 'Neuspešan login! Pokušajte ponovo.';
		}
	}
	else if(isset($_REQUEST['akcija']) and $_REQUEST['akcija']=='logout'){
		unset($_SESSION['username']);
		unset($_SESSION['user_id']);
		$_SESSION['access_level'] = 0;
		session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
	<?= $status ?>
	<h1>Login</h1>
	
	<form method="post" action="#">
		<input type="hidden" name="akcija" value="login" />
	    <table>
		  <tr>
		    <td>Korisničko ime&nbsp;</td>
			<td align="right"><input type="text" name="username" value=""/></td> 
		  </tr>
		  <tr>
		    <td align="right">Lozinka&nbsp;</td>
			<td><input type="password" name="password" value=""/></td>
		  </tr>
          <tr>
		  <td></td><td><button>Login</button></td>
          </tr>		  
		</table>		
	</form>
	<br />
	Nemate otvoren nalog? <a href="registracija.php">Registrujte se</a>
	<br/>
</div>
</div>
</div>
</body>
</html>