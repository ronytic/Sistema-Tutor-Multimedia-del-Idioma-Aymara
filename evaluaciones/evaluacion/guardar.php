<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/respuestas.php");
$respuestas=new respuestas;
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
/*if($_FILES['imagen']['name']!=""){
	@copy($_FILES['imagen']['tmp_name'],"../../imagenes/temas/".$_FILES['imagen']['name']);	
}*/
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$respuestas->actualizarCondicion(array("activo"=>"0"),"codestudiante=$codestudiante and codparalelo=$codparalelo and bimestre=$bimestre");
foreach($r as $k=>$v){
    $pre=array_shift($preguntas->mostrar($k));
    $respu=$pre['correcta']==$v?'1':'0';
    $valores=array(	
                "codpregunta"=>"'$k'",
				"respuesta"=>"'$v'",
                "correcta"=>"'$respu'",
                "codestudiante"=>"'$codestudiante'",
                "codparalelo"=>"'$codparalelo'",
                "bimestre"=>"'$bimestre'",
				);
                
                /*echo "<pre>";
                print_r($valores);
                echo "</pre>";*/
    $respuestas->insertar($valores);
                
}

				
				$mensaje[]="LOS CAMBIOS SE GUARDARON CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
header("Location:../../index.php");
include_once '../../mensajeresultado.php';
endif;?>