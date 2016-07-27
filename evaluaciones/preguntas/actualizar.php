<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/preguntas.php");
$preguntas=new preguntas;
extract($_POST);
//empieza la copia de archivos
$valores=array(	
                "codparalelo"=>"'$codparalelo'",
				"bimestre"=>"'$bimestre'",
                "pregunta"=>"'$pregunta'",
                "opcion1"=>"'$opcion1'",
                "opcion2"=>"'$opcion2'",
                "opcion3"=>"'$opcion3'",
                "opcion4"=>"'$opcion4'",
                "opcion5"=>"'$opcion5'",
                "correcta"=>"'$correcta'",
				);
 if($_FILES['preguntaaudio']['name']!=""){
     @copy($_FILES['preguntaaudio']['tmp_name'],"../../contenido/evaluacion/".$_FILES['preguntaaudio']['name']);	
	$valores['preguntaaudio']="'".$_FILES['preguntaaudio']['name']."'";
}
           
 if($_FILES['imagen1']['name']!=""){
     @copy($_FILES['imagen1']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen1']['name']);	
	$valores['imagen1']="'".$_FILES['imagen1']['name']."'";
}
if($_FILES['imagen2']['name']!=""){
     @copy($_FILES['imagen2']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen2']['name']);	
	$valores['imagen2']="'".$_FILES['imagen2']['name']."'";
}
if($_FILES['imagen3']['name']!=""){
     @copy($_FILES['imagen3']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen3']['name']);	
	$valores['imagen3']="'".$_FILES['imagen3']['name']."'";
}
if($_FILES['imagen4']['name']!=""){
     @copy($_FILES['imagen4']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen4']['name']);	
	$valores['imagen4']="'".$_FILES['imagen4']['name']."'";
}
if($_FILES['imagen5']['name']!=""){
     @copy($_FILES['imagen5']['tmp_name'],"../../contenido/evaluacion/".$_FILES['imagen5']['name']);	
	$valores['imagen5']="'".$_FILES['imagen5']['name']."'";
}               
            
           // print_r($valores);    
                
				$preguntas->actualizar($valores,$id);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>