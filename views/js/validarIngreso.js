
var bOrden = 0; // variable para capturar la orden que quiero borrar



// este metodo recibe el nombre del boton borrar que se precionó en la lista de ordenes,
// cada boton tiene como nombre el numero de orden al que le pertenece, para identificar cual orden quiero borrar
$('#deleteModal').on('show.bs.modal', function(e) {
    bOrden = $(e.relatedTarget).data('borrar');

});


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


function borraOrden(){
        document.getElementById(bOrden).click();

}

