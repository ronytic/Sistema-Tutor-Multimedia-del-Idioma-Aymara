﻿<?php
include_once("../../impresion/pdf.php");
$titulo="Imprime";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/productotipo.php");
$productotipo=new productotipo;
$tip=array_shift($productotipo->mostrar($id));


$pdf=new PDF("P","mm","letter");

$pdf->AddPage();
mostrarI(array("Nombre"=>$tip['nombre'],
				"Descripción"=>$tip['descripcion'],
				
				
			));

/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>