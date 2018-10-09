function validarIngreso(){

	var expresion = /^[a-zA-Z0-9]*$/;

	if(!expresion.test($("#usuarioIngreso").val())){

		return false;
	}

	if(!expresion.test($("#passwordIngreso").val())){

		return false;
	}

	return true;

}

function actualizaOrden(){

var comentario = document.getElementById("modalComment").value
document.querySelector('#changeNotes').value = comentario;
document.getElementById("actualiza").click();

}