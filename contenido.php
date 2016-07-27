<?php
$c=$_POST['c'];

include_once("class/contenido.php");
$contenido=new contenido;
$cont=$contenido->mostrarTodo("codcontenido=".$c);
$t=array_shift($cont);
?>
<div class="contenidoc" rel="<?php echo $t['codcontenido']?>" >
    <div class="titulo2"><?php echo $t['descripcion']?></div>
<center>
<?php
    if($t['imagen']!=""){
    ?><img src="contenido/imagen/<?php echo $t['imagen']?>" width="300"><?php	
    }
?>
<br>
<?php
    if($t['audio']!=""){
        
    ?><audio src="contenido/audio/<?php echo $t['audio']?>" controls width="300"></audio><?php
    }
?>
<br>
<?php
    if($t['video']!=""){
        
    ?><video src="contenido/video/<?php echo $t['video']?>" controls width="300" preload="auto"></video><?php
    }
?>
</center>
</div>