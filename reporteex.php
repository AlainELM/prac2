<?php
include ("conexion/conexion.php");
use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};


$sql = "SELECT ID, nombre, apellidos, matricula, edad  FROM registro";
$resultado = mysqli_query($sql);

$excel = new Spreadsheet();
$hojaAC = $excel->getActivrSheet();
$hojaAC->setTitle("Reporte");

$hojaAC->setCellValue('A1', 'ID');
$hojaAC->setCellValue('B1', 'nombre');
$hojaAC->setCellValue('C1', 'apellidos');
$hojaAC->setCellValue('D1', 'matricula');
$hojaAC->setCellValue('E1', 'edad');


$fila=2;

while ($rows = $resultado->fetch_assoc()){

    $hojaAC->setCellValue('A1'. $fila, $rows['ID']);
    $hojaAC->setCellValue('B1'. $fila, $rows['nombre']);
    $hojaAC->setCellValue('C1'. $fila, $rows['apellidos']);
    $hojaAC->setCellValue('D1'. $fila, $rows['matricula']);
    $hojaAC->setCellValue('E1'. $fila, $rows['edad']);
    $fila++;

}

header ('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition; attachment;file="reporte.xlsx"');
header('Cache-Control:max-age=0');
$writer = IOFactory::createWriter($excel, 'Xlsx');
$whiter-save('php//output');
exit;




?>