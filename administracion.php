<?php 

session_start();

if ($_SESSION['s_activa']== true)
{
require_once ('includes/conexion.php');


$qy_productos = "SELECT *  FROM productos";
$productos = mysqli_query($conexion, $qy_productos);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administracion</title>




    <?php 
  include 'includes/script.php';
  include ('includes/modal/editModal.php');
  
  include ('includes/modal/ventanaModal1.php'); 
  include ('includes/modal/ventanaModal2.php');   
  include ('includes/modal/ventanaModal3.php'); ?>
</head>

<body style=" background-image: url(img/crown.jpg);background-repeat: no-repeat;background-size: cover;">

    <!-- Llamado a funcion navbar -->
    <?php include 'includes/panelLateral.php'; ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "search": "Buscar&nbsp;:",

                "zeroRecords": "No hay coincidencias",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)"
            },
            responsive: true,
            "bPaginate": false, //hide pagination


        });

    });
    </script>

    <!-- Inicio tabla -->
    <div class="container">

        <div class="row ">
            <div class="col"></div>
            <div class="col-10">
                <center>
                    <br>
                    <table>
                        <tr>

                            <td style="border:none"><button class="btn btn-warning" data-toggle="modal" data-target="#ventanaModal1" style="margin-right:5px;background-color: #f0ad4e; border-color:gray"><b>Cargar
                                    Joyeria</b></button></td>
                            <td style="border:none;"><button class="btn btn-warning" data-toggle="modal" data-target="#ventanaModal2" style="background-color: #f0ad4e; border-color:gray"><b>Cargar
                                    Regalos</b></button></td>
                            <td style="border:none"><button class="btn btn-warning" data-toggle="modal" data-target="#ventanaModal3" style="margin-left:5px;background-color: #f0ad4e; border-color:gray"><b>Cargar
                                    Relojes</b></button></td>
                        </tr>

                    </table>

                    <br><br>
                </center>
                <table id="tabla" cellspacing="0" width="100%">
                    <thead>
                        <tr>

                            <th style="display:none">Codigo</th>
                            <th style="background-color:  #f0ad4e">Categoria</th>
                            <th style="background-color:  #f0ad4e">Nombre</th>
                            <th style="background-color:  #f0ad4e">Descripcion</th>
                            <th style="background-color:  #f0ad4e">Cantidad</th>
                            <th style="background-color:  #f0ad4e">Foto</th>
                            <th style="background-color:  #f0ad4e">Precio</th>
                            <th style="background-color:  #f0ad4e">Edicion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          while ($fila = mysqli_fetch_array($productos)) {
                            echo '<td style="display:none">'.$fila['id'].'</td>';
                            echo '<td>'.$fila['categoria'].'</td>';
                            echo '<td>'.$fila['nombre'].'</td>';
                            echo '<td>'.$fila['descripcion'].'</td>';
                            if($fila['cantidad']==0){
                              echo '<td style="background-color:red">'.$fila['cantidad'].'</td>';
                            }
                            else if($fila['cantidad']>0 && $fila['cantidad']<5){
                              echo '<td style="background-color:orange">'.$fila['cantidad'].'</td>';
                            }
                            else{        
                              echo '<td>'.$fila['cantidad'].'</td>';            
                            }
                            echo '<td> <img class="img" id="img" style="width: 70px;
                            height: 70px;" src="data:image/jpg;base64,'.base64_encode($fila["foto"]).' "/> </td>';

                            echo '<td>'.$fila['precio'].'</td>';
                            //echo '<td>'.base64_encode($fila['foto']).'</td>';
                            //<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                            ?>
                          <!-- botones editar y eliminar -->
                        <td>
                            <div style="display: inline-flex; justify-content: space-between;">
                                <button type="button"
                                    class="btn btn-success editBtn" data-toggle="modal" data-target="#editModal"><i
                                        class="fas fa-pen"></i>
                                </button>
                                &nbsp;
                                <form action="eliminarProducto.php" method="POST">
                                    <button type="submit" name="btnEliminar" class="btn btn-danger eliminarBtn"
                                        value="<?php echo $fila['id'];?>" data-toggle="modal"
                                        data-target="#modalEliminar"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </td>
                        </form>
                        </tr>
                        <?php

                          }

                          ?>


                    </tbody>
                </table>
             
            </div>
            <div class="col-1"></div>
        </div>
    </div>








    <!-- Script para abrir modal editar -->
    <script>
    $(document).ready(function() {
        $('.editBtn').on('click', function(e) {
            e.preventDefault();
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();

            }).get();
            console.log(data);

            $('#update_id').val(data[0]);

            $('#nombre').val(data[2]);
            $('#descripcion').val(data[3]);
            $('#cantidad').val(data[4]);
            $('#foto').val(data[5]);
            $('#precio2').val(data[6]);


        });

    });
    </script>
    <!-- Fin script para abrir modal editar -->


</body>

</html>
<?php 
}
else
{
  header("location: login.php");
}


 ?>