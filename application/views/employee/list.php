
    <br><br>
    <div style="margin-left: 195px;margin-top: 5px;float: left">
   <button type="button" class="btn btn-danger" id="select_all" >Selcect All</button>
   <button type="button" class="btn btn-primary" id="reset_all" >Reset</button>
</div>

<div style="margin-right: 25px;margin-top: 5px;float: right;" >
    
    <button type="button" class="btn btn-danger" id="delete" >Delete</button>
</div> 
    
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 650px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Employee List</h3>
			
						<h3 style="color: green; text-align:center" >  
				<?php
                     $msg=$this->session->userdata('message');
                     if($msg)
                     {
                        echo $msg."<br> <br>";
						 $this->session->unset_userdata('message');
					 }
                 ?>
             </h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">Select</th>
                        <th align="center">SL#</th>
						<th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Card No</th>
                        <th align="center">Department</th>
                        <th align="center">Designation</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no=0;
							foreach($all_employee as $each_employee){
								$serial_no++?>
                            <tr>
							     <td><input type="checkbox" name="checked[]" id="checkboxes" value="<?php echo $each_employee->id?>" ></td>
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_employee->employee_id?></td>
								<td><?php echo $each_employee->first_name." ".$each_employee->last_name?></td>
                                <td><?php echo $each_employee->card_id?></td>
                                <td><?php echo $each_employee->department?></td>
								<td><?php echo $each_employee->designation?></td>
                                
                                <td width="130px">
                                    <a href="<?php echo base_url();?>Employee/details_view/<?php echo $each_employee->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20"></a> 
									<a href="<?php echo base_url();?>Employee/edit_employee/<?php echo $each_employee->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Employee/delete_employee/<?php echo $each_employee->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>
                                </td>
								
							
                            </tr>
							<?php }?>

                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
                        <script>
                            $(document).ready(function () {
                                
                                $("reset_all").hide();
                                $('#select_all').on('click',function(){
                                             // $("select_all").hide();
                                             // $("reset_all").show();
                                            $("input:checkbox").prop('checked',true);
                                           
                                             
                                        });

                                   $('#reset_all').on('click',function(){
                                        // alert('reset_all');
                                           
                                        //     $("select_all").show();
                                        //     $("reset_all").hide();
                                             $("input:checkbox").prop('checked',false);
                                        });


                                      $('#delete').on('click',function(){
                                        
                                            //alert('Got The Button');

                                          if(confirm("Are you sure you want to delete this?"))
                                        {
                                     var id = [];
                               
                                $(':checkbox:checked').each(function(i){
                                                id[i] = $(this).val();
                                          });
                                         }

                                    if(id.length === 0) //tell you if the array is empty
                                   {
                                    alert("Please Select atleast one checkbox");
                                   }else {

                                     //alert(id);

                                    $.ajax({

                                                async: false,
                                                type: 'POST',
                                                url: '<?php echo base_url();?>Employee/delete_employees',
                                                data:{ 
                                                        id: id
                                                    },
                                                //timeout: 4000,
                                                success: function(result) {
                                                    response = result;
                                                    alert(response);

                                                                 window.location.assign('employee_list');
                                                    //$('#credit_account').html(response);
                                                },
                                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                    response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                                                }
                                            });
                                   }   


                                        });//last one

                                });
                            </script>



