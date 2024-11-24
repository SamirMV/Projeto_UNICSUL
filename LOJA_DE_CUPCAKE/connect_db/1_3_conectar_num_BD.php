
<?php


	//============================= CONEXAO ==================================		
	$serverName = "localhost";
	$userName = "samir";
	$password = "123";
	//$bancoName = "USUARIOS_DB";

	// Create connection
	$connect_db = new mysqli($serverName, $userName, $password, $bancoName);

	// Check connection
	if ($connect_db->connect_error) 
	{
		die("Connection failed: " . $connect_db->connect_error);
	} 
	//============================= CONEXAO ==================================




?>


