<!DOCTYPE html>
<html>
<head>
	<title>Leave Report</title>
    
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
<span  style="font-size:16px;"><p>Leave Report</p><span>
				
</td>
</tr>
	


<tr>
<td colspan="1"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="1" align="right"><b>To Date:</b> <?php echo $to_date?></td>
</tr>
<tr>
<td colspan="8"><b>Employee ID:</b> <?php echo $employee_id;?></td>  <td colspan="1" align="right"><b></td>
</tr>

<tr>
<th>Serial NO</th> <th>From Date</th><th>To Date</th><th>No of Days</th>  <th>Leave Type</th> <th>Half/Full</th>  <th>Approved Date</th>  <th>Approved By</th>
</tr>

<?php


 if($leave_report_info){
$serial_no=0;
 foreach($leave_report_info as $each_leave_report_info){ 
 $serial_no++;
  
 
 ?>


 
<tr>

<td><?php echo $serial_no?></td> 

<td><?php if($each_leave_report_info->date_time_from){echo date($each_leave_report_info->date_time_from);}?></td>
<td><?php if($each_leave_report_info->date_time_from){echo date($each_leave_report_info->date_time_to);}?></td>
<td><?php if($each_leave_report_info->date_time_from){echo date($each_leave_report_info->no_of_days);}?></td>
<td><?php if($each_leave_report_info->leave_types){echo $each_leave_report_info->leave_types;}?></td>

<?php 
if($each_leave_report_info->half_full_day == "first_half"){
$half_full_day = "First Half";
}
if($each_leave_report_info->half_full_day == "second_half"){
$half_full_day = "Second Half";
}
if($each_leave_report_info->half_full_day == "full_day"){
$half_full_day = "Full Day";
}



?>


<td><?php if($each_leave_report_info->half_full_day){echo $half_full_day;}?></td>

<td><?php if($each_leave_report_info->approved_date != "0000-00-00 00:00:00")
							{echo $each_leave_report_info->approved_date;}else{echo "Not Approved";}?></td>
<td><?php if($each_leave_report_info->approved_by)
							{echo $each_leave_report_info->approved_by;}else{echo "Not Approved";}?></td>



<?php }}?>
</tr>







<tr>&nbsp;&nbsp;</tr>
<tr>&nbsp;&nbsp;</tr>
<tr style="border: 1px;"> 
<td colspan="7" align="right" ><b>Leave Full Name</b> &nbsp;&nbsp;</td><td><b>No of Days</b></td>
</tr>
<?php $total_leave_count=0; foreach ($count_employee_leave as $count_employee){

 ?>
 <tr>
<td colspan="7" align="right" ><?php echo $count_employee->leave_full_name; ?>: &nbsp;&nbsp;</td><td><?php echo $count_employee->no_of_days; $total_leave_count=$total_leave_count+$count_employee->no_of_days; ?></td>
</tr>
 <?php
  }?>
<tr style="border: 1px;"> 
<td colspan="7" align="right" ><b>Total</b> &nbsp;&nbsp;</td><td><b><?php echo $total_leave_count; ?></b></td>
</tr>
</table>

</div>
<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Leave/show_report_excel"  target="_blank">
<input type="hidden" name="employee_id" value = "<?php echo $employee_id;?>">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
</form>

<form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Leave/show_report_pdf"  target="_blank">
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
</body>

</html>
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


