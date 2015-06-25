<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Tema";
$id=$_GET['id'];
include_once '../../class/temas.php';
$temas=new temas;
$tem=array_shift($temas->mostrar($id));
$bimestre=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4");
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_4 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td><?php campos("Bimestre","bimestre","select",$bimestre,1,array("required"=>"required"),$tem['bimestre']);?></td>
					</tr>
					<tr>
						<td><?php campos("Nombre","nombre","text",$tem['nombre'],1,array("required"=>"required"));?></td>
					</tr>
					<tr>
						<td><?php campos("Descripción","descripcion","text",$tem['descripcion']);?></td>
					</tr>
                   <tr>
						<td><?php campos("Imágen","imagen","file");?>
                        <br>
                        <?php
							if($tem['imagen']!=""){
							?><a href="../../imagenes/temas/<?php echo $tem['imagen']?>" target="_blank"><img src="../../imagenes/temas/<?php echo $tem['imagen']?>" width="150"></a><?php	
							}
						?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Orden","orden","text",$tem['orden']);?></td>
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