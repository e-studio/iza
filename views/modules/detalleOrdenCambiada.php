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
        <div class="card col-sm-7">
          <div class="card-header bg-warning text-black">Datos</div>
            <div class="card-body">
              <p>Date : <strong><?php echo $respuesta['fecha'];?></strong><br>
                Responsible : <strong><?php echo $respuesta['usuario'];?></strong></p>
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
        
   <!--     <form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Date</label><br>
                <label for="nombre">Responsible</label><br>
                <input class="form-control" value ="<?php echo $respuesta['usuario'];?>" name ="usuario" id="usuario" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre de Usuario" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Contraseña</label>
                <input class="form-control" value ="<?php echo $respuesta['password'];?>" name="password" id="password" type="text" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Nombre</label>
            <input class="form-control" value ="<?php echo $respuesta['nombre'];?>" name="nombre" id="nombre" type="text" aria-describedby="emailHelp" placeholder="Nombre" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">E-mail</label>
               <input class="form-control" value ="<?php echo $respuesta['email'];?>" name="email" id="email" type="email" name="email" placeholder="Correo Electronico" required="true">
              </div>
              <div class="col-md-6">
                <label for="celular">Celular</label>
               <input class="form-control" value="<?php echo $respuesta['celular'];?>" name="celular" id="celular" type="phone" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">Permisos :</label>
                <select name="rol" id="rol">
                  <option selected="selected" value="<?php echo $respuesta['rol'];?>"></option>
                  <option value="0">Administrator</option>
                  <option value="1">Orders Admin</option>
                  <option value="2">Engineering</option>
                  <option value="3">Accountants</option>
                </select>
              </div>
              <div class="col-md-6">

              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block"  type="submit" value="Actualizar">
          <input type="hidden" id="id" name="id" value="<?php echo $usuario; ?>">
       </form>-->


        <?php

       // $ingreso = new controller();
      //  $ingreso -> actualizaEmpleadoController();

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

        <!--<form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Usuario</label>
                <input class="form-control" value ="<?php echo $respuesta['usuario'];?>" name ="usuario" id="usuario" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre de Usuario" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Contraseña</label>
                <input class="form-control" value ="<?php echo $respuesta['password'];?>" name="password" id="password" type="text" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Nombre</label>
            <input class="form-control" value ="<?php echo $respuesta['nombre'];?>" name="nombre" id="nombre" type="text" aria-describedby="emailHelp" placeholder="Nombre" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">E-mail</label>
               <input class="form-control" value ="<?php echo $respuesta['email'];?>" name="email" id="email" type="email" name="email" placeholder="Correo Electronico" required="true">
              </div>
              <div class="col-md-6">
                <label for="celular">Celular</label>
               <input class="form-control" value="<?php echo $respuesta['celular'];?>" name="celular" id="celular" type="phone" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">Permisos :</label>
                <select name="rol" id="rol">
                  <option selected="selected" value="<?php echo $respuesta['rol'];?>"></option>
                  <option value="0">Administrator</option>
                  <option value="1">Orders Admin</option>
                  <option value="2">Engineering</option>
                  <option value="3">Accountants</option>
                </select>
              </div>
              <div class="col-md-6">

              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block"  type="submit" value="Actualizar">
          <input type="hidden" id="id" name="id" value="<?php echo $usuario; ?>">
       </form>-->


        <?php

      // $ingreso = new controller();
      //  $ingreso -> actualizaEmpleadoController();

        ?>

      </div><!--  Card Body  -->
    </div><!--  Card Body  -->
  </div> <!--  row  -->

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->