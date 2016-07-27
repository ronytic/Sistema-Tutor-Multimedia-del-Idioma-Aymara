	<?php include_once("config.php");?>
    <div class="clear"></div>
    <div class="grid_12">
    
	<?php /*<div class="usuariocuerpo">
         <?php if($nivel){?>
		<?php if($nivel!=4){?>
        <span class="pequenol">Nombre:</span> <?php echo $us['nombre'];?> | 
		<span class="pequenol">Usuario:</span> <?php echo $us['usuario'];?> |
		<span class="pequenol">Hora Acceso:</span> <?php echo $_SESSION['horasesion'];?> |
		<a href="<?php echo $folder?>usuarios/cambiarp.php?id=<?php echo $_SESSION['idusuario']?>" class="enlaceusuario">Cambiar Contraseña</a>
        <?php }?>
		<a href="<?php echo $folder ?>login/logout.php" class="botonplomo">Salir de Administración</a>
        <?php }else{
           ?>
           <marquee>UNIDAD EDUCATIVA DON BOSCO-EL PRADO</marquee>
           <?php 
        }?>
	</div>*/?>
    
</div>
<div class="clear"></div>
	<div class="grid_12"> 
		<div id="piepag ">
            <div class="mensaje titulo2">
               <?php echo $direccion?> | Todos los Derechos reservados <?php echo date("Y")?> 
            </div>
		</div> 
	</div>
    <div class="clear"></div>
    </div>
</div>
</body>
</html>
<?php php_start();?>