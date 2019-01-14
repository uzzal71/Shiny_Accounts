
<?php
require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;

$_POST['from_date'] = $from_date;
$_POST['to_date'] = $to_date;
$_POST['leave_summery_report_info'] = $leave_summery_report_info;


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
        $this->Cell(20,0,'Leave Summery Report',0,0,'C');
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
            $this->Cell($w[6],6,number_format($row[6]),'LR',0,'R');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
// Colored table
    function FancyTable($header,$data)
    {

        // Colors, line width and bold font
        $this->SetFillColor(232, 202, 247);
        $this->SetDrawColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(20, 30, 30, 30 ,30,30,30);
        $this->Cell(25,5,'',1,0,'C',false);
        $this->Cell(35,5,'From : '.$_POST['from_date'],1,0,'L',false);
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
        $leave_summery_report_info = $_POST['leave_summery_report_info'];



if($leave_summery_report_info){
	$serial_no = 0;
 foreach($leave_summery_report_info as $each_leave_summery_report){


		$serial_no++;
		if($each_leave_summery_report->casual_leave)
		{
			$casual_leave= $each_leave_summery_report->casual_leave;
		}
		else{
			$casual_leave = 0;
		}		
		
		if($each_leave_summery_report->earn_leave)
		{
			$earn_leave = $each_leave_summery_report->earn_leave;
		}
		else{
			$earn_leave = 0;
		}
		
		if($each_leave_summery_report->maternity_leave)
		{
			$maternity_leave = $each_leave_summery_report->maternity_leave;
		}
		else{
			$maternity_leave = 0;
		}
		
		if($each_leave_summery_report->medical_leave)
		{
			$medical_leave = $each_leave_summery_report->medical_leave;
		}
		else{
			$medical_leave = 0;
		}
		$total_leave = $casual_leave + $earn_leave + $maternity_leave + $medical_leave;


            $this->Cell(1);
            $this->Cell($w[0],6, $serial_no,'LR',0,'C',$fill);
            $this->Cell($w[1],6,$each_leave_summery_report->employee_id,'LR',0,'C',$fill);
            $this->Cell($w[2],6,$casual_leave,'LR',0,'C',$fill);
            $this->Cell($w[3],6,$medical_leave,'LR',0,'C',$fill);
            $this->Cell($w[4],6,$maternity_leave,'LR',0,'C',$fill);
            $this->Cell($w[5],6,$earn_leave,'LR',0,'C',$fill);
            $this->Cell($w[6],6,$total_leave,'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
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
$header = array('SL','Employee ID','Casual Leave','Medical Leave', 'Maternity Leave','Earn Leave','Total Leave');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',10);
$pdf->AddPage();
$pdf->FancyTable($header,$leave_summery_report_info);
$pdf->Output();
?>
