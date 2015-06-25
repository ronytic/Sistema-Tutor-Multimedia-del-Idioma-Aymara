<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Producto";
$id=$_GET['id'];
include_once '../../class/contenido.php';
$contenido=new contenido;
$cont=array_shift($contenido->mostrar($id));

include_once("../../class/temas.php");
$temas=new temas;
$tem=todolista($temas->mostrarTodo(),"codtemas","nombre","");
/*include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$prov=todolista($proveedor->mostrarTodo(),"codproveedor","nombre","");*/

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
                    <tr>
						<td><?php campos("Tema","codtemas","select",$tem,"","",$cont['codtemas']);?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombre","nombre","text",$cont['nombre'],1,array("required"=>"required","size"=>50));?></td>
					</tr>
                    <tr>
						<td><?php campos("Descripción","descripcion","textarea",$cont['descripcion'],1,array("rows"=>4,"cols"=>55));?></td>
					</tr>

                    <tr>
						<td><?php campos("Imágen","imagen","file");?>
                        <br>
                        <?php
							if($cont['imagen']!=""){
							?><a href="../../contenido/imagen/<?php echo $cont['imagen']?>" target="_blank"><img src="../../contenido/imagen/<?php echo $cont['imagen']?>" width="150"></a><?php	
							}
						?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Audio","audio","file");?>
                        <br>
                        <?php
							if($cont['audio']!=""){
                                
							?><audio src="../../contenido/audio/<?php echo $cont['audio']?>" controls></audio><?php
                            }
						?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Video","video","file");?>
                        <br>
                        <?php
							if($cont['video']!=""){
                                
							?><video src="../../contenido/video/<?php echo $cont['video']?>" controls></video><?php
                            }
						?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Orden","orden","text",$cont['orden']);?></td>
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