<?php
include_once("login/check.php");
$titulo="Inicio";
$_SESSION['idmenu']=0;
$_SESSION['subm']=0;
?>
<?php include_once("cabecerahtml.php"); ?>
<link href="css/default/default.css" type="text/css" rel="stylesheet" />
<link href="css/light/light.css" type="text/css" rel="stylesheet" />
<link href="css/nivo-slider.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    $(document).on("ready",function(){
        $(".bimestre").click(function(e) {
            var b=$(this).attr("rel");
            $.post("mostrar.php",{"b":b},function(data){
               $(".textoinicio").html(data);
            });
        });
        $(document).on("click",".leccion",function(e){
            e.preventDefault();
            var h=$(this).attr("href");
            $.post(h,function(data){
                
            $(".textoinicio").html(data);    
            });
        });
        //$(".bimestre:eq(0)").click();
        $(document).on("click",".tituloc",function(){
             var t=$(this).attr("rel");
             //alert(t);
             $(".contenidoc[rel="+t+"]").slideDown("slow");
        });
    })
</script>
<?php 

include_once("cabecera.php");?>
<div class="grid_3">
    <div class="contenido bimestre" rel="b1">
    	<div class="titulo">1º Bimestre</div>
        <img src="imagenes/bimestres/1.jpg" width="200"/>
    </div>
    <div class="contenido bimestre" rel="b2">
    	<div class="titulo">2º Bimestre</div>
        <img src="imagenes/bimestres/2.jpg" width="200"/>
    </div>
    <div class="contenido bimestre" rel="b3">
    	<div class="titulo">3º Bimestre</div>
        <img src="imagenes/bimestres/3.jpg" width="200"/>
    </div>
    <div class="contenido bimestre" rel="b4">
    	<div class="titulo">4º Bimestre</div>
        <img src="imagenes/bimestres/4.jpg" width="200"/>
    </div>
</div>
<div class="grid_6">
    <div class="contenido textoinicio">
    	
    </div>
</div>
<div class="grid_3">
    
</div>
<?php include_once("piepagina.php");?>