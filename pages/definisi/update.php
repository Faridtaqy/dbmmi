<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/btb_lib.php');
	$btb_lib = new btb_lib;

	// eksekusi form
	if (isset($_POST['save']) AND trim(strtolower($_POST['save']))=="simpan") {
		$id = (isset($_GET['id']) AND intval($_GET['id'])>0)?$_GET['id']:0;
		
		$response = $btb_lib->form_validation_btb($id);
		if ($response['status']==200) {
			$response = $btb_lib->stored_data_btb($id);
			if ($response['status']==200) {
				header('Location: '.$websiteConfig->base_url().'?route=btb&method=update&id='.$_GET['id'].'&status='.$response['status'].'&message='.base64_encode($response['message']));
			}
		}
	}

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

	// dapatkan data
	if(isset($_GET['id']) AND is_numeric($_GET['id'])){
		$detail_arr = $btb_lib->get_detail_btb($_GET['id']);
		if (empty($detail_arr)) {
			header('Location: '.$websiteConfig->base_url().'?route=btb');
		}
	} else{
		header('Location: '.$websiteConfig->base_url().'?route=btb');
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
						<label class="col-sm-3 control-label">NIK</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="person_nik" value="<?php echo (isset($_POST['person_nik']) AND trim($_POST['person_nik'])!='')?$_POST['person_nik']:((isset($detail_arr['person_nik']) AND trim($detail_arr['person_nik'])!='')?$detail_arr['person_nik']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="person_name" value="<?php echo (isset($_POST['person_name']) AND trim($_POST['person_name'])!='')?$_POST['person_name']:((isset($detail_arr['person_name']) AND trim($detail_arr['person_name'])!='')?$detail_arr['person_name']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<select class="form-control" name="person_gender">
								<option value="">Pilih</option>
								<?php 
								if (!empty($person_lib->base_gender())) {
									foreach ($person_lib->base_gender() as $key => $value) {
										$selected = (isset($_POST['person_gender']) AND trim($_POST['person_gender'])==$key)?'selected':((isset($detail_arr['person_gender']) AND trim($detail_arr['person_gender'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tgl. Lahir</label>
						<div class="col-sm-8">
							<input class="form-control datepicker" type="text" name="person_birthday" value="<?php echo (isset($_POST['person_birthday']) AND trim($_POST['person_birthday'])!='')?$_POST['person_birthday']:((isset($detail_arr['person_birthday']) AND trim($detail_arr['person_birthday'])!='')?$detail_arr['person_birthday']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Agama</label>
						<div class="col-sm-8">
							<select class="form-control" name="person_religion">
								<option value="">Pilih</option>
								<?php 
								if (!empty($person_lib->base_religion())) {
									foreach ($person_lib->base_religion() as $key => $value) {
										$selected = (isset($_POST['person_religion']) AND trim($_POST['person_religion'])==$key)?'selected':((isset($detail_arr['person_religion']) AND trim($detail_arr['person_religion'])==$key)?'selected':'');
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
							<textarea class="form-control" name="person_address"><?php echo (isset($_POST['person_address']) AND trim($_POST['person_address'])!='')?$_POST['person_address']:((isset($detail_arr['person_address']) AND trim($detail_arr['person_address'])!='')?$detail_arr['person_address']:''); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">No. Telepon</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="person_phone" value="<?php echo (isset($_POST['person_phone']) AND trim($_POST['person_phone'])!='')?$_POST['person_phone']:((isset($detail_arr['person_phone']) AND trim($detail_arr['person_phone'])!='')?$detail_arr['person_phone']:''); ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Pegawai</label>
						<div class="col-sm-8">
							<select class="form-control" name="person_type">
								<option value="">Pilih</option>
								<?php 
								if (!empty($person_lib->base_person_type())) {
									foreach ($person_lib->base_person_type() as $key => $value) {
										$selected = (isset($_POST['person_type']) AND trim($_POST['person_type'])==$key)?'selected':((isset($detail_arr['person_type']) AND trim($detail_arr['person_type'])==$key)?'selected':'');
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
							<button class="btn btn-defaul btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=person'; ?>', '_self'); return false;">Batal</button>
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