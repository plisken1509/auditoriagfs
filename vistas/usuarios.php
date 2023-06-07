<?php
include_once "navbar.php"
?>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">GOURMET FOOD SERVICE</h1>
            <h2 class="display-4 mb-5">SISTEMA DE AUDITORIA</h2>    
        </div>
    </header>

    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
        <button type="button" class="btn btn-info">Nuevo</button>
        <h6 class="section-secondary-title mt-5">USUARIOS</h6>
        
        <?php
            include_once "../conexion/conexion.php";
            $query="SELECT u.*,p.descripcion as perfil FROM usuarios u 
                    JOIN perfil p ON u.perId=p.id;";
            $ver=mysqli_query($db,$query);

        ?>
      <table class="table table-striped">
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
            </tr>
            <?php } ?>
         </tbody>
      </table>
        </div>
    </div>

<?php
include_once "footer.php"
?> 