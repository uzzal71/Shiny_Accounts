<?php 


foreach ($voucher_info as $value) {
    
}


 ?>

     <div style="margin-left: 195px;margin-top: 5px;float: left" class="container-fluid">
     <div class="row">
     <div class="col-sm-3">

     <?php 
     $user_type=$this->session->userdata('user_type');
//$user_type='Admin';
     if ($user_type=='Super Admin'){ ?>
       <a href="<?php echo base_url();?>Voucher_entry/approve_voucher/<?php echo $value->voucher_no ?>" class="btn btn-primary"


                                   onclick="return confirm('Are you sure?')" style="margin-left: 110px;margin-bottom: 0px;" >Approve</a>
         
     <?php } else { ?>
 <a href="<?php echo base_url();?>Voucher_entry/edit_voucher_info/<?php echo $value->voucher_no?>" class="btn btn-primary"


                                 style="margin-left: 110px;margin-bottom: 0px;" >Edit</a>
                                 <?php } ?>  </div>
   <div class="col-sm-3">
<?php if ($user_type!=='Operator') { ?>

<a href="<?php echo base_url();?>Voucher_entry/print_voucher/<?php echo $vvoucher_no ?>" target="_blank" class="btn btn-primary" style="margin-left: 669px;margin-top: 0px;">Print</a>  

<?php }else{ ?>

<div class="col-sm-3" style="margin-left: 669px;margin-top: 0px;">
</div>

<?php } ?>
   


      </div>
</div>
</div>


 <!-- <div class="row">
                 <a href="<?php echo base_url();?>Voucher_entry/approve_voucher/<?php echo $value->voucher_no ?>" class="btn btn-primary"
                                   onclick="return confirm('Are you sure?')" style="margin-left: 1080px;margin-top: 40px;margin-bottom: 0px;" >Approve</a>

                        <a href="<?php echo base_url();?>Voucher_entry/print_voucher/<?php echo $vvoucher_no ?>" target="_blank" class="btn btn-primary" style="margin-left: 1138px;margin-top: 40px">Print</a>

                    </div> -->
<div id="printReport" style="font-family: 'Palatino Linotype';width: 1300px;">
    <div id="table-caption" class="row">
        <div class="col-md-3"></div>
        <div id="company-name" class="col-md-8" style="background-color: white;text-align: center;margin-bottom: 0px;">
            <h5><b>2RA TECHNOLOGY LIMITED</b></h5>
            <h6><b>3<sup>rd</sup> Floor, House# 294, Lane# 04, Mirpur DOHS, Dhaka</b></h6>
            <!-- <h4><b><u>BILL</u></b></h4><br> -->
            <table style="margin-left: 330px;margin-bottom: 0px;"><tr><th style="border:0;"><h4 style="font-size: 17px;margin-bottom: 0px;"><b><u>BILL</u></b></h4></th><td style="border:0;"><h9 style=" margin-left: 70px;font-size: 13px;margin-bottom: 0px;">Print:<?php echo date("Y-m-d h:i:s a"); ?></h9></td></tr></table>
        </div>
        <div class="col-md-2"></div>

            <?php $this->load->view('inwords');
             $voucher = new Words(); ?>

        <div class="row" style="margin-left: 106px;width: 100%">
            <div class="col-md-1"></div>
            <div class="col-md-8"  style="background-color: white">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3 style="float: left; margin-left: 0px; margin-top: 0px; margin-bottom: 0px" >
                        <?php
                        $voucher_information=$voucher_info;

                      //  print_r($voucher_info);exit();
                        foreach ($voucher_information as $voucher_info) {
                            
                        }
                        echo '<p style="float: left;margin-left: 0px;margin-top: 0px;margin-bottom: 0px">Name : '.$voucher_info->employee_name.'</p>'
                        ?>
                    </div>
                    <div class="col-md-4"  style="margin-top: 0px;">
                        <?php
                        echo '<p style="float: left;margin-left: 30px;margin-top: 0px;margin-bottom: 0px">Designation : '.$voucher_info->employee_designation.'</p>'
                        ?>
                    </div>
                    <?php if ($voucher_info->is_support==1) {
                       $type='S';
                    }if($voucher_info->is_support==0){
                         $type='P';
                    } ?>
                    <div class="col-md-3"  style="margin-top: 0px;">
                        <?php
                        echo '<p style="float: left;margin-left: 0px;margin-top: 0px;margin-bottom: 0px">Project:'.$type.'-'.$voucher_info->project_name.'</p>'
                        ?>
                    </div>

                    <div class="col-md-1"  style="margin-top: 0px;"></div>
                </div><br>
                <div class="row">
                    <div class="col-md-1 style="float: left; margin-left: 0px; margin-top: 0px; margin-bottom: 0px "></div>
                    <div class="col-md-3 " style="float: left;margin-left: 0px;margin-top: 0px;margin-bottom: 0px >
                        <?php
                        echo '<p style="float: left;margin-left: 0px;margin-top: 0px;margin-bottom: 0px">Expense Type : '.$voucher_info->expense_type.'</p>'
                        ?>
                    </div>
                    <div class="col-md-4"  style="margin-top: 0px;">
                        <?php
                        echo '<p style="float: left;margin-left: 30px;margin-top: 2px;margin-bottom: 0px">Voucher No : '.$voucher_info->voucher_no.'</p>'
                        ?>
                    </div>
                    <div class="col-md-3"  style="margin-top: 0px;">
                        <?php
                        echo '<p style="float: left;margin-left: 5px;margin-top: 0px;margin-bottom: 0px" >Date : '.$voucher_info->date.'</p>'
                           ?> 
                    </div>

                </div><br>

                <div class="row" style="margin-left: 0px;margin-top: 0px;margin-bottom: 0px">

                    <div id="custom-table row" style="background-color: white;padding: 1px ">

                        <?php
                        if ($voucher_info->expense_type == 'Transport'){
                        ?>
                        <div class="col-md-1"></div>
                        <div class="table-responsive" id="custom-table" >
                            <table class="col-md-10"  style="border: 1px solid black">
                                <thead>
                                <tr>
                                    <th align="center" width="30" style="border-collapse: collapse;border: 1px solid black;font-size: 14px" ><b>SL No.</b></th>
                                    <th align="center" width="130" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>From</b></th>
                                    <th align="center" width="130" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>To</b></th>
                                    <th align="center" width="130" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>Vehicle</b></th>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>Amount(BDT)</b></th>
                                    <th align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>Remarks</b></th>
                                </tr>
                                </thead>
                                <?php
                                $totalAmount = 0;
                              
                                $serial = 0;
                                    if ($voucher_information !==" ") {


                                     $voucher_info = $voucher_information;

                                     //print_r($voucher_info);exit();

                                //            $voucher_info= new stdClass();

                                // foreach ($voucher_information as $k=> $v) {
                                //     $voucher_info->{$k} = $v;
                                // }
                                foreach ($voucher_info as $Voucher) {


                                    // print_r($Voucher);exit();
                                    // echo "</br>";
                                $serial++;
                                $totalAmount += $Voucher->amount;
                                ?>
                                <tbody>
                                <tr>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $serial?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $Voucher->from_place ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $Voucher->to_place?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $Voucher->vehicle?></td>
                                    <td  style="border-collapse: collapse;border: 1px solid black;font-size: 14px;border: 1px solid black;text-align: right;"><?php echo $Voucher->amount ?></td>
                                    <td align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $Voucher->remarks;?></td>
                                </tr>
                                <?php
                                }}
                                 else {
                                    ?>
                                    <tr>
                                        <td colspan="9" align="center">
                                            <?php echo "No Data Available " ?>

                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                <tr>
                                    <td colspan="4" style="text-align: right!important;width: 50px!important;border-collapse: collapse;border: 1px solid black;font-size: 14px"">
                                        <?php echo "Total Amount: " ?>

                                    </td>
                                    <td align="center" style="text-align: right;">
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
                                    <td align="center" style="border: 1px solid black;">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="table-responsive" id="custom-table"  >
                            <div class="col-md-1"></div>
                            <table style="border: 1px solid black" class="col-md-10">
                                <thead>
                                <tr style="border: 1px solid black">
                                    <th align="center" align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>SL No.</b></th>
                                    <th align="center" style="width: 300px" align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>Description</b></th>
                                    <th align="center" align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>Amount(BDT)</b></th>
                                    <th align="center" align="center" style="border-collapse: collapse;border: 1px solid black;font-size: 14px"><b>Remarks</b></th>
                                </tr>
                                </thead>
                                <?php
                                    $totalAmount=0;
                                if ($voucher_information !==" ") {
                                    $voucher_info = $voucher_information;
                                $serial=0;
                                 foreach ($voucher_info as $Voucher) {


                                    // print_r($Voucher);exit();
                                    // echo "</br>";
                                $serial++;
                                $totalAmount += $Voucher->amount;
                                ?>
                               
                                <tbody>
                                <tr>
                                    <td style="width: 50px!important;border-collapse: collapse;border: 1px solid black;font-size: 14px" ><?php echo $serial ?></td>
                                    <td style="width: 300px;border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $Voucher->description ?></td>
                                    <td  style="width: 70px!important;border-collapse: collapse;border: 1px solid black;font-size: 14px;text-align: right"><?php echo $Voucher->amount ?></td>
                                    <td style="width: 70px!important;border-collapse: collapse;border: 1px solid black;font-size: 14px"><?php echo $Voucher->remarks; ?></td>
                                </tr>
                                <?php }}else{
                                    ?>
                                    <tr>
                                        <td colspan="9" align="center">
                                            <?php echo "No Data Available " ?>

                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right!important;width: 50px!important;border-collapse: collapse;border: 1px solid black;font-size: 14px"">
                                        <?php echo "Total Amount: " ?>

                                    </td>
                                    <td style="text-align: right" >
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
                                    <td style="border: 1px solid black;">

                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>

                        <?php

                        //print_r($inWords);exit();
                    } 
                    ?>
                    <div class="col-md-1"></div>
                    <?php
                    echo '<p style="margin-left: 10px;margin-top: 2%"><b>In Words </b>: '.$inWords.' Taka'.$inWords2.' Only </p><br>';
                     ?>
                    <div style="height: 70px;">
                        <div style="float: left;margin-left: 93px">
                            <p><u>Submitted by</u></p>
                        </div>
                        <div style="float: left;margin-left: 200px">
                            <p><u>Verified by</u></p>
                        </div>
                        <div style="float: left;margin-left: 200px">
                            <p><u>Approved by</u></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-2"></div>
    </div>
</div>
 
<script>
    function printDiv() {
//        console.log(elementId);
        var divToPrint = document.getElementById('printReport').innerHTML;
        var myWindow=window.open();
        myWindow.document.write(divToPrint);
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();
    }

</script>