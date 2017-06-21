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

	$nomeCompleto 	= $_SESSION["newsession"]['nomeCompleto'];
	$cpf 			= $_SESSION["newsession"]['cpf'];
	$sexo 			= $_SESSION["newsession"]['sexo'];
	$modalidade     = strtoupper($sexo." ".$_POST['id']);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
/*	$sql = "SELECT idmodalidade FROM modalidade WHERE modalidade=$modalidade";

	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    	$row = $result->fetch_assoc();
    	error_log("idmodalidade: " . $row["idmodalidade"]);
    	$idModalidade=$row["idmodalidade"];
	} else {
	    error_log("No results, modalidade nao existe!");
	    echo 0;
	}
*/
	$sql = "UPDATE candidato SET modalidade='$modalidade' WHERE cpf='$cpf';";

	if ($conn->query($sql) === TRUE) {
	    error_log("Modalidade updated successfully");
	    $_SESSION["newsession"]['modalidade'] = $modalidade;
	    echo 1;
	} else {
	    error_log("update error:" . $conn->error);
	    echo 0;
	}

	$conn->close();
}


?>