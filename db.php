<?php
	define('HOST','localhost');
	define('USER', 'root');
	define('PASSWORD','');
	define('DATABASE','panda');


	$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	if(!$db){
		echo 'connection e ghapla ase';
	}

?>