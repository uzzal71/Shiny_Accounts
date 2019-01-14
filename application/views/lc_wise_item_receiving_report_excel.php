<?php
session_start();
include('db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql="select * from user_login where user_id='$user_id' and `password`='$password'";

$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}

$date_from = '';
$date_to = '';
$lc_no = '';


if(isset($_POST['date_from']))
{
	$date_from	= trim($_POST['date_from']);
	if($date_from != "")
	{
		$date_from = implode('-', array_reverse(explode('/', $date_from)));
	}
}

if(isset($_POST['date_to']))
{
	$date_to	= trim($_POST['date_to']);
	if($date_to != "")
	{
		$date_to = implode('-', array_reverse(explode('/', $date_to)));
	}
}

if(isset($_POST['lc_no']))
{
	$lc_no	= trim($_POST['lc_no']);
}

//echo $date_from." --- ".$date_to;




$division_full_name = "&nbsp;";

$search_query = "SELECT * FROM division_info ";
$result = mysql_query($search_query) or die(mysql_error());
while( $row = mysql_fetch_array($result) )
{
	$division_full_name = $row["division_full_name"];
}




//include PHPExcel library
require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);



$objPHPExcel->getActiveSheet()->setCellValue('A1', $division_full_name);
$objPHPExcel->getActiveSheet()->mergeCells('A1:E1');

$objPHPExcel->getActiveSheet()->setCellValue('A2', 'LC Wise Item Receiving Report');
$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');

$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Date From');
$objPHPExcel->getActiveSheet()->setCellValue('B3', ':');
$objPHPExcel->getActiveSheet()->setCellValue('C3', implode('-', array_reverse(explode('-', $date_from))));
$objPHPExcel->getActiveSheet()->mergeCells('C3:E3');

$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Date To');
$objPHPExcel->getActiveSheet()->setCellValue('B4', ':');
$objPHPExcel->getActiveSheet()->setCellValue('C4', implode('-', array_reverse(explode('-', $date_to))));
$objPHPExcel->getActiveSheet()->mergeCells('C4:E4');

$objPHPExcel->getActiveSheet()->setCellValue('A5', 'LC No');
$objPHPExcel->getActiveSheet()->setCellValue('B5', ':');
$objPHPExcel->getActiveSheet()->setCellValue('C5', $lc_no);
$objPHPExcel->getActiveSheet()->mergeCells('C5:E5');


//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);



$objPHPExcel->getActiveSheet()->setCellValue('A6', 'SL');
$objPHPExcel->getActiveSheet()->mergeCells('A6:A8');
$objPHPExcel->getActiveSheet()->getStyle('A6:A8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->setCellValue('B6', 'DATE');
$objPHPExcel->getActiveSheet()->mergeCells('B6:B8');
$objPHPExcel->getActiveSheet()->getStyle('B6:B8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('C6', 'RECEVING TYPE');
$objPHPExcel->getActiveSheet()->mergeCells('C6:C8');
$objPHPExcel->getActiveSheet()->getStyle('C6:C8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D6', 'SUPPLIER/SOURCE');
$objPHPExcel->getActiveSheet()->mergeCells('D6:D8');
$objPHPExcel->getActiveSheet()->getStyle('D6:D8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('E6', 'REQUISITION NO');
$objPHPExcel->getActiveSheet()->mergeCells('E6:E8');
$objPHPExcel->getActiveSheet()->getStyle('E6:E8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('F6', 'PO NO');
$objPHPExcel->getActiveSheet()->mergeCells('F6:F8');
$objPHPExcel->getActiveSheet()->getStyle('F6:F8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('G6', 'LC NO');
$objPHPExcel->getActiveSheet()->mergeCells('G6:G8');
$objPHPExcel->getActiveSheet()->getStyle('G6:G8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H6', 'INVOICE NO');
$objPHPExcel->getActiveSheet()->mergeCells('H6:H8');
$objPHPExcel->getActiveSheet()->getStyle('H6:H8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('I6', 'DC NO');
$objPHPExcel->getActiveSheet()->mergeCells('I6:I8');
$objPHPExcel->getActiveSheet()->getStyle('I6:I8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('J6', 'MRR NO');
$objPHPExcel->getActiveSheet()->mergeCells('J6:J8');
$objPHPExcel->getActiveSheet()->getStyle('J6:J8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('J6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('K6', 'QC NO');
$objPHPExcel->getActiveSheet()->mergeCells('K6:K8');
$objPHPExcel->getActiveSheet()->getStyle('K6:K8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('K6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('L6', 'LOT NO');
$objPHPExcel->getActiveSheet()->mergeCells('L6:L8');
$objPHPExcel->getActiveSheet()->getStyle('L6:L8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('M6', 'ITEM NAME');
$objPHPExcel->getActiveSheet()->mergeCells('M6:M8');
$objPHPExcel->getActiveSheet()->getStyle('M6:M8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('M6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('N6', 'QUANTITY');
$objPHPExcel->getActiveSheet()->mergeCells('N6:N8');
$objPHPExcel->getActiveSheet()->getStyle('N6:N8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('N6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('O6', 'UNIT PRICE');
$objPHPExcel->getActiveSheet()->mergeCells('O6:O8');
$objPHPExcel->getActiveSheet()->getStyle('O6:O8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('O6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('P6', 'TOTAL PRICE');
$objPHPExcel->getActiveSheet()->mergeCells('P6:P8');
$objPHPExcel->getActiveSheet()->getStyle('P6:P8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('P6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);




$sl = 0;
$rowCount = 8;

$grand_total_price = 0;



$search_query = "SELECT * FROM item_receiving WHERE 1=1 ";


if($date_from != '') {
	$search_query = $search_query." AND date_of_receipt >= '$date_from' ";	
}
if($date_to != '') {
	$search_query = $search_query." AND date_of_receipt <= '$date_to' ";	
}
if($lc_no != '') {
	$search_query = $search_query." AND lc_no = '$lc_no' ";	
}

$search_query = $search_query." ORDER BY date_of_receipt, item_name, lc_no ";

//echo $search_query; exit();
$result = mysql_query($search_query) or die(mysql_error());


$sl = 0;

while( $row = mysql_fetch_array($result) )
{
	
	$sl++;
	
	
	$date_of_receipt = "";
	$receiving_type = "";
	$supplier_or_source_name = "";
	$requisition_no = "";
	$po_or_reference_note = "";
	$lc_no = "";
	$invoice_no = "";
	$delivery_challan_no = "";
	$mrr_no = "";
	$qc_no = "";
	$lot_no = "";
	$item_name = "";
	$quantity = "";
	$unit_price = "";
	$total_price = "";
	
	if(isset($row["date_of_receipt"]) && $row["date_of_receipt"] != '') {
		$date_of_receipt = $row["date_of_receipt"];	
	}
	if(isset($row["receiving_type"]) && $row["receiving_type"] != '')	{
		$receiving_type = $row["receiving_type"];
	}
	if(isset($row["supplier_or_source_name"]) && $row["supplier_or_source_name"] != '') {
		$supplier_or_source_name = $row["supplier_or_source_name"];	
	}
	if(isset($row["requisition_no"]) && $row["requisition_no"] != '') {
		$requisition_no = $row["requisition_no"];
	}
	if(isset($row["po_or_reference_note"]) && $row["po_or_reference_note"] != '') {
		$po_or_reference_note = $row["po_or_reference_note"];	
	}
	if(isset($row["lc_no"]) && $row["lc_no"] != '') {
		$lc_no = $row["lc_no"];	
	}
	if(isset($row["invoice_no"]) && $row["invoice_no"] != '')	{
		$invoice_no = $row["invoice_no"];	
	}
	if(isset($row["delivery_challan_no"]) && $row["delivery_challan_no"] != '') {
		$delivery_challan_no = $row["delivery_challan_no"];	
	}
	if(isset($row["mrr_no"]) && $row["mrr_no"] != '') {
		$mrr_no = $row["mrr_no"];
	}
	if(isset($row["qc_no"]) && $row["qc_no"] != '') {
		$qc_no = $row["qc_no"];
	}
	if(isset($row["lot_no"]) && $row["lot_no"] != '') {
		$lot_no = $row["lot_no"];
	}
	if(isset($row["item_name"]) && $row["item_name"] != '') {
		$item_name = $row["item_name"];	
	}
	if(isset($row["quantity"]) && $row["quantity"] != '') {
		$quantity = $row["quantity"];
	}
	if(isset($row["unit_price"]) && $row["unit_price"] != '') {
		$unit_price = $row["unit_price"];	
	}
	if(isset($row["quantity"]) && $row["quantity"] != '' && isset($row["unit_price"]) && $row["unit_price"] != '') {
		$total_price = $quantity * $unit_price;
		
		$grand_total_price = $grand_total_price + $total_price;
	}
	
	
	
	$quantity = $quantity!=0?round($quantity, 2):$quantity;
	$unit_price = $unit_price!=0?round($unit_price, 2):$unit_price;
	$total_price = $total_price!=0?round($total_price, 2):$total_price;
	
	
	
	$sl++;
	$rowCount++;
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $sl);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $date_of_receipt);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $receiving_type);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $supplier_or_source_name);	
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $requisition_no);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $po_or_reference_note);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $lc_no);	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $invoice_no);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $mrr_no);
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$rowCount, $qc_no);	
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$rowCount, $delivery_challan_no);
	$objPHPExcel->getActiveSheet()->setCellValue('L'.$rowCount, $lot_no);
	$objPHPExcel->getActiveSheet()->setCellValue('M'.$rowCount, $item_name);
	$objPHPExcel->getActiveSheet()->setCellValue('N'.$rowCount, $quantity);
	$objPHPExcel->getActiveSheet()->setCellValue('O'.$rowCount, $unit_price);
	$objPHPExcel->getActiveSheet()->setCellValue('P'.$rowCount, $total_price);

	
}




$rowCount++;
		 
$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, 'Total');
$objPHPExcel->getActiveSheet()->mergeCells("A".$rowCount.":O".$rowCount);

$objPHPExcel->getActiveSheet()->setCellValue('P'.$rowCount, $grand_total_price);





$objPHPExcel->getActiveSheet()->getStyle('A6:P8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');

$objPHPExcel->getActiveSheet()->getStyle("A1:P8")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A".$rowCount.":P".$rowCount)->getFont()->setBold(true);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:E5')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A6:P'.$rowCount)->applyFromArray($styleArray);

unset($styleArray);





$xlsName = 'LC_Wise_Item_Receiving_Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');


?>