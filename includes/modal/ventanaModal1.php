
<!-- Inicio formulario modal -->
<form action="cargarProducto.php" method="post" enctype="multipart/form-data">
  <div class="modal" tabindex="1" id="ventanaModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ingrese los datos requeridos</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="border: hidden;"></i></button>
        </div>
        <div class="modal-body">
         
         <div class="form-group mx-sm-3">
           <label for="categoria" >Categoria</label>
         
         

                
                  <select class="btn btn-secondary" name="categoria"  required>
            
            <option value="anillos" >Anillos</option>
             <option value="pulseras" >Pulseras</option>
             <option value="aros">Aros</option>
             <option value="alhajas">Alhajas</option>
             <option value="cadenas">Cadenas</option>
          
             </select>
          

          
         </div>
         <div class="form-group mx-sm-3">
           <label for="nombre" >Nombre</label>
           <input type="text" class="form-control"name="nombre" placeholder="Nombre" required="">
         </div>
         <div class="form-group mx-sm-3">
           <label for="descripcion" >Descripcion</label>
           <input type="text" class="form-control"  name="descripcion" placeholder="Descripcion">
         </div>
         <div class="form-group mx-sm-3">
           <label for="precio" >Precio</label>
           <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
         </div>
         <div class="form-group mx-sm-3">
           <label for="Cantidad" >Cantidad</label>
           <input type="text" class="form-control"  name="cantidad" placeholder="Cantidad">
         </div>
       </div>
       <div class="form-group mx-sm-3" >
         <label for="foto" >Foto</label>
         <input type="file" class="form-control"  name="foto" placeholder="Foto" required="">
       </div>

       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Fin formulario modal -->
