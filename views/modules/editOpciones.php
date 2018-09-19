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

$id = $_REQUEST['idEditar'];
$tabla = $_REQUEST['a'];
switch ($tabla) {
            case 'vents':
                $tablaLink = 'Vents';
                $titulo = 'Air Vents';
                break;
            case 'opciones':
                $tablaLink = 'Opciones';
                $titulo = 'Trailer Options';
                break;
            case 'saddles':
                $tablaLink = 'Saddles' ;
                $titulo = 'Tack Room or Saddle Boxes';
                break;
        }

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Home</a>
        </li>
        <li class="breadcrumb-item active">Edit <?php echo $tablaLink; ?></li>
      </ol>

      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit <?php echo $titulo; ?></div>
      <div class="card-body">
        <?php
          $respuesta = Datos::buscaCodigoModel($id, $tabla);
        ?>
        <form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Code</label>
                <input class="form-control" value ="<?php echo $respuesta['codigo'];?>" name ="codigo" id="codigo" type="text" aria-describedby="nameHelp" readonly >
              </div>

            </div>
          </div>

          <div class="form-group">
                <label for="apellidos">Description</label>
                <input class="form-control" value ="<?php echo $respuesta['descEnglish'];?>" name="descEnglish" id="descEnglish" type="text" aria-describedby="nameHelp">
          </div>

          <div class="form-group">
            <label for="descEspanol">Spanish Description</label>
            <input class="form-control" value ="<?php echo $respuesta['descEspanol'];?>" name="descEspanol" id="descEspanol" type="text" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">Labor Hours</label>
               <input class="form-control" value ="<?php echo $respuesta['horas'];?>" name="horas" id="horas" type="text">
              </div>
              <div class="col-md-6">
                <label for="celular"><strong>Price</strong> (No punctuation signs $ , . )</label>
               <input class="form-control" value="<?php echo $respuesta['precio'];?>" name="precio" id="precio" type="phone">
              </div>
            </div>
          </div>

          <input class="btn btn-primary btn-block"  type="submit" value="Update">
          <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
       </form>

        <?php

        $actualiza = new controller();
        $actualiza -> actualizaOpcionesController($tabla);


        ?>

      </div>
    </div>
    <?php include "views/modules/footer.php"; ?>

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <!--<div style="height: 1000px;"></div>
    </div> /.container-fluid-->