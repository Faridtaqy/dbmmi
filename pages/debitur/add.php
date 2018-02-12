<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/debitur_lib.php');
	$debitur_lib = new debitur_lib;

	// eksekusi form debitur
	if (isset($_POST['save']) AND trim(strtolower($_POST['save']))=="simpan") {
		$response = $debitur_lib->form_validation();
		if ($response['status']==200) {
			$response = $debitur_lib->stored_data();
							
				header('Location: '.$websiteConfig->base_url().'?route=debitur&id='.$_GET['id'].'&status='.
				$response['status'].'&message='.base64_encode($response['message']));
			}
		}

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Form Debitur</h3>
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
						<label class="col-sm-3 control-label">Jenis Kredit</label>
						<div class="col-sm-8">
							<select class="form-control" name="jenis_kredit">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_jenis_kredit())) {
									foreach ($debitur_lib->base_jenis_kredit() as $key => $value) {
										$selected = (isset($_POST['jenis_kredit']) AND trim($_POST['jenis_kredit'])==$key)?'selected':((isset($detail_arr['jenis_kredit']) AND trim($detail_arr['jenis_kredit'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Pejabat BTN</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="client_pejabat_BTN" value="<?php echo (isset($_POST['client_pejabat_BTN']) AND trim($_POST['client_pejabat_BTN'])!='')?$_POST['client_pejabat_BTN']:((isset($detail_arr['client_pejabat_BTN']) AND trim($detail_arr['client_pejabat_BTN'])!='')?$detail_arr['client_pejabat_BTN']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jabatan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="client_jabatan_BTN" value="<?php echo (isset($_POST['client_jabatan_BTN']) AND trim($_POST['client_jabatan_BTN'])!='')?$_POST['client_jabatan_BTN']:((isset($detail_arr['client_jabatan_BTN']) AND trim($detail_arr['client_jabatan_BTN'])!='')?$detail_arr['client_jabatan_BTN']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Surveyor</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="client_person_name" value="<?php echo (isset($_POST['client_person_name']) AND trim($_POST['client_person_name'])!='')?$_POST['client_person_name']:((isset($detail_arr['client_person_name']) AND trim($detail_arr['client_person_name'])!='')?$detail_arr['client_person_name']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Atasan Penilai</label>
						<div class="col-sm-8">
							<select class="form-control" name="client_atasan_peniali">
								<option value="">Pilih</option>
								<?php 
								if (!empty($client_lib->base_client_atasan_penilai())) {
									foreach ($debitur_lib->base_client_atasan_penilai() as $key => $value) {
										$selected = (isset($_POST['client_atasan_peniali']) AND trim($_POST['client_atasan_peniali'])==$key)?'selected':((isset($detail_arr['client_atasan_peniali']) AND trim($detail_arr['client_atasan_peniali'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">PKS Cabang</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="client_name" value="<?php echo (isset($_POST['client_name']) AND trim($_POST['client_name'])!='')?$_POST['client_name']:((isset($detail_arr['client_name']) AND trim($detail_arr['client_name'])!='')?$detail_arr['client_name']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Laporan Ditujukan ke</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="client_report" value="<?php echo (isset($_POST['client_report']) AND trim($_POST['client_report'])!='')?$_POST['client_name']:((isset($detail_arr['client_report']) AND trim($detail_arr['client_report'])!='')?$detail_arr['client_report']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Penugasan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="no_penugasan" value="<?php echo (isset($_POST['no_penugasan']) AND trim($_POST['no_penugasan'])!='')?$_POST['no_penugasan']:((isset($detail_arr['no_penugasan']) AND trim($detail_arr['no_penugasan'])!='')?$detail_arr['no_penugasan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Penugasan</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="tgl_penugasan" value="<?php echo (isset($_POST['tgl_penugasan']) AND trim($_POST['tgl_penugasan'])!='')?$_POST['tgl_penugasan']:((isset($detail_arr['tgl_penugasan']) AND trim($detail_arr['tgl_penugasan'])!='')?$detail_arr['tgl_penugasan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Laporan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="client_report_number" value="<?php echo (isset($_POST['client_report_number']) AND trim($_POST['client_report_number'])!='')?$_POST['client_report_number']:((isset($detail_arr['client_report_number']) AND trim($detail_arr['client_report_number'])!='')?$detail_arr['client_report_number']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Survey / Pemeriksaan</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="tgl_pemeriksaan" value="<?php echo (isset($_POST['tgl_pemeriksaan']) AND trim($_POST['tgl_pemeriksaan'])!='')?$_POST['tgl_pemeriksaan']:((isset($detail_arr['tgl_pemeriksaan']) AND trim($detail_arr['tgl_pemeriksaan'])!='')?$detail_arr['tgl_pemeriksaan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Penilaian</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="client_appraisal_date" value="<?php echo (isset($_POST['client_appraisal_date']) AND trim($_POST['client_appraisal_date'])!='')?$_POST['client_appraisal_date']:((isset($detail_arr['client_appraisal_date']) AND trim($detail_arr['client_appraisal_date'])!='')?$detail_arr['client_appraisal_date']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Laporan</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="client_statement_date" value="<?php echo (isset($_POST['client_statement_date']) AND trim($_POST['client_statement_date'])!='')?$_POST['client_statement_date']:((isset($detail_arr['client_statement_date']) AND trim($detail_arr['client_statement_date'])!='')?$detail_arr['client_statement_date']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Debitur</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="nama_debitur" value="<?php echo (isset($_POST['nama_debitur']) AND trim($_POST['nama_debitur'])!='')?$_POST['nama_debitur']:((isset($detail_arr['nama_debitur']) AND trim($detail_arr['nama_debitur'])!='')?$detail_arr['nama_debitur']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lokasi Aset</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="lokasi_aset" value="<?php echo (isset($_POST['lokasi_aset']) AND trim($_POST['lokasi_aset'])!='')?$_POST['lokasi_aset']:((isset($detail_arr['lokasi_aset']) AND trim($detail_arr['lokasi_aset'])!='')?$detail_arr['lokasi_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Alamat Aset</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="alamat_aset" value="<?php echo (isset($_POST['alamat_aset']) AND trim($_POST['alamat_aset'])!='')?$_POST['alamat_aset']:((isset($detail_arr['alamat_aset']) AND trim($detail_arr['alamat_aset'])!='')?$detail_arr['alamat_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Blok / No</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="blok_no" value="<?php echo (isset($_POST['blok_no']) AND trim($_POST['blok_no'])!='')?$_POST['blok_no']:((isset($detail_arr['blok_no']) AND trim($detail_arr['blok_no'])!='')?$detail_arr['blok_no']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kelurahan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="kelurahan" value="<?php echo (isset($_POST['kelurahan']) AND trim($_POST['kelurahan'])!='')?$_POST['kelurahan']:((isset($detail_arr['kelurahan']) AND trim($detail_arr['kelurahan'])!='')?$detail_arr['kelurahan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kecamatan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="kecamatan" value="<?php echo (isset($_POST['kecamatan']) AND trim($_POST['kecamatan'])!='')?$_POST['kecamatan']:((isset($detail_arr['kecamatan']) AND trim($detail_arr['kecamatan'])!='')?$detail_arr['kecamatan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kota</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="kota" value="<?php echo (isset($_POST['kota']) AND trim($_POST['kota'])!='')?$_POST['kota']:((isset($detail_arr['kota']) AND trim($detail_arr['kota'])!='')?$detail_arr['kota']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Provinsi</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="provinsi" value="<?php echo (isset($_POST['provinsi']) AND trim($_POST['provinsi'])!='')?$_POST['provinsi']:((isset($detail_arr['provinsi']) AND trim($detail_arr['provinsi'])!='')?$detail_arr['provinsi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kode Pos</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="kode_pos" value="<?php echo (isset($_POST['kode_pos']) AND trim($_POST['kode_pos'])!='')?$_POST['kode_pos']:((isset($detail_arr['kode_pos']) AND trim($detail_arr['kode_pos'])!='')?$detail_arr['kode_pos']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Properti</label>
						<div class="col-sm-8">
							<select class="form-control" name="jenis_properti">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_jenis_properti())) {
									foreach ($debitur_lib->base_jenis_properti() as $key => $value) {
										$selected = (isset($_POST['jenis_properti']) AND trim($_POST['jenis_properti'])==$key)?'selected':((isset($detail_arr['jenis_properti']) AND trim($detail_arr['jenis_properti'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Tanah</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="luas_tanah" value="<?php echo (isset($_POST['luas_tanah']) AND trim($_POST['luas_tanah'])!='')?$_POST['luas_tanah']:((isset($detail_arr['luas_tanah']) AND trim($detail_arr['luas_tanah'])!='')?$detail_arr['luas_tanah']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Dokumen Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="dokumen_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_dokumen_tanah())) {
									foreach ($debitur_lib->base_dokumen_tanah() as $key => $value) {
										$selected = (isset($_POST['dokumen_tanah']) AND trim($_POST['dokumen_tanah'])==$key)?'selected':((isset($detail_arr['dokumen_tanah']) AND trim($detail_arr['dokumen_tanah'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="no_sertifikat" value="<?php echo (isset($_POST['no_sertifikat']) AND trim($_POST['no_sertifikat'])!='')?$_POST['no_sertifikat']:((isset($detail_arr['no_sertifikat']) AND trim($detail_arr['no_sertifikat'])!='')?$detail_arr['no_sertifikat']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Terbit</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="tgl_terbit" value="<?php echo (isset($_POST['tgl_terbit']) AND trim($_POST['tgl_terbit'])!='')?$_POST['tgl_terbit']:((isset($detail_arr['tgl_terbit']) AND trim($detail_arr['tgl_terbit'])!='')?$detail_arr['tgl_terbit']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. GS / SU</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="no_gs_su" value="<?php echo (isset($_POST['no_gs_su']) AND trim($_POST['no_gs_su'])!='')?$_POST['no_gs_su']:((isset($detail_arr['no_gs_su']) AND trim($detail_arr['no_gs_su'])!='')?$detail_arr['no_gs_su']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal GS/SU</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="tgl_gs_su" value="<?php echo (isset($_POST['tgl_gs_su']) AND trim($_POST['tgl_gs_su'])!='')?$_POST['tgl_gs_su']:((isset($detail_arr['tgl_gs_su']) AND trim($detail_arr['tgl_gs_su'])!='')?$detail_arr['tgl_gs_su']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Berlaku</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="tgl_berlaku" value="<?php echo (isset($_POST['tgl_berlaku']) AND trim($_POST['tgl_berlaku'])!='')?$_POST['tgl_berlaku']:((isset($detail_arr['tgl_berlaku']) AND trim($detail_arr['tgl_berlaku'])!='')?$detail_arr['tgl_berlaku']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Atas Nama Dokumen</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="an_dokumen" value="<?php echo (isset($_POST['an_dokumen']) AND trim($_POST['an_dokumen'])!='')?$_POST['an_dokumen']:((isset($detail_arr['an_dokumen']) AND trim($detail_arr['an_dokumen'])!='')?$detail_arr['an_dokumen']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Hub. Dengan Debitur</label>
						<div class="col-sm-8">
							<select class="form-control" name="hub_dng_debitur">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_hub_dng_debitur())) {
									foreach ($debitur_lib->base_hub_dng_debitur() as $key => $value) {
										$selected = (isset($_POST['hub_dng_debitur']) AND trim($_POST['hub_dng_debitur'])==$key)?'selected':((isset($detail_arr['hub_dng_debitur']) AND trim($detail_arr['hub_dng_debitur'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="frontage" value="<?php echo (isset($_POST['frontage']) AND trim($_POST['frontage'])!='')?$_POST['frontage']:((isset($detail_arr['frontage']) AND trim($detail_arr['frontage'])!='')?$detail_arr['frontage']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Jalan Depan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="leb_jln_depan" value="<?php echo (isset($_POST['leb_jln_depan']) AND trim($_POST['leb_jln_depan'])!='')?$_POST['leb_jln_depan']:((isset($detail_arr['leb_jln_depan']) AND trim($detail_arr['leb_jln_depan'])!='')?$detail_arr['leb_jln_depan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Jalan Masuk</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="leb_jln_masuk" value="<?php echo (isset($_POST['leb_jln_masuk']) AND trim($_POST['leb_jln_masuk'])!='')?$_POST['leb_jln_masuk']:((isset($detail_arr['leb_jln_masuk']) AND trim($detail_arr['leb_jln_masuk'])!='')?$detail_arr['leb_jln_masuk']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Bentuk Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="bentuk_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_bentuk_tanah())) {
									foreach ($debitur_lib->base_bentuk_tanah() as $key => $value) {
										$selected = (isset($_POST['bentuk_tanah']) AND trim($_POST['bentuk_tanah'])==$key)?'selected':((isset($detail_arr['bentuk_tanah']) AND trim($detail_arr['bentuk_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Pos Lokasi</label>
						<div class="col-sm-8">
							<select class="form-control" name="pos_lokasi">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_pos_lokasi())) {
									foreach ($debitur_lib->base_pos_lokasi() as $key => $value) {
										$selected = (isset($_POST['pos_lokasi']) AND trim($_POST['pos_lokasi'])==$key)?'selected':((isset($detail_arr['pos_lokasi']) AND trim($detail_arr['pos_lokasi'])==$key)?'selected':'');
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
							<select class="form-control" name="kepadatan_bangunan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_kepadatan_bangunan())) {
									foreach ($debitur_lib->base_kepadatan_bangunan() as $key => $value) {
										$selected = (isset($_POST['kepadatan_bangunan']) AND trim($_POST['kepadatan_bangunan'])==$key)?'selected':((isset($detail_arr['kepadatan_bangunan']) AND trim($detail_arr['kepadatan_bangunan'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="ehtj" value="<?php echo (isset($_POST['ehtj']) AND trim($_POST['ehtj'])!='')?$_POST['ehtj']:((isset($detail_arr['ehtj']) AND trim($detail_arr['ehtj'])!='')?$detail_arr['ehtj']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Elevasi Halaman Terhadap Lantai</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="ehtl" value="<?php echo (isset($_POST['ehtl']) AND trim($_POST['ehtl'])!='')?$_POST['ehtl']:((isset($detail_arr['ehtl']) AND trim($detail_arr['ehtl'])!='')?$detail_arr['ehtl']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Keadaan Halaman</label>
						<div class="col-sm-8">
							<select class="form-control" name="keadaan_halaman">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_keadaan_halaman())) {
									foreach ($debitur_lib->base_keadaan_halaman() as $key => $value) {
										$selected = (isset($_POST['keadaan_halaman']) AND trim($_POST['keadaan_halaman'])==$key)?'selected':((isset($detail_arr['keadaan_halaman']) AND trim($detail_arr['keadaan_halaman'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kontur Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="kontur_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_kontur_tanah())) {
									foreach ($debitur_lib->base_kontur_tanah() as $key => $value) {
										$selected = (isset($_POST['kontur_tanah']) AND trim($_POST['kontur_tanah'])==$key)?'selected':((isset($detail_arr['kontur_tanah']) AND trim($detail_arr['kontur_tanah'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="luas_bangunan" value="<?php echo (isset($_POST['luas_bangunan']) AND trim($_POST['luas_bangunan'])!='')?$_POST['luas_bangunan']:((isset($detail_arr['luas_bangunan']) AND trim($detail_arr['luas_bangunan'])!='')?$detail_arr['luas_bangunan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="jenis_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_jenis_tanah())) {
									foreach ($debitur_lib->base_jenis_tanah() as $key => $value) {
										$selected = (isset($_POST['jenis_tanah']) AND trim($_POST['jenis_tanah'])==$key)?'selected':((isset($detail_arr['jenis_tanah']) AND trim($detail_arr['jenis_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">peruntukan</label>
						<div class="col-sm-8">
							<select class="form-control" name="peruntukan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_peruntukan())) {
									foreach ($debitur_lib->base_peruntukan() as $key => $value) {
										$selected = (isset($_POST['peruntukan']) AND trim($_POST['peruntukan'])==$key)?'selected':((isset($detail_arr['peruntukan']) AND trim($detail_arr['peruntukan'])==$key)?'selected':'');
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
							<select class="form-control" name="kondisi_lahan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_kondisi_lahan())) {
									foreach ($debitur_lib->base_kondisi_lahan() as $key => $value) {
										$selected = (isset($_POST['kondisi_lahan']) AND trim($_POST['kondisi_lahan'])==$key)?'selected':((isset($detail_arr['kondisi_lahan']) AND trim($detail_arr['kondisi_lahan'])==$key)?'selected':'');
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
							<select class="form-control" name="kondisi_bangunan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_kondisi_bangunan())) {
									foreach ($debitur_lib->base_kondisi_bangunan() as $key => $value) {
										$selected = (isset($_POST['kondisi_bangunan']) AND trim($_POST['kondisi_bangunan'])==$key)?'selected':((isset($detail_arr['kondisi_bangunan']) AND trim($detail_arr['kondisi_bangunan'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="thn_bangun" value="<?php echo (isset($_POST['thn_bangun']) AND trim($_POST['thn_bangun'])!='')?$_POST['thn_bangun']:((isset($detail_arr['thn_bangun']) AND trim($detail_arr['thn_bangun'])!='')?$detail_arr['thn_bangun']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Ijin Mendirikan Bangunan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="imb" value="<?php echo (isset($_POST['imb']) AND trim($_POST['imb'])!='')?$_POST['imb']:((isset($detail_arr['imb']) AND trim($detail_arr['imb'])!='')?$detail_arr['imb']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Bangunan Sesuai IMB (m2)</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="luas_bangunan_imb" value="<?php echo (isset($_POST['luas_bangunan_imb']) AND trim($_POST['luas_bangunan_imb'])!='')?$_POST['luas_bangunan_imb']:((isset($detail_arr['luas_bangunan_imb']) AND trim($detail_arr['luas_bangunan_imb'])!='')?$detail_arr['luas_bangunan_imb']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Terbit IMB</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="tgl_terbit_imb" value="<?php echo (isset($_POST['tgl_terbit_imb']) AND trim($_POST['tgl_terbit_imb'])!='')?$_POST['tgl_terbit_imb']:((isset($detail_arr['tgl_terbit_imb']) AND trim($detail_arr['tgl_terbit_imb'])!='')?$detail_arr['tgl_terbit_imb']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tahun Renovasi</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="thn_renov" value="<?php echo (isset($_POST['thn_renov']) AND trim($_POST['thn_renov'])!='')?$_POST['thn_renov']:((isset($detail_arr['thn_renov']) AND trim($detail_arr['thn_renov'])!='')?$detail_arr['thn_renov']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Penggunaan</label>
						<div class="col-sm-8">
							<select class="form-control" name="penggunaan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_penggunaan())) {
									foreach ($debitur_lib->base_penggunaan() as $key => $value) {
										$selected = (isset($_POST['penggunaan']) AND trim($_POST['penggunaan'])==$key)?'selected':((isset($detail_arr['penggunaan']) AND trim($detail_arr['penggunaan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Bentuk Arsitektur</label>
						<div class="col-sm-8">
							<select class="form-control" name="bntk_arsitek">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_bntk_arsitek())) {
									foreach ($debitur_lib->base_bntk_arsitek() as $key => $value) {
										$selected = (isset($_POST['bntk_arsitek']) AND trim($_POST['bntk_arsitek'])==$key)?'selected':((isset($detail_arr['bntk_arsitek']) AND trim($detail_arr['bntk_arsitek'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Batas Depan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="batas_depan" value="<?php echo (isset($_POST['batas_depan']) AND trim($_POST['batas_depan'])!='')?$_POST['batas_depan']:((isset($detail_arr['batas_depan']) AND trim($detail_arr['batas_depan'])!='')?$detail_arr['batas_depan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Batas Belakang</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="batas_belakang" value="<?php echo (isset($_POST['batas_belakang']) AND trim($_POST['batas_belakang'])!='')?$_POST['batas_belakang']:((isset($detail_arr['batas_belakang']) AND trim($detail_arr['batas_belakang'])!='')?$detail_arr['batas_belakang']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Batas Kanan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="batas_kanan" value="<?php echo (isset($_POST['batas_kanan']) AND trim($_POST['batas_kanan'])!='')?$_POST['batas_kanan']:((isset($detail_arr['batas_kanan']) AND trim($detail_arr['batas_kanan'])!='')?$detail_arr['batas_kanan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Batas Kiri</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="batas_kiri" value="<?php echo (isset($_POST['batas_kiri']) AND trim($_POST['batas_kiri'])!='')?$_POST['batas_kiri']:((isset($detail_arr['batas_kiri']) AND trim($detail_arr['batas_kiri'])!='')?$detail_arr['batas_kiri']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Status obyek Sebagai</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="status_obyek_sebagai" value="<?php echo (isset($_POST['status_obyek_sebagai']) AND trim($_POST['status_obyek_sebagai'])!='')?$_POST['status_obyek_sebagai']:((isset($detail_arr['status_obyek_sebagai']) AND trim($detail_arr['status_obyek_sebagai'])!='')?$detail_arr['status_obyek_sebagai']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Penggunaan Terbaik</label>
						<div class="col-sm-8">
							<select class="form-control" name="peng_terbaik">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_peng_terbaik())) {
									foreach ($debitur_lib->base_peng_terbaik() as $key => $value) {
										$selected = (isset($_POST['peng_terbaik']) AND trim($_POST['peng_terbaik'])==$key)?'selected':((isset($detail_arr['peng_terbaik']) AND trim($detail_arr['peng_terbaik'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Marketability</label>
						<div class="col-sm-8">
							<select class="form-control" name="marketability">
								<option value="">Pilih</option>
								<?php 
								if (!empty($debitur_lib->base_marketability())) {
									foreach ($debitur_lib->base_marketability() as $key => $value) {
										$selected = (isset($_POST['marketability']) AND trim($_POST['marketability'])==$key)?'selected':((isset($detail_arr['marketability']) AND trim($detail_arr['marketability'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Upload Foto</label>
						<div class="col-sm-8">
							<input type="file" name="person_photo">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<input class="btn btn-success btn-md" type="submit" name="save" value="simpan">
							<button class="btn btn-defaul btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=debitur'; ?>', '_self'); return false;">Batal</button>
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