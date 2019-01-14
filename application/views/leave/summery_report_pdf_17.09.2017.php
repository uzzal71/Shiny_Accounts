<?php 
require('./fpdf/html_table.php');

$pdf=new PDF("P", "mm", "A4");
$pdf->AddPage();
$html='';

$html = $html.'<table><tr><td colspan="8" align="center"> <span  style="font-size:24px; ">Leave Summery Report<span><br><span  style="font-size:20px; ">2RA Technology Limited<span></td></tr>';

$html = $html.'
<tr><td colspan="4"><b>From:</b>'.$from_date.'</td>  <td colspan="4" align="right"><b>To Date:</b>'.$to_date.'</td></tr></table>';

$pdf->SetFont('Arial','',7);
$pdf->WriteHTML($html);



$html = '<table border="1px solid black"><tr><td width="50" height="30" bgcolor="#D0D0FF"><b>Sl</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Id</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Casual Leave</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Sick Leave</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Maternity Leave</b></td>
		<td width="100" height="30" bgcolor="#D0D0FF"><b>Earn Leave</b></td>
		<td width="150" height="30" bgcolor="#D0D0FF"><b>Total Leave</b></td></tr></table>';
		
$serial_no=0;
$casual_leave=0;
$earn_leave=0;
$maternity_leave=0;
$sick_leave=0;
if($leave_summery_report_info)
{	
	foreach($leave_summery_report_info as $each_leave_summery_report)
	{
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
		
		if($each_leave_summery_report->sick_leave)
		{
			$sick_leave = $each_leave_summery_report->sick_leave;
		}
		else{
			$sick_leave = 0;
		}
		$total_leave = $casual_leave + $earn_leave + $maternity_leave + $sick_leave;
		$html =$html.'<table border="1px solid black"><tr><td width="50" height="30">'.$serial_no.'</td>
				<td width="100" height="30">'.$each_leave_summery_report->employee_id.'</td>
				<td width="100" height="30">'.$casual_leave.'</td>
				<td width="100" height="30">'.$sick_leave.'</td>
				<td width="100" height="30">'.$maternity_leave.'</td>
				<td width="100" height="30">'.$earn_leave.'</td>
				<td width="150" height="30">'.$total_leave.'</td></tr>';
	}
}
$html = $html.'</table>';



//echo $html; exit();

//echo $html;


$pdf->SetFont('Arial','',7);
$pdf->WriteHTML($html);
$pdf->Output();


?>
