<?php 
if(!session_start()){
	session_start();
}
session_destroy() ;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso</title>
    <?php
    include ('includes/navbar.php');
    include ('includes/bootstrap.php');?>

    <link rel="stylesheet" href="css/estilos.css">

</head>
</head>
<body>
    <?php navBar();  ?>
    <div class="container mt">
        <div class="row justify-content-center">


            <div class="col-6 borde">
                <div class="div">
                    <br>
                    <h3 style="font-family:Oswald">MUCHAS GRACIAS POR SU COMPRA</h3>
                    <br>
                    <h5 style="font-family:Oswald">Se ha notificado por correo a la joyería acerca de ella.</h5>
                    <h5 style="font-family:Oswald">En breve se contactarán con usted.</h5>
                    <br>
                    <a href="index.php"><button type="button" class="btnSeguir">Volver al inicio</button></a>
                </div>
            </div>

        </div>


    </div>
<br><br><br><br><br>

        <div style="background-color: rgb(60,60,60); ">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h5 style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;"><i><u>Direccion</u></i>
                        </h5>

                        <p style="color: rgb(198, 168, 125)">Av. J.L. Suárez 300</p>
                    </div>
                    <div class="col-4">
                        <h5 style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;"><i><u>Contacto</u></i>
                        </h5>
                        <p style="color: rgb(198, 168, 125)">Teléfono: 2346 42-0917 <br>Email:
                            joyeriadambrosio@yahoo.com.ar
                        </p>
                    </div>

                    <div class="col-4">
                        <h5 style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;"><i><u>Nuestras
                                    redes</u></i></h5>
                        <a id="whatsapp" class="whatsapp" target="_blank" style="font-size:30px"
                            href="https://api.whatsapp.com/send?phone=+542346409898"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/joyeriadambrosio/" style="font-size:30px" class="instagram"
                            target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/Joyeria-DAmbrosio-1453064374977361" style="font-size:30px"
                            class="facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                    </div>

                </div>
                <br>
            </div>
        </div>


</body>

</html>