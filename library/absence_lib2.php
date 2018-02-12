<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

require_once FCPATH.'/library/people_lib.php';
class absence_lib extends db_utility_lib
{
	protected $person_lib;
	function __construct()
	{
		parent::__construct();
		$this->person_lib = new person_lib;
	}
	/**
	* cek pernah melakukan absensi masuk dan pulang, maka tidak bisa absensi lagi
	*/
	public function has_check_absence_today(){
		$status = 200; $message = 'Absensi diperbolehkan.';

		$is_exist = $this->get_one('IFNULL(absence_id, 0)','sys_absence', 'DATE(absence_finish_datetime)="'.date('Y-m-d').'" AND DATE(absence_start_datetime)="'.date('Y-m-d').'"');
		if ($is_exist>0) {
			$status = 500; $message = 'Absensi tidak diperbolehkan. Sudah dilakukan absensi hari ini.';
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* cek pernah melakukan absensi masuk , maka hanya bisa melakukan absensi pulang
	*/
	public function has_check_enter_absence(){
		$status = 500; $message = 'Belum melakukan absensi masuk.';

		$is_exist = $this->get_one('IFNULL(absence_id, 0)','sys_absence', 'absence_finish_datetime IS NULL AND DATE(absence_start_datetime)="'.date('Y-m-d').'"');
		if ($is_exist>0 OR (isset($_SESSION['absence']['header']['absence_type']) AND trim($_SESSION['absence']['header']['absence_type'])=="in")) {
			$status = 200; $message = 'Sudah melakukan absensi masuk.';
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* cek header absensi, jika ada maka redirect ke action
	*/
	public function has_check_absence_header(){
		$status = 500; $message = 'Header absensi tidak ditemukan.';

		if (!empty($_SESSION['absence']['header'])) {
			$status = 200; $message = 'Header absensi ditemukan.';
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* reset sesi absensi
	*/
	public function reset_absence(){
		if (!empty($_SESSION['absence'])) {
			unset($_SESSION['absence']);
		}
	}
	/**
	* eksekusi tipe absensi
	* masukkan kedalam session yang digunakan untuk absen karyawan
	* @param enum $type in|out
	*/
	public function do_process_absence_type($type='in'){
		$status = 500; $message = 'gagal memulai tipe absensi.';
		$current_datetime = date('Y-m-d H:i:s');

		if (in_array($type, array('in','out'))) {
			// reset absensi
			$this->reset_absence();

			// cek absensi masuk
			if (trim($type)=="out") {
				$response = $this->has_check_enter_absence();
				if ($response['status']==500) {
					return array(
						'status' => 500,
						'message' => 'Belum melakukan absensi masuk.',
					);
				}
			}

			$_SESSION['absence']['header'] = array(
				'absence_type' => $type,
				'absence_datetime' => $current_datetime,
				'absence_late_datetime' => date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($current_datetime))),
			);

			$status = 200; $message = 'Berhasil memulai tipe absensi.';
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* dapatkan laporan data absensi
	*/
	public function get_report_data_absence(){
		$where = 1;

		if (isset($_POST['start_date']) AND trim($_POST['start_date'])!='') {
			$start_date = str_replace("/", "-", $_POST['start_date']);
			$where .= ' AND DATE(absence_current_start_datetime)>="'.$start_date.'"';
		} else{
			$where .= ' AND DATE(absence_current_start_datetime)>="'.date('Y-m-d').'"';
		}

		if (isset($_POST['end_date']) AND trim($_POST['end_date'])!='') {
			$end_date = str_replace("/", "-", $_POST['end_date']);
			$where .= ' AND DATE(absence_current_start_datetime)<="'.$end_date.'"';
		} else{
			$where .= ' AND DATE(absence_current_start_datetime)<="'.date('Y-m-d').'"';
		}

		if (isset($_POST['person_nik']) AND trim($_POST['person_nik'])!='') {
			$where .= ' AND person_nik LIKE "'.$_POST['person_nik'].'%"';
		}

		if (isset($_POST['person_name']) AND trim($_POST['person_name'])!='') {
			$where .= ' AND person_name LIKE "'.$_POST['person_name'].'%"';
		}

		$sql = '
			SELECT *
			FROM sys_absence
			INNER JOIN sys_person ON sys_absence.absence_person_id=sys_person.person_id
			WHERE '.$where.'
		';
		//echo '<pre>'; print_r($sql); exit;
		$exec = $this->query($sql);
		$result = $this->result_array($exec);
		return $result;
	}
	/**
	* data tipe absensi
	*/
	public function base_absence_type(){
		return array(
			'open' => 'Masuk',
			'permission' => 'Izin',
			'not' => 'Tanpa Keterangan',
		);
	}
	/**
	* proses simpan absensi
	*/
	public function do_process_absence(){
		$status = 500; $message = 'Tidak ditemukan data absensi.';

		$header_arr = (isset($_SESSION['absence']['header']))?$_SESSION['absence']['header']:array();
		$draft_arr = (isset($_SESSION['absence']['draft']))?$_SESSION['absence']['draft']:array();

		if (!empty($draft_arr)) {
			foreach ($draft_arr as $row_arr) {
				foreach ($row_arr as $key => $value) {
					${$key}=$value;
				}

				$column = array(
					'absence_person_id' => $person_id,
					'absence_person_nik' =>  $person_nik,
				);

				$absence_type = (isset($header_arr['absence_type']) AND trim($header_arr['absence_type'])!='in')?$header_arr['absence_type']:'in';
				if (trim($absence_type)=="in") {
					$column = array_merge($column, array(
						'absence_start_datetime'=> $header_arr['absence_datetime'],
						'absence_late_start_time' => date('H:i:s', strtotime($header_arr['absence_late_datetime'])),
						'absence_current_start_datetime' => $absence_datetime,
					));
				} else{
					$column = array_merge($column, array(
						'absence_finish_datetime'=> $header_arr['absence_datetime'],
						'absence_late_finish_time' => date('H:i:s', strtotime($header_arr['absence_late_datetime'])),
						'absence_current_finish_datetime' => $absence_datetime,
					));
				}


				$this->setMainTable('sys_absence');
				$this->setPostData($column);
				$where = (isset($absence_id) AND $absence_id>0)?'absence_id='.intval($absence_id):'';
				$response = $this->save($where);

				$status = $response['status']; $message = ($response['status']==200)?'Berhasil simpan data absensi.':'Gagal simpan data absensi.';
			}

			// reset sesi
			$this->reset_absence();
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* cek apakah hari ini sudah pernah melakukan absensi tipe mulai
	* jika sudah maka lakukan absensi tipe selesai
	* jika belum maka lakukan absensi tipe mulai
	*/
	public function check_has_start_absence(){
		$status = 500; $message = 'Lakukan absensi tipe mulai.';

		$has_exist = $this->get_one('IFNULL(absence_id,0)','sys_absence','DATE(absence_start_datetime)="'.date('Y-m-d').'"');
		if ($has_exist>0) {
			$has_exist = $this->get_one('IFNULL(absence_id,0)','sys_absence','DATE(absence_finish_datetime)="'.date('Y-m-d').'"');
			if ($has_exist<1) {
				$status = 200; $message = 'Lakukan absensi tipe selesai.';
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* hapus sesi berdasarkan id
	*/
	public function session_delete_by_id($person_id=0){
		$status = 500; $message = 'Tidak ada aksi yang dilakukan.';

		$person_arr = $this->people_lib->get_detail_person($person_id);
		$session_arr = (isset($_SESSION['absence']['draft']))?$_SESSION['absence']['draft']:array();
		if (!empty($session_arr)) {
			if (isset($_SESSION['absence']['draft'][$person_arr['person_id']])) {
				unset($_SESSION['absence']['draft'][$person_arr['person_id']]);

				$status = 200; $message = 'Berhasil hapus absensi nama pegawai ('.$person_arr['person_name'].').';
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* simpan detail absensi kedalam sesi.
	*/
	public function set_absence_to_session(){
		$status = 500; $message = 'Data pegawai tidak ditemukan.';

		$post_data = isset($_POST)?$_POST:array();
		$person_nik = (isset($post_data['person_nik']) AND trim($post_data['person_nik'])!='')?$post_data['person_nik']:0;
		$person_arr = $this->people_lib->get_detail_person_by_nik($person_nik);
		$session_arr = (isset($_SESSION['absence']['draft']))?$_SESSION['absence']['draft']:array();
		if (!empty($person_arr)) {
			$person_arr = array_merge($person_arr,array(
				'absence_datetime'=>date('Y-m-d H:i:s'),
				'absence_type'=>$post_data['absence_type'],
				'absence_note'=>$post_data['absence_note'],
			));

			if (isset($_SESSION['absence']['header']['absence_type']) AND trim($_SESSION['absence']['header']['absence_type'])=="out") {
				$absence_id = $this->get_one('IFNULL(absence_id,0)','sys_absence','absence_finish_datetime IS NULL AND absence_person_id='.intval($person_arr['person_id']));
				$person_arr = array_merge($person_arr,array('absence_id'=>$absence_id));
			}

			if (!array_key_exists($person_arr['person_id'], $session_arr)) {
				// simpan kedalam sesi absensi
				$_SESSION['absence']['draft'][$person_arr['person_id']] = $person_arr;

				$status = 200; $message = 'absensi nama pegawai ('.$person_arr['person_name'].') telah berhasil.';
			} else{
				$status = 500; $message = 'nama pegawai ('.$person_arr['person_name'].') sudah melakukan absensi.';
			}

		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
}
?>