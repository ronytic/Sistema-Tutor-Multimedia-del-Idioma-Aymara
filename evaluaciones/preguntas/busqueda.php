<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/preguntas.php';
	$preguntas=new preguntas;
    include_once '../../class/paralelo.php';
	$paralelo=new paralelo;
    extract($_POST);

    $codparalelo=$codparalelo!=""?$codparalelo:"%";
    $bimestre=$bimestre!=""?$bimestre:"%";
    
	
	$est=$preguntas->mostrarTodo("codparalelo LIKE '$codparalelo' and bimestre LIKE '$bimestre' and pregunta LIKE '%$pregunta%'","pregunta");
	
    foreach($est as $e){$i++;
        $par=array_shift($paralelo->mostrar($e['codparalelo']));
    
        $datos[$i]['codpreguntas']=$e['codpreguntas'];
        $datos[$i]['pregunta']=$e['pregunta'];
        $datos[$i]['bimestre']=$e['bimestre'];
        $datos[$i]['paralelo']=$par['nombre'];
        
    }
    $titulo=array("pregunta"=>"Pregunta","bimestre"=>"Bimestre","paralelo"=>"Paralelo");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","");
}
?>