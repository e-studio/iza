<?php
session_start();
if(!$_SESSION["validar"]){
    header("location:index.php");
    echo $_SESSION["validar"];
    exit();

}
if ($_SESSION["rol"] > 0){
 include "navUsuario.php";
}
else {
  include "navAdmin.php";
}

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Home</a>
        </li>
        <li class="breadcrumb-item active">Orders Updated </li>
      </ol>
      
      <hr>
      <!-- Example DataTables Card-->
      <div class="card border-info" width="70%" >
        <div class="card-header bg-info text-white">
          <i class="fa fa-user-o"></i> Orders</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="ancho50">Order</th>
                  <th class="ancho150">User</th>
                  <th class="ancho150">Updated by</th>
                  <th class="ancho150">Date</th>
                  <th class="ancho450">Notes</th>
                  <th></th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Order</th>
                  <th>User</th>
                  <th class="ancho150">Updated by</th>
                  <th>Date</th>
                  <th>Notes</th>
                  <th></th>

                </tr>
              </tfoot>
              <tbody>
                <?php
                  $ingreso = new controller();
                  $ingreso -> ordenesCambiadasController();
                  $ingreso -> borrarEmpleadoController();                  
                ?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 10px;"></div>
    </div><!-- /.container-fluid-->