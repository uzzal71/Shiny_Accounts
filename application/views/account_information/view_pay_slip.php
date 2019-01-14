
<!DOCTYPE html>
<html>

<head>
    <title>
       <?php echo $company_data->full_name;  ?>
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
<div id="printReport" style="font-family: 'Palatino Linotype'">
    <div style="float: left;max-width: 340px;border: 1px solid black;padding: 2px">
        <div style="text-align: center;line-height: 0.5px;">
            <h3 style="padding: 0px;margin-top: 10px;"><?php echo $company_data->full_name; ?></h3>
            <p style="padding: 0px;"><?php echo $company_data->address; ?></p>
        </div>
       <div style="width: 340px;margin-top:20px;">
            <div style="width: 100px;float: left;margin-left: 5px;">
            <br>
            </div>
            <div style="width: 100px;float: left; margin-left: 20px;">
                <b style="border-bottom: 1px solid black;text-align: center;">Pay Slip</b>
            </div>
            <div style="width: 100px;float: right;">
                <b style="border: 1px solid black">Office Copy</b>
            </div>
        </div>
        <div style="width: 330px;">
            <div style="width: 110px;float: left;">
                <p style="font-size: 15px;">Month:<?php echo $slip_data->month ?></p>
            </div>
            <div style="width: 220px;float: right;">
                <p style="text-align: right; font-size: 15px;">Payment Date:<?php echo date('d/m/Y'); ?></p>
            </div>
        </div>        
        <div style="width: 340px">
            <table>
                <tr>
                    <td>Name of Emp</td>
                    <td>:</td>
                    <td><?php echo $slip_data->employee_name; ?></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td>:</td>
                    <td><?php echo $slip_data->designation; ?></td>
                </tr>
                <tr>
                    <td>ID No</td>
                    <td>:</td>
                    <td><?php echo $slip_data->employee_id; ?></td>
                </tr>
                <tr>
                    <td>Sec/Dept</td>
                    <td>:</td>
                    <td><?php echo $slip_data->department; ?></td>
                </tr>
                <tr>
                    <td>Date of Joining</td>
                    <td>:</td>
                    <td><?php echo $slip_data->joining_date; ?></td>
                </tr>
                <tr>
                    <td>Basic Salary</td>
                    <td>:</td>
                    <td><?php echo $slip_data->basic_salary; ?></td>
                </tr>
               
                <tr>
                    <td>Total Amount</td>
                    <td>:</td>
                    <?php 
                    $total=0;
                    $basic_salary=$slip_data->basic_salary;
                    $attendance_bonus=$slip_data->attendence_bonus;
                     $medical_allowance=$slip_data->medical_allowance;
                     $house_rent_allowance=$slip_data->house_rent_allowance;
                     $phone_bill_allowance=$slip_data->phone_bill_allowance;
                     $transport_allowance=$slip_data->transport_allowance;
                     $over_time_salary=$slip_data->over_time_salary;
                      $night_allowance=$slip_data->night_allowance;
                      $deductive_amount=$slip_data->deductive_amount;

                      $total_amount=($basic_salary+$attendance_bonus+$medical_allowance+$house_rent_allowance+$phone_bill_allowance+$transport_allowance+$over_time_salary+$night_allowance);
                      $total=$total_amount-$deductive_amount;

                     ?>
                    <td><?php echo $total_amount; ?></td>
                </tr>
                <tr>
                    <td>Deduction<br>(Advance Loan)</td>
                    <td>:</td>
                    <td><?php echo  $deductive_amount; ?></td>
                </tr>
                <tr>
                    <td>Total Payable Amount</td>
                    <td>:</td>
                    <td><?php echo $total; ?></td>
                </tr>
            </table>
        </div>
        <div style="width: 340px;margin-top:20px;">
            <div style="width: 100px;float: left;margin-left: 5px;">
                <b style="border-top: 1px solid black;font-size: 14">Employe Sig.</b>
            </div>
            <div style="width: 100px;float: left; margin-left: 20px;">
                <b style="border-top: 1px solid black;text-align: center;font-size: 14">Account Dept.</b>
            </div>
            <div style="width: 100px;float: right;">
                <b style="border-top: 1px solid black;font-size: 14">Authorised Sig.</b>
            </div>
        </div>
    </div>
    <div style="float: right;max-width: 340px;border: 1px solid black;padding: 2px">
        <div style="text-align: center;line-height: 0.5px;">
            <h3 style="padding: 0px;margin-top: 10px;"><?php echo $company_data->full_name; ?></h3>
            <p style="padding: 0px;"><?php echo $company_data->address; ?></p>
        </div>
       <div style="width: 340px;margin-top:20px;">
            <div style="width: 100px;float: left;margin-left: 5px;">
            <br>
            </div>
            <div style="width: 80px;float: left; margin-left: 20px;">
                <b style="border-bottom: 1px solid black;text-align: center;">Pay Slip</b>
            </div>
            <div style="width: 120px;float: right;">
                <b style="border: 1px solid black">Employee Copy</b>
            </div>
        </div>
        <div style="width: 330px;">
            <div style="width: 110px;float: left;">
                <p style="font-size: 15px;">Month:<?php echo $slip_data->month ?></p>
            </div>
            <div style="width: 220px;float: right;">
                <p style="text-align: right; font-size: 15px;">Payment Date:<?php echo date('d/m/Y'); ?></p>
            </div>
        </div>        
        <div style="width: 340px">
            <table>
                <tr>
                    <td>Name of Emp</td>
                    <td>:</td>
                    <td><?php echo $slip_data->employee_name; ?></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td>:</td>
                    <td><?php echo $slip_data->designation; ?></td>
                </tr>
                <tr>
                    <td>ID No</td>
                    <td>:</td>
                    <td><?php echo $slip_data->employee_id; ?></td>
                </tr>
                <tr>
                    <td>Sec/Dept</td>
                    <td>:</td>
                    <td><?php echo $slip_data->department; ?></td>
                </tr>
                <tr>
                    <td>Date of Joining</td>
                    <td>:</td>
                    <td><?php echo $slip_data->joining_date; ?></td>
                </tr>
                <tr>
                    <td>Basic Salary</td>
                    <td>:</td>
                    <td><?php echo $slip_data->basic_salary; ?></td>
                </tr>
               
                <tr>
                    <td>Total Amount</td>
                    <td>:</td>
                    <?php 
                    $total=0;
                    $basic_salary=$slip_data->basic_salary;
                    $attendance_bonus=$slip_data->attendence_bonus;
                     $medical_allowance=$slip_data->medical_allowance;
                     $house_rent_allowance=$slip_data->house_rent_allowance;
                     $phone_bill_allowance=$slip_data->phone_bill_allowance;
                     $transport_allowance=$slip_data->transport_allowance;
                     $over_time_salary=$slip_data->over_time_salary;
                      $night_allowance=$slip_data->night_allowance;
                      $deductive_amount=$slip_data->deductive_amount;

                      $total_amount=($basic_salary+$attendance_bonus+$medical_allowance+$house_rent_allowance+$phone_bill_allowance+$transport_allowance+$over_time_salary+$night_allowance);
                      $total=$total_amount-$deductive_amount;

                     ?>
                    <td><?php echo $total_amount; ?></td>
                </tr>
                <tr>
                    <td>Deduction<br>(Advance Loan)</td>
                    <td>:</td>
                    <td><?php echo  $deductive_amount; ?></td>
                </tr>
                <tr>
                    <td>Total Payable Amount</td>
                    <td>:</td>
                    <td><?php echo $total; ?></td>
                </tr>
            </table>
        </div>
        <div style="width: 340px;margin-top:20px;">
            <div style="width: 100px;float: left;margin-left: 5px;">
                <b style="border-top: 1px solid black; font-size: 14">Employe Sig.</b>
            </div>
            <div style="width: 100px;float: left; margin-left: 20px;">
                <b style="border-top: 1px solid black;text-align: center; font-size: 14">Account Dept.</b>
            </div>
            <div style="width: 100px;float: right;">
                <b style="border-top: 1px solid black;font-size: 14">Authorised Sig.</b>
            </div>
        </div>
    </div>
    </div>
</div>
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
