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
            var ver=$(this).hasClass("desabilitado");
            var b=$(this).attr("rel");
            if(!ver){
                $.post("mostrar.php",{"b":b},function(data){
                   $(".textoinicio").html(data);
                });
            }
        });
        $(document).on("click",".leccion",function(e){
            e.preventDefault();
            var h=$(this).attr("href");
            var at=$(this).attr("rel");
            if(at!="desabilitado"){
                $.post(h,function(data){
                
                    $(".practicaenlace").attr("href","practica/estudiante/"+h);
                    $(".textoinicio").html(data);    
                });
            }
        });
        $(".bimestre:eq(0)").click();
        $(document).on("click",".tituloc",function(){
             var t=$(this).attr("rel");
             //alert(t);
             $(".contenidoc[rel="+t+"]").slideDown("slow");
        });
        $(document).on("click",".boton2",function(e){
            e.preventDefault();
             var c=$(this).attr("rel");
             $.post("contenido.php",{"c":c},function(data){
               $(".contenidounico").html(data).slideDown("slow");
            });

        });
        $(document).on("click",".videoenlace",function(e){
            e.preventDefault();
             var dir=$(this).attr("rel");
             var cont='<center><video controls="controls" preload="" src="contenido/temas/'+dir+'" width="430"></video></center>'
             $(".contenidounico").html(cont).slideDown("slow");
        });
        $(document).on("click",".videosgeneral",function(e){
            e.preventDefault();
             var cont='';
             for(j=1;j<=6;j++){
                cont+='<center><video controls="controls" preload="" src="videosgeneral/'+j+'.mp4" width="430"></video></center>';
             }
             $(".textoinicio").html(cont).slideDown("slow");
        });
        
        $(document).on("click",".practicaenlace",function(e){
             e.preventDefault();
             var b=$(this).attr("href");
             if(b!="#"){
             $.post(""+b,{},function(data){
               $(".textoinicio").html(data);
            });
             }
        });
        $(document).on("click",".siguiente",function(e){
            e.preventDefault();
            var rel=parseInt($(this).attr("rel"));
            $(".cuadro"+rel).slideUp("slow",function(){
            $(".cuadro"+(rel+1)).slideDown();    
            });
            
        });
        $(document).on("click",".anterior",function(e){
            e.preventDefault();
            var rel=parseInt($(this).attr("rel"));
            $(".cuadro"+rel).slideUp("slow",function(){
            $(".cuadro"+(rel-1)).slideDown();    
            });
            
        });
        //$("#sonido").play();
        $(document).on("mouseover",".leccion,.anterior,.siguiente,.practicaenlace,.videoenlace,.boton2,.tituloc,.bimestre,.boton,.boton3",function(){
            audioElement.play();
        });
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'audio/high1.mp4');
        audioElement.setAttribute('autoplay', 'autoplay');
        //audioElement.load()

        $.get();

        audioElement.addEventListener("load", function() {
            audioElement.play();
        }, true);

        $('.play').click(function() {
            audioElement.play();
        });

        $('.pause').click(function() {
            audioElement.pause();
        });
    })
</script>

<?php 
$idusuario=$_SESSION['idusuario'];
$nivelusuario=$_SESSION['nivel'];

include_once("class/respuestas.php");
$respqwe=new respuestas;
$n1p=array_shift($respqwe->nota($idusuario,1));
$n2p=array_shift($respqwe->nota($idusuario,2));
$n3p=array_shift($respqwe->nota($idusuario,3));
$n4p=array_shift($respqwe->nota($idusuario,4));

$n1=round((float)$nota1['nota']*100);
$n2=round((float)$nota2['nota']*100);
$n3=round((float)$nota3['nota']*100);
$n4=round((float)$nota4['nota']*100);

include_once("cabecera.php");?>
<div class="grid_3">
    <div class="contenido bimestre" rel="b1">
    	<div class="titulo">1º Bimestre</div>
        <center>
        <img src="imagenes/bimestres/1.jpg" width="150" height="85"/>
        </center>
    </div>
    <div class="contenido bimestre <?php echo ($n1<51)?'desabilitado':'';?> " rel="b2">
    	<div class="titulo">2º Bimestre</div>
        <center>
        <img src="imagenes/bimestres/2.jpg" width="150" height="85"/>
        </center>
    </div>
    <div class="contenido bimestre <?php echo ($n2<51)?'desabilitado':'';?>" rel="b3">
    	<div class="titulo">3º Bimestre</div>
        <center>
        <img src="imagenes/bimestres/3.jpg" width="150" height="85"/>
        </center>
    </div>
    <div class="contenido bimestre <?php echo ($n3<51)?'desabilitado':'';?>" rel="b4">
    	<div class="titulo">4º Bimestre</div>
        <center>
        <img src="imagenes/bimestres/4.jpg" width="150" height="85"/>
        </center>
    </div>
</div>
<div class="grid_6">
    <div class="contenido textoinicio ">
    	
    </div>
</div>
<div class="grid_3">
    <div class="ninodefecto">
        <center>
        <img src="imagenes/animadas/tocando.png" width="135"/>
        </center>
    </div>
    <div class="nino">
        <div class="ninotextoarriba"></div>
        <div class="ninotexto">AYUDA</div>
        <img src="imagenes/animadas/nino.gif" width="220" height="250"/>
    </div>
    <div class="video">
        <a href="#" class="videoenlace" rel="">
        <img src="imagenes/cuadro/icono-video-produccion.png" width="220"/>
        </a>
    </div>
    <div class="contenido">
        <div class="titulo2">Práctica</div>
        
        <a href="#" class="practicaenlace" rel="desabilitado">
        <img src="imagenes/cuadro/practica.png" width="220"/>
        </a>
    </div><br />
    <div class="contenido">
        <div class="titulo">Usuario</div>
        <?php if($nivel){?>
		<?php if($nivel!=4){?>
        <span class="pequenol">Nombre:</span> <?php echo $us['nombre'];?> <br />
		<span class="pequenol">Usuario:</span> <?php echo $us['usuario'];?> <br />
		<span class="pequenol">Hora Acceso:</span> <?php echo $_SESSION['horasesion'];?> <br />
		<a href="<?php echo $folder?>usuarios/cambiarp.php?id=<?php echo $_SESSION['idusuario']?>" class="boton3">Cambiar Contraseña</a>
        <?php }?>
		<br /><br />
        <a href="<?php echo $folder ?>login/logout.php" class="boton3">Salir</a>
        <?php }else{
           ?>
           <marquee>UNIDAD EDUCATIVA DON BOSCO-EL PRADO</marquee>
           <?php 
        }?>
    </div>
</div>
<?php include_once("piepagina.php");?>