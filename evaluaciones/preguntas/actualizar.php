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
				$preguntas->actualizar($valores,$id);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>