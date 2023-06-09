<?php
    include_once "navbar.php";
?>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">GOURMET FOOD SERVICE</h1>
            <h2 class="display-4 mb-5">SISTEMA DE AUDITORIA</h2>    
        </div>
    </header>
  <h1 style="text-align: center;">Usuarios</h1>
    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
        <h6 class="section-secondary-title mt-5">USUARIOS</h6>
        
        <?php
            include_once "../conexion/conexion.php";
            $query="SELECT u.*,p.descripcion as perfil FROM usuarios u 
                    JOIN perfil p ON u.perId=p.id;";
            $ver=mysqli_query($db,$query);

        ?>
       

        <div style="overflow-x:auto">
      <table class="table">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">PERFIL</th>
               <th scope="col">CÉDULA</th>
               <th scope="col">NOMBRE</th>
               <th scope="col">CORREO</th>
               <th scope="col">TELÉFONO</th>
               <th scope="col">USUARIO</th>
               <th scope="col">ESTADO</th>
               <th scope="col" colspan="2">ACCIONES</th>
            </tr>
         </thead>
         <tbody>
            <?php
                while($consulta = mysqli_fetch_array($ver))
                {
            ?>
            <tr>
               <th scope="row"><?php echo $consulta['id'] ?></th>
               <td><?php echo $consulta['perfil'] ?></td>
               <td><?php echo $consulta['cedula'] ?></td>
               <td><?php echo $consulta['nombre'] ?></td>
               <td><?php echo $consulta['correo'] ?></td>
               <td><?php echo $consulta['telefono'] ?></td>
               <td><?php echo $consulta['usuario'] ?></td>
               <td><?php echo $consulta['estado'] ?></td>
               <td><a class="btn btn-warning" href="<?php echo "editarClientes.php?id=" . $consulta['id']?>"><i class="ti-pencil"></i></a></td>
			   <td><a class="btn btn-danger" href="<?php echo "eliminarCliente.php?id=" . $consulta['id']?>"><i class="ti-trash"></i></a></td>
            </tr>
            <?php } ?>
         </tbody>
      </table>
      </div>
      </div>
        </div>

<!-- Modal Creacion de usuarios-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #212121;">
        <h5 style="color: white;">Crear nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color: black;">
      <form class="form" action="guardarUsuario.php" method="post">
            <div class="form-group">
                    <input type="text" class="form-control" name="nombre" id="exampleFormControlInput1" placeholder="Nombre:" required>
            </div>
            <div class="form-group">
                <?php 
                     $query1="SELECT * FROM perfil;";
                        $ver1=mysqli_query($db,$query1);
                    // Verificar si se obtuvieron resultados
                    if ($resultado=mysqli_num_rows($ver1)) {
                        // Generar las opciones del select
                        echo '<select class="form-control" name="perfil" id="exampleFormControlSelect1">';
                        while($row = mysqli_fetch_array($ver1)) {
                            echo '<option value="' . $row["id"] . '">' . $row["descripcion"] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo "No se encontraron resultados.";
                    }
                ?>
            </div>
            <div class="form-group">
                    <input type="text" class="form-control" name="cedula" id="exampleFormControlInput1" placeholder="Cédula:" required>
            </div>
            <div class="form-group">
               <input type="email" class="form-control" name="correo" id="exampleFormControlInput1" placeholder="Email:" required>
            </div>
            <div class="form-group">
                    <input type="text" class="form-control" name="telefono" id="exampleFormControlInput1" placeholder="Teléfono:" required>
            </div>
            <div class="form-group">
                    <input type="text" class="form-control" name="usuario" id="exampleFormControlInput1" placeholder="Usuario:" required>
            </div>
            <div class="form-group">
                    <input type="password" class="form-control" name="clave" id="exampleFormControlInput1" placeholder="Clave:" required>
            </div>
      </div>
      <div class="modal-footer" style="background-color: #757575;color: black;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="Guardar Registro" name="guardar" />
      </div>
      </form>
    </div>
  </div>
</div>
<?php
include_once "footer.php"
?> 