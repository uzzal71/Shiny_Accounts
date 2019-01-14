
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Offer List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Offer ID</th>
                        <th align="center">Customer Name</th>
						<th align="center">Phone Number</th>
                        <th align="center">Contact Prerson</th>
                        <th align="center">Mobile number</th>
                        <th align="center">Description</th>
                        <th align="center">Offer Amount</th>
                        <th align="center">Offer Date</th>
                        <th align="center">Promoted By</th>
                        <th align="center">Entry By</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php 
							$id=1;
							foreach($view_offer_list as $v_offer){?>
                            <tr>
							
                                <td><?php echo $id?></td>
                                <td><?php echo $v_offer->offer_code?></td>
                                <td><?php echo $v_offer->customer_name?></td>
								<td><?php echo $v_offer->phone_no?></td>
                                <td><?php echo $v_offer->contact_person?></td>
                                <td><?php echo $v_offer->mobile_phone_no?></td>
                                <td><?php echo $v_offer->description?></td>
                                <td><?php echo $v_offer->amount?></td>
                                <td><?php echo $v_offer->offer_date?></td>
                                <td><?php echo $v_offer->promoted_by?></td>
                                <td><?php echo $v_offer->recorded_by?></td>

                               
                                
                               <td width="130px">
                                    <a href="#"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="#"width="25" height="20"></a> <a href="#"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="#" width="25" height="20"></a>
                                    <a href="#" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							
							<?php $id++;}?>


                           
								<?php if($view_offer_list==null){?>
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
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
                                    var deleteButton='deleteButton' + '{{ $department->id }}' ;
                                    var deleteEmployee='deleteDepartment' + '{{ $department->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteEmployee).submit();
                                        return false;
                                    })
                                })
                            </script>


