<?php

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

$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Employee ID');
$objPHPExcel->getActiveSheet()->mergeCells('E1:F1');
$objPHPExcel->getActiveSheet()->setCellValue('G1',$employee_id);
$objPHPExcel->getActiveSheet()->mergeCells('G1:H1');


//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);



$objPHPExcel->getActiveSheet()->setCellValue('A4', 'SL');
$objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('B4', 'From Date');
$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D4', 'To Date');
$objPHPExcel->getActiveSheet()->mergeCells('D4:E4');
$objPHPExcel->getActiveSheet()->getStyle('D4:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$objPHPExcel->getActiveSheet()->setCellValue('F4', 'Leave Name');
$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('G4', 'Half/Full');
$objPHPExcel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H4', 'Approved Name');
$objPHPExcel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('I4', 'Approved By');
$objPHPExcel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$serial_no=0;
	$casual_leave=0;
	$earn_leave=0;
	$maternity_leave=0;
	$medical_leave=0;


 if($leave_report_info){
 	$rowCount = 4;

 foreach($leave_report_info as $each_leave_report_info){ 
 $serial_no++;
		
	$rowCount++;
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $serial_no);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount,$each_leave_report_info->date_time_from);
	$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':C'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $each_leave_report_info->date_time_from);	
	$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':E'.$rowCount);


if($each_leave_report_info->leave_types == "CL"){
	$leave_full_name = "Casual Leave";
}
if($each_leave_report_info->leave_types == "ML"){
	$leave_full_name = "Medical Leave";
}
if($each_leave_report_info->leave_types == "EL"){
	$leave_full_name = "Earn Leave";
}
if($each_leave_report_info->leave_types == "MatL"){
	$leave_full_name = "Maternity Leave";
}
if($each_leave_report_info->leave_types == "PatL"){
	$leave_full_name = "Paternity Leave";
}
if($each_leave_report_info->leave_types == "SCL"){
	$leave_full_name = "Company Leave";
}
	
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $leave_full_name);

	if($each_leave_report_info->half_full_day == "first_half"){
$half_full_day = "First Half";
}
if($each_leave_report_info->half_full_day == "second_half"){
$half_full_day = "Second Half";
}
if($each_leave_report_info->half_full_day == "full_day"){
$half_full_day = "Full Day";
}

	$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $half_full_day);	

	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $each_leave_report_info->approved_date);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $each_leave_report_info->approved_by);



	}}	

$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A4:I4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle("A4:I4")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A1:H2")->getFont()->setBold(true);


$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A4:I'.$rowCount)->applyFromArray($styleArray);

$total_leave_row = $rowCount+2;
$total_casual_leave_row = $rowCount+3;
$total_earn_leave_row = $rowCount+4;
$total_maternity_leave_row = $rowCount+5;
$total_medical_leave_row = $rowCount+6;

if($count_employee_leave){
$casual_leave = $count_employee_leave->casual_leave;
$earn_leave = $count_employee_leave->earn_leave;
$maternity_leave = $count_employee_leave->maternity_leave;
$medical_leave = $count_employee_leave->medical_leave;
}
$total_leave = $casual_leave + $earn_leave + $maternity_leave + $medical_leave;

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_leave_row, 'Total Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_leave_row, $total_leave);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_casual_leave_row, 'Total Casual Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_casual_leave_row, $casual_leave);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_earn_leave_row, 'Total Earn Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_earn_leave_row, $earn_leave);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_maternity_leave_row, 'Total Maternity Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_maternity_leave_row, $maternity_leave);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_medical_leave_row, 'Total Medical Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_medical_leave_row, $medical_leave);

$objPHPExcel->getActiveSheet()->getStyle('A'.$total_leave_row.':C'.$total_medical_leave_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A'.$total_leave_row.':B'.$total_medical_leave_row)->getFont()->setBold(true);



unset($styleArray);

$xlsName = 'Leave Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>