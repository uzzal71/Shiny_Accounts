<!DOCTYPE html>
<html>
<head>
	<title>Attendence Summary Report</title>
	
<div  id = "report">
    <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap_3.3.7.min.css">
    <link href="<?php echo base_url();?>css/simple-sidebar.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui_1.12.1.css">
    <link href="<?php echo base_url();?>css/jquery-ui-timepicker-addon.css" rel="stylesheet">
    
    <script src="<?php echo base_url();?>js/jquery_3.2.1.min.js"></script>
    
    <script src="<?php echo base_url();?>js/bootstrap_3.3.7.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui_1.12.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-timepicker-addon.js"></script>
<style>
h4   {
	color: #0080ff;
	margin-left:10px;
	border:5px solid #0080ff;
	
	padding:10px;
	display:inline-block;
}
table, td, th { 
     text-align="center"
	
}

table {
    border-collapse: collapse;
	
    width: 85%;
	float :left;
	margin-right : 20px;
	margin-left : 20px;
}
tr:nth-child(even){background-color: #f2f2f2}

th, td {
    padding: 1px;
	
}
th {
	background-color:#42b0f4;
}

td {
	font-size:12px;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 5px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
</head>
<body>




<div class="body">

<table>
<tr>
<td colspan="10" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td> <h4><b>Easy Flow</b></h4> </td>
<td colspan="10" align="center">       <span  style="font-size:20px; ">2RA Technology Limited<span><br>
<span  style="font-size:16px;"><p>Attendance Summary Report</p><span>
				
</td>
</tr>
	

<tr>
<td><b>From Date:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="1" align="right"><b>To Date:</b> <?php echo $to_date?> </td>
</tr>
<?php 
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
		$total_working_day = $diff->days - $total_holiday +1;
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
 ?>
<tr>
<th>Sl</th> <th>ID</th> <th>Name</th> <th>Present</th> <th>Absent</th>  <th>Leave</th>  <th>Late</th>  <th>Early Out</th>    <th>Holiday Duty</th> <th>Working Hour</th> 
</tr>
<?php
$present=0;
$absent=0;
$leave=0;
$holiday=0;
$late=0;
$holiday_duty=0;
$duty_in_leave=0;
$total_duration=0;
$total_present=0;
$total_late=0;
$total_absent=0;
$total_leave=0;
$holiday_duty=0;
$duty_in_leave=0;
if($summery_report_info)
{
	$serial_no = 0;
	foreach($summery_report_info as $each_summery_report_info)
	{
		//echo "<pre>";
		//print_r($summery_report_info);
		//exit();
	 
	
	 $serial_no++;
	 $total_duration=$total_duration+ $each_summery_report_info->working_hour;
 
	 ?>

<tr>
<td><?php echo $serial_no?></td>
<td><?php echo $each_summery_report_info->employee_id?></td>
<td><?php echo $each_summery_report_info->employee_name?></td>
<?php $total_present = $each_summery_report_info->present + $each_summery_report_info->late;?>
<td><?php echo $total_present;?></td>
<?php
$total_leave = $each_summery_report_info->leave;
$total_absent = $total_working_day - $total_present -$total_leave?>
<td><?php echo $total_absent ?></td>
<td><?php if(isset($each_summery_report_info->leave)){echo $each_summery_report_info->leave;} else{ echo "0";}?></td>
<td><?php echo $each_summery_report_info->late?></td> 
<td><?php echo $each_summery_report_info->early_out?></td>
 

<td><?php echo $each_summery_report_info->holiday_duty?></td> 
<td><?php
		$each_working_hour = $each_summery_report_info->working_hour;
		$each_working_hour_second = floor($each_working_hour*60*60);
		$each_hours = floor($each_working_hour_second / 3600);
		$each_minutes = floor(($each_working_hour_second / 60) % 60);
		$each_seconds = $each_working_hour_second % 60;
$each_hours = sprintf("%02d", $each_hours);
$each_minutes = sprintf("%02d", $each_minutes);
$each_seconds = sprintf("%02d", $each_seconds);
		echo "$each_hours:$each_minutes:$each_seconds";

?></td> 
<?php }}?>
</tr>



<tr>
<td colspan="10"> <hr></td>
</tr>


<tr>
<td colspan="1" align="right"><b>Total Working Day:</b> <?php echo $total_working_day?> </td>
</tr>
<tr>
<td colspan="1" align="right"><b>Total Holiday:</b> <?php echo $total_holiday?></td>
</tr>
</table>

</div> 
<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Manual_attendence/show_summery_report_excel"  target="_blank">
<input type="hidden" name="all_department" value = "<?php echo $all_department;?>">
<input type="hidden" name="department_name" value = "<?php echo $department_name;?>">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
</form>

<form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Manual_attendence/show_summery_report_pdf"  target="_blank">
<input type="hidden" name="all_department" value = "<?php echo $all_department;?>">
<input type="hidden" name="department_name" value = "<?php echo $department_name;?>">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
</form>

<div class="dropdown">
 <button class="dropbtn">Export</button>
 <div class="dropdown-content">
<button type="submit"  name="submit" id="btn_generate_pdf" class="btn btn-primary">PDF</button><br>
<button type="submit"  name="submit" id="btn_generate_excel" class="btn btn-primary">Excel</button>
<button class="btn btn-primary" onclick="printDiv()">Print Report</button>
  </div>
</div>
</div>
</body>

</html>
<script>
	$(document).ready(function() {
 $("#btn_generate_pdf").click(function(){  
  $("#pdf").submit();
  	});	

 $("#btn_generate_excel").click(function(){  
  $("#excel").submit();
  	});

		});
			
	function printDiv() {
        var divToPrint = document.getElementById('report').innerHTML;
        var myWindow=window.open();
        myWindow.document.write(divToPrint);
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();
	}
  </script>