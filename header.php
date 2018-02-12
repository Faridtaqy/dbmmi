<?php if ( ! defined('FCPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $websiteConfig->getSiteName(); ?> <?php echo (isset($show_additional_sub['sub_title']) AND trim($show_additional_sub['sub_title'])!='')?' | '.$show_additional_sub['sub_title']:''; ?></title>
  <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/js/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="wrapper">
    <?php 
      $script_name = isset($_SERVER['SCRIPT_FILENAME'])?$_SERVER['SCRIPT_FILENAME']:'';
      $script_name_arr = explode('/', $script_name);
      $last_name = end($script_name_arr);

      // jika body load bukan absensi
      if (trim($last_name)!='') {
    ?>
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $websiteConfig->base_url(); ?>"><?php echo $websiteConfig->getSiteName(); ?></a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                <ul>
                    <il>
                      <th>
                        <a class="btn btn-danger glyphicon col-md glyphicon-user btn-adjust" href="assets/themes/assets/img/mmi.PNG"> </a>
                      </th>
                      <a href="<?php echo $websiteConfig->base_url().'logout.php'; ?>" class="btn btn-danger glyphicon col-md glyphicon-log-out btn-adjust"> Logout</a>
                    </il>
                </ul>
            </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <?php echo $menu_lib->execute(); ?>
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
    <?php
      // jika body load absensi
      } else{
    ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
            </div>
        </nav>  
    <?php
      }
    ?>
        <div id="page-wrapper" >
            <div id="page-inner">
