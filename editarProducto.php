<?php 
     session_start();
if ($_SESSION['s_activa']== true)
{
require_once ('includes/conexion.php');
if(isset($_POST['actualizarBtn']))
{
	$id= $_POST['update_id'];
	$nombre= strtoupper($_POST['nombre']);
	$descripcion= $_POST['descripcion'];
	$precio= $_POST['precio2'];
	$cantidad= $_POST['cantidad'];
    $foto=$_FILES['fotoNueva'];
    
//consulta por el producto que corresponde a esa id
	$qy_productos = "SELECT * FROM productos WHERE id='$id'";
	$productos = mysqli_query($conexion, $qy_productos);
	$row= mysqli_fetch_assoc($productos);
//actualiza producto
	$consulta = "SELECT * FROM productos WHERE nombre='$nombre' and id!=$id";
	$resultado = mysqli_query($conexion, $consulta);
	if(mysqli_num_rows($resultado)>0){
		?>
			<script>
				alert("Ya existe un producto con ese nombre");
				window.location.href="administracion.php";
			</script>

		<?php
	}
	else{
			
		if(empty($_FILES['fotoNueva']['tmp_name']))
		{
			
			
			 $foto= addslashes($row['foto']);
			// si no ingresa una foto se toma la actual de la base de datos
		}
		else{
			
			//el metodo file_get_contents pasa la imagen a bits
			$foto= addslashes(file_get_contents($_FILES['fotoNueva']['tmp_name']));
		}

		$query= "UPDATE productos SET descripcion='$descripcion', nombre='$nombre', precio='$precio', cantidad='$cantidad', foto='$foto' WHERE id=$id";
		$result= mysqli_query($conexion,$query);
		header('location:administracion.php');
	}
}

}
else
{
  header("location: login.php");
}


 ?>
