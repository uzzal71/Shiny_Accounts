<?php
    require_once 'dbConnect.php';
    $failedIds=$_GET['failedId'];
    $failedId=explode(',',$failedIds);
    $failed=0;
    foreach ($failedId as $failId){
        $sql = "UPDATE tbl_command_list set status=0 WHERE id=$failId";
        $row=$db->query($sql);
        if($row==false){
            $failed++;
        }
    }
    if ($failed==0){
        echo 'Success';
    }
    else{
        echo 'Failed';
    }
?>

