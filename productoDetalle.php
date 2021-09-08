<?php
if(isset($_GET['nombre'])){
    require_once ('includes/conexion.php');
$img='';
$precio = 0;
$precioFinal = 0;
$descripcion = '';
$nombre = htmlspecialchars($_GET['nombre']);
$cantidad = 0;
$categoria ='';
$oferta=0;
$buscado = 0;
$id='';
$qy_productos = "SELECT * FROM productos";
$productos = mysqli_query($conexion, $qy_productos);
while($aux = mysqli_fetch_array($productos)){
    if($nombre == $aux['nombre']){
        $categoria = $aux['categoria'];
        $id = $aux['id'];
        $img = $aux['foto'];
        $cantidad = $aux['cantidad'];
        $descripcion = $aux['descripcion'];
        $buscado = $aux['vecesBuscado'];
        $buscado++;
        if ($aux['enOferta']>0){
            $oferta = $aux['enOferta'];
            $precioFinal = $aux['precio'] - ($aux['precio']*$oferta)/100;
            $precio = $aux['precio'];
        }
        else{
            $precio = $aux['precio'];
        }
    }
}
if($categoria=='' && $precio==0 && $cantidad==0 && $id=='' && $oferta==0 && $descripcion==''){
     ?>
            <script>
                window.location.href="index.php";
            </script>
        <?php
}

$sumarVisita = "UPDATE productos SET vecesBuscado=$buscado WHERE nombre='$nombre' and descripcion='$descripcion'";
$resultado= mysqli_query($conexion,$sumarVisita);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carruselRelacionados.css" rel="stylesheet">
    <link rel="stylesheet" href="includes/Glider.js-master/glider.min.css">
    <?php include ('includes/navbar.php'); ?>
    <?php include ('includes/bootstrap.php'); ?>
    <?php include ('includes/carruselRelacionados.php'); ?>
    <title>Producto</title>
</head>

<body style="background-color: rgb(50,50,50)">
    <?php navBar(); ?>
    <br><br>
    <form action="carritoItems.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="card img" style="width: 18rem; height:18rem;margin-left:200px">

                        <img src="data:image/jpg;base64,<?php echo base64_encode($img); ?>" class="imgDetalle" height="286rem"
                            width="286rem">
                    </div>
                </div>
                <div class="col-5">

                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre ?>"><label
                        style="color: #f0ad4e;font-size:25px;font-family:Verdana, sans-serif;" for="nombre"><b><?php echo $nombre ?></b></label>
                    <br><br>
                    <?php 
                        if($oferta>0){
                            ?>
                    <label style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;" for="precio"><s><b>Precio:</b>
                            $<?php echo $precio ?></s></label><br>
                    <input type="hidden" id="precio" name="precio" value="<?php echo $precioFinal ?>"><label
                        style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;" for="precio"><b>Precio:</b>
                        $<?php echo $precioFinal ?></label> <br>
                    <?php
                        }
                        else{
                            ?>

                    <input type="hidden" id="precio" name="precio" value="<?php echo $precio ?>"><label
                        style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;" for="precio"><b>Precio:</b> $<?php echo $precio ?></label>
                    <br>
                    <?php
                        }
                    ?>

                    <input type="hidden" id="descripcion" name="descripcion" value="<?php echo $descripcion ?>"><label
                        style="color: rgb(198, 168, 125);font-family:Verdana, sans-serif;" for="descripcion"><b>Descripcion:</b>
                        <?php echo $descripcion ?></label><br>
                    <input type="hidden" id="cantidad" name="cantidad" value="<?php echo $cantidad ?>">



                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <br><br><br>
                    <hr class="solid" id="barra" style="border-top: 2px solid #bbb;width:95%">

                    <?php

                     if($oferta>0){
                        ?>
                        <div style="display:inline-flex; justify-content:space-between">
                            <select style="height:45px;width:90px" class="btn btn-secondary" name="cant" id="cant"
                                onchange="cantTotal(<?php echo $precioFinal?>)" required>
                                <?php
                                    for($cant = 1; $cant <=$cantidad;$cant++){
    
                                        echo '<option>'.$cant.'</option>';
                                    }
                                    ?>
                            </select>
                                <div>
                                &nbsp;&nbsp;&nbsp;
                            <label style="color: rgb(198, 168, 125);font-size:15px;font-family:Verdana, sans-serif;" class="lblCant" for="cantidad"><b>Cantidad disponibles:</b>
                                <?php echo $cantidad ?></label><br>&nbsp;&nbsp;&nbsp;
                            <div style="display:inline-flex; justify-content:space-between">
                            <label style="color: rgb(198, 168, 125);font-size:15px;font-family:Verdana, sans-serif;" class="lblPrecio"><b>Precio Total:</b>
                            </label>&nbsp;&nbsp;
                            <p id="preciototal" class="pPreciototal" style="color: rgb(198, 168, 125);font-size:15px;font-family:Verdana, sans-serif;" for="precio"><?php echo $precioFinal ?>
                            </p>
                            </div>
    
                        </div>
    
    
                        </div>
                       
      
                        <input type="hidden" name="preciototal2" id="preciototal2" value="<?php echo $precioFinal ?>">
    
                        <?php
                     }
                     else{
                        ?>

                        <div style="display:inline-flex; justify-content:space-between">
                            <select style="height:45px;width:90px" class="btn btn-secondary" name="cant" id="cant"
                                onchange="cantTotal(<?php echo $precio?>)" required>
                                <?php
    
                                    for($cant = 1; $cant <=$cantidad;$cant++){
    
                                        echo '<option>'.$cant.'</option>';
                                    }
                           
                           
                                    ?>
                            </select>
                       

                                <div>
                                &nbsp;&nbsp;&nbsp;
                            <label style="color: rgb(198, 168, 125);font-size:15px;font-family:Verdana, sans-serif;" class="lblCant" for="cantidad"><b>Cantidad disponibles:</b>
                                <?php echo $cantidad ?></label><br>&nbsp;&nbsp;&nbsp;
                            <div style="display:inline-flex; justify-content:space-between">
                            <label style="color: rgb(198, 168, 125);font-size:15px;font-family:Verdana, sans-serif;" class="lblPrecio"><b>Precio Total:</b>
                            </label>&nbsp;&nbsp;
                            <p id="preciototal" style="color: rgb(198, 168, 125);font-size:15px;font-family:Verdana, sans-serif;" class="pPreciototal" for="precio"><?php echo $precio ?>
                            </p>
                            </div>
    
                        </div>
    
    
                        </div>
                       
      
                        <input type="hidden" name="preciototal2" id="preciototal2" value="<?php echo $precio ?>">
    
                        <?php
                     }

                     ?>







                    <?php
                        if($cantidad>0){
                            ?>
                                <br><br>
                                <button type="submit" class="btn btn-warning w-100" name="btnProducto" style="background-color: #f0ad4e; border-color:gray">Añadir al carro</button>

                            <?php
                        }
                        else{
                            ?>
                                <br><br>
                                <button type="submit" class="btn btn-warning w-100" disabled="true" name="btnProducto" style="background-color: #f0ad4e; border-color:gray">Agotado</button>
                            <?php
                        }

                        ?>

                </div>
            </div>
        </div>
    </form>
    <br><br><br>
    <hr class="solid" style="border-top: 2px solid #bbb;">

    <!-- javascript-->
    <script type="text/javascript" src="jquery/jquery-3.5.1.slim.jmin.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <?php cargarRelacionados($categoria,$nombre); ?>
    <br>
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
    <script src="js/carruselRelacionados.js"></script>
    <script>
    $(document).ready(cantTotal());
    </script>
    <script>
    function cantTotal(precio) {

        let cant = document.getElementById("cant").value;

        var acumulador = precio * cant;

        document.getElementById("preciototal").innerHTML = "$" + acumulador;
        document.getElementById("preciototal").value = acumulador;

        document.getElementById("preciototal2").innerHTML = "$" + acumulador;
        document.getElementById("preciototal2").value = acumulador;

    }
    </script>
    <?php include ('includes/buscador.php');?>
    <?php autocompletado(); ?>
</body>

</html>
<?php
}
else{
    header('location:index.php');
}

?>