<?php
$t = $_GET['t'];
$q = $_GET['q'];
require_once "controllers/controller.php";
require_once "models/crud.php";
$precio = new controller(); 
$precio->buscaPrecio($t,$q);

?>
