<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Travel Apps</title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" />
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $path; ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo $path; ?>/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo $path; ?>/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $path; ?>/css/travel-apps.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo $path; ?>/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $path; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <!--javascript-->
        <script src="<?php echo base_url(); ?>assets/jquery/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery/jquery-ui.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $path; ?>/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="<?= base_url()?>Home"><i class="fa fa-home fa-fw"></i> Travel Apps</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><?php echo $this->session->userdata('name');?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?= base_url()?>Profile?id=<?= $this->session->userdata('useracces')?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url()?>Login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="<?= base_url()?>Home" class="active"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Province">Province</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>District">District</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>Subdistricr">Sudistrict</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>Room_type">Room's Type</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>Hotel">Hotel</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-h-square"></i> Voucher <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Source_voucher"> <span class="fa arrow"></span>Source Voucher</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>Voucher"> <span class="fa arrow"></span>Input Voucher</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url()?>Lap_voucher">
                                     <i class="fa fa-table"></i> Repot Voucher
                                </a>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>

            
            <!-- /#page-wrapper -->

        
        <!-- /#wrapper -->

     
