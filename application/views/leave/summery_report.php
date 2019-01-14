<!DOCTYPE html>
<html>
<head>
	<title>Leave Summary Report</title>
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
<span  style="font-size:16px;"><p>Leave Summary Report</p><span>
				
</td>
</tr>
	
	
<?php 
$serial_no=0;
$casual_leave=0;
$earn_leave=0;
$maternity_leave=0;
$medical_leave=0;
 ?>

<tr>
<td colspan="1"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="1" align="right"><b>To Date:</b> <?php echo $to_date?> </td>
</tr>

<tr>
<th>Sl</th> <th>ID</th>  <th>Casual Leave</th> <th>Medical Leave</th> <th>Maternity Leave</th> <th>Earn Leave</th> <th>Total Leave</th> 
</tr>
<?php 

if($leave_summery_report_info){
		 foreach($leave_summery_report_info as $each_leave_summery_report){


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
		
		if($each_leave_summery_report->medical_leave)
		{
			$medical_leave = $each_leave_summery_report->medical_leave;
		}
		else{
			$medical_leave = 0;
		}
		$total_leave = $casual_leave + $earn_leave + $maternity_leave + $medical_leave;
				  ?>
			 
<tr>
<td><?php echo $serial_no?></td> 
<td><?php echo $each_leave_summery_report->employee_id?></td> 
<td><?php echo $casual_leave?></td> 
<td><?php echo $medical_leave?></td> 
<td><?php echo $maternity_leave?></td> 
<td><?php echo $earn_leave?></td> 

<td><?php echo $total_leave?></td> 

</tr>
<?php }}?>

<tr>
<td colspan="8" align = "center"></td>
</tr>

</table>

</div>

<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Leave/show_summery_report_excel"  target="_blank">
<input type="hidden" name="all_department" value = "<?php echo $all_department;?>">
<input type="hidden" name="department_name" value = "<?php echo $department_name;?>">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
</form>

<form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Leave/show_summery_report_pdf"  target="_blank">
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


