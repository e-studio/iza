function confirmOrder(order) {



    bootbox.confirm("Want to delete this order?", 
                    function(result){  
                        if (result) {
                            bootbox.alert("Deleted "+ order);
                            window.location.href="index.php?action=ordenes&idBorrar="+order;
                        }
                       
                    });

 /*    if (confirm('Are you shure you want to delete?')==true) {
            alert('Deleted');
            window.location.href='index.php?action=inicio';
            return true;
        }else{
            return false;
        }


        $(document).on("click", ".btnBorrar", function(e) {
           bootbox.confirm("Want to delete this order?", 
            function(result){  
                if (result) {
                    bootbox.alert("Deleted");
                    return true;
                }
                else {
                    //bootbox.alert("falso");
                    return false;
                }
            });
           });
*/

 /* 
swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes, I am sure!',
    cancelButtonText: "No, cancel it!"})
    .then(function () { return false; });
 */

 }

  



