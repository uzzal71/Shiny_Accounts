
<?php

require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;

$_POST['from_date'] = $from_date ;
$_POST['to_date'] = $to_date;
$_POST['holiday_count_between_date'] = $holiday_count_between_date;
$_POST['summery_report_info'] = $summery_report_info;


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
        $this->Cell(80);
        $this->Cell(38,0,'Attendance Summery Report',0,0,'C');
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
            $this->SetLineWidth();
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
// Colored table
    function FancyTable($header, $data)
    {

        // Colors, line width and bold font
        $this->SetFillColor(232, 202, 247);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(10, 20, 36, 15, 15, 15, 20, 20,20,25);

        $this->Cell(35,5,'From : '.$_POST['from_date'],1,0,'L',false);
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(35,5,'',1,0,'C',false);
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
$summery_report_info = $_POST['summery_report_info'];
		if($summery_report_info){
foreach($summery_report_info as $each_summery_report_info)
{
	//echo "<pre>";
	//print_r($summery_report_info);
	//exit();
		
	 $sl++;
	 $total_duration=$total_duration+ $each_summery_report_info->working_hour;

	

            $this->Cell(1);
            
            $this->Cell($w[0],6,$sl,'LR',0,'C',$fill);

            $this->Cell($w[1],6,$each_summery_report_info->employee_id,'LR',0,'C',$fill);

            $this->Cell($w[2],6,$each_summery_report_info->employee_name,'LR',0,'C',$fill);

            $summery_present = $each_summery_report_info->present + $each_summery_report_info->late;

            $this->Cell($w[3],6,$summery_present,'LR',0,'C',$fill);

            $this->Cell($w[4],6,$each_summery_report_info->absent,'LR',0,'C',$fill);

            $this->Cell($w[5],6,$each_summery_report_info->leave,'LR',0,'C',$fill);

            $this->Cell($w[6],6,$each_summery_report_info->late,'LR',0,'C',$fill);
            $this->Cell($w[7],6,$each_summery_report_info->early_out,'LR',0,'C',$fill);
            $this->Cell($w[8],6,$each_summery_report_info->holiday_duty,'LR',0,'C',$fill);
            $each_working_hour = $each_summery_report_info->working_hour;
		$each_working_hour_second = floor($each_working_hour*60*60);
		$each_hours = floor($each_working_hour_second / 3600);
		$each_minutes = floor(($each_working_hour_second / 60) % 60);
		$each_seconds = $each_working_hour_second % 60;
$each_hours = sprintf("%02d", $each_hours);
$each_minutes = sprintf("%02d", $each_minutes);
$each_seconds = sprintf("%02d", $each_seconds);
$this->Cell($w[9],6,$each_hours.":".$each_minutes.":".$each_seconds,'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }

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
$holiday_count_between_date = $_POST['holiday_count_between_date'];

if($holiday_count_between_date)
 {
	$total_holiday = $holiday_count_between_date->no_of_holiday;
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
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
        $this->SetDrawColor(255,255,255);
        $this->Cell(100);
        $this->Cell(50,5,'Total Working Day',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$total_working_day,1,0,'L',false);$this->Ln();
        $this->Cell(100);
        $this->Cell(50,5,'Total Holiday',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$total_holiday,1,0,'L',false);$this->Ln();
		}

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
$header = array('SL','ID','Name','Present', 'Absent', 'Leave','Late','Early Out','Holiday Duty','Working Hour');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',10);
$pdf->AddPage();
$pdf->FancyTable($header,$summery_report_info);
$pdf->Output();
?>
