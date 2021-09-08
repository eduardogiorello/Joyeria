<?php 

session_start();

if ($_SESSION['s_activa']== true)
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/bootstrap.php'; ?>
    <title>Cambiar contraseña</title>
</head>

<body>
<?php include 'includes/panelLateral.php'; ?>
    <br>
    <h3 style="text-align: center">Cambiar contraseña</h3>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <form action="cambiarContraseña_sql.php" method="POST" class="form-control">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña actual: </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="actual">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña nueva: </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="nueva">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Repetir nueva: </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="nuevaRepetida">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-warning w-100" name="aceptar">Aceptar</button>
                </form>

            </div>
            <div class="col-1"></div>

        </div>
        <br>
   



    </div>
</body>

</html>
<?php 
}
else
{
  header("location: login.php");
}


 ?>