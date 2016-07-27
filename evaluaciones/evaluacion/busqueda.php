<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/preguntas.php';
	$preguntas=new preguntas;
    
    
    
    include_once '../../class/paralelo.php';
	$paralelo=new paralelo;
    extract($_POST);

    $codestudiante=$_SESSION['idusuario'];
    
    include_once("../../class/estudiante.php");
$estudiante=new estudiante;
$est=array_shift($estudiante->mostrar($_SESSION['idusuario']));
    
    
    $codparalelo=$est['codparalelo'];
    $bimestre=$bimestre!=""?$bimestre:"%";
    
    
    
	
	$est=$preguntas->mostrarTodo("codparalelo LIKE '$codparalelo' and bimestre LIKE '$bimestre' and pregunta LIKE '%$pregunta%'","pregunta");
	
    foreach($est as $e){$i++;
        $par=array_shift($paralelo->mostrar($e['codparalelo']));
    
    
        $img1=$e['imagen1']!=""?'<br><img src="../../contenido/evaluacion/'.$e['imagen1'].'" width="100">':'';
        $img2=$e['imagen2']!=""?'<br><img src="../../contenido/evaluacion/'.$e['imagen2'].'" width="100">':'';
        $img3=$e['imagen3']!=""?'<br><img src="../../contenido/evaluacion/'.$e['imagen3'].'" width="100">':'';
        $img4=$e['imagen4']!=""?'<br><img src="../../contenido/evaluacion/'.$e['imagen4'].'" width="100">':'';
        $img5=$e['imagen5']!=""?'<br><img src="../../contenido/evaluacion/'.$e['imagen5'].'" width="100">':'';
        $datos[$i]['codpreguntas']=$e['codpreguntas'];
        $datos[$i]['pregunta']=$e['pregunta']."<br>";
        if($e['preguntaaudio']!=""){
            $datos[$i]['pregunta'].='<audio src="../../contenido/evaluacion/'.$e['preguntaaudio'].'" controls>'.'</audio>';
        }
        $datos[$i]['opcion1']='<center>'.$e['opcion1'].'<br><input type="radio" name="r['.$e[codpreguntas].']" value="1">'.$img1.'</center>';
        $datos[$i]['opcion2']='<center>'.$e['opcion2'].'<br><input type="radio" name="r['.$e[codpreguntas].']" value="2">'.$img2.'</center>';
        $datos[$i]['opcion3']='<center>'.$e['opcion3'].'<br><input type="radio" name="r['.$e[codpreguntas].']" value="3">'.$img3.'</center>';
        $datos[$i]['opcion4']='<center>'.$e['opcion4'].'<br><input type="radio" name="r['.$e[codpreguntas].']" value="4">'.$img4.'</center>';
        $datos[$i]['opcion5']='<center>'.$e['opcion5'].'<br><input type="radio" name="r['.$e[codpreguntas].']" value="5">'.$img5.'</center>';
        
        
    }
    $titulo=array("pregunta"=>"Pregunta","opcion1"=>"Opción 1","opcion2"=>"Opción 2","opcion3"=>"Opción 3","opcion4"=>"Opción 4","opcion5"=>"Opción 5");
    
    ?>
    <form action="guardar.php" method="post">
    <input type="hidden" name="codestudiante" value="<?php echo $codestudiante?>">
    <input type="hidden" name="codparalelo" value="<?php echo $codparalelo?>">
    <input type="hidden" name="bimestre" value="<?php echo $bimestre?>">
    <strong>Bimestre:<?php echo $bimestre?></strong>
    <?php
	listadoTabla($titulo,$datos,1,"","","");
    ?>
    <input type="submit" value="Guardar Evaluación">
    </form>
    <?php
}
?>