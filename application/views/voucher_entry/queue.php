
<!DOCTYPE html>
<html>

<head>
    <title>
        2RA Technology Limited
    </title>

    

  
        
    </style>
</head>

<body>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <?php $this->load->helpers('double_words');
             $vouchers = new Double_words(); ?>
    </div>
    <div class="col-md-3"></div>
</div>
<div id="printReport" style="font-family: 'Palatino Linotype';">
    <?php
        $sl = 0;
        $brNumber = 19;
        $voucher_information=$voucher_informations;
        foreach ($voucher_informations as $voucher){
        $voucher_no = $voucher->voucher_no;

         $this->load->model('Voucher_entry_model');
    $vouchers_information= $this->Voucher_entry_model->retrieve_pending_voucher_info_to_update($voucher_no);
    $print_update=$this->Voucher_entry_model->update_print($voucher_no);
    $onevoucher=$vouchers_information;
    $twovoucher=$vouchers_information;
    //$this->load->view('queue', $data);

    //print_r($vouchers_information);exit();
        // $voucher = new VoucherEntry();
        // $voucher->prepare($_POST);
        // $allVouchers = $voucher->show();
        // $voucher->printed();
         $rowNum = 0;
    ?>
    <div id="table-caption" class="row" style="margin-bottom: 10px">
        <div class="col-md-2" style="margin-bottom: 50px;"></div>
        <div id="company-name" class="col-md-8" style="background-color: white;text-align: center">
            <h5 style="margin-bottom: 0px;font-size: 17px"><b>2RA TECHNOLOGY LIMITED</b></h5>
            <h6 style="margin-top: 0px;margin-bottom:0px;font-size: 14px"><b>3<sup>rd</sup> Floor, House# 294, Lane# 04, Mirpur DOHS, Dhaka</b></h6>
      <table style="margin-left: 330px; margin-bottom: 0px;"><tr><th style="border:0;"><h5 style="font-size: 17px;margin-bottom: 0px;"><b><u>BILL</u></b></h5></th><td style="border:0;"><h9 style=" margin-left: 70px; margin-bottom: 0px;font-size: 13px;">Print:<?php echo date("Y-m-d h:i:s a"); ?></h9></th></tr></table>
        </div>
        <div class="col-md-2"></div>
    </div>

    <?php foreach ($vouchers_information as  $information) {
       
    } ?>
    <div style="margin-top: 0px;font-size: 14px;margin-top: 0px;margin-bottom: 0px;">
        <div style="background-color: white; margin-top: 0px;margin-bottom: 0px;">
            <div style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px">
         
              <table style="margin-left: 20px;margin-bottom: 0px;border: none;">
                    <tr style="margin-top: 0px;margin-bottom: 0px;">
                       <td width="350px;" style="margin-top: 0px;margin-bottom: 0px;" >Date: <?php echo $information->date; ?></td>
                      
                       <td width="300px;"  style="margin-top: 0px;margin-bottom: 0px;">Expense Type:<?php echo $information->expense_type; ?></td>

                       
                      
                       <td width="400px;">Voucher No:<?php echo $information->voucher_no; ?></td>
                    </tr>

                    
                       
                    <?php if ($information->is_support==1) {
                       $type='S';
                    }if($information->is_support==0){
                         $type='P';
                    } ?>
                   
                    <tr style="margin-top: 0px;margin-bottom: 0px;">
                        
                        <td width="380px" style="margin-top: 0px;margin-bottom: 0px;" >Name:<?php echo $information->employee_name; ?></td>
                        <td colspan="2" style="margin-top: 0px;margin-bottom: 0px;">Project:<?php echo $type.'-'.$information->project_name.'-'. $information->customer_name ?></td>
                        
                        
                    </tr>
                </table>
            </div>
            <div style="margin-bottom: 0px;margin-top: 0px;">

                <div style="background-color: white;padding: 0px;margin-top: 0px;">
                    <?php
                    if ($information->expense_type == 'Transport'){
                        ?>

                        <div style="background-color: white;margin-top: 0px;">
                            <table style="border-collapse: collapse;border: 1px solid black;margin-top: 0px; margin-right: 20px;margin-left: 20px;">
                                <thead>
                                <tr>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black;margin-top: 0px;">SL.</th>
                                    <th align="center" width="350"  style="border-collapse: collapse;border: 1px solid black">From</th>
                                    <th align="center" width="350"  style="border-collapse: collapse;border: 1px solid black;margin-top: 0px;">To</th>
                                    <th align="center" width="240"  style="border-collapse: collapse;border: 1px solid black;margin-top: 0px;">Vehicle</th>
                                    <th align="center" width="240"  style="border-collapse: collapse;border: 1px solid black;margin-top: 0px;">Amount(taka)</th>
                                    <th align="center" width="240"  style="border-collapse: collapse;border: 1px solid black;margin-top: 0px;">Remarks</th>
                                </tr>
                                </thead>
                                <?php
                                $totalAmount = 0;
                                if (isset($onevoucher) && !empty($onevoucher)) {
                                $serial = 0;

                                foreach ($onevoucher as $onesdata) {
                                $serial++;
                                $totalAmount += $onesdata->amount;
                                $rowNum++;
                                ?>
                                <tbody>
                                <tr>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $serial ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $onesdata->from_place ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $onesdata->to_place?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $onesdata->vehicle?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px;text-align: right;"><?php echo $onesdata->amount ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $onesdata->remarks; ?></td>
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
                                    <td colspan="4" style="text-align: right!important;border-collapse: collapse;border: 1px solid black;text-align: right;">
                                        <?php echo "<p style='margin-right: 20px'>Total Amount: </p>" ?>

                                    </td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;text-align: right;">
                                          <?php
                                      $totalAmount= sprintf("%.2f", $totalAmount);
                                       $tamount= explode(".", $totalAmount);
                                       $tamount1=$tamount[0];
                                       $tamount2=$tamount[1];
                                      
                                    if ( $tamount2!=='00') {
                                       $inWords2=' and '.$vouchers->convertingIntoWords($tamount2).'Paisa';
                                    }else{
                                         $inWords2=' ';

                                    }
                                        $inWords = $vouchers->convertingIntoWords($tamount1);
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
                        <div>
                            <table style="border-collapse: collapse;margin-left: 20px;margin-top: 0px;">
                                <thead>
                                <tr>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black">SL No.</th>
                                    <th align="center" style="width: 350px;border-collapse: collapse;border: 1px solid black">Description</th>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black;">Amount(taka)</th>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black">Remarks</th>
                                </tr>
                                </thead>
                                <?php
                                $totalAmount = 0;
                                if (isset($twovoucher) && !empty($twovoucher)) {
                                $serial = 0;

                                foreach ($twovoucher as $twovoucher) {
                                $serial++;
                                $totalAmount += $twovoucher->amount;
                                $rowNum++;
                                ?>
                                <tbody>
                                <tr>
                                    <td align="center" style="width: 50px!important;border-collapse: collapse;border: 1px solid black"><?php echo $serial ?></td>
                                    <td align="center" style="width: 350px;border-collapse: collapse;border: 1px solid black"><?php echo $twovoucher->description ?></td>
                                    <td align="center" style="width: 100px!important;border-collapse: collapse;border: 1px solid black;text-align: right;"><?php echo $twovoucher->amount ?></td>
                                    <td align="center" style="width: 100px!important;border-collapse: collapse;border: 1px solid black"><?php echo $twovoucher->remarks; ?></td>
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
                                    <td colspan="2" style="text-align: right!important;border-collapse: collapse;border: 1px solid black">
                                        <?php echo "<p style='margin-right: 20px'>Total Amount: </p> " ?>

                                    </td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;text-align: right;">
                                        <?php
                                      $totalAmount= sprintf("%.2f", $totalAmount);
                                       $tamount= explode(".", $totalAmount);
                                       $tamount1=$tamount[0];
                                       $tamount2=$tamount[1];
                                      
                                    if ( $tamount2!=='00') {
                                       $inWords2=' and '.$vouchers->convertingIntoWords($tamount2).'Paisa';
                                    }else{
                                         $inWords2=' ';

                                    }
                                        $inWords = $vouchers->convertingIntoWords($tamount1);
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
                    <div style="height: 30px; margin-bottom: 0px;">
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
    <?php
            $brNo = intval($brNumber/2)-$rowNum;
          for ($i=0;$i<$brNo;$i++){
                 echo '<br>';
          }
            if ($sl%2==0){
                
                echo '<br style="margin-top:0px;margin-bottom:0px;"><br>';
                echo '<hr style="border-top: 2px dotted black"/>';
                // border-top : 2px
            }
            else{
                echo "<div class='pagebreak' style='page-break-after: always;margin-top:0px;margin-bottom:0px;'> </div>";
            }
          $sl++;
     } ?>
</div>
<!-- <a href="show.php?voucherNo=<?php echo $_GET['voucherNo'] ?>" id="redirectShow"></a> -->
<br><br><br><br>


<script>
    function printDiv() {
//      console.log(elementId);
        var divToPrint = document.getElementById('printReport').innerHTML;
        var myWindow=window.open();
        myWindow.document.write(divToPrint);
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();
        $('#redirectShow').trigger('click');
    }

//    function addPage() {
////        console.log(elementId);
//        var divToPrint = document.getElementById('printReport').innerHTML;
//        var myWindow=window.open();
//        myWindow.document.addPage();
//        myWindow.document.close();
//        myWindow.focus();
//        myWindow.print();
//        myWindow.close();
//    }
    printDiv();

</script>
</body>
</html>
