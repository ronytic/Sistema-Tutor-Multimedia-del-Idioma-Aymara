<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nueva Pregunta";
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
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Paralelo","codparalelo","select",$par);?></td>
						<td colspan="1"><?php campos("Bimestre","bimestre","select",$bimestre);?></td>
					</tr>
					<tr>
						<td colspan="3"><?php campos("Pregunta","pregunta","text","",1,array("required"=>"required","size"=>100));?><br>
                        <?php campos("Pregunta Audio","preguntaaudio","file","",0,array("accept"=>"audio/*"));?>
                        </td>
					</tr>
                    <tr>
						<td><?php campos("Respuesta Nº 1","opcion1","text","",1,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Imágen 1","imagen1","file","",0,array());?>
                        </td>
                        <td><?php campos("Respuesta Nº 2","opcion2","text","",1,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Imágen 2","imagen2","file","",0,array());?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td><?php campos("Respuesta Nº 3","opcion3","text","",1,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Imágen 3","imagen3","file","",0,array());?>
                        </td>
                        <td><?php campos("Respuesta Nº 4","opcion4","text","",1,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Imágen 4","imagen4","file","",0,array());?>
                        </td>
                    </tr>
                    <tr>
                        
                        <td><?php campos("Respuesta Nº 5","opcion5","text","",1,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Imágen 5","imagen5","file","",0,array());?>
                        </td>
					</tr>
                    
                    <td colspan="1"><?php campos("Número de Respuesta Correcta","correcta","select",$ncorrecta);?></td>
					<tr><td><?php campos("Guardar","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>