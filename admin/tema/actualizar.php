<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/temas.php");
$temas=new temas;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"bimestre"=>"'$bimestre'",
                "nombre"=>"'$nombre'",
				"descripcion"=>"'$descripcion'",
                
                "orden"=>"'$orden'",
				
				);
                
if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../imagenes/temas/".$_FILES['imagen']['name']);	
	$valores["imagen"]="'".$_FILES['imagen']['name']."'";
}
				$temas->actualizar($valores,$id);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>