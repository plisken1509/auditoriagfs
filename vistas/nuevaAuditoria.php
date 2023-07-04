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
    <h1 style="text-align: center;">Asignación Comedores</h1>
    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
        
        

      <form class="form" action="guardarAuditoria.php" method="post">

          <div style="overflow-x:auto">
          <center>
            <h6 class="section-secondary-title mt-5">Lista de Comedores</h6>
           <?php 
               include_once "../conexion/conexion.php";
               $query="select a.id as asignacion, c.nombre as nombre from asignacion a 
               JOIN comedor c ON a.comId=c.id;";
               $ver=mysqli_query($db,$query);
              // Verificar si se obtuvieron resultados
              if ($resultado=mysqli_num_rows($ver)) {
                  // Generar las opciones del select
                  echo '<select class="form-control" name="asignacion" id="exampleFormControlSelect1" style=" width:150px">';
                  while($row = mysqli_fetch_array($ver)) {
                      echo '<option value="' . $row["asignacion"] . '">' . $row["nombre"] . '</option>';
                  }
                  echo '</select>';
              } else {
                  echo "No se encontraron resultados.";
              }
            ?>
            <br>
            <input type="submit" class="btn btn-primary"  value="Guardar Asignación" name="guardar" />
          </center>

        </div>
      </form>
      </div>
      </div>
        </div>

<?php
include_once "footer.php"
?> 