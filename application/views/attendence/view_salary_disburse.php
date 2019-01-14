<br><br>
    <div class="row" id="ItemsRow">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
            <div class="panel-heading" align="center"><b>Salary Preview-<?php 

        $month = $this->session->userdata('month');

        $year = $this->session->userdata('year');
        $month_year_heading = date("F, Y", strtotime($year.'-'.$month));
         echo $month_year_heading;?></b></div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                    <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                         <th align="center">Basic Salary</th>
                         <th align="center">Gross Salary</th>
                         <th align="center">Attendance</th>
                         <th align="center">Medical</th>
                         <th align="center">House Rent</th>
                         <th align="center">Phone Bill</th>
                         <th align="center">Transport</th>
                        <th align="center">Over Time</th>
                        <th align="center">Night</th>
                        <th align="center">Penalty</th>
                     
                        
                    </tr>
                    </thead>
               
                            <tbody>

                            <?php 
                            $serial_no=0;
                            foreach ($disbured_data as  $data) { $serial_no++; ?>
                         

    <tr>
                            
        <td><?php echo $serial_no;?></td>
        <td><input type= "text" id = "employee_id" name = "employee_id" readonly  class="employee_id" value = "<?php echo $data->employee_id;?>"  ></input></td>
        <td><input type= "text" id = "employee_name" name = "employee_name" readonly  class="employee_name" value = "<?php echo $data->employee_name;?>"></input></td>
        <td><input type= "number" id = "basic_salary" class="basic_salary" readonly  value = "<?php echo $data->basic_salary;?>"></input></td>
        <td><input type= "number" id = "deductive_salary" name = "deductive_salary" class="deductive_salary"  value = "<?php echo $data->gross_salary;?>"></input></td>
        <td><input type= "number" id = "attendence_bonus" name = "attendence_bonus" class="attendence_bonus"  value = "<?php echo $data->attendence_bonus;?>"></input></td>
        <td><input type= "number" id = "medical_allowance" name = "medical_allowance" class="medical_allowance"  value = "<?php echo $data->medical_allowance;?>"></input></td>
        <td><input type= "number" id = "house_rent_allowance" name = "house_rent_allowance" class="house_rent_allowance"  value = "<?php echo $data->house_rent_allowance;?>"></input></td>
        <td><input type= "number" id = "phone_bill_allowance" name = "phone_bill_allowance" class="phone_bill_allowance"  value = "<?php echo $data->phone_bill_allowance;?>"></input></td>
        <td><input type= "number" id = "transport_allowance" name = "transport_allowance" class="transport_allowance"  value = "<?php echo $data->transport_allowance;?>"></input></td>
        <td><input type= "number" id = "over_time_salary" name = "over_time_salary" class="over_time_salary"  value = "<?php echo $data->over_time_salary;?>"></input></td>
        <td><input type= "number" id = "night_allowance" name = "night_allowance" class="night_allowance"  value = "<?php echo $data->night_allowance;?>"></input></td>
        <td><input type= "number" id = "deductive_amount" name = "deductive_amount" class="deductive_amount"  value = "<?php echo $data->deductive_amount;?>"></input></td>
    
        
    </tr>
   <?php  }

    ?>
        <input type= "hidden" id = "month_year" name = "month_year" class="month_year" value = "<?php echo $month_year;?>"></input>
                         
                            </tbody>

                </table>
                 <button type="button" class="btn btn-success pull-right" id = "btn_salary">Disburse</button>
                <button type="button" class="btn btn-warning pull-right " id = "cancel">Cancel</button>
                
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <script type="text/javascript">

    $(document).ready(function() {


        $("#cancel").click(function(){

            location.assign("<?php echo base_url();?>");
        });
        $("#ItemsRow").on('click','#btn_salary',function(){
        //$("#btn_salary").click(function(){
            
            //alert("Button Clicked");exit();
                //alert("validation true");
            var month_year = $('#month_year').val().trim();
            alert(month_year);
            var employee_id= new Array();
            $('.employee_id').each(function(){
                employee_id.push($(this).val().trim());
            });


            var employee_name= new Array();
            $('.employee_name').each(function(){
                employee_name.push($(this).val().trim());
            });


             var basic_salary= new Array();
            $('.basic_salary').each(function(){
                basic_salary.push($(this).val().trim());
            });

            var deductive_salary= new Array();
            $('.deductive_salary').each(function(){
                deductive_salary.push($(this).val().trim());
            });

             var attendence_bonus= new Array();
            $('.attendence_bonus').each(function(){
                attendence_bonus.push($(this).val().trim());
            });
            var medical_allowance= new Array();
            $('.medical_allowance').each(function(){
                medical_allowance.push($(this).val().trim());
            });

             var house_rent_allowance= new Array();
            $('.house_rent_allowance').each(function(){
                house_rent_allowance.push($(this).val().trim());
            });

            var phone_bill_allowance= new Array();
            $('.phone_bill_allowance').each(function(){
                phone_bill_allowance.push($(this).val().trim());
            });

             var transport_allowance= new Array();
            $('.transport_allowance').each(function(){
                transport_allowance.push($(this).val().trim());
            });
            var over_time_salary= new Array();
            $('.over_time_salary').each(function(){
                over_time_salary.push($(this).val().trim());
            });

             var night_allowance= new Array();
            $('.night_allowance').each(function(){
                night_allowance.push($(this).val().trim());
            });

            var deductive_amount= new Array();
            $('.deductive_amount').each(function(){
                deductive_amount.push($(this).val().trim());
            });

             
         
        


            //alert(account);
            var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Attendence/save_disbursed_salary',
                    data:{ 
                            employee_id : employee_id,
                            month_year : month_year,
                            employee_name : employee_name,
                            basic_salary : basic_salary,
                            deductive_salary : deductive_salary,
                            attendence_bonus : attendence_bonus,
                            medical_allowance : medical_allowance,
                            house_rent_allowance : house_rent_allowance,
                            phone_bill_allowance : phone_bill_allowance,
                            transport_allowance : transport_allowance,
                            over_time_salary : over_time_salary,
                            night_allowance : night_allowance,
                       
                            deductive_amount : deductive_amount

                        
                        },
                    //timeout: 4000,
                    success: function(result) {
                        alert(result);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
                
   

        });
     $("#ItemsRow").on('click','#checkbox',function(){

      var employee_id =$(this).parent().parent().find('#employee_id').val();


        if($(this).prop('checked') == true){

           // alert (employee_id);
        }else {

           // alert('Nothing Found');
        }


        //alert (employee_id);


       
            
 });
        
    
            
        
                


    });
    

</script>



