<!DOCTYPE html>
<html>
<head>
<title>Busqueda PHP MySQL Ajax</title>


<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/typeahead.js"></script>


<meta charset="utf-8">
	<style>
	.typeahead { border: 2px solid #fff;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(128, 128, 128, 1);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.lista-color {max-width: 450px;min-width: 290px;max-height:340px;
	border-radius:4px;text-align:left;margin:10px; margin-bottom:120px;}
	.Busca-pais {font-size:1.5em;color: #686868;font-weight: 700; text-align:left}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
	.form-control{width:300px;}
	</style>
</head>
<body>



<div class="container">
  
  <div class="row">
    <div class="col-md-6">
      <div class="panel-body">

      <!--Elementos de formulario que realizara la busqueda-->
      	<div class="lista-color">
      		<label class="Busca-pais">Busca tu País:</label><br/> 
              <input type="text" name="MiPais" id="MiPais"  class="form-control"/>
      	</div>
      <!--Fin elementos de formulario que realizara la busqueda-->
      </div>
    </div>
  </div>
</div>

    
</body>
<script>
    $(document).ready(function () {
        $('#MiPais').typeahead({
            source: function (busqueda, resultado) {
                $.ajax({
                    url: "consulta.php",
					          data: 'busqueda=' + busqueda,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						resultado($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

</html>