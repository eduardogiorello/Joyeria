<?php
$alerta;
$numResultado=0;

session_start();



if (!empty($_POST))
{
	if (empty($_POST['nombre']) || empty($_POST['pass']))
	{
		$alerta = '<h6>Ingrese el usuario y la contraseña</h6>';
	}else{
		$usu=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		$pas= $_POST['pass'];
		$pas=trim(filter_var($pas,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
		require_once "includes/conexion.php";
		$resultado= mysqli_query($conexion,"select * from usuarios where nombre='$usu'") 
		or die ('Error en la Query 1');
		$datos = mysqli_fetch_assoc($resultado);
		$numResultado = mysqli_num_rows($resultado);
		if($numResultado > 0)
		{
			if (password_verify($pas, $datos['pass']))
			{
				$data = mysqli_fetch_array($resultado);
				$_SESSION['s_activa']=true;
				$_SESSION['s_id']= $data['id'];
				$_SESSION['s_usuario']= $data['nombre'];
				$_SESSION['s_clave']= $data['pass'];
				if ($_SESSION['s_activa']==true)
			{
				header("location: administracion.php");
			}
			else
			{
				header("location: login.php");
			}
		}
			else{
			$alerta= '<h6 class="alert alert-danger" role="alert">Usuario o contraseña incorrectos</h6>';
			session_destroy();
		}

		}
		
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<!-- estilos propios -->
	<link rel="stylesheet" type="text/css" href="css/connect.css">
</head>
<body>
	<section class="container-fluid bg">
		<section class="row justify-content-center " >
			<section class="col-12 col-sm-6 col-md-3 ">

				<form class="form-container login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >

					<div class="form-group">
						<div class="form-group login-titulo">
							<label >Inicie sesión</label><br>
						</div>
						<div class="alerta"><?php echo isset($alerta)? $alerta : ''; ?></div>
						<label for="exampleInputEmail1" class="form-label"><i class="fas fa-at"></i>&nbsp;Nombre</label>
						<input type="nombre" class="form-control" name="nombre" id="nombre" autocomplete="off" aria-describedby="nombre" required >
					</div>
					<div class="form-group">
						<label for="pass" class="form-label"><i class="fas fa-lock"></i>&nbsp;Clave</label>
						<input type="password"  class="form-control" name="pass" autocomplete="off" id="pass"  required>
					</div>
					&nbsp;
					<div class="d-grid gap-2 col-6 mx-auto">
						<button type="submit" class="btn btn-block btn-outline-primary"><i class="fas fa-step-forward"></i>&nbsp;Iniciar</button>




					</form>
					

				</section>
			</section>
		</section>


		<!-- jquery -->
		<script src="jquery/jquery-3.5.1.js"></script>


		<!-- JS bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<script>
			$('.alert').slideDown();
			setTimeout(function(){$('.alerta').slideUp();},4000);
		</script>
	</body>
	</html>