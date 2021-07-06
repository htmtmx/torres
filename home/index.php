<?php
    session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 900;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: ..\control\c_logout.php");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();

    if(!isset($_SESSION['usuario']))
    {
      header('Location: ../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <?php
    $tittle = "Bienvenido ". $_SESSION['usuario'] ." ". $_SESSION['puesto'] ." - Inicio al sistema - v1.0";
    include("includes/header.php");
    ?>
  <body class="body-home">
  <div class="d-flex">
      <?php include("includes/navegation.php"); ?>
      <div class="w-100">
      <?php include("includes/menus.php"); ?>
        <div id="content">
        <!--Inicio contenido dinamico-->
          <div class="componet-dinamico">
            <?php include("../home/principal.php");?>
          </div>
          <!--FIN contenido dinamico-->
          <?php include("includes/footer.php");?>
        </div>
      </div>
  </div>
  <!-- script_js -->
  </body>
</html>