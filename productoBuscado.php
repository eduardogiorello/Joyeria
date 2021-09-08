<?php
$buscador = $_POST['buscador'];
include ('includes/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/bootstrap.php';?>
    <?php include ('includes/navbar.php'); ?>
    <link rel="stylesheet" href="galeria.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Buscador</title>
</head>
<body style="background-color: rgb(50,50,50)">
<?php navBar(); ?>
    <br><br>
    <div class="grid-container">
        <?php
if(isset($_POST['buscador'])){
    $buscador = mysqli_real_escape_string($conexion,$_POST['buscador']);
    $qy_productos = "SELECT * FROM productos WHERE nombre LIKE '%$buscador%' OR descripcion LIKE '%$buscador%' OR categoria LIKE '%$buscador%'";
    $productos = mysqli_query($conexion, $qy_productos);
    if (mysqli_num_rows($productos)>0){
        while ($fila = mysqli_fetch_array($productos)){

            ?>

                <div class="grid-item">
                    <a href="productoDetalle.php?nombre=<?php echo $fila['nombre']?>" target="_blank">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($fila['foto']); ?>" class="card-img-top">
                    </a>   
                    <h5 style="color: rgb(198, 168, 125); text-align:center"><?php echo $fila['nombre'] ?></h5>
                    <h6 style="color: rgb(198, 168, 125); text-align:center">Precio: <?php echo $fila['precio'] ?></h6>
                </div>

            <?php
        }
    }
    else{      
        $resultados = array();
        $buscador2 = mysqli_real_escape_string($conexion,$_POST['buscador']);
        $buscarPorPalabra = explode(" ",$buscador2);
        foreach($buscarPorPalabra as $valores){            
            $qy_productos2 = "SELECT * FROM productos WHERE nombre LIKE '%$valores%' OR descripcion LIKE '%$valores%' OR categoria LIKE '%$valores%'";
            $productos2 = mysqli_query($conexion, $qy_productos2);
            if (mysqli_num_rows($productos2)>0){
                while ($fila2 = mysqli_fetch_array($productos2)){
                  
                    if(!in_array($fila2['id'],$resultados)){
                        array_push($resultados,$fila2['id']);
                        ?>
                   
                            <div class="grid-item">
                            <a href="productoDetalle.php?nombre=<?php echo $fila2['nombre']?>" target="_blank">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($fila2['foto']); ?>" class="card-img-top">
                    </a>   
                                <h5 style="color: rgb(198, 168, 125); text-align:center"><?php echo $fila2['nombre'] ?></h5>
                                <h6 style="color: rgb(198, 168, 125); text-align:center">Precio: <?php echo $fila2['precio'] ?></h6>
                            </div>
                      
                        <?php
                    }
               
                }
            }
            else{
                echo '<h2 style="color:rgb(198, 168, 125); text-align:center">SIN RESULTADOS</h2>';
                break;
            }
        }
    }
}

?>
    </div>
    <?php include ('includes/buscador.php');?>
    <?php autocompletado(); ?>
</body>

</html>