</head>
<body style="background-image:url(<?php echo $folder;?>imagenes/fondo<?php echo rand(2,8)?>.jpg);">
<div class="container_12" > 
	<div class="grid_12">
    	<div class="banner">
		<img src="<?php echo $folder;?>imagenes/cabecera<?php echo rand(2,5)?>.jpg" alt="" width="100%" height="200">
        </div>
	</div>
	<div class="clear"></div>
<?php 
if(!isset($menu)){
include($folder."menu.php");
}
?>