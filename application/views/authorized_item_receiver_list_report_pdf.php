<?php 

require('./fpdf/html_table.php');

$pdf=new PDF("L", "mm", "A4");
$pdf->AddPage();



$html = '<b>Division Name</b><br><b>Authorized Item Receiver List</b><br><br>';

$pdf->SetFont('Arial','',10);
$pdf->WriteHTML($html);



$html = '<table border="1"><tr><td width="180" height="30" bgcolor="#D0D0FF"><b>Name</b></td><td width="145" height="30" bgcolor="#D0D0FF"><b>Organization Name</b></td><td width="145" height="30" bgcolor="#D0D0FF"><b>Item Inventory Org.</b></td><td width="150" height="30" bgcolor="#D0D0FF"><b>Department</b></td><td width="130" height="30" bgcolor="#D0D0FF"><b>Designation</b></td><td width="100" height="30" bgcolor="#D0D0FF"><b>Mobile No</b></td><td width="220" height="30" bgcolor="#D0D0FF"><b>Email</b></td><td width="60" height="30" bgcolor="#D0D0FF"><b>Status</b></td></tr>';




$html = $html.'</table>';
//echo $html; exit();




$pdf->SetFont('Arial','',7);
$pdf->WriteHTML($html);
$pdf->Output();




?>