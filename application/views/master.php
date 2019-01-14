<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        2RA Technology Limited
    </title>
   <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap_3.3.7.min.css">
    <link href="<?php echo base_url();?>css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>css/master.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui_1.12.1.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui-timepicker-addon.css">
  
    <script src="<?php echo base_url();?>js/jquery_3.2.1.min.js"></script>
  
    
    <script src="<?php echo base_url();?>js/bootstrap_3.3.7.min.js"></script>
    
    
    <script src="<?php echo base_url();?>js/jquery-ui_1.12.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo base_url();?>js/select2.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.dataTables.min.css">
  <script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
   

    <style>
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
        body{
            background-image: url(<?php echo base_url();?>images/bg13.jpg);
            font-family:Lucida Sans Unicode;
            min-height: 650px;
        }
        #custom-table td{
            font-family: "Times New Roman";
            text-align: center;
            min-width: 130px;
        }
        #custom-table th{
            font-family: "Times New Roman";
            text-align: center;
        }
        .custom-panel{
            font-family: "Times New Roman";
        }
        form input{
            height:29px!important;
        }
        form select{
            height:29px!important;
            font-size: 12px!important;
            margin: 0!important;
            padding: 0!important;
        }
        form select option{
            font-size: 12px!important;
        }
        form label{
            margin-bottom: 3px!important;
            margin-top: 10px!important;
        }
        form input[type=checkbox]{
            height:12px!important;
        }
        form input[type=radio]{
            height:12px!important;
        }

        /*  ======  ######  For Creating Responsive Navigation  ######  ======  */

        @media (max-width: 1350px) {
            .navbar-header {
                float: none;
            }
            .navbar-toggle {
                display: block;
            }
            .navbar-collapse {
                border-top: 1px solid transparent;
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
            }
            .navbar-collapse.collapse {
                display: none!important;
            }
            .navbar-nav {
                float: none!important;
                margin: 7.5px -15px;
            }
            .navbar-nav>li {
                float: none;
            }
            .navbar-nav>li>a {
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .navbar-text {
                float: none;
                margin: 15px 0;
            }
            /* since 3.1.0 */
            .navbar-collapse.collapse.in {
                display: block!important;
            }
            .collapsing {
                overflow: hidden!important;
            }
        }
    </style>
    <link href="<?php echo base_url();?>css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
 
<?php if($this->session->userdata('id')){?>
<div class="hidden-xs">
    <p class="pull-right" style="margin: 40px 20px 0 0;font: italic bold 15px/30px Georgia, serif;color: #010047;">
       <span style="color: #0000CC"><b><a href="<?php echo base_url();?>welcome/logout">Logout</a></b></span></p>
</div>

<div class="hidden-xs">
    <p class="pull-right" style="margin: 40px 20px 0 0;font: italic bold 15px/30px Georgia, serif;color: #010047;">
        Logged in as: <span style="color: #0000CC"><b><?php echo $this->session->userdata("user_name"); $session_username=$this->session->userdata("user_name");?></b></span></p>
</div>
   <button onclick="history.go(-1);"  style="margin-bottom: 0px;margin-left: 0px; color: white;background-color: #010047; " >Back </button>
<?php }?>

<div class="page-header" style="margin-left: 18px;margin-top:0px; ">

    <h2 style="font: italic bold 25px/30px Georgia, serif;color: #010047;"><b>Easy Accounts</b>

        <small style="font-family:Courier New;color: #010047;">2RA Technology Limited</small>
		
    </h2>
</div>


    
    <!-- Menu -->
    <?php echo $menu?>
   

        <!-- SideNavBar -->
    <?php echo $sidenavbar?>
	
	
	   <!-- Page Content -->
    <?php echo $maincontent?>





</body>
<br><br><br><br><br>
</html>
<!--
<script>
    $(document).ready(function () {
        //  ======  ######  For Selecting All Roles  ######  ======
        $("#ckbCheckAll").click(function () {
            if (this.checked)
                $(".checkBoxClass").prop('checked', "checked");
            else
                $(".checkBoxClass").prop('checked', false);
        });
//        $('#dateTime').datepicker({ dateFormat: 'yy-mm-dd' }).val();
        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
    });
</script>

-->



