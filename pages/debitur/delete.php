<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/debitur_lib.php');
	$debitur_lib = new debitur_lib;

	$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

	if (isset($_GET['method']) AND trim($_GET['method'])=="delete") {
		$id = (isset($_GET['id']) AND is_numeric($_GET['id']))?$_GET['id']:0;
		$response = $debitur_lib->stored_delete_data($id);
		$status = $response['status']; $message = $response['message'];
	}

	header('Location: '.$websiteConfig->base_url().'?route=debitur&status='.$status.'&message='.base64_encode($message));
?>