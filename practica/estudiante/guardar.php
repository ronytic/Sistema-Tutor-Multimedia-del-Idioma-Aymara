<?php
include_once("../../login/check.php");
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
$codestudiante=$_SESSION['idusuario'];


$r=$_POST['r'];
$codtemas=$_POST['codtemas'];

include_once("../../class/practica.php");
$practica=new practica;

include_once("../../class/temas.php");
$temas=new temas;

include_once("../../class/respuestaspracticadetalle.php");
$respuestaspracticadetalle=new respuestaspracticadetalle;

include_once("../../class/respuestaspractica.php");
$respuestaspractica=new respuestaspractica;

$tem=$temas->mostrarTodo("codtemas=".$codtemas);
$tem=array_shift($tem);

$bimestre=$tem['bimestre'];
$totalpreguntas=0;
$correctas=0;
$incorrectas=0;
foreach($r as $codpractica=>$v){
    $tipo=$v['tipo'];
    $r1=$v['r1'];
    $r2=$v['r2'];
    $r3=$v['r3'];
    $r4=$v['r4'];
    $respuesta=$v['respuesta'];
    //echo $codpractica."<br>";
    $prac=$practica->mostrarTodo("codpractica=".$codpractica);
    $prac=array_shift($prac);
    
    switch($tipo){
        case "1":{//print_r($prac);
                    /*echo $r1."-".$prac['r1'];
                    echo $r2."-".$prac['r2'];
                    echo $r3."-".$prac['r3'];
                    echo $r4."-".$prac['r4'];*/
                    if($r1==$prac['r1']){$correctas++;}else{$incorrectas++;}
                    if($r2==$prac['r2']){$correctas++;}else{$incorrectas++;}
                    if($r3==$prac['r3']){$correctas++;}else{$incorrectas++;}
                    if($r4==$prac['r4']){$correctas++;}else{$incorrectas++;}
                    $totalpreguntas+=4;
                    }break;
        case "2":{//print_r($prac);
                    /*echo $r1."-".$prac['r1'];
                    echo $r2."-".$prac['r2'];
                    echo $r3."-".$prac['r3'];
                    echo $r4."-".$prac['r4'];*/
                    if($r1==$prac['r1']){$correctas++;}else{$incorrectas++;}
                    if($r2==$prac['r2']){$correctas++;}else{$incorrectas++;}
                    if($r3==$prac['r3']){$correctas++;}else{$incorrectas++;}
                    if($r4==$prac['r4']){$correctas++;}else{$incorrectas++;}
                    $totalpreguntas+=4;
                    }break;  
        case "3":{//print_r($prac);
                    //echo $respuesta."-".$prac['respuesta'];
                    if($respuesta==$prac['respuesta']){$correctas++;}else{$incorrectas++;}
                   
                    $totalpreguntas+=1;
                    }break;  
    }
    $valores=array("codtema"=>"'$codtemas'",
                    "bimestre"=>"'$bimestre'",
                    "codestudiante"=>"'$codestudiante'",
                    "codpractica"=>"'$codpractica'",
                    "tipo"=>"'$tipo'",
                    "r1"=>"'$r1'",
                    "r2"=>"'$r2'",
                    "r3"=>"'$r3'",
                    "r4"=>"'$r4'",
                    "respuesta"=>"'$respuesta'",
                  );
    $respuestaspracticadetalle->insertar($valores);
    /*echo "<br>";
    print_r($valores);
    echo "<br>";*/
    
}
/*echo $totalpreguntas."-";
echo $correctas."-";
echo $incorrectas;*/

$pcorrectas=promedio($totalpreguntas,$correctas);
$pincorrectas=promedio($totalpreguntas,$incorrectas);

$valores=array("codtema"=>"'$codtemas'",
                "bimestre"=>"'$bimestre'",
                "codestudiante"=>"'$codestudiante'",
                "totalpreguntas"=>"'$totalpreguntas'",
                "correctas"=>"'$correctas'",
                "incorrectas"=>"'$incorrectas'",
                "pcorrectas"=>"'$pcorrectas'",
                "pincorrectas"=>"'$pincorrectas'",
                );
if($pcorrectas>50){
                $respuestaspractica->insertar($valores);
                
}
?>
<div class="titulo2">Resultado</div>
<center>
<h3>NOTA OBTENIDA:</h3>
<h2 class="<?php echo $pcorrectas>50?'verde':'rojo'?>"><?php echo $pcorrectas?></h2>
<h3><?php if($pcorrectas>50){echo "PUEDE PASAR AL SIGUIENTE TEMA";}else{echo 'TIENE QUE VOLVER A REPASAR EL TEMA';}?></h3>
</center>
<?php
/*echo $pcorrectas;
echo $pincorrectas;*/
function promedio($total,$cantidad){
    return number_format($cantidad*100/$total,0);
}
?>