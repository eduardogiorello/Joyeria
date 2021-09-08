<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('includes/conexion.php'); ?> 
    <?php include ('includes/navbar.php'); ?>
    <?php include ('includes/novedades.php'); ?>
    <?php include ('includes/ofertas.php'); ?>
    <?php include ('includes/otrosProductos.php'); ?>
    <?php include ('includes/masVendidos.php'); ?>
    <?php include ('includes/masBuscados.php'); ?>
    <?php include ('includes/bootstrap.php');?>
    <title>Joyeria D'ambrosio</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="includes/Glider.js-master/glider.min.css">
    <link rel="stylesheet" href="css/carruselesIndex.css">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body style="background-color: rgb(50,50,50)">

    <header>
        <?php navBar();
        
        ?>
<br><br>
       <div class="contenedor-titulo">
            <p style="font-family:Oswald">JOYERIA</p>
<ul class="titulo">
    <li style="font-family:Oswald">D'AMBROSIO</li>
    <li style="font-family:Oswald">D'AMBROSIO</li>
    <li style="font-family:Oswald">D'AMBROSIO</li>
   
</ul>

       </div>
        <br><br>
        <hr class="solid" style="border-top: 2px solid #bbb;">
        <div id="carouselHeader" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" >
                <div class="carousel-item active">
                <img src="img/fondo1.jpg" class="img-fluid w-100 fondo1">
                </div>
                <div class="carousel-item">
                <img src="img/diamond.jpg" class="img-fluid w-100 fondo1">
                </div>
                <div class="carousel-item">
                <img src="img/crown.jpg" class="img-fluid w-100 fondo1">
                </div>
            </div>
            
    </header>
    <hr class="solid" style="border-top: 2px solid #bbb;">
    <br>
    <h3 style="text-align:center;color: #f0ad4e;font-family:Oswald;">LO MAS VENDIDO</h3><br>
    <?php cargarMasVendidos(); ?>
    <hr class="solid" style="border-top: 2px solid #bbb;">
    <br>
    <h3 style="text-align:center;color: #f0ad4e;font-family:Oswald;">LO MAS BUSCADO</h3><br>
    <?php cargarMasBuscados(); ?>
    <hr class="solid" style="border-top: 2px solid #bbb;">
    <br>
    <h3 style="text-align:center;color: #f0ad4e;font-family:Oswald">LO NUEVO</h3><br>
    <?php cargarNovedades(); ?>
    <hr class="solid" style="border-top: 2px solid #bbb;">
    <br>
    <!---------------------------------------------------------------------------------------------------->
    <?php 
      $qy_productos = "SELECT * FROM productos WHERE enOferta>0";
      $productos = mysqli_query($conexion, $qy_productos);
      if(mysqli_num_rows($productos)>=12){
        echo '<h3 style="text-align:center;color: #f0ad4e;font-family:Oswald;">OFERTAS</h3><br>';
        cargarOfertas();
      }
      else{
        echo '<h3 style="text-align:center;color: #f0ad4e;font-family:Oswald;">NUESTROS PRODUCTOS</h3><br>';
        cargarOtros();
      }
       ?>
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




    <script src="includes/Glider.js-master/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/carruselesIndex.js"></script>
    <?php include ('includes/buscador.php');?>
    <?php autocompletado(); ?>
</body>

</html>