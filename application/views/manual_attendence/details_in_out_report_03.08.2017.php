
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
<td colspan="6" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td colspan="6" align="center">       <span  style="font-size:24px; ">Details In Out Report<span><br>
<span  style="font-size:20px; ">2RA Technology Limited<span>
				
				</td>
</tr>

<tr>
<td colspan="4"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="2" align="right"><b>To Date:</b> <?php echo $to_date?></td>
</tr>


<tr>
<th>Date</th> <th>Employee ID</th> <th>Employee Name</th> <th>Time</th> <th>Gate</th> <th>In/Out</th>
</tr>
<?php if($all_details_in_out_report){
 foreach($all_details_in_out_report as $each_details_in_out_report){?>

<tr>
<td align="center"><?php echo $each_details_in_out_report->date?></td> 
<td align="center"><?php echo $each_details_in_out_report->employee_id?></td>
<td align="center"><?php echo $each_details_in_out_report->employee_name?></td>

<?php 

$date_time = new DateTime($each_details_in_out_report->in_time);
$time = $date_time->format('H:i:s A');

?>

<td align="center"><?php echo $time?></td>
<td align="center"><?php echo "2RA Office"?></td>
<td align="center"><?php echo "Entry"?></td>
</tr>
<tr>
<td></td> 
<td align="center"><?php echo $each_details_in_out_report->employee_id?></td>
<td align="center"><?php echo $each_details_in_out_report->employee_name?></td>
<?php 
$date_time = new DateTime($each_details_in_out_report->out_time);
$time = $date_time->format('H:i:s A');
?>

<td align="center"><?php echo $time?></td>
<td align="center"><?php echo "2RA Office"?></td>
<td align="center"><?php echo "Exit"?></td>
</tr>
<?php }}?>


<tr>
<td colspan="6"> <hr></td>
</tr>

</table>

</div>
</body>
</html>


