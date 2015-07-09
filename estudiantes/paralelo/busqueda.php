<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/paralelo.php';
	extract($_POST);

	$paralelo=new paralelo;
	$tip=$paralelo->mostrarTodo("nombre LIKE '%$nombre%'","nombre");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción");
	listadoTabla($titulo,$tip,1,"modificar.php","eliminar.php","");
}
?>