<?php
    include ('../conexion/conexion.php');
    $nombre=$_POST['nombre'];
    $perfil=$_POST['perfil'];
    $correo=$_POST['correo'];
    $cedula=$_POST['cedula'];
    $telefono=$_POST['telefono'];
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];



    $query = " INSERT INTO usuarios (perId,cedula,nombre,correo,telefono,usuario,clave,estado)  
     VALUES('$perfil','$cedula','$nombre','$correo','$telefono','$usuario','$clave','1')";
   mysqli_query($db, $query);
   header('location:usuarios.php');
?>
  