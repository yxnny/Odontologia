<?php

$row = $result->fetch_object();
require('fpdf/fpdf.php');

class PDF extends FPDF{
    // Cabecera de página
    function Header(){
    

        $this->SetFont('Times','B',12);
        $this->Image('Vista/imagenes/logo.png',12,0,33);

        $this-> SetXY(150,8);
        $this->Cell(23,4, utf8_decode('Cita N.'), 0,0,'L',0);
        $this->Ln(5);

        $this-> SetXY(150,13);
        $this->Cell(23,4, utf8_decode('Fecha Cita:'), 0,0,'L',0);
        $this->Ln(5);

        $this-> SetXY(150,18);
        $this->Cell(23,4, utf8_decode('Hora:'), 0,0,'L',0);
        $this->Ln(5);

        $this->setXY(75,8);
        $this->Cell(60,8, utf8_decode('Clinica Odontologica Federico'), 0,0,'C',0);
        $this->Ln(5);

        $this->SetFont('Helvetica', 'B', 10);

        $this->setXY(75,17);
        $this->Cell(60,5, utf8_decode('Calle 33 5A 50 PICALEÑA'), 0,0,'C',0);
        $this->Ln(5);

        $this->setXY(75,23);
        $this->Cell(60,4, utf8_decode('NIT: 890.23.-1'), 0,0,'C',0);

        $this->Ln(7); /// SALTO DE LINEAS

        /// TITULO
        $this->setXY(75,32);
        $this->Cell(60,5, utf8_decode('Informe Cita'), 0,0,'C',0);
        // // ///Datos del PACIENTE
        
        $this->Ln(10);
        $this->Cell(190,5,utf8_decode('Datos Generales del Paciente '), 1,0,'C',0);
        $this->Ln(10);
    
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(22,8,utf8_decode('Documento:'), 0,0 ,'L',0); /// tamo celda, grosor, codio para simbolos,motrar linea,saldo,centrar,relleno
        
        
        $this-> SetXY(80,52);
        $this->Cell(20,8,utf8_decode('Nombres:'), 0,0 ,'L',0);
        
        
        $this-> SetXY(140,52);
        $this->Cell(20,8,utf8_decode('Apellidos:'), 0,0 ,'L',0);
        $this->Ln(13);
        
        $this-> SetX(10);
        $this->Cell(35,8,utf8_decode('Fecha Nacimiento:'), 0,0 ,'L',0);
        
        $this-> SetXY(80,65);
        $this->Cell(14,8,utf8_decode('Sexo:'), 0,0 ,'L',0);
        $this->Ln(13);
        
        $this-> SetX(10);
        ///Datos del MEDICO
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(190,5,utf8_decode('Datos del Medico '), 1,0,'C',0);
        $this->Ln(10);

        $this-> SetX(10);
        $this->Cell(22,8,utf8_decode('Documento:'), 0,0 ,'L',0);
        $this->Ln(10);

        $this-> SetXY(80,88); /// cordenadas, x lados, y bajo arriba
        $this->Cell(20,8,utf8_decode('Nombres:'), 0,0 ,'L',0);
        
        $this-> SetXY(140,88);
        $this->Cell(20,8,utf8_decode('Apellidos:'), 0,0 ,'L',0);
        $this->Ln(13);
        
        $this-> SetX(10);
        $this->Cell(25,8,utf8_decode('Especialidad:'), 0,0 ,'L',0);
        
        $this-> SetXY(80,101);
        $this->Cell(27,8,utf8_decode('N.Consultorio:'), 0,0 ,'L',0);
        
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

    // Creación del objeto de la clase heredada
    $pdf = new PDF(); /// Instancia de la clase
    $pdf->AliasNbPages(); 
    $pdf->AddPage(); ///añade una pagina en blanco
    $pdf->SetMargins(10,10,10); ///Margienes a la pagina
    $pdf->SetAutoPageBreak(true,20);/// salto de pagina atuomatico

    /// trea tados
        $pdf->SetFont('Helvetica', '', 10);
        //Paciente
        $pdf->Ln(10);
        
        $pdf->SetXY (32,52);
        $pdf->Cell(22,8, $row->PacIdentificacion, 0,0 ,'L',0); /// tamaño celda, grosor, codigo para palabras como Ñ, // celda, saldo,centrar,fondo
        $pdf->SetXY (100,52);
        $pdf->Cell(22,8, $row->PacNombres, 0,0 ,'L',0);
        $pdf->SetXY (160,52);
        $pdf->Cell(22,8, $row->PacApellidos, 0,0 ,'L',0);
        $pdf->Ln(10);
        $pdf->SetXY (45,65);
        $pdf->Cell(22,8, $row->PacFechaNacimiento, 0,0 ,'L',0);
        $pdf->SetXY (94,65);
        $pdf->Cell(22,8, $row->PacSexo, 0,1 ,'L',0);
        
        $pdf->Ln(10);
        ///Medico
        $pdf->SetXY (32,88);
        $pdf->Cell(22,8, $row->MedIdentificacion, 0,1 ,'L',0);
        $pdf->SetXY (100,88);
        $pdf->Cell(22,8, $row->MedNombres, 0,1 ,'L',0);
        $pdf->SetXY (160,88);
        $pdf->Cell(22,8, $row->MedApellidos, 0,1 ,'L',0);
        $pdf->Ln(10);
        $pdf->SetXY (35,101);
        $pdf->Cell(22,8, $row->MedEspecialidad, 0,1 ,'L',0);
        $pdf->SetXY (107,101);
        $pdf->Cell(22,8, $row->ConNumero, 0,1 ,'L',0);

        /// Cita
        $pdf-> SetXY(173,8);
        $pdf->Cell(22,4, $row->CitNumero, 0,0,'L',0);
        $pdf-> SetXY(173,13);
        $pdf->Cell(22,4, $row->CitFecha, 0,0 ,'L',0);
        $pdf-> SetXY(173,18);
        $pdf->Cell(22,4, $row->CitHora, 0,0 ,'L',0);

    $pdf->Output();
?>
