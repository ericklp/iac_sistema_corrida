function login()
{
	var login = document.getElementById('input').value;
	var pass  = document.getElementById('inputPassword').value;

	var values = {login, pass};

	var res;

 	$.ajax({
        url: "login.php",
        type: "post",
        data: values ,
        success: function (response) {
        	if (response==1){
        		window.location.assign('telainicial.html');
        	}
        	if(response==2){
        		document.getElementById('alerta').hidden=false;
        		document.getElementById('mensagem').innerHTML='Usuário não cadastrado.';
        		alert('Usuário não cadastrado.');
        	}
        	if(response==0){
        		document.getElementById('alerta').hidden=false;
        		document.getElementById('mensagem').innerHTML='Senha incorreta.';
        		alert('Senha incorreta.');
        	}
        	res=response;
        },
        error: function(jqXHR, textStatus, errorThrown) {
           	console.log(textStatus, errorThrown);
        }
    });

    return false;

}