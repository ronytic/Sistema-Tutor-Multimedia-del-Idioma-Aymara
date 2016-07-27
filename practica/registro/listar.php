<?php
include_once("../../login/check.php");
$titulo="Listado de Preguntas de la Práctica";
$folder="../../";
$bimestre=array("%"=>"Todos","1"=>"1","2"=>"2","3"=>"3","4"=>"4");

include_once("../../class/temas.php");
$temas=new temas;
$tem=todolista($temas->mostrarTodo("","nombre"),"codtemas","nombre","");

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
                        <td width="250"><?php campos("Tema","codtemas","select",$tem);?></td>
                        
                        
                       
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
