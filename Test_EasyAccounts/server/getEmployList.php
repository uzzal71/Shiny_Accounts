<?php
    require_once ('dbConnect.php');
    $employee_id = explode(',',$_GET['employee_id']);
    $employee_name = explode(',',$_GET['employee_name']);
    $card_no = explode(',',$_GET['card_no']);
    $employee_status = explode(',',$_GET['employee_status']);
    $privilege = explode(',',$_GET['privilege']);
    $deviceID = explode(',',$_GET['deviceID']);
	$success ='';


    for ($i=0;$i<count($employee_id);$i++){
		if($employee_id[$i] !=''){
			$findComIdSql="SELECT company_id FROM tbl_devices WHERE DevId='$deviceID[$i]'";
			$findComIdRow=$db->query($findComIdSql)->fetch(PDO::FETCH_ASSOC);
			$company_id=$findComIdRow['company_id'];
			
			$employeeName=explode(' ',$employee_name[$i],2);
			$first_name=$employeeName[0];
			$last_name=$employeeName[1];
			$sql="INSERT INTO tbl_employee(employee_id,first_name,last_name,card_id,status,company_id,is_user) 
			                      VALUES ('$employee_id[$i]','$first_name','$last_name','$card_no[$i]','$employee_status[$i]','$company_id',$privilege[$i]) ON DUPLICATE KEY UPDATE first_name='$first_name',flast_name='$last_name',card_id='$card_no[$i]',status='$employee_status[$i]',company_id='$company_id',is_user=$privilege[$i]";
			$row=$db->query($sql);
			if ($row==true){
				$success = $employee_id[$i] .',' .$deviceID[$i] .';' .$success;
			}
		}
        
    }
	
	if($success == ''){
		echo 'Failed';
	}
	else{
		echo $success;
	}
