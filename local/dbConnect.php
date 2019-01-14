<?php
    try{
        //$db = new PDO('mysql:host=127.0.0.1;dbname=test_easy_accounts;charset=utf8','root','');
		$db = new PDO('mysql:host=127.0.0.1:3307;dbname=test_easy_accounts;charset=utf8','root','');
//        echo "Database Connected Successfully";
    }
    catch (Exception $e){
        echo $e->getMessage();
    }

