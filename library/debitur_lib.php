<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class debitur_lib extends db_utility_lib
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
		$allow_ext = array('jpg','jpeg','png','gif');

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
	public function do_upload_file($debitur_id=0, $fileName='undefined'){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		// requirement
		$pathFile = 'assets/images/debitur/';

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
				$old_file = $this->get_one('debitur_photo','mmi_debitur','debitur_id='.intval($debitur_id));
				if (trim($old_file)!='' AND file_exists(FCPATH.$pathFile.$old_file)) {
					unlink(FCPATH.$pathFile.$old_file);
				}

				// additional variable
				$new_file_name = date('YmdHis').'_'.$_FILES[$fileName]['name'];

				if (move_uploaded_file($_FILES[$fileName]['tmp_name'], FCPATH.$pathFile.$new_file_name)) {
					// simpan nama file kedalam database
					$column = array(
						'debitur_photo' => $new_file_name,
					);
					$this->setMainTable('mmi_debitur');
					$this->setPostData($column);
					$response = $this->save('debitur_id='.intval($debitur_id));

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
	* hapus data
	*/
	public function stored_delete_data($debitur_id=0){
		$this->setMainTable('mmi_debitur');
		$column = array(
			'person_was_deleted' => 'Y',
		);
		$this->setPostData($column);
		$response = $this->save('person_was_deleted="N" AND debitur_id='.intval($debitur_id));
		return array(
			'status' => $response['status'],
			'message' => ($response['status']==200)?'Data berhasil dihapus.':'Data tidak tersedia.',
		);
	}
	/**
	* dapatkan data detail debitur berdasarkan name
	*/
	public function get_detail_debitur_by_name($debitur_name=0){
		$this->setMainTable('mmi_debitur');
		return $this->find('debitur_name='.intval($debitur_name));
	}
	/**
	* dapatkan data detail debitur berdasarkan debitur id
	*/
	public function get_detail_debitur($debitur_id=0){
		$this->setMainTable('mmi_debitur');
		return $this->find('debitur_id='.intval($debitur_id));
	}
	/**
	* dapatkan semua data debitur
	*/
	public function get_data(){
		$this->setMainTable('mmi_debitur');
		return $this->findAll('person_was_deleted="N"','no limit','no offset','debitur_id DESC');
	}
	/**
	* base dokumen tanah
	*/
	public function base_dokumen_tanah(){
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
	* base hubungan dengan calon nasabah
	*/
	public function base_hub_dng_debitur(){
		return array(
			'II' => 'Pemilik',
			'AA' => 'Istri',
			'BB' => 'Orang Tua',
			'CC' => 'Penjual',
			'DD' => 'Saudara',
			'EE' => 'Anak',
			'FF' => 'Agen Properti',
			'GG' => 'Adik Kandung',
			'HH' => 'Orang Lain',
		);
	}
	/**
	* base bentuk tanah
	*/
	public function base_bentuk_tanah(){
		return array(
			'B' => 'Tanah Beraturan',
			'TB' =>	'Tanah Bergelombang',
			'TRZ' => 'Trapesium',
		);
	}
	/**
	* base pos lokasi
	*/
	public function base_pos_lokasi(){
		return array(
			'T' => 'Tengah',
			'S'	=> 'Sudut',
			'TS' => 'Tusuk Sate',
			'K' => 'Kuldesak',
			'DU' => 'di Ujung Jalan',
		);
	}
	/**
	* base kepadatan bangunan
	*/
	public function base_kepadatan_bangunan(){
		return array(
			'T' => 'Tinggi',
			'S' => 'Sedang',
			'R' => 'Rendah',
		);
	}
	/**
	* base keadaan halaman
	*/
	public function base_keadaan_halaman(){
		return array(
			'TB' => 'Tertata Baik',
			'BT' => 'Belum Tertata',
			'TT' => 'Tidak Tertata',
		);
	}
	/**
	* base kontur tanah
	*/
	public function base_kontur_tanah(){
		return array(
			'dat' => 'Datar',
			'beg' => 'Bergelombang',
			'ber' => 'Berbukit',
			'lan' => 'Landai',
		);
	}
	/**
	* base jenis tanah
	*/
	public function base_jenis_tanah(){
		return array(
			'TD' => 'Tanah Darat',
			'SHW' => 'Sawah',
			'RW' => 'Rawa',
			'TBM' => 'Tanah Belum Matang',
		);
	}
	/**
	* base peruntukan
	*/
	public function base_peruntukan(){
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
	public function base_kondisi_lahan(){
		return array(
			'A' => 'Rata',
			'B' => 'Belum Matang',
			'C' => 'Bergelombang',
			'D' => 'Berbukit',
			'E' => 'Dibawah Permukaan Jalan',
		);
	}
	/**
	* base kondisi bangunan
	*/
	public function base_kondisi_bangunan(){
		return array(
			'1' => 'Baik',
			'2' => 'Sangat Baik',
			'3' => 'Cukup',
			'4' => 'Kurang',
			'5' => 'Jelek',
			'6' => 'Sangat Jelek',
		);
	}
	/**
	* base penggunaan
	*/
	public function base_penggunaan(){
		return array(
			'TT' => 'Tempat Tinggal/Hunian',
			'TU' => 'Tempat Usaha',
			'TTTU' => 'Hunian dan Tempat Usaha',
			'K' => 'Kantor',
			'B' => 'Bengkel',
		);
	}
	/**
	* base bentuk jenis kredit
	*/
	public function base_jenis_kredit(){
		return array(
			'1' => 'KPR FLPP',
			'2' => 'Pembiayaan Bangunan Rumah',
			'3' => 'Kredit Agunan Rumah',
			'4' => 'Kredit Yasa Griya',
			'5' => 'Kredit Griya Multi',
			'6' => 'Kredit Griya Utama',
			'7' => 'Kredit Griya Utama (SH)',
			'8' => 'KGU (Indent)',
		);
	}
	/**
	* base bentuk arsitektur
	*/
	public function base_bntk_arsitek(){
		return array(
			'STD' => 'Standar',
			'CP' => 'Couple',
			'MDT' => 'Mediteranian',
			'MIN' => 'Minimalis',
		);
	}
	/**
	* base penggunaan terbaik
	*/
	public function base_peng_terbaik(){
		return array(
			'1' => 'Tempat Tinggal/Hunian',
			'2' => 'Tempat Usaha/Komersial',
			'3' => 'Sekolah/Sarana pendidikan',
			'4' => 'Kantor',
			'5' => 'Hotel',
			'6' => 'Ruko/Komersial',
		);
	}
	/**
	*Jenis Properti
	*/
	public function base_jenis_properti(){
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
	* base marketability
	*/
	public function base_marketability(){
		return array(
			'1' => 'Marketable dan Saleable',
			'2' => 'Marketable',
			'3' => 'Cukup Marketable',
			'4' => 'Kurang Marketable',
			'5' => 'Tidak Marketable',
		);
	}
	/**
	* simpan data
	*/
	public function stored_data($id=0){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
				'jenis_kredit' => $post_data['jenis_kredit'],
			    'no_penugasan' => $post_data['no_penugasan'],
			    'tgl_penugasan' => date('Y-m-d', strtotime($post_data['tgl_penugasan'])),
			    'tgl_pemeriksaan' => date('Y-m-d', strtotime($post_data['tgl_pemeriksaan'])),
			    'nama_debitur' => $post_data['nama_debitur'],
			    'lokasi_aset' => $post_data['lokasi_aset'],
			    'alamat_aset' => $post_data['alamat_aset'],
			    'blok_no' => $post_data['blok_no'],
			    'kelurahan' => $post_data['kelurahan'],
			    'kecamatan' => $post_data['kecamatan'],
			    'kota' => $post_data['kota'],
			    'provinsi' => $post_data ['provinsi'],
			    'kode_pos' => $post_data ['kode_pos'],
			    'jenis_properti' => $post_data['jenis_properti'],
			    'luas_tanah' => $post_data['luas_tanah'],
			    'dokumen_tanah' => $post_data['dokumen_tanah'],
			    'no_sertifikat' => $post_data['no_sertifikat'],
			    'tgl_terbit' => date('Y-m-d', strtotime($post_data['tgl_terbit'])),
			    'no_gs_su' => $post_data['no_gs_su'],
			    'tgl_gs_su' => date('Y-m-d', strtotime($post_data['tgl_gs_su'])),
			    'tgl_berlaku' => date('Y-m-d', strtotime($post_data['tgl_berlaku'])),
			    'an_dokumen' => $post_data['an_dokumen'],
			    'hub_dng_debitur' => $post_data['hub_dng_debitur'],
			    'frontage' => $post_data['frontage'],
			    'leb_jln_depan' => $post_data['leb_jln_depan'],
			    'leb_jln_masuk' => $post_data['leb_jln_masuk'],
			    'bentuk_tanah' => $post_data['bentuk_tanah'],
			    'pos_lokasi' => $post_data['pos_lokasi'],
			    'kepadatan_bangunan' => $post_data['kepadatan_bangunan'],
			    'ehtj' => $post_data['ehtj'],
			    'ehtl' => $post_data['ehtl'],
			    'keadaan_halaman' => $post_data['keadaan_halaman'],
			    'kontur_tanah' => $post_data['kontur_tanah'],
			    'luas_bangunan' => $post_data['luas_bangunan'],
			    'jenis_tanah' => $post_data['jenis_tanah'],
			    'peruntukan' => $post_data['peruntukan'],
			    'kondisi_lahan' => $post_data['kondisi_lahan'],
			    'kondisi_bangunan' => $post_data['kondisi_bangunan'],
			    'thn_bangun' => $post_data['thn_bangun'],
			    'imb' =>  $post_data['imb'],
			    'luas_bangunan_imb' => $post_data['luas_bangunan_imb'],
			    'tgl_terbit_imb' => date('Y-m-d', strtotime($post_data['tgl_terbit_imb'])),
			    'thn_renov' => $post_data['thn_renov'],
			    'penggunaan' => $post_data['penggunaan'],
			    'bntk_arsitek' => $post_data['bntk_arsitek'],
			    'batas_depan' => $post_data['batas_depan'],
			    'batas_belakang' => $post_data['batas_belakang'],
			    'batas_kanan' => $post_data['batas_kanan'],
			    'batas_kiri' => $post_data['batas_kanan'],
			    'status_obyek_sebagai' => $post_data['status_obyek_sebagai'],
			    'peng_terbaik' => $post_data['peng_terbaik'],
			    'marketability' => $post_data['marketability'],
   		);

			// prepare to be save mmi_debitur
			$this->setMainTable('mmi_debitur');
			$this->setPostData($column);

			// has check update data
			$primary_id = $this->get_one('IFNULL(debitur_id,0)','mmi_debitur','debitur_id='.intval($id));
			$where = ($primary_id>0)?'debitur_id='.intval($primary_id):'';
			$response = $this->save($where);
			$debitur_id = ($primary_id>0)?$primary_id:$this->insert_id();

			// prepare  PostData
			$column = array(
				'client_name' => $post_data['client_name'],
				'client_debitur_id ' => $debitur_id,
			    'client_person_name' => $post_data['client_person_name'],
			    'client_atasan_penilai' => $post_data['client_atasan_penilai'],
			    'client_pejabat_BTN' => $post_data['client_pejabat_BTN'],
			    'client_jabatan_BTN' => $post_data['client_jabatan_BTN'],
			    'client_report' => $post_data['client_report'],
			    'client_report_number' => $post_data['client_report_number'],
			    'client_appraisal_date' => date('Y-m-d', strtotime($post_data['client_appraisal_date'])),
			    'client_statement_date' => date('Y-m-d', strtotime($post_data['client_statement_date'])),
			);			

			// prepare to be save mmi_client
			$this->setMainTable('mmi_client');
			$this->setPostData($column);
			$primary_id = $this->get_one('IFNULL(client_debitur_id,0)','mmi_client','client_debitur_id='.intval($id));
			$where = ($primary_id>0)?'client_debitur_id='.intval($primary_id):'';
			$response = $this->save($where);

			$debitur_id = ($id>0)?$id:$debitur_id;
			if ($response['status']==200) {
				$response = $this->do_upload_file($debitur_id,'debitur_photo');
			}

			$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan':$response['message'];
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* form validasi
	*/
	public function form_validation($debitur_id=0){
		$form_required = array(
				'client_name' => 'PKS Cabang',
				'client_report' => 'Laporan Ditujukan ke',
				'client_report_number' => 'No. Laporan',
				'client_appraisal_date' => 'Tanggal Penilaian',
			    'client_statement_date' => 'Tanggal Laporan',
				'jenis_kredit' => 'Jenis Kredit',
			    'no_penugasan' => 'Nomor Penugasan',
			    'tgl_penugasan' => 'Tanggal Penugasan',
			    'tgl_pemeriksaan' => 'Tanggal Pemeriksaan',
			    'nama_debitur' => 'Nama Debitur',
			    'lokasi_aset' => 'Lokasi Aset',
			    'alamat_aset' => 'Alamat Aset',
			    'blok_no' => 'Nomor Rumah/Blok',
			    'kelurahan' => 'Kelurahan',
			    'kecamatan' => 'Kecamatan',
			    'kota' => 'Kota',
			    'provinsi' => 'Provinsi',
			    'kode_pos' => 'Kode Pos',
			    'jenis_properti' => 'Jenis Properti',
			    'luas_tanah' => 'Luas Tanah',
			    'dokumen_tanah' => 'Dokumen Tanah',
			    'no_sertifikat' => 'Nomor Sertifikat',
			    'tgl_terbit' => 'Tanggal Terbit',
			    'no_gs_su' => 'Nomor GS/SU',
			    'tgl_gs_su' => 'Tanggal GS/SU',
			    'tgl_berlaku' => 'Berlaku Sampai Dengan',
			    'an_dokumen' => 'Atas Nama',
			    'hub_dng_debitur' => 'Hubungan Dengan Calon Nasabah',
			    'frontage' => 'Frontage',
			    'leb_jln_depan' => 'Lebar Jalan Depan',
			    'leb_jln_masuk' => 'Lebar Jalan Masuk',
			    'bentuk_tanah' => 'Bentuk Tanah',
			    'pos_lokasi' => 'Posisi Lokasi',
			    'kepadatan_bangunan' => 'Kepadatan Bangunan',
			    'ehtj' => 'Elevasi Halaman Terhadap Jalan',
			    'ehtl' => 'Elevasi Halaman Terhadap Lantai',
			    'keadaan_halaman' => 'Keadaan Halaman',
			    'kontur_tanah' => 'Kontur Tanah/Topografi',
			    'luas_bangunan' => 'Luas Bangunan',
			    'jenis_tanah' => 'Jenis Tanah',
			    'peruntukan' => 'Peruntukan',
			    'kondisi_lahan' => 'Kondisi Lahan',
			    'kondisi_bangunan' => 'Kondisi Bangunan',
			    'thn_bangun' => 'Tahun Dibangun',
			    'imb' =>  'Nomor Izin Mendirikan Bangunan',
			    'luas_bangunan_imb' => 'Luas Bangunan Sesuai IMB',
			    'tgl_terbit_imb' => 'Tanggal Terbit',
			    'thn_renov' => 'Tahun Renovasi',
			    'penggunaan' => 'penggunaan',
			    'bntk_arsitek' => 'Bentuk Arsitektur',
			    'batas_depan' => 'Batas Depan',
			    'batas_belakang' => 'Batas Belakang',
			    'batas_kanan' => 'Batas Kanan',
			    'batas_kiri' => 'Batas Kiri',
			    'status_obyek_sebagai' => 'Status Obyek Sebagai',
			    'peng_terbaik' => 'Penggunaan Terbaik',
			    'marketability' => 'Marketability',
		);

		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				if (array_key_exists($key, $form_required) AND empty($_POST[$key])) {
					return array(
						'status' => 500,
						'message' => $form_required[$key].' wajib diisi.',
					);
				}

				
				// validasi no. telp
				if (trim($key)=="debitur_phone") {
					if (!is_numeric($value)) {
						return array(
							'status' => 500,
							'message' => 'No. Telepon harus diisi dengan angka.',
						);
					}
				}
			}
		}

		return array(
			'status' => 200,
			'message' => 'OK',
		);
	}
}
?>