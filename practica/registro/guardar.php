<?php
include_once("../../login/check.php");
if(!empty($_POST)):
include_once("../../class/practica.php");
$practica=new practica;
extract($_POST);
if($_FILES['img1']['name']!=""){
	@copy($_FILES['img1']['tmp_name'],"../../contenido/practica/img/".$_FILES['img1']['name']);	
}
if($_FILES['img2']['name']!=""){
	@copy($_FILES['img2']['tmp_name'],"../../contenido/practica/img/".$_FILES['img2']['name']);	
}
if($_FILES['img3']['name']!=""){
	@copy($_FILES['img3']['tmp_name'],"../../contenido/practica/img/".$_FILES['img3']['name']);	
}
if($_FILES['img4']['name']!=""){
	@copy($_FILES['img4']['tmp_name'],"../../contenido/practica/img/".$_FILES['img4']['name']);	
}

if($_FILES['video1']['name']!=""){
	@copy($_FILES['video1']['tmp_name'],"../../contenido/practica/video/".$_FILES['video1']['name']);	
}
if($_FILES['video2']['name']!=""){
	@copy($_FILES['video2']['tmp_name'],"../../contenido/practica/video/".$_FILES['video2']['name']);	
}
if($_FILES['video3']['name']!=""){
	@copy($_FILES['video3']['tmp_name'],"../../contenido/practica/video/".$_FILES['video3']['name']);	
}
if($_FILES['video4']['name']!=""){
	@copy($_FILES['video4']['tmp_name'],"../../contenido/practica/video/".$_FILES['video4']['name']);	
}

if($_FILES['audio']['name']!=""){
	@copy($_FILES['audio']['tmp_name'],"../../contenido/practica/audio/".$_FILES['audio']['name']);	
}
if($_FILES['img1_3']['name']!=""){
	@copy($_FILES['img1_3']['tmp_name'],"../../contenido/practica/img/".$_FILES['img1_3']['name']);	
}
if($_FILES['img2_3']['name']!=""){
	@copy($_FILES['img2_3']['tmp_name'],"../../contenido/practica/img/".$_FILES['img2_3']['name']);	
}
if($_FILES['img3_3']['name']!=""){
	@copy($_FILES['img3_3']['tmp_name'],"../../contenido/practica/img/".$_FILES['img3_3']['name']);	
}
if($_FILES['img4_3']['name']!=""){
	@copy($_FILES['img4_3']['tmp_name'],"../../contenido/practica/img/".$_FILES['img4_3']['name']);	
}
if($tipo==1){
$valores=array(	
                "codtemas"=>"'$codtemas'",
                "tipo"=>"'$tipo'",
				"bimestre"=>"'$bimestre'",
                "enunciado"=>"'$enunciado'",
                "video1"=>"'".$_FILES['video1']['name']."'",
                "img1"=>"'".$_FILES['img1']['name']."'",
                "opciones1"=>"'$opciones1'",
                "r1"=>"'$r1'",
                "video2"=>"'".$_FILES['video2']['name']."'",
                "img2"=>"'".$_FILES['img2']['name']."'",
                "opciones2"=>"'$opciones2'",
                "r2"=>"'$r2'",
                "video3"=>"'".$_FILES['video3']['name']."'",
                "img3"=>"'".$_FILES['img3']['name']."'",
                "opciones3"=>"'$opciones3'",
                "r3"=>"'$r3'",
                "video4"=>"'".$_FILES['video4']['name']."'",
                "img4"=>"'".$_FILES['img4']['name']."'",
                "opciones4"=>"'$opciones4'",
                "r4"=>"'$r4'",
				);
}
if($tipo==2){
    $valores=array("codtemas"=>"'$codtemas'",
                "tipo"=>"'$tipo'",
				"bimestre"=>"'$bimestre'",
                "enunciado"=>"'$enunciado'",
                "pregunta1"=>"'$pregunta1'",
                "opciones1"=>"'$opciones1_2'",
                "r1"=>"'$r1_2'",
                "pregunta2"=>"'$pregunta2'",
                "opciones2"=>"'$opciones2_2'",
                "r2"=>"'$r2_2'",
                "pregunta3"=>"'$pregunta3'",
                "opciones3"=>"'$opciones3_2'",
                "r3"=>"'$r3_2'",
                "pregunta4"=>"'$pregunta4'",
                "opciones4"=>"'$opciones4_2'",
                "r4"=>"'$r4_2'",);    
                
}
if($tipo==3){
    $valores=array("codtemas"=>"'$codtemas'",
                "tipo"=>"'$tipo'",
				"bimestre"=>"'$bimestre'",
                "enunciado"=>"'$enunciado'",
                "audio"=>"'".$_FILES['audio']['name']."'",
                "img1"=>"'".$_FILES['img1_3']['name']."'",
                "img2"=>"'".$_FILES['img2_3']['name']."'",
                "img3"=>"'".$_FILES['img3_3']['name']."'",
                "img4"=>"'".$_FILES['img4_3']['name']."'",
                "respuesta"=>"'$respuesta'",);    
                
}
/*echo "<pre>";
print_r($valores);
echo "</pre>";*/
				$practica->insertar($valores);
				$mensaje[]="LA PRACTICA SE GUARDO CORRECTAMENTE";



$titulo="Mensaje de Respuesta";
$folder="../../";
include_once '../../mensajeresultado.php';
endif;?>