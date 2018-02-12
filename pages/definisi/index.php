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
    <div class="row">
    <table class="table-hover" style="font-family: times new roman; font-size: 20px;">
        <tr>
            <td class="col-md-12 text-justify" colspan="2">
                <b>Nilai Pasar (SPI Edisi VI - 2015 - SPI 101.3.1)</b><br>
                Nilai Pasar didefinisikan sebagai estimasi sejumlah uang yang dapat diperoleh dari hasil penukaran suatu aset atau kewajiban pada tanggal penilaian, antara pembeli yang berminat membeli dengan penjual yang berminat menjual, dalam suatu transaksi bebas ikatan, yang pemasarannya dilakukan secara layak, dimana kedua pihak masing-masing bertindak atas dasar pemahaman yang dimilikinya, kehati-hatian dan tanpa paksaan.<br><br>
            </td>
        </tr>
        <tr>
            <td class="col-md-12 text-justify" colspan="2">
                <b>Nilai Likuidasi (SPI Edisi VI - 2015 - SPI 102.3.7)</b><br>
                Nilai Likuidasi adalah sejumlah uang yang mungkin diterima dari penjualan suatu aset dalam jangka waktu yang relatif pendek untuk dapat memenuhi jangka waktu pemasaran dalam definisi Nilai Pasar. Pada beberapa situasi, nilai Likuidasi dapat melibatkan penjual yang tidak berminat menjual, dan pembeli yang membeli dengan mengetahui situasi yang tidak menguntungkan penjual. Nilai Likuidasi memiliki arti sama dengan Nilai Jual Paksa.<br><br>
            </td>
        </tr>

        <tr>
            <td class="col-md-2"></td>
            <td class="col-md-12 text-justify">
                <b>Pendekatan Penilaian dan Penerapannya</b><br>
                Secara umum dalam proses penilaian terdapat tiga pendekatan yaitu : Pendekatan Pasar (Market Approach), Pendekatan Pendapatan (Income Approach), Pendekatan Biaya (Cost Approach).<br><br>
            </td>
        </tr>

        <tr>
            <td></td>
            <td class="col-md-12 text-justify">
                <b>Pendekatan Pasar (SPI Edisi VI - 2015 - KPUP)</b><br>
                Pendekatan Pasar menghasilkan indikasi nilai dengan cara membandingkan aset yang dinilai dengan aset yang identik atau sebanding dan adanya informasi harga transaksi atau penawaran. Dengan mengadakan penyesuaian perbandingan dengan memperhatikan faktor yang mempengaruhi nilai yaitu lokasi, aksesibilitas, ukuran, bentuk, hak kepemilikan, pembatasan penggunaan yang ada serta kondisi pasar. Metode Pendekatan Pasar berupa perbandingan data pasar.<br><br>
            </td>
        </tr>                      
        <tr>
            <td></td>
            <td class="col-md-12 text-justify">
                <b>Pendekatan Pendapatan (SPI Edisi VI - 2015 - KPUP)</b><br>
                Pendekatan pendapatan menghasilkan indikasi nilai dengan cara mengubah arus kas dimasa yang akan datang menjadi nilai kini. Pendekatan ini mempertimbangkan pendapatan yang akan dihasilkan aset selama masa manfaatnya dan menghitung nilai melalui proses kapitalisasi. Kapitalisasi merupakan konversi pendapatan menjadi sejumlah modal dengan mengguna kan tingkat diskonto yang sesuai. Metode Pendekatan Pendapatan yaitu kapitalisasi langsung, pengali pendapatan kotor, aliran arus kas terdiskonto, teknik penyisaan.<br><br>
            </td>
        </tr>

        <tr>
            <td></td>
            <td class="col-md-12 text-justify">
                <b>Pendekatan Biaya (SPI Edisi VI - 2015 - KPUP)</b><br>
                Pendekatan Biaya menghasilkan indikasi nilai dengan menggunakan prinsip ekonomi, dimana pembeli tidak akan membayar membayar suatu aset lebih dari pada biaya untuk memperoleh aset dengan kegunaan yang sama atau setara saat pembelian atau kontruksi. Untuk memperoleh indikasi Nilai Pasar dengan pendekatan biaya maka perlu adanya estimasi biaya pengembangan baru (Biaya Pengganti Baru) dari aset yang kegunaannya setara dikurangi dengan estimasi penyusutan penyusutan dan keusangan/kemunduran yang sesuai dengan analisis biaya dan berdasarkan pasar. Metode menghitung biaya pengganti baru dalam  Pendekatan Biaya dapat menggunakan motode survey kuantitas, metode unit terpasang, metode meter persegi, metode indeks biaya.
            </td>
        </tr>
    </table>
    </div>
    </div>
</center>
            
