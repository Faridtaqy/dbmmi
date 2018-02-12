<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class config
{
	public $connection, $start_schedule, $end_schedule, $workday_total;
	function __construct()
	{
		//parent::__construct();
		// configure database
		$this->hostname = 'localhost'; // set your mysql hostname
		$this->username = 'root'; // set your mysql username
		$this->password = ''; // set your mysql password
		$this->dbname   = 'dbmmi'; // set your mysql database
		$this->connection = mysqli_connect($this->hostname,$this->username,$this->password) or die('Failure to connect mysql.');
		$this->conn = mysqli_select_db($this->connection, $this->dbname) or die('Failure to connect database.');

		// configure base url site
		/**
		* WARNING!! PLEASE DONT CHANGE BASE_URL
		*/
		$this->base_url = "http://".(isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:''). preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/';

		// additional information
		$this->site_name = 'KJPP MMI';
		$this->site_description = 'User Control';
		$this->site_webmaster = 'Muhammad Faridtaqy';
		$this->site_webmaster_email = 'faridtaqy@gmail.com';

	}
	public function base_url(){
		return $this->base_url;
	}
	public function getSiteName(){
		return $this->site_name;
	}
	public function getSiteDescription(){
		return $this->site_description;
	}
	public function getSiteWebMaster(){
		return $this->site_webmaster;
	}
	public function getSiteWebMasterEmail(){
		return $this->site_webmaster_email;
	}
	public function getWorkDay(){
		return $this->workday_total;
	}
	public function getStartSchedule(){
		return $this->start_schedule;
	}
	public function getEndSchedule(){
		return $this->end_schedule;
	}
}
?>