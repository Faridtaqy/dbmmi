<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/salary_lib.php');
	require(FCPATH.'/library/people_lib.php');
	require(FCPATH.'/library/absence_lib.php');
	require(FCPATH.'/library/report_lib.php');

	$salary_lib = new salary_lib;
	$people_lib = new people_lib;
	$absence_lib = new absence_lib;
	$report_lib = new report_lib;

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>

<div class="row">
	<div class="col-md-6">
		<h3 class="page-header">Penggajian</h3>
	</div>
	<div class="col-md-6">
		<h3 class="page-header text-right">Bulan: <?php echo date('F'); ?></h3>
	</div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
	<div class="col-md-12">
		<div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hovered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Aksi</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Jenis Pegawai</th>
					<th>Jumlah Jam Kerja</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if (!empty($salary_lib->get_data())) {
				$no=0;
				foreach ($salary_lib->get_data() as $row_arr) {
					foreach ($row_arr as $key => $value) {
						${$key}=$value;
					}
					$no++;

					$person_type_arr = $people_lib->base_person_type();
					$salary_status = $salary_lib->has_check_salary_this_month($person_id);
					$absence_duration = $absence_lib->get_total_work_time($person_id);
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><button class="btn btn-danger btn-xs" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=salary&method=form_salary&id='.intval($person_id); ?>','_self'); return false;">Gaji</button></td>
					<td><?php echo $person_nik; ?></td>
					<td><?php echo $person_name; ?></td>
					<td><?php echo $person_type_arr[$person_type]; ?></td>
					<td><?php echo $report_lib->convert_duration($absence_duration); ?></td>
					<td><label class="label label-<?php echo (trim($salary_status)=="true")?'success':'warning'; ?>"><?php echo (trim($salary_status)=="true")?'Sudah digaji':'Belum digaji'; ?></label></td>
				</tr>
			<?php
				}
			} else{
				echo '<tr><td colspan="7">Data tidak tersedia.</td></tr>';
			}
			?>
			</tbody>
		</table>
	</div>
</div>
