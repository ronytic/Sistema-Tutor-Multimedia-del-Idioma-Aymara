<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Notas";
$codparalelo=$_GET['codparalelo'];
if($codparalelo!="%"){
class PDF extends PPDF{
	function Cabecera(){
        global $par;
        //print_r($par);
        $this->ln();
        $this->CuadroCabecera(30,"Paralelo",50,$par['nombre']);
        $this->ln();
        $this->TituloCabecera(10,"");
        $this->TituloCabecera(50,"");
        for($i=1;$i<=4;$i++){
            $this->TituloCabecera(39,"$i Bimestre");
        }
        $this->TituloCabecera(20,"");
        $this->ln();
        
        $this->TituloCabecera(10,"N");
        $this->TituloCabecera(50,"Apellidos y Nombre");
        for($i=1;$i<=4;$i++){
            $this->TituloCabecera(13,"Prac.");
            $this->TituloCabecera(13,"Eva");
            $this->TituloCabecera(13,"Final");
        }
        
        $this->TituloCabecera(20,"Nota Final");
    }
}

include_once("../../class/estudiante.php");
$estudiante=new estudiante;
//

include_once("../../class/paralelo.php");
$paralelo=new paralelo;
$par=array_shift($paralelo->mostrar($codparalelo));

include_once("../../class/respuestas.php");
$respuestas=new respuestas;

include_once("../../class/respuestaspractica.php");
$respuestaspractica=new respuestaspractica;

$pdf=new PDF("L","mm","letter");

$pdf->AddPage();
$estu=($estudiante->mostrarTodo("codparalelo=".$codparalelo,"paterno,materno,nombres"));
$j=0;
foreach($estu as $est){$j++;

    $nota1=array_shift($respuestas->nota($est['codestudiante'],1));
    $nota2=array_shift($respuestas->nota($est['codestudiante'],2));
    $nota3=array_shift($respuestas->nota($est['codestudiante'],3));
    $nota4=array_shift($respuestas->nota($est['codestudiante'],4));
    
    $n1p=array_shift($respuestaspractica->nota($est['codestudiante'],1));
    $n2p=array_shift($respuestaspractica->nota($est['codestudiante'],2));
    $n3p=array_shift($respuestaspractica->nota($est['codestudiante'],3));
    $n4p=array_shift($respuestaspractica->nota($est['codestudiante'],4));
    $n1p=(int)$n1p['nota'];
    $n2p=(int)$n2p['nota'];
    $n3p=(int)$n3p['nota'];
    $n4p=(int)$n4p['nota'];
    
    $n1=round((float)$nota1['nota']*100);
    $n2=round((float)$nota2['nota']*100);
    $n3=round((float)$nota3['nota']*100);
    $n4=round((float)$nota4['nota']*100);
    
    $npt1=($n1p+$n1)/2;
    $npt2=($n2p+$n2)/2;
    $npt3=($n3p+$n3)/2;
    $npt4=($n4p+$n4)/2;
    
    $notafinal=number_format(($npt1+$npt2+$npt3+$npt3)/4,0);
    $pdf->CuadroCuerpoPersonalizado(10,$j,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(50,$est['nombres']." ".$est['paterno']." ".$est['materno'],0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$n1p,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$n1,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$npt1,0,"C",1,"");
    
    $pdf->CuadroCuerpoPersonalizado(13,$n2p,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$n2,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$npt2,0,"C",1,"");
    
    $pdf->CuadroCuerpoPersonalizado(13,$n3p,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$n3,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$npt3,0,"C",1,"");
    
    $pdf->CuadroCuerpoPersonalizado(13,$n4p,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$n4,0,"C",1,"");
    $pdf->CuadroCuerpoPersonalizado(13,$npt4,0,"C",1,"");
    
    $pdf->CuadroCuerpoPersonalizado(20,$notafinal,0,"C",1,"");
    
    $pdf->Ln();
}

$pdf->Output();
}
?>