<?php
include_once("../../login/check.php");
$titulo="Búsqueda de Evaluación";
$folder="../../";
$bimestre=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4");

include_once("../../class/paralelo.php");
$paralelo=new paralelo;
$par=todolista($paralelo->mostrarTodo(),"codparalelo","nombre","");

include_once("../../class/estudiante.php");
$estudiante=new estudiante;
$est=array_shift($estudiante->mostrar($_SESSION['idusuario']));


$par=array_shift($paralelo->mostrar($est['codparalelo']));
print_r($par);
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
                    <tr  class="resaltar">
                        <td>
                        Datos: <?php echo $est['nombres']?> <?php echo $est['paterno']?> <?php echo $est['materno']?>
                        </td>
                        <td>
                        Paralelo: <?php echo $par['nombre']?>
                        </td>
                    </tr>
                    <tr>
                        
                        <td><?php campos("Bimestre","bimestre","select",$bimestre);?></td>
                        
                       
                        <td><?php campos("Realizar Evaluación","enviar","submit","",0,array("size"=>15));?></td>
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
