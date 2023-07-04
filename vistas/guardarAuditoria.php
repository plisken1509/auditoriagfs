<?php
    include ('../conexion/conexion.php');
    session_start();
    $asignacion=$_POST['asignacion'];
    $usuario=$_SESSION['usuario'];
    $query = " INSERT INTO visita (asiId,usuId,fecha,procentaje,calificacion,estado)  
     VALUES('$asignacion','$usuario',now(),'0.00','Pendiente','1')";
   mysqli_query($db, $query);
   header('location:listadoVisitas.php');
?>
  