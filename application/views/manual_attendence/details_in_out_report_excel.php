<?php

//include PHPExcel library
require_once './PHPExcel/Classes/PHPExcel.php';
require_once './PHPExcel/Classes/PHPExcel/IOFactory.php';

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

$_POST['check_employee'] = $check_employee ;
$_POST['from_date'] = $from_date;
$_POST['employee_id'] = $employee_id;
$_POST['to_date'] = $to_date;
$_POST['check_date'] = $check_date;
$_POST['company_id'] = $company_id;
$all_details_in_out_report=array();

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Date From');
//$objPHPExcel->getActiveSheet()->mergeCells('A1:B1');
$objPHPExcel->getActiveSheet()->setCellValue('C1',$from_date);
//$objPHPExcel->getActiveSheet()->mergeCells('C1:D1');

$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Date To');
//$objPHPExcel->getActiveSheet()->mergeCells('A2:B2');
$objPHPExcel->getActiveSheet()->setCellValue('C2',$to_date);
//$objPHPExcel->getActiveSheet()->mergeCells('C2:D2');

//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(false);
//$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn('A')->setWidth('20');
//$objPHPExcel->getActiveSheet()->getStyle('A2:A'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Date');
$objPHPExcel->getActiveSheet()->mergeCells('A4:A4');
$objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('B4', 'Employee ID');
$objPHPExcel->getActiveSheet()->mergeCells('B4:B4');
$objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('C4', 'Employee Name');
$objPHPExcel->getActiveSheet()->mergeCells('C4:C4');
$objPHPExcel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('D4', 'Time');
$objPHPExcel->getActiveSheet()->mergeCells('D4:D4');
$objPHPExcel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('E4', 'Gate');
$objPHPExcel->getActiveSheet()->mergeCells('E4:E4');
$objPHPExcel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->setCellValue('F4', 'In/Out');
$objPHPExcel->getActiveSheet()->mergeCells('F4:F4');
$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$rowCount =4;
  $sl = 0;
        $check_employee = $_POST['check_employee'];
		$date = $_POST['date'] ;
		$employee_ids = $_POST['employee_id'];
		$to_date = $_POST['to_date'];
		$check_date = $_POST['check_date'];
		if($check_employee == 1){
			$employee_ids = '';
		}
		if($employee_ids == 'select'){
			$employee_ids = '';
		};
        $CI =& get_instance();
        $CI->load->model('Attendence_model');
		$all_employees = $CI->Attendence_model->select_employee_info_by_employee_ids($employee_ids);
		//echo '<pre>';
		//print_r($all_employees);
		//exit();
		$employee_info = array();

		foreach($all_employees as $each_employee)
		{
			$each_employee_info = array();
			$each_employee_info['employee_id'] = "$each_employee->employee_id";
			
			array_push($employee_info,$each_employee_info);
			
		}
		// echo '<pre>';
		// print_r($employee_info);
		// exit();

$in_out =0;
$from_date = $_POST['from_date'];
		for($from_date; $from_date <= $to_date;  $from_date = date ("Y-m-d", strtotime("+1 day", strtotime($from_date))))
		{
			
			$i=0;
			for($i; $i<sizeof($employee_info); $i++)
			{

				//echo sizeof($employee_info);

				//print_r($employee_info);
				//$status = "Entry";
				$employee_id=$employee_info[$i]['employee_id'];
				//echo $employee_id;//exit();
                $CI =& get_instance();
                $CI->load->model('Manual_attendence_model');
				//echo $company_id; exit();


                $company_id = $_POST['company_id'];
				$all_details_in_out_report=$CI->Manual_attendence_model->details_in_out_report($company_id,$employee_id,$from_date);

			 // 	echo "<pre>";
				// print_r($all_details_in_out_report);
			 // exit();



if($all_details_in_out_report){
 foreach($all_details_in_out_report as $each_details_in_out_report){
 	$in_out++;
 	if($in_out % 2 ==0){
$status = "Exit";
 	}
 	else{
 		$status = "Entry";
 	}
	 	 $rowCount++;
		$date_time = new DateTime($each_details_in_out_report->ctime);
		$date = $date_time->format('Y-m-d');
		$time = $date_time->format('H:i:s A');	

		 
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $date);
		//$objPHPExcel->getActiveSheet()->mergeCells('A'.$rowCount.':A'.$rowCount);
		
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $each_details_in_out_report->employee_id);
		//$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowCount.':B'.$rowCount);
		
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $each_details_in_out_report->employee_name);	
		//$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':D'.$rowCount);
		
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $time);
		//$objPHPExcel->getActiveSheet()->mergeCells('D'.$rowCount.':D'.$rowCount);
		//$objPHPExcel->getActiveSheet()->mergeCells('E'.$rowCount.':E'.$rowCount);
		
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, '2RA');	
		//$objPHPExcel->getActiveSheet()->mergeCells('E'.$rowCount.':E'.$rowCount);
		
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $status);
		//$objPHPExcel->getActiveSheet()->mergeCells('F'.$rowCount.':F'.$rowCount);

		 	// 	echo "<pre>";
				// print_r($all_details_in_out_report);
				// exit();
		}


	}}
}

$objPHPExcel->getActiveSheet()->getStyle('A1:D2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle('A4:F4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CCE5FF');
$objPHPExcel->getActiveSheet()->getStyle("A4:F4")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("A1:B2")->getFont()->setBold(true);


$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A1:F4')->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle('A6:W8')->applyFromArray($styleArray);

$objPHPExcel->getActiveSheet()->getStyle('A4:F'.$rowCount)->applyFromArray($styleArray);

//print_r($styleArray); exit();
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