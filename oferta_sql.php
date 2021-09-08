<?php 
 session_start();
  if ($_SESSION['s_activa']== true)
{

    ?>

 <!DOCTYPE html>
 <html lang="en">
 

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Oferta</title>

 </head>
 <body>



 <?php 
include 'includes/conexion.php';

if($_POST)
{
    $id = $_POST['id_oferta'];
    $aux= (int) $_POST['input'];

    if($aux<0)
    {
        $input=0;

        echo "<script>alert('el descuento tiene que ser mayor o igual a 0')
        location.href='elegirOfertas.php'
        </script>";
    }else
    {

        $input = $_POST['input'];
        echo "<script>alert('Descuento agregado exitosamente')
        location.href='elegirOfertas.php'
        </script>";
    }

$query= "UPDATE productos SET enOferta=$input WHERE id=$id";
$resul= mysqli_query($conexion,$query);


}



 ?>

 
 </body>
 </html>
 <?php 
}
else
{
  header("location: login.php");
}


 ?>