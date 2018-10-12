<?php

$clientes = array(); //creamos un array

 $id="890";
    $nombre="Ricardo Urbina";
    $edad="40";
    $genero="Masculino";
    $email="mail@mail.com";
    $localidad="Cuauhtla";
    $telefono="6251221438";

 $clientes[] = array('id'=> $id, 'nombre'=> $nombre, 'edad'=> $edad, 'genero'=> $genero,
                        'email'=> $email, 'localidad'=> $localidad, 'telefono'=> $telefono);


 //Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;

?>
