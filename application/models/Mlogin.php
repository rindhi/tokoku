<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mlogin extends CI_Model {
	public function ceklogin($id, $pass){
		$sql = "SELECT * FROM akun WHERE id = '$id' AND password = '$pass'";
		$data = $this->db->query($sql);
		if($data){
			return $data->result();
		}else{
			return 0;
		}
	}

	public function ganti_password($id, $pass){
		$sql = "UPDATE akun SET password = '$pass' WHERE id = '$id'";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}
}