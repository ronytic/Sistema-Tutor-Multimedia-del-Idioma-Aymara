﻿<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/temas.php");
$temas=new temas;
extract($_POST);
//empieza la copia de archivos
/*
if(($_FILES['curriculum']['type']=="application/pdf" || $_FILES['curriculum']['type']=="application/msword" || $_FILES['curriculum']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && $_FILES['curriculum']['size']<="500000000"){
	@$curriculum=$_FILES['curriculum']['name'];
	@copy($_FILES['curriculum']['tmp_name'],"../curriculum/".$_FILES['curriculum']['name']);
}else{
	//mensaje que no es valido el tipo de archivo	
	$mensaje[]="Archivo no válido. Verifique e intente nuevamente";
}
*/
if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../imagenes/temas/".$_FILES['imagen']['name']);	
}
if($_FILES['video']['name']!=""){
	@copy($_FILES['video']['tmp_name'],"../../contenido/temas/".$_FILES['video']['name']);	
}
$valores=array(	"bimestre"=>"'$bimestre'",
                "nombre"=>"'$nombre'",
				"descripcion"=>"'$descripcion'",
                
                "imagen"=>"'".$_FILES['imagen']['name']."'",
                "video"=>"'".$_FILES['video']['name']."'",
                "orden"=>"'$orden'",
				
				);
				$temas->insertar($valores);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>