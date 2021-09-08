<?php
include ('includes/conexion.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include ('includes/bootstrap.php');
    include ('includes/navbar.php');
    ?>
    <title>Lapiceras</title>

  
</head>

<body style="background-color: rgb(50,50,50)">
    <?php navBar();  ?>
    <br>
    <h2 style="text-align:center;color: #f0ad4e;font-family:Oswald;">LAPICERAS</h2>
    <hr class="solid" style="border-top: 2px solid #bbb;" >
    <br>
        <?php
$consulta = "SELECT * FROM productos WHERE categoria like'lapiceras%' and cantidad>0 ORDER BY id ASC";
$pulseras = mysqli_query($conexion,$consulta);

            ?><div class="grid-container">
                <?php
           
                    while ($fila = mysqli_fetch_array($pulseras)){
                        ?>
                        <div class="grid-item">
                       
                        <a href="productoDetalle.php?nombre=<?php echo $fila['nombre']?>">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($fila['foto']); ?>" class="card-img-top">                        
                        </a>
                        <h5 style="color: #f0ad5d;margin-top:10px;text-align:center;font-family:Verdana, sans-serif;"><?php echo $fila['nombre'] ?></h5> 
                        <?php
                            if($fila['enOferta']>0){
                                $precioFinal = $fila['precio'] - ($fila['precio']*$fila['enOferta'])/100;
                                echo ' <h6 style="color: rgb(198, 168, 125); text-align:center;font-family:Verdana, sans-serif;"><s>Precio: '.$fila['precio'].'</s></h6>';
                                echo ' <h6 style="color: rgb(198, 168, 125); text-align:center;font-family:Verdana, sans-serif;">Precio: '.$precioFinal.'</h6>';           
                            }
                            else{
                                
                                echo ' <h6 style="color: rgb(198, 168, 125); text-align:center;margin-top:20px;font-family:Verdana, sans-serif;">Precio: '.$fila['precio'].'</h6>';
                            }
                        ?>      
                   
                    </div>   
            <?php  
   
    }


?>
</div>    
<?php include ('includes/buscador.php');?>
    <?php autocompletado(); ?>
</body>

</html>