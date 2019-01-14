<?php

    require_once ('dbConnect.php');
    date_default_timezone_set('Asia/Dhaka');
	
    $employee_id = explode(',',$_GET['employee_id']);
    $employee_name = explode(',',$_GET['employee_name']);
    $card_no = explode(',',$_GET['card_no']);
    $employee_status = explode(',',$_GET['employee_status']);
    $privilege = explode(',',$_GET['privilege']);
    $deviceID = explode(',',$_GET['deviceID']);
	$company_id = $_GET['companyID'];
	$success ='';
	$date_time = date("Y-m-d H:i:s");


    for ($i=0;$i<count($employee_id);$i++)
	{
		if($employee_id[$i] !='')
		{		
			$employeeName=explode(' ',$employee_name[$i],2);
			$first_name=$employeeName[0];
			if(isset($employeeName[1]))
			{
				$last_name=$employeeName[1];
			}
			else
			{
				$last_name='';
			}
			
			$sql="INSERT INTO tbl_employee(employee_id,first_name,last_name,deviceID,card_id,status,company_id,is_user) 
			                      VALUES ('$employee_id[$i]','$first_name','$last_name','$deviceID[$i]','$card_no[$i]','$employee_status[$i]','$company_id',$privilege[$i]) ON DUPLICATE KEY UPDATE first_name='$first_name',last_name='$last_name',deviceID='$deviceID[$i]',card_id='$card_no[$i]',status='$employee_status[$i]',company_id='$company_id',is_user=$privilege[$i]";
			$sql_to_active_emp = "INSERT into tbl_active_employee_for_device (employee_id, card_id, action_code,datetime,status,company_id) VALUES ('$employee_id[$i]','$card_no[$i]',4,'$date_time','$employee_status[$i]','$company_id')";					  
			$row=$db->query($sql);
			if ($row==true)
			{
				$success = $employee_id[$i] .',' .$deviceID[$i] .';' .$success;
			}
		}
        
    }
	
	if($success == '')
	{
		echo 'Failed';
	}
	else
	{
		echo $success;
	}
