<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/nilaiagunan_lib.php');
	$nilaiagunan_lib = new nilaiagunan_lib;

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

?>
<center>
<div class="panel-body">
    <div class="form-body">
         <button class="btn btn-danger btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=nilaiagunan&method=add'; ?>', '_self'); return false;">Rubah Index BTB</button>
    </div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
    <div class="col-md-12">
        <div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
    </div>
</div>
<div class="row">
    <div class="panel-body">
        <div class="table table-striped table-hovered">
            <div class="panel-grup">
                <table height="60px" border="5" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                        <td class="col-md" colspan="5"><b><center>LAPORAN PENILAIAN DAN APPRAISAL</center></b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Surat Perintah Kerja Penilaian Agunan</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Perusahaan Penilai</td>
                        <td class="col-md-4"><b>KJPP Mushofah Mono Igfirly & Rekan<b></td>
                        <td class="col-md-1" " rowspan="9"></td>
                        <td class="col-md-2">Kantor BTN</td>
                        <td class="col-md-4">Kantor Cabang Ciputat</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="2">Penanggung Jawab</td>
                        <td class="col-md-4" rowspan="2"><b>Ir. Mono Igfirly, MM, MAPPI (Cert)</b><br>Ijin Penilai Publik : P-1.08.00065</br></td>
                        <td height="20px" class="col-md-1">Nama Pemberi Tugas</td>
                        <td class="col-md-2">Insan Nuryatim</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Jabatan</td>
                        <td class="col-md-4">Operation Unit Head</td>
                    </tr>

                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1" rowspan="6">Alamat Kantor</td>
                        <td class="col-md-1" rowspan="6">
                            Ujung Menteng Business Center
                            <br>Blok B No.08 Jl. Hamengkubuwono IX Km 25
                            <br>Jakarta 13960
                            <br>Telp : ( 021 ) 46802381/2382
                            <br>Fax  : ( 021 ) 46806909
                            <br>Email : kjpp.mmi@gmail.com</br>
                        </td>
                        <td class="col-md-1">No Penugasan</td>
                        <td class="col-md-1">294/CPT.I/OP-LA/I/2017</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1" rowspan="">Tanggal Penugasan</td>
                        <td class="col-md-1" rowspan="">20 Januari 2017</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md" rowspan="2" colspan="2"></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Data Debitur / Calon Debitur</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Nama Debitur</td>
                        <td class="col-md-4"><b><b></td>
                        <td class="col-md-1" " rowspan="9"></td>
                        <td class="col-md-2">Tanggal Penilaian</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" >No. Telepon</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2">No. Laporan</td>
                        <td class="col-md-2"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Keperluan Jaminan</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2">Tanggal Laporan</td>
                        <td class="col-md-4"></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Obyek Penilaian</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                         <td class="col-md-1" colspan="7">Jenis Obyek</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1" rowspan="5">Alamat Obyek</td>
                        <td class="col-md-2">Komp. Perum</td>
                        <td class="col-md-3"><b><b></td>
                        <td class="col-md-1" rowspan="7"></td>
                        <td class="col-md-2">Desa kelurahan</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        
                        <td class="col-md-1">Jalan / Blok</td>
                        <td class="col-md-2"><b><b></td>
                        <td class="col-md-1">Kecamatan</td>
                        <td class="col-md-2"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        
                        <td class="col-md-1">No. Rumah</td>
                        <td class="col-md-2"><b><b></td>
                        <td class="col-md-1">Kabupaten</td>
                        <td class="col-md-2"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        
                        <td class="col-md-1">No. Tlp / Hp   </td>
                        <td class="col-md-2"><b><b></td>
                        <td class="col-md-1">Provinsi</td>
                        <td class="col-md-2"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        
                        <td class="col-md-1">Yang Dijumpai</td>
                        <td class="col-md-2"><b><b></td>
                        <td class="col-md-1">Status</td>
                        <td class="col-md-2"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1" rowspan="2">Batas-batas</td>
                        <td class="col-md-1">Depan</td>
                        <td class="col-md-1">Jalan / Lingkungan</td>
                        <td class="col-md-1">Belakang</td>
                        <td class="col-md-2">Rumah Tinggal / Hunian</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        
                        <td class="col-md-1">Sebelah Kiri</td>
                        <td class="col-md-2">Rumah Tinggal / Hunian</td>
                        <td class="col-md-1">Sebelah Kanan</td>
                        <td class="col-md-2">Jalan Lingkungan</td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1">Status Obyek</td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">Kosong
                        </td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-2">Proses Pembangunan
                        </td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">Dihuni
                        </td>
                        <td class="col-md-3" colspan="2">Oleh :</td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Marketabilitas</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="3">Lokasi Perumahan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Dalam Kota<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Dekat Kota<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Jauh Dari Kota
                        </td>
                        <td class="col-md-1" rowspan="3"></td>
                        <td class="col-md-2" rowspan="3">Kenyamanan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Cukup Jauh Dari Tempat Maksiat<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Dekat Dengan Tempat Maksiat<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Jauh Dari Tempat Maksiat
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="3">Lokasi Agunan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Di Hook dan atau Taman<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Di Hook dan atau Taman<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tusuk Sate
                        </td>
                        <td class="col-md-1" rowspan="3"></td>
                        <td class="col-md-2" rowspan="3">Kenyamanan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Cukup Jauh Dari Tempat Maksiat<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Dekat Dengan Tempat Maksiat<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Jauh Dari Tempat Maksiat
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="5">Jarak Fasum Fasos</td>
                        <td class="col-md-4" rowspan="5">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">< 2 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">2 Km s/d 5 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">5 Km s/d 7 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">7 Km s/d 10 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">> 10 Km
                        </td>
                        <td class="col-md-1" rowspan="5"></td>
                        <td class="col-md-2" rowspan="5">Aksesibilitas Jarak ke Jalan Provinsi</td>
                        <td class="col-md-4" rowspan="5">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">< 2 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">2 Km s/d 5 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">5 Km s/d 7 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">7 Km s/d 10 Km<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">> 10 Km
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="3">Fasilitas Jenis Fasum Fasos</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Lengkap (Pasar, Sekolah, RS, Tempat Ibadah)<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Rata - rata (Pasar, Sekolah, Puskesmas dan tempat Ibadah)<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Rata - rata (Pasar, Sekolah, Klinik dan tempat Ibadah)
                        </td>
                        <td class="col-md-1" rowspan="3"></td>
                        <td class="col-md-2" rowspan="3">Resiko Bencana Banjir</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Resiko Banjir<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sering<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="3">Kondisi Jalan Ke kota</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Relatif Macet<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sering Macet<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Macet
                        </td>
                        <td class="col-md-2" >Perumahan</td>
                        <td class="col-md-1" >0%</td>
                        <td class="col-md-2" >Pertokoan</td>
                        <td class="col-md-1" >10%</td>
                    </tr>
                    <tr>
                        <td class="col-md-2" >Industri</td>
                        <td class="col-md-1" >0%</td>
                        <td class="col-md-2" >Taman</td>
                        <td class="col-md-1" >0%</td>
                    </tr>
                    <tr>
                        <td class="col-md-2" >Perkantoran</td>
                        <td class="col-md-1" >0%</td>
                        <td class="col-md-2" >Kosong</td>
                        <td class="col-md-1" >10%</td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Pertumbuhan Agunan</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="6">Kecepatan Pertambahan Nilai</td>
                        <td class="col-md-4" rowspan="6">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sangat Tinggi<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Cukup Tinggi<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Rata - Rata<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada Pertumbuhan<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Penurunan Nilai
                        </td>
                        <td class="col-md-1" rowspan="6"></td>
                        <td class="col-md-2" rowspan="6">Kondisi Wilayah Agunan</td>
                        <td class="col-md-4" rowspan="6">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sedang Berkembang<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Akan Berkembang Dalam Jangka Panjang<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Akan Berkembang Dalam Jangka Pendek<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Mapan<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1"> Tidak Berkembang<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Terpencil
                        </td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Daya Tarik Agunan</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="2">Sarana Listrik</td>
                        <td class="col-md-4" rowspan="2">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Ada (Belum Terpasang)<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                        <td class="col-md-1" rowspan="2"></td>
                        <td class="col-md-2" rowspan="2">Sarana Air</td>
                        <td class="col-md-4" rowspan="2">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Air Tanah<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">PDAM
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="2">Sarana Telepon</td>
                        <td class="col-md-4" rowspan="2">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Ada<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                        <td class="col-md-1" rowspan="2"></td>
                        <td class="col-md-2" rowspan="2">Sarana Taman Lingkungan</td>
                        <td class="col-md-4" rowspan="2">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Ada<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="3">Sarana Untuk Olahraga</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Lengkap (Semacam Sport Center / Indoor Sport)<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sederhana (Outdoor Tenis, Bulu Tangkis)<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                        <td class="col-md-1" rowspan="3"></td>
                        <td class="col-md-2" rowspan="3">Sarana Pengelolaan Lingkungan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Keamanan dan Kebersihan Baik<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Keamanan dan Kebersihan Minim<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="3">Sarana Jalan Lingkungan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Beton<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Makadam / Pengerasan<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tanah dan Sejenisnya
                        </td>
                        <td class="col-md-1" rowspan="3"></td>
                        <td class="col-md-2" rowspan="3">Sarana Jumlah Akses Jalan ke Perumahan</td>
                        <td class="col-md-4" rowspan="3">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Hanya 1 Akses Jalan<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Lebih Dari 1 Akses Jalan<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Lebih Dari 3 Akses Jalan
                        </td>
                    </tr>
                </table>
                <table height="2px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="6">Sarana Sarana Fasos Umum</td>
                        <td class="col-md-4" rowspan="6">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Fasilitas Kesehatan (Poliklinik)<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Pasar<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Rumah Ibadah<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sarana Angkutan Umum<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sarana Hiburan / Rekreasi<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Sarana Pendidikan
                        </td>
                        <td class="col-md-1" rowspan="6"></td>
                        <td class="col-md-2">Saluran Lingkungan</td>
                        <td class="col-md-4">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Ada<br>
                            <input type="checkbox" name="check1" value="kosong" class="col-md-1">Tidak Ada
                        </td>
                        <tr style="font-size: 15px; font-family: Times New Romans">
                            <td class="col-md" rowspan="4" colspan="2"></td>
                        </tr>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-1" colspan="5"><b>Data Tanah</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="5"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Jenis Sertifikat</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-1" " rowspan="9"></td>
                        <td class="col-md-2">Luas Tanah</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" >No. Sertifikat</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-1">Presentase Bangunan</td>
                        <td class="col-md-2"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Tanggal Terbit</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2">Tinggi Halaman thd Jalan</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Jatuh Tempo Sertifikat</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2">Tinggi Halaman thd Lantai</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">No. GS / SU</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2">Keadaan Halaman</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Tanggal GS / SU</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2">Lebar Jalan Depan Aset</td>
                        <td class="col-md-4"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Atas Nama</td>
                        <td class="col-md-4"></td>
                        <td class="col-md-2" rowspan="2" colspan="2"></td> 
                    </tr>
                     <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2">Hubungan Dengan Calon Nasabah</td>
                        <td class="col-md-4"></td>  
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</center>
