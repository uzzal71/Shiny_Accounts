
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">Name</th>
                        <th align="center">Project ID</th>
                        <th align="center">Section ID</th>
                        <th align="center">Start Date</th>
                        <th align="center">End Date</th>
                        <th align="center">Commoitment(Days)</th>
                        <th align="center">Executed In(Days)</th>
                        <th align="center">Efficiency</th>
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


