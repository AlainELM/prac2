<?php 

include ("conexion/conexion.php");


$query=mysqli_query($conn, "SELECT * FROM registro");
$documento="reporte.xls";
header('Content-type: aplication\vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$documento);
header('Pragma: no-cache');
header('Expires: 0');

echo '<table >';
echo '<tr>';
echo '<th colspan=4> Reporte </th>';
echo '</tr>';
echo '<tr><th>ID </th><th>NOMBRE</th> <th>APELLIDOS </th><th>MATRICULA </th><th>EDAD</th></tr>';
while($row=mysqli_fetch_array($query)){
    echo '<tr>';
    echo '<td>'.$row['ID'].'</td>';
    echo '<td>'.$row['nombre'].'</td>';
    echo '<td>'.$row['apellidos'].'</td>';
    echo '<td>'.$row['matricula'].'</td>';
    echo '<td>'.$row['edad'].'</td>';
    echo '</tr>';

}
echo '</table>'

?>