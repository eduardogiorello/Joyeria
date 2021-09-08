<?php 
include 'includes/conexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include 'includes/script.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
if ($_GET)
{
	if($_GET['status']=='approved'){
		$recepcion = htmlspecialchars( $_GET['external_reference'], ENT_QUOTES);
		$consulta = "SELECT * FROM orden WHERE idCompra='$recepcion' AND completado=0";
		$resultado = mysqli_query($conexion,$consulta);
		$datos = mysqli_fetch_array($resultado);
		$vecesVendido =0;
		$restarCant=0;
		
		$idProductos = explode('/',$datos['idProductos']);
		$cantidades = explode('/',$datos['cantidades']);
		array_pop($idProductos);
		array_pop($cantidades);
	
		
		$contador=0;
		foreach($idProductos as $value){

			$consulta2 = "SELECT cantidad,vecesVendido,nombre FROM productos WHERE id=$value";
			$resultado2 = mysqli_query($conexion,$consulta2);
			$datos2 = mysqli_fetch_array($resultado2);

			
			$vecesVendido = (int)$datos2['vecesVendido'];
			$vecesVendido= $vecesVendido+(int)$cantidades[$contador];

			$restarCant = (int)$datos2['cantidad'];
			$restarCant-=(int)$cantidades[$contador];
			
			$actualizar = "UPDATE productos SET vecesVendido=$vecesVendido, cantidad=$restarCant WHERE id=$value";
			$resultado3 = mysqli_query($conexion,$actualizar);
			$contador++;
		}
		/*$completarPedido = "UPDATE orden SET completado=1 WHERE idCompra='$recepcion'";
		$realizarActualizacion = mysqli_query($conexion,$completarPedido);*/







$mail = new PHPMailer(true);
//https://www.google.com/settings/security/lesssecureapps
//ruta para activar configuracion de gmail
try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'programac02020@gmail.com';                     // SMTP username
    $mail->Password   = '15521118';                               // SMTP password
    //$mail->SMTPSecure = 'ssl'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('programac02020@gmail.com', 'Joyeria D Ambrosio');
    $mail->addAddress('programac02020@gmail.com');
   // $mail->addAddress('joyeriadambrosio@yahoo.com.ar');
    // Add a recipient

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nueva venta';
	
	$contador2=0;
	$total = 0;
	foreach($idProductos as $value){

		$consulta3 = "SELECT nombre,precio,enOferta FROM productos WHERE id=$value";
		$resultado3 = mysqli_query($conexion,$consulta3);
		$datos3 = mysqli_fetch_array($resultado3);
		$Cant=(int)$cantidades[$contador2];
		if($datos3['enOferta']>0){
		    $precio = $datos3['precio']-(($datos3['precio']*$datos3['enOferta'])/100);
		}
		else{
		    	$precio = $datos3['precio'];
		}
	
		
	
			$contador2++;
			
		//$total += $precio*$Cant;
		
				
		 $mail->Body  .= '<table>

  <tr>

    <td style="border: 3px solid green;">Producto</td>

    <td style="border: 3px solid green;">'.$datos3['nombre'].'</td>



  </tr>

  <tr>

    <td style="border: 3px solid green;">Cantidades</td>

    <td style="border: 3px solid green;">'.$Cant.'</td>

  </tr>
  
   <tr>

    <td style="border: 3px solid green;">Precio unitario</td>

    <td style="border: 3px solid green;">'.$precio.'</td>

  </tr>
  
  <tr>

    <td style="border: 3px solid green;">Precio total</td>

    <td style="border: 3px solid green;">'.$precio*$Cant.'</td>

  </tr>

</table>
<br>';

}

		
	


	$mail->send();

	$eliminar = "DELETE FROM orden WHERE idCompra='$recepcion'";
	mysqli_query($conexion,$eliminar);
    
	} catch (Exception $e) {
		echo "Error en el envio: {$mail->ErrorInfo}";
	}


		echo '<script> window.location.href="aviso.php";</script>';
	}
	
	
}
 ?>

