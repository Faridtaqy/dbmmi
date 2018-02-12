<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/banding_lib.php');
	$banding_lib = new banding_lib;

	$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

	if (isset($_GET['method']) AND trim($_GET['method'])=="delete") {
		$id = (isset($_GET['id']) AND is_numeric($_GET['id']))?$_GET['id']:0;
		$response = $banding_lib->stored_delete_data($id);
		$status = $response['status']; $message = $response['message'];
	}

	header('Location: '.$websiteConfig->base_url().'?route=banding&status='.$status.'&message='.base64_encode($message));
?>