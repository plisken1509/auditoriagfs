<?php
  include '../conexion/conexion.php';
  $id=$_POST['id'];
  $nombre=$_POST['nombre'];
  $cedula=$_POST['cedula'];
  $perfil=$_POST['perfil'];
  $correo=$_POST['correo'];
  $telefono=$_POST['telefono'];
  $usuario=$_POST['usuario'];
  $clave=$_POST['clave'];
  $estado=$_POST['estado'];
  $query="update usuarios set perId='$perfil',cedula='$cedula',nombre='$nombre',correo='$correo',telefono='$telefono',usuario='$usuario',clave='$clave',estado='$estado' where id=$id";
  echo $query;
  $enviar=mysqli_query($db,$query);
  echo $perfil;
  header('location:usuarios.php');
?>