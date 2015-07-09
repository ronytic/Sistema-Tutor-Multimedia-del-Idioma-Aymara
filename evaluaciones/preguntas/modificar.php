<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Tema";
$id=$_GET['id'];
include_once '../../class/preguntas.php';
$preguntas=new preguntas;
$pre=array_shift($preguntas->mostrar($id));
$bimestre=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4");
$ncorrecta=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
include_once("../../class/paralelo.php");
$paralelo=new paralelo;
$par=todolista($paralelo->mostrarTodo(),"codparalelo","nombre","");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_0 grid_11 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					 <tr>
						<td colspan="2"><?php campos("Paralelo","codparalelo","select",$par,0,"",$pre['codparalelo']);?></td>
						<td colspan="1"><?php campos("Bimestre","bimestre","select",$bimestre,0,"",$pre['bimestre']);?></td>
					</tr>
					<tr>
						<td colspan="3"><?php campos("Pregunta","pregunta","text",$pre['pregunta'],1,array("required"=>"required","size"=>100));?></td>
					</tr>
                    <tr>
						<td><?php campos("Respuesta Nº 1","opcion1","text",$pre['opcion1'],1,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Respuesta Nº 2","opcion2","text",$pre['opcion2'],1,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Respuesta Nº 3","opcion3","text",$pre['opcion3'],1,array("required"=>"required","size"=>30));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Respuesta Nº 4","opcion4","text",$pre['opcion4'],1,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Respuesta Nº 5","opcion5","text",$pre['opcion5'],1,array("required"=>"required","size"=>30));?></td>
					</tr>
                    
                    <td colspan="1"><?php campos("Número de Respuesta Correcta","correcta","select",$ncorrecta,0,"",$pre['correcta']);?></td>
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>