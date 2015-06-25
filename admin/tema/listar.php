<?php
include_once("../../login/check.php");
$titulo="Listado de Temas";
$folder="../../";
$bimestre=array("%"=>"Todos","1"=>"1","2"=>"2","3"=>"3","4"=>"4");

$dest=array("Procesado"=>"Procesado","Directo"=>"Directo");
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo?> - Criterio de Búsqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Bimestre","bimestre","select",$bimestre,1,array("required"=>"required"),"%");?></td>
                        <td><?php campos("Nombre","nombre","text","",1,array("size"=>15));?></td>
                        
                       
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>