<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_database extends CI_Model {
	public function dbInsert($table_name, $data)
	{
		$insertData = $this->db->insert($table_name, $data);
		return $insertData;
	}
	
	public function dbInsertReturn($table_name, $data)
	{
		$insertData = $this->db->insert($table_name, $data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}

	public function dbReplace($table_name, $data)
	{
		$insertData = $this->db->replace($table_name, $data);
		return $insertData;
	}

	public function updateData($table_name, $column, $key, $data)
	{
		$this->db->where($column, $key);
		$result = $this->db->update($table_name, $data);
		return $result;
		
	}

	public function sqlUpdate($sql)
	{
		$result = $this->db->query($sql);
		return $result;
		
	}

	public function getSpecific($table_name, $array)
	{
		$query = $this->db->get_where($table_name, $array);
		if($query->num_rows() > 0){
			$rows = $query->row();
			return $rows;
		}
	}

	public function getAllSpecific($table, $array) {
		$query = $this->db->get_where($table, $array);
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function getAll($db) {
		$query = $this->db->get($db);
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
		}
	}

	public function passSQL($sql)
	{
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			$rows = $query->row();
			return $rows;
		}
	}

	public function passSQLAll($sql)
	{
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			return $data;
			
		} else {return false;}
	}

	public function deleteFrom($table_name, $array)
	{
		$result = $this->db->delete($table_name, $array);
		return $result;
	}

	public function encrypt_password($password) {
		$encryption_key = $this->config->item('encryption_key');
		$salt = $this->config->item("encryption_salt");
		$encrypted_password = sha1($encryption_key.$password.$salt);
		return $encrypted_password;
	}

	public function fetch_identifier($identifier) {
		$encryption_key = $this->config->item('encryption_key');
		$salt = $this->config->item("encryption_salt");
		$result = md5($encryption_key.$identifier.$salt);
		return $result;
	}

	public function fetch_settings($setting_key) {
		$setting = $this->getSpecific("system_preferences", ["preference_key" => $setting_key]);
		return $setting->preference_value;
	}
	
	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	public function generateRandomString($strl_type = "", $length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		if($strl_type == "pin") $characters = '0123456789';
		$randomString = '';
		$charactersLength = strlen($characters);
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}