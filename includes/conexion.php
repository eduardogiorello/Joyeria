<?php 
    $usuario = 'root';
    $clave = '';
    $servidor = 'localhost';
    $baseDeDatos = 'joyeria';

    
    $conexion = mysqli_connect($servidor, $usuario, $clave,$baseDeDatos) or die('No se pudo conectar con el servidor');
   
   
     mysqli_set_charset($conexion,'utf8');
 
    ?>