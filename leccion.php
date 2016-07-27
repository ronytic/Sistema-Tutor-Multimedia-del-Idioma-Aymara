<?php
$d=$_GET['d'];

include_once("class/contenido.php");
$contenido=new contenido;
$cont=$contenido->mostrarTodo("codtemas=".$d);


include_once("class/temas.php");
$temas=new temas;
$tem=$temas->mostrarTodo("codtemas=".$d);
$tem=array_shift($tem);;
?>
<script>
    <?php if($tem['descripcion']!=""){?>
        $(".ninodefecto").slideUp("slow");
        $(".ninotexto").html("<?php echo $tem['descripcion']?>");
        $(".nino").slideDown("slow")
        
    <?php }else{?>
        $(".nino").slideUp("slow");
        $(".ninotexto").html("");
        $(".ninodefecto").slideDown("slow")
    <?php }?>
    <?php if($tem['video']!=""){?>
        $(".videoenlace").attr("rel","<?php echo $tem['video']?>");
        $(".video").slideDown("slow")
        
    <?php }else{?>
        $(".video").slideUp("slow");
        $(".videoenlace").attr("rel","");

    <?php }?>
</script>
<div class="titulo3"><?php echo $tem['nombre']?></div>
<?php if($tem['descripcion']!=""){?>
<?php /*?><fieldset>
<p><?php echo $tem['descripcion']?></p>
</fieldset>
<?php */?>
<?php
}
foreach($cont as $t){
    ?>
    <div style="display: inline; float: left;" class="cuadritos ">
        <a rel="<?php echo $t['codcontenido']?>" class="boton2" href="#" title="<?php echo $t['descripcion'];?>"><?php echo $t['nombre'];?></a>
    </div>
    <?php
}
?>
<div class="clear"></div>
<hr>
<div class="contenidounico"></div>