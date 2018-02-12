 <?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/debitur_lib.php');
	require(FCPATH.'/library/client_lib.php');
	$debitur_lib = new debitur_lib;
	$client_lib = new client_lib;


	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Data Debitur</h3>
	</div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
	<div class="col-md-12">
		<div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'dark'; ?>"><?php echo $message; ?></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
				<div class="col-md-12">
					<button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=debitur&method=add'; ?>', '_self'); return false;">Tambah Data</button>
						<table class="table table-striped table-hovered">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Aksi</th>
									<th class="text-center">Foto</th>
									<th class="text-center">Jenis Kredit</th>
									<th class="text-center">Nama Debitur</th>
									<th class="text-center">No. Penugasan</th>
									<th class="text-center">Tanggal Penugasan</th>
									<th class="text-center">Lokasi</th>
									<th class="text-center">Kota</th>
									<th class="text-center">Provinsi</th>
									<th class="text-center">Kode Pos</th>
									<th class="text-center">Jenis Properti</th>
									<th class="text-center">PDF</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if (!empty($debitur_lib->get_data())) {
									$no=0;
									foreach ($debitur_lib->get_data() as $row_arr) {
										foreach ($row_arr as $key => $value) {
											${$key}=$value;
										}
										$no++;

										$base_dokumen_tanah_arr = $debitur_lib->base_dokumen_tanah();
										$base_jenis_properti_arr = $debitur_lib->base_jenis_properti();
										$base_hub_dng_debitur_arr = $debitur_lib->base_hub_dng_debitur();
										$base_bentuk_tanah_arr = $debitur_lib->base_bentuk_tanah();
										$base_pos_lokasi_arr = $debitur_lib->base_pos_lokasi();
										$base_kepadatan_bangunan_arr = $debitur_lib->base_kepadatan_bangunan();
										$base_keadaan_halaman_arr = $debitur_lib->base_keadaan_halaman();
										$base_kontur_tanah_arr = $debitur_lib->base_kontur_tanah();
										$base_jenis_tanah_arr = $debitur_lib->base_jenis_tanah();
										$base_peruntukan_arr = $debitur_lib->base_peruntukan();
										$base_kondisi_lahan_arr = $debitur_lib->base_kondisi_lahan();
										$base_kondisi_bangunan_arr = $debitur_lib->base_kondisi_bangunan();
										$base_penggunaan_arr = $debitur_lib->base_penggunaan();
										$base_bntk_arsitek_arr = $debitur_lib->base_bntk_arsitek();
										$base_peng_terbaik_arr = $debitur_lib->base_peng_terbaik();
										$base_marketability_arr = $debitur_lib->base_marketability();
										$base_jenis_kredit_arr = $debitur_lib->base_jenis_kredit();

										$debitur_photo = (trim($debitur_photo)!='' AND file_exists(FCPATH.'assets/images/debitur/'.$debitur_photo))?$websiteConfig->base_url().'assets/images/debitur/'.$debitur_photo:$websiteConfig->base_url().'assets/images/statics/mmi2.png';
								?>
								<tr>
									<th><?php echo $no; ?></td>
									<td class="text-center">
										<div class="dropdown">
										  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Opsi
										  <span class="caret"></span></button>
										  <ul class="dropdown-menu">
										    <li><a href="#" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=debitur&method=update&id='.intval($debitur_id); ?>','_self'); return false">Ubah</a></li>
										    <li><a href="#" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=debitur&method=delete&id='.intval($debitur_id); ?>','_self'); return false;">Hapus</a></li>
										  </ul>
										</div> 
									</td>
									<td class="text-center"><img src="<?php echo $debitur_photo; ?>" style ="width: 100px; "></td>
									<td class="text-center"><?php echo $base_jenis_kredit_arr[$jenis_kredit]; ?></td>
									<td class="text-center"><?php echo $nama_debitur; ?></td>
									<td class="text-center"><?php echo $no_penugasan; ?></td>
									<td class="text-center"><?php echo date('d F Y', strtotime($tgl_penugasan)); ?></td>
									<td class="text-center"><?php echo $lokasi_aset; ?></td>
									<td class="text-center"><?php echo $kota; ?></td>
									<td class="text-center"><?php echo $provinsi; ?></td>
									<td class="text-center"><?php echo $kode_pos; ?></td>
									<td class="text-center"><?php echo $base_jenis_properti_arr[$jenis_properti]; ?></td>
									<td class="text-center"><button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'invoice-db.php'; ?>', '_self'); return false;">Get PDF</button></td>
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
</div>
<script type="text/javascript">
	$('.datepicker').datepicker({
        showButtonPanel: true,
        changeMonth: true,
        dateFormat: 'yyyy/mm/dd'
	});
</script>