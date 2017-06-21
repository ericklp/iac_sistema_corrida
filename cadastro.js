function cadastrar()
{

	var nomeCompleto 	= document.getElementById('nomeCompleto').value;
	var data  			= document.getElementById('data').value;
	var rg 				= document.getElementById('rg').value;
	var cpf 			= document.getElementById('cpf').value;
	var email 			= document.getElementById('email').value;
	var password 		= document.getElementById('password').value;
	var masc 			= document.getElementById('masc').checked;
	var fem 			= document.getElementById('fem').checked;
	var telefone 		= document.getElementById('telefone').value;
	var telefoneEmer 	= document.getElementById('telefoneEmer').value;
	var nomeEmer 		= document.getElementById('nomeEmer').value;
	var parentesco 		= document.getElementById('parentesco').value;
	var passaporte 		= document.getElementById('passaporte').value;


	var values = {nomeCompleto, data, rg, cpf, email, password, masc, fem, 
					telefone, telefoneEmer, nomeEmer, parentesco, passaporte};

	console.log('teste');

	$.ajax({
        url: "cadastrar.php",
        type: "post",
        data: values ,
        success: function (response) {
        	if (response==1){
        		window.location.assign('modalidade.html');
        	}
        	if(response==0){
        		alert('erro ao inserir na tabela');
        	}
        },
        error: function(jqXHR, textStatus, errorThrown) {
           	console.log(textStatus, errorThrown);
        }
    });
}