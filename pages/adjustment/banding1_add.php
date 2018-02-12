<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/adjustment_lib.php');
	$adjustment_lib = new adjustment_lib;

	// eksekusi form
	if (isset($_POST['save']) AND trim(strtolower($_POST['save']))=="simpan") {
		$id = (isset($_GET['id']) AND intval($_GET['id'])>0)?$_GET['id']:0;

		$response = $adjustment_lib->form_validation_adjustment($id);
		if ($response['status']==200) {
			$response = $adjustment_lib->stored_data_adjustment($id);
			
			}
		}
	
	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Tambah Data Banding 1</h3>
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
						<label class="col-sm-3 control-label">Jenis Properti</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding1_jenis_properti">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_jenis_properti())) {
									foreach ($adjustment_lib->base_adjustment_jenis_properti() as $key => $value) {
										$selected = (isset($_POST['banding1_jenis_properti']) AND trim($_POST['banding1_jenis_properti'])==$key)?'selected':((isset($detail_arr['banding1_jenis_properti']) AND trim($detail_arr['banding1_jenis_properti'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Alamat</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_alamat" value="<?php echo (isset($_POST['banding1_alamat']) AND trim($_POST['banding1_alamat'])!='')?$_POST['banding1_alamat']:((isset($detail_arr['banding1_alamat']) AND trim($detail_arr['banding1_alamat'])!='')?$detail_arr['banding1_alamat']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Blok / No</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_blok_no" value="<?php echo (isset($_POST['banding1_blok_no']) AND trim($_POST['banding1_blok_no'])!='')?$_POST['banding1_blok_no']:((isset($detail_arr['banding1_blok_no']) AND trim($detail_arr['banding1_blok_no'])!='')?$detail_arr['banding1_blok_no']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kelurahan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_kelurahan" value="<?php echo (isset($_POST['banding1_kelurahan']) AND trim($_POST['banding1_kelurahan'])!='')?$_POST['banding1_kelurahan']:((isset($detail_arr['banding1_kelurahan']) AND trim($detail_arr['banding1_kelurahan'])!='')?$detail_arr['banding1_kelurahan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kecamatan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_kecamatan" value="<?php echo (isset($_POST['banding1_kecamatan']) AND trim($_POST['banding1_kecamatan'])!='')?$_POST['banding1_kecamatan']:((isset($detail_arr['banding1_kecamatan']) AND trim($detail_arr['banding1_kecamatan'])!='')?$detail_arr['banding1_kecamatan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kota</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_kota" value="<?php echo (isset($_POST['banding1_kota']) AND trim($_POST['banding1_kota'])!='')?$_POST['banding1_kota']:((isset($detail_arr['banding1_kota']) AND trim($detail_arr['banding1_kota'])!='')?$detail_arr['banding1_kota']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Provinsi</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_provinsi" value="<?php echo (isset($_POST['banding1_provinsi']) AND trim($_POST['banding1_provinsi'])!='')?$_POST['banding1_provinsi']:((isset($detail_arr['banding1_provinsi']) AND trim($detail_arr['banding1_provinsi'])!='')?$detail_arr['banding1_provinsi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jarak Pembanding Dengan Properti</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_jarak_dengan_aset" value="<?php echo (isset($_POST['banding1_jarak_dengan_aset']) AND trim($_POST['banding1_jarak_dengan_aset'])!='')?$_POST['banding1_jarak_dengan_aset']:((isset($detail_arr['banding1_jarak_dengan_aset']) AND trim($detail_arr['banding1_jarak_dengan_aset'])!='')?$detail_arr['banding1_jarak_dengan_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Sumber Data</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_nama" value="<?php echo (isset($_POST['banding1_nama']) AND trim($_POST['banding1_nama'])!='')?$_POST['banding1_nama']:((isset($detail_arr['banding1_nama']) AND trim($detail_arr['banding1_nama'])!='')?$detail_arr['banding1_nama']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Telepon</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding1_telepon" value="<?php echo (isset($_POST['banding1_telepon']) AND trim($_POST['banding1_telepon'])!='')?$_POST['banding1_telepon']:((isset($detail_arr['banding1_telepon']) AND trim($detail_arr['banding1_telepon'])!='')?$detail_arr['banding1_telepon']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding1_keterangan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_keterangan())) {
									foreach ($adjustment_lib->base_adjustment_keterangan() as $key => $value) {
										$selected = (isset($_POST['banding1_keterangan']) AND trim($_POST['banding1_keterangan'])==$key)?'selected':((isset($detail_arr['banding1_keterangan']) AND trim($detail_arr['banding1_keterangan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nilai Penawaran</label>
						<div class="col-sm-8">
							<input class="form-control number" type="text" name="banding1_nilai_penawaran" value="<?php echo (isset($_POST['banding1_nilai_penawaran']) AND trim($_POST['banding1_nilai_penawaran'])!='')?$_POST['banding1_nilai_penawaran']:((isset($detail_arr['banding1_nilai_penawaran']) AND trim($detail_arr['banding1_nilai_penawaran'])!='')?$detail_arr['banding1_nilai_penawaran']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Penawaran</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="banding1_tanggal_penawaran" value="<?php echo (isset($_POST['banding1_tanggal_penawaran']) AND trim($_POST['banding1_tanggal_penawaran'])!='')?$_POST['banding1_tanggal_penawaran']:((isset($detail_arr['banding1_tanggal_penawaran']) AND trim($detail_arr['banding1_tanggal_penawaran'])!='')?$detail_arr['banding1_tanggal_penawaran']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Dokumen Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding1_dokumen_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_dokumen_tanah())) {
									foreach ($adjustment_lib->base_adjustment_dokumen_tanah() as $key => $value) {
										$selected = (isset($_POST['banding1_dokumen_tanah']) AND trim($_POST['banding1_dokumen_tanah'])==$key)?'selected':((isset($detail_arr['banding1_dokumen_tanah']) AND trim($detail_arr['banding1_dokumen_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Tanah (m2)</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_luas_tanah" value="<?php echo (isset($_POST['banding1_luas_tanah']) AND trim($_POST['banding1_luas_tanah'])!='')?$_POST['banding1_luas_tanah']:((isset($detail_arr['banding1_luas_tanah']) AND trim($detail_arr['banding1_luas_tanah'])!='')?$detail_arr['banding1_luas_tanah']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Bentuk Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding1_bentuk_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_bentuk_tanah())) {
									foreach ($adjustment_lib->base_adjustment_bentuk_tanah() as $key => $value) {
										$selected = (isset($_POST['banding1_bentuk_tanah']) AND trim($_POST['banding1_bentuk_tanah'])==$key)?'selected':((isset($detail_arr['banding1_bentuk_tanah']) AND trim($detail_arr['banding1_bentuk_tanah'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Depan (Frontage)</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_frontage" value="<?php echo (isset($_POST['banding1_frontage']) AND trim($_POST['banding1_frontage'])!='')?$_POST['banding1_frontage']:((isset($detail_arr['banding1_frontage']) AND trim($detail_arr['banding1_frontage'])!='')?$detail_arr['banding1_frontage']:''); ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Jalan (m)</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_lebar_jalan" value="<?php echo (isset($_POST['banding1_lebar_jalan']) AND trim($_POST['banding1_lebar_jalan'])!='')?$_POST['banding1_lebar_jalan']:((isset($detail_arr['banding1_lebar_jalan']) AND trim($detail_arr['banding1_lebar_jalan'])!='')?$detail_arr['blok_no']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Letak Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding1_letak_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_letak_tanah())) {
									foreach ($adjustment_lib->base_adjustment_letak_tanah() as $key => $value) {
										$selected = (isset($_POST['banding1_letak_tanah']) AND trim($_POST['banding1_letak_tanah'])==$key)?'selected':((isset($detail_arr['banding1_letak_tanah']) AND trim($detail_arr['banding1_letak_tanah'])==$key)?'selected':'');
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
							<select class="form-control" name="banding1_kondisi_lahan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_kondisi_lahan())) {
									foreach ($adjustment_lib->base_adjustment_kondisi_lahan() as $key => $value) {
										$selected = (isset($_POST['banding1_kondisi_lahan']) AND trim($_POST['banding1_kondisi_lahan'])==$key)?'selected':((isset($detail_arr['banding1_kondisi_lahan']) AND trim($detail_arr['banding1_kondisi_lahan'])==$key)?'selected':'');
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
							<select class="form-control" name="banding1_peruntukan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_peruntukan())) {
									foreach ($adjustment_lib->base_adjustment_peruntukan() as $key => $value) {
										$selected = (isset($_POST['banding1_peruntukan']) AND trim($_POST['banding1_peruntukan'])==$key)?'selected':((isset($detail_arr['banding1_peruntukan']) AND trim($detail_arr['banding1_peruntukan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kontur Tanah / Topografi</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding1_kontur_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_topografi())) {
									foreach ($adjustment_lib->base_adjustment_topografi() as $key => $value) {
										$selected = (isset($_POST['banding1_kontur_tanah']) AND trim($_POST['banding1_kontur_tanah'])==$key)?'selected':((isset($detail_arr['banding1_kontur_tanah']) AND trim($detail_arr['banding1_kontur_tanah'])==$key)?'selected':'');
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
							<select class="form-control" name="banding1_kepadatan_bangunan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_kepadatan_bangunan())) {
									foreach ($adjustment_lib->base_adjustment_kepadatan_bangunan() as $key => $value) {
										$selected = (isset($_POST['banding1_kepadatan_bangunan']) AND trim($_POST['banding1_kepadatan_bangunan'])==$key)?'selected':((isset($detail_arr['banding1_kepadatan_bangunan']) AND trim($detail_arr['banding1_kepadatan_bangunan'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Elevasi</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_elevasi" value="<?php echo (isset($_POST['banding1_elevasi']) AND trim($_POST['banding1_elevasi'])!='')?$_POST['banding1_elevasi']:((isset($detail_arr['banding1_elevasi']) AND trim($detail_arr['banding1_elevasi'])!='')?$detail_arr['banding1_elevasi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Bangunan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding1_luas_bangunan" value="<?php echo (isset($_POST['banding1_luas_bangunan']) AND trim($_POST['banding1_luas_bangunan'])!='')?$_POST['banding1_luas_bangunan']:((isset($detail_arr['banding1_luas_bangunan']) AND trim($detail_arr['banding1_luas_bangunan'])!='')?$detail_arr['banding1_luas_bangunan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<input class="btn btn-success btn-md" type="submit" name="save" value="simpan">
							<button class="btn btn-defaul btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=adjustment='; ?>', '_self'); return false;">Batal</button>
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