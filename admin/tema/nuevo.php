<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Nuevo Tema";
$bimestre=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4");
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
						<td><?php campos("Bimestre","bimestre","select",$bimestre,1,array("required"=>"required"));?></td>
					</tr>
					<tr>
						<td><?php campos("Nombre","nombre","text","",1,array("required"=>"required","size"=>50));?></td>
					</tr>
					<tr>
						<td><?php campos("Introducción","descripcion","textarea","",1,array("rows"=>4,"cols"=>55));?></td>
					</tr>
                    <tr>
						<td><?php campos("Imágen","imagen","file");?></td>
					</tr>
                    <tr>
						<td><?php campos("Video","video","file");?></td>
					</tr>
                    <tr>
						<td><?php campos("Orden","orden","text");?></td>
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