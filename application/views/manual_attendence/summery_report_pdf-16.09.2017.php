<?php 
require('./fpdf/html_table.php');

$pdf=new PDF("P", "mm", "A4");
$pdf->AddPage();
$html='';
$present_date = date('y-m-d  h:i:s a');
$html = $html.'<table><tr><td colspan="10" align="right"> '.$present_date.'</td></tr>';
$html = $html.'<tr bgcolor="#D0D0FF"><td> <h4>Easy Flow</h4> </td><td colspan="8" float="center">  <span  style="font-size:24px; ">2RA Technology Limited<span><br><span  style="font-size:20px; ">Summery Report<span></td></tr>';
//echo $html; exit();
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

$html = $html.'
<tr><td colspan="4"><b>From:</b>'.$from_date.'</td>  <td colspan="4" align="right"><b>Total Working Day:</b>'.$total_working_day.'</td></tr>
<tr><td colspan="4"><b>To Date:</b>'.$to_date.'</td>  <td colspan="4" align="right"><b>Total Holiday:</b>'.$total_holiday.'</td></tr>';
$pdf->SetFont('Arial','',7);
$pdf->WriteHTML($html);

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

$html = '<table border="1px solid black"><tr><td width="50" height="30" bgcolor="#D0D0FF"><b>Sl</b></td>
		<td width="50" height="30" bgcolor="#D0D0FF"><b>Id</b></td>
		<td width="150" height="30" bgcolor="#D0D0FF"><b>Name</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Working Hour</b></td>
		<td width="50" height="30" bgcolor="#D0D0FF"><b>Present</b></td>
		<td width="50" height="30" bgcolor="#D0D0FF"><b>Late</b></td>
		<td width="50" height="30" bgcolor="#D0D0FF"><b>Early Out</b></td>
		<td width="50" height="30" bgcolor="#D0D0FF"><b>Leave</b></td>
		<td width="50" height="30" bgcolor="#D0D0FF"><b>Absent</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Holiday Duty</b></td></tr>';
		


$total_duration=0;
if($summery_report_info)
{
	$serial_no = 0;
	foreach($summery_report_info as $each_summery_report_info)
	{
		$serial_no++;
		$total_duration=$total_duration+ $each_summery_report_info->working_hour;
		$html = $html.'<tr><td width="50" height="30">'.$serial_no.'</b></td>
				<td width="50" height="30">'.$each_summery_report_info->employee_id.'</td>
				<td width="150" height="30">'.$each_summery_report_info->employee_name.'</td>
				<td width="100" height="30">'.$each_summery_report_info->working_hour.'</td>
				<td width="50" height="30">'.$each_summery_report_info->present.'</td>
				<td width="50" height="30">'.$each_summery_report_info->late.'</td>
				<td width="50" height="30">'.$each_summery_report_info->early_out.'</td>
				<td width="50" height="30">'.$each_summery_report_info->leave.'</td>
				<td width="50" height="30">'.$each_summery_report_info->absent.'</td>
				<td width="100" height="30">'.$each_summery_report_info->holiday_duty.'</td></tr>';


	}
}
$html = $html.'</table>';



//echo $html; exit();

//echo $html;


$pdf->SetFont('Arial','',7);
$pdf->WriteHTML($html);
$pdf->Output();


?>
