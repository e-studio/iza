<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="E-studio" />

	<!-- Bootstrap core CSS-->
	  <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <link href="views/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <link href="views/css/sb-admin.css" rel="stylesheet">
    <script src="views/js/search.js"></script>;
    <script type="text/javascript">
      function Confirmation() {

        if (confirm('Are you shure you want to delete?')==true) {
            alert('Deleted');
            window.location.href='index.php?action=inicio';
            return true;
        }else{
            return false;
        }
      }
    </script>

	<title>IZA - Control Panel</title>

  <style>
    .ancho50 {
        width:50px !important;}
    .ancho70 {
        width:70px !important;}
    .ancho100 {
        width:100px !important;}
    .ancho120 {
        width:120px !important;}
    .ancho150 {
        width:150px !important;}
    .ancho170 {
        width:170px !important;}
    .ancho450 {
        width:450px !important;}

</style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

 	<?php
		$modulos = new Enlaces();
		$modulos -> enlacesController();
	?>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Loging Out</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Click on "LogOut" to close actual session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="views/modules/salir.php">Log Out</a>
          </div>
        </div>
      </div>
    </div>


    <script src="views/vendor/jquery/jquery.min.js"></script>
    <script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="views/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="views/vendor/chart.js/Chart.min.js"></script>
    <script src="views/vendor/datatables/jquery.dataTables.js"></script>
    <script src="views/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="views/js/sb-admin.min.js"></script>
    <script src="views/js/sb-admin-datatables.min.js"></script>
    <script src="views/js/validarIngreso.js"></script>
    <script src="views/js/tablas.js"></script>
    <?php 
    if ($_SESSION["rol"] == 0){
      $grafica = new controller();
      $grafica -> grafica1Controller();
      $grafica -> grafica2Controller();
    }

    ?>


	</div>
</body>
</html>