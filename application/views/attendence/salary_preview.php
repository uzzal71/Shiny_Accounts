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


          $company_id = $this->session->userdata('company_id');

        $company_name = $this->session->userdata('company_name');


        $employee_ids = $this->session->userdata('employee_ids');

        $days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);

$all_employees = $this->Attendence_model->select_employee_info_by_employee_ids($employee_ids);

        $employee_info = array();
        foreach($all_employees as $each_employee)
        {
            $each_employee_info = array();
            $each_employee_info['employee_id'] = "$each_employee->employee_id";
            $each_employee_info['employee_name'] = "$each_employee->first_name $each_employee->last_name";
            $each_employee_info['card_id'] = "$each_employee->card_id";
            $each_employee_info['department'] = "$each_employee->department";
            $each_employee_info['shift'] = "$each_employee->shift";
            $each_employee_info['group_id'] = "$each_employee->group_id";
            $each_employee_info['weekend'] = "$each_employee->weekend";
            $each_employee_info['remarks'] = "$each_employee->remarks";
            $each_employee_info['basic_salary'] = "$each_employee->basic_salary";
            $each_employee_info['gross_salary'] = "$each_employee->gross_salary";
            $each_employee_info['is_transport_allowance'] = "$each_employee->is_transport_allowance";
            $each_employee_info['transport_allowance_amount'] = "$each_employee->transport_allowance_amount";       
            $each_employee_info['is_medical_allowance'] = "$each_employee->is_medical_allowance";
            $each_employee_info['medical_allowance_amount'] = "$each_employee->medical_allowance_amount";   
            $each_employee_info['is_house_rent_allowance'] = "$each_employee->is_house_rent_allowance";
            $each_employee_info['house_rent_allowance_amount'] = "$each_employee->house_rent_allowance_amount";     
            $each_employee_info['is_phone_bill_allowance'] = "$each_employee->is_phone_bill_allowance";
            $each_employee_info['phone_bill_allowance_amount'] = "$each_employee->phone_bill_allowance_amount";
            $each_employee_info['is_attendence_bonus'] = "$each_employee->is_attendence_bonus";
            $each_employee_info['attendence_bonus_amount'] = "$each_employee->attendence_bonus_amount";
            array_push($employee_info,$each_employee_info);
        }

        $i=0;
        $serial_no =0;
        for($i; $i <sizeof($employee_info); $i++)
        {
            $serial_no++;
            $calculated_salary = 0;
            $deductive_salary = 0;
            $attendence_bonus_amount = 0;
            $transport_allowance_amount = 0;
            $is_transport_allowance = 0;
            $over_time_salary = 0;
            $no_of_night_duty = 0;
            $night_allowance = 0;
            $deductive_amount = 0;
            $attendence_bonus = 0;
            $medical_allowance = 0;
            $house_rent_allowance = 0;
            $phone_bill_allowance = 0;
            $transport_allowance =0;
            /*############################ Employee #############################*/
        
            $employee_id=$employee_info[$i]['employee_id'];
            $employee_name=$employee_info[$i]['employee_name'];
            $card_id=$employee_info[$i]['card_id'];
            $department=$employee_info[$i]['department'];
            $shift=$employee_info[$i]['shift'];
            $group_id=$employee_info[$i]['group_id'];
            $weekend=$employee_info[$i]['weekend'];
            $basic_salary=$employee_info[$i]['basic_salary'];
            $gross_salary=$employee_info[$i]['gross_salary'];
            $is_transport_allowance = $employee_info[$i]['is_transport_allowance'];
            $transport_allowance_amount = $employee_info[$i]['transport_allowance_amount'];
            $is_medical_allowance = $employee_info[$i]['is_medical_allowance'];
            $medical_allowance_amount = $employee_info[$i]['medical_allowance_amount'];
            $is_house_rent_allowance = $employee_info[$i]['is_house_rent_allowance'];
            $house_rent_allowance_amount = $employee_info[$i]['house_rent_allowance_amount'];
            $is_phone_bill_allowance = $employee_info[$i]['is_phone_bill_allowance'];
            $phone_bill_allowance_amount = $employee_info[$i]['phone_bill_allowance_amount'];
            $is_attendence_bonus = $employee_info[$i]['is_attendence_bonus'];
            $attendence_bonus_amount = $employee_info[$i]['attendence_bonus_amount'];
            
            $date_from = $year."-".$month."-"."01";
            $date_to = $year."-".$month."-".$days_in_month;
            $month_year = date("F, Y", strtotime($date_from));
            
            /*############################ Salary Set up Info #############################*/
        
            $salary_setup_info = $this->Attendence_model->select_salary_setup_info();
            
            $per_day_salary_for_over_time = $basic_salary / 26;
            
            $late_allowed = $salary_setup_info->late_allowed;
            $early_out_allowed = $salary_setup_info->early_out_allowed;
            $allowed_attendence_bonus_leave_limit = $salary_setup_info->allowed_attendence_bonus_leave_limit;
            $over_time_rate = $salary_setup_info->over_time_rate;
            $night_allowance_amount = $salary_setup_info->night_allowance_amount;

            $employee_attendence_info = $this->Attendence_model->select_employee_attendence_info($employee_id,$company_id,$date_from,$date_to);


            if($employee_attendence_info)
            {

           // echo '<pre>';
            //print_r($employee_attendence_info);
            //exit();
                $absent = $employee_attendence_info->absent;
                $late = $employee_attendence_info->late;
                $early_out = $employee_attendence_info->early_out;
                $no_of_leave_day = $employee_attendence_info->no_of_leave_day;
                $shift_id = $employee_attendence_info->shift_id;
                $over_time = $employee_attendence_info->over_time;
                $no_of_night_duty = $employee_attendence_info->night_status;
                
                /*############################ Salary Minus Day Calculation #############################*/
                
                $salary_minus_day_for_late = floor($late / ($late_allowed));
                $salary_minus_day_for_early_out = floor($early_out / ($early_out_allowed));
                $salary_minus_day = $salary_minus_day_for_late + $salary_minus_day_for_early_out;   
                
                /*############################ Attendence Bonus Calculation #############################*/
                
                if($absent == '0' && $no_of_leave_day <= $allowed_attendence_bonus_leave_limit)
                {
                    $attendence_bonus = $attendence_bonus_amount;
                }
                else
                {
                    $attendence_bonus = 0;
                }           

                /*############################ Overtime Salary Calculation #############################*/
                if($over_time)
                {
                    $per_hour_salary_for_over_time = $per_day_salary_for_over_time / 8;
                    $over_time_salary = floor(($over_time_rate * $per_hour_salary_for_over_time) + 1);
                }
                /*############################ Transport Allowance Calculation #############################*/
                if($is_transport_allowance == '1')
                {   
                    $transport_allowance = $transport_allowance_amount;
                }
                else
                {
                    $transport_allowance = 0;
                }               

                /*############################ Medical Allowance Calculation #############################*/
                if($is_medical_allowance == '1')
                {   
                    $medical_allowance = $medical_allowance_amount;
                }
                else
                {
                    $medical_allowance = 0;
                }           

                /*############################ House Rent Allowance Calculation #############################*/
                if($is_house_rent_allowance == '1')
                {   
                    $house_rent_allowance = $house_rent_allowance_amount;
                }
                else
                {
                    $house_rent_allowance = 0;
                }               

                /*############################ Phone Bill Allowance Calculation #############################*/
                if($is_phone_bill_allowance == '1')
                {   
                    $phone_bill_allowance = $phone_bill_allowance_amount;
                }
                else
                {
                    $phone_bill_allowance = 0;
                }               

                /*############################ Attendence Allowance Calculation #############################*/
                if($is_attendence_bonus == '1')
                {   
                    $attendence_bonus = $attendence_bonus_amount;
                }
                else
                {
                    $attendence_bonus = 0;
                }   
                
                /*############################ Night Allowance Calculation #############################*/
                if($no_of_night_duty)
                {   
                    $night_allowance = $no_of_night_duty * $night_allowance_amount;
                }
                /*############################ Deductive Amount Calculation #############################*/

                $deductive_month = $year."-".$month;

                $deductive_salary_info = $this->Attendence_model->deductive_salary_info($employee_id,$deductive_month);

                if($deductive_salary_info){
                    $deductive_amount = $deductive_salary_info->total_amount;
                }
                else
                {
                    $deductive_amount = 0;
                }

                /*############################ Preview Salary Calculation #############################*/
                $per_day_salary_by_basic_salary = $basic_salary / 26;
                $allowed_day_for_salary = 26 - $absent - $salary_minus_day;
                $calculated_salary = $allowed_day_for_salary * $per_day_salary_by_basic_salary;
                //echo $night_allowance;exit();
                $calculated_salary = $calculated_salary + $attendence_bonus + $medical_allowance +$house_rent_allowance + $phone_bill_allowance + $transport_allowance + $over_time_salary + $night_allowance;
                $deductive_salary = $calculated_salary - $deductive_amount;
            }
            //  echo '<pre>';
           // print_r($employee_id);
           // exit();

            $data = array();
            $data['company_id'] = $company_id;
            $data['employee_id'] = $employee_id;
            $data['employee_name'] = $employee_name;
            $data['month'] = $month_year;
            $data['calculated_salary'] = $calculated_salary;
            $data['deductive_salary'] = $deductive_salary;
            $data['recording_time'] = date("y-m-d h:i:s");
            $data['recorded_by'] = $this->session->userdata('id');
            //echo $month_year;exit();
            ?>
    <tr>
                            
        <td><?php echo $serial_no;?></td>
        <td><input type= "text" id = "employee_id" name = "employee_id" readonly  class="employee_id" value = "<?php echo $employee_id;?>"  ></input></td>
        <td><input type= "text" id = "employee_name" name = "employee_name" readonly  class="employee_name" value = "<?php echo $employee_name;?>"></input></td>
        <td><input type= "number" id = "basic_salary" class="basic_salary" readonly  value = "<?php echo $basic_salary;?>"></input></td>
        <td><input type= "number" id = "deductive_salary" name = "deductive_salary" class="deductive_salary"  value = "<?php echo $deductive_salary;?>"></input></td>
        <td><input type= "number" id = "attendence_bonus" name = "attendence_bonus" class="attendence_bonus"  value = "<?php echo $attendence_bonus;?>"></input></td>
        <td><input type= "number" id = "medical_allowance" name = "medical_allowance" class="medical_allowance"  value = "<?php echo $medical_allowance;?>"></input></td>
        <td><input type= "number" id = "house_rent_allowance" name = "house_rent_allowance" class="house_rent_allowance"  value = "<?php echo $house_rent_allowance;?>"></input></td>
        <td><input type= "number" id = "phone_bill_allowance" name = "phone_bill_allowance" class="phone_bill_allowance"  value = "<?php echo $phone_bill_allowance;?>"></input></td>
        <td><input type= "number" id = "transport_allowance" name = "transport_allowance" class="transport_allowance"  value = "<?php echo $transport_allowance;?>"></input></td>
        <td><input type= "number" id = "over_time_salary" name = "over_time_salary" class="over_time_salary"  value = "<?php echo $over_time_salary;?>"></input></td>
        <td><input type= "number" id = "night_allowance" name = "night_allowance" class="night_allowance"  value = "<?php echo $night_allowance;?>"></input></td>
        <td><input type= "number" id = "deductive_amount" name = "deductive_amount" class="deductive_amount"  value = "<?php echo $deductive_amount;?>"></input></td>
    
        
    </tr>
   <?php  }

    ?>
        <td><input type= "hidden" id = "month_year" name = "month_year" class="month_year" value = "<?php echo $month_year;?>"></input></td>
                         
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
                    url: '<?php echo base_url();?>Attendence/save_final_salary',
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



