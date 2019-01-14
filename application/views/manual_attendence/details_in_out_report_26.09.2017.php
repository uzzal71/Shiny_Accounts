<!DOCTYPE html>
<html>
<head>
	<title>Details In Out Report</title>
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
<div  id = "report">
<div class="body">

<table>
<tr>
<td colspan="10" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td> <h4><b>Easy Flow</b></h4> </td>
<td colspan="10" align="center">       <span  style="font-size:20px; ">2RA Technology Limited<span><br>
<span  style="font-size:16px;"><p>Details In Out Report</p><span>
				
</td>
</tr>

<tr>
<td colspan="1"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="1"><b>To Date:</b> <?php echo $to_date?></td>
</tr>


<tr>
<th>Date</th> <th>Employee ID</th> <th>Employee Name</th> <th>Time</th>  <th>Gate</th> <th>In/Out</th>
</tr>
<?php 

if($check_employee == 1){
			$data['employee_ids'] = '';
		}
		if($employee_id == 'select'){
			$data['employee_ids'] = '';
		}
		$all_employees = $this->Attendence_model->select_employee_info_by_employee_ids($employee_ids);
		//echo '<pre>';
		//print_r($all_employees);
		//exit();
		$employee_info = array();

		foreach($all_employees as $each_employee)
		{
			$each_employee_info = array();
			$each_employee_info['employee_id'] = "$each_employee->employee_id";
			array_push($employee_info,$each_employee_info);
			
		}
		//echo '<pre>';
		//print_r($employee_info);
		//exit();

$in_out =0;

		for($from_date; $from_date <= $to_date;  $from_date = date ("Y-m-d", strtotime("+1 day", strtotime($from_date))))
		{

			
			$i=0;
			for($i; $i<sizeof($employee_info); $i++)
			{
				$in_out =0;
				//$status = "Entry";
				$employee_id=$employee_info[$i]['employee_id'];
				//echo $employee_id;exit();
				$this->load->model('Manual_attendence_model');
				//echo $check_employee;exit;
				$all_details_in_out_report=$this->Manual_attendence_model->details_in_out_report($company_id,$employee_id,$from_date);
				//echo "<pre>";
				//print_r($all_details_in_out_report);
				//exit();



if($all_details_in_out_report){
 foreach($all_details_in_out_report as $each_details_in_out_report){
 	$in_out++;
 	//echo $in_out; exit();
 	if($in_out%2 ==0){
$status = "Exit";
 	}
 	else{
 		$status = "Entry";
 	}
	 	 
		$date_time = new DateTime($each_details_in_out_report->ctime);
		$date = $date_time->format('Y-m-d');
		$time = $date_time->format('H:i:s A');
		?>
<tr>
<td ><?php echo $date?></td> 
<td><?php echo $each_details_in_out_report->employee_id?></td>
<td><?php echo $each_details_in_out_report->employee_name?></td>
<td><?php echo $time?></td>
<td><?php echo "2RA"?></td>
<td><?php echo $status?></td>


<?php }

}}

}?>


</table>

</div>
<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Manual_attendence/show_in_out_report_excel"  target="_blank">
<input type="hidden" name="check_employee" value = "<?php echo $check_employee1;?>">
<input type="hidden" name="date" value = "<?php echo $date1;?>">
<input type="hidden" name="employee_id" value = "<?php echo $employee_id1;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="check_date" value = "<?php echo $check_date1;?>">
</form>

<form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Manual_attendence/show_in_out_report_pdf"  target="_blank">
<input type="hidden" name="check_employee" value = "<?php echo $check_employee1;?>">
<input type="hidden" name="date" value = "<?php echo $date1;?>">
<input type="hidden" name="employee_id" value = "<?php echo $employee_id1;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="check_date" value = "<?php echo $check_date1;?>">
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
		// window.print();
       var divToPrint = document.getElementById('report').innerHTML;
        var myWindow=window.open();
        myWindow.document.write(divToPrint);
        myWindow.document.close();
       myWindow.focus();
       myWindow.print();
        myWindow.close();
	}
  </script>

