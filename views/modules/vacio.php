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
        <li class="breadcrumb-item active">Empty Space</li>
      </ol>
      
      <hr>
       

       <!-- Aqui va el contenido -->


       <!-- Fin del contenido -->
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->