<?php

session_start();



include 'includes/conexion.php';

$valor=0;
if(isset($_POST['btnMercadoPago'])){
  
    if(count($_SESSION['carrito'])==0){
        echo '<script>window.location.href="index.php"</script>';
    }
    else{
        $acumuladora='';
    	$acumuladora2='';
    	$idCompra = session_id();
    	$eliminar = "DELETE FROM orden WHERE idCompra = '$idCompra'";
		mysqli_query($conexion,$eliminar);
    
    
    	$valor = $_POST['totalTotal'];
    	foreach($_SESSION['carrito'] as $row){
    		$acumuladora.=$row['id'].'/';
    		$acumuladora2.=$row['cantidad'].'/';
    	}
    
    
    	$insert = "INSERT INTO orden (idCompra,idProductos,cantidades) VALUES ('$idCompra','$acumuladora','$acumuladora2')";
    	mysqli_query($conexion,$insert);
    }


}
else if(!isset($_POST['btnMercadoPago']) || !isset($_SESSION['carrito'])){
     echo '<script>window.location.href="index.php"</script>';
}


// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('ACA-VA-LA-KEY');


// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();


// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
// $item->id = 'valor de prueba';
$item->title = 'Total A Pagar: ';
$item->quantity = 1;
$item->unit_price = $valor;
$preference->items = array($item);
$preference->notification_url="https://joyeriad.000webhostapp.com/notificaciones.php";
$preference->back_urls = array(

        "success"=> "https://joyeriad.000webhostapp.com/notificaciones.php",
        "failure"=> "https://joyeriad.000webhostapp.com/carritoItems.php"
    );
$preference->auto_return="approved";
$preference->external_reference = $idCompra; /*id de la tabla orden a aprobar*/
$preference->save();





//curl -X POST -H "Content-Type: application/json" -H "Authorization: Bearer KEY-ACA" "https://api.mercadopago.com/users/test_user" -d "{'site_id':'MLA'}"

/*
{"id":773869997,"nickname":"TESTHZTM3WQR","password":"qatest6307","site_status":"active","email":"test_user_78177107@testuser.com"}

{"id":773873301,"nickname":"TESTWOEYCFEC","password":"qatest9476","site_status":"active","email":"test_user_48079982@testuser.com"}
*/



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Finalizar Compra</title>
	<?php include ('includes/bootstrap.php');?>
	<?php include 'includes/script.php';
// 	include 'includes/navbar.php';
// 	navbar();
	?>

	<link rel="stylesheet" href="css/estilos.css">

</head>
</head>



<body>

	<div class="container mt" >
		<div class="row justify-content-center">


			<div class="col-6 borde">
				<div class="div">
					<h3>¿Estas seguro de realizar la compra?</h3>
					<br><br>
					<a class="linkAceptar" href="<?php echo $preference->init_point; ?>"> <button type="submit" name="btnpagar"  class="btnSeguir" > Aceptar </button></a>

					<a href="cancelarPago.php"><button type="button"  class="btnSeguir" >Cancelar</button></a>
				</div>
			</div>

		</div>

		
	</div>



<script src="https://sdk.mercadopago.com/js/v2" data-preference-id=""></script>

<script>
// Inicializa el checkout
mp.checkout({
	preference: {
		id: 'Joyeria D´Ambrosio'
	},
	render: {
			container: '.cho-container', // Indica dónde se mostrará el botón de pago
			label: 'Pagar', // Cambia el texto del botón de pago (opcional)
		}
	});
</script>

</body>
</html>
