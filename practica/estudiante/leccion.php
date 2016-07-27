<?php
include_once("../../login/check.php");
$folder="../../";

$codestudiante=$_SESSION['idusuario'];

$codtemas=$_GET['d'];
include_once("../../class/temas.php");
$temas=new temas;
$tem=$temas->mostrarTodo("codtemas=".$codtemas);
$tem=array_shift($tem);

include_once("../../class/practica.php");
$practica=new practica;
$prac=$practica->mostrarTodo("codtemas=".$codtemas);

include_once("../../class/respuestaspractica.php");
$respuestaspractica=new respuestaspractica;

$rp=$respuestaspractica->mostrarTodo("codtema=".$codtemas." and codestudiante=".$codestudiante);

?>
<div class="titulo3">Práctica de <?php echo $tem['nombre']?></div>
<?php
if(count($prac)==0){
?>
<div class=""><h3><b>No se encuentra disponible la práctica para este Tema</b></h3></div>

<?php    
}else{
    if(count($rp)>0){
        ?><h3><?php echo "Usted ya Aprobo la Práctica para este TEMA"; ?></h3>
        <?php
        exit();
    }
    ?>
    <form action="practica/estudiante/guardar.php" method="post" class="formulariopractica">
    <input type="hidden" name="codtemas" value="<?php echo $codtemas?>">
    <?php
    $i=0;
    $cantidad=count($prac);
    foreach($prac as $p){$i++;
        ?>
        <div class="cuadro<?php echo $i;?>" style="display:<?php echo $i==1?"block":'none'?>">
        <hr>
        <div class="titulo2">Pregunta <?php echo $i?> de <?php echo $cantidad?> - <?php echo $p['enunciado']?></div>
        <?php
        switch($p['tipo']){
            case "1":{tipo1($p,$i,$cantidad);}break;    
            case "2":{tipo2($p,$i,$cantidad);}break;    
            case "3":{tipo3($p,$i,$cantidad);}break;    
        }
        
        ?>
        <center>
        <?php if($i!=1){?>
        <a href="#" class="botonazul anterior" rel="<?php echo $i?>">Anterior</a>    
        <?php }?>
        <?php if($i!=$cantidad){?>
        <a href="#" class="botonazul siguiente" rel="<?php echo $i?>">Siguiente</a>
        <?php }?>
        
        <?php if($i==$cantidad){?><input type="submit" value="Evaluar"><?php }?>
        </center>
        </div>
        <?php
    }
    ?>

    </form>
    <?php
}
?>


<?php 
function tipo1($d,$i,$cantidad){
    ?>
    <div style="width:210px;  display: inline;  float: left;">
        <div class="contenidot">
            <?php $valores=explode(",",$d['opciones1']);?>
            <?php if($d['video1']!=""){?>
                <video src="contenido/practica/video/<?php echo $d['video1']?>" width="170" controls></video>
            <?php }?>
            <?php if($d['img1']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img1']?>" width="150">
            <?php }?>
            <br>
            <input type="hidden" name="r[<?php echo $d['codpractica']?>][tipo]" value="<?php echo $d['tipo']?>">
            <select name="r[<?php echo $d['codpractica']?>][r1]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenidot">
            <?php $valores=explode(",",$d['opciones2']);?>
            <?php if($d['video2']!=""){?>
                <video src="contenido/practica/video/<?php echo $d['video2']?>" width="170" controls></video>
            <?php }?>
            <?php if($d['img2']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img2']?>" width="150">
            <?php }?>
            <br>
            <select name="r[<?php echo $d['codpractica']?>][r2]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenidot">
            <?php $valores=explode(",",$d['opciones3']);?>
            <?php if($d['video3']!=""){?>
                <video src="contenido/practica/video/<?php echo $d['video3']?>" width="170" controls></video>
            <?php }?>
            <?php if($d['img3']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img3']?>" width="150">
            <?php }?>
            <br>
            <select name="r[<?php echo $d['codpractica']?>][r3]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenidot">
            <?php $valores=explode(",",$d['opciones4']);?>
            <?php if($d['video4']!=""){?>
                <video src="contenido/practica/video/<?php echo $d['video4']?>" width="170" controls></video>
            <?php }?>
            <?php if($d['img4']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img4']?>" width="150">
            <?php }?>
            <br>
            <select name="r[<?php echo $d['codpractica']?>][r4]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
    <div style="clear:both"></div>
    <?php
}

function tipo2($d,$i,$cantidad){
    ?>
    <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <?php echo $d['pregunta1']?><br>
            <?php $valores=explode(",",$d['opciones1']);?>
            <input type="hidden" name="r[<?php echo $d['codpractica']?>][tipo]" value="<?php echo $d['tipo']?>">
            <select name="r[<?php echo $d['codpractica']?>][r1]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <?php echo $d['pregunta2']?><br>
            <?php $valores=explode(",",$d['opciones2']);?>
            <select name="r[<?php echo $d['codpractica']?>][r2]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <?php echo $d['pregunta3']?><br>
            <?php $valores=explode(",",$d['opciones3']);?>
            <select name="r[<?php echo $d['codpractica']?>][r3]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <?php echo $d['pregunta4']?><br>
            <?php $valores=explode(",",$d['opciones4']);?>
            <select name="r[<?php echo $d['codpractica']?>][r4]" required>
                <?php foreach( $valores as $ak=>$av){
                    ?>
                    <option value="<?php echo $ak+1?>"><?php echo $av?></option>
                    <?php
                }?>
            </select>
        </div>
    </div>
    <div style="clear:both"></div>
    <?php
}
function tipo3($d,$i,$cantidad){
    ?>
    <input type="hidden" name="r[<?php echo $d['codpractica']?>][tipo]" value="<?php echo $d['tipo']?>">
    <div style="width:420px;  display: inline;  float: left;">
        <div class="contenido">
        <center>
            <?php if($d['audio']!=""){?>
                <audio src="contenido/practica/audio/<?php echo $d['audio']?>" controls></audio>
            <?php }?>
            <br>
        </center>    
        </div>
    </div>
    <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
        <center>
            <?php if($d['img1']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img1']?>" width="150">
            <?php }?>
            <br>
            <input type="radio" name="r[<?php echo $d['codpractica']?>][respuesta]" value="1" required>
        </center>    
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <center>
            <?php if($d['img2']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img2']?>" width="150">
            <?php }?>
            <br>
            <input type="radio" name="r[<?php echo $d['codpractica']?>][respuesta]" value="2" required>
        </center>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <center>
            <?php if($d['img3']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img3']?>" width="150">
            <?php }?>
            <br>
            <input type="radio" name="r[<?php echo $d['codpractica']?>][respuesta]" value="3" required>
        </center>
        </div>
    </div>
     <div style="width:210px;  display: inline;  float: left;">
        <div class="contenido">
            <center>
            <?php if($d['img4']!=""){?>
                <img src="contenido/practica/img/<?php echo $d['img4']?>" width="150">
            <?php }?>
            <br>
            <input type="radio" name="r[<?php echo $d['codpractica']?>][respuesta]" value="4" required>
        </center>
        </div>
    </div>
    <div style="clear:both"></div>
    <?php
}
?>
<script type="text/javascript">
$(".formulariopractica").ajaxForm(function(data){
    
    $(".textoinicio").html(data)

});
</script>