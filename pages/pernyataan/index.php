<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/pernyataan_lib.php');
	$pernyataan_lib = new pernyataan_lib;

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header table" style="font-size: 26px";><center><b>Pernyataan Penilai</b></center></h3>
    </div>
</div>
<div class="panel-body">
    <div class="form-body">
         <button class="btn btn-danger btn-sm" onclick="window.open('<?php echo $websiteConfig->base_url().'?route=pengantar&method=add'; ?>', '_self'); return false;">Rubah Index BTB</button>
    </div>
</div>
<div class="row" style="<?php echo (isset($message) AND trim($message)!='')?'':'display: none;'; ?>">
    <div class="col-md-12">
        <div class="alert alert-<?php echo (isset($status) AND trim($status)==200)?'success':'danger'; ?>"><?php echo $message; ?></div>
    </div>
</div>
<center>
<div class="container">
    <div class=" table-center">
        <div class="panel-body table-hovered table-bordered">

    <table>
        <tr class="text-justify" style="font-size: 20px; font-family: times new romans;">
            <td>
                Dalam batas kemampuan dan keyakinan kami sebagai Penilai, kami yang bertanda tangan dibawah ini menyatakan bahwa :<br>
                 1. Pernyataan, analisis, opini dan kesimpulan dalam laporan Penilaian ini, sebatas pengetahuan kami, adalah benar dan akurat.<br>
                 2. Analisis, opini, dan kesimpulan yang dinyatakan di dalam laporan Penilaian ini dibatasi oleh asumsi dan batasan-batasan yang diungkapkan di dalam laporan penilaian, yang mana merupakan hasil analisis, opini dan kesimpulan Penilai yang tidak berpihak dan tidak memiliki benturan kepentingan.<br>
                 3. Kami tidak mempunyai kepentingan baik sekarang atau di masa yang akan datang terhadap properti yang dinilai, maupun memiliki kepentingan pribadi atau keberpihakan kepada pihak-pihak lain yang memiliki kepentingan terhadap properti yang dinilai.<br>
                 4. Penunjukan dalam penugasan ini tidak berhubungan dengan opini penilaian yang telah disepakati sebelumnya dengan pemberi tugas.<br>
                 5. Biaya jasa profesional tidak dikaitkan dengan nilai yang telah ditentukan sebelumnya atau gambaran nilai yang diinginkan oleh Pemberi Tugas, besaran opini nilai, pencapaian hasil yang dinyatakan, atau adanya kondisi yang terjadi kemudian (subsequent event) yang berhubungan secara langsung dengan penggunaan yang dimaksud.<br>
                 6. Penilai telah mengikuti persyaratan pendidikan profesional yang ditetapkan/dilaksanakan oleh Masyarakat Profesi Penilai Indanesia (MAPPI).<br>
                 7. Penilai memiliki pengetahuan yang memadai sehubungan dengan properti dan/atau jenis industri yang dinilai.<br>
                 8. Penilai telah melaksanakan ruang lingkup sebagai berikut :<br>
                    - Identifikasi masalah (identifikasi batasan, tujuan dan objek, definisi Penilaian, dan tanggal penilaian).<br>
                    - Pengumpulan data dan wawancara.<br>
                    - Analisis data.<br>
                    - Estimasi nilai dengan menggunakan pendekatan Penilaian.<br>
                    - Penulisan laporan.<br>
                 9. Tingkat kedalaman investigasi; apabila terdapat obyek penilaian yang terbatas untuk diperiksa/investigasi dalam pelaksanaan penugasan, maka penilai harus memperoleh surat pernyataan dari pemberi tugas terkait informasi spesifik dan kondisi teknis dari obyek penilaian yang akan menjadi dasar bagi penilai untuk membuat asumsi dan/atau asumsi khusus.<br>
                 10. Penilai atau pelaksana inspeksi (Surveyor) telah melakukan inspeksi lapangan yang merupakan obyek Penilaian.<br>
                 11. Tidak seorangpun selain yang bertandatangan di bawah ini, yang telah terlibat dalam pelaksanaan inspeksi, analisis, pembuatan kesimpulan, dan opini sebagaimana yang dinyatakan dalam laporan penilaian ini.<br>
                 12. Dalam laporan besar nilai dinyatakan dalam mata uang rupiah.<br>
                 13. Seluruh atau sebagian isi laporan ini tidak diperkenankan untuk diberikan kepada umum atau pihak lain tanpa seijin atau sepengetahuan rekanan yang dimaksud.<br>
                 14. Laporan ini tidak sah apabila tanpa adanya cap serta tanda tangan yang berwenang dari pihak kami.<br>
                 15. Analisis, opini, dan kesimpulan yang dibuat oleh Penilai, serta laporan Penilaian telah dibuat dengan memenuhi ketentuan Kode Etik Penilai Indanesia (KEPI) dan SPI 2015.<br><br>

                Dalam batas kemampuan dan keyakinan kami sebagai PENILAI, kami yang bertanda tangan dibawah ini menerangkan bahwa, pernyataan dalam laporan penilaian ini menjadi dasar dari analisa, pendapat dan kesimpulan yang diuraikan didalamnya adalah benar adanya.<br><br>
                Kami menyatakan hasil penilaian kami, bahwa Nilai Pasar dan Nilai Likuidasi dari aset berupa Rumah Tinggal 2 Lantai yang berlokasi di The Akasia Serenity, Blok B No. 08   Kelurahan Jombang  - Kecamatan Ciputat, Kota Tangerang Selatan - Propinsi Banten sesuai dengan keadaan yang berlaku pada tanggal 21 Januari 2017 adalah :<br><br>
            </td>
        </tr>
    </table>
            
              
<div class="row">
    <div class="panel-body panel-bordered">
        <div class="table table-center">
            <table class="table-bordered">
                <thead>
                    <tbody style="font-family: times new romans; font-size: 19px;">
                        <tr>
                            <th class="col-md-2 text-center">Nama</th>
                            <th class="col-md-5 text-center" colspan="5">Alamat Agunan</th>
                        </tr>          
                        <tr>
                            <td></td>
                        </tr>
                        <tr >
                            <th class="text-center">DIAH AYU SIANTINI</th>
                            <th class="text-center" colspan="5">
                                <br>The Akasia Serenity, Blok B No. 08<br>
                                Kelurahan Jombang - Kecamatan Ciputat<br>
                                Kota Tangerang Selatan - Propinsi Banten<br><br>
                            </th>
                    </tr>
                
                    <tr >
                       <td></td>
                    </tr>
                
                    <tr>
                       <th class="text-center" colspan="2">Obyek Penilaian</th>
                       <td><center><b>Satuan Nilai Pasar</b></center></td>
                       <td><center><b>Nilai Pasar</b></center></td>
                       <td><center><b>Nilai Liquidasi</b></center></td>
                    </tr>
                    <tr>
                        <td class="col-md-3 text-left">
                            - Luas Tanah<br>
                            - Luas Bangunan Lantai 1<br>
                            - Luas Bangunan Lantai 2
                        </td>
                        <td class=" text-center">
                           129 m2<br>
                           34 m2<br>
                           35 m2</center>
                        </td>
                        <td class="col-md-2"><center>
                            Rp 11,800,000<br>
                            Rp 4,100,000<br>
                            Rp 4,100,000</center>
                        </td>
                        <td class="col-md-2"><center>
                            Rp 1,522,200,000<br>
                            Rp 139,400,000<br>
                            Rp 143,500,000</center>
                        </td>
                        <td class="col-md-2"><center>
                            Rp 1,217,760,000<br>
                            Rp 111,520,000<br>
                            Rp 114,800,000</center>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-md-3 text-center" colspan="3">Total</th>
                        <td class="col-md-2"><b><center>Rp 1,805,100,000</center></b></td>
                        <td class="col-md-2"><b><center>Rp 1,444,080,000</center></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</center>