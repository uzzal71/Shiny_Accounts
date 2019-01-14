<!DOCTYPE html>
<html>
<head>
    <title>
        2RA Technology Limited
    </title>


    <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css">
    
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap_3.3.7.min.css">
    <link href="<?php echo base_url();?>css/simple-sidebar.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui_1.12.1.css">
    <link href="<?php echo base_url();?>css/jquery-ui-timepicker-addon.css" rel="stylesheet">
    
    <script src="<?php echo base_url();?>js/jquery_3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>js/ajaxfileupload.js"></script>
    
    <script src="<?php echo base_url();?>js/bootstrap_3.3.7.min.js"></script>
    
    
    <script src="<?php echo base_url();?>js/jquery-ui_1.12.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('dropdown-toggle').dropdown()
        });
    </script>
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
        Logged in as: <span style="color: #0000CC"><b><?php echo $this->session->userdata("user_name")?></b></span></p>
</div>
<?php }?>
<div class="page-header" style="margin-left: 18px">
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



