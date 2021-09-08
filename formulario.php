<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include ('includes/bootstrap.php');?>
    <?php include ('includes/navbar.php'); ?>

    <title>Formulario</title>
</head>

<body style="background-color: rgb(50,50,50)">
    <?php navBar(); ?>
    <br><br>

    <div class="container" style="border: 2px solid #f0ad4e;border-radius:20px">
        <div class="row" style="margin:15px">
			<div class="col-1"></div>
            <div class="col-5 info">
			<h3 style="color: #f0ad4e;font-family:Oswald;"><b>CONTACTANOS</b></h3> <br>
			
			<p style="color: rgb(198, 168, 125);font-family:Oswald">Av. J.L. Suárez 300</p>
			<br>
			<p style="color: rgb(198, 168, 125);font-family:Oswald">Teléfono: 2346 42-0917 <br> joyeriadambrosio@yahoo.com.ar </p>
			<br><br>
			<h6 style="color: rgb(198, 168, 125);font-family:Oswald">Contactanos con la informacion dada arriba <br> o completa el formulario de consulta</h6> <br>
            <img src="img/logo.png" width="312" height="276">
			</div>
            <div class="col-5 inputs">
			<h3 style="color: #f0ad4e;font-family:Oswald;"> <b>DEJANOS TU PEDIDO</b></h3> <br>
                <form action="recepcion.php" method="post">
                    <div class="form-group">
                        <label style="color: rgb(198, 168, 125);font-family:Oswald" for="formGroupExampleInput">Nombre</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="nombre"
                            placeholder="Ingrese su nombre">

                    </div>
                    <div class="form-group"><br>
                        <label style="color: rgb(198, 168, 125);font-family:Oswald" for="formGroupExampleInput2">Correo</label>
                        <input type="email" class="form-control" id="formGroupExampleInput2" required name="correo"
                            placeholder="Ingrese su correo">
                    </div>

                    <div class="form-group"><br>
                        <label style="color: rgb(198, 168, 125);font-family:Oswald" for="textarea">Consulta</label>
                        <textarea class="form-control" id="editor1" name="mensaje" rows="8" cols="60"></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-warning w-100" style="background-color: #f0ad4e; border-color:gray"><b>Enviar</b></button>
                </form>

            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <br><br>
    <hr class="solid" style="border-top: 2px solid #bbb;">
  <footer>
        <img id="fondo1" src="img/fondo2.jpg" class="img-fluid w-100">
        <div style="background-color: rgb(60,60,60); position:sticky; bottom:0">
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
                            <p style="color: rgb(198, 168, 125)">Teléfono: 2346 42-0917 <br>Email: joyeriadambrosio@yahoo.com.ar
                            </p>
                    </div>
                   
                    <div class="col-4">
                    <h5 style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;"><i><u>Nuestras redes</u></i></h5>
                        <a id="whatsapp" class="whatsapp" target="_blank" style="font-size:30px"
                            href="https://api.whatsapp.com/send?phone=+542346409898"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/joyeriadambrosio/" style="font-size:30px" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/Joyeria-DAmbrosio-1453064374977361" style="font-size:30px" class="facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                    </div>
                    
                </div>
                <br>
            </div>
        </div>

    </footer>



    <?php include ('includes/buscador.php');?>
    <?php autocompletado(); ?>
</body>

</html>