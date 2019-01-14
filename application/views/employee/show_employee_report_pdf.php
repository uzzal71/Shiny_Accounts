
<?php

require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;

$_POST['department_name'] = $department_name ;
$_POST['all_department'] = $all_department;
$_POST['employee_report_info'] = $employee_report_info;

if($all_department ==1){

    $_POST['department_name_show']  = "All Department";
}
else{
    $_POST['department_name_show'] = $_POST['department_name']." Department";
}

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
        $this->Cell(25,0,''.$_POST['department_name_show'].' Employee Report',0,0,'C');
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

                // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
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
        $w = array(20, 23, 40, 23, 40, 40);// column width parameter indexwise where index starts from 0
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(20,5,'',1,0,'C',false);
        $this->Ln(5);
        $this->Cell(32,5,'',1,0,'C',false);
        $this->Cell(33,5,'',1,0,'C',false);
        $this->Cell(20,5,'',1,0,'C',false);
        $this->Ln(5);
        $this->Cell(1);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
         $fill = false;
        // Data
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

            $this->Cell(1);
            
            $this->Cell($w[0],6,$sl,'LR',0,'C',$fill);

            $this->Cell($w[1],6,$employee_id,'LR',0,'C',$fill);
            $this->Cell($w[2],6,$employee_name,'LR',0,'C',$fill);

            $this->Cell($w[3],6,$card_id,'LR',0,'C',$fill);

            $this->Cell($w[4],6,$department,'LR',0,'C',$fill);

            $this->Cell($w[5],6,$designation,'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }

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
$header = array('SL#','Employee ID','Employee Name','Card No', 'Department', 'Designation');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',10);
$pdf->AddPage();
$pdf->FancyTable($header,$employee_report_info);
$pdf->Output();
?>
