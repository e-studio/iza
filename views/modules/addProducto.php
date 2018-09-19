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
//$lista = new controller();

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Home</a>
        </li>
        <li class="breadcrumb-item active">Add New Product</li>
      </ol>

      <hr>
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Trailer Option Registration</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nombre">Code</label>
                <input class="form-control" name ="codigo" id="codigo" type="text" aria-describedby="nameHelp" placeholder="Type the code" required="true">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Description</label>
            <input class="form-control" name="descEnglish" id="descEnglish" type="text" aria-describedby="nameHelp" placeholder="Description" required>
            <label for="email">Spanish Description</label>
            <input class="form-control" name="descEspanol" id="descEspanol" type="text" aria-describedby="nameHelp" placeholder="Description" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="horas">Labor Hours</label>
               <input class="form-control" name="horas" id="horas" type="number" required>
              </div>
              <div class="col-md-6">
                <label for="price">Price</label>
               <input class="form-control" name="precio" id="precio" type="number" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="rol">Select Category :</label>
                <select name="tabla" id="tabla" required>
                  <option value="opciones">Options</option>
                  <option value="saddles">Tack/Saddle</option>
                  <option value="vents">Vents</option>
                </select>
              </div>
              <div class="col-md-6">

              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Save">
       </form>
        <?php
          $ingreso = new controller();
          $ingreso -> registroProductosController();
        ?>
      </div>
    </div>
<?php include "views/modules/footer.php"; ?>
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->

    </div><!-- /.container-fluid-->