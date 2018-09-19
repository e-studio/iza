<?php
$q = $_GET['q'];
$t = $_GET['t'];
require_once "controllers/controller.php";
require_once "models/crud.php";
$precio = new controller(); 
$precio->buscaOpcion($t,$q);

?>
