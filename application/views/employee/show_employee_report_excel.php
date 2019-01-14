<?php
//include PHPExcel library
require_once './PHPExcel/Classes/PHPExcel.php';
require_once './PHPExcel/Classes/PHPExcel/IOFactory.php';

$_POST['department_name'] = $department_name ;
$_POST['all_department'] = $all_department;
$_POST['employee_report_info'] = $employee_report_info;

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Employee Report');
$objPHPExcel->getActiveSheet()->mergeCells('D1:E1:F1');


// $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
// $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
// $objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->setCellValue('A3', 'SL#');
$objPHPExcel->getActiveSheet()->getStyle('A3:A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->setCellValue('B3', 'Employee ID');
$objPHPExcel->getActiveSheet()->mergeCells('B3:C3');
$objPHPExcel->getActiveSheet()->mergeCells('B3:C3');
$objPHPExcel->getActiveSheet()->getStyle('B3:B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('C3', 'Employee Name');
// $objPHPExcel->getActiveSheet()->mergeCells('C3:D3');
// $objPHPExcel->getActiveSheet()->mergeCells('C3:D4');
$objPHPExcel->getActiveSheet()->getStyle('C3:C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('C3:C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Card No');
//$objPHPExcel->getActiveSheet()->mergeCells('D3:D4');
$objPHPExcel->getActiveSheet()->getStyle('D3:D3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('E3', 'Department');
$objPHPExcel->getActiveSheet()->mergeCells('E3:E4');
$objPHPExcel->getActiveSheet()->getStyle('F3:E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->setCellValue('F3', 'Designation');
$objPHPExcel->getActiveSheet()->mergeCells('F3:F4');
$objPHPExcel->getActiveSheet()->getStyle('F3:F4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


// $objPHPExcel->getActiveSheet()->setCellValue('F6', 'Status');
// $objPHPExcel->getActiveSheet()->mergeCells('F6:F8');
// $objPHPExcel->getActiveSheet()->getStyle('F6:F8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
// $objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// $objPHPExcel->getActiveSheet()->setCellValue('G6', 'Holiday Type');
// $objPHPExcel->getActiveSheet()->mergeCells('G6:G8');
// $objPHPExcel->getActiveSheet()->getStyle('G6:G8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
// $objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// $objPHPExcel->getActiveSheet()->setCellValue('H6', 'Remarks');
// $objPHPExcel->getActiveSheet()->mergeCells('H6:H8');
// $objPHPExcel->getActiveSheet()->getStyle('H6:H8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
// $objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$rowCount = 3;


$employee_report_info = $_POST['employee_report_info'];
		if($employee_report_info){
            $sl=0;
foreach($employee_report_info as $each_employee_report)
{
   
	$sl++;

$employee_id = $each_employee_report->employee_id;
$employee_name = $each_employee_report->first_name.' '.$each_employee_report->last_name;
$card_id = $each_employee_report->card_id;
$department = $each_employee_report->department;
$designation = $each_employee_report->designation;
        
	$rowCount++;


	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $sl);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $employee_id);
	$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':B'.$rowCount);
	

	$objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $employee_name);
	$objPHPExcel->getActiveSheet()->mergeCells('C'.$rowCount.':C'.$rowCount);

	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $card_id);
	$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':D'.$rowCount);


	$objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $department);
	$objPHPExcel->getActiveSheet()->mergeCells('E'.$rowCount.':E'.$rowCount);


	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $designation);
	$objPHPExcel->getActiveSheet()->mergeCells('F'.$rowCount.':F'.$rowCount);
}	
}

$objPHPExcel->getActiveSheet()->getStyle('A3:F3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');

$objPHPExcel->getActiveSheet()->getStyle("A3:F3")->getFont()->setBold(true);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:F2')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A3:F3'.$rowCount)->applyFromArray($styleArray);



 

// $objPHPExcel->getActiveSheet()->getStyle('A'.$total_working_day_row.':C'.$total_duty_in_leave_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
// $objPHPExcel->getActiveSheet()->getStyle('A'.$total_working_day_row.':B'.$total_duty_in_leave_row)->getFont()->setBold(true);
// unset($styleArray);

$xlsName = 'Employee_Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>