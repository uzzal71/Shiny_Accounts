
<!DOCTYPE html>
<html>
<head>
	<title>Attendence Report</title>
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
	border:1px solid #0080ff;
	
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

<div  id = "report">

</div>
<div class="body">

<table>
<tr>
<td colspan="10" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td> <h4>Easy Flow</h4> </td>
<td colspan="10" align="center">       <span  style="font-size:20px; ">2RA Technology Limited<span><br>
<span  style="font-size:16px;"><p>Attendance Report</p><span>
				
</td>
</tr>
	
<tr>
<td colspan="1"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="1" ><b>To Date:</b> <?php if($to_date) echo $to_date; else{$to_date ='23';}?></td>
</tr>
<tr>
<td colspan="1"><b>Employee ID:</b> <?php if($employee_id)echo $employee_id;?></td> <td colspan="1" ><b>Employee Name: <?php echo $employee_name->first_name?></b></td>
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
$total_working_day=0;
$total_holiday=0;
$total_present=0;
$total_late=0;
$total_absent=0;
$total_leave=0;
$holiday_duty=0;
$duty_in_leave=0;
 ?>

<tr>
<th>Date</th> <th>Day</th> <th>In Time</th> <th>Out Time</th> <th>Duration</th> <th>Status</th> <th>Holiday Type</th> <th>Remarks</th>
</tr>
<?php if($attendence_report_info){
foreach($attendence_report_info as $each_attendence_report_info)
{
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
 ?>

<tr>
<td><?php echo $each_attendence_report_info->date?></td> 

<td>
<?php
$date = $each_attendence_report_info->date;
echo date('l', strtotime($date));
?>

</td> 

<td><?php echo $in_time?></td> 

<td ><?php echo $out_time?></td> 

<td><?php
$duration = floor($duration*60*60);
$each_hours = floor($duration / 3600);
$each_minutes = floor(($duration / 60) % 60);
$each_seconds = $duration % 60;

 echo "$each_hours:$each_minutes:$each_seconds";?></td> 

<td><?php echo $status?></td> 

<td><?php echo $holiday_type?></td> 

<td><?php echo $remarks?></td>



<?php }}?>
</tr>



<tr>
<td colspan="8"> <hr></td>
</tr>


<tr>
<td></td> <td></td> <td></td> <td >Total</td> <td align="center">
<?php
$total_duration_second = floor($total_duration*60*60);
$hours = floor($total_duration_second / 3600);
$minutes = floor(($total_duration_second / 60) % 60);
$seconds = $total_duration_second % 60;

echo "$hours:$minutes:$seconds";?></td> <td></td> <td></td> <td></td>
</tr>

<tr>
<td> </td>
</tr>
<?php
$total_working_day = $present + $absent + $late + $leave;
$total_present = $present + $late + $duty_in_leave + $holiday_duty;
?>
<tr>
<td><b>Total Working Day</b></td> <td>:</td> <td><?php echo $total_working_day ?></td>
</tr>
<tr>
<td><b>Total Holiday</b></td> <td>:</td> <td><?php echo $holiday?></td>
</tr>
<tr>
<td><b>Total present</b></td> <td>:</td> <td><?php echo $total_present?></td> 
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

<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Manual_attendence/show_report_excel"  target="_blank">
<input type="hidden" name="employee_id" value = "<?php echo $employee_id;?>">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
</form>

<form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Manual_attendence/show_report_pdf"  target="_blank">
<input type="hidden" name="employee_id" value = "<?php echo $employee_id;?>">
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

