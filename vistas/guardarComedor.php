<?php
    include ('../conexion/conexion.php');
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];



    $query = " INSERT INTO comedor (nombre,direccion,estado)  
     VALUES('$nombre','$direccion','1')";
   mysqli_query($db, $query);
   header('location:comedores.php');
?>
  