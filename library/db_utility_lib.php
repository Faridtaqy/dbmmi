<?php
require_once FCPATH.'/config/config.php';
class db_utility_lib extends config
{
	protected $mainTable;
	protected $postData=array();
	function __construct()
	{
		parent::__construct();
		$this->mainTable = 'sample';
	}
	/**
	* cek insert id terakhir
	*/
	public function insert_id(){
        $query = $this->query('SELECT LAST_INSERT_ID()');
        $row = $this->row_array($query);
        return $row['LAST_INSERT_ID()'];
	}
	/**
	* digunakan untuk eksekusi query sql
	*/
	public function query($sql=''){
		$this->query = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));
		return $this->query;
	}
	/**
	* digunakan untuk output result eksekusi query
	* dalam bentuk satu baris
	*/
	public function num_rows($query=''){
		$this->num_rows = mysqli_num_rows($query);
		return $this->num_rows;
	}
	/**
	* digunakan untuk output result eksekusi query
	* dalam bentuk satu baris
	*/
	public function row_array($query=''){
		$this->row_array = mysqli_fetch_assoc($query);
		return $this->row_array;
	}
	/**
	* digunakan untuk output result eksekusi query
	* dalam bentuk multi baris
	*/
	public function result_array($query=''){
		$data_arr = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$data_arr[] = $row;
		}
		return $data_arr;
	}
	/**
	* digunakan untuk menjumlah total baris data
	* @param string $where
	*/
	public function countAll($where=1){
		$sql = 'SELECT COUNT(*) AS total FROM '.$this->mainTable.' WHERE '.$where;
		$result = $this->query($sql);
		$total = $this->row_array($result);
		return $total['total'];
	}
	/**
	* digunakan untuk mencari baris data
	* @param string $where
	*/
	public function find($where=1){
		$sql = 'SELECT * FROM '.$this->mainTable.' WHERE '.$where;
		$result = $this->query($sql);
		return $this->row_array($result);
	}
	/**
	* digunakan untuk mencari baris data
	* @param string $where
	*/
	public function findAll($where=1,$limit=10,$offset=0,$order_by=''){
		$sql = 'SELECT * FROM '.$this->mainTable.' WHERE '.$where;
		if(trim($order_by)!=''){
			$sql .= ' ORDER BY '.$order_by;
		}
		if(is_numeric($limit) AND is_numeric($offset)){
			$sql .= ' LIMIT '.$offset.', '.$limit;
		}
		$result = $this->query($sql);
		return $this->result_array($result);
	}
	/**
	* interface set for maintable
	*/
	public function setMainTable($table=''){
		$this->mainTable = $table;
	}
	/**
	* interface get for maintable
	*/
	public function getMainTable(){
		return $this->mainTable;
	}
	/**
	* interface set postdata
	*/
	public function setPostData($column=array()){
		$this->postData = $column;
	}
	/**
	*Inner join
	*/
	public function JoinAll($join){
		$this->$sql= "SELECT $join";
		$this->$sql=$join;
		return $this;
	}
	
	/**
	* digunakan untuk menyimpan data kedalam table
	* baik dalam kondisi insert maupun update, ketika update wajib mengisi parameter where
	* @param string $where
	*/
	public function save($where=''){
        $status=500;
        $message='Error save data.';
        if(trim($where)!='')
        {
            $sql='UPDATE '.$this->mainTable.' SET ';
            if(!empty($this->postData))
            {
                $no=1;
                foreach($this->postData AS $column=>$value)
                {
                    $separated=($no>=1 AND $no<count($this->postData))?',':'';
                    $sql.=' '.$column.'="'.$value.'"'.$separated;
                    $no++;
                }
            }
            $sql.=' WHERE '.$where;
            $this->query($sql);
            $status=200;
            $message='OK';
        }
        else
        {
            $this->insert($this->mainTable,$this->postData);
            $status=200;
            $message='OK';
        }
        return array(
            'status'=>$status,
            'message'=>$message,
        );
	}
	/**
	* digunakan untuk menyimpan data kedalam table
	* @param string $table
	* @param array $set
	*/
	public function insert($table='',$set=array()){
		$status = 500; $message = 'Error insert data.';

		$column=$value='';
		if(!empty($set)){
			foreach ($set as $key => $index) {
				//adding key into column
				if(trim($column)!=''){
					$column .= ',';
				}
				$column .= $key;

				//adding index into value
				if(trim($value)!=''){
					$value .= ',';
				}
				$value .= '"'.$index.'"';
			}
			$sql = 'INSERT INTO '.$table.'('.$column.') VALUES('.$value.')';
			//echo '<pre>'; print_r($sql); exit;
			$this->query($sql);
			$status = 200; $message = 'OK.';
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* digunakan untuk menghapus data dalam maintable
	*/
	public function delete($where=1){
		$status = 500; $message = 'Error delete data.';

		if(trim($where)!=''){
			$data_arr = $this->find($where);
			if(!empty($data_arr)){
				$sql = 'DELETE FROM '.$this->mainTable.' WHERE '.$where;
				try {
					$this->query($sql);
					$status=200; $message='Success delete data.';
				} catch (Exception $e) {
					$status=500; $message='Failed delete data.';
				}
			}
		}

		return array(
			'status' => $status,
			'message' => $message,
		);
	}
	/**
	* ambil id terakhir input
	*/
	public function last_id(){
        $query = $this->query('SELECT LAST_INSERT_ID() AS ID');
        $row = $this->row_array($query);
        return $row['ID'];
	}
	/**
	* untuk mendapatkan satu hasil
	* @param string $field
	* @param string $table
	* @param string $where
	*/
    function get_one($field='',$table='',$where='')
    {
        $result = $this->query("SELECT ".$field." FROM ".$table." WHERE ".$where." LIMIT 1");
        if($this->num_rows($result) > 0)
        {
            $row = $this->row_array($result);
            return $row[$field];
        }
        else return "";
    }
}
?>