
<!DOCTYPE html>
<html>
<head>
<style>
table, td, th { 
     text-align="center"
	
}

table {
    border-collapse: collapse;
	
    width: 95%;
}

th, td {
    padding: 1px;
}
th {
	background-color:#42b0f4;
}

td {
	font-size:12px;
}
</style>
</head>
<body>

<div class="header">


</div>
<div class="body">

<table  style="float:center">
<tr>
<td colspan="8" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td colspan="8" align="center">       <span  style="font-size:24px; ">Summery Report<span><br>
<span  style="font-size:20px; ">2RA Technology Limited<span>
				
				</td>
</tr>
	
<?php $present=0;
	  $absent=0;
	  $leave=0;
	  $holiday=0;
	  $total_holiday=0;
	  $late=0;
	  $holiday_duty=0;
	  $duty_in_leave=0;
	  $total_duration=0;
	  $total_working_day=0;
	  $serial_no=0;
	  

 if($summery_report_total){
 foreach($summery_report_total as $each_summery_report_info){
	 
	 if($each_summery_report_info->status=='P'){
		 $present++;
	 }
	  if($each_summery_report_info->status=='A'){
		 $absent++;
	 }	  
	 if($each_summery_report_info->status=='L'){
		 $leave++;
	 }	 


	 if($each_summery_report_info->holiday_name != null){
		 $holiday++;
	 }

	 
 } }
	 $total_working_day= $present + $absent + $leave;
 
 ?>

<tr>
<td colspan="4"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="4" align="right"><b>Total Working Day: <?php echo $total_working_day?></b> </td>
</tr>

<tr>
<td colspan="4"><b>To Date:</b> <?php echo $to_date?></td> <td colspan="4" align="right"><b>Total Holiday: <?php echo $holiday?></b></td>
</tr>












<tr>
<th>Sl</th> <th>ID</th> <th>Name</th> <th>Working Hour</th> <th>Present</th> <th>Late</th> <th>Leave</th> <th>Absent</th> <th>Holiday Duty</th>
</tr>
<?php
$total_duration=0;
 if($summery_report_info){
 foreach($summery_report_info as $each_summery_report_info){
	 
	
	 $serial_no++;
	 $total_duration=$total_duration+ $each_summery_report_info->working_hour;
 
	 ?>

<tr>
<td align="center"><?php echo $serial_no?></td> 
<td align="center"><?php echo $each_summery_report_info->employee_id?></td> 
<td align="center"><?php echo $each_summery_report_info->employee_name?></td> 
<td align="center"><?php echo $each_summery_report_info->working_hour?></td> 
<td align="center"><?php echo $each_summery_report_info->present?></td> 
<td align="center"><?php echo $each_summery_report_info->late?></td> 
<td align="center"><?php echo $each_summery_report_info->absent?></td> 
<td align="center"><?php echo $each_summery_report_info->leave?></td> 
<td align="center"><?php echo $each_summery_report_info->holiday_duty?></td> 
<?php }}?>
</tr>



<tr>
<td colspan="9"> <hr></td>
</tr>


<tr>
<td></td>  <td></td> <td >Total</td> <td align="center"><?php echo $total_duration?></td> <td></td> <td></td> <td></td>
</tr>

<tr>
<td> </td>
</tr>






</table>

</div>
</body>
</html>


