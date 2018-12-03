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

 include "navAdmin.php";
//$author = $respuesta["author"];
$author = "Ricardo Urbina N";
$mail = "rickyurbina@gmail.com";
//$mail = Datos::mailUsuarioModel("usuarios", $author);


  ?>
  <div class="content-wrapper">
    <div class="container-fluid">





<!--  ==========================             Prueba de envio de Mail ======================================= 
      <div class="row" >
      <form class="nobottommargin" id="template-contactform" name="template-contactform" action="controllers/sendemail.php" method="post">

                                <div class="form-process"></div>

                                <div class="col_one_third">
                                    <label for="template-contactform-name">Name <small>*</small></label>
                                    <input type="text" id="template-contactform-name" name="template-contactform-name" value="<?php //echo $_SESSION["nombre"]; ?>" class="sm-form-control required" />
                                </div>

                                <div class="col_one_third">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="email" id="template-contactform-email" name="template-contactform-email" value="<?php //echo $_SESSION["email"]; ?>" class="required email sm-form-control" />
                                </div>

                                <div class="col_one_third col_last">
                                    <label for="template-contactform-phone">Author</label>
                                    <input type="text" id="author" name="author" value="<?php //echo $author; ?>" class="sm-form-control" />
                                </div>

                                <div class="col_one_third">
                                    <label for="template-contactform-email">Email Author <small>*</small></label>
                                    <input type="email" id="author-email" name="author-email" value="<?php //echo $mail; ?>" class="required email sm-form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_two_third">
                                    <label for="template-contactform-subject">Subject <small>*</small></label>
                                    <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="Modificacion de Orden" class="required sm-form-control" />
                                </div>

                                <div class="col_one_third col_last">
                                    <label for="template-contactform-service">Services</label>
                                    <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Wordpress">Wordpress</option>
                                        <option value="PHP / MySQL">PHP / MySQL</option>
                                        <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                        <option value="Graphic Design">Graphic Design</option>
                                    </select>
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="template-contactform-message">Message <small>*</small></label>
                                    <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                </div>

                                <div class="col_full hidden">
                                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                                </div>

                            </form>

      </div>-->

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-database"></i>
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
                <i class="fa fa-fw fa-pencil-square-o"></i>
              </div>
              <div class="mr-5">11 Order Updates!</div>
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
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?action=ordenes">
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