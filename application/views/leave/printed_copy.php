
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
</div>
<div id="printReport" style="font-family: 'Palatino Linotype'">
    <div id="table-caption" class="row" style="margin-bottom: 0px">
        <div class="col-md-2"></div>
        <div id="company-name" class="col-md-8" style="background-color: white;text-align: center">
            <h5 style="margin-bottom: 0px;font-size: 17px; margin-top:15px;"><b>2RA TECHNOLOGY LIMITED</b></h5>
            <h6 style="margin-top: 0px;margin-bottom:0px;font-size: 14px">Leave Application Form</h6>
            <p style=" margin-bottom: 0px;margin-top: 5px; margin-left: 500px;" ><?php echo 'Print:'.date("Y-m-d h:i:s a"); ?></p>
            <br>        
    </div>   
            <div style="margin-top: 0px;" style="border: 2px solid black; " >

     <table style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;" >
         <tr>
             <th width="280px;" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;" >NAME OF THE EMPLOYEE</th>
              <th width="180px;" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;" >EMP CODE</th>
                <th width="190px;" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;" >DESIGNATION</th>
                <th width="180px;" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;">DEPARTMENT</th>

         </tr>
         <tr >
            <td align="center" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;" ><?php echo $employee_details->first_name.' '. $employee_details->last_name; ?></td> 
            <td align="center" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;" ><?php echo $employee_details->employee_id ?></td>
            <td align="center" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;"><?php echo $employee_details->designation ?></td> 
            <td align="center" style=" border-collapse: collapse; border: 2px solid black;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 0px;"><?php echo $employee_details->department ?></td>

         </tr>
         <tr><td colspan="4">&nbsp;</td></tr>
         <tr>
             
            <td>&nbsp;Period of Leave:<b><?php if($each_applied_leave->half_full_day=='full_day'){

                echo "Full Day";
            }else if ($each_applied_leave->half_full_day=='second_half') {
                echo "Second Half";
            } else{

                 echo "First Half";
            }

                ?></b></td>
            <td>From:<b><?php echo $each_applied_leave->date_time_from; ?></b></td>
            <td>To:<b><?php echo $each_applied_leave->date_time_to; ?></b></td>
            <td>Leave Type:<b><?php echo $each_applied_leave->leave_types; ?></b></td>
         </tr>
         <tr><td colspan="4">&nbsp;</td></tr>
         <tr>
            <td colspan="4">&nbsp;Address During Leave:<b><?php echo $each_applied_leave->adl; ?></b></td>
         </tr>
         <tr><td colspan="4">&nbsp;</td></tr>
         <tr>
            <td colspan="4">&nbsp;Contact Number:</td>
         </tr>
         <tr>
             <td colspan="4">&nbsp;Remarks:<b><?php echo $each_applied_leave->remarks; ?></b></td> 
             <tr><td colspan="4">&nbsp;</td></tr>
         </tr>
         <tr>
             <td colspan="3">&nbsp;Duties will be carried out by(Name and Signature)&nbsp;&nbsp;________________             </td>
             <td colspan="1">_________________</td> 
         </tr>
          <tr>
             <td colspan="2">&nbsp;(Please write 'NA' if applicable)</td> 
             <td colspan="1"></td> 
             <td colspan="1"> Signature(Applicant)</td>
         </tr>
          <tr>
            <td colspan="2"></td> 
             <td colspan="2"></td> 
             <tr><td colspan="4">&nbsp;</td></tr>
         </tr>
          <tr>
            <td colspan="1">&nbsp;</td>
            <td colspan="1">&nbsp;</td>
            <td colspan="1">&nbsp;_____________</td> 
             <td colspan="1">&nbsp;________________</td> 
         </tr>
          <tr>
            <td colspan="1">&nbsp;</td>
            <td colspan="1">&nbsp;</td>
            <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;<b>Verified by</b></td> 
             <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;<b>Approved by</b></td> 
             
         </tr>
         <tr><td colspan="4">&nbsp;</td></tr>
     </table>
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
