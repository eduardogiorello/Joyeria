<?php
include 'includes/conexion.php';
if(!session_start()){
	session_start();
	
}
$id = session_id();
$consulta = "DELETE FROM orden WHERE idCompra='$id'";
mysqli_query($conexion,$consulta);
echo '<script>window.location.href="index.php"</script>';
?>

