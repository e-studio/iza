<?php
session_start();
if(!$_SESSION["validar"]){
    header("location:index.php");
    echo $_SESSION["validar"];
    exit();

}
if ($_SESSION["rol"] == 3 || $_SESSION["rol"] == 2 ){
 include "navUsuario.php";
}
elseif ($_SESSION["rol"]== 1) {
  include "navCreador.php";
}
elseif ($_SESSION["rol"]==0){
  include "navAdmin.php";
}

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Order List</li>
      </ol>

      <hr>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-window-restore"></i> Orders</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped dt-responsive tablas" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Order #</th>
                  <th>Trailer #</th>
                  <th>Trailer Vin</th>
                  <th>Date</th>
                  <th>Due Date</th>
                  <th class="ancho170"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Order #</th>
                  <th>Trailer #</th>
                  <th>Trailer Vin</th>
                  <th>Date</th>
                  <th>Due Date</th>
                  <th class="ancho170"></th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $ingreso = new controller();
                  $ingreso -> listaOrdenesController($_SESSION["rol"]);
                  $ingreso -> borrarOrdenController();
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <?php include "views/modules/footer.php"; ?>

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 10px;"></div>
    </div><!-- /.container-fluid-->