<?php
$d=$_GET['d'];

include_once("class/contenido.php");
$contenido=new contenido;
$cont=$contenido->mostrarTodo("codtemas=".$d);


include_once("class/temas.php");
$temas=new temas;
$tem=$temas->mostrarTodo("codtemas=".$d);
$tem=array_shift($tem);;
?>
<div class="titulo"><?php echo $tem['nombre']?></div>
<?php
foreach($cont as $t){
    ?>
    <div style="width:335px;  display: inline;
  float: left;">
        <div class="contenidot">
            <div class="titulo"><?php    echo $t['nombre'];?></div>
            <br>
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
        </div>
    </div>
    <?php
}
?>
<div class="clear"></div>