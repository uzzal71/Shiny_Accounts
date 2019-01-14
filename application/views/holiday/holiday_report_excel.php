<?php
$serial_no=0;
$weekend_holiday=0;
$govt_holiday=0;
$special_holiday=0;
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

$objPHPExcel->getActiveSheet()->setCellValue('B4', 'Date From');
$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D4', 'Date To');
$objPHPExcel->getActiveSheet()->mergeCells('D4:E4');
$objPHPExcel->getActiveSheet()->getStyle('D4:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$objPHPExcel->getActiveSheet()->setCellValue('F4', 'Day');
$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('G4', 'Description');
$objPHPExcel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H4', 'Type');
$objPHPExcel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

if($holiday_report_info)
{
	$rowCount = 4;

	foreach($holiday_report_info as $each_holiday_report_info)
	{ 
		$serial_no++;
		$date = $each_holiday_report_info->from_date;
		$day = date('l', strtotime($date));
        if($each_holiday_report_info->type == 'Weekend'){
        $type = 'Weekend';
    }
       if($each_holiday_report_info->type == 'Government Holiday'){
        $type = 'Govt.Holiday';
    }
        if($each_holiday_report_info->type == 'Special or Company Holiday'){
        $type = 'Company Holiday';
    }
		
	$rowCount++;
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $serial_no);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $each_holiday_report_info->from_date);
	$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':C'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $each_holiday_report_info->to_date);	
	$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':E'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $day);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $each_holiday_report_info->description);	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $type);


	}}

$objPHPExcel->getActiveSheet()->getStyle('A1:D2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A4:N4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle("A4:N4")->getFont()->setBold(true);
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
$objPHPExcel->getActiveSheet()->getStyle('A4:H'.$rowCount)->applyFromArray($styleArray);

$total_holiday_row = $rowCount+2;
$weekend_holiday_row = $rowCount+3;
$government_holiday_row = $rowCount+4;
$company_holiday_row = $rowCount+5;

if($count_holiday_info){
$weekend_holiday= $count_holiday_info->weekend_holiday;
$government_holiday= $count_holiday_info->government_holiday;
$company_holiday= $count_holiday_info->company_holiday;
}
else{
    $weekend_holiday= 0;
$government_holiday= 0;
$company_holiday= 0;
}
$total_holiday= $weekend_holiday + $government_holiday + $company_holiday;

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_holiday_row, 'Total Holiday');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_holiday_row, $total_holiday);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$weekend_holiday_row, 'Weekend Holiday');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$weekend_holiday_row, $weekend_holiday);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$government_holiday_row, 'Govt. Holiday');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$government_holiday_row, $government_holiday);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$company_holiday_row, 'Company Holiday');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$company_holiday_row, $company_holiday);

$objPHPExcel->getActiveSheet()->getStyle('A'.$total_holiday_row.':C'.$company_holiday_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A'.$total_holiday_row.':B'.$company_holiday_row)->getFont()->setBold(true);
unset($styleArray);
$xlsName = 'Holiday Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>