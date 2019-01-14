    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">


            <div class="panel-heading">Voucher Update Form</div>

                    <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3>
 <form role="form" action="<?php echo base_url();?>voucher_entry/update_bill_info" method="post">

            <div class="table-responsive" id="custom-table">
            
                <table id="" class="table ">
                    <tbody>
                    <tr>
                      
                        <?php
                        $voucher_information=$voucher_info;

                            // print_r($voucher_information);exit();
                      //  print_r($voucher_info);exit();
                        foreach ($voucher_information as $voucher_info) {
                            
                        }?>
                       <th align="center">Vouchar No*</th>
                       <td align="center" width="30%"><input type="text" name="voucher_no" value="<?php echo $voucher_info->voucher_no?>" id="voucher_no" class="form-control custom-input" readonly required></td>                        
                       <th align="center">Date*</th>
                       <td align="center" width="30%"><input type="text" name="date" id="date" class="form-control custom-input dateFrom" value="<?php echo $voucher_info->date?>" required></td>

                    </tr>             

                    <tr>
                       
                       
                       <th align="center">Expense Type*</th>
                       <td align="center" width="30%">
                       <select name="expense_type" class="form-control  custom-input" id="expense_type" >
                        <option value="<?php echo $voucher_info->expense_type?>" selected><?php echo $voucher_info->expense_type?></option>
                        <?php foreach($expense_type as $v_expense_type){?>
                             <option value="<?php echo  $v_expense_type->expense_type?>"><?php echo  $v_expense_type->expense_type?></option>
                        <?php }?>
                       </select>
                       </td>     
                       
                       <th align="center">Employee ID*</th>
                       <td align="center" width="30%">
                       <select name="employee_id" class="form-control  custom-input" id="employee_id" >

                            
                        <?php foreach($view_employee_list as $v_employee_list){?>
                             <option value="<?php echo  $v_employee_list->employee_id?>" <?php   if ($v_employee_list->employee_id==$voucher_info->employee_id) {
                               echo "Selected";
                             }  ?>><?php echo  $v_employee_list->employee_id?></option>
                        <?php } ?>
                       </select>
                       </td>

                    </tr>           

                    <tr>
                      
                       <th align="center">Employee Name*</th>
                       <td align="center" width="30%"><input type="text" name="employee_name" id="employee_name" value="<?php echo $voucher_info->employee_name?>" class="form-control custom-input"readonly required></th>
                       
                        <th align="center">Customer Name*</th>
                        <td align="center" width="30%">
                            
                       <select name="customer_id" class="form-control  custom-input" id="customer_id" >
                            
                        <?php foreach($view_customer_list as $v_customer_list){?>
                              <option value="<?php echo $v_customer_list->customer_id?>"<?php if ($v_customer_list->full_name==$voucher_info->customer_name) { 
                               echo "selected";
                             } ?>><?php echo $v_customer_list->full_name?></option>
                        <?php }?>
                        
                       </select></td> 
                        
                    </tr>       

                    <tr>
                    
                        <th align="center">Project Name*</th>
                        <td align="center" width="30%">
                       <select name="project_id" class="form-control  custom-input" id="project_id" >

                            <option value="<?php echo $voucher_info->project_id?>" selected><?php echo $voucher_info->project_name?></option>
                       </select>
                       </td>  
                      
                       <th align="center">Project ID</td>
                        <td align="center" width="30%">
                      <input type="text" value="<?php echo $voucher_info->project_id?>" name="fake_project_name" id="fake_project_name" class="form-control custom-input" readonly >
                       <input type="hidden" value="<?php echo $voucher_info->project_name?>" name="project_name" id="project_name" ></td>
                    </tr>   

                    <tr>
                        <th align="center">Project Description</th>
                       
                        <td align="center" width="30%"><input type="text" name="project_description" value="<?php echo $voucher_info->project_description?>" id="project_description" class="form-control custom-input"readonly ></td> 

                          <th align="center">Type*</th>
                        <td align="center" width="30%">
                       <select name="type" class="form-control  custom-input" id="type" >
                      
                       <option value="1" <?php if ( $voucher_info->is_support=='1') {
                           echo "selected";
                       } ?>>Support</option>
                       <option value="0" <?php if ( $voucher_info->is_support=='0') {
                           echo "selected";
                       } ?> >Project</option>

                       </select>
                       </td>
                       </tr>
                       <tr>
                       <td></td>
                         <td align="center" width="30%"><input type="hidden" name="row_count" id="row_count" class="form-control custom-input" ></td>  
                      
                    </tr>
                    <tr>
                    <td colspan="4"> <hr></td>
                    </tr>
                    </tbody>
                  
                    </table>

<hr style="background-color: rebeccapurple;border-top-color: rebeccapurple;color: rebeccapurple;"><br>

<div id="ItemsRow">
                    <br><br>
                       <?php
                        //print_r($voucher_info);exit();
                        if ($voucher_info->expense_type=='Transport'){

                          // print_r($voucher_information);exit();
                                
                              
                               
                                  
                                             
                                     $voucher_info = $voucher_information; ?>

                                 <div >
                        <div id="transport_label">
                        <div class="form-group col-md-2">
                        <label class="control-label" for="from">From<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-2">
                        <label class="control-label" for="to">To<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-2">
                        <label class="control-label" for="vehicle">Vehicle<sup style="color: red">*</sup></label>
                        </div>
                        </div>
                        <div class="form-group col-md-6" id="description_label">
                        <label class="control-label" for="description">Description<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-3">
                        <label class="control-label" for="amount">Amount<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-3">
                        <label class="control-label" for="remark">Remark:</label>
                         </div>
                    </div>

<?php 
                       $serial = 0;  foreach ($voucher_info as $Voucher) { $serial++; ?>
                     <div id="<?php echo 'entry'.$serial?>" class="clonedInput row" id="row_counts" >
                                <div id="transport_div">
                                    <!-- Text input-->
                                    <div class="form-group col-md-2">
                                        <input id="from" name="<?php echo 'ID'.$serial.'_from'?>" value="<?php echo $Voucher->from_place?>" type="text" placeholder=""
                                               class="input_fn form-control" style="height: 30px">
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group  col-md-2">
                                        <input id="to" name="<?php echo 'ID'.$serial.'_to'?>" type="text" value="<?php echo $Voucher->to_place?>" placeholder=""
                                               class="input_ln form-control" style="height: 30px">
                                    </div>
                                    <div class="form-group  col-md-2">
                                        <select id="vehicle" name="<?php echo 'ID'.$serial.'_vehicle'?>" type="text" value="<?php echo $Voucher->vehicle?>" placeholder=""
                                                class="select_pn form-control" style="height: 30px">
                                            <option></option>
                                            <option <?php if ($Voucher->vehicle=='Rickshaw') echo 'selected'?>>Rickshaw</option>
                                            <option <?php if ($Voucher->vehicle=='Bus') echo 'selected'?>>Bus</option>
                                            <option <?php if ($Voucher->vehicle=='Rickshaw') echo 'CNG'?>>CNG</option>
                                            <option <?php if ($Voucher->vehicle=='Car') echo 'selected'?>>Car</option>
                                            <option <?php if ($Voucher->vehicle=='Train') echo 'selected'?>>Train</option>
                                            <option <?php if ($Voucher->vehicle=='Pick-Up') echo 'selected'?>>Pick-Up</option>
                                            <option <?php if ($Voucher->vehicle=='Micro-Bus') echo 'selected'?>>Micro-Bus</option>
                                            <option <?php if ($Voucher->vehicle=='Rickshaw-Van') echo 'selected'?>>Rickshaw-Van</option>
                                            <option <?php if ($Voucher->vehicle=='laguna') echo 'selected'?>>Laguna</option>
                                            <option <?php if ($Voucher->vehicle=='Auto-Rickshaw') echo 'selected'?>>Auto-Rickshaw</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group  col-md-3">
                                    <input id="amount" name="<?php echo 'ID'.$serial.'_amount'?>" type="number" value="<?php echo $Voucher->amount?>" placeholder=""  step="0.01" min="0"
                                           class="input_mn form-control" required="" style="height: 30px">
                                </div>

                                <div class="form-group  col-md-3">
                                    <input id="remark" name="<?php echo 'ID'.$serial.'_remark'?>" type="text" value="<?php echo $Voucher->remarks?>" placeholder=""
                                           class="input_on form-control" style="height: 30px">

                                               <input type="hidden" name="row_counts" id="row_countss" class="form-control custom-input" value="<?php echo $serial;  ?>" >
                                    <br>
                                </div>
                        </div>
                            <?php  } } else { 



                             $voucher_infos = $voucher_information;?>

                               <div id="entry">
                            <div class="form-group  col-md-6">
                                <th>Description*</th>
                            </div>
                                <div class="form-group  col-md-3">
                                    <th>Amount</th>
                                </div>
                                <div class="form-group  col-md-3">
                                    <th>Remarks</th>
                                    <br>
                                </div>
                        </div>



                   <?php     $serial = 0;  foreach ($voucher_information as $Vouchers) { $serial++; ?>

                        <div id="<?php echo 'entry'.$serial?>" class="clonedInput row" id="row_counts">
                            <div class="form-group  col-md-6">
                                <input id="description" name="<?php echo 'ID'.$serial.'_description'?>" type="text" value="<?php echo $Vouchers->description?>" placeholder=""
                                       class="input_qn form-control" required="" style="height: 30px">
                            </div>
                                <div class="form-group  col-md-3">
                                    <input id="amount" name="<?php echo 'ID'.$serial.'_amount'?>" type="number" value="<?php echo $Vouchers->amount?>" placeholder="" step="0.01" min="0"
                                           class="input_mn form-control" style="height: 30px">
                                </div>
                                <div class="form-group  col-md-2">
                                    <input id="remark" name="<?php echo 'ID'.$serial.'_remark'?>" type="text" value="<?php echo $Vouchers->remarks?>" placeholder=""
                                           class="input_on form-control" style="height: 30px">

                                            <input type="hidden" name="row_counts" id="row_countss" class="form-control custom-input" value="<?php echo $serial;  ?>" >
                                    <br>
                                </div>
  <div class="form-group  col-md-1">

                                <button type="button" id="remove" name="remove" class="btn btn-danger">Delete</button>
                                <br>
                            </div>


                        </div><!-- end #entry1 -->
                                <?php
                         }}?>

                    </div>
                       
                    <!-- end #entry1 -->
                    <!-- Button (Double) -->
                    <br>
                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                        <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button>
                    </p>

                    <p>

                        <button id="submit_button" name="" class="btn btn-primary">Submit</button>
                    </p>
                    </div>
                    </fieldset>
                      </div>
                </form>
            </div>
        </div>


        <div class="col-md-2"></div>
    </div>

<script type="text/javascript">
    $(document).ready(function() {


        $('#description_label').hide();
        $('#description_div').hide();
        $("#submit_button").click(function(){

            var row_count=$('#row_counts').val().trim();
            alert(row_count);
            //if(form_validation())
            {
                alert("validation true");
                
                var voucher_no       = $('#voucher_no').val().trim();
                var date         = $('#date').val().trim();
                var expense_type         = $('#expense_type').val().trim();
                var employee_id      = $('#employee_id').val().trim();
                var employee_name        = $('#employee_name').val().trim();
                var customer_id      = $('#customer_id').val().trim();
                var project_id       = $('#project_id').val().trim();
                var project_name         = $('#project_name').val().trim();
                var project_description      = $('#project_description').val().trim();

                var from= new Array();

                $('.from').each(function(){
                    from.push($(this).val().trim());
                });

                var to= new Array();
                $('.to').each(function(){
                    to.push($(this).val().trim());
                });

                var vehicle= new Array();
                $('.vehicle').each(function(){
                    vehicle.push($(this).val().trim());
                });  

                var amount= new Array();
                $('.amount').each(function(){
                    amount.push($(this).val().trim());
                });  

                var remarks= new Array();        
                $('.remarks').each(function(){
                    remarks.push($(this).val().trim());
                });  

                var descrioption= new Array();           
                $('.descrioption').each(function(){
                    descrioption.push($(this).val().trim());
                });
            

                //var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>voucher_entry/save_bill_info',
                    data:{ 
                            voucher_no: voucher_no, 
                            date: date, 
                            expense_type: expense_type,
                            employee_id: employee_id,
                            project_name: project_name,
                            customer_id: customer_id,
                            project_id: project_id,
                            project_id: project_id,
                            project_description: project_description,
                            from: from,
                            to: to,
                            vehicle: vehicle,
                            amount: amount,
                            remarks: remarks,
                            descrioption: descrioption
                        
                        },
                    //timeout: 4000,
                    success: function(result) {
                        response = result;
                        alert(response);
                        //$("#table_id tbody").html("");
                        //$("#table_id tbody").html(response);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
                
                //alert(response);
            
            }

        });

        $('#expense_type').change(function () {
            var value = this.value;
            if(value=="Transport")
            {
                $('#description_label').hide()
                $('#description_div').hide()
                $("#transport_label").show();
                $("#transport_div").show();
                $('#buttonSet1').show()
            } else {
                $("#transport_label").hide();
                $("#transport_div").hide();
                $("#description_label").show();
                $("#description_div").show();
                $('#buttonSet1').show()
            }
        });
        
        $("#employee_id").click(function(){
            //alert("Here");
            
            var employee_id      = $('#employee_id').val().trim();
                        
            var response;
            $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>employee/pick_employee_name',
                    data:{ 
                            employee_id: employee_id
                        },
                    //timeout: 4000,
                    success: function(result) {
                        response = result;
                        //alert(response);
                        $('#employee_name').val(response);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
                    

            //$('#employee_name').val(response);
        
        });



  $("#ItemsRow").on('click','#remove',function(){

      //alert('got it');
      var lastRow = $("#ItemsRow .clonedInput:last");

      //var expense_id =$(this).parent().parent().find('#expense_id').text();
     {
        var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");

        if (con==true) {

          $(this).parent().parent().remove();
          var num     = $('.clonedInput').length;
            newNum  = new Number(num - 1);
        }else {

        }
      }
      
    });



                $("#customer_id").change(function(){
            //alert("Here");
            var customer_id = $('#customer_id').val().trim();
            //var response;
            $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Project_tracking/pick_project_id_for_voucher',
                    data:{ 
                            customer_id: customer_id
                        },
                    //timeout: 4000,
                    success: function(result) {
                        response = result;
                        $('#project_id').html(response);
                        $('#project_name').val('');
                        $('#project_description').val('');
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
                    

            //$('#employee_name').val(response);
        
        });


        $("#project_id").change(function(){
            //alert("Here");
            
            var project_id = $('#project_id').val().trim();
                        
            var response;
            $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Project_tracking/pick_project_name_description',
                    data:{ 
                            project_id: project_id
                        },
                    //timeout: 4000,
                    success: function(result) {
                        response = result;
            var project_info = response.trim().split('#');
            //var item_name = item_info[0];
            var project_name = project_info[0];
            var project_description = project_info[1];
            
            $('#fake_project_name').val(project_id);
            $('#project_name').val(project_name);
            $('#project_description').val(project_description);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
                    

            //$('#employee_name').val(response);
        
        });
        
    });
    
$("#submit_button").on('click',function(){
    

        //alert('GOT IT');
        if($('#date').val().trim() == "")
        {
            alert("Please Select Date");
            $('#date').focus();
            return false;
        }
        else if($('#expense_type').val()== "select")
        {
            alert("Please Select Expense Type");
            $('#expense_type').focus();
            return false;
        }

        else if($('#employee_id').val()=="select")
        {
            alert("Please Select your Employee ID");
            $('#employee_id').focus();
            return false;
        }

        else if($('#customer_id').val()=="select")
        {
            alert("Please Select Customer Name");
            $('#customer_id').focus();
            return false;
        }


        else if($('#project_id').val()=="select")
        {
            alert("Please Select Project ID");
            $('#project_id').focus();
            return false;
        }

        else if($('#type').val()=="select")
        {
            alert("Please Select Type");
            $('#type').focus();
            return false;
        }


        return true;
            
    });
    
    
      // $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
      // $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });

    // $('.dateFrom').daterangepicker({
        
    //    singleDatePicker: true,
    //     showDropdowns: true,

        
    //     locale: {
    //        format: 'YYYY-MM-DD',
    //           applyLabel: "Apply",
    //           maxDate:'0',
    //     }
    // });






        $('#btnAdd').click(function () {
            //alert("jhg");
        var num     = $('.clonedInput').length, // Checks to see how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // The numeric ID of the new input field being added, increasing by 1 each time
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
    
    /*  This is where we manipulate the name/id values of the input inside the new, cloned element
        Below are examples of what forms elements you can clone, but not the only ones.
        There are 2 basic structures below: one for an H2, and one for form elements.
        To make more, you can copy the one for form elements and simply update the classes for its label and input.
        Keep in mind that the .val() method is what clears the element when it gets cloned. Radio and checkboxes need .val([]) instead of .val('').
    */
        // H2 - section
        newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('Entry #' + newNum);

        // First name - text
        newElem.find('.input_fn').attr('id', 'ID' + newNum + '_from').attr('name', 'ID' + newNum + '_from').val('');

        // Last name - text
        newElem.find('.input_ln').attr('id', 'ID' + newNum + '_to').attr('name', 'ID' + newNum + '_to').val('');
        //Vehicle
        newElem.find('.select_pn').attr('id', 'ID' + newNum + '_vehicle').attr('name', 'ID' + newNum + '_vehicle').val('');
        //Amount
        newElem.find('.input_qn').attr('id', 'ID' + newNum + '_description').attr('name', 'ID' + newNum + '_description').val('');

        //Amount
        newElem.find('.input_mn').attr('id', 'ID' + newNum + '_amount').attr('name', 'ID' + newNum + '_amount').val('');
        //Project Name
        newElem.find('.input_nn').attr('id', 'ID' + newNum + '_projectName').attr('name', 'ID' + newNum + '_projectName').val('');
        //Remarks
        newElem.find('.input_on').attr('id', 'ID' + newNum + '_remark').attr('name', 'ID' + newNum + '_remark').val('');
        //Vehicles
        newElem.find('.input_pn').attr('id', 'ID' + newNum + '_vehicle').attr('name', 'ID' + newNum + '_vehicle').val('');

        // Flavor - checkbox
        // Note that each input_checkboxitem has a unique identifier "-0". This helps pair up duplicated checkboxes and labels correctly. A bit verbose, at the moment.



    // Insert the new element after the last "duplicatable" input field
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_title').focus();

        // Enable the "remove" button. This only shows once you have a duplicated section.
        $('#btnDel').attr('disabled', false);

        // Right now you can only add 4 sections, for a total of 5. Change '5' below to the max number of sections you want to allow.
        if (newNum == 10)
            $('#btnAdd').attr('disabled', true).prop('value', "You've reached the limit"); // value here updates the text in the 'add' button when the limit is reached
        $("#row_count").val(newNum);
    });


    $('#btnDel').click(function () {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        {
            var num = $('.clonedInput').length;
            // how many "duplicatable" input fields we currently have
            $('#entry' + num).slideUp('slow', function () {$(this).remove();
                // if only one element remains, disable the "remove" button
                if (num -1 === 1)
                    $('#btnDel').attr('disabled', true);
                // enable the "add" button
                $('#btnAdd').attr('disabled', false).prop('value', "add section");});
        }
        return false; // Removes the last section you added
    });
    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
 
 var num     = $('.clonedInput').length;

 if (num=='1') {$('#btnDel').attr('disabled', true);}

    

     $('#btnDel').on('click',function () {
          //alert("jhg");
        var num     = $('.clonedInput').length;
            newNum  = new Number(num - 1);
            $('#row_count').val(newNum);
            //alert(newNum);
        }); 
</script>