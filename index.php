<?php
include("conexion/conexion.php");
session_start();
if (isset($_POST['enviar'])) {
  $usuario=$_POST['username'];
  $clave=md5($_POST['password']);
  $query="select *,u.id as uid from usuarios u,perfil p where u.perId=p.id and u.usuario='$usuario' and u.clave='$clave' ";
  $enviar=mysqli_query($db,$query);
  $ver=mysqli_num_rows($enviar);
  if($ver>0){

  $_SESSION['usuario']=$usuario;
  
  $enviar=mysqli_query($db,$query);
  $ver=mysqli_fetch_array($enviar);
  
  $_SESSION['usuario']=$ver['uid'];
  $_SESSION['nombre']=$ver['nombre'];
  $_SESSION['perfil']=$ver['descripcion'];

  // $perfil=$ver['docCedula'];
    header('location:principal.php');
  
}
  echo '<script> alert("Datos Erroneos")</script>';

}

?>
<!DOCTYPE html>
<html lang="en">
<?php ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body style="background-color:white;">

<form method="post"> <h1>Inicio de Sesion</h1> <div class="inset"> <p> <label
for="email">Usuario</label> <input type="text" name="username" id="username"> </p>
<p> <label for="password">Clave</label> <input type="password"
name="password" id="password"> </p> <p>
      
      <label for="remember"></label>
    </p>
  </div>
  <p class="p-container">
    
    <input type="submit" name="enviar" id="enviar" value="enviar">
  </p>
</form>

</body>

</html>

