/**
 *
 * Esta funcion busca el codigo del trailer y devuelve las horas y el precio
 *
 */

function calculaPeso() {




}






/**
 *
 * Esta funcion busca el codigo del trailer y devuelve las horas y el precio
 *
 */

function buscaPrecio(table,obj,obj2,mdl) {
    if (mdl == "0") {
        document.getElementById(obj).value = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                //dividir los resultados de las consultas
                var responseArray = xmlhttp.responseText.split("||");
                document.getElementById(obj).value=responseArray[0];
                document.getElementById(obj2).value=responseArray[1];
                document.getElementById("pesoTrailer").value=responseArray[2];

            }
        }
        xmlhttp.open("GET","busca.php?t="+table+"&q="+mdl,true);
        xmlhttp.send();
    }

    }


/**
 *
 * Funcion para buscar opciones del encabezado (Floor Type,Axles,Sides, Top, etc)
 * devuelve los valores del codigo, descripcion en ingles y español, horas y precio
 * y acomoda esos valores en los elementos html que le corresponden
 *
 */
function buscaOpcion(table,codigo,ingles,espanol,horas,precio,mdl) {
    if (mdl == "") {
        document.getElementById(obj).innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                //dividir los resultados de las consultas
                var responseArray = xmlhttp.responseText.split("||");
                document.getElementById(codigo).value=responseArray[0];
                document.getElementById(ingles).value = responseArray[1]
                document.getElementById(espanol).value=responseArray[2];
                document.getElementById(horas).value=responseArray[3];
                document.getElementById(precio).value=responseArray[4];

                //alert("Dato"+responseArray[1]);
            }
        }
        xmlhttp.open("GET","buscaOpcion.php?t="+table+"&q="+mdl,true);
        xmlhttp.send();
    }

    }

/**
 *
 * Funcion para buscar opciones del encabezado (Floor Type,Axles,Sides, Top, etc)
 * devuelve los valores del codigo, descripcion en ingles y español, horas y precio
 * y acomoda esos valores en los elementos html que le corresponden
 *
 */
function buscaOpcion2(table,codigo,espanol,horas,precio,mdl) {
    //alert("Datos que recibo"+table+" "+codigo+" "+ingles+" "+espanol+" "+horas+" "+precio+" "+mdl);
    if (mdl == "") {
        document.getElementById(obj).innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                //dividir los resultados de las consultas
                var responseArray = xmlhttp.responseText.split("||");
                document.getElementById(codigo).value=responseArray[0];
                document.getElementById(espanol).value=responseArray[1];
                document.getElementById(horas).value=responseArray[2];
                document.getElementById(precio).value=responseArray[3];

                //alert("Dato"+responseArray[4]);
            }
        }
        xmlhttp.open("GET","buscaOpcion2.php?t="+table+"&q="+mdl,true);
        xmlhttp.send();
    }

}



function sumaTotales(){
    //instrucciones para calcular peso del trailer y la superficie del piso


    var largo = document.getElementById("tLenght").value;
    var pesoTrailer = document.getElementById("pesoTrailer").value;
    var ancho = document.getElementById("tWidth").value;
    var tFloorType = document.getElementById("tFloorType").value;
    var precioPiso = document.getElementById("precio1").value;

    var pesoTabla =1;
    var totWeight=0;
    var totBoards = 1;



    if (tFloorType=='WOODFLOOR') pesoTabla=2.2;
    if (tFloorType=='CRUBBERBOARD' || tFloorType=='SRUBBERBOARD') pesoTabla = 7;

    if (largo=='') largo=1;
    if (ancho=='') ancho=1;


    if (ancho == 5) totBoards = 7;
    if (ancho == 6) totBoards = 8;
    if (ancho == 6.8) totBoards = 9;
    if (ancho == 7) totBoards = 9;
    if (ancho == 7.5) totBoards = 10;

    var footFt = parseInt(largo * totBoards);


    totWeight = parseInt(pesoTrailer) + footFt;
    var pPiso = precioPiso * footFt;


    document.getElementById("floorFt").value= largo * totBoards;
    document.getElementById("totWeight").value= totWeight;


    // Instrucciones  para afectar el precio del piso segun el tipo

    alert(pPiso);






    //Carga de precios
    var precioMdl= document.getElementById('precioMdl').value;
    var precio1  = document.getElementById('precio1').value;
    var precio2  = document.getElementById('precio2').value;
    var precio3  = document.getElementById('precio3').value;
    var precio4  = document.getElementById('precio4').value;
    var precio5  = document.getElementById('precio5').value;
    var precio6  = document.getElementById('precio6').value;
    var precio7  = document.getElementById('precio7').value;
    var precio8  = document.getElementById('precio8').value;
    var precio9  = document.getElementById('precio9').value;
    var precio10 = document.getElementById('precio10').value;
    var precio11 = document.getElementById('precio11').value;
    var precio12 = document.getElementById('precio12').value;
    var precio13 = document.getElementById('precio13').value;
    var precio14 = document.getElementById('precio14').value;
    var precio15 = document.getElementById('precio15').value;
    var precio16 = document.getElementById('precio16').value;

    //Carga de horas
    var horasMdl= document.getElementById('horasMdl').value;
    var horas1  = document.getElementById('horas1').value;
    var horas2  = document.getElementById('horas2').value;
    var horas3  = document.getElementById('horas3').value;
    var horas4  = document.getElementById('horas4').value;
    var horas5  = document.getElementById('horas5').value;
    var horas6  = document.getElementById('horas6').value;
    var horas7  = document.getElementById('horas7').value;
    var horas8  = document.getElementById('horas8').value;
    var horas9  = document.getElementById('horas9').value;
    var horas10 = document.getElementById('horas10').value;
    var horas11 = document.getElementById('horas11').value;
    var horas12 = document.getElementById('horas12').value;
    var horas13 = document.getElementById('horas13').value;
    var horas14 = document.getElementById('horas14').value;
    var horas15 = document.getElementById('horas15').value;
    var horas16 = document.getElementById('horas16').value;

    //alert(horas15);

    //Calculos
    var totalOpciones = parseFloat(precio1) + parseFloat(precio2) +parseFloat(precio3) +parseFloat(precio4) +parseFloat(precio5) +parseFloat(precio6)+parseFloat(precio7)+parseFloat(precio8)+parseFloat(precio9)+parseFloat(precio10)+parseFloat(precio11)+parseFloat(precio12)+parseFloat(precio13)+parseFloat(precio14)+parseFloat(precio15)+parseFloat(precio16);
    var subTotal = parseFloat(totalOpciones) + parseFloat(precioMdl);
    var descuento = subTotal * 0.02;
    var total = subTotal - descuento;

    var totalHoras = parseFloat(horasMdl) + parseFloat(horas1) + parseFloat(horas2) + parseFloat(horas3) +parseFloat(horas4) + parseFloat(horas5) + parseFloat(horas6)  + parseFloat(horas7) + parseFloat(horas8) + parseFloat(horas9) + parseFloat(horas10) + parseFloat(horas11) + parseFloat(horas12) + parseFloat(horas13) + parseFloat(horas14) + parseFloat(horas15) + parseFloat(horas16);

    //Asignacion resultados en el documento
    document.getElementById('TotalOpciones').value = totalOpciones;
    document.getElementById('subTotal').value = subTotal;
    document.getElementById('descuento').value = descuento;
    document.getElementById('Total').value = total;
    document.getElementById('TotalHoras').value = totalHoras;

    //alert(horasMdl);
}
