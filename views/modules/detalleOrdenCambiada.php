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

$orden = $_REQUEST['orden'];

$respuesta = Datos::cambioOrdenModel($orden, "cambios");

?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        
        <li class="breadcrumb-item active">Order changed : <strong><?php echo $respuesta['orderNo'];?></strong> </li>
      </ol>

      <hr>
      <div class="row">
        <div class="col-sm-1"><!-- espacio de isquierda -->
        </div>
        <div class="card col-sm-4">
          <div class="card-header bg-warning text-black">Details</div>
            <div class="card-body">
              <p>Date : <strong><?php echo $respuesta['fecha'];?></strong><br>
                Author : <strong><?php echo $respuesta['usuario'];?></strong><br>
                Person who made update : <strong><?php echo $respuesta['changer'];?></strong></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-1"><!-- espacio de isquierda -->
        </div>
      <div class="card card-register border-warning mt-5">
      <div class="card-header bg-warning text-black">Before</div>
      <div class="card-body">
        <?php 

       $old = json_decode( $respuesta["oldData"], true);
       if(is_array($old)){
       foreach($old as $clave => $valor) {

            echo $clave . "->".$valor."<br>";

          }
        }else echo "Datos de arreglo Incorrectos". var_dump($old);

        ?>
        
      </div><!--  Card Body  -->
    </div><!--  Card Body  -->

    <div class="col-sm-1">
    </div>



    <div class="card card-register border-warning mt-5">
      <div class="card-header bg-warning text-black">After</div>
      <div class="card-body">
         <?php 

       $new = json_decode( $respuesta["newData"], true);
       if(is_array($new)){
       foreach($new as $clave => $valor) {

            echo $clave . "->".$valor."<br>";

          }
        }else echo "Datos de arreglo Incorrectos". var_dump($new);

        ?>

        

      </div><!--  Card Body  -->
    </div><!--  Card Body  -->
  </div> <!--  row  -->

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->