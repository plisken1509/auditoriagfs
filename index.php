<!DOCTYPE html>
<html lang="en">
<?php require("comunes/head.php"); ?>

<body style="background-color:white;">


  <?php require("comunes/nav.php"); ?>

  <!-- Header -->
  <header>

    <br><br> <br>
    <form class="form-signin" action="login.php" method="POST" style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); ">
      <div style="text-align:center;color:red;font-weight:900">
        <img src="img/profile.jpg" alt="" width="128px">
        <?php
        if (isset($_GET["error"])) {
        ?>
          <div class="alert" style="color: #b39523;color:white">
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo "Usuario no existe"; ?> !
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET["iniciar"])) {
        ?>
            <div class="alert" style="background-color:#cb9a33; color:white">
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo "Debe iniciar sesión"; ?> !
          </div>
        <?php
        }
        ?>




        <h2 class="form-signin-heading" style="color: #b39523;">AUTENTICACIÓN</h2>
        <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre de usuario" required="" autofocus="" />
        <input type="password" class="form-control" name="clave" placeholder="Clave" required="" />

        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #b39523;">Aceptar</button>

    </form>

    </div>

  </header>

  

  <?php require("comunes/scripts.php"); ?>


</body>

</html>

