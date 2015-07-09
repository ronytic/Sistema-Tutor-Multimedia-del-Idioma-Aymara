<?php
include_once("../../impresion/pdf.php");
$titulo="Notas";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

include_once("../../class/estudiante.php");
$estudiante=new estudiante;
$est=array_shift($estudiante->mostrar($id));
include_once("../../class/paralelo.php");
$paralelo=new paralelo;
$par=array_shift($paralelo->mostrar($id));

include_once("../../class/respuestas.php");
$respuestas=new respuestas;
$nota1=array_shift($respuestas->nota($id,1));
$nota2=array_shift($respuestas->nota($id,2));
$nota3=array_shift($respuestas->nota($id,3));
$nota4=array_shift($respuestas->nota($id,4));
$n1=round((float)$nota1['nota']*100);
$n2=round((float)$nota2['nota']*100);
$n3=round((float)$nota3['nota']*100);
$n4=round((float)$nota4['nota']*100);
$pdf=new PDF("P","mm",array(215.9,139.7));

$pdf->AddPage();
$pdf->Ln(5);
$pdf->CuadroCuerpoPersonalizado(100,"Nombre",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(50,"Paralelo",1,"C",1,"B");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(100,$est['nombres']." ".$est['paterno']." ".$est['materno'],0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(50,$par['nombre'],0,"C",1,"");
$pdf->Ln();

$pdf->Ln(5);
$pdf->CuadroCuerpoPersonalizado(50,"Bimestre",1,"C",1,"B");
$pdf->CuadroCuerpoPersonalizado(50,"Nota",1,"C",1,"B");

$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(50,"1º Bimestre",0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(50,$n1,0,"C",1,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(50,"2º Bimestre",0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(50,$n2,0,"C",1,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(50,"3º Bimestre",0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(50,$n3,0,"C",1,"");
$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(50,"4º Bimestre",0,"C",1,"");
$pdf->CuadroCuerpoPersonalizado(50,$n4,0,"C",1,"");
/*$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/
$pdf->Output();
?>