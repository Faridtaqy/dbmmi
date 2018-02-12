<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/btb_lib.php');
	$btb_lib = new btb_lib;

	// eksekusi form
	if (isset($_POST['save']) AND trim(strtolower($_POST['save']))=="simpan") {
		$id = (isset($_GET['id']) AND intval($_GET['id'])>0)?$_GET['id']:0;

		$response = $btb_lib->form_validation_btb($id);
		if ($response['status']==200) {
			$response = $btb_lib->stored_data_btb($id);
			
			}
		}
	
	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>
<div class="row">
	<div class="col-md-9">
		<h3 class="page-header"> update Index BTB</h3>
	</div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
	<div class="col-md-9">
		<div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
	</div>
</div>
<div class="form-group">
	<center><label class="col-md-10 control-label" style="font-size: 25px; height: 80px;">Update Index BTB </label></center>
</div>
<div class="row">
	<div class="col-md-20">		
			<div class="panel-body">
				<form class="form-vertical" method="post" action="" enctype="multipart/form-data">
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_pondasi_1lt" value="<?php echo (isset($_POST['rt_ekslusif_pondasi_1lt']) AND trim($_POST['rt_ekslusif_pondasi_1lt'])!='')?$_POST['rt_ekslusif_pondasi_1lt']:((isset($detail_arr['rt_ekslusif_pondasi_1lt']) AND trim($detail_arr['rt_ekslusif_pondasi_1lt'])!='')?$detail_arr['rt_ekslusif_pondasi_1lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_struktur_1lt" value="<?php echo (isset($_POST['rt_ekslusif_struktur_1lt']) AND trim($_POST['rt_ekslusif_struktur_1lt'])!='')?$_POST['rt_ekslusif_struktur_1lt']:((isset($detail_arr['rt_ekslusif_struktur_1lt']) AND trim($detail_arr['rt_ekslusif_struktur_1lt'])!='')?$detail_arr['rt_ekslusif_struktur_1lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_rangka_atap_1lt" value="<?php echo (isset($_POST['rt_ekslusif_rangka_atap_1lt']) AND trim($_POST['rt_ekslusif_rangka_atap_1lt'])!='')?$_POST['rt_ekslusif_rangka_atap_1lt']:((isset($detail_arr['rt_ekslusif_rangka_atap_1lt']) AND trim($detail_arr['rt_ekslusif_rangka_atap_1lt'])!='')?$detail_arr['rt_ekslusif_rangka_atap_1lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_penutup_atap_1lt" value="<?php echo (isset($_POST['rt_ekslusif_penutup_atap_1lt']) AND trim($_POST['rt_ekslusif_penutup_atap_1lt'])!='')?$_POST['rt_ekslusif_penutup_atap_1lt']:((isset($detail_arr['rt_ekslusif_penutup_atap_1lt']) AND trim($detail_arr['rt_ekslusif_penutup_atap_1lt'])!='')?$detail_arr['rt_ekslusif_penutup_atap_1lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_plafond_1lt" value="<?php echo (isset($_POST['rt_ekslusif_plafond_1lt']) AND trim($_POST['rt_ekslusif_plafond_1lt'])!='')?$_POST['rt_ekslusif_plafond_1lt']:((isset($detail_arr['rt_ekslusif_plafond_1lt']) AND trim($detail_arr['rt_ekslusif_plafond_1lt'])!='')?$detail_arr['rt_ekslusif_plafond_1lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
							<div class="col-sm-1">
								<input class="form-control" type="text" name="rt_ekslusif_dinding_1lt" value="<?php echo (isset($_POST['rt_ekslusif_dinding_1lt']) AND trim($_POST['rt_ekslusif_dinding_1lt'])!='')?$_POST['rt_ekslusif_dinding_1lt']:((isset($detail_arr['rt_ekslusif_dinding_1lt']) AND trim($detail_arr['rt_ekslusif_dinding_1lt'])!='')?$detail_arr['rt_ekslusif_dinding_1lt']:''); ?>">
							</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
							<div class="col-sm-1">
								<input class="form-control" type="text" name="rt_ekslusif_pintu_jendela_1lt" value="<?php echo (isset($_POST['rt_ekslusif_pintu_jendela_1lt']) AND trim($_POST['rt_ekslusif_pintu_jendela_1lt'])!='')?$_POST['rt_ekslusif_pintu_jendela_1lt']:((isset($detail_arr['rt_ekslusif_pintu_jendela_1lt']) AND trim($detail_arr['rt_ekslusif_pintu_jendela_1lt'])!='')?$detail_arr['rt_ekslusif_pintu_jendela_1lt']:''); ?>">
							</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_lantai_1lt" value="<?php echo (isset($_POST['rt_ekslusif_lantai_1lt']) AND trim($_POST['rt_ekslusif_lantai_1lt'])!='')?$_POST['rt_ekslusif_lantai_1lt']:((isset($detail_arr['rt_ekslusif_lantai_1lt']) AND trim($detail_arr['rt_ekslusif_lantai_1lt'])!='')?$detail_arr['rt_ekslusif_lantai_1lt']:''); ?>">
						</div>
					</tr>
					</div>
					<tr>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Ekslusif 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_utilitas_1lt" value="<?php echo (isset($_POST['rt_ekslusif_utilitas_1lt']) AND trim($_POST['rt_ekslusif_utilitas_1lt'])!='')?$_POST['rt_ekslusif_utilitas_1lt']:((isset($detail_arr['rt_ekslusif_utilitas_1lt']) AND trim($detail_arr['rt_ekslusif_utilitas_1lt'])!='')?$detail_arr['rt_ekslusif_utilitas_1lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Ekslusif 1 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_profesional_fee_1lt" value="<?php echo (isset($_POST['rt_ekslusif_profesional_fee_1lt']) AND trim($_POST['rt_ekslusif_profesional_fee_1lt'])!='')?$_POST['rt_ekslusif_profesional_fee_1lt']:((isset($detail_arr['rt_ekslusif_profesional_fee_1lt']) AND trim($detail_arr['rt_ekslusif_profesional_fee_1lt'])!='')?$detail_arr['rt_ekslusif_profesional_fee_1lt']:''); ?>">
						</div>
					</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Ekslusif 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_biaya_perijinan_1lt" value="<?php echo (isset($_POST['rt_ekslusif_biaya_perijinan_1lt']) AND trim($_POST['rt_ekslusif_biaya_perijinan_1lt'])!='')?$_POST['rt_ekslusif_biaya_perijinan_1lt']:((isset($detail_arr['rt_ekslusif_biaya_perijinan_1lt']) AND trim($detail_arr['rt_ekslusif_biaya_perijinan_1lt'])!='')?$detail_arr['rt_ekslusif_biaya_perijinan_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Ekslusif 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_keuntungan_kontraktor_1lt" value="<?php echo (isset($_POST['rt_ekslusif_keuntungan_kontraktor_1lt']) AND trim($_POST['rt_ekslusif_keuntungan_kontraktor_1lt'])!='')?$_POST['rt_ekslusif_keuntungan_kontraktor_1lt']:((isset($detail_arr['rt_ekslusif_keuntungan_kontraktor_1lt']) AND trim($detail_arr['rt_ekslusif_keuntungan_kontraktor_1lt'])!='')?$detail_arr['rt_ekslusif_keuntungan_kontraktor_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_pondasi_1lt" value="<?php echo (isset($_POST['rt_mewah_pondasi_1lt']) AND trim($_POST['rt_mewah_pondasi_1lt'])!='')?$_POST['rt_mewah_pondasi_1lt']:((isset($detail_arr['rt_mewah_pondasi_1lt']) AND trim($detail_arr['rt_mewah_pondasi_1lt'])!='')?$detail_arr['rt_mewah_pondasi_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_struktur_1lt" value="<?php echo (isset($_POST['rt_mewah_struktur_1lt']) AND trim($_POST['rt_mewah_struktur_1lt'])!='')?$_POST['rt_mewah_struktur_1lt']:((isset($detail_arr['rt_mewah_struktur_1lt']) AND trim($detail_arr['rt_mewah_struktur_1lt'])!='')?$detail_arr['rt_mewah_struktur_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_rangka_atap_1lt" value="<?php echo (isset($_POST['rt_mewah_rangka_atap_1lt']) AND trim($_POST['rt_mewah_rangka_atap_1lt'])!='')?$_POST['rt_mewah_rangka_atap_1lt']:((isset($detail_arr['rt_mewah_rangka_atap_1lt']) AND trim($detail_arr['rt_mewah_rangka_atap_1lt'])!='')?$detail_arr['rt_mewah_rangka_atap_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_penutup_atap_1lt" value="<?php echo (isset($_POST['rt_mewah_penutup_atap_1lt']) AND trim($_POST['rt_mewah_penutup_atap_1lt'])!='')?$_POST['rt_mewah_penutup_atap_1lt']:((isset($detail_arr['rt_mewah_penutup_atap_1lt']) AND trim($detail_arr['rt_mewah_penutup_atap_1lt'])!='')?$detail_arr['rt_mewah_penutup_atap_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_plafond_1lt" value="<?php echo (isset($_POST['rt_mewah_plafond_1lt']) AND trim($_POST['rt_mewah_plafond_1lt'])!='')?$_POST['rt_mewah_plafond_1lt']:((isset($detail_arr['rt_mewah_plafond_1lt']) AND trim($detail_arr['rt_mewah_plafond_1lt'])!='')?$detail_arr['rt_mewah_plafond_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_dinding_1lt" value="<?php echo (isset($_POST['rt_mewah_dinding_1lt']) AND trim($_POST['rt_mewah_dinding_1lt'])!='')?$_POST['rt_mewah_dinding_1lt']:((isset($detail_arr['rt_mewah_dinding_1lt']) AND trim($detail_arr['rt_mewah_dinding_1lt'])!='')?$detail_arr['rt_mewah_dinding_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_pintu_jendela_1lt" value="<?php echo (isset($_POST['rt_mewah_pintu_jendela_1lt']) AND trim($_POST['rt_mewah_pintu_jendela_1lt'])!='')?$_POST['rt_mewah_pintu_jendela_1lt']:((isset($detail_arr['rt_mewah_pintu_jendela_1lt']) AND trim($detail_arr['rt_mewah_pintu_jendela_1lt'])!='')?$detail_arr['rt_mewah_pintu_jendela_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_lantai_1lt" value="<?php echo (isset($_POST['rt_mewah_lantai_1lt']) AND trim($_POST['rt_mewah_lantai_1lt'])!='')?$_POST['rt_mewah_lantai_1lt']:((isset($detail_arr['rt_mewah_lantai_1lt']) AND trim($detail_arr['rt_mewah_lantai_1lt'])!='')?$detail_arr['rt_mewah_lantai_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_utilitas_1lt" value="<?php echo (isset($_POST['rt_mewah_utilitas_1lt']) AND trim($_POST['rt_mewah_utilitas_1lt'])!='')?$_POST['rt_mewah_utilitas_1lt']:((isset($detail_arr['rt_mewah_utilitas_1lt']) AND trim($detail_arr['rt_mewah_utilitas_1lt'])!='')?$detail_arr['rt_mewah_utilitas_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_profesional_fee_1lt" value="<?php echo (isset($_POST['rt_mewah_profesional_fee_1lt']) AND trim($_POST['rt_mewah_profesional_fee_1lt'])!='')?$_POST['rt_mewah_profesional_fee_1lt']:((isset($detail_arr['rt_mewah_profesional_fee_1lt']) AND trim($detail_arr['rt_mewah_profesional_fee_1lt'])!='')?$detail_arr['rt_mewah_profesional_fee_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_biaya_perijinan_1lt" value="<?php echo (isset($_POST['rt_mewah_biaya_perijinan_1lt']) AND trim($_POST['rt_mewah_biaya_perijinan_1lt'])!='')?$_POST['rt_mewah_biaya_perijinan_1lt']:((isset($detail_arr['rt_mewah_biaya_perijinan_1lt']) AND trim($detail_arr['rt_mewah_biaya_perijinan_1lt'])!='')?$detail_arr['rt_mewah_biaya_perijinan_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Mewah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_keuntungan_kontraktor_1lt" value="<?php echo (isset($_POST['rt_mewah_keuntungan_kontraktor_1lt']) AND trim($_POST['rt_mewah_keuntungan_kontraktor_1lt'])!='')?$_POST['rt_mewah_keuntungan_kontraktor_1lt']:((isset($detail_arr['rt_mewah_keuntungan_kontraktor_1lt']) AND trim($detail_arr['rt_mewah_keuntungan_kontraktor_1lt'])!='')?$detail_arr['rt_mewah_keuntungan_kontraktor_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_pondasi_1lt" value="<?php echo (isset($_POST['rt_menengah_pondasi_1lt']) AND trim($_POST['rt_menengah_pondasi_1lt'])!='')?$_POST['rt_menengah_pondasi_1lt']:((isset($detail_arr['rt_menengah_pondasi_1lt']) AND trim($detail_arr['rt_menengah_pondasi_1lt'])!='')?$detail_arr['rt_menengah_pondasi_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_struktur_1lt" value="<?php echo (isset($_POST['rt_menengah_struktur_1lt']) AND trim($_POST['rt_menengah_struktur_1lt'])!='')?$_POST['rt_menengah_struktur_1lt']:((isset($detail_arr['rt_menengah_struktur_1lt']) AND trim($detail_arr['rt_menengah_struktur_1lt'])!='')?$detail_arr['rt_menengah_struktur_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_rangka_atap_1lt" value="<?php echo (isset($_POST['rt_menengah_rangka_atap_1lt']) AND trim($_POST['rt_menengah_rangka_atap_1lt'])!='')?$_POST['rt_menengah_rangka_atap_1lt']:((isset($detail_arr['rt_menengah_rangka_atap_1lt']) AND trim($detail_arr['rt_menengah_rangka_atap_1lt'])!='')?$detail_arr['rt_menengah_rangka_atap_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_penutup_atap_1lt" value="<?php echo (isset($_POST['rt_menengah_penutup_atap_1lt']) AND trim($_POST['rt_menengah_penutup_atap_1lt'])!='')?$_POST['rt_menengah_penutup_atap_1lt']:((isset($detail_arr['rt_menengah_penutup_atap_1lt']) AND trim($detail_arr['rt_menengah_penutup_atap_1lt'])!='')?$detail_arr['rt_menengah_penutup_atap_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_plafond_1lt" value="<?php echo (isset($_POST['rt_menengah_plafond_1lt']) AND trim($_POST['rt_menengah_plafond_1lt'])!='')?$_POST['rt_menengah_plafond_1lt']:((isset($detail_arr['rt_menengah_plafond_1lt']) AND trim($detail_arr['rt_menengah_plafond_1lt'])!='')?$detail_arr['rt_menengah_plafond_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_dinding_1lt" value="<?php echo (isset($_POST['rt_menengah_dinding_1lt']) AND trim($_POST['rt_menengah_dinding_1lt'])!='')?$_POST['rt_menengah_dinding_1lt']:((isset($detail_arr['rt_menengah_dinding_1lt']) AND trim($detail_arr['rt_menengah_dinding_1lt'])!='')?$detail_arr['rt_menengah_dinding_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_pintu_jendela_1lt" value="<?php echo (isset($_POST['rt_menengah_pintu_jendela_1lt']) AND trim($_POST['rt_menengah_pintu_jendela_1lt'])!='')?$_POST['rt_menengah_pintu_jendela_1lt']:((isset($detail_arr['rt_menengah_pintu_jendela_1lt']) AND trim($detail_arr['rt_menengah_pintu_jendela_1lt'])!='')?$detail_arr['rt_menengah_pintu_jendela_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_lantai_1lt" value="<?php echo (isset($_POST['rt_menengah_lantai_1lt']) AND trim($_POST['rt_menengah_lantai_1lt'])!='')?$_POST['rt_menengah_lantai_1lt']:((isset($detail_arr['rt_menengah_lantai_1lt']) AND trim($detail_arr['rt_menengah_lantai_1lt'])!='')?$detail_arr['rt_menengah_lantai_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_utilitas_1lt" value="<?php echo (isset($_POST['rt_menengah_utilitas_1lt']) AND trim($_POST['rt_menengah_utilitas_1lt'])!='')?$_POST['rt_menengah_utilitas_1lt']:((isset($detail_arr['rt_menengah_utilitas_1lt']) AND trim($detail_arr['rt_menengah_utilitas_1lt'])!='')?$detail_arr['rt_menengah_utilitas_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_profesional_fee_1lt" value="<?php echo (isset($_POST['rt_menengah_profesional_fee_1lt']) AND trim($_POST['rt_menengah_profesional_fee_1lt'])!='')?$_POST['rt_menengah_profesional_fee_1lt']:((isset($detail_arr['rt_menengah_profesional_fee_1lt']) AND trim($detail_arr['rt_menengah_profesional_fee_1lt'])!='')?$detail_arr['rt_menengah_profesional_fee_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_biaya_perijinan_1lt" value="<?php echo (isset($_POST['rt_menengah_biaya_perijinan_1lt']) AND trim($_POST['rt_menengah_biaya_perijinan_1lt'])!='')?$_POST['rt_menengah_biaya_perijinan_1lt']:((isset($detail_arr['rt_menengah_biaya_perijinan_1lt']) AND trim($detail_arr['rt_menengah_biaya_perijinan_1lt'])!='')?$detail_arr['rt_menengah_biaya_perijinan_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Menengah 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_keuntungan_kontraktor_1lt" value="<?php echo (isset($_POST['rt_menengah_keuntungan_kontraktor_1lt']) AND trim($_POST['rt_menengah_keuntungan_kontraktor_1lt'])!='')?$_POST['rt_menengah_keuntungan_kontraktor_1lt']:((isset($detail_arr['rt_menengah_keuntungan_kontraktor_1lt']) AND trim($detail_arr['rt_menengah_keuntungan_kontraktor_1lt'])!='')?$detail_arr['rt_menengah_keuntungan_kontraktor_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_pondasi_1lt" value="<?php echo (isset($_POST['rt_sederhana_pondasi_1lt']) AND trim($_POST['rt_sederhana_pondasi_1lt'])!='')?$_POST['rt_sederhana_pondasi_1lt']:((isset($detail_arr['rt_sederhana_pondasi_1lt']) AND trim($detail_arr['rt_sederhana_pondasi_1lt'])!='')?$detail_arr['rt_sederhana_pondasi_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_struktur_1lt" value="<?php echo (isset($_POST['rt_sederhana_struktur_1lt']) AND trim($_POST['rt_sederhana_struktur_1lt'])!='')?$_POST['rt_sederhana_struktur_1lt']:((isset($detail_arr['rt_sederhana_struktur_1lt']) AND trim($detail_arr['rt_sederhana_struktur_1lt'])!='')?$detail_arr['rt_sederhana_struktur_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_rangka_atap_1lt" value="<?php echo (isset($_POST['rt_sederhana_rangka_atap_1lt']) AND trim($_POST['rt_sederhana_rangka_atap_1lt'])!='')?$_POST['rt_sederhana_rangka_atap_1lt']:((isset($detail_arr['rt_sederhana_rangka_atap_1lt']) AND trim($detail_arr['rt_sederhana_rangka_atap_1lt'])!='')?$detail_arr['rt_sederhana_rangka_atap_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_penutup_atap_1lt" value="<?php echo (isset($_POST['rt_sederhana_penutup_atap_1lt']) AND trim($_POST['rt_sederhana_penutup_atap_1lt'])!='')?$_POST['rt_sederhana_penutup_atap_1lt']:((isset($detail_arr['rt_sederhana_penutup_atap_1lt']) AND trim($detail_arr['rt_sederhana_penutup_atap_1lt'])!='')?$detail_arr['rt_sederhana_penutup_atap_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_plafond_1lt" value="<?php echo (isset($_POST['rt_sederhana_plafond_1lt']) AND trim($_POST['rt_sederhana_plafond_1lt'])!='')?$_POST['rt_sederhana_plafond_1lt']:((isset($detail_arr['rt_sederhana_plafond_1lt']) AND trim($detail_arr['rt_sederhana_plafond_1lt'])!='')?$detail_arr['rt_sederhana_plafond_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_dinding_1lt" value="<?php echo (isset($_POST['rt_sederhana_dinding_1lt']) AND trim($_POST['rt_sederhana_dinding_1lt'])!='')?$_POST['rt_sederhana_dinding_1lt']:((isset($detail_arr['rt_sederhana_dinding_1lt']) AND trim($detail_arr['rt_sederhana_dinding_1lt'])!='')?$detail_arr['rt_sederhana_dinding_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_pintu_jendela_1lt" value="<?php echo (isset($_POST['rt_sederhana_pintu_jendela_1lt']) AND trim($_POST['rt_sederhana_pintu_jendela_1lt'])!='')?$_POST['rt_sederhana_pintu_jendela_1lt']:((isset($detail_arr['rt_sederhana_pintu_jendela_1lt']) AND trim($detail_arr['rt_sederhana_pintu_jendela_1lt'])!='')?$detail_arr['rt_sederhana_pintu_jendela_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_lantai_1lt" value="<?php echo (isset($_POST['rt_sederhana_lantai_1lt']) AND trim($_POST['rt_sederhana_lantai_1lt'])!='')?$_POST['rt_sederhana_lantai_1lt']:((isset($detail_arr['rt_sederhana_lantai_1lt']) AND trim($detail_arr['rt_sederhana_lantai_1lt'])!='')?$detail_arr['rt_sederhana_lantai_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_utilitas_1lt" value="<?php echo (isset($_POST['rt_sederhana_utilitas_1lt']) AND trim($_POST['rt_sederhana_utilitas_1lt'])!='')?$_POST['rt_sederhana_utilitas_1lt']:((isset($detail_arr['rt_sederhana_utilitas_1lt']) AND trim($detail_arr['rt_sederhana_utilitas_1lt'])!='')?$detail_arr['rt_sederhana_utilitas_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_profesional_fee_1lt" value="<?php echo (isset($_POST['rt_sederhana_profesional_fee_1lt']) AND trim($_POST['rt_sederhana_profesional_fee_1lt'])!='')?$_POST['rt_sederhana_profesional_fee_1lt']:((isset($detail_arr['rt_sederhana_profesional_fee_1lt']) AND trim($detail_arr['rt_sederhana_profesional_fee_1lt'])!='')?$detail_arr['rt_sederhana_profesional_fee_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_biaya_perijinan_1lt" value="<?php echo (isset($_POST['rt_sederhana_biaya_perijinan_1lt']) AND trim($_POST['rt_sederhana_biaya_perijinan_1lt'])!='')?$_POST['rt_sederhana_biaya_perijinan_1lt']:((isset($detail_arr['rt_sederhana_biaya_perijinan_1lt']) AND trim($detail_arr['rt_sederhana_biaya_perijinan_1lt'])!='')?$detail_arr['rt_sederhana_biaya_perijinan_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Sederhana 1 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_keuntungan_kontraktor_1lt" value="<?php echo (isset($_POST['rt_sederhana_keuntungan_kontraktor_1lt']) AND trim($_POST['rt_sederhana_keuntungan_kontraktor_1lt'])!='')?$_POST['rt_sederhana_keuntungan_kontraktor_1lt']:((isset($detail_arr['rt_sederhana_keuntungan_kontraktor_1lt']) AND trim($detail_arr['rt_sederhana_keuntungan_kontraktor_1lt'])!='')?$detail_arr['rt_sederhana_keuntungan_kontraktor_1lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_pondasi_2lt" value="<?php echo (isset($_POST['rt_ekslusif_pondasi_2lt']) AND trim($_POST['rt_ekslusif_pondasi_2lt'])!='')?$_POST['rt_ekslusif_pondasi_2lt']:((isset($detail_arr['rt_ekslusif_pondasi_2lt']) AND trim($detail_arr['rt_ekslusif_pondasi_2lt'])!='')?$detail_arr['rt_ekslusif_pondasi_2lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_struktur_2lt" value="<?php echo (isset($_POST['rt_ekslusif_struktur_2lt']) AND trim($_POST['rt_ekslusif_struktur_2lt'])!='')?$_POST['rt_ekslusif_struktur_2lt']:((isset($detail_arr['rt_ekslusif_struktur_2lt']) AND trim($detail_arr['rt_ekslusif_struktur_2lt'])!='')?$detail_arr['rt_ekslusif_struktur_2lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_rangka_atap_2lt" value="<?php echo (isset($_POST['rt_ekslusif_rangka_atap_2lt']) AND trim($_POST['rt_ekslusif_rangka_atap_2lt'])!='')?$_POST['rt_ekslusif_rangka_atap_2lt']:((isset($detail_arr['rt_ekslusif_rangka_atap_2lt']) AND trim($detail_arr['rt_ekslusif_rangka_atap_2lt'])!='')?$detail_arr['rt_ekslusif_rangka_atap_2lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_penutup_atap_2lt" value="<?php echo (isset($_POST['rt_ekslusif_penutup_atap_2lt']) AND trim($_POST['rt_ekslusif_penutup_atap_2lt'])!='')?$_POST['rt_ekslusif_penutup_atap_2lt']:((isset($detail_arr['rt_ekslusif_penutup_atap_2lt']) AND trim($detail_arr['rt_ekslusif_penutup_atap_2lt'])!='')?$detail_arr['rt_ekslusif_penutup_atap_2lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_plafond_2lt" value="<?php echo (isset($_POST['rt_ekslusif_plafond_2lt']) AND trim($_POST['rt_ekslusif_plafond_2lt'])!='')?$_POST['rt_ekslusif_plafond_2lt']:((isset($detail_arr['rt_ekslusif_plafond_2lt']) AND trim($detail_arr['rt_ekslusif_plafond_2lt'])!='')?$detail_arr['rt_ekslusif_plafond_2lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
							<div class="col-sm-1">
								<input class="form-control" type="text" name="rt_ekslusif_dinding_2lt" value="<?php echo (isset($_POST['rt_ekslusif_dinding_2lt']) AND trim($_POST['rt_ekslusif_dinding_2lt'])!='')?$_POST['rt_ekslusif_dinding_2lt']:((isset($detail_arr['rt_ekslusif_dinding_2lt']) AND trim($detail_arr['rt_ekslusif_dinding_2lt'])!='')?$detail_arr['rt_ekslusif_dinding_2lt']:''); ?>">
							</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
							<div class="col-sm-1">
								<input class="form-control" type="text" name="rt_ekslusif_pintu_jendela_2lt" value="<?php echo (isset($_POST['rt_ekslusif_pintu_jendela_2lt']) AND trim($_POST['rt_ekslusif_pintu_jendela_2lt'])!='')?$_POST['rt_ekslusif_pintu_jendela_2lt']:((isset($detail_arr['rt_ekslusif_pintu_jendela_2lt']) AND trim($detail_arr['rt_ekslusif_pintu_jendela_2lt'])!='')?$detail_arr['rt_ekslusif_pintu_jendela_2lt']:''); ?>">
							</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_lantai_2lt" value="<?php echo (isset($_POST['rt_ekslusif_lantai_2lt']) AND trim($_POST['rt_ekslusif_lantai_2lt'])!='')?$_POST['rt_ekslusif_lantai_2lt']:((isset($detail_arr['rt_ekslusif_lantai_2lt']) AND trim($detail_arr['rt_ekslusif_lantai_2lt'])!='')?$detail_arr['rt_ekslusif_lantai_2lt']:''); ?>">
						</div>
					</tr>
					</div>
					<tr>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Ekslusif 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_utilitas_2lt" value="<?php echo (isset($_POST['rt_ekslusif_utilitas_2lt']) AND trim($_POST['rt_ekslusif_utilitas_2lt'])!='')?$_POST['rt_ekslusif_utilitas_2lt']:((isset($detail_arr['rt_ekslusif_utilitas_2lt']) AND trim($detail_arr['rt_ekslusif_utilitas_2lt'])!='')?$detail_arr['rt_ekslusif_utilitas_2lt']:''); ?>">
						</div>
						</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Ekslusif 2 Lantai</label>
						<tr>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_profesional_fee_2lt" value="<?php echo (isset($_POST['rt_ekslusif_profesional_fee_2lt']) AND trim($_POST['rt_ekslusif_profesional_fee_2lt'])!='')?$_POST['rt_ekslusif_profesional_fee_2lt']:((isset($detail_arr['rt_ekslusif_profesional_fee_2lt']) AND trim($detail_arr['rt_ekslusif_profesional_fee_2lt'])!='')?$detail_arr['rt_ekslusif_profesional_fee_2lt']:''); ?>">
						</div>
					</tr>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Ekslusif 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_biaya_perijinan_2lt" value="<?php echo (isset($_POST['rt_ekslusif_biaya_perijinan_2lt']) AND trim($_POST['rt_ekslusif_biaya_perijinan_2lt'])!='')?$_POST['rt_ekslusif_biaya_perijinan_2lt']:((isset($detail_arr['rt_ekslusif_biaya_perijinan_2lt']) AND trim($detail_arr['rt_ekslusif_biaya_perijinan_2lt'])!='')?$detail_arr['rt_ekslusif_biaya_perijinan_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Ekslusif 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_ekslusif_keuntungan_kontraktor_2lt" value="<?php echo (isset($_POST['rt_ekslusif_keuntungan_kontraktor_2lt']) AND trim($_POST['rt_ekslusif_keuntungan_kontraktor_2lt'])!='')?$_POST['rt_ekslusif_keuntungan_kontraktor_2lt']:((isset($detail_arr['rt_ekslusif_keuntungan_kontraktor_2lt']) AND trim($detail_arr['rt_ekslusif_keuntungan_kontraktor_2lt'])!='')?$detail_arr['rt_ekslusif_keuntungan_kontraktor_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_pondasi_2lt" value="<?php echo (isset($_POST['rt_mewah_pondasi_2lt']) AND trim($_POST['rt_mewah_pondasi_2lt'])!='')?$_POST['rt_mewah_pondasi_2lt']:((isset($detail_arr['rt_mewah_pondasi_2lt']) AND trim($detail_arr['rt_mewah_pondasi_2lt'])!='')?$detail_arr['rt_mewah_pondasi_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_struktur_2lt" value="<?php echo (isset($_POST['rt_mewah_struktur_2lt']) AND trim($_POST['rt_mewah_struktur_2lt'])!='')?$_POST['rt_mewah_struktur_2lt']:((isset($detail_arr['rt_mewah_struktur_2lt']) AND trim($detail_arr['rt_mewah_struktur_2lt'])!='')?$detail_arr['rt_mewah_struktur_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_rangka_atap_2lt" value="<?php echo (isset($_POST['rt_mewah_rangka_atap_2lt']) AND trim($_POST['rt_mewah_rangka_atap_2lt'])!='')?$_POST['rt_mewah_rangka_atap_2lt']:((isset($detail_arr['rt_mewah_rangka_atap_2lt']) AND trim($detail_arr['rt_mewah_rangka_atap_2lt'])!='')?$detail_arr['rt_mewah_rangka_atap_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_penutup_atap_2lt" value="<?php echo (isset($_POST['rt_mewah_penutup_atap_2lt']) AND trim($_POST['rt_mewah_penutup_atap_2lt'])!='')?$_POST['rt_mewah_penutup_atap_2lt']:((isset($detail_arr['rt_mewah_penutup_atap_2lt']) AND trim($detail_arr['rt_mewah_penutup_atap_2lt'])!='')?$detail_arr['rt_mewah_penutup_atap_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_plafond_2lt" value="<?php echo (isset($_POST['rt_mewah_plafond_2lt']) AND trim($_POST['rt_mewah_plafond_2lt'])!='')?$_POST['rt_mewah_plafond_2lt']:((isset($detail_arr['rt_mewah_plafond_2lt']) AND trim($detail_arr['rt_mewah_plafond_2lt'])!='')?$detail_arr['rt_mewah_plafond_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_dinding_2lt" value="<?php echo (isset($_POST['rt_mewah_dinding_2lt']) AND trim($_POST['rt_mewah_dinding_2lt'])!='')?$_POST['rt_mewah_dinding_2lt']:((isset($detail_arr['rt_mewah_dinding_2lt']) AND trim($detail_arr['rt_mewah_dinding_2lt'])!='')?$detail_arr['rt_mewah_dinding_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_pintu_jendela_2lt" value="<?php echo (isset($_POST['rt_mewah_pintu_jendela_2lt']) AND trim($_POST['rt_mewah_pintu_jendela_2lt'])!='')?$_POST['rt_mewah_pintu_jendela_2lt']:((isset($detail_arr['rt_mewah_pintu_jendela_2lt']) AND trim($detail_arr['rt_mewah_pintu_jendela_2lt'])!='')?$detail_arr['rt_mewah_pintu_jendela_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_lantai_2lt" value="<?php echo (isset($_POST['rt_mewah_lantai_2lt']) AND trim($_POST['rt_mewah_lantai_2lt'])!='')?$_POST['rt_mewah_lantai_2lt']:((isset($detail_arr['rt_mewah_lantai_2lt']) AND trim($detail_arr['rt_mewah_lantai_2lt'])!='')?$detail_arr['rt_mewah_lantai_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_utilitas_2lt" value="<?php echo (isset($_POST['rt_mewah_utilitas_2lt']) AND trim($_POST['rt_mewah_utilitas_2lt'])!='')?$_POST['rt_mewah_utilitas_2lt']:((isset($detail_arr['rt_mewah_utilitas_2lt']) AND trim($detail_arr['rt_mewah_utilitas_2lt'])!='')?$detail_arr['rt_mewah_utilitas_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_profesional_fee_2lt" value="<?php echo (isset($_POST['rt_mewah_profesional_fee_2lt']) AND trim($_POST['rt_mewah_profesional_fee_2lt'])!='')?$_POST['rt_mewah_profesional_fee_2lt']:((isset($detail_arr['rt_mewah_profesional_fee_2lt']) AND trim($detail_arr['rt_mewah_profesional_fee_2lt'])!='')?$detail_arr['rt_mewah_profesional_fee_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_biaya_perijinan_2lt" value="<?php echo (isset($_POST['rt_mewah_biaya_perijinan_2lt']) AND trim($_POST['rt_mewah_biaya_perijinan_2lt'])!='')?$_POST['rt_mewah_biaya_perijinan_2lt']:((isset($detail_arr['rt_mewah_biaya_perijinan_2lt']) AND trim($detail_arr['rt_mewah_biaya_perijinan_2lt'])!='')?$detail_arr['rt_mewah_biaya_perijinan_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Mewah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_mewah_keuntungan_kontraktor_2lt" value="<?php echo (isset($_POST['rt_mewah_keuntungan_kontraktor_2lt']) AND trim($_POST['rt_mewah_keuntungan_kontraktor_2lt'])!='')?$_POST['rt_mewah_keuntungan_kontraktor_2lt']:((isset($detail_arr['rt_mewah_keuntungan_kontraktor_2lt']) AND trim($detail_arr['rt_mewah_keuntungan_kontraktor_2lt'])!='')?$detail_arr['rt_mewah_keuntungan_kontraktor_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_pondasi_2lt" value="<?php echo (isset($_POST['rt_menengah_pondasi_2lt']) AND trim($_POST['rt_menengah_pondasi_2lt'])!='')?$_POST['rt_menengah_pondasi_2lt']:((isset($detail_arr['rt_menengah_pondasi_2lt']) AND trim($detail_arr['rt_menengah_pondasi_2lt'])!='')?$detail_arr['rt_menengah_pondasi_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_struktur_2lt" value="<?php echo (isset($_POST['rt_menengah_struktur_2lt']) AND trim($_POST['rt_menengah_struktur_2lt'])!='')?$_POST['rt_menengah_struktur_2lt']:((isset($detail_arr['rt_menengah_struktur_2lt']) AND trim($detail_arr['rt_menengah_struktur_2lt'])!='')?$detail_arr['rt_menengah_struktur_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_rangka_atap_2lt" value="<?php echo (isset($_POST['rt_menengah_rangka_atap_2lt']) AND trim($_POST['rt_menengah_rangka_atap_2lt'])!='')?$_POST['rt_menengah_rangka_atap_2lt']:((isset($detail_arr['rt_menengah_rangka_atap_2lt']) AND trim($detail_arr['rt_menengah_rangka_atap_2lt'])!='')?$detail_arr['rt_menengah_rangka_atap_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_penutup_atap_2lt" value="<?php echo (isset($_POST['rt_menengah_penutup_atap_2lt']) AND trim($_POST['rt_menengah_penutup_atap_2lt'])!='')?$_POST['rt_menengah_penutup_atap_2lt']:((isset($detail_arr['rt_menengah_penutup_atap_2lt']) AND trim($detail_arr['rt_menengah_penutup_atap_2lt'])!='')?$detail_arr['rt_menengah_penutup_atap_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_plafond_2lt" value="<?php echo (isset($_POST['rt_menengah_plafond_2lt']) AND trim($_POST['rt_menengah_plafond_2lt'])!='')?$_POST['rt_menengah_plafond_2lt']:((isset($detail_arr['rt_menengah_plafond_2lt']) AND trim($detail_arr['rt_menengah_plafond_2lt'])!='')?$detail_arr['rt_menengah_plafond_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_dinding_2lt" value="<?php echo (isset($_POST['rt_menengah_dinding_2lt']) AND trim($_POST['rt_menengah_dinding_2lt'])!='')?$_POST['rt_menengah_dinding_2lt']:((isset($detail_arr['rt_menengah_dinding_2lt']) AND trim($detail_arr['rt_menengah_dinding_2lt'])!='')?$detail_arr['rt_menengah_dinding_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_pintu_jendela_2lt" value="<?php echo (isset($_POST['rt_menengah_pintu_jendela_2lt']) AND trim($_POST['rt_menengah_pintu_jendela_2lt'])!='')?$_POST['rt_menengah_pintu_jendela_2lt']:((isset($detail_arr['rt_menengah_pintu_jendela_2lt']) AND trim($detail_arr['rt_menengah_pintu_jendela_2lt'])!='')?$detail_arr['rt_menengah_pintu_jendela_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_lantai_2lt" value="<?php echo (isset($_POST['rt_menengah_lantai_2lt']) AND trim($_POST['rt_menengah_lantai_2lt'])!='')?$_POST['rt_menengah_lantai_2lt']:((isset($detail_arr['rt_menengah_lantai_2lt']) AND trim($detail_arr['rt_menengah_lantai_2lt'])!='')?$detail_arr['rt_menengah_lantai_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_utilitas_2lt" value="<?php echo (isset($_POST['rt_menengah_utilitas_2lt']) AND trim($_POST['rt_menengah_utilitas_2lt'])!='')?$_POST['rt_menengah_utilitas_2lt']:((isset($detail_arr['rt_menengah_utilitas_2lt']) AND trim($detail_arr['rt_menengah_utilitas_2lt'])!='')?$detail_arr['rt_menengah_utilitas_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_profesional_fee_2lt" value="<?php echo (isset($_POST['rt_menengah_profesional_fee_2lt']) AND trim($_POST['rt_menengah_profesional_fee_2lt'])!='')?$_POST['rt_menengah_profesional_fee_2lt']:((isset($detail_arr['rt_menengah_profesional_fee_2lt']) AND trim($detail_arr['rt_menengah_profesional_fee_2lt'])!='')?$detail_arr['rt_menengah_profesional_fee_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_biaya_perijinan_2lt" value="<?php echo (isset($_POST['rt_menengah_biaya_perijinan_2lt']) AND trim($_POST['rt_menengah_biaya_perijinan_2lt'])!='')?$_POST['rt_menengah_biaya_perijinan_2lt']:((isset($detail_arr['rt_menengah_biaya_perijinan_2lt']) AND trim($detail_arr['rt_menengah_biaya_perijinan_2lt'])!='')?$detail_arr['rt_menengah_biaya_perijinan_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Menengah 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_menengah_keuntungan_kontraktor_2lt" value="<?php echo (isset($_POST['rt_menengah_keuntungan_kontraktor_2lt']) AND trim($_POST['rt_menengah_keuntungan_kontraktor_2lt'])!='')?$_POST['rt_menengah_keuntungan_kontraktor_2lt']:((isset($detail_arr['rt_menengah_keuntungan_kontraktor_2lt']) AND trim($detail_arr['rt_menengah_keuntungan_kontraktor_2lt'])!='')?$detail_arr['rt_menengah_keuntungan_kontraktor_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_pondasi_2lt" value="<?php echo (isset($_POST['rt_sederhana_pondasi_2lt']) AND trim($_POST['rt_sederhana_pondasi_2lt'])!='')?$_POST['rt_sederhana_pondasi_2lt']:((isset($detail_arr['rt_sederhana_pondasi_2lt']) AND trim($detail_arr['rt_sederhana_pondasi_2lt'])!='')?$detail_arr['rt_sederhana_pondasi_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_struktur_2lt" value="<?php echo (isset($_POST['rt_sederhana_struktur_2lt']) AND trim($_POST['rt_sederhana_struktur_2lt'])!='')?$_POST['rt_sederhana_struktur_2lt']:((isset($detail_arr['rt_sederhana_struktur_2lt']) AND trim($detail_arr['rt_sederhana_struktur_2lt'])!='')?$detail_arr['rt_sederhana_struktur_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_rangka_atap_2lt" value="<?php echo (isset($_POST['rt_sederhana_rangka_atap_2lt']) AND trim($_POST['rt_sederhana_rangka_atap_2lt'])!='')?$_POST['rt_sederhana_rangka_atap_2lt']:((isset($detail_arr['rt_sederhana_rangka_atap_2lt']) AND trim($detail_arr['rt_sederhana_rangka_atap_2lt'])!='')?$detail_arr['rt_sederhana_rangka_atap_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_penutup_atap_2lt" value="<?php echo (isset($_POST['rt_sederhana_penutup_atap_2lt']) AND trim($_POST['rt_sederhana_penutup_atap_2lt'])!='')?$_POST['rt_sederhana_penutup_atap_2lt']:((isset($detail_arr['rt_sederhana_penutup_atap_2lt']) AND trim($detail_arr['rt_sederhana_penutup_atap_2lt'])!='')?$detail_arr['rt_sederhana_penutup_atap_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_plafond_2lt" value="<?php echo (isset($_POST['rt_sederhana_plafond_2lt']) AND trim($_POST['rt_sederhana_plafond_2lt'])!='')?$_POST['rt_sederhana_plafond_2lt']:((isset($detail_arr['rt_sederhana_plafond_2lt']) AND trim($detail_arr['rt_sederhana_plafond_2lt'])!='')?$detail_arr['rt_sederhana_plafond_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_dinding_2lt" value="<?php echo (isset($_POST['rt_sederhana_dinding_2lt']) AND trim($_POST['rt_sederhana_dinding_2lt'])!='')?$_POST['rt_sederhana_dinding_2lt']:((isset($detail_arr['rt_sederhana_dinding_2lt']) AND trim($detail_arr['rt_sederhana_dinding_2lt'])!='')?$detail_arr['rt_sederhana_dinding_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_pintu_jendela_2lt" value="<?php echo (isset($_POST['rt_sederhana_pintu_jendela_2lt']) AND trim($_POST['rt_sederhana_pintu_jendela_2lt'])!='')?$_POST['rt_sederhana_pintu_jendela_2lt']:((isset($detail_arr['rt_sederhana_pintu_jendela_2lt']) AND trim($detail_arr['rt_sederhana_pintu_jendela_2lt'])!='')?$detail_arr['rt_sederhana_pintu_jendela_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_lantai_2lt" value="<?php echo (isset($_POST['rt_sederhana_lantai_2lt']) AND trim($_POST['rt_sederhana_lantai_2lt'])!='')?$_POST['rt_sederhana_lantai_2lt']:((isset($detail_arr['rt_sederhana_lantai_2lt']) AND trim($detail_arr['rt_sederhana_lantai_2lt'])!='')?$detail_arr['rt_sederhana_lantai_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_utilitas_2lt" value="<?php echo (isset($_POST['rt_sederhana_utilitas_2lt']) AND trim($_POST['rt_sederhana_utilitas_2lt'])!='')?$_POST['rt_sederhana_utilitas_2lt']:((isset($detail_arr['rt_sederhana_utilitas_2lt']) AND trim($detail_arr['rt_sederhana_utilitas_2lt'])!='')?$detail_arr['rt_sederhana_utilitas_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_profesional_fee_2lt" value="<?php echo (isset($_POST['rt_sederhana_profesional_fee_2lt']) AND trim($_POST['rt_sederhana_profesional_fee_2lt'])!='')?$_POST['rt_sederhana_profesional_fee_2lt']:((isset($detail_arr['rt_sederhana_profesional_fee_2lt']) AND trim($detail_arr['rt_sederhana_profesional_fee_2lt'])!='')?$detail_arr['rt_sederhana_profesional_fee_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_biaya_perijinan_2lt" value="<?php echo (isset($_POST['rt_sederhana_biaya_perijinan_2lt']) AND trim($_POST['rt_sederhana_biaya_perijinan_2lt'])!='')?$_POST['rt_sederhana_biaya_perijinan_2lt']:((isset($detail_arr['rt_sederhana_biaya_perijinan_2lt']) AND trim($detail_arr['rt_sederhana_biaya_perijinan_2lt'])!='')?$detail_arr['rt_sederhana_biaya_perijinan_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Rumah Tinggal Sederhana 2 Lantai</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="rt_sederhana_keuntungan_kontraktor_2lt" value="<?php echo (isset($_POST['rt_sederhana_keuntungan_kontraktor_2lt']) AND trim($_POST['rt_sederhana_keuntungan_kontraktor_2lt'])!='')?$_POST['rt_sederhana_keuntungan_kontraktor_2lt']:((isset($detail_arr['rt_sederhana_keuntungan_kontraktor_2lt']) AND trim($detail_arr['rt_sederhana_keuntungan_kontraktor_2lt'])!='')?$detail_arr['rt_sederhana_keuntungan_kontraktor_2lt']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_pondasi" value="<?php echo (isset($_POST['bp_pondasi']) AND trim($_POST['bp_pondasi'])!='')?$_POST['bp_pondasi']:((isset($detail_arr['bp_pondasi']) AND trim($detail_arr['bp_pondasi'])!='')?$detail_arr['bp_pondasi']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_struktur" value="<?php echo (isset($_POST['bp_struktur']) AND trim($_POST['bp_struktur'])!='')?$_POST['bp_struktur']:((isset($detail_arr['bp_struktur']) AND trim($detail_arr['bp_struktur'])!='')?$detail_arr['bp_struktur']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_rangka_atap" value="<?php echo (isset($_POST['bp_rangka_atap']) AND trim($_POST['bp_rangka_atap'])!='')?$_POST['bp_rangka_atap']:((isset($detail_arr['bp_rangka_atap']) AND trim($detail_arr['bp_rangka_atap'])!='')?$detail_arr['bp_rangka_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_penutup_atap" value="<?php echo (isset($_POST['bp_penutup_atap']) AND trim($_POST['bp_penutup_atap'])!='')?$_POST['bp_penutup_atap']:((isset($detail_arr['bp_penutup_atap']) AND trim($detail_arr['bp_penutup_atap'])!='')?$detail_arr['bp_penutup_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_plafond" value="<?php echo (isset($_POST['bp_plafond']) AND trim($_POST['bp_plafond'])!='')?$_POST['bp_plafond']:((isset($detail_arr['bp_plafond']) AND trim($detail_arr['bp_plafond'])!='')?$detail_arr['bp_plafond']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_dinding" value="<?php echo (isset($_POST['bp_dinding']) AND trim($_POST['bp_dinding'])!='')?$_POST['bp_dinding']:((isset($detail_arr['bp_dinding']) AND trim($detail_arr['bp_dinding'])!='')?$detail_arr['bp_dinding']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_pintu_jendela" value="<?php echo (isset($_POST['bp_pintu_jendela']) AND trim($_POST['bp_pintu_jendela'])!='')?$_POST['bp_pintu_jendela']:((isset($detail_arr['bp_pintu_jendela']) AND trim($detail_arr['bp_pintu_jendela'])!='')?$detail_arr['bp_pintu_jendela']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_lantai" value="<?php echo (isset($_POST['bp_lantai']) AND trim($_POST['bp_lantai'])!='')?$_POST['bp_lantai']:((isset($detail_arr['bp_lantai']) AND trim($detail_arr['bp_lantai'])!='')?$detail_arr['bp_lantai']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_utilitas" value="<?php echo (isset($_POST['bp_utilitas']) AND trim($_POST['bp_utilitas'])!='')?$_POST['bp_utilitas']:((isset($detail_arr['bp_utilitas']) AND trim($detail_arr['bp_utilitas'])!='')?$detail_arr['bp_utilitas']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_profesional_fee" value="<?php echo (isset($_POST['bp_profesional_fee']) AND trim($_POST['bp_profesional_fee'])!='')?$_POST['bp_profesional_fee']:((isset($detail_arr['bp_profesional_fee']) AND trim($detail_arr['bp_profesional_fee'])!='')?$detail_arr['bp_profesional_fee']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Bangunan Perkebunan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bp_biaya_perijinan" value="<?php echo (isset($_POST['bp_biaya_perijinan']) AND trim($_POST['bp_biaya_perijinan'])!='')?$_POST['bp_biaya_perijinan']:((isset($detail_arr['bp_biaya_perijinan']) AND trim($detail_arr['bp_biaya_perijinan'])!='')?$detail_arr['bp_biaya_perijinan']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_pondasi" value="<?php echo (isset($_POST['gudang_pondasi']) AND trim($_POST['gudang_pondasi'])!='')?$_POST['gudang_pondasi']:((isset($detail_arr['gudang_pondasi']) AND trim($detail_arr['gudang_pondasi'])!='')?$detail_arr['gudang_pondasi']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_struktur" value="<?php echo (isset($_POST['gudang_struktur']) AND trim($_POST['gudang_struktur'])!='')?$_POST['gudang_struktur']:((isset($detail_arr['gudang_struktur']) AND trim($detail_arr['gudang_struktur'])!='')?$detail_arr['gudang_struktur']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Rangka Atap Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_rangka_atap" value="<?php echo (isset($_POST['gudang_rangka_atap']) AND trim($_POST['gudang_rangka_atap'])!='')?$_POST['gudang_rangka_atap']:((isset($detail_arr['gudang_rangka_atap']) AND trim($detail_arr['gudang_rangka_atap'])!='')?$detail_arr['gudang_rangka_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_penutup_atap" value="<?php echo (isset($_POST['gudang_penutup_atap']) AND trim($_POST['gudang_penutup_atap'])!='')?$_POST['gudang_penutup_atap']:((isset($detail_arr['gudang_penutup_atap']) AND trim($detail_arr['gudang_penutup_atap'])!='')?$detail_arr['gudang_penutup_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_dinding" value="<?php echo (isset($_POST['gudang_dinding']) AND trim($_POST['gudang_dinding'])!='')?$_POST['gudang_dinding']:((isset($detail_arr['gudang_dinding']) AND trim($detail_arr['gudang_dinding'])!='')?$detail_arr['gudang_dinding']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_pintu_jendela" value="<?php echo (isset($_POST['gudang_pintu_jendela']) AND trim($_POST['gudang_pintu_jendela'])!='')?$_POST['gudang_pintu_jendela']:((isset($detail_arr['gudang_pintu_jendela']) AND trim($detail_arr['gudang_pintu_jendela'])!='')?$detail_arr['gudang_pintu_jendela']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_lantai" value="<?php echo (isset($_POST['gudang_lantai']) AND trim($_POST['gudang_lantai'])!='')?$_POST['gudang_lantai']:((isset($detail_arr['gudang_lantai']) AND trim($detail_arr['gudang_lantai'])!='')?$detail_arr['gudang_lantai']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_utilitas" value="<?php echo (isset($_POST['gudang_utilitas']) AND trim($_POST['gudang_utilitas'])!='')?$_POST['gudang_utilitas']:((isset($detail_arr['gudang_utilitas']) AND trim($detail_arr['gudang_utilitas'])!='')?$detail_arr['gudang_utilitas']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_profesional_fee" value="<?php echo (isset($_POST['gudang_profesional_fee']) AND trim($_POST['gudang_profesional_fee'])!='')?$_POST['gudang_profesional_fee']:((isset($detail_arr['gudang_profesional_fee']) AND trim($detail_arr['gudang_profesional_fee'])!='')?$detail_arr['gudang_profesional_fee']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_biaya_perijinan" value="<?php echo (isset($_POST['gudang_biaya_perijinan']) AND trim($_POST['gudang_biaya_perijinan'])!='')?$_POST['gudang_biaya_perijinan']:((isset($detail_arr['gudang_biaya_perijinan']) AND trim($detail_arr['gudang_biaya_perijinan'])!='')?$detail_arr['gudang_biaya_perijinan']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Gudang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="gudang_keuntungan_kontraktor" value="<?php echo (isset($_POST['gudang_keuntungan_kontraktor']) AND trim($_POST['gudang_keuntungan_kontraktor'])!='')?$_POST['gudang_keuntungan_kontraktor']:((isset($detail_arr['gudang_keuntungan_kontraktor']) AND trim($detail_arr['gudang_keuntungan_kontraktor'])!='')?$detail_arr['gudang_keuntungan_kontraktor']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_pondasi" value="<?php echo (isset($_POST['bgb_rendah_pondasi']) AND trim($_POST['bgb_rendah_pondasi'])!='')?$_POST['bgb_rendah_pondasi']:((isset($detail_arr['bgb_rendah_pondasi']) AND trim($detail_arr['bgb_rendah_pondasi'])!='')?$detail_arr['bgb_rendah_pondasi']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_struktur" value="<?php echo (isset($_POST['bgb_rendah_struktur']) AND trim($_POST['bgb_rendah_struktur'])!='')?$_POST['bgb_rendah_struktur']:((isset($detail_arr['bgb_rendah_struktur']) AND trim($detail_arr['bgb_rendah_struktur'])!='')?$detail_arr['bgb_rendah_struktur']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_penutup_atap" value="<?php echo (isset($_POST['bgb_rendah_penutup_atap']) AND trim($_POST['bgb_rendah_penutup_atap'])!='')?$_POST['bgb_rendah_penutup_atap']:((isset($detail_arr['bgb_rendah_penutup_atap']) AND trim($detail_arr['bgb_rendah_penutup_atap'])!='')?$detail_arr['bgb_rendah_penutup_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_rangka_atap" value="<?php echo (isset($_POST['bgb_rendah_rangka_atap']) AND trim($_POST['bgb_rendah_rangka_atap'])!='')?$_POST['bgb_rendah_rangka_atap']:((isset($detail_arr['bgb_rendah_rangka_atap']) AND trim($detail_arr['bgb_rendah_rangka_atap'])!='')?$detail_arr['bgb_rendah_rangka_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_dinding" value="<?php echo (isset($_POST['bgb_rendah_dinding']) AND trim($_POST['bgb_rendah_dinding'])!='')?$_POST['bgb_rendah_dinding']:((isset($detail_arr['bgb_rendah_dinding']) AND trim($detail_arr['bgb_rendah_dinding'])!='')?$detail_arr['bgb_rendah_dinding']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_pintu_jendela" value="<?php echo (isset($_POST['bgb_rendah_pintu_jendela']) AND trim($_POST['bgb_rendah_pintu_jendela'])!='')?$_POST['bgb_rendah_pintu_jendela']:((isset($detail_arr['bgb_rendah_pintu_jendela']) AND trim($detail_arr['bgb_rendah_pintu_jendela'])!='')?$detail_arr['bgb_rendah_pintu_jendela']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_lantai" value="<?php echo (isset($_POST['bgb_rendah_lantai']) AND trim($_POST['bgb_rendah_lantai'])!='')?$_POST['bgb_rendah_lantai']:((isset($detail_arr['bgb_rendah_lantai']) AND trim($detail_arr['bgb_rendah_lantai'])!='')?$detail_arr['bgb_rendah_lantai']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_utilitas" value="<?php echo (isset($_POST['bgb_rendah_utilitas']) AND trim($_POST['bgb_rendah_utilitas'])!='')?$_POST['bgb_rendah_utilitas']:((isset($detail_arr['bgb_rendah_utilitas']) AND trim($detail_arr['bgb_rendah_utilitas'])!='')?$detail_arr['bgb_rendah_utilitas']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_profesional_fee" value="<?php echo (isset($_POST['bgb_rendah_profesional_fee']) AND trim($_POST['bgb_rendah_profesional_fee'])!='')?$_POST['bgb_rendah_profesional_fee']:((isset($detail_arr['bgb_rendah_profesional_fee']) AND trim($detail_arr['bgb_rendah_profesional_fee'])!='')?$detail_arr['bgb_rendah_profesional_fee']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_biaya_perijinan" value="<?php echo (isset($_POST['bgb_rendah_biaya_perijinan']) AND trim($_POST['bgb_rendah_biaya_perijinan'])!='')?$_POST['bgb_rendah_biaya_perijinan']:((isset($detail_arr['bgb_rendah_biaya_perijinan']) AND trim($detail_arr['bgb_rendah_biaya_perijinan'])!='')?$detail_arr['bgb_rendah_biaya_perijinan']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Bangunan Gedung Bertingkat Rendah</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_rendah_keuntungan_kontraktor" value="<?php echo (isset($_POST['bgb_rendah_keuntungan_kontraktor']) AND trim($_POST['bgb_rendah_keuntungan_kontraktor'])!='')?$_POST['bgb_rendah_keuntungan_kontraktor']:((isset($detail_arr['bgb_rendah_keuntungan_kontraktor']) AND trim($detail_arr['bgb_rendah_keuntungan_kontraktor'])!='')?$detail_arr['bgb_rendah_keuntungan_kontraktor']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_pondasi" value="<?php echo (isset($_POST['bgb_sedang_pondasi']) AND trim($_POST['bgb_sedang_pondasi'])!='')?$_POST['bgb_sedang_pondasi']:((isset($detail_arr['bgb_sedang_pondasi']) AND trim($detail_arr['bgb_sedang_pondasi'])!='')?$detail_arr['bgb_sedang_pondasi']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_struktur" value="<?php echo (isset($_POST['bgb_sedang_struktur']) AND trim($_POST['bgb_sedang_struktur'])!='')?$_POST['bgb_sedang_struktur']:((isset($detail_arr['bgb_sedang_struktur']) AND trim($detail_arr['bgb_sedang_struktur'])!='')?$detail_arr['bgb_sedang_struktur']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_penutup_atap" value="<?php echo (isset($_POST['bgb_sedang_penutup_atap']) AND trim($_POST['bgb_sedang_penutup_atap'])!='')?$_POST['bgb_sedang_penutup_atap']:((isset($detail_arr['bgb_sedang_penutup_atap']) AND trim($detail_arr['bgb_sedang_penutup_atap'])!='')?$detail_arr['bgb_sedang_penutup_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_rangka_atap" value="<?php echo (isset($_POST['bgb_sedang_rangka_atap']) AND trim($_POST['bgb_sedang_rangka_atap'])!='')?$_POST['bgb_sedang_rangka_atap']:((isset($detail_arr['bgb_sedang_rangka_atap']) AND trim($detail_arr['bgb_sedang_rangka_atap'])!='')?$detail_arr['bgb_sedang_rangka_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_dinding" value="<?php echo (isset($_POST['bgb_sedang_dinding']) AND trim($_POST['bgb_sedang_dinding'])!='')?$_POST['bgb_sedang_dinding']:((isset($detail_arr['bgb_sedang_dinding']) AND trim($detail_arr['bgb_sedang_dinding'])!='')?$detail_arr['bgb_sedang_dinding']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_pintu_jendela" value="<?php echo (isset($_POST['bgb_sedang_pintu_jendela']) AND trim($_POST['bgb_sedang_pintu_jendela'])!='')?$_POST['bgb_sedang_pintu_jendela']:((isset($detail_arr['bgb_sedang_pintu_jendela']) AND trim($detail_arr['bgb_sedang_pintu_jendela'])!='')?$detail_arr['bgb_sedang_pintu_jendela']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_lantai" value="<?php echo (isset($_POST['bgb_sedang_lantai']) AND trim($_POST['bgb_sedang_lantai'])!='')?$_POST['bgb_sedang_lantai']:((isset($detail_arr['bgb_sedang_lantai']) AND trim($detail_arr['bgb_sedang_lantai'])!='')?$detail_arr['bgb_sedang_lantai']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_utilitas" value="<?php echo (isset($_POST['bgb_sedang_utilitas']) AND trim($_POST['bgb_sedang_utilitas'])!='')?$_POST['bgb_sedang_utilitas']:((isset($detail_arr['bgb_sedang_utilitas']) AND trim($detail_arr['bgb_sedang_utilitas'])!='')?$detail_arr['bgb_sedang_utilitas']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_profesional_fee" value="<?php echo (isset($_POST['bgb_sedang_profesional_fee']) AND trim($_POST['bgb_sedang_profesional_fee'])!='')?$_POST['bgb_sedang_profesional_fee']:((isset($detail_arr['bgb_sedang_profesional_fee']) AND trim($detail_arr['bgb_sedang_profesional_fee'])!='')?$detail_arr['bgb_sedang_profesional_fee']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_biaya_perijinan" value="<?php echo (isset($_POST['bgb_sedang_biaya_perijinan']) AND trim($_POST['bgb_sedang_biaya_perijinan'])!='')?$_POST['bgb_sedang_biaya_perijinan']:((isset($detail_arr['bgb_sedang_biaya_perijinan']) AND trim($detail_arr['bgb_sedang_biaya_perijinan'])!='')?$detail_arr['bgb_sedang_biaya_perijinan']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Bangunan Gedung Bertingkat Sedang</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_sedang_keuntungan_kontraktor" value="<?php echo (isset($_POST['bgb_sedang_keuntungan_kontraktor']) AND trim($_POST['bgb_sedang_keuntungan_kontraktor'])!='')?$_POST['bgb_sedang_keuntungan_kontraktor']:((isset($detail_arr['bgb_sedang_keuntungan_kontraktor']) AND trim($detail_arr['bgb_sedang_keuntungan_kontraktor'])!='')?$detail_arr['bgb_sedang_keuntungan_kontraktor']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pondasi Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_pondasi" value="<?php echo (isset($_POST['bgb_tinggi_pondasi']) AND trim($_POST['bgb_tinggi_pondasi'])!='')?$_POST['bgb_tinggi_pondasi']:((isset($detail_arr['bgb_tinggi_pondasi']) AND trim($detail_arr['bgb_tinggi_pondasi'])!='')?$detail_arr['bgb_tinggi_pondasi']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Struktur Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_struktur" value="<?php echo (isset($_POST['bgb_tinggi_struktur']) AND trim($_POST['bgb_tinggi_struktur'])!='')?$_POST['bgb_tinggi_struktur']:((isset($detail_arr['bgb_tinggi_struktur']) AND trim($detail_arr['bgb_tinggi_struktur'])!='')?$detail_arr['bgb_tinggi_struktur']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Penutup Atap Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_penutup_atap" value="<?php echo (isset($_POST['bgb_tinggi_penutup_atap']) AND trim($_POST['bgb_tinggi_penutup_atap'])!='')?$_POST['bgb_tinggi_penutup_atap']:((isset($detail_arr['bgb_tinggi_penutup_atap']) AND trim($detail_arr['bgb_tinggi_penutup_atap'])!='')?$detail_arr['bgb_tinggi_penutup_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Plafond Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_rangka_atap" value="<?php echo (isset($_POST['bgb_tinggi_rangka_atap']) AND trim($_POST['bgb_tinggi_rangka_atap'])!='')?$_POST['bgb_tinggi_rangka_atap']:((isset($detail_arr['bgb_tinggi_rangka_atap']) AND trim($detail_arr['bgb_tinggi_rangka_atap'])!='')?$detail_arr['bgb_tinggi_rangka_atap']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Dinding Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_dinding" value="<?php echo (isset($_POST['bgb_tinggi_dinding']) AND trim($_POST['bgb_tinggi_dinding'])!='')?$_POST['bgb_tinggi_dinding']:((isset($detail_arr['bgb_tinggi_dinding']) AND trim($detail_arr['bgb_tinggi_dinding'])!='')?$detail_arr['bgb_tinggi_dinding']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Pintu & Jendela Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_pintu_jendela" value="<?php echo (isset($_POST['bgb_tinggi_pintu_jendela']) AND trim($_POST['bgb_tinggi_pintu_jendela'])!='')?$_POST['bgb_tinggi_pintu_jendela']:((isset($detail_arr['bgb_tinggi_pintu_jendela']) AND trim($detail_arr['bgb_tinggi_pintu_jendela'])!='')?$detail_arr['bgb_tinggi_pintu_jendela']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Lantai Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_lantai" value="<?php echo (isset($_POST['bgb_tinggi_lantai']) AND trim($_POST['bgb_tinggi_lantai'])!='')?$_POST['bgb_tinggi_lantai']:((isset($detail_arr['bgb_tinggi_lantai']) AND trim($detail_arr['bgb_tinggi_lantai'])!='')?$detail_arr['bgb_tinggi_lantai']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Utilitas Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_utilitas" value="<?php echo (isset($_POST['bgb_tinggi_utilitas']) AND trim($_POST['bgb_tinggi_utilitas'])!='')?$_POST['bgb_tinggi_utilitas']:((isset($detail_arr['bgb_tinggi_utilitas']) AND trim($detail_arr['bgb_tinggi_utilitas'])!='')?$detail_arr['bgb_tinggi_utilitas']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Profesional Fee Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_profesional_fee" value="<?php echo (isset($_POST['bgb_tinggi_profesional_fee']) AND trim($_POST['bgb_tinggi_profesional_fee'])!='')?$_POST['bgb_tinggi_profesional_fee']:((isset($detail_arr['bgb_tinggi_profesional_fee']) AND trim($detail_arr['bgb_tinggi_profesional_fee'])!='')?$detail_arr['bgb_tinggi_profesional_fee']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Biaya Perijinan Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_biaya_perijinan" value="<?php echo (isset($_POST['bgb_tinggi_biaya_perijinan']) AND trim($_POST['bgb_tinggi_biaya_perijinan'])!='')?$_POST['bgb_tinggi_biaya_perijinan']:((isset($detail_arr['bgb_tinggi_biaya_perijinan']) AND trim($detail_arr['bgb_tinggi_biaya_perijinan'])!='')?$detail_arr['bgb_tinggi_biaya_perijinan']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label">Keuntungan Kontraktor Bangunan Gedung Bertingkat Tinggi</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="bgb_tinggi_keuntungan_kontraktor" value="<?php echo (isset($_POST['bgb_tinggi_keuntungan_kontraktor']) AND trim($_POST['bgb_tinggi_keuntungan_kontraktor'])!='')?$_POST['bgb_tinggi_keuntungan_kontraktor']:((isset($detail_arr['bgb_tinggi_keuntungan_kontraktor']) AND trim($detail_arr['bgb_tinggi_keuntungan_kontraktor'])!='')?$detail_arr['bgb_tinggi_keuntungan_kontraktor']:''); ?>">
						</div>
					</div>
					<div class="form-vertical">
						<label class="col-md-10 control-label" style="height: 50px;"></label>
					</div>
					<div class="form-vertical">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-4"><center>
							<input class="btn btn-success btn-md" type="submit" name="save" value="simpan">
							<button class="btn btn-default btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=btb'; ?>', '_self'); return false;">Batal</button></center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo $websiteConfig->base_url().'assets/css/bootstrap-datepicker.min.css'; ?>">
<script src="<?php echo $websiteConfig->base_url().'assets/js/bootstrap-datepicker.min.js'; ?>"></script>
<script type="text/javascript">
	$('.datepicker').datepicker({
        showButtonPanel: true,
        changeMonth: true,
        dateFormat: 'dd/mm/yyyy'
	});
</script>