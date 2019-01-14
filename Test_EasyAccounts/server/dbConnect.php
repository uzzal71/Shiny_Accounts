<?php
    try{
        $db = new PDO('mysql:host=166.62.16.132;dbname=test_easy_accounts;charset=utf8','myAdmin','KyA4U5Ty9jR3rybE');
//        echo "Database Connected Successfully";
    }
    catch (Exception $e){
        echo $e->getMessage();
    }