
<?php

require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;


$_POST['from_date'] = $from_date ;
$_POST['to_date'] = $to_date;
$_POST['recieve_requisition_report_info'] = $recieve_requisition_report_info;

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
        // $this->Cell(30,10,'Easy Flow',1,0,'L');
        // Move to the right
        $this->Cell(60);
        // Title
        $this->Cell(70,0,'2RA Technology Limited',0,0,'C');
        // Arial bold 15
        $this->SetFont('Times','I',6);
        // Move to the right
        $this->Cell(25);

        $this->Cell(10,-10,'Print Date : '.date('Y-m-d h:i:s a'),0,0,'C');
        // Arial bold 15
        $this->SetFont('Arial','B',6);
        // Move to the right
        $this->Cell(80);
        $this->Ln(7);
        $this->SetFont('Courier','B',14);
        $this->Cell(80);
        $this->Cell(30,0,'Requisition Report ',0,0,'C');
        // Line break
        $this->Ln(5);
//Water Mark Start
    // $this->SetFont('Arial','B',50);
    // $this->SetTextColor(255,192,203);
    // $this->RotatedText(35,190,'2RA Technology Limited',45);
//Water Mark End
    }
//Water Mark Start
function RotatedText($x, $y, $txt, $angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}
//Water Mark End

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
            $this->Cell(40,6,$col,1);
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
        $w = array(40, 40, 30 ,15,20,30);
        // Header
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],6,$header[$i],1,0,'C');
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->Cell($w[4],6,$row[4],'LR');
            $this->Cell($w[5],6,$row[5],'LR');
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
        $w = array(40, 40, 30 ,15,20,30);
        $this->Cell(40,6,'',1,0,'C',false);
        $this->Cell(25,6,'From : '.$_POST['from_date'],1,0,'L',false);
        $this->Cell(25,6,'',1,0,'C',false);
        $this->Cell(20,6,'',1,0,'C',false);
        $this->Cell(35,6,'To : '.$_POST['to_date'],1,0,'L',false);
        $this->Cell(35,6,'',1,0,'c',false);
        $this->Ln(6);
        $this->Cell(1);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        // $totalHoliday = 0;
        // $totalWeekendHoliday = 0;
        // $totalGovtHoliday = 0;
        $sl = 0;
        $recieve_requisition_report_info = $_POST['recieve_requisition_report_info'];

        //  print '<pre>';
        // print_r($recieve_requisition_report_info);
        // die();

        if($recieve_requisition_report_info){
        foreach ($recieve_requisition_report_info as  $each_requisition){
    
            $this->Cell(1);
            $this->Cell($w[0],6,$each_requisition->requisition_no,'LR',0,'C',$fill);
            $log_data =json_decode ($each_requisition->requisition_info);
            $this->Ln();
            foreach ($log_data as $key => $log_info) {

                $this->Cell(1);
                $this->Cell($w[0],6,'','LR',0,'C',$fill);

                $this->Cell(1);
                $this->Cell($w[1],6,$log_info->item_name,0,'C',$fill);
                $this->Cell($w[2],6,$log_info->item_id,'LR',0,'C',$fill);
                $this->Cell($w[3],6,$log_info->quantity,'LR',0,'C',$fill);
                $this->Cell($w[4],6,$log_info->uom,'LR',0,'C',$fill);
                $this->Cell($w[5],6,$log_info->remarks,'LR',0,'C',$fill);
                
                $this->Ln();
                // $fill = !$fill;
             }
   }
  //       $this->Cell(1);
  //       $this->SetDrawColor(0,0,0);
  //       $this->Cell(array_sum($w),0,'','T');
  //       $this->Ln(3);
		// $items_report_info = $_POST['count_holiday_info'] ;
		// if($count_holiday_info){
		// $this->SetDrawColor(255,255,255);
  //       $this->Cell(100);
  //       $this->Cell(50,5,'Total Holiday',1,0,'R',false);
  //       $this->Cell(8,5,':',1,0,'L',false);
  //       $this->Cell(5,5,$total_holiday,1,0,'L',false);$this->Ln();
  //       $this->Cell(100);
  //       $this->Cell(50,5,'Total Weekend Holiday',1,0,'R',false);
  //       $this->Cell(8,5,':',1,0,'L',false);
  //       $this->Cell(5,5,$count_holiday_info->weekend_holiday,1,0,'L',false);$this->Ln();
  //       $this->Cell(100);
  //       $this->Cell(50,5,'Total Govt. Holiday',1,0,'R',false);
  //       $this->Cell(8,5,':',1,0,'L',false);
  //       $this->Cell(5,5,$count_holiday_info->government_holiday,1,0,'L',false);$this->Ln();
  //       $this->Cell(100);
  //       $this->Cell(50,5,'Total Company Holiday',1,0,'R',false);
  //       $this->Cell(8,5,':',1,0,'L',false);
  //       $this->Cell(5,5,$count_holiday_info->company_holiday,1,0,'L',false);$this->Ln();

		// }
		// else{
		// $this->Cell(1);
  //       $this->Cell(10,5,'No Data Available',0,0,'L',false);
		// }

		

    
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
}

$pdf = new PDF();
// Column headings
$header = array('Requisition Id','Item Name','Item ID', 'Quantity','UoM','Remarks');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',8);
$pdf->AddPage();
$pdf->FancyTable($header,$recieve_requisition_report_info);
$pdf->Output();
?>
