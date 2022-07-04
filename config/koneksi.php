<?php  
	date_default_timezone_set('Asia/Makassar');
	
	$HOST 		= 'localhost';
	$USERNAME	= 'root';
	$PASSWORD	= '';
	$DATABASE	= 'prakerja';

	$connection = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    
?>