<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class pernyataan_lib extends db_utility_lib
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
		$pathFile = 'assets/images/btb/';

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
				$old_file = $this->get_one('mmi_btb','btb_id='.intval($btb_id));
				if (trim($old_file)!='' AND file_exists(FCPATH.$pathFile.$old_file)) {
					unlink(FCPATH.$pathFile.$old_file);
				}

				// additional variable
				$new_file_name = date('YmdHis').'_'.$_FILES[$fileName]['name'];

				if (move_uploaded_file($_FILES[$fileName]['tmp_name'], FCPATH.$pathFile.$new_file_name)) {
					// simpan nama file kedalam database
					$column = array(
						'btb_photo' => $new_file_name,
					);
					$this->setMainTable('mmi_btb');
					$this->setPostData($column);
					$response = $this->save('btb_id='.intval($btb_id));

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
	public function stored_delete_data_btb($btb_id=0){
		$this->setMainTable('mmi_btb');
		$column = array(
			'person_was_deleted' => 'Y',
		);
		$this->setPostData($column);
		$response = $this->save('person_was_deleted="N" AND btb_id='.intval($btb_id));
		return array(
			'status' => $response['status'],
			'message' => ($response['status']==200)?'Data berhasil dihapus.':'Data tidak tersedia.',
		);
	}
	/**
	* dapatkan data detail karyawan berdasarkan nik
	*/
	public function get_detail_btb_by_name($btb_name=0){
		$this->setMainTable('mmi_btb');
		return $this->find('btb_name='.intval($btb_name));
	}
	/**
	* dapatkan data detail karyawan berdasarkan person id
	*/
	public function get_detail_btb($btb_id=0){
		$this->setMainTable('mmi_btb');
		return $this->find('btb_id='.intval($btb_id));
	}
		/**
	* dapatkan semua data client
	*/
	public function get_data_btb(){
		$this->setMainTable('mmi_btb');
		return $this->findAll('person_was_deleted="N"','no limit','no offset','btb_id DESC');
	}
	/**
	* simpan data
	*/
	public function stored_data_btb($id=0){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
			'rt_ekslusif_pondasi_1lt' => $post_data['rt_ekslusif_pondasi_1lt'],
			'rt_ekslusif_struktur_1lt' => $post_data['rt_ekslusif_struktur_1lt'],
			'rt_ekslusif_rangka_atap_1lt' => $post_data['rt_ekslusif_rangka_atap_1lt'],
			'rt_ekslusif_penutup_atap_1lt' => $post_data['rt_ekslusif_penutup_atap_1lt'],
			'rt_ekslusif_plafond_1lt' => $post_data['rt_ekslusif_plafond_1lt'],
			'rt_ekslusif_dinding_1lt' => $post_data['rt_ekslusif_dinding_1lt'],
			'rt_ekslusif_pintu_jendela_1lt' => $post_data['rt_ekslusif_pintu_jendela_1lt'],
			'rt_ekslusif_lantai_1lt' => $post_data['rt_ekslusif_lantai_1lt'],
			'rt_ekslusif_utilitas_1lt' => $post_data['rt_ekslusif_utilitas_1lt'],
			'rt_ekslusif_profesional_fee_1lt' => $post_data['rt_ekslusif_profesional_fee_1lt'],
			'rt_ekslusif_biaya_perijinan_1lt' => $post_data['rt_ekslusif_biaya_perijinan_1lt'],
			'rt_ekslusif_keuntungan_kontraktor_1lt' => $post_data['rt_ekslusif_keuntungan_kontraktor_1lt'],
			'rt_mewah_pondasi_1lt' => $post_data['rt_mewah_pondasi_1lt'],
			'rt_mewah_struktur_1lt' => $post_data['rt_mewah_struktur_1lt'],
			'rt_mewah_rangka_atap_1lt' => $post_data['rt_mewah_rangka_atap_1lt'],
			'rt_mewah_penutup_atap_1lt' => $post_data['rt_mewah_penutup_atap_1lt'],
			'rt_mewah_plafond_1lt' => $post_data['rt_mewah_plafond_1lt'],
			'rt_mewah_dinding_1lt' => $post_data['rt_mewah_dinding_1lt'],
			'rt_mewah_pintu_jendela_1lt' => $post_data['rt_mewah_pintu_jendela_1lt'],
			'rt_mewah_lantai_1lt' => $post_data['rt_mewah_lantai_1lt'],
			'rt_mewah_utilitas_1lt' => $post_data['rt_mewah_utilitas_1lt'],
			'rt_mewah_profesional_fee_1lt' => $post_data['rt_mewah_profesional_fee_1lt'],
			'rt_mewah_biaya_perijinan_1lt' => $post_data['rt_mewah_biaya_perijinan_1lt'],
			'rt_mewah_keuntungan_kontraktor_1lt' => $post_data['rt_mewah_keuntungan_kontraktor_1lt'],
			'rt_menengah_pondasi_1lt' => $post_data['rt_menengah_pondasi_1lt'],
			'rt_menengah_struktur_1lt' => $post_data['rt_menengah_struktur_1lt'],
			'rt_menengah_rangka_atap_1lt' => $post_data['rt_menengah_rangka_atap_1lt'],
			'rt_menengah_penutup_atap_1lt' => $post_data['rt_menengah_penutup_atap_1lt'],
			'rt_menengah_plafond_1lt' => $post_data['rt_menengah_plafond_1lt'],
			'rt_menengah_dinding_1lt' => $post_data['rt_menengah_dinding_1lt'],
			'rt_menengah_pintu_jendela_1lt' => $post_data['rt_menengah_pintu_jendela_1lt'],
			'rt_menengah_lantai_1lt' => $post_data['rt_menengah_lantai_1lt'],
			'rt_menengah_utilitas_1lt' => $post_data['rt_menengah_utilitas_1lt'],
			'rt_menengah_profesional_fee_1lt' => $post_data['rt_menengah_profesional_fee_1lt'],
			'rt_menengah_biaya_perijinan_1lt' => $post_data['rt_menengah_biaya_perijinan_1lt'],
			'rt_menengah_keuntungan_kontraktor_1lt' => $post_data['rt_menengah_keuntungan_kontraktor_1lt'],
			'rt_sederhana_pondasi_1lt' => $post_data['rt_sederhana_pondasi_1lt'],
			'rt_sederhana_struktur_1lt' => $post_data['rt_sederhana_struktur_1lt'],
			'rt_sederhana_rangka_atap_1lt' => $post_data['rt_sederhana_rangka_atap_1lt'],
			'rt_sederhana_penutup_atap_1lt' => $post_data['rt_sederhana_penutup_atap_1lt'],
			'rt_sederhana_plafond_1lt' => $post_data['rt_sederhana_plafond_1lt'],
			'rt_sederhana_dinding_1lt' => $post_data['rt_sederhana_dinding_1lt'],
			'rt_sederhana_pintu_jendela_1lt' => $post_data['rt_sederhana_pintu_jendela_1lt'],
			'rt_sederhana_lantai_1lt' => $post_data['rt_sederhana_lantai_1lt'],
			'rt_sederhana_utilitas_1lt' => $post_data['rt_sederhana_utilitas_1lt'],
			'rt_sederhana_profesional_fee_1lt' => $post_data['rt_sederhana_profesional_fee_1lt'],
			'rt_sederhana_biaya_perijinan_1lt' => $post_data['rt_sederhana_biaya_perijinan_1lt'],
			'rt_sederhana_keuntungan_kontraktor_1lt' => $post_data['rt_sederhana_keuntungan_kontraktor_1lt'],
			'rt_ekslusif_pondasi_2lt' => $post_data['rt_ekslusif_pondasi_2lt'],
			'rt_ekslusif_struktur_2lt' => $post_data['rt_ekslusif_struktur_2lt'],
			'rt_ekslusif_rangka_atap_2lt' => $post_data['rt_ekslusif_rangka_atap_2lt'],
			'rt_ekslusif_penutup_atap_2lt' => $post_data['rt_ekslusif_penutup_atap_2lt'],
			'rt_ekslusif_plafond_2lt' => $post_data['rt_ekslusif_plafond_2lt'],
			'rt_ekslusif_dinding_2lt' => $post_data['rt_ekslusif_dinding_2lt'],
			'rt_ekslusif_pintu_jendela_2lt' => $post_data['rt_ekslusif_pintu_jendela_2lt'],
			'rt_ekslusif_lantai_2lt' => $post_data['rt_ekslusif_lantai_2lt'],
			'rt_ekslusif_utilitas_2lt' => $post_data['rt_ekslusif_utilitas_2lt'],
			'rt_ekslusif_profesional_fee_2lt' => $post_data['rt_ekslusif_profesional_fee_2lt'],
			'rt_ekslusif_biaya_perijinan_2lt' => $post_data['rt_ekslusif_biaya_perijinan_2lt'],
			'rt_ekslusif_keuntungan_kontraktor_2lt' => $post_data['rt_ekslusif_keuntungan_kontraktor_2lt'],
			'rt_mewah_pondasi_2lt' => $post_data['rt_mewah_pondasi_2lt'],
			'rt_mewah_struktur_2lt' => $post_data['rt_mewah_struktur_2lt'],
			'rt_mewah_rangka_atap_2lt' => $post_data['rt_mewah_rangka_atap_2lt'],
			'rt_mewah_penutup_atap_2lt' => $post_data['rt_mewah_penutup_atap_2lt'],
			'rt_mewah_plafond_2lt' => $post_data['rt_mewah_plafond_2lt'],
			'rt_mewah_dinding_2lt' => $post_data['rt_mewah_dinding_2lt'],
			'rt_mewah_pintu_jendela_2lt' => $post_data['rt_mewah_pintu_jendela_2lt'],
			'rt_mewah_lantai_2lt' => $post_data['rt_mewah_lantai_2lt'],
			'rt_mewah_utilitas_2lt' => $post_data['rt_mewah_utilitas_2lt'],
			'rt_mewah_profesional_fee_2lt' => $post_data['rt_mewah_profesional_fee_2lt'],
			'rt_mewah_biaya_perijinan_2lt' => $post_data['rt_mewah_biaya_perijinan_2lt'],
			'rt_mewah_keuntungan_kontraktor_2lt' => $post_data['rt_mewah_keuntungan_kontraktor_2lt'],
			'rt_menengah_pondasi_2lt' => $post_data['rt_menengah_pondasi_2lt'],
			'rt_menengah_struktur_2lt' => $post_data['rt_menengah_struktur_2lt'],
			'rt_menengah_rangka_atap_2lt' => $post_data['rt_menengah_rangka_atap_2lt'],
			'rt_menengah_penutup_atap_2lt' => $post_data['rt_menengah_penutup_atap_2lt'],
			'rt_menengah_plafond_2lt' => $post_data['rt_menengah_plafond_2lt'],
			'rt_menengah_dinding_2lt' => $post_data['rt_menengah_dinding_2lt'],
			'rt_menengah_pintu_jendela_2lt' => $post_data['rt_menengah_pintu_jendela_2lt'],
			'rt_menengah_lantai_2lt' => $post_data['rt_menengah_lantai_2lt'],
			'rt_menengah_utilitas_2lt' => $post_data['rt_menengah_utilitas_2lt'],
			'rt_menengah_profesional_fee_2lt' => $post_data['rt_menengah_profesional_fee_2lt'],
			'rt_menengah_biaya_perijinan_2lt' => $post_data['rt_menengah_biaya_perijinan_2lt'],
			'rt_menengah_keuntungan_kontraktor_2lt' => $post_data['rt_menengah_keuntungan_kontraktor_2lt'],
			'rt_sederhana_pondasi_2lt' => $post_data['rt_sederhana_pondasi_2lt'],
			'rt_sederhana_struktur_2lt' => $post_data['rt_sederhana_struktur_2lt'],
			'rt_sederhana_rangka_atap_2lt' => $post_data['rt_sederhana_rangka_atap_2lt'],
			'rt_sederhana_penutup_atap_2lt' => $post_data['rt_sederhana_rangka_atap_2lt'],
			'rt_sederhana_plafond_2lt' => $post_data['rt_sederhana_plafond_2lt'],
			'rt_sederhana_dinding_2lt' => $post_data['rt_sederhana_dinding_2lt'],
			'rt_sederhana_pintu_jendela_2lt' => $post_data['rt_sederhana_pintu_jendela_2lt'],
			'rt_sederhana_lantai_2lt' => $post_data['rt_sederhana_lantai_2lt'],
			'rt_sederhana_utilitas_2lt' => $post_data['rt_sederhana_utilitas_2lt'],
			'rt_sederhana_profesional_fee_2lt' => $post_data['rt_sederhana_profesional_fee_2lt'],
			'rt_sederhana_biaya_perijinan_2lt' => $post_data['rt_sederhana_biaya_perijinan_2lt'],
			'rt_sederhana_keuntungan_kontraktor_2lt' => $post_data['rt_sederhana_keuntungan_kontraktor_2lt'],
			/*'bp_pondasi' => $post_data['bp_pondasi'],
			'bp_struktur' => $post_data['bp_struktur'],
			'bp_rangka_atap' => $post_data['bp_rangka_atap'],
			'bp_penutup_atap' => $post_data['bp_penutup_atap'],
			'bp_plafond' => $post_data['bp_plafond'],
			'bp_dinding' => $post_data['bp_dinding'],
			'bp_pintu_jendela' => $post_data['bp_pintu_jendela'],
			'bp_lantai' => $post_data['bp_lantai'],
			'bp_utilitas' => $post_data['bp_utilitas'],
			'bp_profesional_fee' => $post_data['bp_profesional_fee'],
			'bp_biaya_perijinan' => $post_data['bp_biaya_perijinan'],
			'bp_keuntungan_kontraktor' => $post_data['bp_keuntungan_kontraktor'],
			'gudang_pondasi' => $post_data['gudang_pondasi'],
			'gudang_struktur' => $post_data['gudang_struktur'],
			'gudang_rangka_atap' => $post_data['gudang_rangka_atap'],
			'gudang_penutup_atap' => $post_data['gudang_penutup_atap'],
			'gudang_dinding' => $post_data['gudang_dinding'],
			'gudang_pintu_jendela' => $post_data['gudang_pintu_jendela'],
			'gudang_lantai' => $post_data['gudang_lantai'],
			'gudang_utilitas' => $post_data['gudang_utilitas'],
			'gudang_profesional_fee' => $post_data['gudang_profesional_fee'],
			'gudang_biaya_perijinan' => $post_data['gudang_biaya_perijinan'],
			'gudang_keuntungan_kontraktor' => $post_data['gudang_keuntungan_kontraktor'],
			'bgb_rendah_pondasi' => $post_data['bgb_rendah_pondasi'],
			'bgb_rendah_struktur' => $post_data['bgb_rendah_struktur'],
			'bgb_rendah_penutup_atap' => $post_data['bgb_rendah_penutup_atap'],
			'bgb_rendah_plafond' => $post_data['bgb_rendah_plafond'],
			'bgb_rendah_dinding' => $post_data['bgb_rendah_dinding'],
			'bgb_rendah_pintu_jendela' => $post_data['bgb_rendah_pintu_jendela'],
			'bgb_rendah_lantai' => $post_data['bgb_rendah_lantai'],
			'bgb_rendah_utilitas' => $post_data['bgb_rendah_utilitas'],
			'bgb_rendah_profesional_fee' => $post_data['bgb_rendah_profesional_fee'],
			'bgb_rendah_biaya_perijinan' => $post_data['bgb_rendah_biaya_perijinan'],
			'bgb_rendah_keuntungan_kontraktor' => $post_data['bgb_rendah_keuntungan_kontraktor'],
			'bgb_sedang_pondasi' => $post_data['bgb_sedang_pondasi'],
			'bgb_sedang_struktur' => $post_data['bgb_sedang_struktur'],
			'bgb_sedang_penutup_atap' => $post_data['bgb_sedang_penutup_atap'],
			'bgb_sedang_plafond' => $post_data['bgb_sedang_plafond'],
			'bgb_sedang_dinding' => $post_data['bgb_sedang_dinding'],
			'bgb_sedang_pintu_jendela' => $post_data['bgb_sedang_pintu_jendela'],
			'bgb_sedang_lantai' => $post_data['bgb_sedang_lantai'],
			'bgb_sedang_utilitas' => $post_data['bgb_sedang_utilitas'],
			'bgb_sedang_profesional_fee' => $post_data['bgb_sedang_profesional_fee'],
			'bgb_sedang_biaya_perijinan' => $post_data['bgb_sedang_biaya_perijinan'],
			'bgb_sedang_keuntungan_kontraktor' => $post_data['bgb_sedang_keuntungan_kontraktor'],
			'bgb_tinggi_pondasi' => $post_data['bgb_tinggi_pondasi'],
			'bgb_tinggi_struktur' => $post_data['bgb_tinggi_struktur'],
			'bgb_tinggi_penutup_atap' => $post_data['bgb_tinggi_penutup_atap'],
			'bgb_tinggi_plafond' => $post_data['bgb_tinggi_plafond'],
			'bgb_tinggi_dinding' => $post_data['bgb_tinggi_dinding'],
			'bgb_tinggi_pintu_jendela' => $post_data['bgb_tinggi_pintu_jendela'],
			'bgb_tinggi_lantai' => $post_data['bgb_tinggi_lantai'],
			'bgb_tinggi_utilitas' => $post_data['bgb_tinggi_utilitas'],
			'bgb_tinggi_profesional_fee' => $post_data['bgb_tinggi_profesional_fee'],
			'bgb_tinggi_biaya_perijinan' => $post_data['bgb_tinggi_biaya_perijinan'],
			'bgb_tinggi_keuntungan_kontraktor' => $post_data['bgb_tinggi_keuntungan_kontraktor'],*/

			);

$this->setMainTable('mmi_btb');
			$this->setPostData($column);

			$is_exist = $this->get_one('IFNULL(btb_id,0)','mmi_btb','btb_id='.intval($id));
			$where = ($is_exist>0)?'btb_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();

			$primary_id = ($id>0)?$id:$insert_id;
			if ($response['status']==200) {
				$this->do_upload_file($primary_id,'btb_photo');
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
	public function form_validation_btb($btb_id=0){
		$form_required = array(

		'rt_ekslusif_pondasi_1lt' => 'Pondasi Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_struktur_1lt' => 'Struktur Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_rangka_atap_1lt' => 'Rangka Atap Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_penutup_atap_1lt' => 'Penutup Atap Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_plafond_1lt' => 'Plafond Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_dinding_1lt' => 'Dinding Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_pintu_jendela_1lt' => 'Pintu & Jendela Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_lantai_1lt' => 'Lantai Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_utilitas_1lt' => 'Utilitas Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_profesional_fee_1lt' => 'Profesional Fee Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_biaya_perijinan_1lt' => 'Biaya Perijinan Rumah Tinggal Ekslusif 1 Lantai',
		'rt_ekslusif_keuntungan_kontraktor_1lt' => 'Keuntungan Kontraktor Rumah Tinggal Ekslusif 1 Lantai',
		'rt_mewah_pondasi_1lt' => 'Pondasi Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_struktur_1lt' => 'Struktur Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_rangka_atap_1lt' => 'Rangka Atap Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_penutup_atap_1lt' => 'Penutup Atap Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_plafond_1lt' => 'Plafond Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_dinding_1lt' => 'Dinding Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_pintu_jendela_1lt' => 'Pintu & Jendela Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_lantai_1lt' => 'Lantai Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_utilitas_1lt' => 'Utilitas Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_profesional_fee_1lt' => 'Profesional Fee Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_biaya_perijinan_1lt' => 'Biaya Perijinan Rumah Tinggal Mewah 1 Lantai',
		'rt_mewah_keuntungan_kontraktor_1lt' => 'Keuntungan Kontraktor Rumah Tinggal Mewah 1 Lantai',
		'rt_menengah_pondasi_1lt' => 'Pondasi Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_struktur_1lt' => 'Struktur Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_rangka_atap_1lt' => 'Rangka Atap Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_penutup_atap_1lt' => 'Penutup Atap Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_plafond_1lt' => 'Plafond Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_dinding_1lt' => 'Dinding Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_pintu_jendela_1lt' => 'Pintu & Jendela Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_lantai_1lt' => 'Lantai Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_utilitas_1lt' => 'Utilitas Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_profesional_fee_1lt' => 'Profesional Fee Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_biaya_perijinan_1lt' => 'Biaya Perijinan Rumah Tinggal Menengah 1 Lantai',
		'rt_menengah_keuntungan_kontraktor_1lt' => 'Keuntungan Kontraktor Rumah Tinggal Menengah 1 Lantai',
		'rt_sederhana_pondasi_1lt' => 'Pondasi Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_struktur_1lt' => 'Struktur Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_rangka_atap_1lt' => 'Rangka Atap Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_penutup_atap_1lt' => 'Penutup Atap Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_plafond_1lt' => 'Plafond Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_dinding_1lt' => 'Dinding Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_pintu_jendela_1lt' => 'Pintu & Jendela Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_lantai_1lt' => 'Lantai Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_utilitas_1lt' => 'Utilitas Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_profesional_fee_1lt' => ' Profesional Fee Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_biaya_perijinan_1lt' => 'Biaya Perijinan Rumah Tinggal Sederhana 1 Lantai',
		'rt_sederhana_keuntungan_kontraktor_1lt' => 'Keuntungan Kontraktor Rumah Tinggal Sederhana 1 Lantai',
		'rt_ekslusif_pondasi_2lt' => 'Pondasi Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_struktur_2lt' => 'Struktur Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_rangka_atap_2lt' => 'Rangka Atap Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_penutup_atap_2lt' => 'Penutup Atap Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_plafond_2lt' => 'Plafond Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_dinding_2lt' => 'Dinding Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_pintu_jendela_2lt' => 'Pintu & Jendela Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_lantai_2lt' => 'Lantai Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_utilitas_2lt' =>'Utilitas Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_profesional_fee_2lt' => 'Profesional Fee Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_biaya_perijinan_2lt' => 'Biaya Perijinan Rumah Tinggal Ekslusif 2 Lantai',
		'rt_ekslusif_keuntungan_kontraktor_2lt' =>'Keuntungan Kontraktor Rumah Tinggal Ekslusif 2 Lantai',
		'rt_mewah_pondasi_2lt' => 'Pondasi Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_struktur_2lt' => 'Struktur Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_rangka_atap_2lt' => 'Rangka Atap Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_penutup_atap_2lt' => 'Penutup Atap Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_plafond_2lt' => 'Plafond Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_dinding_2lt' => 'Dinding Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_pintu_jendela_2lt' => 'Pintu & Jendela Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_lantai_2lt' => 'Lantai Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_utilitas_2lt' => 'Utilitas Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_profesional_fee_2lt' => 'Profesional Fee Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_biaya_perijinan_2lt' => 'Biaya Perijinan Rumah Tinggal Mewah 2 Lantai',
		'rt_mewah_keuntungan_kontraktor_2lt' => 'Keuntungan Kontraktor Rumah Tinggal Mewah 2 Lantai',
		'rt_menengah_pondasi_2lt' => 'Pondasi Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_struktur_2lt' => 'Struktur Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_rangka_atap_2lt' => 'Rangka Atap Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_penutup_atap_2lt' => ' Penutup Atap Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_plafond_2lt' => 'Plafond Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_dinding_2lt' => 'Dinding Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_pintu_jendela_2lt' => 'Pintu & Jendela Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_lantai_2lt' => 'Lantai Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_utilitas_2lt' => 'Utilitas Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_profesional_fee_2lt' => 'Profesional Fee Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_biaya_perijinan_2lt' => 'Biaya Perijinan Rumah Tinggal Menengah 2 Lantai',
		'rt_menengah_keuntungan_kontraktor_2lt' => 'Keuntungan Kontraktor Rumah Tinggal Menengah 2 Lantai',
		'rt_sederhana_pondasi_2lt' => 'Pondasi Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_struktur_2lt' => 'Struktur Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_rangka_atap_2lt' => 'Rangka Atap Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_penutup_atap_2lt' => 'Penutup Atap Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_plafond_2lt' => 'Plafond Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_dinding_2lt' => 'Dinding Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_pintu_jendela_2lt' => 'Pintu & Jendela Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_lantai_2lt' => 'Lantai Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_utilitas_2lt' => 'Utilitas Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_profesional_fee_2lt' => 'Profesional Fee Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_biaya_perijinan_2lt' => 'Biaya Perijinan Rumah Tinggal Sederhana 2 Lantai',
		'rt_sederhana_keuntungan_kontraktor_2lt' => 'Keuntungan Kontraktor Rumah Tinggal Sederhana 2 Lantai',
		'bp_pondasi' => 'Pondasi Bangunan Perkebunan',
		'bp_struktur' => 'Struktur Bangunan Perkebunan',
		'bp_rangka_atap' => 'Rangka Atap Bangunan Perkebunan',
		'bp_penutup_atap' =>'Penutup Atap Bangunan Perkebunan',
		'bp_plafond' => 'Plafond Bangunan Perkebunan',
		'bp_dinding' =>'Dinding Bangunan Perkebunan',
		'bp_pintu_jendela' => 'Pintu & Jendela Bangunan Perkebunan',
		'bp_lantai' => 'Lantai Bangunan Perkebunan',
		'bp_utilitas' => 'Utilitas Bangunan Perkebunan',
		'bp_profesional_fee' => 'Profesional Fee Bangunan Perkebunan',
		'bp_biaya_perijinan' => 'Biaya Perijinan Bangunan Perkebunan',
		'bp_keuntungan_kontraktor' => 'Keuntungan Kontraktor Bangunan Perkebunan',
		'gudang_pondasi' => 'Pondasi Gudang',
		'gudang_struktur' => 'Struktur Gudang',
		'gudang_rangka_atap' => 'Rangka Atap Gudang',
		'gudang_penutup_atap' => 'Penutup Atap Gudang',
		'gudang_dinding' => 'Dinding Gudang',
		'gudang_pintu_jendela' => 'Pintu & Jendela Gudang',
		'gudang_lantai' => 'Lantai Gudang',
		'gudang_utilitas' => 'Utilitas Gudang',
		'gudang_profesional_fee' => 'Profesional Fee Gudang',
		'gudang_biaya_perijinan' => 'Biaya Perijinan Gudang',
		'gudang_keuntungan_kontraktor' => 'Keuntungan Kontraktor Gudang',
		'bgb_rendah_pondasi' => 'Pondasi Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_struktur' => 'Struktur Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_penutup_atap' => 'Penutup Atap Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_plafond' => 'Plafond Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_dinding' => 'Dinding Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_pintu_jendela' => 'Pintu & Jendela Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_lantai' => 'Lantai Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_utilitas' => 'Utilitas Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_profesional_fee' => 'Profesional Fee Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_biaya_perijinan' => 'Biaya Perijinan Bangunan Gedung Bertingkat Rendah',
		'bgb_rendah_keuntungan_kontraktor' => 'Keuntungan Kontraktor Bangunan Gedung Bertingkat Rendah',
		'bgb_sedang_pondasi' => 'Pondasi Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_struktur' => 'Struktur Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_penutup_atap' => 'Penutup Atap Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_plafond' => 'Plafond Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_dinding' => 'Dinding Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_pintu_jendela' => 'Pintu & Jendela Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_lantai' => 'Lantai Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_utilitas' => 'Utilitas Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_profesional_fee' => 'Profesional Fee Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_biaya_perijinan' => 'Biaya Perijinan Bangunan Gedung Bertingkat Sedang',
		'bgb_sedang_keuntungan_kontraktor' => 'Keuntungan Kontraktor Bangunan Gedung Bertingkat Sedang',
		'bgb_tinggi_pondasi' => 'Pondasi Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_struktur' => 'Struktur Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_penutup_atap' => 'Penutup Atap Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_plafond' => 'Plafond Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_dinding' => 'Dinding Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_pintu_jendela' => 'Pintu & Jendela Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_lantai' => ' Lantai Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_utilitas' => 'Utilitas Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_profesional_fee' => 'Profesional Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_biaya_perijinan' => 'Biaya Perijinan Bangunan Gedung Bertingkat Tinggi',
		'bgb_tinggi_keuntungan_kontraktor' => 'Keuntungan Kontraktor Bangunan Gedung Bertingkat Tinggi',
 
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
				if (trim($key)=="btb_") {
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