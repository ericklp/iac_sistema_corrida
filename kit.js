
var idKit = "";

function select_kit (button)
{
	idKit = button.id;
}
function camOnClick()
{
	var b = Array('kit1','kit2','kit3');
	b.forEach(function(element) {
    	if(element!=idKit){
    		document.getElementById(element).style.display = "none";
//    		document.getElementById(element+"Desc").style.display = "none";
    	}
    	if(element==idKit){
    		document.getElementById(element).disabled=true;
	 	}
    	console.log(element);
	});
	document.getElementById("finalizar").style.display = "";


}
function finalizar_compra()
{
	console.log(idKit);
	//window.location.assign('telainicial.html');

	var tamanho 	= ""; 

	if(document.getElementById('tamanhoPP').checked)
		tamanho = "PP";
	if(document.getElementById('tamanhoP').checked)
		tamanho = "P";
	if(document.getElementById('tamanhoM').checked)
		tamanho = "M";
	if(document.getElementById('tamanhoG').checked)
		tamanho = "G";
	if(document.getElementById('tamanhoGG').checked)
		tamanho = "GG";


	values = {idKit, tamanho};

	$.ajax({
        url: "kit.php",
        type: "post",
        data: values ,
        success: function (response) {
        	if (response==1){
        		window.location.assign('pagamento.html');	
        	}
        	if(response==0){
        		alert('erro ao atualizar kit');
        	}
        },
        error: function(jqXHR, textStatus, errorThrown) {
           	console.log(textStatus, errorThrown);
        }
    });
}