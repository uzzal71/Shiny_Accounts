<?php
$present = 0;
$absent = 0;
$leave = 0;
$holiday = 0;
$total_holiday = 0;
$late = 0;
$holiday_duty = 0;
$duty_in_leave = 0;
$total_duration = 0;
$total_working_day = 0;
$serial_no = 0;
if($holiday_count_between_date)
 {
	$total_holiday = $holiday_count_between_date->no_of_holiday;
	$date1=date_create($from_date);
	if($to_date != null)
	{
		$date2=date_create($to_date);
		$diff=date_diff($date1,$date2);
		$total_working_day = $diff->format('%d') - $total_holiday +1;
	}
	else
	{	
		$to_date ="&nbsp;";
		if($total_holiday == 0)
		{
			$total_working_day = 1;
		}
		else
		{
			$total_working_day = 0;
		}
	}
 }
 
 
$present=0;
$absent=0;
$leave=0;
$holiday=0;
$late=0;
$holiday_duty=0;
$duty_in_leave=0;
$total_duration=0;
$total_working_day=0;
$total_holiday=0;
$total_present=0;
$total_late=0;
$total_absent=0;
$total_leave=0;
$holiday_duty=0;
$duty_in_leave=0;
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

$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Total Working Day');
$objPHPExcel->getActiveSheet()->mergeCells('A3:B3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', $total_working_day);
$objPHPExcel->getActiveSheet()->mergeCells('C3:D3');

$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Holiday');
$objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', $total_holiday);
$objPHPExcel->getActiveSheet()->mergeCells('C4:D4');


//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);



$objPHPExcel->getActiveSheet()->setCellValue('A6', 'SL');
$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('B6', 'ID');
$objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
$objPHPExcel->getActiveSheet()->getStyle('B6:C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Name');
$objPHPExcel->getActiveSheet()->mergeCells('D6:E6');
$objPHPExcel->getActiveSheet()->getStyle('D6:E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('F6', 'Working Hour');
$objPHPExcel->getActiveSheet()->mergeCells('F6:G6');
$objPHPExcel->getActiveSheet()->getStyle('F6:G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H6', 'Present');
$objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('I6', 'Late');
$objPHPExcel->getActiveSheet()->getStyle('I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('J6', 'Early Out');
$objPHPExcel->getActiveSheet()->getStyle('J6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('K6', 'Leave');
$objPHPExcel->getActiveSheet()->getStyle('K6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('L6', 'Absent');
$objPHPExcel->getActiveSheet()->getStyle('L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('M6', 'Holiday Duty');
$objPHPExcel->getActiveSheet()->mergeCells('M6:N6');
$objPHPExcel->getActiveSheet()->getStyle('M6:N6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$total_duration=0;
$rowCount = 6;
$serial_no=0;


if($summery_report_info)
{

	foreach($summery_report_info as $each_summery_report_info)
	{
		$serial_no++;
		$total_duration=$total_duration+ $each_summery_report_info->working_hour;
		
	$rowCount++;
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $serial_no);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $each_summery_report_info->employee_id);
	$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':C'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $each_summery_report_info->employee_name);	
	$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':E'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $each_summery_report_info->working_hour);
	$objPHPExcel->getActiveSheet()->mergeCells('F'.$rowCount.':G'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $each_summery_report_info->present);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $each_summery_report_info->late);	
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$rowCount, $each_summery_report_info->early_out);
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$rowCount, $each_summery_report_info->leave);
	$objPHPExcel->getActiveSheet()->setCellValue('L'.$rowCount, $each_summery_report_info->absent);
	
	$objPHPExcel->getActiveSheet()->setCellValue('M'.$rowCount, $each_summery_report_info->holiday_duty);
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$rowCount.':N'.$rowCount);

	}}	

$objPHPExcel->getActiveSheet()->getStyle('A1:D4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A6:N6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle("A6:N6")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A1:B4")->getFont()->setBold(true);


$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:E5')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A6:N'.$rowCount)->applyFromArray($styleArray);

unset($styleArray);

$xlsName = 'Attendence Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>