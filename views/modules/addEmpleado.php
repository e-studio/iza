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
//$histo = $_REQUEST['idHis'];
$lista = new controller();

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Agregar Empleado</li>
      </ol>

      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro de Empleados</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Usuario</label>
                <input class="form-control" name ="usuario" id="usuario" type="text" aria-describedby="nameHelp" placeholder="Escriba el nombre del Usuario" required="true">
              </div>
              <div class="col-md-6">
                <label for="apellidos">Contraseña</label>
                <input class="form-control" name="password" id="password" type="password" aria-describedby="nameHelp" placeholder="Contraseña" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Nombre</label>
            <input class="form-control" name="nombre" id="nombre" type="text" aria-describedby="nameHelp" placeholder="Nombre" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="email">E-mail</label>
               <input class="form-control" name="email" id="email" type="email" required>
              </div>
              <div class="col-md-6">
                <label for="telefono">Celular</label>
               <input class="form-control" name="celular" id="celular" type="phone" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">Permisos :</label>
                <select name="rol" id="rol">
                  <option value="">Selecione ...</option>
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
          <input class="btn btn-primary btn-block" type="submit" value="Registrar">
       </form>


        <?php
        $ingreso = new controller();
        $ingreso -> registroEmpleadosController();

        ?>

      </div>
    </div>
<?php include "views/modules/footer.php"; ?>
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->

    </div><!-- /.container-fluid-->