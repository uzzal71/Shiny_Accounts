<?php

$serial_no=0;
$casual_leave=0;
$earn_leave=0;
$maternity_leave=0;
$medical_leave=0;

//include PHPExcel library
require_once './PHPExcel/Classes/PHPExcel.php';
require_once './PHPExcel/Classes/PHPExcel/IOFactory.php';

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Date From');
$objPHPExcel->getActiveSheet()->mergeCells('A1:B1');
$objPHPExcel->getActiveSheet()->setCellValue('C1',$from_date);
$objPHPExcel->getActiveSheet()->mergeCells('C1:D1');

$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Date To');
$objPHPExcel->getActiveSheet()->mergeCells('A2:B2');
$objPHPExcel->getActiveSheet()->setCellValue('C2',$to_date);
$objPHPExcel->getActiveSheet()->mergeCells('C2:D2');


//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);



$objPHPExcel->getActiveSheet()->setCellValue('A4', 'SL');
$objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('B4', 'ID');
$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D4', 'Casual Leave');
$objPHPExcel->getActiveSheet()->mergeCells('D4:E4');
$objPHPExcel->getActiveSheet()->getStyle('D4:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$objPHPExcel->getActiveSheet()->setCellValue('F4', 'Medical Leave');
$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('G4', 'Maternity Leave');
$objPHPExcel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H4', 'Earn Leave');
$objPHPExcel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('I4', 'Total Leave');
$objPHPExcel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

if($leave_summery_report_info){
	$rowCount =4;
		foreach($leave_summery_report_info as $each_leave_summery_report){
		$rowCount++;
		$serial_no++;
		if($each_leave_summery_report->casual_leave)
		{
			$casual_leave= $each_leave_summery_report->casual_leave;
		}
		else{
			$casual_leave = 0;
		}		
		
		if($each_leave_summery_report->earn_leave)
		{
			$earn_leave = $each_leave_summery_report->earn_leave;
		}
		else{
			$earn_leave = 0;
		}
		
		if($each_leave_summery_report->maternity_leave)
		{
			$maternity_leave = $each_leave_summery_report->maternity_leave;
		}
		else{
			$maternity_leave = 0;
		}
		
		if($each_leave_summery_report->medical_leave)
		{
			$medical_leave = $each_leave_summery_report->medical_leave;
		}
		else{
			$medical_leave = 0;
		}
		$total_leave = $casual_leave + $earn_leave + $maternity_leave + $medical_leave;
		
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $serial_no);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $each_leave_summery_report->employee_id);
	$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':C'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $casual_leave);	
	$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':E'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $medical_leave);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $maternity_leave);	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $earn_leave);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $total_leave);


	}}	

$objPHPExcel->getActiveSheet()->getStyle('A1:D2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A4:I4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle("A4:I4")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A1:B2")->getFont()->setBold(true);


$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:D2')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A4:I'.$rowCount)->applyFromArray($styleArray);

unset($styleArray);

$xlsName = 'Leave Summery Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>