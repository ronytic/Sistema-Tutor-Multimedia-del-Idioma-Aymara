<?php
$b=$_POST['b'];
switch($b){
    case "b1":{$bimestre=1;}break;    
    case "b2":{$bimestre=2;}break;    
    case "b3":{$bimestre=3;}break;    
    case "b4":{$bimestre=4;}break;    
}
include_once("class/temas.php");
$temas=new temas;
$tem=$temas->mostrarTodo("bimestre=".$bimestre);
?>
<div class="titulo"><?php echo $bimestre?> Bimestre</div>
<?php
foreach($tem as $t){
    ?>
    <div style="width:220px;  display: inline;
  float: left;">
        <div class="contenidot">
            <div class="titulo"><?php    echo $t['nombre'];?></div>
            <br>
            <?php
                if($t['imagen']!=""){
                ?><a href="leccion.php?d=<?php echo $t['codtemas']?>" class="leccion"><img src="imagenes/temas/<?php echo $t['imagen']?>" width="150"></a><?php	
                }
            ?>
        </div>
    </div>
    <?php
}
?>
<div class="clear"></div>