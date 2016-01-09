<?php
include_once("../config.php");
include_once("../funciones/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php php_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php php_start();?>" />
<title>.::Acceso al Sistema | <?php echo $title;?>::.</title>
<link href="../css/960/960.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/nuevo/estilo.css" type="text/css" rel="stylesheet" media="all" />
<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/login.js"></script>
</head>
<body>
<div class="container">
    <div class="login">
      <h2>Acceso al Sistema</h2>
            <?php
            if($_GET['incompleto']){
            ?>
            <div class="rojoC">INTRODUSCA TODOS los DATOS</div>
            <?php
            }
            if($_GET['error']){
            ?>
            <div class="naranjaC">LOS DATOS SON INCORRECTOS<br />verifique e intente nuevamente</div>
            <?php
            }
            ?>
      <form action="login.php" method="post" id="login">
         <input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
         <table>
            <tr>
                <td>Usuario</td>
                <td><input type="text" name="usuario" value="" placeholder="Introdusca su Usuario" id="usuario"></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" name="pass" value="" placeholder="Introdusca su Contraseña" id="pass"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Ingresar" value="Ingresar"></td>
            </tr>
         </table>
      </form>
    </div>

    <div class="login-title">
      <p><?php echo str_replace("  ","<br>",$title)?></p>
    </div>
    <div class="audio"><audio src="../audio/bienvenido.mp3" controls="controls" ></audio></div>
  </div>

  
</body>
</html>
<?php php_start();?>