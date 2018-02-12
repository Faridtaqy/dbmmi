<?php 
  date_default_timezone_set('Asia/Jakarta');

  define('ENVIRONMENT', 'development');
  define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
  define('FCPATH', str_replace(SELF, '', __FILE__));
  define('EXT','.php');

  if (defined('ENVIRONMENT'))
  {
    switch (ENVIRONMENT)
    {
      case 'development':
        error_reporting(E_ALL);
      break;
    
      case 'testing':
      case 'production':
        error_reporting(0);
      break;

      default:
        exit('The application environment is not set correctly.');
    }
  }


  require(FCPATH.'/config/config.php'); // konfigurasi dasar
  require(FCPATH.'/library/db_utility_lib.php'); // library database
  require(FCPATH.'/library/admin_lib.php'); // library user

  // initialize
  session_start();
  $websiteConfig = new config;
  $admin_lib = new admin_lib;

  // autoload
  $admin_lib->check_login_session_login_page();

  // response login
  $status = 500; $message = '';
  if (isset($_POST['do_login'])) {
    $response = $admin_lib->do_login_user();
    if ($response['status']==200) {
      header('Location: '.$websiteConfig->base_url());
    }

    $status = $response['status']; $message = $response['message'];
  }
?>

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
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
              <center><img src="assets/images/statics/mmi2.png" style="width: 800px; margin: 40px;" /></center>
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body">
                              <div class="alert alert-<?php echo ($status==200)?'success':'danger'; ?>" style="<?php echo (trim($message)=="")?'display: none;':''; ?>"><?php echo $message ?></div>
                                <form role="form" method="post" action="">
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Username " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="password"  placeholder="Password" />
                                        </div>
                                     
                                     <input type="submit" class="btn btn-primary btn-block" name="do_login" value="LOGIN" />
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo $websiteConfig->base_url(); ?>assets/themes/assets/js/custom.js"></script>
   
</body>
</html>
