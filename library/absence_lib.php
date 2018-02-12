<?php if ( ! defined('FCPATH')) exit('No direct script access allowed');

require_once FCPATH.'/library/people_lib.php';
class absence_lib extends db_utility_lib
{
	protected $people_lib;
	function __construct()
	{
		parent::__construct();
		$this->people_lib = new people_lib;
		$this->websiteConfig = new config;
	}
	/**
	* dapatkan person nik by person_id
	*/
	public function get_person_nik_by_person_id($person_id=0){
		$this->setMainTable('sys_person');
		$person_arr = $this->find('person_id='.intval($person_id));
		return (isset($person_arr['person_nik']) AND trim($person_arr['person_nik'])!='')?$person_arr['person_nik']:0;
	}
	/**
	* dapatkan nama file gambar person
	*/
	public function get_person_img($person_id=0){
		$this->setMainTable('sys_person');
		$person_arr = $this->find('person_id='.intval($person_id));
		return (isset($person_arr['person_photo']) AND trim($person_arr['person_photo'])!='')?$person_arr['person_photo']:'';
	}
	/**
	* pmendapatkan person phone
	**/
	public function get_person_phone($person_id=0){
		$this->setMainTable('sys_person');
		$person_arr = $this->find('person_id='.intval($person_id));
		//echo '<pre>'; print_r($person_arr); exit;
		return (isset($person_arr['person_phone']) AND trim($person_arr['person_phone'])!='')?$person_arr['person_phone']:'';
	}
	/**
	* dapatkan total waktu kerja
	*/
	public function get_total_work_time($person_id=0){
		return $this->get_one('SUM(absence_duration)','sys_absence','DATE(absence_start_datetime) BETWEEN "'.date('Y-m-01').'" AND "'.date('Y-m-t').'" AND absence_person_id='.intval($person_id));
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
	* dapatkan semua data absensi hari ini
	*/
	public function get_all_data_absence_today(){
		$sql = '
			SELECT * FROM sys_absence
			INNER JOIN sys_person ON sys_absence.absence_person_id=sys_person.person_id
			WHERE DATE(absence_current_start_datetime)="'.date('Y-m-d').'"
		';
		$exec = $this->query($sql);
		$result = $this->result_array($exec);
		return $result;
	}
	/**
	* cek izin absen pulang setelah 10 menit absen masuk
	*/
	public function allow_absence_finish($person_id=0){
		$status = 500; $message = 'TIdak diizinkan untuk absen pulang sebelum 5 menit absen masuk.';

		$in_datetime = $this->get_one('absence_start_datetime','sys_absence','DATE(absence_start_datetime)="'.date('Y-m-d').'" AND absence_finish_datetime IS NULL AND absence_person_id='.intval($person_id));
		if (!empty($in_datetime)) {
			$plus_five_in_datetime = date("Y-m-d H:i:s",strtotime($in_datetime." +5 minutes"));

			if (strtotime($plus_five_in_datetime)<strtotime(date('Y-m-d H:i:s'))) {
				$status = 200; $message = 'Diperbolehkan absensi pulang.';
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* cek person yang sudah melakukan absensi hari ini
	*/
	public function has_check_people_was_absence($person_id=0){
		$status = 200;

		$absence_id = $this->get_one('IFNULL(absence_id,0)','sys_absence','absence_person_id='.intval($person_id).' AND DATE(absence_current_start_datetime)="'.date('Y-m-d').'" AND DATE(absence_current_finish_datetime)="'.date('Y-m-d').'"');
		if ($absence_id>0) {
			$status = 500;
		}

		return $status;
	}
	/**
	* cek absensi masuk atau pulang
	*/
	public function has_check_in_or_out($person_id=0){
		$absence_id = $this->get_one('IFNULL(absence_id,0)','sys_absence','absence_person_id='.intval($person_id).' AND DATE(absence_current_start_datetime)="'.date('Y-m-d').'" AND absence_current_finish_datetime IS NULL');
		return ($absence_id>0)?'out':'in';
	}
	/**
	* simpan absensi
	* @param string $absence_type in|out
	*/
	public function has_save_absence_today(){
		$status = 500; $message = 'Tidak ada tindakan yang dilakukan.';
		$current_datetime = date('Y-m-d H:i:s');

		$post_data = isset($_POST)?$_POST:array();
		if (!empty($post_data)) {

			$person_arr = $this->people_lib->get_detail_person_by_nik(intval($post_data['person_nik']));
			if (!empty($person_arr)) {
				$response = $this->has_check_people_was_absence($person_arr['person_id']);
				if ($response==200) {
					$type = $this->has_check_in_or_out($person_arr['person_id']);
					$type = (trim($type)=="in")?'start':'finish';
						if (trim($type)=="start") {
							$column = array(
								'absence_type' => (isset($post_data['absence_type']) AND trim($post_data['absence_type'])!='')?$post_data['absence_type']:'open',
								'absence_note' => (isset($post_data['absence_note']) AND trim($post_data['absence_note'])!='')?$post_data['absence_note']:'-',
								'absence_person_id' => $person_arr['person_id'],
								'absence_person_nik' => $person_arr['person_nik'],
								'absence_start_datetime' => $current_datetime,
								'absence_late_start_time' => '00:00:00',
								'absence_current_start_datetime' => date('Y-m-d').' '.$this->websiteConfig->getStartSchedule(),
							);
						} else{

							// validasi 10 menit jam masuk
							$response = $this->allow_absence_finish($person_arr['person_id']);
							if ($response['status']==500) {
								return $response;
							}

							$absence_start_datetime = $this->get_one('absence_start_datetime','sys_absence','DATE(absence_current_start_datetime)="'.date('Y-m-d').'" AND absence_person_id='.intval($person_arr['person_id']));
							$duration = strtotime($current_datetime)-strtotime($absence_start_datetime);
							$column = array(
								'absence_finish_datetime' => $current_datetime,
								'absence_late_finish_time' => '00:00:00',
								'absence_current_finish_datetime' => date('Y-m-d').' '.$this->websiteConfig->getEndSchedule(),
								'absence_duration' => $duration,
							);
						}

						$this->setMainTable('sys_absence');
						$this->setPostData($column);

						$where = '';
						$absence_id = $this->get_one('IFNULL(absence_id,0)','sys_absence','absence_person_id='.intval($person_arr['person_id']).' AND DATE(absence_current_start_datetime)="'.date('Y-m-d').'" AND absence_current_finish_datetime IS NULL');
						if ($absence_id>0) {
							$where = 'absence_id='.intval($absence_id);
						}
						$response = $this->save($where);

						$type = (trim($type)=="start")?'masuk':'pulang';
						$status = $response['status']; $message = ($response['status']==200)?'Berhasil melakukan absensi '.$type.'.':'Gagal melakukan absensi.';
				} else{
					$message = 'Pegawai tersebut sudah melakuan absensi masuk dan pulang.';
				}
			} else{
				$message = 'Pegawai tidak ditemukan.';
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
			'person_id' => (isset($person_arr['person_id']) AND trim($person_arr['person_id'])!='')?$person_arr['person_id']:0,
		);
	}
	/**
	* cek jam absensi
	*/
	public function has_check_absence_schedule(){
		$status = 500; $message = 'Jam absensi ditutup/belum waktunya absensi.';
		$current_time = date('H:i:s');

		if ((strtotime($current_time)>strtotime($this->websiteConfig->getStartSchedule())) || (strtotime($current_time)<strtotime($this->websiteConfig->getEndSchedule()))) {
			$status = 200; $message = 'Sudah dimulai jam absensi.';
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
}
?>