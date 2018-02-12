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
  require(FCPATH.'/library/menu_lib.php'); // build menu / bangun menu
  require(FCPATH.'/library/debitur_lib.php'); // library user
  require(FCPATH.'/library/client_lib.php'); // client user

	// initialize
  session_start();
	$websiteConfig = new config;
  $menu_lib = new menu_lib;
  $debitur_lib = new debitur_lib;


  // autoload
  //$user_lib->has_check_login_session();

	include(FCPATH.'/header.php');
  $_GET['route'] = 'retail'; // direct langsung ke modul absence
	$route = (isset($_GET['route']) AND trim($_GET['route'])!='' AND is_dir(FCPATH.'/pages/'.$_GET['route']))?$_GET['route']:'undefined';
  $method = (isset($_GET['method']) AND file_exists(FCPATH.'/pages/'.$route.'/'.$_GET['method'].EXT))?$_GET['method']:((trim($route)!="undefined")?((file_exists(FCPATH.'/pages/'.$route.'/index'.EXT))?'index':'undefined'):'undefined');

  // start routing halaman
  if (trim($method)!="undefined") {
    include(FCPATH.'/debitur/'.$route.'/'.$method.EXT);
  } else{
    include(FCPATH.'/person/welcome'.EXT);
  }
  // end routing halaman

	include(FCPATH.'/footer.php');
?>