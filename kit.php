<?php

session_start();
update_modalidade();

function update_modalidade()
{
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "mydb";
	$res;

	$cpf 			= $_SESSION["newsession"]['cpf'];
	$sexo 			= $_SESSION["newsession"]['sexo'];
	$camiseta 		= strtoupper($sexo." ".$_POST['tamanho']);
	$kit			= strtoupper($_POST['idKit']);



	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "UPDATE candidato SET kit='$kit',camiseta='$camiseta' WHERE cpf='$cpf';";

	if ($conn->query($sql) === TRUE) {
	    error_log("Kit data updated successfully");
	    $_SESSION["newsession"]['kit'] = $kit;
	    $_SESSION["newsession"]['camiseta'] = $camiseta;
	    echo 1;
	} else {
	    error_log("update error:" . $conn->error);
	    echo 0;
	}

	$conn->close();
}

?>