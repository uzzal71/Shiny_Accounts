<nav class="navbar navbar-inverse" style="background-color: #010047;width: 100%!important;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Manage User</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>user/add_new_user">Add New User</a></li>
                                <li><a href="user">User List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">User Role</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>user/add_new_user_role">Create User Role</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>user/user_role_list">User Role List</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url();?>welcome/change_password">Change Password</a></li>
                        <li><a href="<?php echo base_url();?>welcome/logout">Log Out</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Basic Entry <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <!--   ======  ######  Permitted User For Creating Department  ######  ======  -->
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Manage Department</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>Department/add_new_department">Add New Department</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>Department/department_list">Department List</a></li>
                            </ul>
                        </li>                  
						<li class="dropdown-submenu"><a tabindex="-1" href="#">Manage Group</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>Group/add_new_group">Add New Group</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>Group/group_list">Group List</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>Group/group_shift_allocation">Group Shift Allocation</a></li>
                            </ul>
                        </li>
						 <li class="dropdown-submenu"><a tabindex="-1" href="#">Manage Command</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>command/create">Create Command</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>command/command_list">Command List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Office Schedule Entry</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>shift/add_new_shift">Add New Shift</a></li>
                                <li><a href="<?php echo base_url();?>Shift/shift_list">Shift List</a></li>
                                <li><a href="<?php echo base_url();?>Shift/special_shift_allocation">Special Shift Allocation</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Project Tracking</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Project</a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="<?php echo base_url()?>project_tracking/create_new_project">Create New Project</a></li>
                                        <li><a tabindex="-1" href="<?php echo base_url()?>project_tracking/project_list">Project List</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Task</a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="<?php echo base_url()?>project_tracking/create_new_task">Create
                                                Task</a></li>
                                        <li><a tabindex="-1" href="<?php echo base_url()?>project_tracking/task_list">Task List</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url()?>project_tracking/project_report">Project Report</a></li>
                                <li><a href="view/BasicEntry/ProjectTracking/Report/employeeEngagementReport.php">Employee Engagement Report</a></li>
                                <li><a href="<?php echo base_url()?>project_tracking/performance_report">Performance Report</a></li>

                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Designation</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>designation/add_new_designation">Create Designation</a></li>
                                <li><a href="<?php echo base_url();?>designation/designation_list">Designation List</a></li>
                            </ul>
                        </li>  

						<li class="dropdown-submenu"><a tabindex="-1" href="#">Employee</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>employee/create">Create Employee</a></li>
                                <li><a href="<?php echo base_url();?>employee/employee_list">Employee List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Holiday</a>
                            <ul class="dropdown-menu">

                                <li><a tabindex="-1" href="<?php echo base_url();?>holiday/add_new_holiday">Add Holiday</a></li>
                                <li><a href="<?php echo base_url();?>holiday/holiday_list">List of Holidays</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Employee Leave</a>
                            <ul class="dropdown-menu">
							 <li> <a href="<?php echo base_url();?>leave/apply_leave_form">Apply For Leave</a></li>
							 <li> <a href="<?php echo base_url();?>leave/apply_leave_list">Leave Request</a></li>
							 <li> <a href="<?php echo base_url();?>leave/check_leave_status">Check Leave Status</a> </li>
							  <li> <a href="<?php echo base_url();?>leave/create_leave_type">Add Leave Type</a> </li>
							 <li> <a href="<?php echo base_url();?>leave/view_leave_types">Leave Type List</a> </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Manual Attendance</a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url();?>manual_attendence/manual_attendence_entry">Attendence Entry</a></li>
                                <li><a href="<?php echo base_url();?>manual_attendence/pending_attendence">Your Pending Attendance</a></li>
                                <li><a href="<?php echo base_url();?>manual_attendence/approved_attendence">Your Approved Attendance</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Supplier</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url()?>supplier/add_new_supplier">Create Supplier</a></li>
                                <li><a href="<?php echo base_url()?>supplier/supplier_list">Supplier List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Expense Type</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url()?>expense/add_expense_type">Create Expense Type</a></li>
                                <li><a href="<?php echo base_url()?>expense/expense_types">Expense Types</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Voucher</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>voucher_entry/add_bill_entry_form">Bill Entry</a></li>
                                <li><a href="<?php echo base_url();?>voucher_entry/pending_bill">Your Pending Bills</a></li>
                                <li><a href="<?php echo base_url();?>voucher_entry/approved_bill">Your Approved Bills</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Negotiator</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>negotiator/add_new_negotiator">Create Negotiator</a></li>
                                <li><a href="<?php echo base_url();?>negotiator/negotiator_list">Negotiator List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Account Information</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>account_information/add_new_account_information">Add Account</a></li>
                                <li><a href="<?php echo base_url();?>account_information/account_information_list">Account Info</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Cheque Book</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>cheque_book/add_new_cheque_book">Add Cheque Book</a></li>
                                <li><a href="<?php echo base_url();?>cheque_book/cheque_book_list">Cheque Book List</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url();?>Process_attendence">Process Attendance Data</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operation <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Adjust Salary</a></li>
                        <li><a href="#">Create Budget</a></li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Expense</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url();?>expense">Enter Expense</a></li>
                                <li><a href="<?php echo base_url();?>expense/expense_list">List Of Expenses</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Income</a>
                            <ul class="dropdown-menu">
                                
                                <li> <a href="<?php echo base_url();?>income">Enter Income</a></li>
                                <li><a href="<?php echo base_url();?>income/income_list">List Of Incomes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Payment</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Operation/Payment/EnterPayment/create.php">Enter Payment</a></li>
                                <li><a href="view/Operation/Payment/EnterPayment/index.php">List Of Payments</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Account Transfer</a></li>
                        <li><a href="#">Enter LC</a></li>
                        <li><a href="#">Enter BG/PG</a></li>
                        <li><a href="#">Loan Collection</a></li>
                        <li><a href="#">Loan Payment</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Call Management <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Enter Calls</a></li>
                    </ul>
                </li>

                <!-- For Outstation Approval User -->
                <!--  ========================  ======================  ======================-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Op <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Create Salary Detail</a></li>
                        <li><a href="#">Disburse Salary</a></li>
                        <li><a href="<?php echo base_url()?>manual_attendence/approve_manual_attendence_form">Approve Attendance</a></li>
                        <li><a href="<?php echo base_url();?>leave/approve_subordinate_pending_leave">Approve Leave</a></li>
                        <li><a href="<?php echo base_url()?>admin/approve_outstation">Approve Outstation</a></li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Voucher</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url()?>admin/approve_voucher">Approve Voucher</a></li>
                                <li><a href="view/BasicEntry/Voucher/BatchPrint/printForm.php">Batch Print</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Expenses</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Operation/Expense/EnterExpense/pendingExpense.php">Approve Expense</a></li>
                                <li><a href="view/Operation/Expense/EnterExpense/approvedExpenses.php">Approved Expenses</a></li>
                            </ul>
                        </li>
                        <li><a href="view/Operation/Payment/EnterPayment/pendingPayment.php">Approve Payments</a></li>
                        <li><a href="#">Approve Budget</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>inventory/product_map">Product Map</a></li>
                        <li><a href="<?php echo base_url();?>inventory/create_new_item">Create Item</a></li>
                        <li><a href="<?php echo base_url();?>inventory/material_receive">Material Receive</a></li>
                        <li><a href="<?php echo base_url();?>inventory/material_issue">Material Issue</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marketing<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Customer</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url();?>customer/add_new_customer">Create Customer</a></li>
                                <li><a href="<?php echo base_url();?>customer/customer_list">Customer List</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Promotion</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url()?>promotion">Enter Employee Promotion</a></li>
                                <li><a href="<?php echo base_url()?>promotion/promotion_list">Employee Promotion List</a>
                                </li>
                            </ul>
                        </li>    
						<li class="dropdown-submenu"><a tabindex="-1" href="#">Offer</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="<?php echo base_url()?>offer/create_new_offer">Create Offer</a></li>
                                <li><a href="<?php echo base_url()?>offer/offer_list">Offer List</a>
                                </li>
                            </ul>
                        </li>
                 
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Service <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Enter Records</a></li>
                        <li><a href="#">Service Approval</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operation Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Inventory Report</a></li>
                        <li><a href="#">Offer Report</a></li>
                        <li><a href="#">Promotion Report</a></li>
                        <li><a href="#">Service Report</a></li>
                        <li><a href="#">Call Report</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>manual_attendence/attendence_report_form">Attendance Report</a></li>
                        <li><a href="<?php echo base_url()?>manual_attendence/summery_report_form">Summary Report</a></li>
                        <li><a href="<?php echo base_url()?>manual_attendence/details_in_out_report_form">Detail In Out Report</a></li>
                        <li><a href="<?php echo base_url()?>holiday/holiday_report_form">Holiday Report</a></li>
                        <li><a href="<?php echo base_url()?>leave/leave_report_form">Leave Report</a></li>
                        <li><a href="<?php echo base_url()?>leave/summery_report_form">Leave Summary Report</a></li>
                        <li><a href="#">Customer Report</a></li>
                        <li><a href="#">Employee Report</a></li>
                        <li><a href="#">Supplier Report</a></li>
                        <li><a href="view/BasicEntry/ProjectTracking/Report/report.php">Task Report</a></li>
                        <li><a href="#">Income Report</a></li>
                        <li><a href="#">Expense Report</a></li>
                        <li><a href="#">Budget Report</a></li>
                        <li><a href="#">VAT Report</a></li>
                        <li><a href="#">AIT Report</a></li>
                        <li><a href="#">Account Report</a></li>
                        <li><a href="#">Receivable Report</a></li>
                        <li><a href="#">Payable Report</a></li>
                        <li><a href="#">Operation Summary</a></li>
                        <li><a href="#">Profit Loss</a></li>
                        <li><a href="#">Cheque Book Status</a></li>
                        <li><a href="#">Salary Report</a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <script type="text/javascript">
        $(document).ready(function () {
            $('dropdown-toggle').dropdown()
        });
    </script>