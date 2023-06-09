<?php
	 include ('../conexion/conexion.php');
	 $id=$_GET['id'];
	 $query="select * from usuarios where id=$id";
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
            <form class="form" action="guardarDatosEditadosUsuarios.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $ver['id'] ?>">
            <div class="row mt-5">
                <div class="col-md-6">      
                    <div class="form-group">
                        <input type="text" value="<?php echo $ver['nombre'] ?>" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="Nombre:">
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="perfil" id="exampleFormControlSelect1">
                        <?php
                            $query2="select * from perfil";
                            $enviar2=mysqli_query($db,$query2);
                            $ver2=mysqli_fetch_array($enviar2);
                            do{
                                $id=$ver2['id'];
                                $descripcion=$ver2['descripcion'];
                                if ($ver['perId']==$id) {
                                echo '
                                    <option value="'.$id.'" selected>'.$descripcion.'</option>';
                                }else{
                                echo '
                                    <option value="'.$id.'">'.$descripcion.'</option>';
                                
                                }
                            }while ($ver2=mysqli_fetch_array($enviar2));

                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?php echo $ver['cedula'] ?>" name="cedula" class="form-control" id="exampleFormControlInput1" placeholder="Cédula:">
                    </div>
                    <div class="form-group">
                        <input type="email" value="<?php echo $ver['correo'] ?>" name="correo" class="form-control" id="exampleFormControlInput1" placeholder="Correo:">
                    </div>
                </div>
                
         <div class="col-md-6">
            <div class="form-group">
                <input type="text" value="<?php echo $ver['telefono'] ?>" name="telefono" class="form-control" id="exampleFormControlInput1" placeholder="Teléfono:">
            </div>
            <div class="form-group">
                <input type="text" value="<?php echo $ver['usuario'] ?>" name="usuario" class="form-control" id="exampleFormControlInput1" placeholder="Usuario:">
            </div>
            <div class="form-group">
                <input type="password" value="<?php echo $ver['clave'] ?>" name="clave" class="form-control" id="exampleFormControlInput1" placeholder="Clave:">
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
