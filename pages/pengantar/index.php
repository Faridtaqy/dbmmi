<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/pengantar_lib.php');
	$pengantar_lib = new pengantar_lib;

	// initialize
	$status = (isset($_GET['status']) AND trim($_GET['status'])!='')?$_GET['status']:((isset($response['status']) AND trim($response['status'])!='')?$response['status']:'');
	$message = (isset($_GET['message']) AND trim($_GET['message'])!='')?base64_decode($_GET['message']):((isset($response['message']) AND trim($response['message'])!='')?$response['message']:'');

?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header table" style="font-size: 26px";><center><b>SURAT PENGANTAR</b></center></h3>
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
<div class="container">
    <div class="rowspan">
    <div class="panel-body">
        <div class="table table-striped">
            <div class="panel-grup">
                <thead>
                <table class="text-justify" style="font-family: times new romans; font-size: 20px;">
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="text-left" colspan="1"></td>
                        <td class="" colspan="1"></td>
                        <th class="" colspan="1" >2 Januari 2017</th>
                    <tr>
                        <th class="col-md-1" colspan="3"></th>
                    </tr>
                    <tr>
                        <th class="col-sm-2 text-left" colspan="1">No. Laporan  :</th>
                        <th class="col-md-8" colspan="1">008/MMI-JKTMR/BTN-CPTT/KGU-I/I/2016</th>
                        <td class="col-md-4" colspan="1"></td>
                    </tr>
                    <tr>
                        <td colspan="3">    &nbsp   </td>
                    </tr>
                    <tr>
                        <th class="col-md-1 text-left" colspan="1">Perihal :</th>
                        <td class="col-md-9" colspan="2"><left>Laporan Penilaian Aset (Tanah & Bangunan)</left></td>
                    </tr>
                    <tr>
                        <td colspan="3">    &nbsp   </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <th class="col-md-1" colspan="3">Kepada Yth.</th>
                    </tr>
                    <tr>
                        <th class="col-md-1" colspan="3">PT. BANK TABUNGAN NEGARA (PERSERO), Tbk.</th>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">Kantor Cabang Ciputat</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">Jl. Dewi Sartika No. 21 Ciputat</td>
                    </tr>
                    <tr>
                        <th class="col-md-1" colspan="3"><u>Tanggerang, 15411</u></th>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        Dengan Hormat
                    	</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Menunjuk Penugasan dari (PT. Bank Tabungan Negara (Persero) Tbk), (Kantor Cabang Ciputat), (Nomor 294/CPT.I/OP-LA/I/2017) tanggal (20 Januari 2017) untuk melakukan penilaian aset  berupa : (tanah dan  bangunan)  (Rumah Tinggal 2 Lantai),  yang  berlokasi di (The Akasia Serenity), (Blok B) (No. 08), (Kelurahan Jombang), (Kec. Ciputat), (Kota Tangerang Selatan), (Banten), Kode Pos (15414), maka dengan ini kami sampaikan laporannya.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Adapun penilaian ini bertujuan untuk mengungkapkan Nilai Pasar dan Nilai Likuidasi, dalam rangka Agunan Kredit dari aset tersebut yang dinilai pada tanggal (21 Januari 2017).
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Metode / pendekatan yang digunakan dalam melakukan penilaian ini adalah : Pendekatan Biaya (Cost Approach).
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Dalam melakukan penilaian aset ini, kami berasumsi bahwa sertifikat tanah ( bukti penguasaan tanah ) dan legalitas lainnya adalah syah, mudah diperjualbelikan dan bebas dari ikatan-ikatan lainya, serta kepemilikan dapat dipindahtangankan haknya menurut perundangan yang berlaku.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Setelah melakukan pengumpulan serta pemeriksaan atas aset yang dinilai, kemudian dilakukan analisa dan pengolahan data dengan mempertimbangkan semua faktor-faktor yang mempengaruhi nilai.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Selanjutnya kami menyatakan, nilai aset yang  diperoleh  pada tanggal  21 Januari 2017  adalah sebagai berikut:
                        </td>
                    </tr>
                </table>
            </div>

<div class="">
    <div class="panel-body">
        <div class="table table-striped table-hovered">
            <div class="panel-grup">
                <center><table border="4" class="text-justify" style="font-family: times new romans; font-size: 17px;">
                    <tr>
                        <th class="col-md-2 text-center" rowspan="2">Nama Debitur</th>
                        <th class="col-md-1 text-center" colspan="2">Luas Obyek m2</th>
                        <th class="col-md-1 text-center" rowspan="2">Nilai Pasar (Rp)</th>
                        <th class="col-md-1 text-center" rowspan="2">Indikasi Liquidasi (Rp)</th>
                    </tr>
                    <tr>
                        <th class="col-md-1 text-center">Tanah</th>
                        <th class="col-md-1 text-center">Bangunan</th>
                    </tr>
                    <tr>
                        <th class="col-md-2 text-center">
                                <br>DIAH AYU SUSIANTINI<br><br>
                        </th>
                        <th class="col-md text-center">129</th>
                        <th class="col-md text-center">69</th>
                        <th class="col-md text-center">1,805,100,000</th>
                        <th class="col-md text-center">1,444,080,000</th>
                    </tr>
                </table></center>
                <table class="text-justify" style="font-family: times new romans; font-size: 20px;">
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Kami tidak melakukan penelitian terhadap bukti pemilikan hak atau hutang atau kerugian atas aset yang dinilai tersebut, dan bukanlah tanggung jawab kami jika timbul masalah yang berhubungan dengan hal ini. Selanjutnya kami tegaskan bahwa kami tidak menarik keuntungan baik sekarang maupun di masa yang akan datang dari aset yang dinilai.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Demikian laporan hasil penilaian ini kami sampaikan, atas kepercayaan yang diberikan dan kerjasamanya kami mengucapkan banyak terima kasih.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="col-md-1" colspan="3">
                        	Hormat Kami,
                        </td>
                    </tr>
                    <tr>
                        <th class="col-md-1" colspan="3">KJPP MUSHOFAH MONO IGFIRLY dan REKAN</td>
                    </tr>
                    <tr>
                        <td colspan="3"><br><br><br><br></td>
                    </tr>
                    <tr>
                        <th class="col-md-1" colspan="3"><u>
                        	Ir. Mono Igfirly, MM, MAPPI (Cert.)
                        </u></th>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="col-md-1" colspan="3"><i>
                        	Managing Partner
                        </i></td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td class="col-md-1" colspan="3">
                        	MAPPI No. 95 - S - 00587
                        </td>
                    </tr>
                    <tr style="font-size: 10px;"">
                        <td class="col-md-1" colspan="3">
                        	Ijin Penilai Publik : P-1.08.00065
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</center>