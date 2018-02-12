<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class person_lib extends db_utility_lib
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
	public function do_upload_file($person_id=0, $fileName='undefined'){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		// requirement
		$pathFile = 'assets/images/person/';

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
				$old_file = $this->get_one('person_photo','mmi_person','person_id='.intval($person_id));
				if (trim($old_file)!='' AND file_exists(FCPATH.$pathFile.$old_file)) {
					unlink(FCPATH.$pathFile.$old_file);
				}

				// additional variable
				$new_file_name = date('YmdHis').'_'.$_FILES[$fileName]['name'];

				if (move_uploaded_file($_FILES[$fileName]['tmp_name'], FCPATH.$pathFile.$new_file_name)) {
					// simpan nama file kedalam database
					$column = array(
						'person_photo' => $new_file_name,
					);
					$this->setMainTable('mmi_person');
					$this->setPostData($column);
					$this->save('person_id='.intval($person_id));

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
	public function stored_delete_data($person_id=0){
		$this->setMainTable('mmi_person');
		$column = array(
			'person_was_deleted' => 'Y',
		);
		$this->setPostData($column);
		$response = $this->save('person_was_deleted="N" AND person_id='.intval($person_id));
		return array(
			'status' => $response['status'],
			'message' => ($response['status']==200)?'Data berhasil dihapus.':'Data tidak tersedia.',
		);
	}
	/**
	* dapatkan data detail karyawan berdasarkan nik
	*/
	public function get_detail_person_by_nik($person_nik=0){
		$this->setMainTable('mmi_person');
		return $this->find('person_nik='.intval($person_nik));
	}
	/**
	* dapatkan data detail karyawan berdasarkan person id
	*/
	public function get_detail_person($person_id=0){
		$this->setMainTable('mmi_person');
		return $this->find('person_id='.intval($person_id));
	}
	/**
	* dapatkan semua data karyawan
	*/
	public function get_data(){
		$this->setMainTable('mmi_person');
		return $this->findAll('person_was_deleted="N"','no limit','no offset','person_id DESC');
	}
	/**
	* base tipe pegawai
	*/
	public function base_person_type(){
		return array(
			'surveior' => 'Surveior',
			'admin' => 'Admin',
			'administrator' => 'Administrator',
			'keuangan' => 'Keuangan',
			'direktur' => 'Direktur',
		);
	}
	/**
	* base religion
	*/
	public function base_religion(){
		return array(
			'islam' => 'Islam',
			'hindu' => 'Hindu',
			'budha' => 'Budha',
			'katholik' => 'Katholik',
			'kristen' => 'Kristen',
		);
	}
	/**
	* base gender
	*/
	public function base_gender(){
		return array(
			'L' => 'Laki-Laki',
			'P' => 'Perempuan',
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
			    'person_nik' => $post_data['person_nik'],
			    'person_name' => $post_data['person_name'],
			    'person_gender' => $post_data['person_gender'], 
			    'person_birthday' => date('Y-m-d', strtotime($post_data['person_birthday'])), 
			    'person_religion' => $post_data['person_religion'], 
			    'person_address' => $post_data['person_address'],
			    'person_phone' => $post_data['person_phone'],
			    'person_type' => $post_data['person_type'], 
			);

			$this->setMainTable('mmi_person');
			$this->setPostData($column);

			$is_exist = $this->get_one('IFNULL(person_id,0)','mmi_person','person_id='.intval($id));
			$where = ($is_exist>0)?'person_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();

			$primary_id = ($id>0)?$id:$insert_id;
			if ($response['status']==200) {
				$this->do_upload_file($primary_id,'person_photo');
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
	public function form_validation($person_id=0){
		$form_required = array(
			    'person_nik' => 'NIK',
			    'person_name' => 'Nama',
			    'person_gender' => 'Jenis Kelamin', 
			    'person_birthday' => 'Tangal Lahir', 
			    'person_religion' => 'Agama', 
			    'person_address' => 'Alamat',
			    'person_phone' => 'No. Telepon',
			    'person_type' => 'Status',
		);

		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				if (array_key_exists($key, $form_required) AND empty($_POST[$key])) {
					return array(
						'status' => 500,
						'message' => $form_required[$key].' wajib diisi.',
					);
				}

				// validasi NIK
				if (trim($key)=="person_nik") {
					if (!is_numeric($value)) {
						return array(
							'status' => 500,
							'message' => 'NIK harus diisi dengan angka.',
						);
					}

					$is_exist = $this->get_one('IFNULL(person_id,0)','mmi_person','person_nik="'.$value.'" AND person_id!='.intval($person_id));
					if ($is_exist>0) {
						return array(
							'status' => 500,
							'message' => 'NIK sudah digunakan pegawai lain.',
						);
					}
				}

				// validasi no. telp
				if (trim($key)=="person_phone") {
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