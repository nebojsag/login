<?php
    $ACC_LVL = 2;
	require_once "inc/dbconnect.php";
	require_once "inc/lib.php";
	$status ='';
	
	if(isset($_GET['obrisi'])){
		$id = $db->real_escape_string($_GET['obrisi']);
		$upit = "DELETE FROM kursevi WHERE id=$id";
		$db->query($upit);
		$status = '<div class="notice">Kurs je obrisan</div>';
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("modules/head.php") ?>
  </head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-sm-12 mainmenu">
		  <nav id="mainmenu">
		    <?php include("modules/nav.php"); ?>
		  </nav>
	    </div>
	  </div>	
	</div>
	<?= $status ?>	
	<h1>Spisak korisnika</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Ime</th>
				<th>Prezime</th>
				<th>Username</th>
				<th>E-mail</th>
				<th>Date created</th>				
			</tr>
		</thead>
		<tbody>
			<?php
				$upit = "SELECT * FROM users ORDER BY date_created";
				$rezultat = $db->query($upit);
				while( $red = $rezultat->fetch_assoc() ){ ?>
					<tr>
						<td><?= $red['first_name'] ?></td>
						<td><?= $red['last_name'] ?></td>
						<td><?= $red['username'] ?></td>
						<td><?= $red['email'] ?></td>
						<td><?= formatirajDatum($red['date_created']) ?></td>						
					</tr>
			<?php } ?>
		</tbody>
	</table>
	<a href="registracija.php" class="btn btn-primary"><img src="img/add.png" /> Create new user</a>
  </div>
</div>
</div>
</body>
</html>