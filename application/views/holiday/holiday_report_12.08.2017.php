
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
<td colspan="5" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td colspan="5" align="center">       <span  style="font-size:24px; ">Holiday Report<span><br>
<span  style="font-size:20px; ">2RA Technology Limited<span>
				
				</td>
</tr>

<tr>
<td colspan="3"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="2" align="right"><b>To Date:</b> <?php echo $to_date?></td>
</tr>

<tr>
<th>Sl</th> <th>Date</th> <th>Day</th> <th>Description</th> <th>Type</th>
</tr>

<?php
	$serial_no=0;
	$weekend_holiday=0;
	$govt_holiday=0;
	$special_holiday=0;


 if($holiday_report_info){

 foreach($holiday_report_info as $each_holiday_report_info){ 
 $serial_no++;
  if($each_holiday_report_info->type=="w"){
	  $weekend_holiday++;
  }
  if($each_holiday_report_info->type=="gh"){
	  $govt_holiday++;
  }
    if($each_holiday_report_info->type=="sch"){
	  $special_holiday++;
  }
  
 
 ?>


 
<tr>

<td align="center"><?php echo $serial_no?></td> 

<td align="center"><?php echo $each_holiday_report_info->date?></td> 

<td align="center"><?php
$date = $each_holiday_report_info->date;
echo date('D', strtotime($date));
?>
</td>



<td align="center"><?php echo $each_holiday_report_info->description?></td>
<td align="center"><?php echo $each_holiday_report_info->type?></td>



<?php }}?>
</tr>



<tr>
<td colspan="5"> <hr></td>
</tr>


<tr>
<td> </td>
</tr>



<tr>
<td><b>Total Holiday Day: &nbsp; &nbsp;</b> <?php echo $serial_no?></td>
</tr>
<tr>
<td><b>Total Weekend Holiday:  &nbsp; &nbsp;</b> <?php echo $weekend_holiday?></td> 
</tr>
<tr>
<td><b>Total Govt. Holiday:  &nbsp; &nbsp;</b> <?php echo $govt_holiday?></td> 
</tr>
<tr>
<td><b>Total Special or Company Holiday:  &nbsp; &nbsp;</b> <?php echo $special_holiday?></td> 
</tr>



</table>

</div>
</body>
</html>


