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
  <form action="" name="cotizador" method="post">

    <div class="container-fluid">

        <div class="row">
          <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Order</div>
                <div class="card-body">
                    <p class="card-text">ORDER # : <input class="ancho170" type="text" name="tbd" id="tbd" required></p>
                    <p class="card-text">Trailer # : <input class="ancho120" type="text" name="trailerNo" id="trailerNo" required></p>
                    <p class="card-text">Trailer Vin # : <input class="ancho120" type="text" name="trailerVin" id="trailerVin" required></p>
                    <p class="card-text">Due Date : <input class="ancho170" type="date" name="dueDate" id="dueDate" required></p>
                </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">

                <p style="text-align: center; font-size: 105px;" class="card-text">TBD</p>
                <textarea rows="3" cols="75" name="notes" id="notes" placeholder="Notes..."></textarea>
                <input type="submit" class="btn btn-primary" name="envia" value="Save Order">

              </div>
            </div>
          </div>
        </div><!-- row -->
        <br>

          <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-sm">
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
                                    echo '<option value="">Seleccione:</option>';
                                    $lista ->llenaModelos();?>
                                </select>
                            </td>
                            <td>
                                <select name="tLength" id="tLenght">
                                    <option value="">Select Length</option>
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
                                <select name="tWidth" id="tWidth">
                                    <option value="">Select Width</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="6.8">6.8</option>
                                    <option value="7">7</option>
                                    <option value="7.5">7.5</option>
                                </select>
                                <script>
                                    document.getElementById("tWidth").addEventListener("change", calculaPeso);
                                </script>

                            </td>
                            <td>
                                <select name="tAxles" id="tAxles">
                                    <option value="0">Select Axles</option>
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
                                <script>
                                    document.getElementById("tAxles").addEventListener("change", calculaPeso);
                                </script>

                            </td>
                            <td>
                                <select id="tSides" name="tSides" onchange="buscaOpcion('opciones','codigo2','descEnglish2','descEspanol2','horas2', 'precio2', this.value)" onblur="sumaTotales()">
                                    <option value="">Select Sides</option>
                                    <option value="STANDARDSIDES">Standard</option>
                                    <option value="4HIGHSIDE">4' High</option>
                                    <option value="FLUSHFENDERS">Flush With Fender</option>
                                    <option value="DOUBLEDECKSIDE">For Double Deck</option>
                                </select>

                            </td>
                            <td>
                                <select name="tTop">
                                    <option value="">Select Top</option>
                                    <option value="Full Top">Full Top</option>
                                    <option value="3/4 Top">3/4 Top</option>
                                    <option value="1/2 Top">1/2 Top</option>
                                    <option value="Bow Top">Bow Top</option>
                                </select>

                            </td>
                            <td>
                                <select id="tRearGate" name="tRearGate" onchange="buscaOpcion('opciones','codigo3','descEnglish3','descEspanol3','horas3', 'precio3', this.value)" onblur="sumaTotales()">
                                    <option value="">Select Gate</option>
                                    <option value="BUTTERFLYGATE">Butterfly</option>
                                    <option value="SINGLESWING">Single Swing</option>
                                    <option value="SWING/SLIDER">Swing/Slider</option>
                                </select>

                            </td>
                            <td><input class="ancho120" type="text" name="tCompartments" id="tCompartments"></td>
                            <td>
                                <select name="tEscapeGate">
                                    <option value="">None</option>
                                    <option value="Driver Side">Driver Side</option>
                                    <option value="Passenger Side">Passenger Side</option>
                                    <option value="Both Sides">Both Sides</option>
                                </select>

                            </td>
                            <td rowspan="7"><input readonly="readonly" value="0" name="horasMdl" id="horasMdl" class="ancho50"></td>
                            <td rowspan="7"><input readonly="readonly" value="0" name="precioMdl" id="precioMdl" class="ancho100"></td>
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
                            <td><input style="width: 100px !important;" type="text" name="tBlanketBars" id="blanketBars"></td>

                            <td>
                               <select id="tFloorType" name="tFloorType" onchange="buscaOpcion('opciones','codigo1','descEnglish1','descEspanol1','horas1', 'precio1', this.value)" onblur="sumaTotales()">
                                    <option value="">Select Floor</option>
                                    <option value="WOODFLOOR">Wood Floor</option>
                                    <option value="CRUBBERBOARD">C Rubber Boards</option>
                                    <option value="SRUBBERBOARD">S Rubber Boards</option>
                                </select>

                                <script>
                                    document.getElementById("tFloorType").addEventListener("change", calculaPeso);
                                </script>


                            </td>
                            <td>
                                <select name="tFloorSpacing">
                                    <option value="Standard">Standard</option>
                                    <option value="0">0</option>
                                    <option value="1/2\"">1/2"</option>
                                    <option value="3/4\"">3/4"</option>
                                </select>

                            </td>
                            <td>
                                <select id="tRollers" name="tRollers" onchange="buscaOpcion('opciones','codigo4','descEnglish4','descEspanol4','horas4', 'precio4', this.value)" onblur="sumaTotales()">
                                    <option value="">Rollers?</option>
                                    <option value="NOROLLERS">No</option>
                                    <option value="ROLLERPIN">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select name="tHinch">
                                    <option value="">Hinch?</option>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select name="tHSLength">
                                    <option value="">Select length</option>

                                    <?php
                                    for ($i=1; $i<=36; $i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                    ?>

                                </select>

                            </td>
                            <td>
                                <select name="tMatting">
                                    <option value="">Select length</option>

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
                                <select name="tCalf">
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
                                <select id="tVents" name="tVents" onchange="buscaOpcion('vents','codigo16','descEnglish16','descEspanol16','horas16', 'precio16', this.value)" onblur="sumaTotales()">
                                    <?php $lista ->llenaVents(); ?>
                                    </select>
                                </td>
                            <td>
                                <select name="tRhino">
                                    <option value="">Select length</option>

                                    <?php
                                    for ($i=1; $i<=125; $i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }

                                    ?>

                                </select>

                            </td>

                            <td><input class="ancho120" type="text" name="tSideRails" id="tSideRails"></td>
                            <td colspan="2">
                                <select name="tSaddleBox">
                                    <option value="With Divider Wall">With Divider Wall</option>
                                    <option value="Only HSS for Racks">Only HSS for Racks</option>
                                </select>

                            </td>
                            <td>
                                <select id="tires" name="tTires" onchange="buscaOpcion('opciones','codigo5','descEnglish5','descEspanol5','horas5', 'precioAxle', this.value)" onblur="sumaTotales()">
                                    <option value="">Select Tire</option>
                                    <option value="10PLY16SR">10PLY16SR</option>
                                    <option value="12PLY16SR">12PLY16SR</option>
                                    <option value="14PLY16SR">14PLY16SR</option>
                                    <option value="14PLY16AR">14PLY16AR</option>
                                    <option value="18PLY17.5SR">18PLY16SR</option>
                                </select>
                                <script>
                                    document.getElementById("tires").addEventListener("change", calculaPeso);
                                </script>

                            </td>
                            <td>
                                <select id="eTires" name="tExtraTire" onchange="buscaOpcion('opciones','codigo6','descEnglish6','descEspanol6','horas6', 'precio6', this.value)" onblur="sumaTotales()">
                                    <option value="">Select Tire</option>
                                    <option value="10PLY16SRE">10PLY16SRE</option>
                                    <option value="12PLY16SRE">12PLY16SRE</option>
                                    <option value="14PLY16SRE">14PLY16SRE</option>
                                    <option value="14PLY16ARE">14PLY16ARE</option>
                                    <option value="18PLY16SRE">18PLY16SRE</option>
                                </select>
                                <script>
                                    document.getElementById("eTires").addEventListener("change", calculaPeso);
                                </script>

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
                                <select name="tColor" id="tColor">
                                    <option value="">Select Paint</option>
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
                                    <option value="">Select</option>
                                    <option value="6 Way">6 Way</option>
                                    <option value="7 Way">7 Way</option>
                                </select>

                            </td>
                            <td>
                                <select name="tRearPlug">
                                    <option value="">Select</option>
                                    <option value="6 Way">6 Way</option>
                                    <option value="7 Way">7 Way</option>
                                </select>

                            </td>
                            <td>
                                <select name="tTireCover">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>

                            </td>
                            <td>
                                <select id="tarp" name="tTarp" onchange="buscaOpcion('lonas','codigo15','descEnglish15','descEspanol15','horas15', 'precio15', this.value)" onblur="sumaTotales()">
                                    <option value="">Seleccione:</option>
                                    <?php $lista ->llenaLonas(); ?>
                                </select>
                            </td>

                            <td colspan="2">&nbsp;</td>
                            <td><input class="ancho120" name="totWeight" id="totWeight" value="0" readonly="readonly"></td>
                            <td><input class="ancho120" name="floorFt" id="floorFt" value="0" readonly="readonly">
                                <input id="pesoTrailer" value="0" hidden>
                                <input id="precioAxle" value="0" hidden>

                            </td>

                         </tr>
                </tbody>
                </table>

            </div>
          </div> <!-- row -->
    </div><!-- container-fluid -->





    <div class="container-fluid">
        <!-- ***********************************   opciones    *********************************************************-->
      <div class="row">

        <div class="col-md-12">
            <table class="table table-bordered table-sm">
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
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo1" name="codigo1"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish1" name="descEnglish1" value="Select Wood Type"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol1" name="descEspanol1" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas1" name="horas1" value="0"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio1" name="precio1" value="0"></td>
                 </tr>
                 <tr>
                    <td>2</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo2" name="codigo2"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish2" name="descEnglish2" value="Select Side"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol2" name="descEspanol2" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas2" name="horas2" value="0"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio2" name="precio2" value="0"></td>
                 </tr>
                 <tr>
                    <td>3</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo3" name="codigo3"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish3" name="descEnglish3" value="Select Rear Gate"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol3" name="descEspanol3" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas3" name="horas3" value="0"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio3" name="precio3" value="0"></td>
                 </tr>
                 <tr>
                    <td>4</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo4" name="codigo4"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish4" name="descEnglish4" value="Select Roller"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol4" name="descEspanol4" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas4" name="horas4" value="0"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio4" name="precio4" value="0"></td>
                 </tr>
                 <tr>
                    <td>5</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo5" name="codigo5"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish5" name="descEnglish5" value="Select Tire"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol5" name="descEspanol5" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas5" name="horas5" value="0"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio5" name="precio5" value="0"></td>
                 </tr>

                 <tr>
                    <td>6</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo6" name="codigo6"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish6" name="descEnglish6" value="Select Spare Tire"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol6" name="descEspanol6" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas6" name="horas6" value="0"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio6" name="precio6" value="0"></td>
                 </tr>


                 <tr>
                    <td>7</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo7" name="codigo7"></td>
                    <td colspan="4">
                        <select id="descEnglish7" name="descEnglish7" onchange="buscaOpcion2('saddles','codigo7','descEspanol7','horas7', 'precio7', this.value)" onblur="calculaPeso()">
                            <option value="">Select Tack Room or Saddle box</option>
                            <?php $lista ->llenaSaddles(); ?>
                        </select>
                        <script>
                            //document.getElementById("codigo7").addEventListener("change", calculaPeso);
                        </script>

                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol7" name="descEspanol7" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas7" name="horas7" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio7" name="precio7" value="0" ></td>
                </tr>


                 <tr>
                    <td>8</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo8" name="codigo8"> </td>
                    <td colspan="4">
                        <select id="descEnglish8" name="descEnglish8" onchange="buscaOpcion2('opciones','codigo8','descEspanol8','horas8', 'precio8', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol8" name="descEspanol8" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas8" name="horas8" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio8" name="precio8" value="0" ></td>
                 </tr>


                 <tr>
                    <td>9</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo9" name="codigo9"> </td>
                    <td colspan="4">
                        <select id="descEnglish9" name="descEnglish9" onchange="buscaOpcion2('opciones','codigo9','descEspanol9','horas9', 'precio9', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol9" name="descEspanol9" value="-"></td>
                    <td><input readonly="readonly" class="ancho50" id="horas9" name="horas9" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio9" name="precio9" value="0" ></td>
                 </tr>


                 <tr>
                    <td>10</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo10" name="codigo10"> </td>
                    <td colspan="4">
                        <select id="descEnglish10" name="descEnglish10" onchange="buscaOpcion2('opciones','codigo10','descEspanol10','horas10', 'precio10', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol10" name="descEspanol10" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas10" name="horas10" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio10" name="precio10" value="0" ></td>
                 </tr>


                 <tr>
                    <td>11</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo11" name="codigo11"> </td>
                    <td colspan="4">
                        <select id="descEnglish11" name="descEnglish11" onchange="buscaOpcion2('opciones','codigo11','descEspanol11','horas11', 'precio11', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol11" name="descEspanol11" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas11" name="horas11" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio11" name="precio11" value="0" ></td>
                 </tr>


                 <tr>
                    <td>12</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo12" name="codigo12"> </td>
                    <td colspan="4">
                        <select id="descEnglish12" name="descEnglish12" onchange="buscaOpcion2('opciones','codigo12','descEspanol12','horas12', 'precio12', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol12" name="descEspanol12" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas12" name="horas12" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio12" name="precio12" value="0" ></td>
                 </tr>


                 <tr>
                    <td>13</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo13" name="codigo13"> </td>
                    <td colspan="4">
                        <select id="descEnglish13" name="descEnglish13" onchange="buscaOpcion2('opciones','codigo13','descEspanol13','horas13', 'precio13', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol13" name="descEspanol13" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas13" name="horas13" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio13" name="precio13" value="0" ></td>
                 </tr>


                 <tr>
                    <td>14</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo14" name="codigo14"> </td>
                    <td colspan="4">
                        <select id="descEnglish14" name="descEnglish14" onchange="buscaOpcion2('opciones','codigo14','descEspanol14','horas14', 'precio14', this.value)" onblur="sumaTotales()">
                            <?php $lista ->llenaOpciones(); ?>
                        </select>
                    </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol14" name="descEspanol14" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas14" name="horas14" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio14" name="precio14" value="0" ></td>
                 </tr>


                 <tr>
                    <td>15</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo15" name="codigo15" class="ancho120"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish15" name="descEnglish15" value="Select Tarp"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol15" name="descEspanol15" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas15" name="horas15" value="0"  class="ancho120"></td>
                    <td><input readonly="readonly" class="ancho100" id="precio15" name="precio15" value="0"  class="ancho120"></td>
                 </tr>
                 <tr>
                    <td>16</td>
                    <td><input readonly="readonly" value="-" class="ancho150" id="codigo16" name="codigo16"> </td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEnglish16" name="descEnglish16" value="Select Vents"></td>
                    <td colspan="4"><input readonly="readonly" class="ancho450" id="descEspanol16" name="descEspanol16" value="-" ></td>
                    <td><input readonly="readonly" class="ancho50" id="horas16" name="horas16" value="0" ></td>
                    <td><input readonly="readonly" class="ancho100" id="precio16" name="precio16" value="0" ></td>
                 </tr>

                </tbody>
            </table>
        </div> <!--  col-   -->

      </div><!--   row  -->

        <!-- *************************************************************************************************************-->
        <!--   ******************************************     Totales     ****************************************-->
      <div class="row">

        <div class="col-md-8">
        </div>
        <div class="col-md-4">
            <table id="tablaTotales" class="table table-bordered table-sm">
                <tbody>
                    <tr class="table-secondary">
                        <td colspan="4" style="text-align: center;"><strong>Totals</strong></td>

                    </tr>
                <tr>

                    <td>Total Horas</td>
                    <td><input readonly="readonly" type="text" size="10" id="TotalHoras" name="TotalHoras" value="0" ></td>
                    <td>Total Options</td>
                    <td><input readonly="readonly" type="text" size="10" id="TotalOpciones" name="TotalOpciones" value="0" ></td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Sub-Total</td>
                    <td><input readonly="readonly" type="text" size="10" id="subTotal" name="subTotal" value="0" ></td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>2% Discount</td>
                    <td><input readonly="readonly" type="text" size="10" id="descuento" name="descuento" value="0" ></td>

                 </tr>
                 <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td><input readonly="readonly" class="ancho120" type="number" min="1" step="any" size="10" id="Total" name="Total" value="0" ></td>

                 </tr>
                    </tbody>
            </table>
        </div>  <!-- col -->
      </div> <!--  row -->
      <!-- *************************************************************************************************************-->

    </div><!--   container   -->



  </form>

  <?php

        $registro = new controller();
        $registro -> registroOrdenes();

        ?>
  <?php include "views/modules/footer.php"; ?>

</div> <!--/.content-wrapper-->