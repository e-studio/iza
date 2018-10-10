<?php
session_start();
if(!$_SESSION["validar"]){
	header("location:index.php");
	exit();
}


if ($_SESSION["rol"] == 3){
//  ==========================             Pantalla de usuario de Conta  =======================================
  include "navUsuario.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Inicio</li>
      </ol>

      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->
  </div>

<?php
include "views/modules/footer.php";
}
elseif ($_SESSION["rol"] == 2){

//  ==========================             Pantalla de usuario Ingenieria =======================================
  include "navUsuario.php"; ?>


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Inicio</li>
      </ol>

      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->
  </div>

<?php
include "views/modules/footer.php";
}
elseif ($_SESSION["rol"] == 1){


//  ==========================             Pantalla de usuario que crea Ordenes      =======================================
  include "navCreador.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Inicio</li>
      </ol>

      <div style="height: 1000px;"></div>
    </div><!-- /.container-fluid-->
  </div>

<?php
include "views/modules/footer.php";
}
elseif($_SESSION["rol"] == 0){

//  ==========================             Pantalla de Administrador =======================================

 include "navAdmin.php"; ?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

      </div> <!-- Row  -->

      <!-- Area Chart Example-->
      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-6">
          <div class="card mb-6">
            <div class="card-header"><i class="fa fa-area-chart"></i> Orders Per Month</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>


            </div>
            <div class="card-footer small text-muted">Just Updated</div>
          </div>
        </div><!-- col-sm-4-->
        <div class="col-sm-2">
        </div>

      </div><!-- row -->
<br>
      <div class="row">
        <div class="col-sm-2">
        </div>

        <div class="col-lg-6">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Total Sales Per Month</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$##,###.##</div>
                  <div class="small text-muted">Best Month</div>

                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">-</div>
          </div>
        </div>


      </div><!-- row -->
    <div class="row">
      <!--<div class="col-lg-4">
          Example Pie Chart Card
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
    </div>--><!-- row -->

    </div><!-- /.container-fluid-->
  </div><!-- /.content-wrapper-->

<?php include "views/modules/footer.php";} ?>

    </div><!-- /.container-fluid-->
  </div>