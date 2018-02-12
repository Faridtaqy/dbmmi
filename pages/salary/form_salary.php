<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/salary_lib.php');
	require(FCPATH.'/library/people_lib.php');
	require(FCPATH.'/library/report_lib.php');
	$salary_lib = new salary_lib;
	$people_lib = new people_lib;
	$report_lib = new report_lib;

	$gender_arr = $people_lib->base_gender();
	$religion_arr = $people_lib->base_religion();
	$person_type_arr = $people_lib->base_person_type();
	$salary_price_arr = $salary_lib->base_salary_price();

	if (isset($_POST['save']) AND trim($_POST['save'])=="simpan") {
		$id = (isset($_GET['id']) AND is_numeric($_GET['id']))?$_GET['id']:0;
		$response = $salary_lib->stored_data($id);
		header('Location: '.$websiteConfig->base_url().'?route=salary&status='.$response['status'].'&message='.base64_encode($response['message']));
	}

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

	// dapatkan data
	if(isset($_GET['id']) AND is_numeric($_GET['id'])){
		$detail_arr = $salary_lib->get_data($_GET['id']);
		$salary_status = $salary_lib->has_check_salary_this_month($_GET['id']);
		if (trim($salary_status)=="true") {
			header('Location: '.$websiteConfig->base_url().'?route=salary&status=500&message='.base64_encode('Pegawai tersebut sudah digaji bulan ini.'));
		}

		if (empty($detail_arr)) {
			header('Location: '.$websiteConfig->base_url().'?route=salary');
		}
	} else{
		header('Location: '.$websiteConfig->base_url().'?route=salary');
	}

	// calculate
	$total_salary = $salary_lib->calculate_total_salary($detail_arr[0]['absence_duration'], $salary_price_arr[$detail_arr[0]['person_type']]);//$detail_arr[0]['absence_total']*$salary_price_arr[$detail_arr[0]['person_type']];
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Gaji Pegawai <small></small></h3>
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
				<form class="form-horizontal" method="post" action="">
					<div class="form-group">
						<div class="col-md-2"></div>
						<div class="col-md-10">
							<table class="table table-striped table-hover">
								<tr>
									<td style="font-weight: 600;">NIK</td>
									<td>: <?php echo $detail_arr[0]['person_nik']; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Nama</td>
									<td>: <?php echo $detail_arr[0]['person_name']; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Jenis Kelamin</td>
									<td>: <?php echo $gender_arr[$detail_arr[0]['person_gender']]; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Tgl. Lahir</td>
									<td>: <?php echo date('d F Y', strtotime($detail_arr[0]['person_birthday'])); ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Agama</td>
									<td>: <?php echo $religion_arr[$detail_arr[0]['person_religion']]; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Alamat</td>
									<td>: <?php echo $detail_arr[0]['person_address']; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">No. Telepon</td>
									<td>: <?php echo $detail_arr[0]['person_phone']; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Jenis Pegawai</td>
									<td>: <?php echo $person_type_arr[$detail_arr[0]['person_type']]; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Jumlah Jam Kerja</td>
									<input type="hidden" name="absence_duration" value="<?php echo $detail_arr[0]['absence_duration']; ?>">
									<td>: <?php echo $report_lib->convert_duration($detail_arr[0]['absence_duration']); ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Gaji/Jam</td>
									<td id="label_salary_price">: Rp. <?php echo $salary_price_arr[$detail_arr[0]['person_type']]; ?></td>
								</tr>
								<tr>
									<td style="font-weight: 600;">Total Gaji</td>
									<td id="label_salary_total">: Rp. <?php echo $total_salary; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="form-group" style="<?php echo (trim($detail_arr[0]['person_type'])=="static")?'display: none;':''?>">
						<div class="col-sm-3 text-right"><input type="checkbox" name="onchange_salary_price" value="on" onchange="change_salary_price($(this)); return false;"></div>
						<div class="col-sm-8">
							<span style="font-weight: 600;">Ubah nominal gaji/hari untuk tipe pegawai honorer.</span>
						</div>
					</div>
					<div class="form-group change_salary_price" style="display: none;">
						<label class="col-sm-3 control-label">Nominal Gaji/hari</label>
						<div class="col-sm-8">
							<input class="form-control" type="number" name="salary_price" value="0" onkeyup="calculate_salary_honorer(); return false;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<input class="btn btn-success btn-md" type="submit" name="save" value="simpan">
							<button class="btn btn-defaul btn-md" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=salary'; ?>', '_self'); return false;">Batal</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function change_salary_price(elem){
		$('.change_salary_price').slideUp('medium');
		if (elem.prop('checked')==true) {
			$('.change_salary_price').slideDown('medium');
		}
	}

	function calculate_salary_honorer(){
		var salary_total = $('input[name="salary_price"]').val();
		var absence_total = $('input[name="absence_total"]').val();
		var result = salary_total*absence_total;

		$('#label_salary_price').html(': Rp. '+salary_total);
		$('#label_salary_total').html(': Rp. '+result);	
	}
</script>