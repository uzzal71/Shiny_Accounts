<?php
    require_once('dbConnect.php');
    $sql="UPDATE tbl_command_list set status=1";
    $row=$db->query($sql);
	if($row==true){
		echo 'Success';
	}
	else{
		echo 'Failed';
	}
?>