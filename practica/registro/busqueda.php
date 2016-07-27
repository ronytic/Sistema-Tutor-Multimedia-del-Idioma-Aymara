<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/practica.php';
	$practica=new practica;
    include_once '../../class/temas.php';
	$temas=new temas;
    extract($_POST);

    $codtemas=$codtemas!=""?$codtemas:"%";
    $bimestre=$bimestre!=""?$bimestre:"%";
    
	
	$prac=$practica->mostrarTodo("codtemas LIKE '$codtemas' ","enunciado");
	
    foreach($prac as $p){$i++;
        $tem=array_shift($temas->mostrar($p['codtemas']));
    
        $datos[$i]['codpractica']=$p['codpractica'];
        $datos[$i]['tema']=$tem['nombre'];
        
        switch($p['tipo']){
            case '1':{$tipo="Enunciado, Video/Audio y Respuesta";}break;
            case '2':{$tipo="Traducir o Completar";}break;
            case '3':{$tipo="Seleccionar la Respuesta Correcta";}break;
        }
        $datos[$i]['tipo']=$tipo;
        $datos[$i]['enunciado']=$p['enunciado'];
        
    }
    $titulo=array("enunciado"=>"Enunciado","tema"=>"Tema","tipo"=>"Tipo de Pregunta");
	listadoTabla($titulo,$datos,1,"","eliminar.php","");
}
?>