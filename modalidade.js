function update_modalide(id)
{
	values = {id};

	$.ajax({
        url: "modalidade.php",
        type: "post",
        data: values ,
        success: function (response) {
        	if (response==1){
        		window.location.assign('kit.html');	
        	}
        	if(response==0){
        		alert('erro ao atualizar modalidade');
        	}
        },
        error: function(jqXHR, textStatus, errorThrown) {
           	console.log(textStatus, errorThrown);
        }
    });
}

function update_kit(id)
{
	values = {id};

	$.ajax({
        url: "modalidade.php",
        type: "post",
        data: values ,
        success: function (response) {
        	if (response==1){
        		window.location.assign('kit.html');	
        	}
        	if(response==0){
        		alert('erro ao atualizar modalidade');
        	}
        },
        error: function(jqXHR, textStatus, errorThrown) {
           	console.log(textStatus, errorThrown);
        }
    });
}