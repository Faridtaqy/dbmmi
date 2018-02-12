<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class adjustment_lib extends db_utility_lib
{
	function __construct(){
		parent::__construct();
	}
	/**
	* validasi file
	*/
	public function file_validation($fileName='undefined'){
		// requirement
		$max_size = 6250000; // 5MB
		$allow_ext = array('jpg','png','gif');

		if (!empty($_FILES[$fileName])) {
			// cek ekstensi file
			$current_ext = pathinfo($_FILES[$fileName]['name'], PATHINFO_EXTENSION);
			if (!in_array(strtolower($current_ext), $allow_ext)) {
				return array(
					'status' => 500,
					'message' => 'Ekstensi file tidak diijinkan.',
				);
			}

			// cek size file
			$current_size = filesize($_FILES[$fileName]['tmp_name']);
			if ($current_size>$max_size) {
				return array(
					'status' => 500,
					'message' => 'Besar file melebihi batas maksimum.',
				);
			}
		}

		return array(
			'status' => 200,
			'message' => 'OK.',
		);
	}
	/**
	* proses upload file
	*/
	public function do_upload_file($client_id=0, $fileName='undefined'){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		// requirement
		$pathFile = 'assets/images/adjustment/';

		// buat folder jika tidak ditemukan
		if (!is_dir(FCPATH.$pathFile)) {
            mkdir(FCPATH.$pathFile, 0777, true);
            chmod(FCPATH.$pathFile, 0777);
		}

		// cek ketersediaan file
		if (!empty($_FILES[$fileName])) {
			// validasi file
			$response = $this->file_validation($fileName);
			if ($response['status']==200) {
				// hapus file sebelumnya jika ada.
				$old_file = $this->get_one('mmi_adjustment','adjustment_id='.intval($adjustment_id));
				if (trim($old_file)!='' AND file_exists(FCPATH.$pathFile.$old_file)) {
					unlink(FCPATH.$pathFile.$old_file);
				}

				// additional variable
				$new_file_name = date('YmdHis').'_'.$_FILES[$fileName]['name'];

				if (move_uploaded_file($_FILES[$fileName]['tmp_name'], FCPATH.$pathFile.$new_file_name)) {
					// simpan nama file kedalam database
					$column = array(
						'adjustment_photo' => $new_file_name,
					);
					$this->setMainTable('mmi_adjustment');
					$this->setPostData($column);
					$response = $this->save('adjustment_id='.intval($adjustment_id));

					$status = $response['status']; $message = ($response['status']==200)?'Berhasil upload file.':'Gagal upload file.';
				} else{
					$message = 'Upload gagal. terjadi kesalahan upload file.';
				}
			} else{
				$status = $response['status']; $message = $response['message'];
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* Provinsi
	*/
	public function base_provinsi(){
		return array(
			'ACH' => 'Aceh',
			'MDN' => 'Sumatra Utara',
		);
	}
	/**
	* hapus data
	*/
	public function stored_delete_data_adjustment($adjustment_id=0){
		$this->setMainTable('mmi_adjustment');
		$column = array(
			'person_was_deleted' => 'Y',
		);
		$this->setPostData($column);
		$response = $this->save('person_was_deleted="N" AND adjustment_id='.intval($adjustment_id));
		return array(
			'status' => $response['status'],
			'message' => ($response['status']==200)?'Data berhasil dihapus.':'Data tidak tersedia.',
		);
	}
	/**
	* dapatkan data detail karyawan berdasarkan nik
	*/
	public function get_detail_adjustment_by_name($adjustment_name=0){
		$this->setMainTable('mmi_adjustment');
		return $this->find('adjustment_name='.intval($adjustment_name));
	}
	/**
	* dapatkan data detail karyawan berdasarkan person id
	*/
	public function get_detail_adjustment($adjustment_id=0){
		$this->setMainTable('mmi_adjustment');
		return $this->find('adjustment_id='.intval($adjustment_id));
	}
	/**
	* tampil all
	*/
	public function get_tampilAll($id=0){
		
		$sql = 'SELECT jenis_properti.debitur_id FROM mmi_debitur
		INNER JOIN mmi_adjustment ON mmi_adjustment.adjustment_id = mmi_debitur.debitur_id WHERE 1';
		
	}
		/**
	* dapatkan semua data client
	*/
	public function get_data_adjustment($person_name='undefined'){
		$this->setMainTable('mmi_adjustment');
		return $this->findAll('person_was_deleted="N" AND adjustment_person_name="'.$person_name.'"','no limit','no offset','adjustment_id DESC');
	}
	/**
	* simpan data banding 1
	*/
	public function stored_data_adjustment1($id=0){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
			
			'banding1_jenis_properti' => $post_data['banding1_jenis_properti'],
			'banding1_alamat' => $post_data['banding1_alamat'],
			'banding1_blok_no' => $post_data['banding1_blok_no'],
			'banding1_kelurahan' => $post_data['banding1_kelurahan'],
			'banding1_kecamatan' => $post_data['banding1_kecamatan'],
			'banding1_kota' => $post_data['banding1_kota'],
			'banding1_provinsi' => $post_data['banding1_provinsi'],
			'banding1_jarak_dengan_aset' => $post_data['banding1_jarak_dengan_aset'],
			'banding1_nama' => $post_data['banding1_nama'],
			'banding1_telepon' => $post_data['banding1_telepon'],
			'banding1_keterangan' => $post_data['banding1_keterangan'],
			'banding1_nilai_penawaran' => $post_data['banding1_nilai_penawaran'],
			'banding1_tanggal_penawaran' => date('Y-m-d', strtotime($post_data['banding1_tanggal_penawaran'])),
			'banding1_dokumen_tanah' => $post_data['banding1_dokumen_tanah'],
			'banding1_luas_tanah' => $post_data['banding1_luas_tanah'],
			'banding1_bentuk_tanah' => $post_data['banding1_bentuk_tanah'],
			'banding1_frontage' => $post_data['banding1_frontage'],
			'banding1_lebar_jalan' => $post_data['banding1_lebar_jalan'],
			'banding1_letak_tanah' => $post_data['banding1_letak_tanah'],
			'banding1_kondisi_lahan' => $post_data['banding1_kondisi_lahan'],
			'banding1_peruntukan' => $post_data['banding1_peruntukan'],
			'banding1_kontur_tanah' => $post_data['banding1_kontur_tanah'],
			'banding1_kepadatan_bangunan' => $post_data['banding1_kepadatan_bangunan'],
			'banding1_elevasi' => $post_data['banding1_elevasi'],
			'banding1_luas_bangunan' => $post_data['banding1_luas_bangunan'],

			);

			$this->setMainTable('mmi_adjustment');
			$this->setPostData($column);

			$is_exist = $this->get_one('IFNULL(adjustment_id,0)','mmi_adjustment','adjustment_id='.intval($id));
			$where = ($is_exist>0)?'adjustment_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();

			$primary_id = ($id>0)?$id:$insert_id;
			if ($response['status']==200) {
				$this->do_upload_file($primary_id,'adjustment_photo');
			}

			$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan data.':$response['message'];
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* simpan data banding 2
	*/
	public function stored_data_adjustment2($id){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
			'banding2_jenis_properti' => $post_data['banding2_jenis_properti'],
			'banding2_alamat' => $post_data['banding2_alamat'],
			'banding2_blok_no' => $post_data['banding2_blok_no'],
			'banding2_kelurahan' => $post_data['banding2_kelurahan'],
			'banding2_kecamatan' => $post_data['banding2_kecamatan'],
			'banding2_kota' => $post_data['banding2_kota'],
			'banding2_provinsi' => $post_data['banding2_provinsi'],
			'banding2_jarak_dengan_aset' => $post_data['banding2_jarak_dengan_aset'],
			'banding2_nama' => $post_data['banding2_nama'],
			'banding2_telepon' => $post_data['banding2_telepon'],
			'banding2_keterangan' => $post_data['banding2_keterangan'],
			'banding2_nilai_penawaran' => $post_data['banding2_nilai_penawaran'],
			'banding2_tanggal_penawaran' => date('Y-m-d', strtotime($post_data['banding2_tanggal_penawaran'])),
			'banding2_dokumen_tanah' => $post_data['banding2_dokumen_tanah'],
			'banding2_luas_tanah' => $post_data['banding2_luas_tanah'],
			'banding2_bentuk_tanah' => $post_data['banding2_bentuk_tanah'],
			'banding2_frontage' => $post_data['banding2_frontage'],
			'banding2_lebar_jalan' => $post_data['banding2_lebar_jalan'],
			'banding2_letak_tanah' => $post_data['banding2_letak_tanah'],
			'banding2_kondisi_lahan' => $post_data['banding2_kondisi_lahan'],
			'banding2_peruntukan' => $post_data['banding2_peruntukan'],
			'banding2_kontur_tanah' => $post_data['banding2_kontur_tanah'],
			'banding2_kepadatan_bangunan' => $post_data['banding2_kepadatan_bangunan'],
			'banding2_elevasi' => $post_data['banding2_elevasi'],
			'banding2_luas_bangunan' => $post_data['banding2_luas_bangunan'],
			);

			$this->setMainTable('mmi_adjustment');
			$this->setPostData($column);

			$is_exist = $this->save('IFNULL(adjustment_id,0)','mmi_adjustment','adjustment_id='.intval($id));
			$where = ($is_exist>0)?'adjustment_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();

			$primary_id = ($id>0)?$id:$insert_id;
			if ($response['status']==200) {
				$this->do_upload_file($primary_id,'adjustment_photo');
			}

			$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan data.':$response['message'];
		}

		return array(
			'status' => $status,
			'message' => $message,
			);
		}
		/**
	* simpan data banding 3
	*/
	public function stored_data_adjustment3($id){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
			'banding3_jenis_properti' => $post_data['banding3_jenis_properti'],
			'banding3_alamat' => $post_data['banding3_alamat'],
			'banding3_blok_no' => $post_data['banding3_blok_no'],
			'banding3_kelurahan' => $post_data['banding3_kelurahan'],
			'banding3_kecamatan' => $post_data['banding3_kecamatan'],
			'banding3_kota' => $post_data['banding3_kota'],
			'banding3_provinsi' => $post_data['banding3_provinsi'],
			'banding3_jarak_dengan_aset' => $post_data['banding3_jarak_dengan_aset'],
			'banding3_nama' => $post_data['banding3_nama'],
			'banding3_telepon' => $post_data['banding3_telepon'],
			'banding3_keterangan' => $post_data['banding3_keterangan'],
			'banding3_nilai_penawaran' => $post_data['banding3_nilai_penawaran'],
			'banding3_tanggal_penawaran' => date('Y-m-d', strtotime($post_data['banding3_tanggal_penawaran'])),
			'banding3_dokumen_tanah' => $post_data['banding3_dokumen_tanah'],
			'banding3_luas_tanah' => $post_data['banding3_luas_tanah'],
			'banding3_bentuk_tanah' => $post_data['banding3_bentuk_tanah'],
			'banding3_frontage' => $post_data['banding3_frontage'],
			'banding3_lebar_jalan' => $post_data['banding3_lebar_jalan'],
			'banding3_letak_tanah' => $post_data['banding3_letak_tanah'],
			'banding3_kondisi_lahan' => $post_data['banding3_kondisi_lahan'],
			'banding3_peruntukan' => $post_data['banding3_peruntukan'],
			'banding3_kontur_tanah' => $post_data['banding3_kontur_tanah'],
			'banding3_kepadatan_bangunan' => $post_data['banding3_kepadatan_bangunan'],
			'banding3_elevasi' => $post_data['banding3_elevasi'],
			'banding3_luas_bangunan' => $post_data['banding3_luas_bangunan'],

			);

			$this->setMainTable('mmi_adjustment');
			$this->setPostData($column);

			$is_exist = $this->save('IFNULL(adjustment_id,0)','mmi_adjustment','adjustment_id='.intval($id));
			$where = ($is_exist>0)?'adjustment_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();

			$primary_id = ($id>0)?$id:$insert_id;
			if ($response['status']==200) {
				$this->do_upload_file($primary_id,'adjustment_photo');
			}

			$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan data.':$response['message'];
		}

		return array(
			'status' => $status,
			'message' => $message,
			);
		}
		/**
		*
		*/
		public function get_adjustment_person(){
		$sql = 'SELECT * FROM mmi_adjustment
		INNER JOIN mmi_debitur ON mmi_adjustment.adjustment_id = mmi_debitur.debitur_id WHERE 1';
		
		$this->query = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		return $this->query;
			$data_arr = array();
				while ($row = mysqli_fetch_assoc($query)) {
			$data_arr[] = $row;
			}
				return $data_arr;
		}
		/**
	* dapatkan laporan data adjustment
	*/
	public function get_report_data_adjustment(){
		$where = 1;

		$sql = '
			SELECT *
			FROM mmi_person
			INNER JOIN mmi_adjustment ON mmi_person.person_adjustment_id = mmi_adjustment.adjustment_id
			INNER JOIN mmi_debitur ON mmi_debitur.debitur_adjustmnet_id=mmi_adjustment.adjustment_id
			INNER JOIN mmi_client ON mmi_client.client_adjustment_id=mmi_adjustment.adjustment_id
			
			WHERE '.$where.'
		';
		//echo '<pre>'; print_r($sql); exit;
		$exec = $this->query($sql);
		$result = $this->result_array($exec);
		//echo '<pre>'; print_r($result); exit;
		return $result;
	}
	/**
	Dokumen Tanah
	*/
	public function base_adjustment_dokumen_tanah(){
		return array(
			'1' => 'Sertifikat Hak Milik',
			'2' => 'Sertifikat Hak Milik Induk',
			'3' => 'Sertifikat Hak Guna Bangunan',
			'4' => 'Sertifikat Hak Milik Atas Satuan Rumah Susun',
			'5' => 'Sertifikat Hak Pakai',
			'6' => 'Sertifikat Hak Pengelolaan',
			'7' => 'Akte Jual Beli',
			'8' => 'Pengikatan Perjanjian Jual Beli',
		);
	}
	/**
	* base bentuk tanah
	*/
	public function base_adjustment_bentuk_tanah(){
		return array(
			'B' => 'Tanah Beraturan',
			'KB' => 'Kurang Beraturan',
			'M' =>	'Mengantong',
			'L' => 'Letter L',
			'TRZ' => 'Trapesium',
			'TB' => 'Tidak Beraturan',
		);
	}
	/**
	* base kontur tanah / topografi
	*/
	public function base_adjustment_topografi(){
		return array(
			'dat' => 'Datar',
			'beg' => 'Bergelombang',
			'ber' => 'Berbukit',
			'lan' => 'Landai',
		);
	}
	/**
	* base peruntukan
	*/
	public function base_adjustment_peruntukan(){
		return array(
			'1' => 'Penghijauan',
			'2' => 'Campuran',
			'3' => 'Perumahan/Hunian (Wbs/Wsd/Wkc)',
			'4' => 'Komersial/Ruko/Rukan',
			'5' => 'Pertanian',
			'6' => 'Pergudangan',
			'7' => 'Industri',
			'8' => 'Wisma Taman',
		);
	}
	/**
	* base kondisi lahan
	*/
	public function base_adjustment_kondisi_lahan(){
		return array(
			'A' => 'Rata',
			'B' => 'Belum Matang',
			'C' => 'Bergelombang',
			'D' => 'Berbukit',
			'E' => 'Dibawah Permukaan Jalan',
		);
	}
	/**
	* base kepadatan bangunan
	*/
	public function base_adjustment_kepadatan_bangunan(){
		return array(
			'T' => 'Tinggi',
			'S' => 'Sedang',
			'R' => 'Rendah',
		);
	}
	/**
	* base letak tanah
	*/
	public function base_adjustment_letak_tanah(){
		return array(
			'T' => 'Tengah',
			'S'	=> 'Sudut',
			'TS' => 'Tusuk Sate',
			'K' => 'Kuldesak',
			'DU' => 'Diujung Jalan',
		);
	}
	/**
	Jenis Properti
	*/
	public function base_adjustment_jenis_properti(){
		return array(
			'1'=>'Rumah Tinggal Sederhana 1 Lantai',
			'2'=>'Rumah Tinggal Menengah 1 Lantai',
			'3'=>'Rumah Tinggal Mewah 1 Lantai',
			'4'=>'Rumah Tinggal Ekslusif 1 Lantai',
			'5'=>'Rumah Tinggal Sederhana 2 Lantai',
			'6'=>'Rumah Tinggal Menengah 2 Lantai',
			'7'=>'Rumah Tinggal Mewah 2 Lantai',
			'8'=>'Rumah Tinggal Ekslusif 2 Lantai',
			'9'=>'Bangunan Perkebunan',
			'10'=>'Gudang',
			'11'=>'Bangunan Gedung Bertingkat Rendah',
			'12'=>'Bangunan Gedung Bertingkat Sedang',
			'13'=>'Bangunan Gedung Bertingkat Tinggi',
		);
	}

	/**
	Keterangan
	*/
	public function base_adjustment_keterangan(){
		return array(
			'1'=>'Pemilik',
			'2'=>'Kerabat Pemilik',
			'3'=>'Agen Properti',
			'4'=>'Perantara',
			'5'=>'Developer',
			'6'=>'Pemasaran',
		);
	}

/**
Persentase nilai
*/
public function base_adjustment_persentase_objek(){
		return array(
			'1' => '-1%',
			'2' => '-2%',
			'3' => '-3%',
			'4' => '-4%',
			'5' => '-5%',
			'6' => '-6%',
			'7' => '-7%',
			'8' => '-8%',
			'9' => '-9%',
			'10' => '-10%',
			'11'=> '0%',
			'12' => '1%',
			'13' => '2%',
			'14' => '3%',
			'15' => '4%',
			'16' => '5%',
			'17' => '6%',
			'18' => '7%',
			'19' => '8%',
			'20' => '9%',
			'21' => '10%',
		);
	}

	/**
	* form validasi
	*/
	public function form_validation_adjustment($adjustment_id=0){
		$form_required = array(

		'banding1_jenis_properti' => 'Jenis Properti',
		'banding1_alamat' => 'Alamat',
		'banding1_blok_no' => 'Blok / No',
		'banding1_kelurahan' => 'Kelurahan',
		'banding1_kecamatan' => 'Kecamatan',
		'banding1_kota' => 'Kota',
		'banding1_provinsi' => 'Provinsi',
		'banding1_jarak_dengan_aset' => 'Jarak Pembanding Dengan Properti',
		'banding1_nama' => 'Sumber Data',
		'banding1_telepon' => 'No. Telepon',
		'banding1_keterangan' => 'Keterangan',
		'banding1_nilai_penawaran' => 'Nilai Penawaran',
		'banding1_tanggal_penawaran' => 'Tanggal Penawaran',
		'banding1_dokumen_tanah' => 'Dokumen Tanah',
		'banding1_luas_tanah' => 'Luas Tanah',
		'banding1_bentuk_tanah' => 'Bentuk Tanah',
		'banding1_frontage' => 'Lebar Depan (Frontage)',
		'banding1_lebar_jalan' => 'Lebar Jalan (m)',
		'banding1_letak_tanah' => 'Letak Tanah',
		'banding1_kondisi_lahan' => 'Kondisi Lahan',
		'banding1_peruntukan' => 'Peruntukan',
		'banding1_kontur_tanah' => 'Kontur Tanah / Topografi',
		'banding1_kepadatan_bangunan' => 'Kepadatan Bangunan',
		'banding1_elevasi' => 'Elevasi',
		'banding1_luas_bangunan' => 'Luas Bangunan',
		/*'banding2_jenis_properti' => 'Jenis Properti',
		'banding2_alamat' => 'Alamat',
		'banding2_blok_no' => 'Blok / No',
		'banding2_kelurahan' => 'Kelurahan',
		'banding2_kecamatan' => 'Kecamatan',
		'banding2_kota' => 'Kota',
		'banding2_provinsi' => 'Provinsi',
		'banding2_jarak_dengan_aset' => 'Jarak Pembanding Dengan Properti',
		'banding2_nama' => 'Sumber Data',
		'banding2_telepon' => 'No. Telepon',
		'banding2_keterangan' => 'Keterangan',
		'banding2_nilai_penawaran' => 'Nilai Penawaran',
		'banding2_tanggal_penawaran' => 'Tanggal Penawaran',
		'banding2_dokumen_tanah' => 'Dokumen Tanah',
		'banding2_luas_tanah' => 'Luas Tanah',
		'banding2_bentuk_tanah' => 'Bentuk Tanah',
		'banding2_frontage' => 'Lebar Depan (Frontage)',
		'banding2_lebar_jalan' => 'Lebar Jalan (m)',
		'banding2_letak_tanah' => 'Letak Tanah',
		'banding2_kondisi_lahan' => 'Kondisi Lahan',
		'banding2_peruntukan' => 'Peruntukan',
		'banding2_kontur_tanah' => 'Kontur Tanah / Topografi',
		'banding2_kepadatan_bangunan' => 'Kepadatan Bangunan',
		'banding2_elevasi' => 'Elevasi',
		'banding2_luas_bangunan' => 'Luas Bangunan',
		'banding3_jenis_properti' => 'Jenis Properti',
		'banding3_alamat' => 'Alamat',
		'banding3_blok_no' => 'Blok / No',
		'banding3_kelurahan' => 'Kelurahan',
		'banding3_kecamatan' => 'Kecamatan',
		'banding3_kota' => 'Kota',
		'banding3_provinsi' => 'Provinsi',
		'banding3_jarak_dengan_aset' => 'Jarak Pembanding Dengan Properti',
		'banding3_nama' => 'Sumber Data',
		'banding3_telepon' => 'No. Telepon',
		'banding3_keterangan' => 'Keterangan',
		'banding3_nilai_penawaran' => 'Nilai Penawaran',
		'banding3_tanggal_penawaran' => 'Tanggal Penawaran',
		'banding3_dokumen_tanah' => 'Dokumen Tanah',
		'banding3_luas_tanah' => 'Luas Tanah',
		'banding3_bentuk_tanah' => 'Bentuk Tanah',
		'banding3_frontage' => 'Lebar Depan (Frontage)',
		'banding3_lebar_jalan' => 'Lebar Jalan (m)',
		'banding3_letak_tanah' => 'Letak Tanah',
		'banding3_kondisi_lahan' => 'Kondisi Lahan',
		'banding3_peruntukan' => 'Peruntukan',
		'banding3_kontur_tanah' => 'Kontur Tanah / Topografi',
		'banding3_kepadatan_bangunan' => 'Kepadatan Bangunan',
		'banding3_elevasi' => 'Elevasi',
		'banding3_luas_bangunan' => 'Luas Bangunan',*/
 
		);
/*
		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				if (array_key_exists($key, $form_required) AND empty($_POST[$key])) {
					return array(
						'status' => 500,
						'message' => $form_required[$key].' wajib diisi.',
					);
				}


				// validasi no. telp
				if (trim($key)=="adjustment_") {
					if (!is_numeric($value)) {
						return array(
							'status' => 500,
							'message' => 'No. Telepon harus diisi dengan angka.',
						);
					}
				}*/
		return array(
			'status' => 200,
			'message' => 'OK',
		);
	}
}
?>