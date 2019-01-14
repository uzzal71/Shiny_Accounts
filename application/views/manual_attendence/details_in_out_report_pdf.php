
<?php
require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;

$_POST['check_employee'] = $check_employee ;
$_POST['date'] = $date;
$_POST['employee_id'] = $employee_id;
$_POST['to_date'] = $to_date;
$_POST['check_date'] = $check_date;
$_POST['company_id'] = $company_id;
//$_POST['count_holiday_info'] = $count_holiday_info;


class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Courier','B',14);
        $this->SetFillColor(232, 202, 247);
        //$this->Cell(40,10,'Easy Flow');
         $this->Cell(30,10,'Easy Flow',1,0,'L');
        // Move to the right
        $this->Cell(60);
        // Title
        $this->Cell(20,0,'2RA Technology Limited',0,0,'C');
        // Arial bold 15
        $this->SetFont('Times','I',8);
        // Move to the right
        $this->Cell(40);

        $this->Cell(20,-10,'Print Date : '.date('Y-m-d h:i:s a'),0,0,'C');
        // Arial bold 15
        $this->SetFont('Arial','B',14);
        // Move to the right
        $this->Cell(80);
        $this->Ln(7);
        $this->SetFont('Courier','B',14);
        $this->Cell(90);
        $this->Cell(20,0,'Details In Out Report',0,0,'C');
        // Line break
        $this->Ln(5);
    }

    // Load data

    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

// Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach($header as $col)
            $this->Cell(5,7,$col,1);
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(5,6,$col,1);
            $this->Ln();
        }
    }

// Better table
    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(40, 35, 40, 45);
        // Header
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->Cell($w[4],6,$row[4],'LR');
            $this->Cell($w[5],6,number_format($row[5]),'LR',0,'R');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
// Colored table
    function FancyTable($header)
    {

        // Colors, line width and bold font
        $this->SetFillColor(232, 202, 247);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(20, 30, 30, 30 ,30,30);
        $this->Cell(25,5,'',1,0,'C',false);
        $this->Cell(35,5,'From : '.$_POST['date'],1,0,'L',false);
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(25,5,'',1,0,'C',false);
        $this->Cell(20,5,'',1,0,'C',false);
        $this->Cell(35,5,'To : '.$_POST['to_date'],1,0,'L',false);
        $this->Ln(5);
        $this->Cell(1);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
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
		//echo '<pre>';
		//print_r($employee_info);
		//exit();

$in_out =0;
$from_date = $_POST['date'];
		for($from_date; $from_date <= $to_date;  $from_date = date ("Y-m-d", strtotime("+1 day", strtotime($from_date))))
		{
			
			$i=0;
			for($i; $i<sizeof($employee_info); $i++)
			{
				//$status = "Entry";
				$employee_id=$employee_info[$i]['employee_id'];
				//echo $employee_id;exit();
                $CI =& get_instance();
                $CI->load->model('Manual_attendence_model');
				//echo $check_employee;exit;
                $company_id = $_POST['company_id'];
				$all_details_in_out_report=$CI->Manual_attendence_model->details_in_out_report($company_id,$employee_id,$from_date);
				//echo "<pre>";
				//print_r($all_details_in_out_report);
			



if($all_details_in_out_report){
 foreach($all_details_in_out_report as $each_details_in_out_report){
 	$in_out++;
 	if($in_out%2 ==0){
$status = "Exit";
 	}
 	else{
 		$status = "Entry";
 	}
	 	 
		$date_time = new DateTime($each_details_in_out_report->ctime);
		$date = $date_time->format('Y-m-d');
		$time = $date_time->format('H:i:s A');	


            $this->Cell(1);
            $this->Cell($w[0],6, $date,'LR',0,'C',$fill);
            $this->Cell($w[1],6,$each_details_in_out_report->employee_id,'LR',0,'C',$fill);
            $this->Cell($w[2],6,$each_details_in_out_report->employee_name,'LR',0,'C',$fill);
            $this->Cell($w[3],6,$time,'LR',0,'C',$fill);
            $this->Cell($w[4],6,'2RA','LR',0,'C',$fill);
            $this->Cell($w[5],6,$status,'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }
    }
    }

		}

		

//        $this->Cell(35,5,'Total Late',1,0,'L',false);
//        $this->Cell(10,5,':',1,0,'L',false);
//        $this->Cell(5,5,$totalLate,1,0,'C',false);$this->Ln();
//        $this->Cell(35,5,'Total Absent',1,0,'L',false);
//        $this->Cell(10,5,':',1,0,'L',false);
//        $this->Cell(5,5,$totalAbsent,1,0,'C',false);$this->Ln();
//        $this->Cell(35,5,'Total Leave',1,0,'L',false);
//        $this->Cell(10,5,':',1,0,'L',false);
//        $this->Cell(5,5,$totalLeave,1,0,'C',false);$this->Ln();
//        $this->Cell(35,5,'Holiday Duty',1,0,'L',false);
//        $this->Cell(10,5,':',1,0,'L',false);
//        $this->Cell(5,5,$holidayDuty,1,0,'C',false);$this->Ln();
//        $this->Cell(35,5,'Effeciency',1,0,'L',false);
//        $this->Cell(10,5,':',1,0,'L',false);
//        $this->Cell(5,5,'',1,0,'C',false);

    
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-12);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(335,10,'copyright @ 2RA Technology Limited',0,0,'C');
    }
}


$pdf = new PDF();
// Column headings
$header = array('Date','Employee ID','Employee Name','Time', 'Gate','In/Out');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',10);
$pdf->AddPage();
$pdf->FancyTable($header);
$pdf->Output();
?>
