<?php
  include '../conexion/conexion.php';
  $id=$_POST['id'];
  $nombre=$_POST['nombre'];
  $direccion=$_POST['direccion'];
  $estado=$_POST['estado'];
  $query="update comedor set nombre='$nombre',direccion='$direccion',estado='$estado' where id=$id";
  echo $query;
  $enviar=mysqli_query($db,$query);
  echo $perfil;
  header('location:comedores.php');
?>