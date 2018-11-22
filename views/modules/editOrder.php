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
$busca = new controller();

$orden = $_REQUEST['idEditar'];
//$respuesta = Datos::buscaOrden("orders",$orden);
$respuesta = controller::ctrMostrarVentas($orden);

$specs = json_decode($respuesta["trailerSpecs"], true);
$options = json_decode($respuesta["options"], true);



?>


<div class="content-wrapper">
  <form action="" name="cotizador" id='cotizador' method="post">

    <div class="container-fluid">

        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?action=inicio">Home</a>
        </li>
        <li class="breadcrumb-item active"><strong><?php echo "You are editing order No: ". $respuesta["orderNo"]; ?></strong></li>
      </ol>

        <div class="row">
          <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Order Datails</div>
                <div class="card-body">
                    <p class="card-text">ORDER # : <input value="<?php echo $respuesta["orderNo"];?>" class="ancho170" type="text" name="tbd" id="tbd" readonly></p>
                    <p class="card-text">Trailer # : <input value="<?php echo $respuesta["trailerNo"];?>" class="ancho120" type="text" name="trailerNo" id="trailerNo"></p>
                    <p class="card-text">Trailer Vin # : <input value="<?php echo $respuesta["trailerVin"];?>" class="ancho120" type="text" name="trailerVin" id="trailerVin"></p>
                    <p class="card-text">Due Date : <input value="<?php echo $respuesta["dueDate"];?>" class="ancho170" type="date" name="dueDate" id="dueDate"></p>
                    <input hidden class="ancho170" type="text" name="author" id="author" value="<?php echo $respuesta["author"]; ?>">
                </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">

                <p style="text-align: center; font-size: 105px;" class="card-text"><?php echo $respuesta["orderNo"];?></p>
                <textarea rows="3" cols="55" name="notes" id="notes" placeholder="Notes..."><?php echo $respuesta["notes"];?></textarea>
              </div>
            </div>
          </div>
        </div><!-- row -->
        <br>

          <div class="row table-responsive">
            <div class="col-md-12">
                <table class="table table-bordered table-sm" style="width: 80%;">
                        <tbody>
                            <tr class="table-secondary">
                                <td colspan="12" style="text-align: center;"><strong><h3>Trailer Model & Size</h3></strong></td>
                            </tr>
                         <tr class="table-secondary">
                            <td colspan="2">Trailer Model
                             </td>
                            <td>Trailer Length</td>
                            <td>Trailer Width</td>
                            <td>Axles</td>
                            <td>Sides</td>
                            <td>Top</td>
                            <td>Rear Gate</td>
                            <td>Compartments</td>
                            <td>Escape Gate</td>
                            <td>Hours</td>
                            <td>Trailer Price</td>
                        </tr>
                         <tr>
                            <td colspan="2">
                                <select id="modelos" name="Modelos" onchange="buscaPrecio('trailers','precioMdl','horasMdl', this.value)" onblur="sumaTotales()">
                                    <?php 
                                        echo '<option value="'.$specs["Modelos"].'" selected>'.$specs["Modelos"].'</option>'; 
                                        $lista ->llenaModelos();
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="tLength" id="tLenght" onchange="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tLength"].'" selected>'.$specs["tLength"].'</option>'; ?>
                                    
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                    <option value="18">18</option>
                                    <option value="20">20</option>
                                    <option value="22">22</option>
                                    <option value="24">24</option>
                                    <option value="26">26</option>
                                    <option value="28">28</option>
                                    <option value="32">32</option>
                                    <option value="36">36</option>
                                    <option value="40">40</option>
                                </select>

                            </td>
                            <td>
                                <select name="tWidth" id="tWidth" onchange="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tWidth"].'" selected>'.$specs["tWidth"].'</option>'; ?>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="6.8">6.8</option>
                                    <option value="7">7</option>
                                    <option value="7.5">7.5</option>
                                </select>
                                

                            </td>
                            <td>
                                <select class="ancho50" name="tAxles" id="tAxles" onchange="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tAxles"].'" selected>'.$specs["tAxles"].'</option>'; ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1 - 5'">1 - 5'</option>
                                    <option value="2 - 5'">2 - 5'</option>
                                    <option value="1 - 6'">1 - 6'</option>
                                    <option value="2 - 6'">2 - 6'</option>
                                    <option value="3 - 6'">3 - 6'</option>
                                    <option value="1 - 5' T Axle">1 - 5' T Axle</option>
                                    <option value="2 - 5' T Axle">2 - 5' T Axle</option>
                                    <option value="3 - 5' T Axle">3 - 5' T Axle</option>
                                    <option value="1 - 6' T Axle">1 - 6' T Axle</option>
                                    <option value="2 - 6' T Axle">2 - 6' T Axle</option>
                                    <option value="3 - 6' T Axle">3 - 6' T Axle</option>
                                    <option value="1 - 6.5' T Axle">1 - 6.5' T Axle</option>
                                    <option value="2 - 6.5' T Axle">2 - 6.5' T Axle</option>
                                    <option value="3 - 6.5' T Axle">3 - 6.5' T Axle</option>
                                    <option value="2 7.2K axles">2 7.2K axles</option>
                                </select>
                                

                            </td>
                            <td>
                                <select id="tSides" name="tSides" onchange="buscaOpcion('opciones','codigo2','descEnglish2','descEspanol2','horas2', 'precio2', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tSides"].'" selected>'.$specs["tSides"].'</option>'; ?>
                                    <option value="STANDARDSIDES">Standard</option>
                                    <option value="4HIGHSIDE">4' High</option>
                                    <option value="FLUSHFENDERS">Flush With Fender</option>
                                    <option value="DOUBLEDECKSIDE">For Double Deck</option>
                                </select>

                            </td>
                            <td>
                                <select name="tTop" id="tTop">
                                    <?php echo '<option value="'.$specs["tTop"].'" selected>'.$specs["tTop"].'</option>'; ?>
                                    <option value="Full Top">Full Top</option>
                                    <option value="3/4 Top">3/4 Top</option>
                                    <option value="1/2 Top">1/2 Top</option>
                                    <option value="Bow Top">Bow Top</option>
                                </select>

                            </td>
                            <td>
                                <select id="tRearGate" name="tRearGate" onchange="buscaOpcion('opciones','codigo3','descEnglish3','descEspanol3','horas3', 'precio3', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tRearGate"].'" selected>'.$specs["tRearGate"].'</option>'; ?>
                                    <option value="BUTTERFLYGATE">Butterfly</option>
                                    <option value="SINGLESWING">Single Swing</option>
                                    <option value="SWING/SLIDER">Swing/Slider</option>
                                </select>

                            </td>
                            <td><input class="ancho120" type="text" name="tCompartments" id="tCompartments"></td>
                            <td>
                                <select id="tEscapeGate" name="tEscapeGate">
                                    <?php echo '<option value="'.$specs["tEscapeGate"].'" selected>'.$specs["tEscapeGate"].'</option>'; ?>
                                    <option value="Driver Side">Driver Side</option>
                                    <option value="Passenger Side">Passenger Side</option>
                                    <option value="Both Sides">Both Sides</option>
                                </select>

                            </td>
                            <td rowspan="7"><input readonly="readonly"  value="<?php echo $specs["horasMdl"]?>" name="horasMdl" id="horasMdl" class="ancho50"></td>
                            <td rowspan="7"><input readonly="readonly" value="<?php echo $specs["precioMdl"]?>" name="precioMdl" id="precioMdl" class="ancho70"></td>
                         </tr>
                         <tr class="table-secondary">
                            <td colspan="2">ToolBox Option</td>
                            <td>Saddle Racks</td>
                            <td>Blanket Bars</td>
                            <td>Floor Type</td>
                            <td>Floor Spacing</td>
                            <td>Rollers</td>
                            <td>Receiver Hitch</td>
                            <td>4' High Side</td>
                            <td>Matting p/ft</td>
                         </tr>
                         <tr>
                            <td colspan="2">
                                <select name="tToolBox">
                                    <option value="">None</option>
                                    <option value="1 - DS">1 - DS</option>
                                    <option value="1 - PS">1 - PS</option>
                                    <option value="2 - BS">2 - BS</option>
                                </select>

                            </td>
                            <td>
                                <select name="tSaddleRack">
                                    <option value="">None</option>
                                    <option value="1 - DS">1 - DS</option>
                                    <option value="2 - DS">2 - DS</option>
                                    <option value="3 - DS">3 - DS</option>
                                    <option value="4 - DS">4 - DS</option>
                                    <option value="1 - PS">1 - PS</option>
                                    <option value="2 - PS">2 - PS</option>
                                    <option value="3 - PS">3 - PS</option>
                                    <option value="4 - PS">4 - PS</option>
                                    <option value="1 - BS">1 - BS</option>
                                    <option value="2 - BS">2 - BS</option>
                                    <option value="3 - BS">3 - BS</option>
                                    <option value="4 - BS">4 - BS</option>
                                </select>

                            </td>
                            <td><input class="ancho100" type="text" name="tBlanketBars" id="blanketBars"></td>

                            <td>
                               <select class="ancho120" id="tFloorType" name="tFloorType" onchange="buscaOpcion('opciones','codigo1','descEnglish1','descEspanol1','horas1', 'precio1', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tFloorType"].'" selected>'.$specs["tFloorType"].'</option>'; ?>
                                    <option value="WOODFLOOR">Wood Floor</option>
                                    <option value="CRUBBERBOARD">C Rubber Boards</option>
                                    <option value="SRUBBERBOARD">S Rubber Boards</option>
                                </select>

                            <!--    <script>
                                    document.getElementById("tFloorType").addEventListener("change", calculaPeso);
                                </script>-->


                            </td>
                            <td>
                                <select name="tFloorSpacing">
                                    <?php echo '<option value="'.$specs["tFloorSpacing"].'" selected>'.$specs["tFloorSpacing"].'</option>'; ?>
                                    <option value="0">0</option>
                                    <option value="1/2\"">1/2"</option>
                                    <option value="3/4\"">3/4"</option>
                                </select>

                            </td>
                            <td>
                                <select id="tRollers" name="tRollers" onchange="buscaOpcion('opciones','codigo4','descEnglish4','descEspanol4','horas4', 'precio4', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tRollers"].'" selected>'.$specs["tRollers"].'</option>'; ?>
                                    <option value="NOROLLERS">No</option>
                                    <option value="ROLLERPIN">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select name="tHinch">
                                    <?php echo '<option value="'.$specs["tHinch"].'" selected>'.$specs["tHinch"].'</option>'; ?>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select name="tHSLength">
                                    <?php echo '<option value="'.$specs["tHSLength"].'" selected>'.$specs["tHSLength"].'</option>'; ?>

                                    <?php
                                    for ($i=1; $i<=36; $i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                    ?>

                                </select>

                            </td>
                            <td>
                                <select name="tMatting">
                                    <?php echo '<option value="'.$specs["tMatting"].'" selected>'.$specs["tMatting"].'</option>'; ?>

                                    <?php
                                    for ($i=1; $i<=72; $i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                    ?>

                                </select>

                            </td>
                         </tr>
                         <tr class="table-secondary">
                            <td colspan="2">Calf Gates</td>
                            <td>V Rod</td>
                            <td>Air Vents</td>
                            <td>Rhino Liner ft2</td>
                            <td>Side/Rails</td>
                            <td colspan="2">Saddle Box Type</td>
                            <td>Tires</td>
                            <td>Extra Tire</td>
                         </tr>
                         <tr>
                            <td colspan="2">
                                <select class="ancho100" name="tCalf">
                                    <option value="Normal">Normal</option>
                                    <option value="Move to Back">Move to Back</option>
                                </select>

                            </td>
                            <td>
                                <select name="tRod">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select class="ancho100" id="tVents" name="tVents" onchange="buscaOpcion('vents','codigo16','descEnglish16','descEspanol16','horas16', 'precio16', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tVents"].'" selected>'.$specs["tMatVentstting"].'</option>'; ?>
                                    <?php $lista ->llenaVents(); ?>
                                    </select>
                                </td>
                            <td>
                                <select name="tRhino">
                                    <?php echo '<option value="'.$specs["tRhino"].'" selected>'.$specs["tRhino"].'</option>'; ?>

                                    <?php
                                    for ($i=1; $i<=125; $i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                    ?>

                                </select>

                            </td>

                            <td><input value="<?php echo $specs["tSideRails"]?>" class="ancho120" type="text" name="tSideRails" id="tSideRails"></td>
                            <td colspan="2">
                                <select class="ancho150" name="tSaddleBox">
                                    <?php echo '<option value="'.$specs["tSaddleBox"].'" selected>'.$specs["tSaddleBox"].'</option>'; ?>
                                    <option value="With Divider Wall">With Divider Wall</option>
                                    <option value="Only HSS for Racks">Only HSS for Racks</option>
                                </select>

                            </td>
                            <td>
                                <select id="tires" name="tTires" onchange="buscaOpcion('opciones','codigo5','descEnglish5','descEspanol5','horas5', 'precioAxle', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tTires"].'" selected>'.$specs["tTires"].'</option>'; ?>
                                    <option value="10PLY16SR">10PLY16SR</option>
                                    <option value="12PLY16SR">12PLY16SR</option>
                                    <option value="14PLY16SR">14PLY16SR</option>
                                    <option value="14PLY16AR">14PLY16AR</option>
                                    <option value="18PLY17.5SR">18PLY16SR</option>
                                </select>
                               <!-- <script>
                                    document.getElementById("tires").addEventListener("change", calculaPeso);
                                </script>-->

                            </td>
                            <td>
                                <select id="eTires" name="tExtraTire" onchange="buscaOpcion('opciones','codigo6','descEnglish6','descEspanol6','horas6', 'precio6', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tExtraTire"].'" selected>'.$specs["tExtraTire"].'</option>'; ?>
                                    <option value="10PLY16SRE">10PLY16SRE</option>
                                    <option value="12PLY16SRE">12PLY16SRE</option>
                                    <option value="14PLY16SRE">14PLY16SRE</option>
                                    <option value="14PLY16ARE">14PLY16ARE</option>
                                    <option value="18PLY16SRE">18PLY16SRE</option>
                                </select>
                              <!--  <script>
                                    document.getElementById("eTires").addEventListener("change", calculaPeso);
                                </script>-->

                            </td>
                         </tr>
                         <tr class="table-secondary">
                            <td colspan="2">Color</td>
                            <td>Front Plug</td>
                            <td>Rear Plug</td>
                            <td>Tire Cover</td>
                            <td>Tarp</td>
                            <td colspan="2">&nbsp;</td>
                            <td>Trailer Weight</td>
                            <td>Floor/ft</td>
                         </tr>
                         <tr>
                            <td colspan="2">
                                <select class="ancho120" name="tColor" id="tColor">
                                    <?php echo '<option value="'.$specs["tColor"].'" selected>'.$specs["tColor"].'</option>'; ?>
                                    <option value="White">White</option>
                                    <option value="Off White">Off White</option>
                                    <option value="Red Gloss 7404">Red Gloss 7404</option>
                                    <option value="Tan">Tan</option>
                                    <option value="Black">Black</option>
                                    <option value="Gray">Gray</option>
                                    <option value="Red 312-04">Red 312-04</option>
                                    <option value="Postal Blue">Postal Blue</option>
                                    <option value="Charcoal">Charcoal</option>
                                    <option value="PLS8-C0004-C50">PLS8-C0004-C50</option>
                                    <option value="Tan 311-76 SD">Tan 311-76 SD</option>
                                    <option value="Tan 311-75 SD">Tan 311-75 SD</option>
                                    <option value="Café 311-09">Brown 311-09</option>
                                    <option value="White 311-05 SD">White 311-05 SD</option>
                                </select>
                                <script>
                                    document.getElementById("tColor").addEventListener("change", sumaTotales);
                                </script>

                            </td>
                            <td>
                                <select name="tFrontPlug">
                                    <?php echo '<option value="'.$specs["tFrontPlug"].'" selected>'.$specs["tFrontPlug"].'</option>'; ?>
                                    <option value="6 Way">6 Way</option>
                                    <option value="7 Way">7 Way</option>
                                </select>

                            </td>
                            <td>
                                <select name="tRearPlug">
                                    <?php echo '<option value="'.$specs["tRearPlug"].'" selected>'.$specs["tRearPlug"].'</option>'; ?>
                                    <option value="6 Way">6 Way</option>
                                    <option value="7 Way">7 Way</option>
                                </select>

                            </td>
                            <td>
                                <select name="tTireCover">
                                    <?php echo '<option value="'.$specs["tTireCover"].'" selected>'.$specs["tTireCover"].'</option>'; ?>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select id="tarp" name="tTarp" onchange="buscaOpcion('lonas','codigo15','descEnglish15','descEspanol15','horas15', 'precio15', this.value)" onblur="sumaTotales()">
                                    <?php echo '<option value="'.$specs["tTarp"].'" selected>'.$specs["tTarp"].'</option>'; ?>
                                    <?php $lista ->llenaLonas(); ?>
                                </select>
                            </td>

                            <td colspan="2">&nbsp;</td>
                            <td><input class="ancho70" name="totWeight" id="totWeight" value="<?php echo $specs["totWeight"]?>" readonly="readonly"></td>
                            <td><input class="ancho70" name="floorFt" id="floorFt" value="<?php echo $specs["floorFt"]?>" readonly="readonly">
                                <input id="pesoTrailer" value="0" hidden>
                                <input id="precioAxle" value="<?php echo $options["precio5"]?>" hidden>

                            </td>

                         </tr>
                </tbody>
                </table>

            </div>
          </div> <!-- row -->
    </div><!-- container-fluid -->





    <div class="container-fluid">
        <!-- ***********************************   opciones    *********************************************************-->
      <div class="row table-responsive">

        <div class="col-md-12">
            <table class="table table-bordered table-sm" style="width: 80%;">
                <tbody>
                <tr class="table-secondary">
                    <td colspan="12" style="text-align: center;"><strong><h3>Options</h3></strong></td>
                </tr>
                 <tr class="table-secondary">
                    <td>&nbsp;</td>
                    <td>Option Code</td>
                    <td colspan="4">Trailer Options</td>
                    <td colspan="4">Notes</td>
                    <td>Hours</td>
                    <td>Option Price</td>
                 </tr>
                 <tr>
                    <td>1</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo1"]?>" class="ancho150" id="codigo1" name="codigo1"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish1" name="descEnglish1" value="<?php echo $options["descEnglish1"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol1" name="descEspanol1" value="<?php echo $options["descEspanol1"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas1" name="horas1" value="<?php echo $options["horas1"]?>"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio1" name="precio1" value="<?php echo $options["precio1"]?>"></td>
                 </tr>
                 <tr>
                    <td>2</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo2"]?>" class="ancho150" id="codigo2" name="codigo2"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish2" name="descEnglish2" value="<?php echo $options["descEnglish2"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol2" name="descEspanol2" value="<?php echo $options["descEspanol2"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas2" name="horas2" value="<?php echo $options["horas2"]?>"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio2" name="precio2" value="<?php echo $options["precio2"]?>"></td>
                 </tr>
                 <tr>
                    <td>3</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo3"]?>" class="ancho150" id="codigo3" name="codigo3"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish3" name="descEnglish3" value="<?php echo $options["descEnglish3"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol3" name="descEspanol3" value="<?php echo $options["descEspanol3"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas3" name="horas3" value="<?php echo $options["horas3"]?>"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio3" name="precio3" value="<?php echo $options["precio3"]?>"></td>
                 </tr>
                 <tr>
                    <td>4</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo4"]?>" class="ancho150" id="codigo4" name="codigo4"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish4" name="descEnglish4" value="<?php echo $options["descEnglish4"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol4" name="descEspanol4" value="<?php echo $options["descEspanol4"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas4" name="horas4" value="<?php echo $options["horas4"]?>"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio4" name="precio4" value="<?php echo $options["precio4"]?>"></td>
                 </tr>
                 <tr>
                    <td>5</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo5"]?>" class="ancho150" id="codigo5" name="codigo5"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish5" name="descEnglish5" value="<?php echo $options["descEnglish5"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol5" name="descEspanol5" value="<?php echo $options["descEspanol5"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas5" name="horas5" value="<?php echo $options["horas5"]?>"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio5" name="precio5" value="<?php echo $options["precio5"]?>"></td>
                 </tr>

                 <tr>
                    <td>6</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo6"]?>" class="ancho150" id="codigo6" name="codigo6"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish6" name="descEnglish6" value="<?php echo $options["descEnglish6"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol6" name="descEspanol6" value="<?php echo $options["descEspanol6"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas6" name="horas6" value="<?php echo $options["horas6"]?>"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio6" name="precio6" value="<?php echo $options["precio6"]?>"></td>
                 </tr>

                 <tr>
                    <td>7</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo7"]?>" class="ancho150" id="codigo7" name="codigo7"></td>
                    <td colspan="4">
                        <select id="descEnglish7" name="descEnglish7" onchange="buscaOpcion2('saddles','codigo7','descEspanol7','horas7', 'precio7', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish7"].'" selected>'.$options["descEnglish7"].'</option>'; ?>
                            <?php $lista ->llenaSaddles(); ?>
                        </select>

                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol7" name="descEspanol7" value="<?php echo $options["descEspanol7"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas7" name="horas7" value="<?php echo $options["horas7"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio7" name="precio7" value="<?php echo $options["precio7"]?>" ></td>
                </tr>


                 <tr>
                    <td>8</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo8"]?>" class="ancho150" id="codigo8" name="codigo8"> </td>
                    <td colspan="4">
                        <select id="descEnglish8" name="descEnglish8" value="<?php echo $options["descEnglish8"]?>" onchange="buscaOpcion2('opciones','codigo8','descEspanol8','horas8', 'precio8', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish8"].'" selected>'.$options["descEnglish8"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol8" name="descEspanol8" value="<?php echo $options["descEspanol8"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas8" name="horas8" value="<?php echo $options["horas8"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio8" name="precio8" value="<?php echo $options["precio8"]?>" ></td>
                 </tr>


                 <tr>
                    <td>9</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo9"]?>" class="ancho150" id="codigo9" name="codigo9"> </td>
                    <td colspan="4">
                        <select id="descEnglish9" name="descEnglish9" value="<?php echo $options["descEnglish9"]?>" onchange="buscaOpcion2('opciones','codigo9','descEspanol9','horas9', 'precio9', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish9"].'" selected>'.$options["descEnglish9"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol9" name="descEspanol9" value="<?php echo $options["descEspanol9"]?>"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas9" name="horas9" value="<?php echo $options["horas9"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio9" name="precio9" value="<?php echo $options["precio9"]?>" ></td>
                 </tr>


                 <tr>
                    <td>10</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo10"]?>" value="-" class="ancho150" id="codigo10" name="codigo10"> </td>
                    <td colspan="4">
                        <select id="descEnglish10" name="descEnglish10" onchange="buscaOpcion2('opciones','codigo10','descEspanol10','horas10', 'precio10', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish10"].'" selected>'.$options["descEnglish10"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol10" name="descEspanol10" value="<?php echo $options["descEspanol10"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas10" name="horas10" value="<?php echo $options["horas10"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio10" name="precio10" value="<?php echo $options["precio10"]?>" ></td>
                 </tr>


                 <tr>
                    <td>11</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo11"]?>" class="ancho150" id="codigo11" name="codigo11"> </td>
                    <td colspan="4">
                        <select id="descEnglish11" name="descEnglish11" onchange="buscaOpcion2('opciones','codigo11','descEspanol11','horas11', 'precio11', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish11"].'" selected>'.$options["descEnglish11"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol11" name="descEspanol11" value="<?php echo $options["descEspanol11"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas11" name="horas11" value="<?php echo $options["horas11"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio11" name="precio11" value="<?php echo $options["precio11"]?>" ></td>
                 </tr>


                 <tr>
                    <td>12</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo12"]?>" class="ancho150" id="codigo12" name="codigo12"> </td>
                    <td colspan="4">
                        <select id="descEnglish12" name="descEnglish12" onchange="buscaOpcion2('opciones','codigo12','descEspanol12','horas12', 'precio12', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish12"].'" selected>'.$options["descEnglish12"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol12" name="descEspanol12" value="<?php echo $options["descEspanol12"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas12" name="horas12" value="<?php echo $options["horas12"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio12" name="precio12" value="<?php echo $options["precio12"]?>" ></td>
                 </tr>


                 <tr>
                    <td>13</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo13"]?>" class="ancho150" id="codigo13" name="codigo13"> </td>
                    <td colspan="4">
                        <select id="descEnglish13" name="descEnglish13" onchange="buscaOpcion2('opciones','codigo13','descEspanol13','horas13', 'precio13', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish13"].'" selected>'.$options["descEnglish13"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol13" name="descEspanol13" value="<?php echo $options["descEspanol13"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas13" name="horas13" value="<?php echo $options["horas13"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio13" name="precio13" value="<?php echo $options["precio13"]?>" ></td>
                 </tr>


                 <tr>
                    <td>14</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo14"]?>" class="ancho150" id="codigo14" name="codigo14"> </td>
                    <td colspan="4">
                        <select id="descEnglish14" name="descEnglish14" onchange="buscaOpcion2('opciones','codigo14','descEspanol14','horas14', 'precio14', this.value)" onblur="sumaTotales()">
                            <?php echo '<option value="'.$options["descEnglish14"].'" selected>'.$options["descEnglish14"].'</option>'; ?>
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol14" name="descEspanol14" value="<?php echo $options["descEspanol14"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas14" name="horas14" value="<?php echo $options["horas14"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio14" name="precio14" value="<?php echo $options["precio14"]?>" ></td>
                 </tr>


                 <tr>
                    <td>15</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo15"]?>" class="ancho150" id="codigo15" name="codigo15" class="ancho120"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish15" name="descEnglish15" value="<?php echo $options["descEnglish15"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol15" name="descEspanol15" value="<?php echo $options["descEspanol15"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas15" name="horas15" value="<?php echo $options["horas15"]?>"  class="ancho120"></td>
                    <td><input readonly="readonly" class="ancho70" id="precio15" name="precio15" value="<?php echo $options["precio15"]?>"  class="ancho120"></td>
                 </tr>
                 <tr>
                    <td>16</td>
                    <td><input readonly="readonly" value="<?php echo $options["codigo16"]?>" class="ancho150" id="codigo16" name="codigo16"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish16" name="descEnglish16" value="<?php echo $options["descEnglish16"]?>"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol16" name="descEspanol16" value="<?php echo $options["descEspanol16"]?>" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas16" name="horas16" value="<?php echo $options["horas16"]?>" ></td>
                    <td><input readonly="readonly" class="ancho70" id="precio16" name="precio16" value="<?php echo $options["precio16"]?>" ></td>
                 </tr>

                </tbody>
            </table>
        </div> <!--  col-   -->

      </div><!--   row  -->

        <!-- *************************************************************************************************************-->
        <!--   ******************************************     Totales     ****************************************-->
      <div class="row">

        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <table id="tablaTotales" class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <br>
                    </tr>
                    
                    <tr>
                        <input class="btn btn-secondary" name="Cancel" value="Cancel" onClick="location.href='index.php?action=ordenes'">
                        <input class="btn btn-warning btn-block" type="submit" id="actualiza" name="actualiza" value="" hidden>
                        <input id="myBtn" class="btn btn-warning" data-toggle="modal" data-target="#updateModal" value="Update Order">
                        <textarea class="form-control" rows="4" cols="20" name="changeNotes" id="changeNotes" hidden></textarea>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="col-md-4">
            <table id="tablaTotales" class="table table-bordered table-sm" style="text-align: right;">
                <tbody>
                    <tr class="table-secondary">
                        <td colspan="4" style="text-align: center;"><strong>Totals</strong></td>

                    </tr>
                <tr>

                    <td>Total Horas</td>
                    <td><input readonly="readonly" type="text" size="10" id="TotalHoras" name="TotalHoras" value="<?php echo $respuesta["totHrs"];?>" ></td>
                    <td>Total Options</td>
                    <td>
                        <label id="labelTotalOpciones">
                            $ <?php echo "<script>document.querySelector('#labelTotalOpciones').innerText = numeral(". $respuesta["totOpciones"] .").format('0,0.00'); </script>";  ?>
                        </label>
                        <input  hidden readonly="readonly" type="text" size="10" id="TotalOpciones" name="TotalOpciones" value="<?php echo $respuesta["totOpciones"];?>" ></td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Sub-Total</td>
                    <td>
                        <label id="labelsubTotal">
                            $ <?php echo "<script>document.querySelector('#labelsubTotal').innerText = numeral(". $respuesta["subTotal"] .").format('0,0.00'); </script>";  ?>
                        </label>
                        <input  hidden value="<?php echo $respuesta["subTotal"];?>" readonly="readonly" type="text" size="10" id="subTotal" name="subTotal">
                    </td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>2% Discount</td>
                    <td>
                        <label id="labelDescuento">
                            $ <?php echo "<script>document.querySelector('#labelDescuento').innerText = numeral(". $respuesta["discount"] .").format('0,0.00'); </script>";  ?>
                        </label>
                        <input hidden value="<?php echo $respuesta["discount"];?>" readonly="readonly" type="text" size="10" id="descuento" name="descuento">
                    </td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td>
                        <strong>
                        <label id="labelTotal">
                            <?php echo "<script>document.querySelector('#labelTotal').innerText = '$ ' + numeral(". $respuesta["totPrice"] .").format('0,0.00'); </script>";  ?>
                        </label>
                        </strong>
                        <input hidden value="<?php echo $respuesta["totPrice"];?>" readonly="readonly" class="ancho120" type="number" min="1" step="any" size="10" id="Total" name="Total"></td>

                 </tr>
                    </tbody>
            </table>
        </div>  <!-- col -->
        <div class="col-md-2">
        </div>

      </div> <!--  row -->
      <!-- *************************************************************************************************************-->

    </div><!--   container   -->



  </form>

  <?php

        $registro = new controller();
        $registro -> actualizaOrdenes($respuesta);

        ?>
  <?php include "views/modules/footer.php"; ?>

</div> <!--/.content-wrapper-->