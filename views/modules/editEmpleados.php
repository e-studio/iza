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

$usuario = $_REQUEST['idEditar'];


?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Home</a>
        </li>
        <li class="breadcrumb-item active">Edit User</li>
      </ol>

      <hr>
      <div class="card card-register mx-auto border-warning mt-5">
      <div class="card-header bg-warning text-black">User information</div>
      <div class="card-body">
        <?php
          $respuesta = Datos::buscaEmpleadoModel($usuario, "usuarios");
        ?>
        <form method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">User</label>
                <input class="form-control" value ="<?php echo $respuesta['usuario'];?>" name ="usuario" id="usuario" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre de Usuario" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Password</label>
                <input class="form-control" value ="<?php echo $respuesta['password'];?>" name="password" id="password" type="text" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Name</label>
            <input class="form-control" value ="<?php echo $respuesta['nombre'];?>" name="nombre" id="nombre" type="text" aria-describedby="emailHelp" placeholder="Nombre" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telLocal">E-mail</label>
               <input class="form-control" value ="<?php echo $respuesta['email'];?>" name="email" id="email" type="email" name="email" placeholder="Correo Electronico" required="true">
              </div>
              <div class="col-md-6">
                <label for="celular">Phone</label>
               <input class="form-control" value="<?php echo $respuesta['celular'];?>" name="celular" id="celular" type="phone" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">System Rights :</label>
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
           <input class="btn btn-secondary" name="Cancel" value="Cancel" onClick="location.href='index.php?action=empleados'">
          <input class="btn btn-primary"  type="submit" value="Update">
          <input type="hidden" id="id" name="id" value="<?php echo $usuario; ?>">
       </form>


        <?php

        $ingreso = new controller();
        $ingreso -> actualizaEmpleadoController();

        ?>

      </div>
    </div>

      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->