<?php 
session_start();
if ($_SESSION['s_activa']== true)
{
include 'includes/conexion.php';

 if(isset($_POST['btnEliminar']))
{
   $id= $_POST['btnEliminar'];
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar producto</title>
</head>

<?php include 'includes/bootstrap.php'; ?>
<body style=" background-image: url(img/diamond.jpg);background-repeat: no-repeat;background-size: cover;">
  
<form action="eliminar_sql.php" method="POST">

  <center>
   <input type="hidden" name="id" value="<?php echo $id ;?>">
  <div class="col-sm-6" style="margin-top: 15%;">
    <div class="card" style="width: 18rem;">
 
  <div class="card-body">
    <h5 class="card-title">Estas por eliminar el producto</h5>
    <p class="card-text">Si estas seguro aceptar.</p>
    <button type="submit" class="btn btn-danger" name="boton" value="1">Aceptar</button>
    <button type="submit" class="btn btn-primary" name="boton" value="0">Cancelar</button>
  </div>
</div>

  </div>
</center>

</form>

</body>
</html>
<?php 
}
else
{
  header("location: login.php");
}


 ?>