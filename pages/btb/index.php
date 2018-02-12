<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/btb_lib.php');
	require_once('library/db_utility_lib.php');
	$btb_lib = new btb_lib;

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

?>
<button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=btb&method=add'; ?>', '_self'); return false;">Rubah Index BTB</button>
<div class="container">
	<div class="col-md-12">
		<table>
		<h3 class="page-header table" style="font-size: 26px";><center><b>BIAYA TEKNIS BANGUNAN</b></center></h3>
	</div>
</div>
<div class="container">
	<table class="table table-bordered">
		<tr>
			<th class="text-center">Provinsi</th>
			<th class="text-center">Kabupaten</th>
			<th class="text-center">Apply</th>
		</tr>
		<tr>
			<td class="col-md-5">
				<select class="form-control">
					<option value="">Pilihan</option>
					<?php 
							if (!empty($btb_lib->base_btb_provinsi())) {
								foreach ($btb_lib->base_btb_provinsi() as $key => $value) {
									$selected = (isset($_GET['btb_id']) AND trim($_GET['btb_id'])==$key)?'selected':((isset($detail_arr['btb_id']) AND trim($detail_arr['btb_id'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
						?>
				</select>
			</td>
			<td class="col-md-5">
				<select class="form-control" name="btb_id">
					<option value="">Pilihan</option>
						<?php 
							if (!empty($btb_lib->base_btb_regional())) {
								foreach ($btb_lib->base_btb_regional() as $key => $value) {
									$selected = (isset($_GET['btb_id']) AND trim($_GET['btb_id'])==$key)?'selected':((isset($detail_arr['btb_id']) AND trim($detail_arr['btb_id'])==$key)?'selected':'');
										echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
									}
								}
						?>
				</select>
			</td>
			<td><center>
				<div>
					<input id="btb" type="submit" value="">
				</div>
			</center></td>
		</tr>
	</table>
</div>
</div>
<div class="container">
<div class="panel-bordered">
	<table class="table table-bordered">
		<thead class="text-center">
			<tbody>
					<?php 
					if (!empty($btb_lib->get_data_btb())) {
						$no=0;
						foreach ($btb_lib->get_data_btb() as $row_arr) {
						foreach ($row_arr as $key => $value) {
								${$key}=$value;
						}
						$no++;							
					?>
			<tr>
				<th class="warning text-center col-md-2" rowspan="3">Type Bangunan</th>
				<th class="warning text-center" colspan="4">Rumah Tinggal 1 Lantai</th>
				<th class="warning text-center" colspan="4">Rumah Tinggal 2 Lantai</th>
				<th class="warning text-center" rowspan="3">Bangunan Perkebunan</th>
				<th class="warning text-center" rowspan="3">Gudang</th>
				<th class="warning text-center" colspan="3">Bangunan Gedung Bertingkat</th>
			</tr>
			<tr>
				<th class="info text-center col-md-1">Sederhana 1 Lt.</th>
				<th class="info text-center col-md-1">Menengah 1 Lt.</th>
				<th class="info text-center col-md-1">Mewah 1 Lt.</th>
				<th class="info text-center col-md-1">Ekslusif 1 Lt.</th>
				<th class="info text-center col-md-1">Sederhana 1 Lt.</th>
				<th class="info text-center col-md-1">Menengah 2 Lt.</th>
				<th class="info text-center col-md-1">Mewah 2 Lt.</th>
				<th class="info text-center col-md-1">Ekslusif 2 Lt.</th>
				<th class="info text-center col-md-1">Rendah</th>
				<th class="info text-center col-md-1">Sedang</th>
				<th class="info text-center col-md-1">Tinggi</th>
			</tr>
			<tr>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Rp / m2</th>
				<th class="text-center info">Max 4 Lt.</th>
				<th class="text-center info">Max 8 Lt.</th>
				<th class="text-center info">Max 9 Lt.</th>
			</tr>
				
			<tr>
				<th class="text-left">A. BIAYA LANGSUNG</th>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
			</tr>
			<tr>
				<th class="text-center">PONDASI</th>
				<td class="text-center"><?php echo $rt_sederhana_pondasi_1lt;?></td>
				<td class="text-center"><?php echo $rt_menengah_pondasi_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_pondasi_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_pondasi_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_pondasi_2lt;?></td>
				<td class="text-center"><?php echo $rt_menengah_pondasi_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_pondasi_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_pondasi_2lt ?></td>
				<td class="text-center"><?php echo $bp_pondasi ?></td>
				<td class="text-center"><?php echo $gudang_pondasi ?></td>
				<td class="text-center"><?php echo $bgb_rendah_pondasi ?></td>
				<td class="text-center"><?php echo $bgb_sedang_pondasi ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_pondasi ?></td>
			</tr>
			<tr>
				<th class="text-center">STRUKTUR</th>
				<td class="text-center"><?php echo $rt_sederhana_struktur_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_struktur_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_struktur_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_struktur_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_struktur_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_struktur_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_struktur_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_struktur_2lt ?></td>
				<td class="text-center"><?php echo $bp_struktur ?></td>
				<td class="text-center"><?php echo $gudang_struktur ?></td>
				<td class="text-center"><?php echo $bgb_rendah_struktur ?></td>
				<td class="text-center"><?php echo $bgb_sedang_struktur ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_struktur ?></td>
				
			</tr>
			<tr>
				<th class="text-center">RANGKA ATAP</th>
				<td class="text-center"><?php echo $rt_sederhana_rangka_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_rangka_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_rangka_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_rangka_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_rangka_atap_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_rangka_atap_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_rangka_atap_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_rangka_atap_2lt ?></td>
				<td class="text-center"><?php echo $bp_rangka_atap ?></td>
				<td class="text-center"><?php echo $gudang_rangka_atap ?></td>
				<td class="text-center">-</td>
				<td class="text-center">-</td>
				<td class="text-center">-</td>
			</tr>
			<tr>
				<th class="text-center">PENUTUP ATAP</th>
				<td class="text-center"><?php echo $rt_sederhana_penutup_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_penutup_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_penutup_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_penutup_atap_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_penutup_atap_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_penutup_atap_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_penutup_atap_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_penutup_atap_2lt ?></td>
				<td class="text-center"><?php echo $bp_penutup_atap ?></td>
				<td class="text-center"><?php echo $gudang_penutup_atap ?></td>
				<td class="text-center"><?php echo $bgb_rendah_penutup_atap ?></td>
				<td class="text-center"><?php echo $bgb_sedang_penutup_atap ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_penutup_atap ?></td>
			</tr>
			<tr>
				<th class="text-center">PLAFOND</th>
				<td class="text-center"><?php echo $rt_sederhana_plafond_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_plafond_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_plafond_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_plafond_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_plafond_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_plafond_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_plafond_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_plafond_2lt ?></td>
				<td class="text-center"><?php echo $bp_plafond ?></td>
				<td class="text-center">-</td>
				<td class="text-center"><?php echo $bgb_rendah_plafond ?></td>
				<td class="text-center"><?php echo $bgb_sedang_plafond ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_plafond ?></td>
			</tr>
			<tr>
				<th class="text-center">DIDING</th>
				<td class="text-center"><?php echo $rt_sederhana_dinding_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_dinding_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_dinding_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_dinding_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_dinding_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_dinding_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_dinding_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_dinding_2lt ?></td>
				<td class="text-center"><?php echo $bp_dinding ?></td>
				<td class="text-center"><?php echo $gudang_dinding ?></td>
				<td class="text-center"><?php echo $bgb_rendah_dinding ?></td>
				<td class="text-center"><?php echo $bgb_sedang_dinding ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_dinding ?></td>
			</tr>
			<tr>
				<th class="text-center">PINTU & JENDELA</th>
				<td class="text-center"><?php echo $rt_sederhana_pintu_jendela_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_pintu_jendela_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_pintu_jendela_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_pintu_jendela_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_pintu_jendela_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_pintu_jendela_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_pintu_jendela_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_pintu_jendela_2lt ?></td>
				<td class="text-center"><?php echo $bp_pintu_jendela ?></td>
				<td class="text-center"><?php echo $gudang_pintu_jendela ?></td>
				<td class="text-center"><?php echo $bgb_rendah_pintu_jendela ?></td>
				<td class="text-center"><?php echo $bgb_sedang_pintu_jendela ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_pintu_jendela ?></td>
			</tr>
			<tr>
				<th class="text-center">LANTAI</th>
				<td class="text-center"><?php echo $rt_sederhana_lantai_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_lantai_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_lantai_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_lantai_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_lantai_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_lantai_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_lantai_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_lantai_2lt ?></td>
				<td class="text-center"><?php echo $bp_lantai ?></td>
				<td class="text-center"><?php echo $gudang_lantai ?></td>
				<td class="text-center"><?php echo $bgb_rendah_lantai ?></td>
				<td class="text-center"><?php echo $bgb_sedang_lantai ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_lantai ?></td>
			</tr>
			<tr>
				<th class="text-center">UTILITAS</th>
				<td class="text-center"><?php echo $rt_sederhana_utilitas_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_utilitas_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_utilitas_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_utilitas_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_utilitas_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_utilitas_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_utilitas_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_utilitas_2lt ?></td>
				<td class="text-center"><?php echo $bp_utilitas ?></td>
				<td class="text-center"><?php echo $gudang_utilitas ?></td>
				<td class="text-center"><?php echo $bgb_rendah_utilitas ?></td>
				<td class="text-center"><?php echo $bgb_sedang_utilitas ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_utilitas ?></td>
			</tr>
			<tr>
				<th class="text-left success">TOTAL BIAYA LANGSUNG (A)</th>
				<td class="text-center success">
					<?php
						$rt_sederhana_tbl_a1 = array($rt_sederhana_pondasi_1lt + $rt_sederhana_struktur_1lt + $rt_sederhana_rangka_atap_1lt + $rt_sederhana_penutup_atap_1lt + $rt_sederhana_plafond_1lt + $rt_sederhana_dinding_1lt + $rt_sederhana_pintu_jendela_1lt + $rt_sederhana_lantai_1lt + $rt_sederhana_utilitas_1lt);
						echo "". array_sum($rt_sederhana_tbl_a1) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_menengah_tbl_a1 = array($rt_menengah_pondasi_1lt + $rt_menengah_struktur_1lt + $rt_menengah_rangka_atap_1lt + $rt_menengah_penutup_atap_1lt + $rt_menengah_plafond_1lt + $rt_menengah_dinding_1lt + $rt_menengah_pintu_jendela_1lt + $rt_menengah_lantai_1lt + $rt_menengah_utilitas_1lt);
						echo "". array_sum($rt_menengah_tbl_a1) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_mewah_tbl_a1 = array($rt_mewah_pondasi_1lt + $rt_mewah_struktur_1lt + $rt_mewah_rangka_atap_1lt + $rt_mewah_penutup_atap_1lt + $rt_mewah_plafond_1lt + $rt_mewah_dinding_1lt + $rt_mewah_pintu_jendela_1lt + $rt_mewah_lantai_1lt + $rt_mewah_utilitas_1lt);
						echo "". array_sum($rt_mewah_tbl_a1) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_ekslusif_tbl_a1 = array($rt_ekslusif_pondasi_1lt + $rt_ekslusif_struktur_1lt + $rt_ekslusif_rangka_atap_1lt + $rt_ekslusif_penutup_atap_1lt + $rt_ekslusif_plafond_1lt + $rt_ekslusif_dinding_1lt + $rt_ekslusif_pintu_jendela_1lt + $rt_ekslusif_lantai_1lt + $rt_ekslusif_utilitas_1lt);
						echo "". array_sum($rt_ekslusif_tbl_a1) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_sederhana_tbl_a2 = array($rt_sederhana_pondasi_2lt + $rt_sederhana_struktur_2lt + $rt_sederhana_rangka_atap_2lt + $rt_sederhana_penutup_atap_2lt + $rt_sederhana_plafond_2lt + $rt_sederhana_dinding_2lt + $rt_sederhana_pintu_jendela_2lt + $rt_sederhana_lantai_2lt + $rt_sederhana_utilitas_2lt);
						echo "". array_sum($rt_sederhana_tbl_a2) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_menengah_tbl_a2 = array($rt_menengah_pondasi_2lt + $rt_menengah_struktur_2lt + $rt_menengah_rangka_atap_2lt + $rt_menengah_penutup_atap_2lt + $rt_menengah_plafond_2lt + $rt_menengah_dinding_2lt + $rt_menengah_pintu_jendela_2lt + $rt_menengah_lantai_2lt + $rt_menengah_utilitas_2lt);
						echo "". array_sum($rt_menengah_tbl_a2) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_mewah_tbl_a2 = array($rt_mewah_pondasi_2lt + $rt_mewah_struktur_2lt + $rt_mewah_rangka_atap_2lt + $rt_mewah_penutup_atap_2lt + $rt_mewah_plafond_2lt + $rt_mewah_dinding_2lt + $rt_mewah_pintu_jendela_2lt + $rt_mewah_lantai_2lt + $rt_mewah_utilitas_2lt);
						echo "". array_sum($rt_mewah_tbl_a2) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$rt_ekslusif_tbl_a2 = array($rt_ekslusif_pondasi_2lt + $rt_ekslusif_struktur_2lt + $rt_ekslusif_rangka_atap_2lt + $rt_ekslusif_penutup_atap_2lt + $rt_ekslusif_plafond_2lt + $rt_ekslusif_dinding_2lt + $rt_ekslusif_pintu_jendela_2lt + $rt_ekslusif_lantai_2lt + $rt_ekslusif_utilitas_2lt);
						echo "". array_sum($rt_ekslusif_tbl_a2) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$bp_tbl_a = array($bp_pondasi + $bp_struktur + $bp_rangka_atap + $bp_penutup_atap + $bp_plafond + $bp_dinding + $bp_pintu_jendela + $bp_lantai + $bp_utilitas);
						echo "". array_sum($bp_tbl_a) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$gudang_tbl_a = array($gudang_pondasi + $gudang_struktur + $gudang_rangka_atap + $gudang_penutup_atap + $gudang_dinding + $gudang_pintu_jendela + $gudang_lantai + $gudang_utilitas);
						echo "". array_sum($gudang_tbl_a) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$bgb_rendah_tbl_a = array($bgb_rendah_pondasi + $bgb_rendah_struktur + $bgb_rendah_penutup_atap + $bgb_rendah_plafond + $bgb_rendah_dinding + $bgb_rendah_pintu_jendela + $bgb_rendah_lantai + $bgb_rendah_utilitas);
						echo "". array_sum($bgb_rendah_tbl_a) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$bgb_sedang_tbl_a = array($bgb_sedang_pondasi + $bgb_sedang_struktur + $bgb_sedang_penutup_atap + $bgb_sedang_plafond + $bgb_sedang_dinding + $bgb_sedang_pintu_jendela + $bgb_sedang_lantai + $bgb_sedang_utilitas);
						echo "". array_sum($bgb_sedang_tbl_a) . "\n";
					?>
				</td>
				<td class="text-center success">
					<?php
						$bgb_tinggi_tbl_a = array($bgb_tinggi_pondasi + $bgb_tinggi_struktur + $bgb_tinggi_penutup_atap + $bgb_tinggi_plafond + $bgb_tinggi_dinding + $bgb_tinggi_pintu_jendela + $bgb_tinggi_lantai + $bgb_tinggi_utilitas);
						echo "". array_sum($bgb_tinggi_tbl_a) . "\n";
					?>
				</td>
			</tr>
			<tr>
				<th class="text-left">B. BIAYA TIDAK LANGSUNG</th>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
			</tr>
			<tr>
				<th class="text-center">PROFESIONAL FEE</th>
				<td class="text-center"><?php echo $rt_sederhana_profesional_fee_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_profesional_fee_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_profesional_fee_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_profesional_fee_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_profesional_fee_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_profesional_fee_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_profesional_fee_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_profesional_fee_2lt ?></td>
				<td class="text-center"><?php echo $bp_profesional_fee ?></td>
				<td class="text-center"><?php echo $gudang_profesional_fee ?></td>
				<td class="text-center"><?php echo $bgb_rendah_profesional_fee ?></td>
				<td class="text-center"><?php echo $bgb_sedang_profesional_fee ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_profesional_fee ?></td>
			</tr>
			<tr>
				<th class="text-center">BIAYA PERIJINAN</th>
				<td class="text-center"><?php echo $rt_sederhana_biaya_perijinan_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_biaya_perijinan_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_biaya_perijinan_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_biaya_perijinan_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_biaya_perijinan_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_biaya_perijinan_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_biaya_perijinan_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_biaya_perijinan_2lt ?></td>
				<td class="text-center"><?php echo $bp_biaya_perijinan ?></td>
				<td class="text-center"><?php echo $gudang_biaya_perijinan ?></td>
				<td class="text-center"><?php echo $bgb_rendah_biaya_perijinan ?></td>
				<td class="text-center"><?php echo $bgb_sedang_biaya_perijinan ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_biaya_perijinan ?></td>
			</tr>
			<tr>
				<th class="text-center">KEUNTUNGAN KONTRAKTOR</th>
				<td class="text-center"><?php echo $rt_sederhana_keuntungan_kontraktor_1lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_keuntungan_kontraktor_1lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_keuntungan_kontraktor_1lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_keuntungan_kontraktor_1lt ?></td>
				<td class="text-center"><?php echo $rt_sederhana_keuntungan_kontraktor_2lt ?></td>
				<td class="text-center"><?php echo $rt_menengah_keuntungan_kontraktor_2lt ?></td>
				<td class="text-center"><?php echo $rt_mewah_keuntungan_kontraktor_2lt ?></td>
				<td class="text-center"><?php echo $rt_ekslusif_keuntungan_kontraktor_2lt ?></td>
				<td class="text-center"><?php echo $bp_keuntungan_kontraktor ?></td>
				<td class="text-center"><?php echo $gudang_keuntungan_kontraktor ?></td>
				<td class="text-center"><?php echo $bgb_rendah_keuntungan_kontraktor ?></td>
				<td class="text-center"><?php echo $bgb_sedang_keuntungan_kontraktor ?></td>
				<td class="text-center"><?php echo $bgb_tinggi_keuntungan_kontraktor ?></td>
			</tr>
			<tr>
				<th class="text-left">TOTAL BIAYA TIDAK LANGSUNG (B)</th>
				<td class="text-center">
					<?php
					$rt_sederhana_tbl_b1 = array($rt_sederhana_profesional_fee_1lt + $rt_sederhana_biaya_perijinan_1lt + $rt_sederhana_keuntungan_kontraktor_1lt);
						echo "". array_sum($rt_sederhana_tbl_b1) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_menengah_tbl_b1 = array($rt_menengah_profesional_fee_1lt + $rt_menengah_biaya_perijinan_1lt + $rt_menengah_keuntungan_kontraktor_1lt);
						echo "". array_sum($rt_menengah_tbl_b1) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_mewah_tbl_b1 = array($rt_mewah_profesional_fee_1lt + $rt_mewah_biaya_perijinan_1lt + $rt_mewah_keuntungan_kontraktor_1lt);
						echo "". array_sum($rt_mewah_tbl_b1) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_ekslusif_tbl_b1 = array($rt_ekslusif_profesional_fee_1lt + $rt_ekslusif_biaya_perijinan_1lt + $rt_ekslusif_keuntungan_kontraktor_1lt);
						echo "". array_sum($rt_ekslusif_tbl_b1) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_sederhana_tbl_b2 = array($rt_sederhana_profesional_fee_2lt + $rt_sederhana_biaya_perijinan_2lt + $rt_sederhana_keuntungan_kontraktor_2lt);
						echo "". array_sum($rt_sederhana_tbl_b2) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_menengah_tbl_b2 = array($rt_menengah_profesional_fee_2lt + $rt_menengah_biaya_perijinan_2lt + $rt_menengah_keuntungan_kontraktor_2lt);
						echo "". array_sum($rt_menengah_tbl_b2) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_mewah_tbl_b2 = array($rt_mewah_profesional_fee_2lt + $rt_mewah_biaya_perijinan_2lt + $rt_mewah_keuntungan_kontraktor_2lt);
						echo "". array_sum($rt_mewah_tbl_b2) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$rt_ekslusif_tbl_b2 = array($rt_ekslusif_profesional_fee_2lt + $rt_ekslusif_biaya_perijinan_2lt + $rt_ekslusif_keuntungan_kontraktor_2lt);
						echo "". array_sum($rt_ekslusif_tbl_b2) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$bp_tbl_b = array($bp_profesional_fee + $bp_biaya_perijinan + $bp_keuntungan_kontraktor);
						echo "". array_sum($bp_tbl_b) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$gudang_tbl_b = array($gudang_profesional_fee + $gudang_biaya_perijinan + $gudang_keuntungan_kontraktor);
						echo "". array_sum($gudang_tbl_b) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$bgb_rendah_tbl_b = array($bgb_rendah_profesional_fee + $bgb_rendah_biaya_perijinan + $bgb_rendah_keuntungan_kontraktor);
						echo "". array_sum($bgb_rendah_tbl_b) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$bgb_sedang_tbl_b = array($bgb_sedang_profesional_fee + $bgb_sedang_biaya_perijinan + $bgb_sedang_keuntungan_kontraktor);
						echo "". array_sum($bgb_sedang_tbl_b) . "\n";
					?>
				</td>
				<td class="text-center">
					<?php
					$bgb_tinggi_tbl_b = array($bgb_tinggi_profesional_fee + $bgb_tinggi_biaya_perijinan + $bgb_tinggi_keuntungan_kontraktor);
						echo "". array_sum($bgb_tinggi_tbl_b) . "\n";
					?>
				</td>
			</tr>
			<tr>
				<th class="text-left">TOTAL BIAYA PEMBANGUNAN BARU (A+B)</th>
				<td class="text-center">
					<?php
					$rt_1lt_tbpb_sederhana = array();
					echo "". array_sum($rt_sederhana_tbl_a1 + $rt_sederhana_tbl_b1) . "\n";
					?> 
				</td>
				<td class="text-center">
					<?php
					$rt_1lt_tbpb_menengah = array();
					echo "". array_sum($rt_menengah_tbl_a1 + $rt_menengah_tbl_b1) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$rt_1lt_tbpb_mewah = array();
					echo "". array_sum($rt_mewah_tbl_a1 + $rt_mewah_tbl_b1) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$rt_1lt_tbpb_ekslusif = array();
					echo "". array_sum($rt_ekslusif_tbl_a1 + $rt_ekslusif_tbl_b1) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$rt_2lt_tbpb_sederhana = array();
					echo "". array_sum($rt_sederhana_tbl_a2 + $rt_sederhana_tbl_b2) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$rt_2lt_tbpb_menengah = array();
					echo "". array_sum($rt_menengah_tbl_a2 + $rt_menengah_tbl_b2) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$rt_2lt_tbpb_mewah = array();
					echo "". array_sum($rt_mewah_tbl_a2 + $rt_mewah_tbl_b2) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$rt_2lt_tbpb_ekslusif = array();
					echo "". array_sum($rt_ekslusif_tbl_a2 + $rt_ekslusif_tbl_b2) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$bp_tbpb_ = array();
					echo "". array_sum($bp_tbl_a + $bp_tbl_b) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$gudang_tbpb = array();
					echo "". array_sum($gudang_tbl_a + $gudang_tbl_b) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$bgb_rendah_tbpb = array();
					echo "". array_sum($bgb_rendah_tbl_a + $bgb_rendah_tbl_b) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$bgb_sedang_tbpb = array();
					echo "". array_sum($bgb_sedang_tbl_a + $bgb_sedang_tbl_b) . "\n";
					?>
				</td>
				<td class="col-sm-1 text-center">
					<?php
					$bgb_tinggi_tbpb = array();
					echo "". array_sum($bgb_tinggi_tbl_a + $bgb_tinggi_tbl_b) . "\n";
					?>
				</td>
			</tr>
			<tr>
				<th colspan="14"></th>
			</tr>
			<tr class="active">
				<td class="text-center"><b>PEMBULATAN<b></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
				<td class="text-center"></td>
			</tr>
				<?php
					}
						} else{
							echo '<tr><td colspan="10">Data tidak tersedia.</td></tr>';
						}
				?>
					
					</select>
				</table>
			</tbody>
		</thead>
	</div>
</div>
