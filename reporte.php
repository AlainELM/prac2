<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{
    
    function Header(){
        $this->SetFont('Times New Roman','B',16);

        $this->Cell(60);

        $this->Cell(70,10,'Reporte',0,0,'C');


        $this->Ln(20);

        $this->Cell('Nombre',1,0,'C',0);
        $this->Cell('Apellido',1,0,'C',0);
        $this->Cell('Matricula',1,0,'C',0);
        $this->Cell('Edad',1,0,'C',0);

    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('pagina').$this->PageNo().'/{nb}',0,0,'C');

    }
    
}    

    require("conexion.php");

    $consulta = "SELECT * FROM registro";
    $resultado = mysqli_query($conn,$consulta);

    $fpdf = new PDF();
    $fpdf->AliasNbPages();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',10);

    while($row=$resultado->fetch_assoc()){
        $fpdf->Cell('Nombre',1,0,'C',0);
        $fpdf->Cell('Apellido',1,0,'C',0);
        $fpdf->Cell('Matricula',1,0,'C',0);
        $fpdf->Cell('Edad',1,0,'C',0);



    }

    $fpdf->Output();
?>