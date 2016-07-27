<?php 
include_once 'class/menu.php';
include_once 'class/submenu.php';
$menu=new menu;
$submenu=new submenu;
?>
<div  class="grid_12" >
<br>
<div id='cssmenu'>
<ul>
    <li ><a href="<?php echo $folder; ?>index.php" class="selected active"><?php /*<img src="<?php echo $folder; ?>imagenes/ico/home2.png" width="40" height="40" align="middle" />*/?>Inicio</a></li>
<?php 
    if($nivel){
    $i=1;
    foreach ($menu->mostrarMenu($nivel) as $m) {$i++;?>
        <li  class='has-sub'><a href="#" rel="tab<?php echo $i;?>"><?php /*<img src="<?php echo $folder; ?>imagenes/ico/<?php echo $m['imagen'] ?>" width="40" height="40" align="middle" /> */?><?php echo $m['nombre'] ?></a>
        <?php if($m['submenu']){?>
            <ul>
              <?php foreach ($submenu->mostrarSubMenu($nivel,$m['idmenu']) as $sb): ?>
                <li><a href="<?php echo $folder?><?php echo $m['url'] ?><?php echo $sb['url'] ?>"><?php /*<img src="<?php echo $folder; ?>imagenes/ico/<?php echo $sb['imagen']==""?'tick.png':$sb['imagen']; ?>" height="20" align="middle" />*/?> <?php echo $sb['nombre'] ?></a></li>	
              <?php endforeach ?>
            </ul>
        <?php }?>
        </li>
    <?php }
    }
    ?>
    <?php if($_SESSION['login']==0){?>
    <li><a href="<?php echo $folder; ?>index.php" class="selected active">Evaluaciones</a></li>
    <li><a href="<?php echo $folder; ?>index.php" class="selected active">Administración</a></li>
    <?php }?>
    <li><a href="<?php echo $folder; ?>videos/index.php" class="selected videosgeneral">Videos</a></li>
</ul>
</div>
</div>
<div class="clear"></div>
<br>