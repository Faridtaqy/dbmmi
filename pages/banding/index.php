<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/banding_lib.php');
	$banding_lib = new banding_lib;


	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');
?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Data Banding</h3>
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
				<button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=banding&method=add'; ?>', '_self'); return false;">Tambah Data Banding</button>
				<table class="table table-striped table-hovered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Opsi</th>
							<th>Nama Informan</th>
							<th>Jenis Propertiy</th>
							<TH>Lokasi</TH>
							<th>Kelurahan</th>
							<th>Kecamatan</th>
							<th>Kota</th>
							<th>Provinsi</th>
							<th>Tanggal Pemeriksaan</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (!empty($banding_lib->get_data_banding())) {
							$no=0;
							foreach ($banding_lib->get_data_banding() as $row_arr) {
								foreach ($row_arr as $key => $value) {
									${$key}=$value;
								}
								$no++;

								$base_banding_keterangan_info_arr = $banding_lib->base_banding_keterangan_info();
								$base_banding_dokumen_tanah_arr = $banding_lib->base_banding_dokumen_tanah();
								$base_banding_hub_dng_nasabah_arr = $banding_lib->base_banding_hub_dng_nasabah();
								$base_banding_bntk_tanah_arr = $banding_lib->base_banding_bntk_tanah();
								$base_banding_posisi_lokasi_arr = $banding_lib->base_banding_posisi_lokasi();
								$base_banding_kpdtan_bangunan_arr = $banding_lib->base_banding_kpdtan_bangunan();
								$base_banding_keadaan_hal_arr = $banding_lib->base_banding_keadaan_hal();
								$base_banding_topografi_arr = $banding_lib->base_banding_topografi();
								$base_banding_jenis_tanah_arr = $banding_lib->base_banding_jenis_tanah();
								$base_banding_peruntukan_arr = $banding_lib->base_banding_peruntukan();
								$base_banding_kondisi_lahan_arr = $banding_lib->base_banding_kondisi_lahan();
								$base_banding_kondisi_bangunan_arr = $banding_lib->base_banding_kondisi_bangunan();
								
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Opsi
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=banding&method=update&id='.intval($banding_id); ?>','_self'); return false">Ubah</a></li>
								    <li><a href="#" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=banding&method=delete&id='.intval($banding_id); ?>','_self'); return false;">Hapus</a></li>
								  </ul>
								</div> 
							</td>
							<td><?php echo $banding_nama_informan; ?></td>
							<td><?php echo $banding_jenis_properti; ?></td>
							<td><?php echo $banding_lokasi; ?></td>
							<td><?php echo $banding_kelurahan; ?></td>
							<td><?php echo $banding_kecamatan; ?></td>
							<td><?php echo $banding_kota; ?></td>
							<td><?php echo $banding_provinsi; ?></td>
							<td><?php echo $banding_tanggal; ?></td>
							<td><?php echo $base_banding_keterangan_info_arr[$banding_keterangan_info]; ?></td>
							<td><button class="btn btn-primary btn-sm" onclick="printData(); return false">Print</button></td>
							<td><button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=person'; ?>', '_self'); return false;">Detail</button></td>
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
<script type="text/javascript">
	$('.datepicker').datepicker({
        showButtonPanel: true,
        changeMonth: true,
        dateFormat: 'yyyy/mm/dd'
	});

	$(document).keypress(
	    function(event){
	     if (event.which == '13') {
	        event.preventDefault();
	      }
	});

	function printData()
	{
	   var divToPrint=$('#printTable');
	   newWin= window.open("");
	   newWin.document.write(divToPrint.html());
	   newWin.print();
	   newWin.close();
	}
	</script>