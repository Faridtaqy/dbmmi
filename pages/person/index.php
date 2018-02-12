<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/person_lib.php');
	$person_lib = new person_lib;


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
			<div class="panel-body">
				<button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=person&method=add'; ?>', '_self'); return false;">Tambah Data</button>
				<table class="table table-bordered table-striped table-hovered" id="printTable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Aksi</th>
							<TH>Foto</TH>
							<th>NIK</th>
							<th>Status</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Tangal Lahir</th>
							<th>Agama</th>
							<th>Alamat</th>
							<th>No. Telpon</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($person_lib->get_data())) {
							$no=0;
							foreach ($person_lib->get_data() as $row_arr) {
								foreach ($row_arr as $key => $value) {
									${$key}=$value;
								}
								$no++;

								$base_gender_arr = $person_lib->base_gender();
								$base_religion_arr = $person_lib->base_religion();
								$base_person_type_arr = $person_lib->base_person_type();								
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Opsi
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=person&method=update&id='.intval($person_id); ?>','_self'); return false">Ubah</a></li>
								    <li><a href="#" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=person&method=delete&id='.intval($person_id); ?>','_self'); return false;">Hapus</a></li>
								  </ul>
								</div> 
							</td>
							<td><img src="<?php echo $websiteConfig->base_url().'assets/images/person/'.$person_photo; ?>" style ="width: 100px; "></td>
							<td><?php echo $person_nik; ?></td>
							<td><?php echo $person_name; ?></td>
							<td><?php echo $base_person_type_arr[$person_type]; ?></td>
							<td><?php echo $base_gender_arr[$person_gender]; ?></td>
							<td><?php echo date('d F Y', strtotime($person_birthday)); ?></td>
							<td><?php echo $base_religion_arr[$person_religion]; ?></td>
							<td><?php echo $person_address; ?></td>
							<td><?php echo $person_phone; ?></td>
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