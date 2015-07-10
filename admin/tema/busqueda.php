<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/temas.php';
	extract($_POST);

	$temas=new temas;
	$tip=$temas->mostrarTodo("bimestre LIKE '$bimestre' and nombre LIKE '%$nombre%'","nombre,orden");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Introducción","bimestre"=>"Bimestre","orden"=>"Orden");
	listadoTabla($titulo,$tip,1,"modificar.php","eliminar.php","");
}
?>