<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/adjustment_lib.php');
	$adjustment_lib = new adjustment_lib;

	// eksekusi form
	if (isset($_POST['save']) AND trim(strtolower($_POST['save']))=="simpan") {
		$id = (isset($_GET['id']) AND intval($_GET['id'])>0)?$_GET['id']:0;

		$response = $adjustment_lib->form_validation_adjustment($id);
		if ($response['status']==200) {
			$response = $adjustment_lib->stored_data_adjustment2($id);
			if ($response['status']==200) {
				header('location: '.$websiteConfig->base_url().'
					?route=adjustment&method=banding2&id='.$_GET['id'].'$status='.$response['status'].'$message='.base64_decode($response['message']));
				}	
			
			}
		}
	
	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
	?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Tambah Data Banding 2</h3>
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
							<select class="form-control" name="banding2_jenis_properti">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_jenis_properti())) {
									foreach ($adjustment_lib->base_adjustment_jenis_properti() as $key => $value) {
										$selected = (isset($_POST['banding2_jenis_properti']) AND trim($_POST['banding2_jenis_properti'])==$key)?'selected':((isset($detail_arr['banding2_jenis_properti']) AND trim($detail_arr['banding2_jenis_properti'])==$key)?'selected':'');
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
							<input class="form-control"	 type="text" name="banding2_alamat" value="<?php echo (isset($_POST['banding2_alamat']) AND trim($_POST['banding2_alamat'])!='')?$_POST['banding2_alamat']:((isset($detail_arr['banding2_alamat']) AND trim($detail_arr['banding2_alamat'])!='')?$detail_arr['banding2_alamat']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Blok / No</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding2_blok_no" value="<?php echo (isset($_POST['banding2_blok_no']) AND trim($_POST['banding2_blok_no'])!='')?$_POST['banding2_blok_no']:((isset($detail_arr['banding2_blok_no']) AND trim($detail_arr['banding2_blok_no'])!='')?$detail_arr['banding2_blok_no']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kelurahan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding2_kelurahan" value="<?php echo (isset($_POST['banding2_kelurahan']) AND trim($_POST['banding2_kelurahan'])!='')?$_POST['banding2_kelurahan']:((isset($detail_arr['banding2_kelurahan']) AND trim($detail_arr['banding2_kelurahan'])!='')?$detail_arr['banding2_kelurahan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kecamatan</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding2_kecamatan" value="<?php echo (isset($_POST['banding2_kecamatan']) AND trim($_POST['banding2_kecamatan'])!='')?$_POST['banding2_kecamatan']:((isset($detail_arr['banding2_kecamatan']) AND trim($detail_arr['banding2_kecamatan'])!='')?$detail_arr['banding2_kecamatan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Kota</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding2_kota" value="<?php echo (isset($_POST['banding2_kota']) AND trim($_POST['banding2_kota'])!='')?$_POST['banding2_kota']:((isset($detail_arr['banding2_kota']) AND trim($detail_arr['banding2_kota'])!='')?$detail_arr['banding2_kota']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Provinsi</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding2_provinsi" value="<?php echo (isset($_POST['banding2_provinsi']) AND trim($_POST['banding2_provinsi'])!='')?$_POST['banding2_provinsi']:((isset($detail_arr['banding2_provinsi']) AND trim($detail_arr['banding2_provinsi'])!='')?$detail_arr['banding2_provinsi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jarak Pembanding Dengan Properti</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding2_jarak_dengan_aset" value="<?php echo (isset($_POST['banding2_jarak_dengan_aset']) AND trim($_POST['banding2_jarak_dengan_aset'])!='')?$_POST['banding2_jarak_dengan_aset']:((isset($detail_arr['banding2_jarak_dengan_aset']) AND trim($detail_arr['banding2_jarak_dengan_aset'])!='')?$detail_arr['banding2_jarak_dengan_aset']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Sumber Data</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding2_nama" value="<?php echo (isset($_POST['banding2_nama']) AND trim($_POST['banding2_nama'])!='')?$_POST['banding2_nama']:((isset($detail_arr['banding2_nama']) AND trim($detail_arr['banding2_nama'])!='')?$detail_arr['banding2_nama']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Telepon</label>
						<div class="col-sm-8">
							<input class="form-control"	 type="text" name="banding2_telepon" value="<?php echo (isset($_POST['banding2_telepon']) AND trim($_POST['banding2_telepon'])!='')?$_POST['banding2_telepon']:((isset($detail_arr['banding2_telepon']) AND trim($detail_arr['banding2_telepon'])!='')?$detail_arr['banding2_telepon']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding2_keterangan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_keterangan())) {
									foreach ($adjustment_lib->base_adjustment_keterangan() as $key => $value) {
										$selected = (isset($_POST['banding2_keterangan']) AND trim($_POST['banding2_keterangan'])==$key)?'selected':((isset($detail_arr['banding2_keterangan']) AND trim($detail_arr['banding2_keterangan'])==$key)?'selected':'');
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
							<input class="form-control number" type="text" name="banding2_nilai_penawaran" value="<?php echo (isset($_POST['banding2_nilai_penawaran']) AND trim($_POST['banding2_nilai_penawaran'])!='')?$_POST['banding2_nilai_penawaran']:((isset($detail_arr['banding2_nilai_penawaran']) AND trim($detail_arr['banding2_nilai_penawaran'])!='')?$detail_arr['banding2_nilai_penawaran']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tanggal Penawaran</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="banding2_tanggal_penawaran" value="<?php echo (isset($_POST['banding2_tanggal_penawaran']) AND trim($_POST['banding2_tanggal_penawaran'])!='')?$_POST['banding2_tanggal_penawaran']:((isset($detail_arr['banding2_tanggal_penawaran']) AND trim($detail_arr['banding2_tanggal_penawaran'])!='')?$detail_arr['banding2_tanggal_penawaran']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Dokumen Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding2_dokumen_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_dokumen_tanah())) {
									foreach ($adjustment_lib->base_adjustment_dokumen_tanah() as $key => $value) {
										$selected = (isset($_POST['banding2_dokumen_tanah']) AND trim($_POST['banding2_dokumen_tanah'])==$key)?'selected':((isset($detail_arr['banding2_dokumen_tanah']) AND trim($detail_arr['banding2_dokumen_tanah'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="banding2_luas_tanah" value="<?php echo (isset($_POST['banding2_luas_tanah']) AND trim($_POST['banding2_luas_tanah'])!='')?$_POST['banding2_luas_tanah']:((isset($detail_arr['banding2_luas_tanah']) AND trim($detail_arr['banding2_luas_tanah'])!='')?$detail_arr['banding2_luas_tanah']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Bentuk Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding2_bentuk_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_bentuk_tanah())) {
									foreach ($adjustment_lib->base_adjustment_bentuk_tanah() as $key => $value) {
										$selected = (isset($_POST['banding2_bentuk_tanah']) AND trim($_POST['banding2_bentuk_tanah'])==$key)?'selected':((isset($detail_arr['banding2_bentuk_tanah']) AND trim($detail_arr['banding2_bentuk_tanah'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="banding2_frontage" value="<?php echo (isset($_POST['banding2_frontage']) AND trim($_POST['banding2_frontage'])!='')?$_POST['banding2_frontage']:((isset($detail_arr['banding2_frontage']) AND trim($detail_arr['banding2_frontage'])!='')?$detail_arr['banding2_frontage']:''); ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Lebar Jalan (m)</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding2_lebar_jalan" value="<?php echo (isset($_POST['banding2_lebar_jalan']) AND trim($_POST['banding2_lebar_jalan'])!='')?$_POST['banding2_lebar_jalan']:((isset($detail_arr['banding2_lebar_jalan']) AND trim($detail_arr['banding2_lebar_jalan'])!='')?$detail_arr['blok_no']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Letak Tanah</label>
						<div class="col-sm-8">
							<select class="form-control" name="banding2_letak_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_letak_tanah())) {
									foreach ($adjustment_lib->base_adjustment_letak_tanah() as $key => $value) {
										$selected = (isset($_POST['banding2_letak_tanah']) AND trim($_POST['banding2_letak_tanah'])==$key)?'selected':((isset($detail_arr['banding2_letak_tanah']) AND trim($detail_arr['banding2_letak_tanah'])==$key)?'selected':'');
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
							<select class="form-control" name="banding2_kondisi_lahan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_kondisi_lahan())) {
									foreach ($adjustment_lib->base_adjustment_kondisi_lahan() as $key => $value) {
										$selected = (isset($_POST['banding2_kondisi_lahan']) AND trim($_POST['banding2_kondisi_lahan'])==$key)?'selected':((isset($detail_arr['banding2_kondisi_lahan']) AND trim($detail_arr['banding2_kondisi_lahan'])==$key)?'selected':'');
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
							<select class="form-control" name="banding2_peruntukan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_peruntukan())) {
									foreach ($adjustment_lib->base_adjustment_peruntukan() as $key => $value) {
										$selected = (isset($_POST['banding2_peruntukan']) AND trim($_POST['banding2_peruntukan'])==$key)?'selected':((isset($detail_arr['banding2_peruntukan']) AND trim($detail_arr['banding2_peruntukan'])==$key)?'selected':'');
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
							<select class="form-control" name="banding2_kontur_tanah">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_topografi())) {
									foreach ($adjustment_lib->base_adjustment_topografi() as $key => $value) {
										$selected = (isset($_POST['banding2_kontur_tanah']) AND trim($_POST['banding2_kontur_tanah'])==$key)?'selected':((isset($detail_arr['banding2_kontur_tanah']) AND trim($detail_arr['banding2_kontur_tanah'])==$key)?'selected':'');
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
							<select class="form-control" name="banding2_kepadatan_bangunan">
								<option value="">Pilih</option>
								<?php 
								if (!empty($adjustment_lib->base_adjustment_kepadatan_bangunan())) {
									foreach ($adjustment_lib->base_adjustment_kepadatan_bangunan() as $key => $value) {
										$selected = (isset($_POST['banding2_kepadatan_bangunan']) AND trim($_POST['banding2_kepadatan_bangunan'])==$key)?'selected':((isset($detail_arr['banding2_kepadatan_bangunan']) AND trim($detail_arr['banding2_kepadatan_bangunan'])==$key)?'selected':'');
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
							<input class="form-control" type="text" name="banding2_elevasi" value="<?php echo (isset($_POST['banding2_elevasi']) AND trim($_POST['banding2_elevasi'])!='')?$_POST['banding2_elevasi']:((isset($detail_arr['banding2_elevasi']) AND trim($detail_arr['banding2_elevasi'])!='')?$detail_arr['banding2_elevasi']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Luas Bangunan</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="banding2_luas_bangunan" value="<?php echo (isset($_POST['banding2_luas_bangunan']) AND trim($_POST['banding2_luas_bangunan'])!='')?$_POST['banding2_luas_bangunan']:((isset($detail_arr['banding2_luas_bangunan']) AND trim($detail_arr['banding2_luas_bangunan'])!='')?$detail_arr['banding2_luas_bangunan']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<input class="btn btn-success btn-md" type="submit" name="save" value="simpan">
							<button class="btn btn-defaul btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=adjustment'; ?>', '_self'); return false;">Batal</button>
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