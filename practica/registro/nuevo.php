<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nueva Pregunta";
$bimestre=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4");
$ncorrecta=array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
include_once("../../class/temas.php");
$temas=new temas;
$tem=todolista($temas->mostrarTodo("","nombre"),"codtemas","nombre","");

include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<style type="text/css">
.tipo1,.tipo2,.tipo3{display:none;}
</style>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $("#tipo").change(function(){
        var val=$(this).val();
        if(val==1){
            $(".tipo"+val).show();
            $(".tipo2,.tipo3").hide();
        }
        if(val==2){
            $(".tipo"+val).show();
            $(".tipo1,.tipo3").hide();
        }
        if(val==3){
            $(".tipo"+val).show();
            $(".tipo1,.tipo2").hide();
        }
    });
})
</script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido imagenfondo">
    	<div class="prefix_0 grid_11 alpha">
			<fieldset>
				<div class="titulo2"><?php echo $titulo?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                    <tr>
						<td colspan="2"><?php campos("Tema","codtemas","select",$tem);?></td>
						<!--<td colspan="1"><?php campos("Bimestre","bimestre","select",$bimestre);?></td>-->
					</tr>
                    <tr>
						<td colspan="3"><?php campos("Tipo de pregunta","tipo","select",array("1"=>"Enunciado, Video/Audio y Respuesta","2"=>"Traducir o Completar","3"=>"Seleccionar la Respuesta Correcta"));?></td>
					</tr>
					<tr>
						<td colspan="3"><?php campos("Enunciado","enunciado","text","",1,array("required"=>"required","size"=>100));?></td>
					</tr>
                    <tr class="tipo1 titulo2">
                        <td>Pregunta 1</td>
                        <td>Pregunta 2</td>
                        
                    </tr>
                    <tr class="tipo1">
						<td>
                        <?php campos("Video 1","video1","file","",0,array("accept"=>"video/*"));?>
                        <br>
                        <?php campos("Imágen 1","img1","file","",0,array("accept"=>"image/*"));?>
                        <br>
                        <?php campos("Opciones","opciones1","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r1","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                        <td><?php campos("Video 2","video2","file","",0,array("accept"=>"video/*"));?>
                        <br>
                        <?php campos("Imágen 2","img2","file","",0,array("accept"=>"image/*"));?>
                        <br>
                        <?php campos("Opciones","opciones2","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r2","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                        
                    </tr>
                    <tr class=" tipo1 titulo2">
                        <td>Pregunta 3</td>
                        <td>Pregunta 4</td>
                        
                    </tr>
                    <tr class="tipo1">
                        <td><?php campos("Video 3","video3","file","",0,array("accept"=>"video/*"));?>
                        <br>
                        <?php campos("Imágen 3","img3","file","",0,array("accept"=>"image/*"));?>
                        <br>
                        <?php campos("Opciones","opciones3","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r3","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                        <td><?php campos("Video 4","video4","file","",0,array("accept"=>"video/*"));?>
                        <br>
                        <?php campos("Imágen 4","img4","file","",0,array("accept"=>"image/*"));?>
                        <br>
                        <?php campos("Opciones","opciones4","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r4","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                    </tr>
                    
                    <?php //TIPO 2?>
                    <tr class="tipo2 titulo2">
                        <td>Pregunta 1</td>
                        <td>Pregunta 2</td>
                        
                    </tr>
                    <tr class="tipo2">
						<td>

                        <?php campos("Frase 1","pregunta1","text","_",0,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Opciones","opciones1_2","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r1_2","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                        <td><?php campos("Frase 2","pregunta2","text","_",0,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Opciones","opciones2_2","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r2_2","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                        
                    </tr>
                    <tr class=" tipo2 titulo2">
                        <td>Pregunta 3</td>
                        <td>Pregunta 4</td>
                        
                    </tr>
                    <tr class="tipo2">
                        <td><?php campos("Frase 3","pregunta3","text","_",0,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Opciones","opciones3_2","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r3_2","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                        <td><?php campos("Frase 4","pregunta4","text","_",0,array("required"=>"required","size"=>30));?>
                        <br>
                        <?php campos("Opciones","opciones4_2","text","_",1,array("required"=>"required","size"=>30));?>
                        <br>
                        Ej: Rojo,Azul,Verde
                        <br>
                        <?php campos("Posición de la Respuesta Correcta","r4_2","number","1",1,array("required"=>"required","size"=>30,"class"=>"der"));?>
                        <br>
                        </td>
                    </tr>
                    <tr class="tipo3 titulo2">
                        <td colspan="2">Pregunta en Audio</td>
                    </tr>
                    <tr class="tipo3">
                        <td colspan="2"><?php campos("Audio","audio","file","",0,array("accept"=>"audio/*"));?></td>
                        
                    </tr>
                    <tr class="tipo3 titulo2">
                        <td>Respuesta 1</td>
                        <td>Respuesta 2</td>
                    </tr>
                    <tr class="tipo3">
                        <td><?php campos("Imágen 1","img1_3","file","",0,array("accept"=>"image/*"));?></td>
                        <td><?php campos("Imágen 2","img2_3","file","",0,array("accept"=>"image/*"));?></td>
                    </tr>
                    <tr class="tipo3 titulo2">
                        <td>Respuesta 3</td>
                        <td>Respuesta 4</td>
                    </tr>
                    <tr class="tipo3">
                        <td><?php campos("Imágen 3","img3_3","file","",0,array("accept"=>"image/*"));?></td>
                        <td><?php campos("Imágen 4","img4_3","file","",0,array("accept"=>"image/*"));?></td>
                    </tr>
                    <tr class="tipo3 titulo2">
                        <td colspan="2">Respuesta Correcta<br><select name="respuesta"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>
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