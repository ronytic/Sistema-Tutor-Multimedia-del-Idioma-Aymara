<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/estudiante.php");
$estudiante=new estudiante;
extract($_POST);
//empieza la copia de archivos
$valores=array(	
                "nombres"=>"'$nombres'",
				"paterno"=>"'$paterno'",
                "materno"=>"'$materno'",
                "carnet"=>"'$carnet'",
                "codparalelo"=>"'$codparalelo'",
                "observaciones"=>"'$observaciones'",
				);
				$estudiante->actualizar($valores,$id);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>