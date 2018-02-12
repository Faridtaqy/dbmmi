<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/banding_lib.php');
	$banding_lib = new banding_lib;

	// eksekusi form
	if (isset($_POST['save']) AND trim(strtolower($_POST['save']))=="simpan") {
		$response = $banding_lib->form_validation($_GET['id']);
		if ($response['status']==200) {
			$response = $banding_lib->stored_data($_GET['id']);
			if ($response['status']==200) {
				header('Location: '.$websiteConfig->base_url().'?route=banding&id='.$_GET['id'].'&status='.$response['status'].'&message='.base64_encode($response['message']));
			}
		}
	}

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

	// dapatkan data
	if(isset($_GET['id']) AND is_numeric($_GET['id'])){
		$detail_arr = $banding_lib->get_detail_banding($_GET['id']);
		if (empty($detail_arr)) {
			header('Location: '.$websiteConfig->base_url().'?route=banding');
		}
	} else{
		header('Location: '.$websiteConfig->base_url().'?route=banding');
	}
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Ubah Pegawai</h3>
	</div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
	<div class="col-md-12">
		<div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Property</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_jenis_properti" value="<?php echo (isset($_POST['banding_jenis_properti']) AND trim($_POST['banding_jenis_properti'])!='')?$_POST['banding_jenis_properti']:((isset($detail_arr['banding_jenis_properti']) AND trim($detail_arr['banding_jenis_properti'])!='')?$detail_arr['banding_jenis_properti']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lokasi Aset</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_lokasi" value="<?php echo (isset($_POST['banding_lokasi']) AND trim($_POST['banding_lokasi'])!='')?$_POST['banding_lokasi']:((isset($detail_arr['banding_lokasi']) AND trim($detail_arr['banding_lokasi'])!='')?$detail_arr['banding_lokasi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jalan / Blok</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_jalan_blok" value="<?php echo (isset($_POST['banding_jalan_blok']) AND trim($_POST['banding_jalan_blok'])!='')?$_POST['banding_jalan_blok']:((isset($detail_arr['banding_jalan_blok']) AND trim($detail_arr['banding_jalan_blok'])!='')?$detail_arr['banding_jalan_blok']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nomor Rumah</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_no_rumah" value="<?php echo (isset($_POST['banding_no_rumah']) AND trim($_POST['banding_no_rumah'])!='')?$_POST['banding_no_rumah']:((isset($detail_arr['banding_no_rumah']) AND trim($detail_arr['banding_no_rumah'])!='')?$detail_arr['banding_no_rumah']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kelurahan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_kelurahan" value="<?php echo (isset($_POST['banding_kelurahan']) AND trim($_POST['banding_kelurahan'])!='')?$_POST['banding_kelurahan']:((isset($detail_arr['banding_kelurahan']) AND trim($detail_arr['banding_kelurahan'])!='')?$detail_arr['banding_kelurahan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kecamatan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_kecamatan" value="<?php echo (isset($_POST['banding_kecamatan']) AND trim($_POST['banding_kecamatan'])!='')?$_POST['banding_kecamatan']:((isset($detail_arr['banding_kecamatan']) AND trim($detail_arr['banding_kecamatan'])!='')?$detail_arr['banding_kecamatan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kota</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_kota" value="<?php echo (isset($_POST['banding_kota']) AND trim($_POST['banding_kota'])!='')?$_POST['banding_kota']:((isset($detail_arr['banding_kota']) AND trim($detail_arr['banding_kota'])!='')?$detail_arr['banding_kota']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Provinsi</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_provinsi" value="<?php echo (isset($_POST['banding_provinsi']) AND trim($_POST['banding_provinsi'])!='')?$_POST['banding_provinsi']:((isset($detail_arr['banding_provinsi']) AND trim($detail_arr['banding_provinsi'])!='')?$detail_arr['banding_provinsi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jarak Dengan Aset</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_jarak_dng_aset" value="<?php echo (isset($_POST['banding_jarak_dng_aset']) AND trim($_POST['banding_jarak_dng_aset'])!='')?$_POST['banding_jarak_dng_aset']:((isset($detail_arr['banding_jarak_dng_aset']) AND trim($detail_arr['banding_provinsi'])!='')?$detail_arr['banding_jarak_dng_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Arah Dengan Aset</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_arah_dng_aset" value="<?php echo (isset($_POST['banding_arah_dng_aset']) AND trim($_POST['banding_arah_dng_aset'])!='')?$_POST['banding_arah_dng_aset']:((isset($detail_arr['banding_arah_dng_aset']) AND trim($detail_arr['banding_arah_dng_aset'])!='')?$detail_arr['banding_arah_dng_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Pemberi Informasi</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_nama_informan" value="<?php echo (isset($_POST['banding_nama_informan']) AND trim($_POST['banding_nama_informan'])!='')?$_POST['banding_nama_informan']:((isset($detail_arr['banding_nama_informan']) AND trim($detail_arr['banding_nama_informan'])!='')?$detail_arr['banding_nama_informan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Telepon</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_telephone" value="<?php echo (isset($_POST['banding_telephone']) AND trim($_POST['banding_telephone'])!='')?$_POST['banding_telephone']:((isset($detail_arr['banding_telephone']) AND trim($detail_arr['banding_telephone'])!='')?$detail_arr['banding_telephone']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_keterangan_info">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_keterangan_info())) {
									foreach ($banding_lib->base_banding_keterangan_info() as $key => $value) {
										$selected = (isset($_POST['banding_keterangan_info']) AND trim($_POST['banding_keterangan_info'])==$key)?'selected':((isset($detail_arr['banding_keterangan_info']) AND trim($detail_arr['banding_keterangan_info'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Harga</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding_harga" value="<?php echo (isset($_POST['banding_harga']) AND trim($_POST['banding_harga'])!='')?$_POST['banding_harga']:((isset($detail_arr['banding_harga']) AND trim($detail_arr['banding_harga'])!='')?$detail_arr['banding_harga']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Discount</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_discount" value="<?php echo (isset($_POST['banding_discount']) AND trim($_POST['banding_discount'])!='')?$_POST['banding_discount']:((isset($detail_arr['banding_discount']) AND trim($detail_arr['banding_discount'])!='')?$detail_arr['banding_discount']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Pemeriksaan</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="banding_tanggal" value="<?php echo (isset($_POST['banding_tanggal']) AND trim($_POST['banding_tanggal'])!='')?$_POST['banding_tanggal']:((isset($detail_arr['banding_tanggal']) AND trim($detail_arr['banding_tanggal'])!='')?$detail_arr['banding_tanggal']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Tanah</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_luas_tanah" value="<?php echo (isset($_POST['banding_luas_tanah']) AND trim($_POST['banding_luas_tanah'])!='')?$_POST['banding_luas_tanah']:((isset($detail_arr['banding_luas_tanah']) AND trim($detail_arr['banding_luas_tanah'])!='')?$detail_arr['banding_luas_tanah']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Dokumen Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_dokumen_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_dokumen_tanah())) {
									foreach ($banding_lib->base_banding_dokumen_tanah() as $key => $value) {
										$selected = (isset($_POST['banding_dokumen_tanah']) AND trim($_POST['banding_dokumen_tanah'])==$key)?'selected':((isset($detail_arr['banding_dokumen_tanah']) AND trim($detail_arr['banding_dokumen_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Sertifikat</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_no_sertifikat" value="<?php echo (isset($_POST['banding_no_sertifikat']) AND trim($_POST['banding_no_sertifikat'])!='')?$_POST['banding_no_sertifikat']:((isset($detail_arr['banding_no_sertifikat']) AND trim($detail_arr['banding_no_sertifikat'])!='')?$detail_arr['banding_no_sertifikat']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Terbit Sertifikat</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="banding_tanggal_terbit" value="<?php echo (isset($_POST['banding_tanggal_terbit']) AND trim($_POST['banding_tanggal_terbit'])!='')?$_POST['banding_tanggal_terbit']:((isset($detail_arr['banding_tanggal_terbit']) AND trim($detail_arr['banding_tanggal_terbit'])!='')?$detail_arr['banding_tanggal_terbit']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. GS / SU</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_no_gs_su" value="<?php echo (isset($_POST['banding_no_gs_su']) AND trim($_POST['banding_no_gs_su'])!='')?$_POST['banding_no_gs_su']:((isset($detail_arr['banding_no_gs_su']) AND trim($detail_arr['banding_no_gs_su'])!='')?$detail_arr['banding_no_gs_su']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal GS / SU</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="banding_tgl_gs_su" value="<?php echo (isset($_POST['banding_tgl_gs_su']) AND trim($_POST['banding_tgl_gs_su'])!='')?$_POST['banding_tgl_gs_su']:((isset($detail_arr['banding_tgl_gs_su']) AND trim($detail_arr['banding_tgl_gs_su'])!='')?$detail_arr['banding_tgl_gs_su']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Berlaku Sampai Dengan</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="banding_tgl_berlaku" value="<?php echo (isset($_POST['banding_tgl_berlaku']) AND trim($_POST['banding_tgl_berlaku'])!='')?$_POST['banding_tgl_berlaku']:((isset($detail_arr['banding_tgl_berlaku']) AND trim($detail_arr['banding_tgl_berlaku'])!='')?$detail_arr['banding_tgl_berlaku']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Atas Nama Sertifikat</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_an_sertifikat" value="<?php echo (isset($_POST['banding_an_sertifikat']) AND trim($_POST['banding_an_sertifikat'])!='')?$_POST['banding_an_sertifikat']:((isset($detail_arr['banding_an_sertifikat']) AND trim($detail_arr['banding_an_sertifikat'])!='')?$detail_arr['banding_an_sertifikat']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Hubungan Dengan Nasabah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_hub_dng_nasabah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_hub_dng_nasabah())) {
									foreach ($banding_lib->base_banding_hub_dng_nasabah() as $key => $value) {
										$selected = (isset($_POST['banding_hub_dng_nasabah']) AND trim($_POST['banding_hub_dng_nasabah'])==$key)?'selected':((isset($detail_arr['banding_hub_dng_nasabah']) AND trim($detail_arr['banding_hub_dng_nasabah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Frontage</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_frontage" value="<?php echo (isset($_POST['banding_frontage']) AND trim($_POST['banding_frontage'])!='')?$_POST['banding_frontage']:((isset($detail_arr['banding_frontage']) AND trim($detail_arr['banding_frontage'])!='')?$detail_arr['banding_frontage']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Jalan Depan Aset</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_leb_jln_dpn_aset" value="<?php echo (isset($_POST['banding_leb_jln_dpn_aset']) AND trim($_POST['banding_leb_jln_dpn_aset'])!='')?$_POST['banding_leb_jln_dpn_aset']:((isset($detail_arr['banding_leb_jln_dpn_aset']) AND trim($detail_arr['banding_leb_jln_dpn_aset'])!='')?$detail_arr['banding_leb_jln_dpn_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Jalan Masuk Aset</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_leb_jln_masuk" value="<?php echo (isset($_POST['banding_leb_jln_masuk']) AND trim($_POST['banding_leb_jln_masuk'])!='')?$_POST['banding_leb_jln_masuk']:((isset($detail_arr['banding_leb_jln_masuk']) AND trim($detail_arr['banding_leb_jln_masuk'])!='')?$detail_arr['banding_leb_jln_masuk']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Bentuk Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_bntk_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_bntk_tanah())) {
									foreach ($banding_lib->base_banding_bntk_tanah() as $key => $value) {
										$selected = (isset($_POST['banding_bntk_tanah']) AND trim($_POST['banding_bntk_tanah'])==$key)?'selected':((isset($detail_arr['banding_bntk_tanah']) AND trim($detail_arr['banding_bntk_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Posisi Lokasi</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_posisi_lokasi">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_posisi_lokasi())) {
									foreach ($banding_lib->base_banding_posisi_lokasi() as $key => $value) {
										$selected = (isset($_POST['banding_posisi_lokasi']) AND trim($_POST['banding_posisi_lokasi'])==$key)?'selected':((isset($detail_arr['banding_posisi_lokasi']) AND trim($detail_arr['banding_posisi_lokasi'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kepadatan Bangunan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_kpdtan_bangunan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_kpdtan_bangunan())) {
									foreach ($banding_lib->base_banding_kpdtan_bangunan() as $key => $value) {
										$selected = (isset($_POST['banding_kpdtan_bangunan']) AND trim($_POST['banding_kpdtan_bangunan'])==$key)?'selected':((isset($detail_arr['banding_kpdtan_bangunan']) AND trim($detail_arr['banding_kpdtan_bangunan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Elevasi Halaman Terhadap Jalan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_ehtj" value="<?php echo (isset($_POST['banding_ehtj']) AND trim($_POST['banding_ehtj'])!='')?$_POST['banding_ehtj']:((isset($detail_arr['banding_ehtj']) AND trim($detail_arr['banding_ehtj'])!='')?$detail_arr['banding_ehtj']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Elevasi Halaman Terhadap Lantai</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_ehtl" value="<?php echo (isset($_POST['banding_ehtl']) AND trim($_POST['banding_ehtl'])!='')?$_POST['banding_ehtl']:((isset($detail_arr['banding_ehtl']) AND trim($detail_arr['banding_ehtl'])!='')?$detail_arr['banding_ehtl']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Keadaan Halaman</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_keadaan_hal">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_keadaan_hal())) {
									foreach ($banding_lib->base_banding_keadaan_hal() as $key => $value) {
										$selected = (isset($_POST['banding_keadaan_hal']) AND trim($_POST['banding_keadaan_hal'])==$key)?'selected':((isset($detail_arr['banding_keadaan_hal']) AND trim($detail_arr['banding_keadaan_hal'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Topografi</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_topografi">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_topografi())) {
									foreach ($banding_lib->base_banding_topografi() as $key => $value) {
										$selected = (isset($_POST['banding_topografi']) AND trim($_POST['banding_topografi'])==$key)?'selected':((isset($detail_arr['banding_topografi']) AND trim($detail_arr['banding_topografi'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Bangunan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_luas_bangunan" value="<?php echo (isset($_POST['banding_luas_bangunan']) AND trim($_POST['banding_luas_bangunan'])!='')?$_POST['banding_luas_bangunan']:((isset($detail_arr['banding_luas_bangunan']) AND trim($detail_arr['banding_luas_bangunan'])!='')?$detail_arr['banding_luas_bangunan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_jenis_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_jenis_tanah())) {
									foreach ($banding_lib->base_banding_jenis_tanah() as $key => $value) {
										$selected = (isset($_POST['banding_jenis_tanah']) AND trim($_POST['banding_jenis_tanah'])==$key)?'selected':((isset($detail_arr['banding_jenis_tanah']) AND trim($detail_arr['banding_jenis_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Peruntukan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_peruntukan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_peruntukan())) {
									foreach ($banding_lib->base_banding_peruntukan() as $key => $value) {
										$selected = (isset($_POST['banding_peruntukan']) AND trim($_POST['banding_peruntukan'])==$key)?'selected':((isset($detail_arr['banding_peruntukan']) AND trim($detail_arr['banding_peruntukan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kondisi Lahan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_kondisi_lahan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_kondisi_lahan())) {
									foreach ($banding_lib->base_banding_kondisi_lahan() as $key => $value) {
										$selected = (isset($_POST['banding_kondisi_lahan']) AND trim($_POST['banding_kondisi_lahan'])==$key)?'selected':((isset($detail_arr['banding_kondisi_lahan']) AND trim($detail_arr['banding_kondisi_lahan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kondisi Bangunan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding_kondisi_bangunan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($banding_lib->base_banding_kondisi_bangunan())) {
									foreach ($banding_lib->base_banding_kondisi_bangunan() as $key => $value) {
										$selected = (isset($_POST['banding_kondisi_bangunan']) AND trim($_POST['banding_kondisi_bangunan'])==$key)?'selected':((isset($detail_arr['banding_kondisi_bangunan']) AND trim($detail_arr['banding_kondisi_bangunan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tahun Dibangun</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding_tahun_bangun" value="<?php echo (isset($_POST['banding_tahun_bangun']) AND trim($_POST['banding_tahun_bangun'])!='')?$_POST['banding_tahun_bangun']:((isset($detail_arr['banding_tahun_bangun']) AND trim($detail_arr['banding_tahun_bangun'])!='')?$detail_arr['banding_tahun_bangun']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<input class="btn btn-success btn-md" type="submit" name="save" value="simpan">
							<button class="btn btn-defaul btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=banding'; ?>', '_self'); return false;">Batal</button>
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