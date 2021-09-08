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



</head>
<?php
$qy_productos = "SELECT DISTINCT categoria FROM productos";
$resultado = mysqli_query($conexion, $qy_productos);





?>


<!-- Inicio formulario modal editar-->

<form action="editarProducto.php" method="POST" enctype="multipart/form-data">

    <div class="modal" tabindex="1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifique los datos necesarios</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                        style="border: hidden;"></button>
                </div>







                <div class="modal-body">

                    <div class="form-group mx-sm-3">
                        <input type="hidden" name="update_id" id="update_id">
                        <!-- a este imput llega la variable desde el script -->

                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="precio2">Precio</label>
                        <input type="text" class="form-control" id="precio2" name="precio2">
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <!-- ********************************************************************** -->

                </div>
                <!-- **************************************************************************** -->

                <div class="form-group mx-sm-3">


                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="fotoNueva" name="fotoNueva">
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <button type="submit" name="actualizarBtn" class="btn btn-primary">Actualizar Producto</button>

                </div>
            </div>
        </div>
    </div>

</form>
<!-- *************************************************************************************** -->

<!-- Fin modal editar -->