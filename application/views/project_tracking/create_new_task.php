<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
		
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
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Task</div>
              
               
                    <div class="col-xs-12 col-sm-12">
				   <form name="save_new_income" action="<?php echo base_url();?>income/save_new_income"  method="post">
			<table >
			

			
			<tr>
			<td> <label for="customer_name" style="margin-top: 4px">Project ID</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">
			<select name="project_id" class="form-control  custom-input" id="project_id" >
						
							 <option value="">Project ID</option>
						
            </select>
			</td>
			
			</tr>			

			<tr>
			<td> <label for="task_id" style="margin-top: 4px">Task ID</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="task_id" name="task_id" class="form-control custom-input" required></td>
			
			</tr>
			
			<tr>
			<td> <label for="assign_to" style="margin-top: 4px">Assigned To</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">
			<select name="project_id" class="form-control  custom-input" id="project_id" >
						
							 <option value="">Assigned To</option>
						
            </select>
			</td>
			
			</tr>	
		

			<tr>
			<td> <label for="assign_date" style="margin-top: 4px">Assigned Date</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="assign_date" name="assign_date" class="form-control custom-input dateFrom" required></td>
			
			</tr>

			<tr>
			<td> <label for="estimated_completion_date" style="margin-top: 4px">Estimated Completion Date</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="estimated_completion_date" name="estimated_completion_date" class="form-control custom-input dateFrom" required></td>
			
			</tr>
				
			<tr>
			<td> <label for="estimated_completion_day" style="margin-top: 4px">Estimated Completion Day</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="estimated_completion_day" name="estimated_completion_day" class="form-control custom-input" required></td>
			
			</tr>			

			<tr>
			<td> <label for="section_description" style="margin-top: 4px">Section Description</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="section_description" name="section_description" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="assign_to" style="margin-top: 4px">Priority</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">
			<select name="project_id" class="form-control  custom-input" id="project_id" >
						
							 <option value="">1</option>
							 <option value="">2</option>
							 <option value="">3</option>
							 <option value="">4</option>
							 <option value="">5</option>
							 <option value="">6</option>
							 <option value="">7</option>
							 <option value="">8</option>
							 <option value="">9</option>
							 <option value="">10</option>
						
            </select>
			</td>
			
			</tr>

			<tr>
			<td> <label for="priorities" style="margin-top: 4px">Priorities</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="priorities" name="priorities" class="form-control custom-input" required></td>
			
			</tr>			

			
			<!-- RECORDING TIME AND RECORDED BY-->
			<tr>
			<td>
			<input type="hidden" id="recording_time" name="recording_time" value="<?php  echo date("y-m-d h:i:s");?>" class="form-control custom-input" required>
			<input type="hidden" id="recorded_by" name="recorded_by" value="<?php echo $this->session->userdata("id")?>" class="form-control custom-input" required>
			</td>
			
			</tr>
			
			
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit" class="btn btn-info pull-right">Add Task</button>
                        </div></td>

			 
			<td> </td>
			<td></td>
			</tr>
			
			
			   
			</table>
			</form>

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
                    </div>
                
            </div>
        </div>
    </div>
	
	
	
	
	