<?php

require('fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Factura', 0, 1, 'C');
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Detalle de la Factura', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Producto', 1);
$pdf->Cell(50, 10, 'Precio', 1, 1);

$productos = [
    ['nombre' => 'Producto 1', 'precio' => '100'],
    ['nombre' => 'Producto 2', 'precio' => '150']
];

foreach ($productos as $producto) {
    $pdf->Cell(50, 10, $producto['nombre'], 1);
    $pdf->Cell(50, 10, '$' . $producto['precio'], 1, 1);
}

$pdf->Output();
