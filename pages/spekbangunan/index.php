<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');
	require(FCPATH.'/library/spekbangunan_lib.php');
	$spekbangunan_lib = new spekbangunan_lib;

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
                <table border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-2" colspan="2"><b>Spesifikasi Bangunan</b></td>
                       <td class="col-md-1"></td>
                       <td class="col-md-3"></td>
                       <td class="col-md-1"></td>
                       <td class="col-md-2"><b>Sarana Bangunan</b></td>
                       <td class="col-md-1"></td>
                       <td class="col-md-1"></td>
                       <td class="col-md-1"></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="5" colspan="2">Pondasi</td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Mini Pile</td>
                        <td class="col-md-1" rowspan="31"></td>
                       
                        <td class="col-md-2" rowspan="2">Listrik</td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Ada</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Cakar Ayam / Pondasi Setempat</td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Tidak Ada</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Batu Kali</td>
                        <td class="col-md-2" rowspan="6">Daya Listrik</td>
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">900 Watt</td>
                        
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Rolaag Bata</td>
                        
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">1300 Watt</td> 
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1">
                            <input type="checkbox" name="check1" value="kosong" class="col-md-3">
                        </td>
                        <td class="col-md-3">Batako</td>
                        <td class="col-md-1">
                            <center><input type="checkbox" name="check1" value="kosong" class="col-md-3"></center>
                        </td>
                        <td class="col-md-3">2200 Watt</td> 
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="6" colspan="2">Dinding</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Hebel Diplester</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">3300 Watt</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Batu Bata Diplester</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">4400 Watt</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Batako Diplester</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">9000 Watt</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Bata Tidak Diplester</td>
                        <td class="col-md-2" rowspan="4">Air Bersih</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">PDAM</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Batako Tidak Diplester</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Pompa</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Papan / Kayu / Triplek</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Sumur Tanah</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" colspan="2" rowspan="6">Lantai</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Marmer</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Sumur Gali</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Granit</td>
                        <td class="col-md-2" rowspan="3">Bak Sampah<br><br>Dikelola Oleh :</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Ada</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Keramik</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3" colspan="2">Tidak Ada</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Tegel</td>
                        
                        <td class="col-md-3" colspan="3">asdsa</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Ubin Teraso</td>
                        <td class="col-md-2" rowspan="3">Telepon<br><br>No. Telepon :</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3" colspan="2">Ada</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Semen Pelur</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3" colspan="2">Tidak</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" colspan="2" rowspan="4">Dinding Dalam</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Halus</td>
                        <td class="col-md-3" colspan="3">asdas</td>
                    </tr>
                
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Sedang</td>
                        <td class="col-md-2" colspan="4" rowspan="3" style="font-size: 17px;"><center><b>Perijinan Bangunan</center></b></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Kasar</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Tanpa Cat</td>
                    </tr>
                    <tr  style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" rowspan="4" colspan="2">Dinding Luar</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Halus</td>
                        <td class="col-md-2" rowspan="6" colspan="4">
                            No. IMB &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :<br>
                            Tanggal IMB :<br>
                            Arsitek Bangunan :<br>
                            Tahun Pembuatan :<br>
                            Penggunaan :<br>
                            Luas Bangunan Sesuai IMB
                        </td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Sedang</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Kasar</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Tanpa Cat</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-2" colspan="2" rowspan="6">Kunsen</td>
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Alumunium</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Plitur</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Halus</td>
                        <td class="col-md-3" style="font-size: 17px;" rowspan="3" colspan="4"><center><b>Luas Bangunan</b></center></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Sedang</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Cat Kasar</td>

                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Tanpa Cat</td>
                        <td class="col-md-2" colspan="4"><b>Sarana Bangunan</b></td>
                        
                    </tr>
                </table>
                <table height="3    px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="8"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md-2" colspan="2" rowspan="6">Atap</td>
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Genteng Keramik</td>
                       <td class="col-md-1" rowspan="11"></td>
                       <td class="col-md-2" rowspan="8">
                            Teras<br>
                            R. Tamu<br>
                            R. Keluarga<br>
                            Kamar Mandi<br>
                            R. Tidur 1<br>
                            R. Tidur 2<br>
                            Dapur<br>
                            Lain - Lain
                       </td>
                       <td class="col-md-1" rowspan="8"></td>
                       <td class="col-md-1" rowspan="8"></td>
                       <td class="col-md-1" rowspan="8"></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Genteng Beton</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Dak Beton</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Asbes</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Seng</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Lainnya</td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-2" colspan="2" rowspan="4">Pagar</td>
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Keliling</td>           
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Depan Saja</td>           
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                       <td class="col-md-1"></td>
                       <td class="col-md-3">Samping Saja</td>
                       <td class="col-md-2"><b>Total</b></td>
                       <td class="col-md-1"><center>m2</center></td>
                       <td class="col-md-1"><center>m2</center></td>
                       <td class="col-md-2"><center>m2</center></td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                        <td class="col-md-1"></td>
                        <td class="col-md-3">Tanpa Pagar</td>
                        <td class="col-md-2" colspan="4">
                       Luas Bangunan Sesuai Fisik &nbsp :
                        </td>          
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">  
                        <td class="col-md-2" colspan="4" ></td>
                        <td class="col-md-2" colspan="4">
                            Tanpa Pagar &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : ['$nilai_tanpa_pagar']
                        </td>           
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="8"></td>
                    </tr>
                </table>
                <table border="1" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-2" style="border: white;">Catatan&nbsp: <br><br><br></td>
                    </tr>
                </table>
                <table height="10px" border="0" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md" colspan="8"></td>
                    </tr>
                </table>
                <table height="30px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-2" colspan="8"><b>Kesimpulan Dan Rekomendasi</b></td>
                    </tr>
                </table>
                <table height="3px" border="0" style="width: 1200px;">
                    <tr style="font-size: 17px; font-family: Times New Romans">
                       <td class="col-md-2" colspan="8"></td>
                    </tr>
                </table>
                <table height="30px" border="1" style="width: 1200px;">
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md-2"><center>A</center></td>
                       <td class="col-md-7">
                           Faktor Yang Dapat Menambah Nilai<br>
                           1 .<br>
                           2 .<br>
                           3 .
                       </td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md-2"><center>B</center></td>
                       <td class="col-md-7">
                           Faktor Yang Dapat Menambah Nilai<br>
                           1 .<br>
                           2 .<br>
                           3 .
                       </td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md-2"><center>C</center></td>
                       <td class="col-md-7">
                           Faktor Yang Dapat Memenuhi Nilai<br>
                           1 .<br>
                           2 .<br>
                           3 .
                       </td>
                    </tr>
                    <tr style="font-size: 15px; font-family: Times New Romans">
                       <td class="col-md-2"><center>D</center></td>
                       <td class="col-md-7">
                           Kesimpulan<br>
                           1 .<br>
                           2 .<br>
                           3 .
                       </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</center>
</page>