<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/client_lib.php');
	$client_lib = new client_lib;


	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Data Pegawai</h3>
	</div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
	<div class="col-md-12">
		<div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel">			
			<div class="col-md-12">
				<table class="table table-striped table-hovered">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Atasan Penilai</th>
							<th class="text-center">Laporan Ditujukan ke</th>
							<th class="text-center">No. Laporan</th>
							<th class="text-center">Tanggal penilaian</th>
							<th class="text-center">Tanggal Laporan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($client_lib->get_data_client())) {
							$no=0;
							foreach ($client_lib->get_data_client() as $row_arr) {
								foreach ($row_arr as $key => $value) {
									${$key}=$value;
								}
								$no++;	

									$base_client_atasan_penilai_arr = $client_lib->base_client_atasan_penilai();						
						?>
						<tr>
							<th class="text-center"><?php echo $no; ?></th	>
							<td class="text-center"><?php echo $client_name; ?></td>
							<td class="text-center"><?php echo $base_client_atasan_penilai_arr[$client_atasan_penilai]; ?></td>
							<td class="text-center"><?php echo $client_report; ?></td>
							<td class="text-center"><?php echo $client_report_number; ?></td>
							<td class="text-center"><?php echo date('d F Y', strtotime($client_appraisal_date)); ?></td>
							<td class="text-center"><?php echo date('d F Y', strtotime($client_statement_date)); ?></td>
						</tr>
						<?php
							}
						} else{
							echo '<tr><td colspan="10">Data tidak tersedia.</td></tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>