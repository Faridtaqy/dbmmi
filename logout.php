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
  $admin_lib = new admin_lib;

  $admin_lib->logout();
?>
