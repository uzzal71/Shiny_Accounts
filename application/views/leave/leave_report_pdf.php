
<?php

require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;

$_POST['from_date'] = $from_date ;
$_POST['to_date'] = $to_date;
$_POST['employee_id'] = $employee_id;
$_POST['leave_report_info'] = $leave_report_info;
$_POST['count_employee_leave'] = $count_employee_leave;



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
        $this->Cell(27,0,'Leave Report',0,0,'C');
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
            $this->Cell(40,7,$col,1);
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }

// Better table
    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(10, 30, 30, 30 ,30,30,30);
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
            $this->Cell($w[4],6,$row[1],'LR');
            $this->Cell($w[5],6,number_format($row[3]),'LR',0,'R');
            $this->Ln();
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
        $w = array(10, 30, 30, 30 ,30,30,30);
        $this->Cell(5,5,'',1,0,'C',false);
        $this->Cell(35,5,'From : '.$_POST['from_date'],1,0,'L',false);
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(25,5,'',1,0,'C',false);
        $this->Cell(20,5,'',1,0,'C',false);
        $this->Cell(35,5,'To : '.$_POST['to_date'],1,0,'L',false);
        $this->Ln(5);
        $this->Cell(5);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        $totalHoliday = 0;
        $totalWeekendHoliday = 0;
        $totalGovtHoliday = 0;
        $maternity_leave = 0;
        $casual_leave =0;
        $medical_leave =0;
        $sl = 0;
        $leave_report_info = $_POST['leave_report_info'];
        if($leave_report_info){
        foreach($leave_report_info as $each_leave_report_info)
        {
            $sl++;

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
if($each_leave_report_info->half_full_day == "first_half"){
$half_full_day = "First Half";
}
if($each_leave_report_info->half_full_day == "second_half"){
$half_full_day = "Second Half";
}
if($each_leave_report_info->half_full_day == "full_day"){
$half_full_day = "Full Day";
}
 if($each_leave_report_info->approved_date != "0000-00-00 00:00:00")
	{
		$approved_date = $each_leave_report_info->approved_date;
	}
else
	{
		$approved_date="Not Approved";
	}

if($each_leave_report_info->approved_by)
	{
		$approved_by = $each_leave_report_info->approved_by;
	}
else
	{
		$approved_by = "Not Approved";
	}

            $this->Cell(5);
            $this->Cell($w[0],6,$sl,'LR',0,'C',$fill);
            $this->Cell($w[1],6,$each_leave_report_info->date_time_from,'LR',0,'C',$fill);
            $this->Cell($w[1],6,$each_leave_report_info->date_time_to,'LR',0,'C',$fill);
            $this->Cell($w[3],6,$leave_full_name,'LR',0,'C',$fill);
            $this->Cell($w[4],6,$half_full_day,'LR',0,'C',$fill);
            $this->Cell($w[5],6,$approved_date,'LR',0,'C',$fill);
            $this->Cell($w[5],6,$approved_by,'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }
    $this->Cell(5);
        $this->SetDrawColor(0,0,0);
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln(3);
		$count_employee_leave = $_POST['count_employee_leave'] ;
		if($count_employee_leave){
		$total_leave = $count_employee_leave->casual_leave + $count_employee_leave->medical_leave + $count_employee_leave->maternity_leave + $count_employee_leave->earn_leave;
		$this->SetDrawColor(255,255,255);
        $this->Cell(113);
        $this->Cell(50,5,'Total Leave',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$total_leave,1,0,'L',false);$this->Ln();
        $this->Cell(113);
        $this->Cell(50,5,'Total Casual Leave',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$count_employee_leave->casual_leave,1,0,'L',false);$this->Ln();
        $this->Cell(113);
        $this->Cell(50,5,'Total Medical Leave',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$count_employee_leave->medical_leave,1,0,'L',false);$this->Ln();
        $this->Cell(113);
        $this->Cell(50,5,'Total Earn Leave',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$count_employee_leave->earn_leave,1,0,'L',false);$this->Ln();
        $this->Cell(113);
        $this->Cell(50,5,'Total Maternity Leave',1,0,'R',false);
        $this->Cell(8,5,':',1,0,'L',false);
        $this->Cell(5,5,$count_employee_leave->maternity_leave,1,0,'L',false);$this->Ln();

		}
		else{
		$this->Cell(113);
        $this->Cell(10,5,'No Data Available',0,0,'L',false);
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
}

$pdf = new PDF();
// Column headings
$header = array('SL','Date From','Date To','Leave Name', 'Half/Full','Approved Date','Approved By');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',10);
$pdf->AddPage();
$pdf->FancyTable($header,$leave_report_info);
$pdf->Output();
?>
