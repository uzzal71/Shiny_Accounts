
<!DOCTYPE html>
<html>

<head>
    <title>
        2RA Technology Limited
    </title>

    <link rel="stylesheet" href="../../../../asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../asset/css/main.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <script type="text/javascript">
        $(document).ready(function () {
            $('dropdown-toggle').dropdown()
        });
    </script>

    <style>
        body {
            background-image: url("../../../../asset/images/bg13.jpg");
            /*background-repeat: repeat-x;*/
        }

        .custom-input {
            height: 29px;
        }

        table td,th{
            border: 1px solid black;
        }
    </style>
</head>

<body>
<br><br>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <?php $this->load->helpers('double_words');
             $voucher = new Double_words(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
<div id="printReport" style="font-family: 'Palatino Linotype'">
    <div id="table-caption" class="row" style="margin-bottom: 0px">
        <div class="col-md-2"></div>
        <div id="company-name" class="col-md-8" style="background-color: white;text-align: center">
            <h5 style="margin-bottom: 0px;font-size: 17px; margin-top:15px;"><b>2RA TECHNOLOGY LIMITED</b></h5>
            <h6 style="margin-top: 0px;margin-bottom:0px;font-size: 14px"><b>3<sup>rd</sup> Floor, House# 294, Lane# 04, Mirpur DOHS, Dhaka</b></h6>
          
<table style="margin-left: 330px; margin-bottom: 0px;"><tr><th style="border:0;"><h4 style="font-size: 17px;margin-bottom: 0px;"><b><u>BILL</u></b></h4></th><td style="border:0;"><h9 style=" margin-left: 70px;margin-top: 0px;margin-bottom: 0px; font-size: 13px; ">Print:<?php echo date("Y-m-d h:i:s a"); ?></h9></td></tr></table>
        </div>
         <?php
                        $voucher_information=$voucher_infos;
                        $allVouchers=$voucher_infos;
                      //  print_r($voucher_info);exit();
                        foreach ($voucher_information as $voucher_info) {
                            
                        }?>
        
    </div>
    <div style="margin-top: 0px;font-size: 16px;margin-bottom: 0px;margin-top: 0px;">
        <div style="background-color: white;margin-bottom: 0px;">
            <div style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px">
        

                <table style="margin-left: 20px;margin-bottom: 0px;border: none;">
                    <tr style="margin-top: 0px;margin-bottom: 0px;">
                       <td width="350px;" style="margin-top: 0px;margin-bottom: 0px;" >Date: <?php echo $voucher_info->date; ?></td>
                      
                       <td width="300px;"  style="margin-top: 0px;margin-bottom: 0px;">Expense Type:<?php echo $voucher_info->expense_type; ?></td>

                       
                      
                       <td width="400px;" >Voucher No:<?php echo $voucher_info->voucher_no; ?></td>
                    </tr>

                    
                    <?php if ($voucher_info->is_support==1) {
                       $type='S';
                    }if($voucher_info->is_support==0){
                         $type='P';
                    } ?>
                   
                    <tr style="margin-top: 0px;margin-bottom: 0px;">
                        
                        <td width="380px" style="margin-top: 0px;margin-bottom: 0px;" >Name:<?php echo $voucher_info->employee_name; ?></td>
                        <td colspan="2" style="margin-top: 0px;margin-bottom: 0px;">Project:<?php echo $type.'-'.$voucher_info->project_name.'-'. $voucher_info->customer_name ?></td>
                        
                        
                    </tr>
                </table>
            </div> 
            <div style="margin-top: 0px;">

                <div style="background-color: white;padding: 1px;margin-top: 0px;">
                    <?php
                    if ($voucher_info->expense_type =='Transport'){
                        ?>

                        <div style=" margin-top: 0px;">
                            <table style="border-collapse: collapse;border: 1px solid black;margin-left: 20px;margin-right: 20px; margin-top: 0px;">
                                <thead>
                                <tr>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black">SL.</th>
                                    <th align="center" width="200"  style="border-collapse: collapse;border: 1px solid black">From</th>
                                    <th align="center" width="200"  style="border-collapse: collapse;border: 1px solid black">To</th>
                                    <th align="center" width="140"  style="border-collapse: collapse;border: 1px solid black">Vehicle</th>
                                    <th align="center" width="140"  style="border-collapse: collapse;border: 1px solid black">Amount(BDT)</th>
                                    <th align="center" width="140"  style="border-collapse: collapse;border: 1px solid black">Remarks</th>
                                </tr>
                                </thead>
                                <?php
                                $totalAmount = 0;
                                if ($voucher_information!=="") {
                                $serial = 0;

                                foreach ($voucher_information as $oneVoucher) {
                                $serial++;
                                $totalAmount += $oneVoucher->amount;
                                ?>
                                <tbody>
                                <tr>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $serial ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $oneVoucher->from_place ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $oneVoucher->to_place?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $oneVoucher->vehicle?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px;text-align: right;"><?php echo $oneVoucher->amount; ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $oneVoucher->remarks; ?></td>
                                </tr>
                                <?php
                                }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" align="center">
                                            <?php echo "No Data Available " ?>

                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                <tr>
                                    <td colspan="4" style="text-align: right!important;border-collapse: collapse;border: 1px solid black">
                                        <?php echo "<p style='margin-right: 20px'><b>Total Amount: </b></p>" ?>

                                    </td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;text-align: right;">
                                           <?php
                                      $totalAmount= sprintf("%.2f", $totalAmount);
                                       $tamount= explode(".", $totalAmount);
                                       $tamount1=$tamount[0];
                                       $tamount2=$tamount[1];
                                      
                                    if ( $tamount2!=='00') {
                                       $inWords2=' and '.$voucher->convertingIntoWords($tamount2).'Paisa';
                                    }else{
                                         $inWords2=' ';

                                    }
                                        $inWords = $voucher->convertingIntoWords($tamount1);
                                        ?>
                                        <?php echo sprintf("%.2f", $totalAmount); ?>

                                    </td>
                                    <td align="center">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div style="margin-top: 0px;">
                            <table style="border-collapse: collapse;margin-left: 20px;margin-top: 0px;">
                                <thead style="margin-bottom: 0px;">
                                <tr style="margin-bottom: 0px;" >
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black; margin-top: 0px;">SL.</th>
                                    <th align="center" style="width: 300px;border-collapse: collapse;border: 1px solid black; margin-top: 0px;">Description</th>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black; margin-top: 0px;">Amount(BDT)</th>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black; margin-top: 0px;">Remarks</th>
                                </tr>
                                </thead>
                                <?php
                                $totalAmount = 0;
                                if (isset($allVouchers) && !empty($allVouchers)) {
                                $serial = 0;

                                foreach ($allVouchers as $oneVoucher) {
                                $serial++;
                                $totalAmount += $oneVoucher->amount;
                                ?>
                                <tbody>
                                <tr style="margin-bottom: 0px;" >
                                    <td align="center" style="width: 30px!important;border-collapse: collapse;border: 1px solid black; margin-top: 0px;"><?php echo $serial ?></td>
                                    <td align="center" style="width: 300px;border-collapse: collapse;border: 1px solid black; margin-top: 0px;"><?php echo $oneVoucher->description ?></td>
                                    <td align="center" style="width: 120px!important;border-collapse: collapse;border: 1px solid black; margin-top: 0px;text-align: right;"><?php echo $oneVoucher->amount; ?></td>
                                    <td align="center" style="width: 150px!important;border-collapse: collapse;border: 1px solid black; margin-top: 0px;"><?php echo $oneVoucher->remarks; ?></td>
                                </tr>
                                <?php
                                }
                                } else {
                                    ?>
                                    <tr style="border-collapse: collapse;border: 1px solid black">
                                        <td colspan="4" align="center">
                                            <?php echo "No Data Available " ?>

                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right!important;border-collapse: collapse;border: 1px solid black; margin-top: 0px;margin-bottom: 0px;">
                                        <?php echo "<p style='margin-right: 20px;margin-top: 0px;'><b>Total Amount: </b></p> " ?>

                                    </td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;text-align: right;">
                                           <?php
                                      $totalAmount= sprintf("%.2f", $totalAmount);
                                       $tamount= explode(".", $totalAmount);
                                       $tamount1=$tamount[0];
                                       $tamount2=$tamount[1];
                                      
                                    if ( $tamount2!=='00') {
                                       $inWords2=' and '.$voucher->convertingIntoWords($tamount2).'Paisa';
                                    }else{
                                         $inWords2=' ';

                                    }
                                        $inWords = $voucher->convertingIntoWords($tamount1);
                                        ?>
                                        <?php echo sprintf("%.2f", $totalAmount); ?>

                                    </td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black">

                                    </td>
                                    <td align="center">

                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>

                        <?php
                    }
                    ?>
                    <?php
                  echo '<p style="margin-left: 10px;margin-top: 2%"><b>In Words </b>: '.$inWords.' Taka'.$inWords2.' Only </p><br>';
                    ?>
                    <div style="height: 50px;">
                        <div style="float: left;margin-left: 50px">
                            <p><u>Submitted by</u></p>
                        </div>
                        <div style="float: left;margin-left: 160px">
                            <p><u>Verified by</u></p>
                        </div>
                        <div style="float: left;margin-left: 200px">
                            <p><u>Approved by</u></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <a href="show.php?voucherNo=<?php echo $_GET['voucherNo'] ?>" id="redirectShow"></a> -->
<br><br><br><br>


<script>
    function printDiv() {
//        console.log(elementId);
        var divToPrint = document.getElementById('printReport').innerHTML;
        var myWindow=window.open();
        //document.getElementById('header').style.display = 'none';
       // document.getElementById('footer').style.display = 'none';
        myWindow.document.write(divToPrint);
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();
        $('#redirectShow').trigger('click');
    }
    printDiv();

</script>
</body>
</html>
