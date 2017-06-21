<?php

session_start();

cadastrar_db();


function cadastrar_db()
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

	$nomeCompleto 	= $_POST['nomeCompleto'] 		!= '' ? $_POST['nomeCompleto'] : "";
	$data 			= $_POST['data'] 				!= '' ? $_POST['data'] : "";
	$rg 			= $_POST['rg'] 					!= '' ? $_POST['rg'] : "";
	$cpf 			= $_POST['cpf'] 				!= '' ? $_POST['cpf'] : "";
	$email 			= $_POST['email'] 				!= '' ? $_POST['email'] : "";
	$password 		= $_POST['password'] 			!= '' ? $_POST['password'] : "";
	$masc 			= $_POST['masc'] 				!= '' ? $_POST['masc'] : "";
	$fem 			= $_POST['fem'] 				!= '' ? $_POST['fem'] : "";
	$telefone 		= $_POST['telefone'] 			!= '' ? $_POST['telefone'] : "";
	$telefoneEmer 	= $_POST['telefoneEmer'] 		!= '' ? $_POST['telefoneEmer'] : "";
	$nomeEmer 		= $_POST['nomeEmer'] 			!= '' ? $_POST['nomeEmer'] : "";
	$parentesco 	= $_POST['parentesco'] 			!= '' ? $_POST['parentesco'] : "";
	$passaporte 	= $_POST['passaporte'] 			!= '' ? $_POST['passaporte'] : 'NULL';

	$sexo = $masc ? 'MASCULINO' : 'FEMININO';
	
	$sql = "INSERT INTO candidato (nomeCompleto, rg,cpf,email,senha, sexo,telefone, telefoneEmer, nomeEmer, parentesco, passaporte, classificacao_idclassificacao, modalidade_idmodalidade, pacote_idpacote, camiseta_idcamiseta ) VALUE ( '$nomeCompleto', '$rg', '$cpf', '$email', '$password', '$sexo', '$telefone', '$telefoneEmer', '$nomeEmer', '$parentesco', $passaporte, '0', '99', '3', '0');";

	if ($conn->query($sql) === TRUE) {
	    error_log("New record created successfully");
	    echo 1;
	} else {
	    error_log("insert error:" . $conn->error);
	    echo 0;
	}

	$conn->close();

	// Update session variable in order to use it later on...
	$session = array(
		'nomeCompleto' 	 				=> $nomeCompleto, 	
		'data' 			 				=> $data, 			
		'rg' 			 				=> $rg, 			
		'cpf' 			 				=> $cpf, 			
		'email' 			 			=> $email, 			
		'password' 		 				=> $password, 		
		'sexo' 							=> $sexo,
		'telefone' 		 				=> $telefone, 		
		'telefoneEmer' 	 				=> $telefoneEmer, 	
		'nomeEmer' 		 				=> $nomeEmer, 		
		'parentesco' 	 				=> $parentesco, 	
		'passaporte' 					=> $passaporte,
	);

	$_SESSION["newsession"]=$session;

	error_log("cadastrar.php: ".json_encode($_SESSION["newsession"]));
}

?>	