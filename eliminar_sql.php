
     <?php 
     session_start();
if ($_SESSION['s_activa']== true)
{
include 'includes/conexion.php';
       if(isset($_POST['boton']))
       {
         $btn= $_POST['boton'];
         $id=$_POST['id'];

        if($btn==0){
        // Cierro el formulario y recargo la pagina anterior.
        // echo "<script languaje='javascript' type='text/javascript'>
        //         window.location='administracion.php;
        //     </script>";
          header('location:administracion.php');
          }

           if($btn==1){
         
             $eliminar= "DELETE FROM productos WHERE id=$id";
             $eliminar_resut = mysqli_query($conexion, $eliminar);

             if ($eliminar_resut>0)
         {
          ?>
            <script type="text/javascript">
              alert('Archivo eliminado correctamente');
            </script>
          <?php 
          header("location:administracion.php");
  
      
       }
         }

}

}
else
{
  header("location: login.php");
}


 ?>
