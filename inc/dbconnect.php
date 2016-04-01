<?php
			$db = new mysqli("localhost", "root", "", "zadatak");
			if ($db->connect_errno) {
				printf("Connect failed: %s\n", $db->connect_error);
				exit();
			}
			$upit = 'set names utf8';
			$result = $db->query($upit);
			
?>