
<?php

require('./fpdf181/fpdf.php');
date_default_timezone_set("Asia/Dhaka");
//use App\Reports\fpdf\fpdf;
use App\Reports\AllReports\AllReports;

$_POST['from_date'] = $from_date ;
$_POST['to_date'] = $to_date;
$_POST['employee_id'] = $employee_id ;
$_POST['employee_name'] = $employee_name;
$_POST['attendence_report_info'] = $attendence_report_info;


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
        $this->Cell(25,0,'Attendance Report',0,0,'C');
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
        $w = array(23, 23, 23, 23, 23, 20, 25, 20);

        $this->Cell(35,5,'From : '.$_POST['from_date'],1,0,'L',false);
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(35,5,'',1,0,'C',false);
        $this->Cell(20,5,'',1,0,'C',false);
        $this->Cell(35,5,'To : '.$_POST['to_date'],1,0,'L',false);
        $this->Ln(5);
        $this->Cell(40,5,'Employee ID : '.$_POST['employee_id'],1,0,'L',false);
        $this->Cell(32,5,'',1,0,'C',false);
        $this->Cell(33,5,'',1,0,'C',false);
        $this->Cell(20,5,'',1,0,'C',false);
        $this->Cell(35,5,'Employee Name : '.$_POST['employee_name'],1,0,'L',false);
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
$attendence_report_info = $_POST['attendence_report_info'];
		if($attendence_report_info){
foreach($attendence_report_info as $each_attendence_report_info)
{
	$sl++;
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
			$duration="&nbsp;";
		}
		
		if($each_attendence_report_info->status)
		{
			$status=$each_attendence_report_info->status;
		}
		else
		{
			$status="&nbsp;";
		}
		
		
		if($each_attendence_report_info->holiday_name)
		{
			$holiday_type=$each_attendence_report_info->holiday_name;
		}
		else
		{
			$holiday_type="&nbsp;";
		}
		if($each_attendence_report_info->remarks)
		{
			$remarks=$each_attendence_report_info->remarks;
		}
		else
		{
			$remarks="&nbsp;";
		}		


$date = $each_attendence_report_info->date;
//echo date('l', strtotime($date));

// echo $in_time

// echo $out_time


//$duration = floor($duration*60*60);
//$each_hours = floor($duration / 3600);
//$each_minutes = floor(($duration / 60) % 60);
//$each_seconds = $duration % 60;

// echo "$each_hours:$each_minutes:$each_seconds";

//echo $status 

//echo $holiday_type

//echo $remarks

            $this->Cell(1);
            
            $this->Cell($w[0],6,$each_attendence_report_info->date,'LR',0,'C',$fill);
            $date = $each_attendence_report_info->date;

            $this->Cell($w[1],6,date('l', strtotime($date)),'LR',0,'C',$fill);

            

            $this->Cell($w[2],6,$in_time,'LR',0,'C',$fill);

            $this->Cell($w[3],6,$out_time,'LR',0,'C',$fill);

            $duration = floor($duration*60*60);
			$each_hours = floor($duration / 3600);
			$each_minutes = floor(($duration / 60) % 60);
			$each_seconds = $duration % 60;
            $this->Cell($w[4],6,$each_hours.':'.$each_minutes.':'.$each_seconds,'LR',0,'C',$fill);

            $this->Cell($w[5],6,$status,'LR',0,'C',$fill);
            $this->Cell($w[6],6,$holiday_type,'LR',0,'C',$fill);
            $this->Cell($w[7],6,$remarks,'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
    }
    	$total_working_day = $present + $absent + $late + $leave;
		$total_present = $present + $late + $duty_in_leave + $holiday_duty;

        $this->Cell(35,5,'Total Working Day',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$total_working_day,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Total Holiday',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$holiday,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Total Present',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$total_present,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Total Late',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$late,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Total Absent',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$absent,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Total Leave',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$leave,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Holiday Duty',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$holiday_duty,1,0,'C',false);$this->Ln();
        $this->Cell(35,5,'Duty in Leave',1,0,'R',false);
        $this->Cell(10,5,':',1,0,'R',false);
        $this->Cell(5,5,$duty_in_leave,1,0,'C',false);$this->Ln();
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
$header = array('Date','Day','In Time','Out Time', 'Duration', 'Status','Holiday Type','Remarks');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times','',10);
$pdf->AddPage();
$pdf->FancyTable($header,$attendence_report_info);
$pdf->Output();
?>
