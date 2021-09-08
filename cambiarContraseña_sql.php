<?php
session_start();

if ($_SESSION['s_activa']== true)
{
    require_once ('includes/conexion.php');
    $qy_datos = "SELECT *  FROM usuarios";
    $result = mysqli_query($conexion,$qy_datos);
    $datos = mysqli_fetch_array($result);
    if(isset($_POST['aceptar'])){
       if($_POST['nueva']==''||$_POST['actual']==''||$_POST['nuevaRepetida']==''){
           echo '<script>alert("No se ingresaron todos los campos");
                window.location.href="cambiarContraseña.php";
           </script>';
       }
       else{
            $nueva = password_hash($_POST['nueva'], CRYPT_BLOWFISH);//md5($_POST['nueva']);
           $actual = $_POST['actual'];
           $nuevaRepetida = $_POST['nuevaRepetida'];//md5($_POST['nuevaRepetida']);

           if(!password_verify($nuevaRepetida, $nueva)){
            echo '<script>alert("Las contraseñas nuevas no coinciden");
            window.location.href="cambiarContraseña.php";
            </script>';
           }
           else{
               if(!password_verify($actual,$datos['pass'])){
                echo '<script>alert("No se ingreso la contraseña actual correcta");
                window.location.href="cambiarContraseña.php";
                </script>';
               }
               else{
                   $query = "UPDATE usuarios SET pass='$nueva'";
                   $resultado = mysqli_query($conexion, $query);
                   echo '<script>alert("Contraseña cambiada con éxito");
                window.location.href="administracion.php";
                </script>';
               }
           }

           
       }
    }
}
else
{
    header("location: login.php");
}
        

        ?>