<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/preguntas.php");
$preguntas=new preguntas;
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
if($_FILES['imagen1']['name']!=""){
	@copy($_FILES['imagen1']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen1']['name']);	
}
if($_FILES['imagen2']['name']!=""){
	@copy($_FILES['imagen1']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen1']['name']);	
}
if($_FILES['imagen3']['name']!=""){
	@copy($_FILES['imagen1']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen1']['name']);	
}
if($_FILES['imagen4']['name']!=""){
	@copy($_FILES['imagen1']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen1']['name']);	
}
if($_FILES['imagen5']['name']!=""){
	@copy($_FILES['imagen1']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen1']['name']);	
}
$valores=array(	
                "codparalelo"=>"'$codparalelo'",
				"bimestre"=>"'$bimestre'",
                "pregunta"=>"'$pregunta'",
                "opcion1"=>"'$opcion1'",
                "opcion2"=>"'$opcion2'",
                "opcion3"=>"'$opcion3'",
                "opcion4"=>"'$opcion4'",
                "opcion5"=>"'$opcion5'",
                "opcion1"=>"'".$_FILES['imagen1']['name']."'",
                "opcion2"=>"'".$_FILES['imagen2']['name']."'",
                "opcion3"=>"'".$_FILES['imagen3']['name']."'",
                "opcion4"=>"'".$_FILES['imagen4']['name']."'",
                "opcion5"=>"'".$_FILES['imagen5']['name']."'",
                "correcta"=>"'$correcta'",
				);
				$preguntas->insertar($valores);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>