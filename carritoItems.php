<?php 
include 'includes/conexion.php';
if(!session_start()){
	session_start();
	
}

$precio=0;
$nombre='';
$idEliminar=0;

if(isset($_GET['idEliminar'])){
	$idEliminar =$_GET['idEliminar'];
	unset($_SESSION['carrito'][$idEliminar]);
}

if(!isset($_SESSION['carrito'])){
	$_SESSION['carrito'] = array();
}
if(!isset($_SESSION['productos'])){
	$_SESSION['productos'] = array(
		'id'=> '',
		'foto'=> '',
		'nombre'=> '',
		'precio'=> '',
		'cantidad'=> '',
		'total'=> ''
	);
}
if (isset($_POST['btnProducto'])){
	$total = $_POST['preciototal2'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $cantidad= $_POST['cant'];
	$id= $_POST['id'];
    $selectImg = "SELECT foto FROM productos WHERE nombre= '$nombre'";
    $resultImg = mysqli_query($conexion, $selectImg);
    $auxFoto = mysqli_fetch_array($resultImg);
    $foto= $auxFoto['foto'];
	if($nombre!=$_SESSION['productos']['nombre']){
		$_SESSION['productos'] = array(
			'id'=> $id,
			'foto'=> $foto,
			'nombre'=> $nombre,
			'precio'=> $precio,
			'cantidad'=> $cantidad,
			'total'=> $total
		);
	}
	
	if(!in_array($_SESSION['productos'],$_SESSION['carrito'])){  //pregunto si $productos no esta en el array $_SESSION['carrito']
		$_SESSION['carrito'][] = $_SESSION['productos'];
	}
}



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Carrito</title>
		<?php include ('includes/bootstrap.php');?>
		<?php include 'includes/script.php';
			include 'includes/navbar.php';
			navbar();
		?>

		<link rel="stylesheet" href="css/estilos.css">
		
	</head>
	<body>
		<!-- formulario para actualizar cantidad -->
		<form action="	<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
			<div class="contenedor">
				<table class="tablaCarrito">
					<tr>
						<td class="tdEliminar">Eliminar</td>
						<td class="tdFoto">Foto</td>
						<td class="text">Producto</td>
						<td class="text precio">Precio</td>
						<td class="text cant">Cantidad</td>
						<td class="text total">Total</td>
					</tr>
					<?php
						
							foreach($_SESSION['carrito'] as $row){
								$idEliminar=array_search($row,$_SESSION['carrito']);
								?>
							
								<tr id="<?php echo $row['id'];?>">
								<td><a class="borrar" href="carritoItems.php?idEliminar=<?php echo $idEliminar; ?>" ><i class="far fa-trash-alt text"></i></a></td>
								<td class="tdFoto"><img src="data:image/jpg;base64,<?php echo base64_encode($row['foto']); ?>"></td>
								<td class="tdNombre"><?php echo $row['nombre'] ?></td>
								<td><?php echo $row['precio']; ?> <input type="hidden" id="<?php echo 'precioFinal'.$row['id']; ?>" value="<?php echo $row['precio'];?>"></td>
								<td><?php echo $row['cantidad']; ?></td>
								<td id="<?php echo 'total'.$row['id']; ?>" class="totalFinal" value="<?php echo $row['precio'];?>"><?php echo $row['total'];?></td>
								</tr>								
								<?php
								
							}
						
					?>		
				</table>
				<!--<button type="submit"  class="btnActualizar" id="btnActualizar" name="btnActualizar" >Actualizar</button>-->
				<hr>
					
			</form>
			<!-- fin formulario catidad -->
			<!-- formulario para redirigir a mercadopago -->
			<form action="realizarpago.php" method="POST">
				<div class="contenedor2">
					<label class="caption">Total del carrito:</label>
					<hr id="total">
					<table class="tablaTotal">
					
						<tr>
							<th class="text">Total</th>
							<td id="totalTotalFinal" value="0">$</td>
							
							
						</tr>
						
					</table>
					<input type="hidden" name="totalTotal" id="totalTotalFinal2">
					<button type="submit"  class="btnPagar" name="btnMercadoPago" >Pagar</button>
					
					<a href="index.php"><button type="button"  class="btnSeguir" >Seguir comprando</button></a>
					
					
				</div>
			</form>
		</div>


		<script src="js/bootstrap.bundle.js"></script>
		<script src="js/actualizarCantidad.js"></script>	
		<?php include ('includes/buscador.php');?>
    <?php autocompletado(); ?>
	</body>
</html>