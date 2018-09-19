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
        <li class="breadcrumb-item active">Vents List</li>
      </ol>
      
      <hr>
      <!-- Example DataTables Card-->
      <div class="card border-info mb-3">
        <div class="card-header bg-info text-white">
          <i class="fa fa-cubes"></i> Vents</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Spaish Description</th>
                  <th>Labor hrs</th>
                  <th>price</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Spaish Description</th>
                  <th>Labor hrs</th>
                  <th>price</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $ingreso = new controller();
                  $ingreso -> listaOpcionesController("vents");
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