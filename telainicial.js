var data = "";

$(document).ready(function(){$.ajax({ 
		url: "telainicial.php",
        context: document.body,
        success: function(response){	
        	data = $.parseJSON(response);
        	loadData();
}});});


function loadData()
{
	document.getElementById("nome").innerHTML 		= "Olá: "+data.nomeCompleto+"!";
	document.getElementById("modalidade").innerHTML = "Você escolheu a modalidade: "+data.modalidade;
	document.getElementById(data.kit.toLowerCase()).style.display = "";
}