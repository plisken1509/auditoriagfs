<?php
	 include ('../conexion/conexion.php');
	 $id=$_GET['id'];
	 $query="select * from comedor where id=$id";
	 $enviar=mysqli_query($db,$query);
	 $ver=mysqli_fetch_array($enviar);
     include_once "navbar.php";
?>
<?php
include_once "navbar.php"
?>
    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">Editar Usuario</h2>
            <form class="form" action="guardarDatosEditadosComedores.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $ver['id'] ?>">
            <div class="row mt-5">
                <div class="col-md-6">      
                    <div class="form-group">
                        <input type="text" value="<?php echo $ver['nombre'] ?>" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="Nombre:">
                    </div>
                </div>         
         <div class="col-md-6">
            <div class="form-group">
                <input type="text" value="<?php echo $ver['direccion'] ?>" name="direccion" class="form-control" id="exampleFormControlInput1" placeholder="Usuario:">
            </div>
            <div class="form-group">
                <input type="text" value="<?php echo $ver['estado'] ?>" name="estado" class="form-control" id="exampleFormControlInput1" placeholder="Estado:">
            </div>
         </div>
      </div> <!-- end of inputs --> 
      <input class="btn btn-primary" type="submit" value="Guardar"> 
            </form>
        </div>
    </div>

<?php
include_once "footer.php"
?> 

<?php include_once "footer.php" ?>
