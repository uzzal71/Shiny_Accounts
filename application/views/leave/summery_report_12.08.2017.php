
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
<td colspan="8" align="center">       <span  style="font-size:24px; ">Leave Summery Report<span><br>
<span  style="font-size:20px; ">2RA Technology Limited<span>
				
				</td>
</tr>
	
<?php 
	$serial_no=0;
	$casual_leave=0;
	$earn_leave=0;
	$meternity_leave=0;
	$sick_leave=0;
	  

 
 ?>

<tr>
<td colspan="5"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="4" align="right"><b>To Date:</b> <?php echo $to_date?> </td>
</tr>


<tr>
<th>Sl</th> <th>ID</th>  <th>Casual Leave</th> <th>Sick Leave</th> <th>Maternity Leave</th> <th>Earn Leave</th> <th>Total Leave</th> 
</tr>
<?php 

if($summery_report_info){
		 foreach($summery_report_info as $each_summery_report){
			 	 $serial_no++;
				  ?>
			 
<tr>
<td align="center"><?php echo $serial_no?></td> 
<td align="center"><?php echo $each_summery_report->employee_id?></td> 
<td align="center"><?php echo $each_summery_report->casual_leave?></td> 
<td align="center"><?php echo $each_summery_report->sick_leave?></td> 
<td align="center"><?php echo $each_summery_report->maternity_leave?></td> 
<td align="center"><?php echo $each_summery_report->earn_leave?></td> 

<td align="center"><?php echo $each_summery_report->earn_leave+$each_summery_report->casual_leave+$each_summery_report->sick_leave+$each_summery_report->maternity_leave;?></td> 

</tr>
<?php }}?>
 




<tr>
<td colspan="8"> <hr></td>
</tr>


<tr>
<td> </td>
</tr>






</table>

</div>
</body>
</html>


