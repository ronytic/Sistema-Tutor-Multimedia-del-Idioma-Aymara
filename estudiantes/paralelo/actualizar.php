<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/paralelo.php");
$paralelo=new paralelo;
extract($_POST);
//empieza la copia de archivos
$valores=array(	
                "nombre"=>"'$nombre'",
				"descripcion"=>"'$descripcion'",

				);
				$paralelo->actualizar($valores,$id);
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";


$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>