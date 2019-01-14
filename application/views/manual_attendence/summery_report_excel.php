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


//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);



$objPHPExcel->getActiveSheet()->setCellValue('A4', 'SL');
$objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('B4', 'ID');
$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
$objPHPExcel->getActiveSheet()->getStyle('B4:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D4', 'Name');
$objPHPExcel->getActiveSheet()->mergeCells('D4:E4');
$objPHPExcel->getActiveSheet()->getStyle('D4:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$objPHPExcel->getActiveSheet()->setCellValue('F4', 'Present');
$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('G4', 'Absent');
$objPHPExcel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H4', 'Leave');
$objPHPExcel->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('I4', 'Late');
$objPHPExcel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('J4', 'Early Out');
$objPHPExcel->getActiveSheet()->getStyle('J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('K4', 'Holiday Duty');
$objPHPExcel->getActiveSheet()->mergeCells('K4:L4');
$objPHPExcel->getActiveSheet()->getStyle('K4:L4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('M4', 'Working Hours');
$objPHPExcel->getActiveSheet()->mergeCells('M4:N4');
$objPHPExcel->getActiveSheet()->getStyle('M4:N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$total_duration=0;
$rowCount = 4;
$serial_no=0;

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
if($summery_report_info)
{
	$serial_no = 0;
	foreach($summery_report_info as $each_summery_report_info)
	{
		//echo "<pre>";
		//print_r($summery_report_info);
		//exit();
	 
	
	 $serial_no++;
	 $total_duration=$total_duration+ $each_summery_report_info->working_hour;
		
	$rowCount++;
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $serial_no);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $each_summery_report_info->employee_id);
	$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':C'.$rowCount);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $each_summery_report_info->employee_name);	
	$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':E'.$rowCount);
	$summery_present = $each_summery_report_info->present + $each_summery_report_info->late;
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $summery_present);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $each_summery_report_info->absent);	
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $each_summery_report_info->leave);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $each_summery_report_info->late);
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$rowCount, $each_summery_report_info->early_out);
	
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$rowCount, $each_summery_report_info->holiday_duty);
	$objPHPExcel->getActiveSheet()->mergeCells('K'.$rowCount.':L'.$rowCount);

	$each_working_hour = $each_summery_report_info->working_hour;
		$each_working_hour_second = floor($each_working_hour*60*60);
		$each_hours = floor($each_working_hour_second / 3600);
		$each_minutes = floor(($each_working_hour_second / 60) % 60);
		$each_seconds = $each_working_hour_second % 60;
$each_hours = sprintf("%02d", $each_hours);
$each_minutes = sprintf("%02d", $each_minutes);
$each_seconds = sprintf("%02d", $each_seconds);


	$objPHPExcel->getActiveSheet()->setCellValue('M'.$rowCount, $each_hours.':'.$each_minutes.':'.$each_seconds);
	$objPHPExcel->getActiveSheet()->mergeCells('M'.$rowCount.':N'.$rowCount);


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
$objPHPExcel->getActiveSheet()->getStyle('A4:N'.$rowCount)->applyFromArray($styleArray);

$total_working_day_row = $rowCount+2;
$total_holiday_row = $rowCount+3;

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
		$to_date ="-";
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

 $objPHPExcel->getActiveSheet()->setCellValue('A'.$total_working_day_row, 'Total Working Day');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_working_day_row, $total_working_day);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_holiday_row, 'Total Holiday');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_holiday_row, $total_holiday);
//$total_working_day; die();
$objPHPExcel->getActiveSheet()->getStyle('A'.$total_working_day_row.':C'.$total_holiday_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A'.$total_working_day_row.':B'.$total_holiday_row)->getFont()->setBold(true);

unset($styleArray);

$xlsName = 'Attendence Summery Report.xlsx';
//make first row bold
//$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$xlsName.'"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>