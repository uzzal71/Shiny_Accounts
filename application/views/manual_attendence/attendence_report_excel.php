<?php
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

$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Employee ID');
$objPHPExcel->getActiveSheet()->mergeCells('A3:B3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', $employee_id);
$objPHPExcel->getActiveSheet()->mergeCells('C3:D3');

$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Employee Name');
$objPHPExcel->getActiveSheet()->mergeCells('A4:B4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', $employee_name);
$objPHPExcel->getActiveSheet()->mergeCells('C4:D4');



//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Date');
$objPHPExcel->getActiveSheet()->mergeCells('A6:A8');
$objPHPExcel->getActiveSheet()->getStyle('A6:A8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$objPHPExcel->getActiveSheet()->setCellValue('B6', 'Day');
$objPHPExcel->getActiveSheet()->mergeCells('B6:B8');
$objPHPExcel->getActiveSheet()->getStyle('B6:B8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('C6', 'In Time');
$objPHPExcel->getActiveSheet()->mergeCells('C6:C8');
$objPHPExcel->getActiveSheet()->getStyle('C6:C8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Out Time');
$objPHPExcel->getActiveSheet()->mergeCells('D6:D8');
$objPHPExcel->getActiveSheet()->getStyle('D6:D8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Duration');
$objPHPExcel->getActiveSheet()->mergeCells('E6:E8');
$objPHPExcel->getActiveSheet()->getStyle('E6:E8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('F6', 'Status');
$objPHPExcel->getActiveSheet()->mergeCells('F6:F8');
$objPHPExcel->getActiveSheet()->getStyle('F6:F8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Holiday Type');
$objPHPExcel->getActiveSheet()->mergeCells('G6:G8');
$objPHPExcel->getActiveSheet()->getStyle('G6:G8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('H6', 'Remarks');
$objPHPExcel->getActiveSheet()->mergeCells('H6:H8');
$objPHPExcel->getActiveSheet()->getStyle('H6:H8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$rowCount = 8;


if($attendence_report_info){
			//echo '<pre>';
		//print_r($attendence_report_info);
		//exit();
foreach($attendence_report_info as $each_attendence_report_info)
{
if($each_attendence_report_info->status=='P')
		{
			$present++;
		}
		if($each_attendence_report_info->status=='A')
		{
			$absent++;
		}			
		if($each_attendence_report_info->status=='L')
		{
			$late++;
		}	  
		if($each_attendence_report_info->status=="SL" || $each_attendence_report_info->status=="CL" || $each_attendence_report_info->status=="ML" || $each_attendence_report_info->status=="EL" ||
			 $each_attendence_report_info->status=="SCL" || $each_attendence_report_info->status=="MatL" || $each_attendence_report_info->status=="MatL")
		{
			$leave++;
		}	 
 
	 
		if($each_attendence_report_info->in_time !='0000-00-00 00:00:00' &&  $each_attendence_report_info->status == 'H')
		{
			$holiday_duty++;
		}	

		if($each_attendence_report_info->holiday_name != null)
		{
			$holiday++;
		}
	 	
		if($each_attendence_report_info->status=="SL" || $each_attendence_report_info->status=="CL" || $each_attendence_report_info->status=="ML" || $each_attendence_report_info->status=="EL" ||
			 $each_attendence_report_info->status=="SCL" || $each_attendence_report_info->status=="MatL" || $each_attendence_report_info->status=="MatL" && $each_attendence_report_info->in_time !='0000-00-00 00:00:00')
		{
			$duty_in_leave++;
		}	
	 
		if($each_attendence_report_info->duration)
		{

			$total_duration = $total_duration + $each_attendence_report_info->duration;
			
			//echo $total_duration_hms;exit();
		}
		$date = $each_attendence_report_info->date;

		$date_in_time = new DateTime($each_attendence_report_info->in_time);
		$in_time = $date_in_time->format('H:i:s');		
		if($in_time)
		{
			$in_time = $in_time;
		}
		else
		{
			$in_time="00:00:00";
		}
		
		$date_out_time = new DateTime($each_attendence_report_info->out_time);
		$out_time = $date_out_time->format('H:i:s');
		if($out_time)
		{
			$out_time=$out_time;
		}
		else
		{
			$out_time="00:00:00";
		}
				
		if($each_attendence_report_info->duration)
		{
			$duration=$each_attendence_report_info->duration;
		}
		else
		{
			$duration="-";
		}
		
		if($each_attendence_report_info->status)
		{
			$status=$each_attendence_report_info->status;
		}
		else
		{
			$status="-";
		}
		
		
		if($each_attendence_report_info->holiday_name)
		{
			$holiday_type=$each_attendence_report_info->holiday_name;
		}
		else
		{
			$holiday_type="-";
		}
		if($each_attendence_report_info->remarks)
		{
			$remarks=$each_attendence_report_info->remarks;
		}
		else
		{
			$remarks="-";
		}
	$rowCount++;
		 
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $each_attendence_report_info->date);

	$date = $each_attendence_report_info->date;
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, date('l', strtotime($date)));

	$objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $in_time);	
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $out_time);

	$duration = floor($duration*60*60);
	$each_hours = floor($duration / 3600);
	$each_minutes = floor(($duration / 60) % 60);
	$each_seconds = $duration % 60;

	$objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $each_hours.':'.$each_minutes.':'.$each_seconds);


	$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $status);	
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $holiday_type);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $remarks);
}	
}

$objPHPExcel->getActiveSheet()->getStyle('A6:H8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');

$objPHPExcel->getActiveSheet()->getStyle("A1:H8")->getFont()->setBold(true);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:E5')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('A6:H'.$rowCount)->applyFromArray($styleArray);


$total_working_day_row = $rowCount+2;
$total_holiday_row = $rowCount+3;

$total_present_row = $rowCount+4;
$total_late_row = $rowCount+5;
$total_absent_row = $rowCount+6;
$total_leave_row = $rowCount+7;

$total_holiday_duty_row = $rowCount+8;
$total_duty_in_leave_row = $rowCount+9;

$total_working_day = $present + $absent + $late + $leave;
$total_present = $present + $late + $duty_in_leave + $holiday_duty;

 $objPHPExcel->getActiveSheet()->setCellValue('A'.$total_working_day_row, 'Total Working Day');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_working_day_row, $total_working_day);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_holiday_row, 'Total Holiday');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_holiday_row, $holiday);

 $objPHPExcel->getActiveSheet()->setCellValue('A'.$total_present_row, 'Total Present');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_present_row, $total_present);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_late_row, 'Total Late');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_late_row, $late);

 $objPHPExcel->getActiveSheet()->setCellValue('A'.$total_absent_row, 'Total Absent');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_absent_row, $absent);

$objPHPExcel->getActiveSheet()->setCellValue('A'.$total_leave_row, 'Total Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_leave_row, $leave);

 $objPHPExcel->getActiveSheet()->setCellValue('A'.$total_holiday_duty_row, 'Total Holiday Duty');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_holiday_duty_row, $holiday_duty);


 $objPHPExcel->getActiveSheet()->setCellValue('A'.$total_duty_in_leave_row, 'Total Duty In Leave');
$objPHPExcel->getActiveSheet()->setCellValue('C'.$total_duty_in_leave_row, $duty_in_leave);

$objPHPExcel->getActiveSheet()->getStyle('A'.$total_working_day_row.':C'.$total_duty_in_leave_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A'.$total_working_day_row.':B'.$total_duty_in_leave_row)->getFont()->setBold(true);
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