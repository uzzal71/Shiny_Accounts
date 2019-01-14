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
            <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Manage User</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="user/create">Add New User</a></li>
                                <li><a href="user">User List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">User Role</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="Role/create">Create User Role</a></li>
                                <li><a tabindex="-1" href="Role/index">User Role List</a></li>
                            </ul>
                        </li>
                        <li><a href="ResetPassword/ResetPasswordForm">Change Password</a></li>
                        <li><a href="Logout/logout">Log Out</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Basic Entry <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <!--   ======  ######  Permitted User For Creating Department  ######  ======  -->
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Manage Department</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="Department/create">Add New Department</a></li>
                                <li><a tabindex="-1" href="Department/index">Department List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Office Schedule Entry</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Shift/ShiftEntry/create.php">Add New Shift</a></li>
                                <li><a href="view/BasicEntry/Shift/ShiftEntry/index.php">Shift List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Project Tracking</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Project</a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="view/BasicEntry/ProjectTracking/CreateProject/Create.php">Create New Project</a></li>
                                        <li><a tabindex="-1" href="view/BasicEntry/ProjectTracking/CreateProject/index.php">Project List</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Task</a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="view/BasicEntry/ProjectTracking/AddSection/create.php">Create
                                                Task</a></li>
                                        <li><a tabindex="-1" href="view/BasicEntry/ProjectTracking/AddSection/index.php">Task List</a></li>
                                    </ul>
                                </li>
                                <li><a href="view/BasicEntry/ProjectTracking/Report/report.php">Project Report</a></li>
                                <li><a href="view/BasicEntry/ProjectTracking/Report/employeeEngagementReport.php">Employee Engagement Report</a></li>
                                <li><a href="view/BasicEntry/ProjectTracking/Report/performanceReport.php">Performance Report</a></li>

                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Employee</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Employee/ManageEmployee/create.php">Create Employee</a></li>
                                <li><a href="view/BasicEntry/Employee/ManageEmployee/index.php">Employee List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Holiday</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Holiday/weekenedHoliday/create.php">Add Weekened Holiday</a></li>
                                <li><a tabindex="-1" href="view/BasicEntry/Holiday/weekenedHoliday/createGH.php">Add Govt Holiday</a></li>
                                <li><a href="view/BasicEntry/Holiday/weekenedHoliday/index.php">List of Holidays</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Employee Leave</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/EmployeeLeave/LeaveEntry/create.php">Apply for Leave</a></li>
                                <li><a href="view/BasicEntry/EmployeeLeave/LeaveEntry/index.php">Your Leave Requests</a></li>
                                <li><a href="view/BasicEntry/EmployeeLeave/LeaveEntry/approvedRequests.php">Your Approved Leave</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Manual Attendance</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Attendense/AttendenseEntry/create.php">Attendance Entry</a></li>
                                <li><a href="view/BasicEntry/Attendense/AttendenseEntry/index.php">Your Pending Attendance</a></li>
                                <li><a href="view/BasicEntry/Attendense/AttendenseEntry/approvedAttendense.php">Your Approved Attendance</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Supplier</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Supplier/SupplierEntry/create.php">Create Supplier</a></li>
                                <li><a href="view/BasicEntry/Supplier/SupplierEntry/index.php">Supplier List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Expense Type</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/ExpenseType/Expense/create.php">Create Expense Type</a></li>
                                <li><a href="view/BasicEntry/ExpenseType/Expense/index.php">Expense Types</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Voucher</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Voucher/VoucherEntry/create.php">Bill Entry</a></li>
                                <li><a href="view/BasicEntry/Voucher/VoucherEntry/index.php">Your Pending Bills</a></li>
                                <li><a href="view/BasicEntry/Voucher/VoucherEntry/approvedRequests.php">Your Approved Bills</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Negotiator</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Negotiator/CreateNegotiator/create.php">Create Negotiator</a></li>
                                <li><a href="view/BasicEntry/Negotiator/CreateNegotiator/index.php">Negotiator List</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Account Information</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/AccountInfo/Account/create.php">Add Account</a></li>
                                <li><a href="view/BasicEntry/AccountInfo/Account/index.php">Account Info</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Cheque Book</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/ChequeBook/ChequeBookEntry/create.php">Add Cheque Book</a></li>
                                <li><a href="view/BasicEntry/ChequeBook/ChequeBookEntry/index.php">Cheque Book List</a></li>
                            </ul>
                        </li>
                        <li><a href="view/BasicEntry/Attendense/AttendenseEntry/processAttendenseForm.php">Process Attendance Data</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operation <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Adjust Salary</a></li>
                        <li><a href="#">Create Budget</a></li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Expense</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Operation/Expense/EnterExpense/create.php">Enter Expense</a></li>
                                <li><a href="view/Operation/Expense/EnterExpense/index.php">List Of Expenses</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Income</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Operation/Income/IncomeEntry/create.php">Enter Income</a></li>
                                <li><a href="view/Operation/Income/IncomeEntry/index.php">List Of Incomes</a></li>
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
                        <li><a href="view/BasicEntry/Attendense/AttendenseEntry/pendingAttendense.php">Approve Attendance</a></li>
                        <li><a href="view/BasicEntry/EmployeeLeave/LeaveEntry/pendingLeave.php">Approve Leave</a></li>
                        <li><a href="view/BasicEntry/Attendense/AttendenseEntry/pendingAttendense.php">Approve Outstation</a></li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Voucher</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/BasicEntry/Voucher/VoucherEntry/pendingVoucher.php">Approve Voucher</a></li>
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
                        <li><a href="#">Create Item</a></li>
                        <li><a href="#">Material Receive</a></li>
                        <li><a href="#">Material Issue</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marketing<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Customer</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Marketing/CustomerEntry/Customer/create.php">Create
                                        Customer</a></li>
                                <li><a href="view/Marketing/CustomerEntry/Customer/index.php">Customer List</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Promotion</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Marketing/PromotionEntry/Promotion/create.php">Enter Promotion</a></li>
                                <li><a href="view/Marketing/PromotionEntry/Promotion/index.php">Promotion List</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">Offers</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="view/Marketing/OffersEntry/Offers/create.php">Enter Offer</a></li>
                                <li><a href="view/Marketing/OffersEntry/Offers/index.php">Offer List</a>
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
                        <li><a href="view/Reports/AllReports/AttendanceReport/attendanceReportForm.php">Attendance Report</a></li>
                        <li><a href="view/Reports/AllReports/SummaryReport/summaryReportForm.php">Summary Report</a></li>
                        <li><a href="view/Reports/AllReports/InOutReport/inOutReportForm.php">Detail In Out Report</a></li>
                        <li><a href="view/Reports/AllReports/HolidayReport/holidayReportForm.php">Holiday Report</a></li>
                        <li><a href="view/Reports/AllReports/LeaveReport/leaveReportForm.php">Leave Report</a></li>
                        <li><a href="view/Reports/AllReports/LeaveSummaryReport/leaveSummaryReportForm.php">Leave Summary Report</a></li>
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
