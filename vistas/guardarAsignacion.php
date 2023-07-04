<?php
    include ('../conexion/conexion.php');
    $comedor=$_POST['comedor'];
    $usuario=$_POST['usuario'];
    date_default_timezone_set('America/Guayaquil');
    $fechaActual = date('Y-m-d');
    $query = " INSERT INTO asignacion (usuId,comId,fecha,estado)  
     VALUES('$usuario','$comedor','$fechaActual','1')";
   mysqli_query($db, $query);
   header('location:usuarios.php');
?>
  