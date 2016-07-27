<?php
include_once("login/check.php");
//print_r($_SESSION);
$b=$_POST['b'];
$codestudiante=$_SESSION['idusuario'];
switch($b){
    case "b1":{$bimestre=1;}break;    
    case "b2":{$bimestre=2;}break;    
    case "b3":{$bimestre=3;}break;    
    case "b4":{$bimestre=4;}break;    
}
include_once("class/temas.php");
$temas=new temas;
$tem=$temas->mostrarTodo("bimestre=".$bimestre);

include_once("class/respuestaspractica.php");
$respuestaspractica=new respuestaspractica;


?>
<div class="titulo3"><?php echo $bimestre?> Bimestre</div>
<?php
$i=0;
$sw=0;
//echo $_SESSION['nivel'];
foreach($tem as $t){$i++;
    if($_SESSION['nivel']!=1){
        $rp=$respuestaspractica->mostrarTodo("bimestre=".$bimestre." and codestudiante=".$codestudiante." and codtema=".$t['codtemas']);
        $crp=count($rp);
    if($i==1){$crp=1;}
    }else{
        $crp=1; 
           
    }
    // echo $crp;
    ?>
    <div style="width:210px;  display: inline;
  float: left;" class="<?php echo (($crp==0 && $sw==0))?'desabilitado':'';?>">
        <div class="contenidot">
            <div class="titulo2"><?php    echo $t['nombre'];?></div>
            <br>
            <?php
                if($t['imagen']!=""){
                ?><a href="leccion.php?d=<?php echo $t['codtemas']?>" class="leccion" rel="<?php echo ($crp==0 && $sw==0)?'desabilitado':'';?>"><img src="imagenes/temas/<?php echo $t['imagen']?>" width="150"></a><?php	
                }
            ?>
        </div>
    </div>
    <?php
   if($crp==1 &&$sw==0){$sw=1;}else{ $sw=0;}
   
}
?>
<div class="clear"></div>