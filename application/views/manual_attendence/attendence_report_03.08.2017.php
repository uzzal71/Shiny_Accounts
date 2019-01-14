
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
<td colspan="8" align="center">       <span  style="font-size:24px; ">Employee Attendence Report<span><br>
<span  style="font-size:20px; ">2RA Technology Limited<span>
				
				</td>
</tr>

<tr>
<td colspan="4"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="4" align="right"><b>To Date:</b> <?php echo $to_date?></td>
</tr>

<tr>
<td colspan="4"><b>Employee ID:</b> <?php if($employee_id)echo $employee_id;?></td> <td colspan="4" align="right"><b>Employee Name:</b> <?php if($employee_name){echo $employee_name->employee_name;}?></td>
</tr>

<?php $present=0;
	  $absent=0;
	  $leave=0;
	  $holiday=0;
	  $late=0;
	  $holiday_duty=0;
	  $duty_in_leave=0;
	  $total_duration=0;
	  ?>

<tr>
<th>Date</th> <th>Day</th> <th>In Time</th> <th>Out Time</th> <th>Duration</th> <th>Status</th> <th>Holiday Type</th> <th>Remarks</th>
</tr>
<?php if($attendence_report_info){
 foreach($attendence_report_info as $each_attendence_report_info){
	 
	 if($each_attendence_report_info->status=='P'){
		 $present++;
	 }
	  if($each_attendence_report_info->status=='A'){
		 $absent++;
	 }	  
	 if($each_attendence_report_info->status=='L'){
		 $leave++;
	 }	 
	 
	 if($each_attendence_report_info->in_time > $each_attendence_report_info->date.' '.'09:15:00'){
		 $late++;
	 }	 
	 
	 if($each_attendence_report_info->holiday_name != null &&  $each_attendence_report_info->status == 'P'){
		 $holiday_duty++;
	 }	

	 if($each_attendence_report_info->holiday_name != null){
		 $holiday++;
	 }
	 	
	if($each_attendence_report_info->status == 'L' && $each_attendence_report_info->in_time !=null){
		 $duty_in_leave++;
	 }	
	 
	 if($each_attendence_report_info->duration){
		$total_duration=$total_duration + $each_attendence_report_info->duration;
	 }

	 ?>

<tr>
<td align="center"><?php echo $each_attendence_report_info->date?></td> 

<td align="center">
<?php
$date = $each_attendence_report_info->date;
echo date('D', strtotime($date));
?>

</td> 

<td align="center"><?php echo $each_attendence_report_info->in_time?></td> 

<td align="center"><?php echo $each_attendence_report_info->out_time?></td> 

<td align="center"><?php echo $each_attendence_report_info->duration?></td> 

<td align="center"><?php echo $each_attendence_report_info->status?></td> 

<td align="center"><?php echo $each_attendence_report_info->holiday_name?></td> 

<td align="center"><?php echo $each_attendence_report_info->remarks?></td>



<?php }}?>
</tr>



<tr>
<td colspan="8"> <hr></td>
</tr>


<tr>
<td></td> <td></td> <td></td> <td >Total</td> <td align="center"><?php echo $total_duration?></td> <td></td> <td></td> <td></td>
</tr>

<tr>
<td> </td>
</tr>



<tr>
<td><b>Total Working Day</b></td> <td>:</td> <td><?php echo $present + $absent + $leave - $holiday_duty ?></td>
</tr>
<tr>
<td><b>Total Holiday</b></td> <td>:</td> <td><?php echo $holiday?></td> 
</tr>
<tr>
<td><b>Total present</b></td> <td>:</td> <td><?php echo $present + $duty_in_leave?></td> 
</tr>
<tr>
<td><b>Total Late</b></td> <td>:</td> <td><?php echo $late?></td>
</tr>
<tr>
<td><b>Total Absent</b></td> <td>:</td> <td><?php echo $absent?></td> 
</tr>
<tr>
<td><b>Total Leave</b></td> <td>:</td> <td><?php echo $leave?></td> 
</tr>
<tr>
<td><b>Holiday Duty</b></td> <td>:</td> <td><?php echo $holiday_duty?></td> 
</tr>
<tr>
<td><b>Duty in Leave</b></td> <td>:</td> <td><?php echo $duty_in_leave?></td> 
</tr>



</table>

</div>
</body>
</html>


