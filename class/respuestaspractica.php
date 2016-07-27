<?php
include_once("bd.php");
class respuestaspractica extends bd{
	var $tabla="respuestaspractica";
    
    function nota($codestudiante,$bimestre){
        $this->campos=array("*,avg(pcorrectas) as nota ");
        return $this->getRecords("activo=1 and codestudiante=$codestudiante and bimestre=$bimestre","","",0,0,0);
    }
}
?>