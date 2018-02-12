<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class banding_lib extends db_utility_lib
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
		$allow_ext = array('jpeg','png','gif');

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
	public function do_upload_file($banding_id=0, $fileName='undefined'){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		// requirement
		$pathFile = 'assets/images/banding/';

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
				$old_file = $this->get_one('banding_photo','mmi_banding','banding_id='.intval($banding_id));
				if (trim($old_file)!='' AND file_exists(FCPATH.$pathFile.$old_file)) {
					unlink(FCPATH.$pathFile.$old_file);
				}

				// additional variable
				$new_file_name = date('YmdHis').'_'.$_FILES[$fileName]['name'];

				if (move_uploaded_file($_FILES[$fileName]['tmp_name'], FCPATH.$pathFile.$new_file_name)) {
					// simpan nama file kedalam database
					$column = array(
						'banding_photo' => $new_file_name,
					);
					$this->setMainTable('mmi_banding');
					$this->setPostData($column);
					$this->save('banding_id='.intval($banding_id));

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
		$this->setMainTable('mmi_banding');
		$column = array(
			'person_was_deleted' => 'Y',
		);
		$this->setPostData($column);
		$response = $this->save('person_was_deleted="N" AND banding_id='.intval($banding_id));
		return array(
			'status' => $response['status'],
			'message' => ($response['status']==200)?'Data berhasil dihapus.':'Data tidak tersedia.',
		);
	}
	/**
	* dapatkan data detail debitur berdasarkan name
	*/
	public function get_detail_banding_by_name($banding_nama_informan=0){
		$this->setMainTable('mmi_banding');
		return $this->find('banding_nama_informan='.intval($banding_nama_informan));
	}
	/**
	* dapatkan data detail debitur berdasarkan debitur id
	*/
	public function get_detail_banding($banding_id=0){
		$this->setMainTable('mmi_banding');
		return $this->find('banding_id='.intval($banding_id));
	}
	/**
	* dapatkan semua data debitur
	*/
	public function get_data_banding(){
		$this->setMainTable('mmi_banding');
		return $this->findAll('person_was_deleted="N"','no limit','no offset','banding_id DESC');
	}
	/**
	* base bentuk jenis kredit
	*/
	public function base_banding_keterangan_info(){
		return array(
			'1' => 'Pemilik',
			'2' => 'Kerabat Pemilik',
			'3' => 'Agen Properti',
			'4' => 'Perantara',
			'5' => 'Developer',
			'6' => 'Pemasaran',
		);
	}
	/**
	* base banding dokumen tanah
	*/
	public function base_banding_dokumen_tanah(){
		return array(
			'SHM' => 'Sertifikat Hak Milik',
			'SHGB' => 'Sertifikat Hak Guna Bangun',
		);
	}
	/**
	* base hubungan dengan calon nasabah
	*/
	public function base_banding_hub_dng_nasabah(){
		return array(
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
	public function base_banding_bntk_tanah(){
		return array(
			'B' => 'Tanah Beraturan',
			'TB' =>	'Tanah Bergelombang',
			'TRZ' => 'Trapesium',
		);
	}
	/**
	* base pos lokasi
	*/
	public function base_banding_posisi_lokasi(){
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
	public function base_banding_kpdtan_bangunan(){
		return array(
			'T' => 'Tinggi',
			'S' => 'Sedang',
			'R' => 'Rendah',
		);
	}
	/**
	* base keadaan halaman
	*/
	public function base_banding_keadaan_hal(){
		return array(
			'TB' => 'Tertata Baik',
			'BT' => 'Belum Tertata',
			'TT' => 'Tidak Tertata',
		);
	}
	/**
	* base kontur tanah
	*/
	public function base_banding_topografi(){
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
	public function base_banding_jenis_tanah(){
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
	public function base_banding_peruntukan(){
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
	public function base_banding_kondisi_lahan(){
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
	public function base_banding_kondisi_bangunan(){
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
	* simpan data
	*/
	public function stored_data($id=0){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
			    'banding_jenis_properti' => $post_data['banding_jenis_properti'], 
				'banding_lokasi' => $post_data['banding_lokasi'],
				'banding_jalan_blok' => $post_data['banding_jalan_blok'], 
				'banding_no_rumah' => $post_data['banding_no_rumah'],
				'banding_kelurahan' => $post_data['banding_kelurahan'],
				'banding_kecamatan' => $post_data['banding_kecamatan'],
				'banding_kota' => $post_data['banding_kota'],
				'banding_provinsi' => $post_data['banding_provinsi'],
				'banding_jarak_dng_aset' => $post_data['banding_jarak_dng_aset'],
				'banding_arah_dng_aset' => $post_data['banding_arah_dng_aset'],
				'banding_nama_informan' => $post_data['banding_nama_informan'],
				'banding_telephone' => $post_data['banding_telephone'],
				'banding_keterangan_info' => $post_data['banding_keterangan_info'],
				'banding_harga' => $post_data['banding_harga'],
				'banding_discount' => $post_data['banding_discount'], 
				'banding_tanggal' => date('Y-m-d', strtotime($post_data['banding_tanggal'])),
				'banding_luas_tanah' => $post_data['banding_luas_tanah'], 
				'banding_dokumen_tanah' => $post_data['banding_dokumen_tanah'],
				'banding_no_sertifikat' => $post_data['banding_no_sertifikat'],
				'banding_tanggal_terbit' => date('Y-m-d', strtotime($post_data['banding_tanggal_terbit'])),
				'banding_no_gs_su' => $post_data['banding_no_gs_su'],
				'banding_tgl_gs_su' => date('Y-m-d', strtotime($post_data['banding_tgl_gs_su'])),
				'banding_tgl_berlaku' => date('Y-m-d', strtotime($post_data['banding_tgl_berlaku'])),
				'banding_an_sertifikat' => $post_data['banding_an_sertifikat'],
				'banding_hub_dng_nasabah' => $post_data['banding_hub_dng_nasabah'],
				'banding_frontage' => $post_data['banding_frontage'],
				'banding_leb_jln_dpn_aset' => $post_data['banding_leb_jln_dpn_aset'],
				'banding_leb_jln_masuk' => $post_data['banding_leb_jln_masuk'],
				'banding_bntk_tanah' => $post_data['banding_bntk_tanah'],
				'banding_posisi_lokasi' => $post_data['banding_posisi_lokasi'],
				'banding_kpdtan_bangunan' => $post_data['banding_kpdtan_bangunan'],
				'banding_ehtj' => $post_data['banding_ehtj'],
				'banding_ehtl' => $post_data['banding_ehtl'],
				'banding_keadaan_hal' => $post_data['banding_keadaan_hal'],
				'banding_topografi' => $post_data['banding_topografi'],
				'banding_luas_bangunan' => $post_data['banding_luas_bangunan'],
				'banding_jenis_tanah' => $post_data['banding_jenis_tanah'],
				'banding_peruntukan' => $post_data['banding_peruntukan'],
				'banding_kondisi_lahan' => $post_data['banding_kondisi_lahan'],
				'banding_kondisi_bangunan' => $post_data['banding_kondisi_bangunan'],
				'banding_tahun_bangun' => $post_data['banding_tahun_bangun'],
   		);

			$this->setMainTable('mmi_banding');
			$this->setPostData($column);

			$is_exist = $this->get_one('IFNULL(banding_id,0)','mmi_banding','banding_id='.intval($id));
			$where = ($is_exist>0)?'banding_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();

			$primary_id = ($id>0)?$id:$insert_id;
			if ($response['status']==200) {
				$this->do_upload_file($primary_id,'banding_photo');
			}

			$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan data.':$response['message'];
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* form validasi
	*/
	public function form_validation($banding_id=0){
		$form_required = array(
			    'banding_jenis_properti' => 'Jenis Property', 
				'banding_lokasi' => 'Lokasi Aset', 
				'banding_jalan_blok' => 'Jalan / Blok', 
				'banding_no_rumah' => 'Nomor Rumah',
				'banding_kelurahan' => 'Kelurahan',
				'banding_kecamatan' => 'Kecamatan',
				'banding_kota' => 'Kota',
				'banding_provinsi' => 'Provinsi', 
				'banding_jarak_dng_aset' => 'Jarak Dengan Aset', 
				'banding_arah_dng_aset' => 'Arah Dengan Aset', 
				'banding_nama_informan' => 'Nama Pemberi Informasi',
				'banding_telephone' => 'No. Telepon',
				'banding_keterangan_info' => 'Keterangan',
				'banding_harga' => 'Harga',
				'banding_discount' => 'Discount',
				'banding_tanggal' => 'Tanggal Pemeriksaan',
				'banding_luas_tanah' => 'Luas Tanah',
				'banding_dokumen_tanah' => 'Dokumen Tanah',
				'banding_no_sertifikat' => 'No. Sertifikat',
				'banding_tanggal_terbit' => 'Tanggal Terbit Sertifikat',
				'banding_no_gs_su' => 'No. GS / SU',
				'banding_tgl_gs_su' => 'Tanggal GS / SU',
				'banding_tgl_berlaku' => 'Berlaku Sampai Dengan',
				'banding_an_sertifikat' => 'Atas Nama Sertifikat',
				'banding_hub_dng_nasabah' => 'Hubungan Dengan Nasabah',
				'banding_frontage' => 'Frontage',
				'banding_leb_jln_dpn_aset' => 'Lebar Jalan Depan Aset',
				'banding_leb_jln_masuk' => 'Lebar Jalan Masuk Aset',
				'banding_bntk_tanah' => 'Bentuk Tanah',
				'banding_posisi_lokasi' => 'Posisi Lokasi',
				'banding_kpdtan_bangunan' => 'Kepadatan Bangunan',
				'banding_ehtj' => 'Elevasi Halaman Terhadap Jalan',
				'banding_ehtl' => 'Elevasi Halaman Terhadap Lantai',
				'banding_keadaan_hal' => 'Keadaan Halaman',
				'banding_topografi' => 'Topografi',
				'banding_luas_bangunan' => 'Luas Bangunan',
				'banding_jenis_tanah' => 'Jenis Tanah',
				'banding_peruntukan' => 'Peruntukan',
				'banding_kondisi_lahan' => 'Kondisi Lahan',
				'banding_kondisi_bangunan' => 'Kondisi Bangunan',
				'banding_tahun_bangun' => 'Tahun Dibangun',
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
				if (trim($key)=="banding_phone") {
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