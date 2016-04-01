<?php	
	session_start();
    
    /*	
	if(!isset($_SESSION['username'])){
	  header('Location: login.php');
	  die();
	}
	*/
	if( !isset($_SESSION['access_level'])) {
	  $_SESSION['access_level'] = 0; 
	}
    	  
	if( $_SESSION['access_level'] < $ACC_LVL ){
		echo 'Neautorizovani pristup!';
		echo '<br /><br /><a href="index.php">Login</a>';
		session_destroy();
		die();				
	}
?>