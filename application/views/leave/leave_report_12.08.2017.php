
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
<td colspan="7" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td colspan="7" align="center">       <span  style="font-size:24px; ">Employee Leave Report<span><br>
<span  style="font-size:20px; ">2RA Technology Limited<span>
				
				</td>
</tr>

<tr>
<td colspan="5"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="2" align="right"><b>To Date:</b> <?php echo $to_date?></td>
</tr>
<tr>
<td colspan="3"><b>Employee ID:</b> <?php echo $employee_id;?></td>  <td colspan="2" align="right"><b></td>
</tr>

<tr>
<th>Serial NO</th> <th>From Date</th> <th>To Date</th> <th>Leave Type</th> <th>Half/Full</th>  <th>Approved Date</th>  <th>Approved By</th>
</tr>

<?php
	$serial_no=0;
	$casual_leave=0;
	$earn_leave=0;
	$meternity_leave=0;
	$sick_leave=0;


 if($leave_report_info){

 foreach($leave_report_info as $each_leave_report_info){ 
 $serial_no++;
  if($each_leave_report_info->leave_types=="CL"){
	  $casual_leave++;
  }
  if($each_leave_report_info->leave_types=="EL"){
	  $earn_leave++;
  }
    if($each_leave_report_info->leave_types=="ML"){
	  $meternity_leave++;
  }   
  if($each_leave_report_info->leave_types=="SL"){
	  $sick_leave++;
  }
  
 
 ?>


 
<tr>

<td align="center"><?php echo $serial_no?></td> 

<td align="center"><?php if($each_leave_report_info->date_time_from){echo $each_leave_report_info->date_time_from;}?></td>
<td align="center"><?php if($each_leave_report_info->date_time_to){echo $each_leave_report_info->date_time_to;}?></td>
<td align="center"><?php if($each_leave_report_info->leave_types){echo $each_leave_report_info->leave_types;}?></td>
<td align="center"><?php if($each_leave_report_info->half_full_day){echo $each_leave_report_info->half_full_day;}?></td>
<td align="center"><?php if($each_leave_report_info->approved_date != "0000-00-00 00:00:00")
							{echo $each_leave_report_info->approved_date;}else{echo "Not Approved";}?></td>
<td align="center"><?php if($each_leave_report_info->approved_by)
							{echo $each_leave_report_info->approved_by;}else{echo "Not Approved";}?></td>



<?php }}?>
</tr>



<tr>
<td colspan="7"> <hr></td>
</tr>


<tr>
<td> </td>
</tr>



<tr>
<td colspan="4"><b>Total Casual Leave: &nbsp; &nbsp;</b> <?php echo $casual_leave?></td>
</tr>
<tr>
<td colspan="4"><b>Total Earn Leave:  &nbsp; &nbsp;</b> <?php echo $earn_leave?></td> 
</tr>
<tr>
<td colspan="4"><b>Total Meternity Leave:  &nbsp; &nbsp;</b> <?php echo $meternity_leave?></td> 
</tr>
<tr>
<td colspan="4"><b>Total Sick Leave:  &nbsp; &nbsp;</b> <?php echo $sick_leave?></td> 
</tr>



</table>

</div>
</body>
</html>


