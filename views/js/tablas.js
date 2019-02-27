/* ==============================================
IMPRIMIR ORDEN DE REMOLQUES SIN PRECIOS PARA ING.
*================================================*/
  $(function(){
            $(document).on('click',".tablas .btnImprimirOrden",function(e){
                e.preventDefault();
                var id = $(this).attr('codigoOrden');
                //alert(id);
                window.open("extensions/tcpdf/pdf/orden.php?codigo="+id,'Imprimir Orden','toolbar=no,location=0,directories=no, status=0,menubar=0,scrollbars=0,resizable=0,width=1024,height=800,top=0,left=0');
            });
        });


/* ==============================================
IMPRIMIR ORDEN DE REMOLQUES CON PRECIOS PARA CONTA
*================================================*/
  $(function(){
            $(document).on('click',".tablas .btnImprimirOrdenP",function(e){
                e.preventDefault();
                var id = $(this).attr('codigoOrden');
                //alert(id);
                window.open("extensions/tcpdf/pdf/ordenPrecio.php?codigo="+id,'Imprimir Orden','toolbar=no,location=0,directories=no, status=0,menubar=0,scrollbars=0,resizable=0,width=1024,height=800,top=0,left=0');
            });
        });


  /* ==============================================
             CERRAR ORDEN DE REMOLQUE
   *================================================*/
  $(function(){
            $(document).on('click',".tablas .cerrarOrden",function(e){
                e.preventDefault();
                var id = $(this).attr('codigoOrden');
                console.log(id);
                //window.open("extensions/tcpdf/pdf/ordenPrecio.php?codigo="+id,'Imprimir Orden','toolbar=no,location=0,directories=no, status=0,menubar=0,scrollbars=0,resizable=0,width=1024,height=800,top=0,left=0');
            });
        });