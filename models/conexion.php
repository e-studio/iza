<?php
class Conexion{
    public function conectar(){
                
    	// -------------------          Servidor Plesk

        /*$dsn = 'mysql:dbname=ph18408318088_; host=50.62.209.108:3306';
        $usuario = 'rick';
        $contraseña = 'B4laj@06';*/
        
    	

    	// -------------------          Servidor Linux - E-studio

        /* $dsn = 'mysql:dbname=multie5_IZA;host=localhost';
        $usuario = 'multie5_IZA';
        $contraseña = ')RpVj(9A7F$O';*/

        

        // -------------------          Local laptop

        $dsn = 'mysql:dbname=IZA; host=localhost';
        $usuario = 'root';
        $contraseña = '';
        
        
      //--------------------------------------------------------------------------------------------------  
       try {
           $link = new PDO($dsn, $usuario, $contraseña);
        } 
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        
        return $link;
    }
}

?>