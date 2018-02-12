<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

class client_lib extends db_utility_lib
{
	function __construct(){
		parent::__construct();
	}
	/**
	* hapus data
	*/
	public function stored_delete_data_client($client_id=0){
		$this->setMainTable('mmi_client');
		$column = array(
			'person_was_deleted' => 'Y',
		);
		$this->setPostData($column);
		$response = $this->save('person_was_deleted="N" AND client_id='.intval($client_id));
		return array(
			'status' => $response['status'],
			'message' => ($response['status']==200)?'Data berhasil dihapus.':'Data tidak tersedia.',
		);
	}
	/**
	* dapatkan data detail karyawan berdasarkan nik
	*/
	public function get_detail_client_by_name($client_name=0){
		$this->setMainTable('mmi_client');
		return $this->find('client_name='.intval($client_name));
	}
	/**
	* dapatkan data detail karyawan berdasarkan person id
	*/
	public function get_detail_client($client_id=0){
		$this->setMainTable('mmi_client');
		return $this->find('client_id='.intval($client_id));
	}
		/**
	* dapatkan semua data client
	*/
	public function get_data_client(){
		$this->setMainTable('mmi_client');
		return $this->findAll('person_was_deleted="N"','no limit','no offset','client_id DESC');
	}
	/**
	* simpan data
	*/
	public function stored_data($id=0){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {
			$column = array(
			    'client_name' => $post_data['client_name'],
			    'client_debitur_id ' => $insert_id,
			    'client_person_name' => $post_data['client_person_name'],
			    'client_atasan_penilai' => $post_data['client_atasan_penilai'],
			    'client_pejabat_BTN' => $post_data['client_pejabat_BTN'],
			    'client_jabatan_BTN' => $post_data['client_jabatan_BTN'],
			    'client_report' => $post_data['client_report'],
			    'client_report_number' => $post_data['client_report_number'],
			    'client_appraisal_date' => date('Y-m-d', strtotime($post_data['client_appraisal_date'])),
			    'client_statement_date' => date('Y-m-d', strtotime($post_data['client_statement_date'])),
			);
// prepare to save mmi_client
			$this->setMainTable('mmi_client');
			$this->setPostData($column);
			$this->save();

			$is_exist = $this->get_one('IFNULL(client_id,0)','mmi_client','client_id='.intval($id));
			$where = ($is_exist>0)?'client_id='.intval($id):'';
			$response = $this->save($where);
			$insert_id = $this->insert_id();
			
			$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan data.':$response['message'];
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	*Atasan Penilai
	*/
	public function base_client_atasan_penilai(){
		return array(
			'1'=>'H. Muchammad Gunawan ST.Msi',
			'2'=>'Ir. Mono Igfirly, MM, MAPPI (Cert.)',
		);
	}
	/**
	* form validasi
	*/
	public function form_validation($client_id=0){
		$form_required = array(
			    'client_name' => 'PKS Cabang',
			    'client_person_name' => 'Nama Surveyor',
			    'client_atasan_penilai' => 'Nama Atasan Penilai',
			    'client_pejabat_BTN' => 'Nama Pejabat BTN',
			    'client_jabatan_BTN' => 'Jabatan',
			    'client_report' => 'Laporan Ditujukan',
			    'client_report_number' => 'No. Laporan',
			    'client_appraisal_date' => 'Tanggal Penilaian',
			    'client_statement_date' => 'Tanggal Laporan',
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
				if (trim($key)=="client_phone") {
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