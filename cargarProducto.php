<?php 

session_start();

if ($_SESSION['s_activa']== true)
{
include "includes/conexion.php";

$categoria= $_POST['categoria'];
$nombre= strtoupper($_POST['nombre']);
$descripcion= $_POST['descripcion'];
$precio= $_POST['precio'];
$cantidad= $_POST['cantidad'];
$foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));

$consulta = "SELECT * FROM productos WHERE nombre ='$nombre'";
$result = mysqli_query($conexion,$consulta);
if(mysqli_num_rows($result)>0){
    ?>
        <script>
            alert("Ese producto ya está registrado");
            header('location:administracion.php');
        </script>
    <?php
}
else{
    $query= "INSERT INTO productos (categoria, nombre, descripcion, precio, cantidad, foto)
    VALUES('$categoria','$nombre', '$descripcion', '$precio', '$cantidad', '$foto')";
    $resultado = mysqli_query($conexion, $query);
    header('location:administracion.php');
    }
}
else
{
  header("location: login.php");
}

 ?>