<?php
include_once("bd.php");
class estudiante extends bd{
	var $tabla="estudiante";
    function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,codestudiante as codusuarios");	
		return $this->getRecords("carnet='$Usuario' and paterno='$Password' and activo=1");
	}
}
?>