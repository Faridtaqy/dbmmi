<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/adjustment_lib.php');
    require_once(FCPATH.'/library/db_utility_lib.php');
    
	$adjustment_lib = new adjustment_lib;

    $get_person_name = (isset($_GET['person_name']))?base64_decode($_GET['person_name']):'undefined';
    $get_nama_debitur = (isset($_GET['nama_debitur']))?base64_decode($_GET['nama_debitur']):'undefined';
    $get_client_appraisal_date = (isset($_GET['client_appraisal_date']))?base64_decode($_GET['client_appraisal_date']):'undefined';

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

?>
<div class="container">
    <table class="table">
        <tr>
            <th class="col-md-1"></th>
            <th class="col-md-1"></th>
            <th class="col-md-2 text-center ">
                
                <!-- Trigger the modal with a button -->
                <button style="font-size: 12px;" type="button" class="btn btn-info btn-md-2 table-bordered" id="myBtn3" data-toggle="modal" data-target="#myModal">Tampilkan Data</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Search</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered col-md">
                            <tr>
                                <th>
                                    <input class="form-control" type="text" name="person_name" placeholder="Nama Surveyor" value="<?php echo (isset($_POST['person_name']) AND trim($_POST['person_name'])!='')?$_POST['person_name']:''; ?>">
                                </th>
                                <th>
                                    <input class="form-control" type="text" name="nama_debitur" placeholder="Nama Debitur" value="<?php echo (isset($_POST['person_name']) AND trim($_POST['person_name'])!='')?$_POST['person_name']:''; ?>">
                                </th>
                                <th>
                                    <input class="form-control datepicker" type="text" name="tanggal_penilaian" data-date-format="yyyy/mm/dd" placeholder="Tanggal Penilaian" value="<?php echo (isset($_POST['tanggal_penilaian']) AND trim($_POST['tanggal_penilaian'])!='')?$_POST['tanggal_penilaian']:''; ?>">
                                </th>
                                <th class="text-center">
                                    <input class="btn btn-primary btn-md" type="submit" name="search" value="Cari">
                                    <button class="btn btn-success btn-md" onclick="printData(); return false">Print</button>
                                </th>

                            </tr>
                        </table>
                        <div class="rows">
                            <div class="panel">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hovered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Surveyor</th>
                                                <th class="text-center">Nama Debitur</th>
                                                <th class="text-center">Tanggal Penugasan</th>
                                                <th class="text-center">Select</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if (!empty($adjustment_lib->get_report_data_adjustment())) {
                                                    foreach ($adjustment_lib->get_report_data_adjustment() as $row_arr) {
                                                        foreach ($row_arr as $key => $value) {
                                                            ${$key}=$value;
                                                        }

                                            ?>
                                                <tr>
                                                    <td><?php echo $person_name; ?></td>
                                                    <td><?php echo (isset($nama_debitur))?$nama_debitur:'-'; ?></td>
                                                    <td><?php echo date('d F Y', strtotime((isset($client_appraisal_date)?$client_appraisal_date:date('Y-m-d')))); ?></td>
                                                    <td class="text-center"><button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=adjustment&person_name='.base64_encode($person_name).'&nama_debitur='.base64_encode($nama_debitur).'&client_appraisal_date='.base64_encode($client_appraisal_date); ?>', '_self'); return false;">Pilih</button></td>
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
                      
                   
            </th>
            <td>
                <center><button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=adjustment&method=banding1_add'; ?>', '_self'); return false;">Data Banding 1</button></center>
            </td>
            <td>
                <center><button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=adjustment&method=banding2_add'; ?>', '_self'); return false;">Data Banding 2</button><center>
            </td>
            <td>
                <center><button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=adjustment&method=banding3_add'; ?>', '_self'); return false;">Data Banding 3</button><center>
            </td>
            <th class="col-md-1"></th>
            <th class="col-md-1"></th>
        </tr>
    </table>
</div>
<div class="row table-hover">
    <div class="col-md-12 text-center">
        <h1 class="table" style="font-size: 20px";><b>PERHITUNGAN NILAI PASAR TANAH</b></h1>
        <h3 class="table" style="font-size: 20px";><b>DENGAN PENYESUAIAN PERBANDINGAN DATA TANAH</b></h3>
    </div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
    <div class="col-md-12">
        <div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
    </div>
</div>
<div class="container">
    <div class="rows">
        <div class="panel">
            <table>
                <thead>
                    <tbody>
                    
                    <tr>
                        <th class="col-md-1" style="border-bottom-color: white;"></th>
                        <th class="text-left col-md-2">No. Laporan</th>
                        <th class="text-left col-md-10" colspan="8">008/MMI-JKTMR/BTN-CPTT/KGU-I/I/2016</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th class="col-md-1">Nama Penilai / Surveyor</th>
                        <th class="col-md-1" colspan="8"><? echo(isset($person_name)) ?></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th class="col-md-1">Tanggal Survey</th>
                        <th class="col-md-1" colspan="8">Tanggal</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th class="col-md-1">Nama Calon Debitur</th>
                        <th class="col-md-1" colspan="8">DIAH AYU SUSIANTINI</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th class="col-md-1">Lokasi</th>
                        <th class="col-md-2" colspan="2">Kelurahan Jombang</th>
                        <th class="col-md-2" colspan="2">Kecamatan Ciputat</th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1" colspan="6"></th>
                        
                    </tr>
                    <tr>
                        
                        <th class="col-md-1" colspan="2"></th>
                        <th class="col-md-1" colspan="2">Kota Tanggerang Selatan</th>
                        <th class="col-md-2">Provinsi Banten</th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1" colspan="6"></th>
                        
                    </tr>
                    <tr>
                        <th class="col-md-1" colspan="2"></th>
                        <th class="col-md-1">Kodepos</th>
                        <th class="col-md-1">15414</th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1"></th>
                        <th class="col-md"></th>
                        <th class="col-md"></th>
                        <th class="col-md"></th>
                    </tr>

                </tbody>
                </thead>
            </table> 
            <table>
                <tr>
                    <th><br><br></th>
                </tr>
            </table>   
        </div>
    </div>
</div>

<div class="container">
    <div class="panel-border">
    <table class="table table-bordered">
        <thead>
            <tbody>
                <?php 
                    if (!empty($adjustment_lib->get_data_adjustment($get_person_name))) {
                        $no=0;
                    foreach ($adjustment_lib->get_data_adjustment() as $row_arr) {
                        foreach ($row_arr as $key => $value) {
                            ${$key}=$value;
                        }
                        $no++;

                        $base_adjustment_dokumen_tanah_arr = $adjustment_lib->base_adjustment_dokumen_tanah();
                        $base_adjustment_bentuk_tanah_arr = $adjustment_lib->base_adjustment_bentuk_tanah();
                        $base_adjustment_topografi_arr = $adjustment_lib->base_adjustment_topografi();
                        $base_adjustment_peruntukan_arr = $adjustment_lib->base_adjustment_peruntukan();
                        $base_adjustment_kondisi_lahan_arr = $adjustment_lib->base_adjustment_kondisi_lahan();
                        $base_adjustment_kepadatan_bangunan_arr = $adjustment_lib->base_adjustment_kepadatan_bangunan();
                        $base_adjustment_letak_tanah_arr = $adjustment_lib->base_adjustment_letak_tanah();
                        $base_adjustment_jenis_properti_arr = $adjustment_lib->base_adjustment_jenis_properti();
                        $base_adjustment_keterangan_arr = $adjustment_lib->base_adjustment_keterangan();
                ?>           
            <tr>
                <th class="text-center col-md-3" colspan="2" rowspan="2">URAIAN</th>
                <th class="text-center" rowspan="2">OBYEK PENILAIAN</th>
                <th class="text-center">Data #1</th>
                <th class="text-center">Data #2</th>
                <th class="text-center">Data #3</th>
            </tr>
            <tr>
                <td class="text-center"><i>Penawaran</i></td>
                <td class="text-center"><i>Penawaran</i></td>
                <td class="text-center"><i>Penawaran</i></td>
            </tr>
            <tr>
                <th class="text-center">1</td>
                <td class="text-left">Jenis Properti</td>
                <th class="text-center">Rumah Rumahan</th>
                <th class="text-center">
                    <?php echo $base_adjustment_jenis_properti_arr[$banding1_jenis_properti]; ?>
                </th>
                <th class="text-center">
                    <?php echo $base_adjustment_jenis_properti_arr[$banding2_jenis_properti]; ?>
                </th>
                <th class="text-center">
                    <?php echo $base_adjustment_jenis_properti_arr[$banding3_jenis_properti]; ?>
                </th>
            </tr>
            <tr>
                <th class="text-center">2</th>
                <td class="text-left">Alamat</td>
                <td class="text-center">The Akasia Serenity, Blok B 08</td>
                <td class="text-center"><?php echo $banding1_alamat ?> , <?php echo $banding1_blok_no ?></td>
                <td class="text-center"><?php echo $banding2_alamat ?> , <?php echo $banding2_blok_no ?></td>
                <td class="text-center"><?php echo $banding3_alamat ?> , <?php echo $banding3_blok_no ?></td>
            </tr>
            <tr>
                <th class="text-center"></th>
                <td class="text-center"></td>
                <td class="text-center">Kelurahan Jombang - Kecamatan Ciputat</td>
                <td class="text-center"><?php echo $banding1_kelurahan ?> , <?php echo $banding1_kecamatan ?></td>
                <td class="text-center"><?php echo $banding2_kelurahan ?> , <?php echo $banding2_kecamatan ?></td>
                <td class="text-center"><?php echo $banding3_kelurahan ?> , <?php echo $banding3_kecamatan ?></td>
            </tr>
            <tr>
                <th class="text-center"></th>
                <td class="text-center"></td>
                <td class="text-center">Kota Tanggerang Selatan - Provinsi Banten</td>
                <td class="text-center"><?php echo $banding1_kota ?> , <?php echo $banding1_provinsi ?></td>
                <td class="text-center"><?php echo $banding2_kota ?> , <?php echo $banding2_provinsi ?></td>
                <td class="text-center"><?php echo $banding3_kota ?> , <?php echo $banding3_provinsi ?></td>
            </tr>
            <tr>
                <th class="text-center">3</th>
                <td class="text-left">Jarak Pembanding Dengan Properti</td>
                <td class="text-center"></td>
                <td class="text-center"><?php echo $banding1_jarak_dengan_aset ?></td>
                <td class="text-center"><?php echo $banding2_jarak_dengan_aset ?></td>
                <td class="text-center"><?php echo $banding3_jarak_dengan_aset ?></td>
            </tr>
            <tr>
                <th class="text-center">4</th>
                <td class="text-left">Sumber Data</td>
                <td class="text-center"></td>
                <td class="text-center"><?php echo $banding1_nama ?></td>
                <td class="text-center"><?php echo $banding2_nama ?></td>
                <td class="text-center"><?php echo $banding3_nama ?></td>
            </tr>
            <tr>
                <th class="text-center">5</th>
                <td class="text-left">Nomor Kontak</td>
                <td class="text-center"></td>
                <td class="text-center"><?php echo $banding1_telepon ?></td>
                <td class="text-center"><?php echo $banding2_telepon ?></td>
                <td class="text-center"><?php echo $banding3_telepon ?></td>
            </tr>
            <tr>
                <th class="text-center">6</th>
                <td class="text-left">Keterangan</td>
                <td class="text-center"></td>
                <td class="text-center">
                    <?php echo $base_adjustment_keterangan_arr[$banding1_keterangan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_keterangan_arr[$banding2_keterangan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_keterangan_arr[$banding3_keterangan]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">7</th>
                <td class="text-left">Penawaran / Transaksi</td>
                <td class="text-center"></td>
                <th class="text-center">Rp <?php echo $banding1_nilai_penawaran ?></th>
                <th class="text-center">Rp <?php echo $banding2_nilai_penawaran ?></th>
                <th class="text-center">Rp <?php echo $banding3_nilai_penawaran ?></th>
            </tr>
            <tr>
                <th class="text-center">8</th>
                <td class="text-left">Waktu Penawaran / Transaksi</td>
                <td class="text-center"></td>
                <td class="text-center"><?php echo date('d F Y', strtotime($banding1_tanggal_penawaran)); ?></td>
                <td class="text-center"><?php echo date('d F Y', strtotime($banding2_tanggal_penawaran)); ?></td>
                <td class="text-center"><?php echo date('d F Y', strtotime($banding3_tanggal_penawaran)); ?></td>
            </tr>
            <tr>
                <th class="text-center">#</th>
                <td class="text-left">Discount</td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr>
                <th class="text-center" colspan="2">SPESIFIKASI DATA</th>
                <th class="text-center" colspan="4"></th>
            </tr>
            <tr>
                <th class="text-center">1</th>
                <td class="text-left">Dokumen Tanah</td>
                <th class="text-center">Sertifikat Hak Guna Bangun</th>
                <th class="text-center">
                    <?php echo $base_adjustment_dokumen_tanah_arr[$banding1_jenis_properti]; ?>
                </th>
                <th class="text-center">
                    <?php echo $base_adjustment_dokumen_tanah_arr[$banding2_jenis_properti]; ?>
                </th>
                <th class="text-center">
                    <?php echo $base_adjustment_dokumen_tanah_arr[$banding3_jenis_properti]; ?>
                </th>
            </tr>
            <tr>
                <th class="text-center">2</th>
                <td class="text-left">Luas Tanah</td>
                <td class="text-center">129.00</td>
                <td class="text-center"><?php echo $banding1_luas_tanah ?></td>
                <td class="text-center"><?php echo $banding2_luas_tanah ?></td>
                <td class="text-center"><?php echo $banding3_luas_tanah ?></td>
            </tr>
            <tr>
                <th class="text-center">3</th>
                <td class="text-left">Bentuk Tanah</td>
                <td class="text-center">Beraturan</td>
                <td class="text-center">
                    <?php echo $base_adjustment_bentuk_tanah_arr[$banding1_bentuk_tanah]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_bentuk_tanah_arr[$banding2_bentuk_tanah]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_bentuk_tanah_arr[$banding3_bentuk_tanah]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">4</th>
                <td class="text-left">Lebar Depan, Frontage (m)</td>
                <th class="text-center">8.00</th>
                <td class="text-center"><?php echo $banding1_frontage ?></td>
                <td class="text-center"><?php echo $banding2_frontage ?></td>
                <td class="text-center"><?php echo $banding3_frontage ?></td>
            </tr>
            <tr>
                <th class="text-center">5</th>
                <td class="text-left">Lebar Jalan (m)</td>
                <td class="text-center">5.00</td>
                <td class="text-center"><?php echo $banding1_lebar_jalan ?></td>
                <td class="text-center"><?php echo $banding2_lebar_jalan ?></td>
                <td class="text-center"><?php echo $banding3_lebar_jalan ?></td>
            </tr>
            <tr>
                <th class="text-center">6</th>
                <td class="text-left">Letak Tanah</td>
                <td class="text-center">Tengah</td>
                <td class="text-center">
                    <?php echo $base_adjustment_letak_tanah_arr[$banding1_letak_tanah]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_letak_tanah_arr[$banding2_letak_tanah]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_letak_tanah_arr[$banding3_letak_tanah]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">7</th>
                <td class="text-left">Kondisi Lahan</td>
                <td class="text-center">Rata</td>
                <td class="text-center">
                    <?php echo $base_adjustment_kondisi_lahan_arr[$banding1_kondisi_lahan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_kondisi_lahan_arr[$banding2_kondisi_lahan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_kondisi_lahan_arr[$banding3_kondisi_lahan]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">8</th>
                <td class="text-left">Peruntukan</td>
                <td class="text-center">Perumahan Hunian (wbs / Wsd / Wkc)</td>
                <td class="text-center">
                    <?php echo $base_adjustment_peruntukan_arr[$banding1_peruntukan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_peruntukan_arr[$banding2_peruntukan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_peruntukan_arr[$banding3_peruntukan]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">9</th>
                <td class="text-left">Kontur Tanah / Topografi</td>
                <td class="text-center">Datar</td>
                <td class="text-center">
                    <?php echo $base_adjustment_topografi_arr[$banding1_kontur_tanah]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_topografi_arr[$banding2_kontur_tanah]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_topografi_arr[$banding3_kontur_tanah]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">10</th>
                <td class="text-left">Kepadatan Bangunan</td>
                <td class="text-center">Tinggi</td>
                <td class="text-center">
                    <?php echo $base_adjustment_kepadatan_bangunan_arr[$banding1_kepadatan_bangunan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_kepadatan_bangunan_arr[$banding2_kepadatan_bangunan]; ?>
                </td>
                <td class="text-center">
                    <?php echo $base_adjustment_kepadatan_bangunan_arr[$banding3_kepadatan_bangunan]; ?>
                </td>
            </tr>
            <tr>
                <th class="text-center">11</th>
                <td class="text-left">Elevasi</td>
                <td class="text-center">0.10</td>
                <td class="text-center"><?php echo $banding1_elevasi ?></td>
                <td class="text-center"><?php echo $banding2_elevasi ?></td>
                <td class="text-center"><?php echo $banding3_elevasi ?></td>
            </tr>
            <tr>
                <th class="text-center">12</th>
                <td class="text-left">Indikasi Nilai Properti</td>
                <td class="text-center">Rp 1,805,100,000</td>
                <td class="text-center">Rp 1,392,300,000</td>
                <td class="text-center">Rp 1,441,721,120</td>
                <td class="text-center">Rp 1,434,365,400</td>
            </tr>
            <tr>
                <th class="text-center">13</th>
                <td class="text-left">Luas Bangunan</td>
                <td class="text-center">69.00</td>
                <td class="text-center"><?php echo $banding1_luas_bangunan ?></td>
                <td class="text-center"><?php echo $banding2_luas_bangunan ?></td>
                <td class="text-center"><?php echo $banding3_luas_bangunan ?></td>
            </tr>
            <tr>
                <th class="text-center">14</th>
                <td class="text-left">Indikasi Nilai Pasar Bangunan / m2</td>
                <td class="text-center"></td>
                <td class="text-center">Rp 4,100,000</td>
                <td class="text-center">Rp 4,100,000</td>
                <td class="text-center">Rp 4,100,000</td>
            </tr>
            <tr>
                <th class="text-center">15</th>
                <td class="text-left">Indikasi Nilai Pasar Bangunan</td>
                <td class="text-center"></td>
                <td class="text-center">Rp 258,300,000</td>
                <td class="text-center">Rp 282,900,000</td>
                <td class="text-center">Rp 282,900,000</td>
            </tr>
            <tr>
                <th class="text-center">16</th>
                <td class="text-left">Indikasi Nilai Tanah</td>
                <th class="text-center">???</th>
                <td class="text-center">Rp 1,134,000,000</td>
                <td class="text-center">Rp 1,158,821,120</td>
                <td class="text-center">Rp 1,151,465,400</td>
            </tr>
            <tr>
                <th class="text-center" colspan="2">Indikasi Nilai Tanah / m2</th>
                <th class="text-center">???</th>
                <th class="text-center"> Rp
                    <?php
                        $nilaitanah1 = array(1,134,000,000/91.00);
                        echo "". array_sum($nilaitanah1) . "\n";
                    ?>
                </th>
                <th class="text-center"> Rp
                    <?php
                        $nilaitanah2 = array(1158821120/101);
                        echo "". array_sum($nilaitanah2) . "\n";
                    ?> 
                </th>
                <th class="text-center">
                    <?php
                        $nilaitanah3 = array(1151465400/97);
                        echo "". array_sum($nilaitanah3) . "\n";
                        echo round($nilaitanah3, -1);
                    ?>
                </th>
            </tr>
           
        </thead>
    </table>
        <table>
            <tr>
                <th class="col-md-3"></th>
                <th class="col-md-2"></th>
                <th class="col-md-1"></th>
                <th class="col-md"></th>
                <th class="col-md-1"></th>
                <th class="col-md-1"></th>
                <th class="col-md-1">- 38.0</th>
                <th class="col-md-1">- 0.76</th>
                <th class="col-md-1"></th>
                <th class="col-md-1">-28.00</th>
                <th class="col-md-1">-0.56</th>
                <th class="col-md-1"></th>
                <th class="col-md-1"></th>
                <th class="col-md-1"></th>
                <th class="col-md-1">-32.0</th>
                <th class="col-md-1">-0.64</th>
                <th class="col-md-1"></th>
                <th class="col-md"></th>
            </tr>
            <?php
                                                    }
                                                }
                                                ?>
    </table>
    <table>
            <tr>
                <th><br></th>
            </tr>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center col-md-3" colspan="2">PENYELESAIAN</th>
                
            </tr>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center col-md-3">Faktor Penyesuaian</th>
                <th class="text-center col-md-2">Objek Property</th>
                <th class="text-center">No</th>
                <th class="text-center col-md-1">%</th>
                <th class="text-center col-md-1">(Rp)</th>
                <th class="text-center">No</th>
                <th class="text-center col-md-1">%</th>
                <th class="text-center col-md-1">(Rp)</th>
                <th class="text-center">No</th>
                <th class="text-center col-md-1">%</th>
                <th class="text-center col-md-1">(Rp)</th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td class="text-left">Lokasi</td>
                <td class="text-center"></td>
                <td class="text-center">1</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_objek1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_objek1']) AND trim($_POST['persentase_objek1'])==$key)?'selected':((isset($detail_arr['persentase_objek1']) AND trim($detail_arr['persentase_objek1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">1</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_objek2">
                        <option value="">0%</option>
                            <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_objek2']) AND trim($_POST['persentase_objek2'])==$key)?'selected':((isset($detail_arr['persentase_objek2']) AND trim($detail_arr['persentase_objek2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>   
                </td>
                <td class="text-right">-</td>
                <td class="text-center">1</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_objek3">
                        <option value="">0%</option>
                            <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_objek3']) AND trim($_POST['persentase_objek3'])==$key)?'selected':((isset($detail_arr['persentase_objek3']) AND trim($detail_arr['persentase_objek3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td class="text-Left">Dokument Tanah</td>
                <td class="text-center"></td>
                <td class="text-center">2</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_dokumen_tanah_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_dokument_tanah_1']) AND trim($_POST['persentase_dokument_tanah_1'])==$key)?'selected':((isset($detail_arr['persentase_dokument_tanah_1']) AND trim($detail_arr['persentase_dokument_tanah_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">2</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_dokumen_tanah_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_dokument_tanah_2']) AND trim($_POST['persentase_dokument_tanah_2'])==$key)?'selected':((isset($detail_arr['persentase_dokument_tanah_2']) AND trim($detail_arr['persentase_dokument_tanah_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">2</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_dokumen_tanah_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_dokument_tanah_3']) AND trim($_POST['persentase_dokument_tanah_3'])==$key)?'selected':((isset($detail_arr['persentase_dokument_tanah_3']) AND trim($detail_arr['persentase_dokument_tanah_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td class="text-Left">Luas Tanah</td>
                <td class="text-center"></td>
                <td class="text-center">3</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_luas_tanah_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_luas_tanah_1']) AND trim($_POST['persentase_luas_tanah_1'])==$key)?'selected':((isset($detail_arr['persentase_luas_tanah_1']) AND trim($detail_arr['persentase_luas_tanah_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">(94,708)</td>
                <td class="text-center">3</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_luas_tanah_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_luas_tanah_2']) AND trim($_POST['persentase_luas_tanah_2'])==$key)?'selected':((isset($detail_arr['persentase_luas_tanah_2']) AND trim($detail_arr['persentase_luas_tanah_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">(64,251)</td>
                <td class="text-center">3</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_luas_tanah_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_luas_tanah_3']) AND trim($_POST['persentase_luas_tanah_3'])==$key)?'selected':((isset($detail_arr['persentase_luas_tanah_3']) AND trim($detail_arr['persentase_luas_tanah_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">(75,937)</td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td class="text-left">Bentuk Tanah</td>
                <td class="text-center"></td>
                <td class="text-center">4</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_bentuk_tanah_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_bentuk_tanah_1']) AND trim($_POST['persentase_bentuk_tanah_1'])==$key)?'selected':((isset($detail_arr['persentase_bentuk_tanah_1']) AND trim($detail_arr['persentase_bentuk_tanah_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">4</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_bentuk_tanah_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_bentuk_tanah_2']) AND trim($_POST['persentase_bentuk_tanah_2'])==$key)?'selected':((isset($detail_arr['persentase_bentuk_tanah_2']) AND trim($detail_arr['persentase_bentuk_tanah_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">4</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_bentuk_tanah_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_bentuk_tanah_3']) AND trim($_POST['persentase_bentuk_tanah_3'])==$key)?'selected':((isset($detail_arr['persentase_bentuk_tanah_3']) AND trim($detail_arr['persentase_bentuk_tanah_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td class="text-left">Lebar Depan (Frontage)</td>
                <td class="text-center"></td>
                <td class="text-center">5</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_frontage_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_frontage_1']) AND trim($_POST['persentase_frontage_1'])==$key)?'selected':((isset($detail_arr['persentase_frontage_1']) AND trim($detail_arr['persentase_frontage_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">5</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_frontage_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_frontage_2']) AND trim($_POST['persentase_frontage_2'])==$key)?'selected':((isset($detail_arr['persentase_frontage_2']) AND trim($detail_arr['persentase_frontage_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">5</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_frontage_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_frontage_3']) AND trim($_POST['persentase_frontage_3'])==$key)?'selected':((isset($detail_arr['persentase_frontage_3']) AND trim($detail_arr['persentase_frontage_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">6</td>
                <td class="text-left">Lebar Depan dan Kondisi Jalan (m)</td>
                <td class="text-center"></td>
                <td class="text-center">6</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_lebar_dan_kondisi_jalan_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_lebar_dan_kondisi_jalan_1']) AND trim($_POST['persentase_lebar_dan_kondisi_jalan_1'])==$key)?'selected':((isset($detail_arr['persentase_lebar_dan_kondisi_jalan_1']) AND trim($detail_arr['persentase_lebar_dan_kondisi_jalan_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">6</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_lebar_dan_kondisi_jalan_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_lebar_dan_kondisi_jalan_2']) AND trim($_POST['persentase_lebar_dan_kondisi_jalan_2'])==$key)?'selected':((isset($detail_arr['persentase_lebar_dan_kondisi_jalan_2']) AND trim($detail_arr['persentase_lebar_dan_kondisi_jalan_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">6</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_lebar_dan_kondisi_jalan_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_lebar_dan_kondisi_jalan_3']) AND trim($_POST['persentase_lebar_dan_kondisi_jalan_3'])==$key)?'selected':((isset($detail_arr['persentase_lebar_dan_kondisi_jalan_3']) AND trim($detail_arr['persentase_lebar_dan_kondisi_jalan_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">7</td>
                <td class="text-left">Posisi Aset</td>
                <td class="text-center"></td>
                <td class="text-center">7</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_posisi_aset_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_posisi_aset_1']) AND trim($_POST['persentase_posisi_aset_1'])==$key)?'selected':((isset($detail_arr['persentase_posisi_aset_1']) AND trim($detail_arr['persentase_posisi_aset_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">7</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_posisi_aset_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_posisi_aset_2']) AND trim($_POST['persentase_posisi_aset_2'])==$key)?'selected':((isset($detail_arr['persentase_posisi_aset_2']) AND trim($detail_arr['persentase_posisi_aset_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">7</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_posisi_aset_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_posisi_aset_3']) AND trim($_POST['persentase_posisi_aset_3'])==$key)?'selected':((isset($detail_arr['persentase_posisi_aset_3']) AND trim($detail_arr['persentase_posisi_aset_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">8</td>
                <td class="text-left">Fasilitas (Lebih Ke Kuantitas)</td>
                <td class="text-center"></td>
                <td class="text-center">8</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_fasilitas_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_fasilitas_1']) AND trim($_POST['persentase_fasilitas_1'])==$key)?'selected':((isset($detail_arr['persentase_fasilitas_1']) AND trim($detail_arr['persentase_fasilitas_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">8</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_fasilitas_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_fasilitas_2']) AND trim($_POST['persentase_fasilitas_2'])==$key)?'selected':((isset($detail_arr['persentase_fasilitas_2']) AND trim($detail_arr['persentase_fasilitas_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">8</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_fasilitas_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_fasilitas_3']) AND trim($_POST['persentase_fasilitas_3'])==$key)?'selected':((isset($detail_arr['persentase_fasilitas_3']) AND trim($detail_arr['persentase_fasilitas_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">9</td>
                <td class="text-left">Perkembangan Lingkungan</td>
                <td class="text-center"></td>
                <td class="text-center">9</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_perkembangan_lingkungan_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_perkembangan_lingkungan_1']) AND trim($_POST['persentase_perkembangan_lingkungan_1'])==$key)?'selected':((isset($detail_arr['persentase_perkembangan_lingkungan_1']) AND trim($detail_arr['persentase_perkembangan_lingkungan_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">9</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_perkembangan_lingkungan_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_perkembangan_lingkungan_2']) AND trim($_POST['persentase_perkembangan_lingkungan_2'])==$key)?'selected':((isset($detail_arr['persentase_perkembangan_lingkungan_2']) AND trim($detail_arr['persentase_perkembangan_lingkungan_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">9</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_perkembangan_lingkungan_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_perkembangan_lingkungan_3']) AND trim($_POST['persentase_perkembangan_lingkungan_3'])==$key)?'selected':((isset($detail_arr['persentase_perkembangan_lingkungan_3']) AND trim($detail_arr['persentase_perkembangan_lingkungan_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">10</td>
                <td class="text-left">Faktor Ekonomis</td>
                <td class="text-center"></td>
                <td class="text-center">10</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_faktor_ekonomis_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_perkembangan_faktor_ekonomis_1']) AND trim($_POST['persentase_faktor_ekonomis_1'])==$key)?'selected':((isset($detail_arr['persentase_faktor_ekonomis_1']) AND trim($detail_arr['persentase_faktor_ekonomis_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">10</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_faktor_ekonomis_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_perkembangan_faktor_ekonomis_2']) AND trim($_POST['persentase_faktor_ekonomis_2'])==$key)?'selected':((isset($detail_arr['persentase_faktor_ekonomis_2']) AND trim($detail_arr['persentase_faktor_ekonomis_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">10</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_faktor_ekonomis_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_perkembangan_faktor_ekonomis_3']) AND trim($_POST['persentase_faktor_ekonomis_3'])==$key)?'selected':((isset($detail_arr['persentase_faktor_ekonomis_3']) AND trim($detail_arr['persentase_faktor_ekonomis_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">11</td>
                <td class="text-left">Elevasi Dengan Jalan di Depannya</td>
                <td class="text-center"></td>
                <td class="text-center">11</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_elevasi_terhadap_jalan_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_elevasi_terhadap_jalan_1']) AND trim($_POST['persentase_elevasi_terhadap_jalan_1'])==$key)?'selected':((isset($detail_arr['persentase_elevasi_terhadap_jalan_1']) AND trim($detail_arr['persentase_elevasi_terhadap_jalan_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">11</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_elevasi_terhadap_jalan_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_elevasi_terhadap_jalan_2']) AND trim($_POST['persentase_elevasi_terhadap_jalan_2'])==$key)?'selected':((isset($detail_arr['persentase_elevasi_terhadap_jalan_2']) AND trim($detail_arr['persentase_elevasi_terhadap_jalan_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">11</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_elevasi_terhadap_jalan_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_elevasi_terhadap_jalan_3']) AND trim($_POST['persentase_elevasi_terhadap_jalan_3'])==$key)?'selected':((isset($detail_arr['persentase_elevasi_terhadap_jalan_3']) AND trim($detail_arr['persentase_elevasi_terhadap_jalan_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">12</td>
                <td class="text-left">Penggunaan</td>
                <td class="text-center"></td>
                <td class="text-center">12</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_penggunaan_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_penggunaan_1']) AND trim($_POST['persentase_penggunaan_1'])==$key)?'selected':((isset($detail_arr['persentase_penggunaan_1']) AND trim($detail_arr['persentase_penggunaan_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">12</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_penggunaan_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_penggunaan_2']) AND trim($_POST['persentase_penggunaan_2'])==$key)?'selected':((isset($detail_arr['persentase_penggunaan_2']) AND trim($detail_arr['persentase_penggunaan_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">12</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_penggunaan_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_penggunaan_3']) AND trim($_POST['persentase_penggunaan_3'])==$key)?'selected':((isset($detail_arr['persentase_penggunaan_3']) AND trim($detail_arr['persentase_penggunaan_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <td class="text-center">13</td>
                <td class="text-left">Hadap</td>
                <td class="text-center"></td>
                <td class="text-center">13</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_hadap_1">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_hadap_1']) AND trim($_POST['persentase_hadap_1'])==$key)?'selected':((isset($detail_arr['persentase_hadap_1']) AND trim($detail_arr['persentase_hadap_1'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">13</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_hadap_2">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_hadap_2']) AND trim($_POST['persentase_hadap_2'])==$key)?'selected':((isset($detail_arr['persentase_hadap_2']) AND trim($detail_arr['persentase_hadap_2'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
                <td class="text-center">13</td>
                <td class="text-center info">
                    <select class="form-control" name="persentase_hadap_3">
                        <option value="">0%</option>
                        <?php 
                                if (!empty($adjustment_lib->base_adjustment_persentase_objek())) {
                                    foreach ($adjustment_lib->base_adjustment_persentase_objek() as $key => $value) {
                                        $selected = (isset($_POST['persentase_hadap_3']) AND trim($_POST['persentase_hadap_3'])==$key)?'selected':((isset($detail_arr['persentase_hadap_3']) AND trim($detail_arr['persentase_hadap_3'])==$key)?'selected':'');
                                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                    }
                                }
                            ?>
                    </select>
                </td>
                <td class="text-right">-</td>
            </tr>
            <tr>
                <th class="text-center" colspan="3">Total Adjustment</th>
                <th class="text-right" colspan="2">-1%</th>
                <th class="text-right">(94,708)</th>
                
                <th class="text-right" colspan="2">-1%</th>
                <th class="text-right">(64,251)</th>
                
                <th class="text-right" colspan="2">-1%</th>
                <th class="text-right">(75,973)</th>
            </tr>
            <tr>
                <th class="text-center" colspan="3">Lokasi</th>
                <td class="text-center" colspan="2"></td>
                <th class="text-right">12,366,831</th>
                <td class="text-center" colspan="2"></td>
                <th class="text-right">11,409,225</th>
                
                <td class="text-center" colspan="2"></td>
                <th class="text-right">11,794,804</th>
            </tr>
            <tr>
                <th class="text-center" colspan="3">Absolut</th>
                <th class="text-right" colspan="2">1%</th>
                <td class="text-right"></td>
                <th class="text-right" colspan="2">1%</th>
                <td class="text-right"></td>
                <th class="text-right" colspan="2">1%</th>
                <td class="text-right"></td>
            </tr>
        </thead>
    </table>
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-left col-md-3">PEMBEBANAN</th>
            </tr>
            <tr>
                <th class="text-left col-md-3">Data Pembanding</th>
                <th class="text-center"></th>
                <th class="text-center col-md-3">Bobot</th>
                <th class="text-center" colspan="3">Market Value</th>
            </tr>
            <tr>
                <td class="text-left">
                    <b>#</b>Data - 1<br>
                    <b>#</b>Data - 2<br>
                    <b>#</b>Data - 3
                </td>
                <td></td>
                <td class="text-center">
                    31%<br>
                    36%<br>
                    34%
                </td>
                <td></td>
                <td class="text-center">
                    Rp<br>
                    Rp<br>
                    Rp
                </td>
                <td class="text-right col-md-4">
                    3,785,765<br>
                    4,074,723<br>
                    3,971,720
                </td>
            </tr>
            <tr>
                <th class="text-left">Nilai Indikasi</th>
                <th></th>
                <th class="text-center">100%</th>
                <th></th>
                <td class="text-center">Rp.</td>
                <th class="text-right">11,832,208</th>
            </tr>
            <tr>
                <th class="text-leftt">Dibulatkan</th>
                <th></th>
                <th></th>
                <th></th>
                <th class="text-center">Rp.</th>
                <th class="text-right">11,800,000</th>
            </tr>
               
                </thead>
            </tbody>
        </table>
    </div>
</div>
</center>
<link rel="stylesheet" type="text/css" href="<?php echo $websiteConfig->base_url().'assets/css/bootstrap-datepicker.min.css'; ?>">
<script src="<?php echo $websiteConfig->base_url().'assets/js/bootstrap-datepicker.min.js'; ?>"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        showButtonPanel: true,
        changeMonth: true,
        dateFormat: 'dd/mm/yyyy'
    });
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal({backdrop: true});
    });
    $("#myBtn2").click(function(){
        $("#myModal2").modal({backdrop: false});
    });
    $("#myBtn3").click(function(){
        $("#myModal3").modal({backdrop: "static"});
    });
});
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>