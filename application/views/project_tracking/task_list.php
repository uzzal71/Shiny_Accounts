
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Task List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Project ID</th>
                        <th align="center">Task ID</th>
                        <th align="center">Assiged To</th>
                        <th align="center">Assiged Date</th>
                        <th align="center">Estimated Days</th>
                        <th align="center">Latest Estimated Days</th>
                        <th align="center">Assignd By</th>
						<th align="center">Action</th>
						<th align="center">If Finished</th>
                    </tr>
                    </thead>
               
                            <tbody>
						
                            <tr>
							
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                               
                                
                                 <td width="130px">
                                      <a href="#"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                       src="#"width="25" height="20"></a> <a href="#"> <img style="margin: 3%" border="0"
                                       title="Edit User Info" alt="Edit"src="#" width="25" height="20"></a>
                                       <a href="#" id="" onclick="return confirm('Are you sure?')">
                                       <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                       src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                  </td>
								  
								  <td> <button type="submit" class="btn btn-info pull-right">Finished</button></td>
								
							
                            </tr>
						


                           
						
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
                                    </td>
                                </tr>
								
					
                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	                            <script>
                                $(document).ready(function () {
                                    var deleteButton='deleteButton' + '{{ $department->id }}' ;
                                    var deleteEmployee='deleteDepartment' + '{{ $department->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteEmployee).submit();
                                        return false;
                                    })
                                })
                            </script>


