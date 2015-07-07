<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/contenido.php");
$contenido=new contenido;
extract($_POST);
//empieza la copia de archivos
$valores=array(	"codtemas"=>"'$codtemas'",
                "nombre"=>"'$nombre'",
				"descripcion"=>"'$descripcion'",
				
				"imagen"=>"'".$_FILES['imagen']['name']."'",
                "audio"=>"'".$_FILES['audio']['name']."'",
                "video"=>"'".$_FILES['video']['name']."'",
				"orden"=>"'$orden'",
				);
				
if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../contenido/imagen/".$_FILES['imagen']['name']);	
	$valores["imagen"]="'".$_FILES['imagen']['name']."'";
}
if($_FILES['audio']['name']!=""){
	@copy($_FILES['audio']['tmp_name'],"../../contenido/audio/".$_FILES['audio']['name']);	
	$valores["audio"]="'".$_FILES['audio']['name']."'";
}
if($_FILES['video']['name']!=""){
	@copy($_FILES['video']['tmp_name'],"../../contenido/video/".$_FILES['video']['name']);	
	$valores["video"]="'".$_FILES['video']['name']."'";
}

				$contenido->actualizar($valores,$id);
				$mensaje[]="SUS DATOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>