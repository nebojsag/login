<?php 
    $ACC_LVL = 0; 
    require_once "inc/autorizacija.php"; 
	require_once "inc/dbconnect.php";
	require_once "inc/lib.php";
	$status ='';
	//session_start();
	
	if(isset($_POST['akcija']) and $_POST['akcija']=='register'){
		//citanje podataka iz forme
		$first_name = $db->real_escape_string($_POST['first_name']);
		$last_name = $db->real_escape_string($_POST['last_name']);
		$username = $db->real_escape_string($_POST['username']);
		$password = $db->real_escape_string($_POST['password']);
		$password2 = $db->real_escape_string($_POST['password2']);
		$email = $db->real_escape_string($_POST['email']);
		
		//validacija
		$validno = true;
		
		//provera passworda
		if($password!=$password2) {
		  $status='Uneti passwordi se ne slazu! <br/>';
		  $validno = false;
		}
		
		// kriptovanje lozinke pre upisa u tabelu
		$password = md5($password);
		
		//provera da li je username zauzet
		$upit = "select 1 from users where username like '$username'";
		$rezultat = $db->query($upit);
		if($rezultat->num_rows != 0){
			$status.='Username je zauzet! <br/>';
			$validno = false;
		}
		
		//provera da li je email zauzet
		$upit = "select 1 from users where email like '$email'";
		$rezultat = $db->query($upit);
		if($rezultat->num_rows != 0) {
			$status.='Email je zauzet! <br/>';
			$validno = false;
		}
		
		if($validno==true) {
			//ako je ok - registracija: insert i email
			$upit = " INSERT INTO users (first_name, last_name, username, password, email) VALUES ('$first_name', '$last_name', '$username', '$password', '$email') ";
			$rezultat = $db->query($upit);
			mail($email, "Potvrda o registraciji", "Hvala sto ste se registrovali. Vas nalog je napravljen.");
			
			header("Location: index.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
	<?= $status ?>
	<h1>New user registration</h1>
	
	<form method="post" action="#" >
		<input type="hidden" name="akcija" value="register" />
	    <table>
		  <tr>
		    <td>First name&nbsp</td><td><input type="text" name="first_name" value="<?php if(isset($first_name)) { echo $first_name; } ?>"/></td>
		  </tr>
		  <tr>
		    <td>Last name&nbsp</td><td><input type="text" name="last_name" value="<?php if(isset($last_name)) { echo $last_name; } ?>"/>
		  </tr>
		  <tr>
		    <td>Username&nbsp;</td><td><input type="text" name="username" value=""/></td>
		  </tr>
		  <tr>
		    <td>Password&nbsp;</td><td><input type="password" name="password" id="password" value=""/></td>
		  </tr>
		  <tr>
		    <td>Repeat password&nbsp;</td><td><input type="password" name="password2" id="password2" value=""/></td>
		  </tr>
		  <tr>
		    <td>Email&nbsp;</td><td><input type="text" name="email" value=""/></td>
		  </tr>
		  <tr>
		    <td></td><td><button>Create account</button></td>
		  </tr>
		</table>
	</form>
</div>
</div>
</div>
</body>
</html>