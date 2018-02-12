<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class admin_lib
{
	protected $websiteConfig, $db_utility_lib;
	function __construct()
	{
		$this->websiteConfig = new config;
		$this->db_utility_lib = new db_utility_lib;
	}
	/**
	* keluar dari sessi / logout system
	*/
	public function logout(){
		if (!empty($_SESSION['user'])) {
			unset($_SESSION['user']);
		}

		header('Location: '.$this->websiteConfig->base_url());
	}
	/**
	* dapatkan id session
	*/
	public function get_admin_id_on_session(){
		return (isset($_SESSION['user']['admin_id']))?$_SESSION['user']['admin_id']:0;
	}
	/**
	* dapatkan username session
	*/
	public function get_username_on_session(){
		return (isset($_SESSION['user']['admin_username']))?$_SESSION['user']['admin_username']:'undefined';
	}
	/**
	* cek sesi login di login.php
	*/
	public function check_login_session_login_page(){
		$session_arr = isset($_SESSION)?$_SESSION:array();
		if (!empty($session_arr['user'])) {
			header('Location: '.$this->websiteConfig->base_url());
		}
	}
	/**
	* lakukan login user jika ditemukan submit form data dari login.php
	*/
	public function do_login_user(){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {

			$current_username = (isset($_POST['username']) AND trim($_POST['username'])!='')?$_POST['username']:'undefined';
			$current_password = (isset($_POST['password']) AND trim($_POST['password'])!='')?md5($_POST['password']):'undefined';

			$this->db_utility_lib->setMainTable('mmi_admin');
			$user_arr = $this->db_utility_lib->find('admin_username="'.$current_username.'" AND admin_password="'.$current_password.'"');
			if (!empty($user_arr)) {
				$_SESSION['user'] = $user_arr;

				$status = 200; $message = 'Login berhasil.';
			} else{
				$message = 'Login gagal. username/password salah.';
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* cek sesi jika belum ada sesi login maka redirect ke login page
	*/
	public function has_check_login_session(){
		$session_arr = isset($_SESSION)?$_SESSION:array();
		if (empty($session_arr['user'])) {
			header('Location: '.$this->websiteConfig->base_url().'login.php');
		}
	}
}
?>