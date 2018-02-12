<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/jb_lib.php');
	$jb_lib = new jb_lib;

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header table" style="font-size: 26px";><center><b>BIAYA TEKNIS BANGUNAN</b></center></h3>
    </div>
</div>
<div class="panel-body">
    <div class="form-body">
         <button class="btn btn-success btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=btb&method=add'; ?>', '_self'); return false;">Rubah Index BTB</button>
    </div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
    <div class="col-md-12">
        <div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
    </div>
</div>

<div class="row">
    <div class="panel-body">
        <div class="panel-grup">
                <table class="table table-bordered text-center" style="font-size: 17px;">
                    <tr>
                        <th class="text-center active" colspan="14">Jenis Bangunan Jadi 100% Sebelum Adjustment (Berdasarkan Buku Jurnal)</td>
                    </tr>
                    <tr class="warning text-center">
                        <th class="col-md text-center" rowspan="2">Type Bangunan</th>
                        <th class="col-md text-center" colspan="4">Rumah Tinggal 1 Lantai</th>
                        <th class="col-md text-center" colspan="4">Rumah Tinggal 2 Lantai</th>
                        <th class="col-md text-center" rowspan="2">Bangunan Perkebunan</th>
                        <th class="col-md text-center" rowspan="2">Gudang</th>
                        <th class="col-md text-center" colspan="3">Bangunan Gedung Bertingkat</th>
                    </tr>
                    <tr class="info text-center">
                        <td class="col-md text-center">Sederhana 1 Lt.</td>
                        <td class="col-md text-center">Menengah 1 Lt.</td>
                        <td class="col-md text-center">Mewah 1 Lt.</td>
                        <td class="col-md text-center">Ekslusif 1 Lt.</td>
                        <td class="col-md text-center">Sederhana 1 Lt.</td>
                        <td class="col-md text-center">Menengah 2 Lt.</td>
                        <td class="col-md text-center">Mewah 2 Lt.</td>
                        <td class="col-md text-center">Ekslusif 2 Lt.</td>
                        <td class="col-md text-center">Rendah Max 4 Lt.</td>
                        <td class="col-md text-center">Sedang Max 8 Lt</td>
                        <td class="col-md text-center">Tinggi Min 9Lt</td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">Rumah Tinggal Sederhana 2 Lantai</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                        <th class="col-md text-center">36,000,000</th>
                    </tr>
                    <tr>
                        <th class="text-center info" colspan="14">Carport</th>
                    </tr>
                    <tr height="40px" style="font-size: 14px; font-family: Times New Romans">
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center"></td>
                    </tr>
                </table>

<div class="container">
<div class="row">
    <div class="panel-body">
        <div class="table table-striped table-hovered">
            <div class="panel-grup">
                <table class="table-bordered table" style="font-size: 17px;">
                    <tr class="text-center info">
                        <th class="text-center" colspan="5">Tabel Progresi Fisik Pembangunan Dari Aktiva (Dirubah Apabila Bangunan Dalam Progress Pengerjaan)</th>
                    </tr>
                    <tr class="text-center warning">
                        <th class="col-sm-1 text-center">No.</th>
                        <th class="col-sm-5 text-center">Nama Pekerjaan</th>
                        <th class="col-sm-2 text-center">Bobot</th>
                        <th class="col-sm-2 text-center">Progres Fisik</th>
                        <th class="col-sm-2 text-center">Jumlah</th>
                    </tr>
                    <tr>
                        <th class="col-md text-center">1</th>
                        <th class="col-md text-center">Tanah</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">2</th>
                        <th class="col-md text-center">Pondasi</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">3</th>
                        <th class="col-md text-center">Sloof Beton</th>
                        <th class="col-md text-center"></th>
                        <td class="col-md text-center info">100%</td>
                        <th class="col-md text-center"></th>
                    </tr>
                    <tr>
                        <th class="col-md text-center">4</th>
                        <th class="col-md text-center">Kolom Beton</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">5</th>
                        <th class="col-md text-center">Dinding</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">6</th>
                        <th class="col-md text-center">Kunsen</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">7</th>
                        <th class="col-md text-center">Pintu</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">8</th>
                        <th class="col-md text-center">Jendela</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">9</th>
                        <th class="col-md text-center">Lantai</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">10</th>
                        <th class="col-md text-center">Plafon</th>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">11</td>
                        <th class="col-md text-center">Rangka Atap</td>
                        <td class="col-md text-center"></td>
                        <td class="col-md text-center info">100%</td>
                        <td class="col-md text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-sm text-center">12</th>
                        <th class="col-sm text-center">Atap</th>
                        <td class="col-sm text-center"></td>
                        <td class="col-sm text-center info">100%</td>
                        <td class="col-sm text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-sm text-center">13</th>
                        <th class="col-sm text-center">Finishing</th>
                        <td class="col-sm text-center"></td>
                        <td class="col-sm text-center info">100%</td>
                        <td class="col-sm text-center"></td>
                    </tr>
                    <tr>
                        <th class="col-sm text-center"></th>
                        <th class="col-sm text-center">JUMLAH</th>
                        <td class="col-sm text-center info">100%</td>
                        <td class="col-sm text-center"></td>
                        <td class="col-sm text-center danger">100%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="panel-body">
        <div class="table table-striped table-hovered">
            <div class="panel-grup">
                <table class="table table-bordered" style="font-size: 17px;">
                    <tr>
                        <td class="text-center info">Jenis Bangunan Rumah</td>
                    </tr>
                </table>
            </div>
        </div>
<div class="row">
    <div class="panel-body">
        <table class="table table-bordered" border="0" style="font-size: 17px;">
                    <tr>
                        <th class="col-md-4 text-center">Nama Properti :</th>
                        <td class="col-md-4 text-center">
                            <input class="form-control" type="text" name="jb_nama_properti">
                        </td>                        
                    </tr>
                    <tr>
                        <th class="col-md text-center">Jumlah Lantai :</th>
                        <td class="col-md" colspan="3">
                            <select class="form-control">
                                <option value="">Pilihan</option>
                                    <?php 
                                        if (!empty($jb_lib->base_jb_jumlah_lantai())) {
                                            foreach ($jb_lib->base_jb_jumlah_lantai() as $key => $value) {
                                                $selected = (isset($_GET['jb_id']) AND trim($_GET['jb_id'])==$key)?'selected':((isset($detail_arr['jb_id']) AND trim($detail_arr['jb_id'])==$key)?'selected':'');
                                                    echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                                }
                                            }
                                    ?>
                            </select>
                         </td>
                    </tr>
                    <tr>
                        <th class="col-md text-center">Jenis Rumah :</th>
                        <td class="col-md" colspan="3">
                            <select class="form-control">
                                <option value="">Pilihan</option>
                                    <?php 
                                        if (!empty($jb_lib->base_jb_jenis_rumah())) {
                                            foreach ($jb_lib->base_jb_jenis_rumah() as $key => $value) {
                                                $selected = (isset($_GET['jb_id']) AND trim($_GET['jb_id'])==$key)?'selected':((isset($detail_arr['jb_id']) AND trim($detail_arr['jb_id'])==$key)?'selected':'');
                                                    echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                                                }
                                            }
                                    ?>
                            </select>
                         </td>
                        
                    </tr>
                    <tr>
                        <th class="col-md text-center">Index :</td>
                        <td class="col-md danger"></td>
                    </tr>
                     <tr>
                        <th class="col-md text-center">Harga :</td>
                        <th class="col-md text-center">Rp 4,100,000</th>
                        <th class="col-md text-center">Rp 4,100,000</th>
                       
                    </tr>
                </table>
            </div>
<div class="row">
    <div class="panel-body">
        <table class="table table-bordered" style="font-size: 17px;">
            <tr>
                <th class="col-md text-center info">No.</th>
                <th class="col-md text-center info">Spesifikasi</th>
                <th class="col-md text-center info">Index</th>
                <th class="col-md text-center info">Jenis Bahan Bangunan</th>
                <th class="col-md text-center info">Custom Jenis Bahan Bangunan</th>
                <th class="col-md text-center info">Adjustment</td>
            </tr>
            <tr>
                <th class="col-md text-center">1</th>
                <th class="col-md text-center">Konstruksi</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">2</th>
                <th class="col-md text-center">Pondasi</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">3</th>
                <th class="col-md text-center">Jumlah Lantai</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">4</th>
                <th class="col-md text-center">Lantai</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">5</th>
                <th class="col-md text-center">Dinding</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">6</th>
                <th class="col-md text-center">Tinggi Bangunan</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">7</th>
                <th class="col-md text-center">Partisi</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">8</th>
                <th class="col-md text-center">Plafond</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">9</th>
                <th class="col-md text-center">Pintu</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <th class="col-md text-center">10</th>
                <th class="col-md text-center">Jendela</th>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <td class="col-md text-center">11</td>
                <td class="col-md text-center">Rangka Atap</td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr>
                <td class="col-md text-center">12</td>
                <td class="col-md text-center">Penutup Atap</td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
            <tr height="40px" style="font-size: 17px; font-family: Times New Romans">
                <td class="col-md text-center">13</td>
                <td class="col-md text-center">Tangga Penghubung</td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
                <td class="col-md text-center"></td>
            </tr>
        </table>
    </div>
</div>