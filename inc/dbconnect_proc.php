<?php
  // proceduralni pristup konekciji na bazu
  $db = mysqli_connect("localhost", "root", "", "kursevi");
			
  if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
  }
  $upit = 'set names utf8';
  $result = mysqli_query($db, $upit);	
?>