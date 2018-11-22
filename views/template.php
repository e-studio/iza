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
    <link href="views/css/misEstilos.css" rel="stylesheet">
    <script src="views/js/search.js"></script>;
    <script src="views/js/confirmacion.js"></script>;

    <!-- Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>


    <!-- Formateo de moneda para numeros en las ordenes  -->
    <script src="views/formato/numeral.js"></script>


<!-- JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- bootbox code -->
    <script src="views/js/bootbox.min.js"></script>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    

	<title>IZA - Control Panel</title>

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

    <!-- Update Modal-->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateModalLabel">Why was this change made?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group">
              <textarea class="form-control" rows="4" cols="20" id="modalComment"></textarea>
            </div>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-warning" onclick="actualizaOrden()"> Save</button>
          
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
    if (session_status() == 2 && $_SESSION["rol"] == 0){
      $grafica = new controller();
      $grafica -> grafica1Controller();
      $grafica -> grafica2Controller();
    }

    ?>


	</div>
</body>
</html>