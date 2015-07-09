<?php
include_once("bd.php");
class respuestas extends bd{
	var $tabla="respuestas";
    
    function nota($codestudiante,$bimestre){
        $this->campos=array("*,avg(correcta) as nota ");
        return $this->getRecords("activo=1 and codestudiante=$codestudiante and bimestre=$bimestre","","",0,0,0);
    }
}
?>