
<?php 
require_once ('includes/conexion.php');


$qy_productos = "SELECT *  FROM productos";
$productos = mysqli_query($conexion, $qy_productos);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos en oferta</title>
<?php include 'includes/script.php' ?>


  <!-- inicio funcion datatable -->

<script>
    $(document).ready(function() {
        $('#ofertas').DataTable({
             "language": {
            "search": "Buscar&nbsp;:",
            
            "zeroRecords": "No hay coincidencias",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)"
        },
        "bPaginate": false, //hide pagination
            //responsive: true
        });
    } );  
    
    </script>


  <link rel="stylesheet" href="css/main.css">
</head>




<body style=" background-image: url(img/crown.jpg);background-repeat: no-repeat;background-size: cover;">





<div class="container">

  <div class="row">
    <div class="col-2">
    

    </div>
    <div class="col-10">
      
 <?php include 'includes/panelLateral.php'; ?>
<!-- Inicio tabla -->


 <table id="ofertas" class="display nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>

      
      <th style="background-color:  #f0ad4e">Nombre</th>
      <th style="background-color:  #f0ad4e">Precio</th>
      <th style="background-color:  #f0ad4e">Oferta actual</th>
      <th style="background-color:  #f0ad4e">Porcentaje</th>
      <th style="background-color:  #f0ad4e">Precio Promo</th>
      <th style="background-color:  #f0ad4e">Edicion</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $i=0;
    while ($fila = mysqli_fetch_array($productos)) {

     echo '<tr>';

     echo '<td>'.$fila['nombre'].'</td>';
     echo '<td>$'.$fila['precio'].'</td>';
     echo '<td>'.$fila['enOferta'].'%</td>';
     ?>

     <form action="oferta_sql.php" method="POST">

      <td>%<input  name="input" style="width:70px"  type="text" class="txt"/></td>  
      <?php 
      if ($fila['enOferta']>0)
      {

        $promo= $fila['precio']-(($fila['precio']*$fila['enOferta'])/100);
      }
      else{
        $promo= '-';
      }
      ?>
    </td>
    <td>$<input type="text"  style="width:70px" disabled="" 
      value="<?php if(isset($promo)) {echo $promo;} ?>" /></td>  

    </td>

    <?php 

    echo '<input type="hidden" value="'.$fila['id'].'" name="id_oferta">';

    ?>

    <td><button type="submit" name="btnEnviar" style="background-color: #f0ad4e; border-color:gray" class="btn btn-warning"><b>Agregar</b></button></td> 
  </form>
  <?php


  $i++;
}


?>





</td>


</tr>
</tbody>
</table>


    </div>
   
  </div>
</div>

<!-- ********************************************************************* -->

 

</body>
</html>