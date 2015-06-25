<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/contenido.php';
	extract($_POST);
	$codtemas=$codtemas?"codtemas='$codtemas'":"codtemas LIKE '%'";
	$contenido=new contenido;
	$prod=$contenido->mostrarTodo("nombre LIKE '%$nombre%' and $codtemas");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción","orden"=>"Orden");
	listadoTabla($titulo,$prod,1,"modificar.php","eliminar.php","");
}
?>