<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/estudiante.php';
	extract($_POST);

    $codparalelo=$codparalelo!=""?$codparalelo:"%";
	$estudiante=new estudiante;
	$est=$estudiante->mostrarTodo("codparalelo LIKE '$codparalelo' and nombres LIKE '%$nombres%' and paterno LIKE '%$paterno%'","paterno,materno,nombres");
	
    foreach($est as $e){$i++;
        $datos[$i]['codestudiante']=$e['codestudiante'];
        $datos[$i]['nombres']=$e['nombres'];
        $datos[$i]['paterno']=$e['paterno'];
        $datos[$i]['materno']=$e['materno'];
        $datos[$i]['carnet']=$e['carnet'];
        
    }
    $titulo=array("nombres"=>"Nombres","paterno"=>"Apellido Paterno","materno"=>"Apellido Materno","carnet"=>"C.I.");
	listadoTabla($titulo,$datos,1,"","","",array("Ver Nota"=>"vernota.php"),"","_blank");
}
?>