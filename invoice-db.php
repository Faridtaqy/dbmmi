<?php
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('FCPATH', str_replace(SELF, '', __FILE__));

require('addons/fpdf181/fpdf.php');
require('config/config.php');
require_once('library/db_utility_lib.php');

// initialize
$websiteConfig = new config;
$db_utility_lib = new db_utility_lib;


//$con = mysqli_connect('localhost','root','');
//mysqli_select_db($con,'dbmmi1');


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');//add new pagey
$pdf->AddPage();//output the result


//set font
$pdf->SetFont('Arial','B',17);
//cel (width, height, text, border, end line, [align] )
$pdf->Cell(10,5,'',0,100);
$pdf->Cell(190,5,'LAPORAN PENILAIAN',0,100,"C");
$pdf->Cell(10,5,'',0,100);

$sql = 'SELECT * FROM mmi_client
	INNER JOIN mmi_debitur ON mmi_client.client_debitur_id = mmi_debitur.debitur_id WHERE 1';
$exec = $db_utility_lib->query($sql);
foreach ($db_utility_lib->result_array($exec) as $row_arr) {
	foreach ($row_arr as $key => $value) {
		${$key}=$value;
	}
	// initalize
	$debitur_photo = (trim($debitur_photo)!='' AND file_exists(FCPATH.'assets/images/debitur/'.$debitur_photo))?$websiteConfig->base_url().'assets/images/debitur/'.$debitur_photo:$websiteConfig->base_url().'assets/images/statics/mmi2.png';

		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(190,5,'Atas Nama :',0,100,"C");
		$pdf->Cell(190,5,$nama_debitur,0,100,"C");
		$pdf->Cell(190,5,'aset terletak di :',0,100,"C");
		$pdf->Cell(190,5,"$lokasi_aset , $blok_no",0,100,"C");
		$pdf->Cell(10,5,'',0,100);
		$pdf->Cell(190,5,"$kelurahan - $kecamatan",0,100,"C");
		$pdf->Cell(190,5,"$kota - $provinsi",0,100,"C");
		$pdf->Cell(190,5,$provinsi,0,100,"C");
		$pdf->Cell(190,5,$client_appraisal_date,0,100,"C");

		// ga nemu cara panggil gambar dengan pdf
		$pdf->Cell(190,45,($debitur_photo=FCPATH.'assets/images/debitur/>'),10,10,-100,"C");
		
		$pdf->Cell(190,5,$no_penugasan,0,100,"C");
}

$pdf->AddPage();//output the result
##############################################################
$pdf->Output();
?>