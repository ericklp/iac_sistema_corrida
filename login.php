<?php

session_start();

check_user_login();


function check_user_login()
{
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "mydb";
	$res;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT nomeCompleto, rg,cpf,email,senha, sexo,telefone, telefoneEmer, nomeEmer, parentesco, passaporte, modalidade, camiseta, kit FROM candidato 
			WHERE email = '" .$_POST['login']. "'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	$row = $result->fetch_assoc();
    	$_SESSION["newsession"]=$row;
    	if($_POST["pass"]==$row["senha"])
    		$res=1; //usuario existe e senha correta
    	else
    		$res=0;
    	error_log("newsession:".json_encode($_SESSION["newsession"]));
	} else {
	    error_log("No results, user not created!");
	    $res=2;
	}

	$conn->close();

	echo $res;
}

function getData()
{
	echo json_decode($_SESSION["newsession"]);
}

?>