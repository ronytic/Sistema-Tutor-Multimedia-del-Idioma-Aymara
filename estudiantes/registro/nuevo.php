<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Estudiante";
$bimestre=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4");

include_once("../../class/paralelo.php");
$paralelo=new paralelo;
$par=todolista($paralelo->mostrarTodo(),"codparalelo","nombre","");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombres","nombres","text","",1,array("required"=>"required","size"=>50));?></td>
					</tr>
                    <tr>
						<td><?php campos("Apellido Paterno","paterno","text","",1,array("required"=>"required","size"=>50));?></td>
					</tr>
                    <tr>
						<td><?php campos("Apellido Materno","materno","text","",1,array("required"=>"required","size"=>50));?></td>
					</tr>
                    <tr>
						<td><?php campos("Cédula de Identidad","carnet","text","",1,array("required"=>"required","size"=>50));?></td>
					</tr>
                    <tr>
						<td><?php campos("Paralelo","codparalelo","select",$par);?></td>
					</tr>
					<tr>
						<td><?php campos("Observaciones","observaciones","textarea","",1,array("rows"=>4,"cols"=>55));?></td>
					</tr>
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>