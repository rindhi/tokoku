<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Makun extends CI_Model {
	public function tambah($id, $nama, $jenis, $status, $password){
		$sql = "INSERT INTO akun VALUES('$id','$nama','$password','$jenis','$status');";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}

	public function data(){
		$sql = "SELECT * FROM akun";
		$data = $this->db->query($sql);
		if($data){
			return $data->result();
		}else{
			return 0;
		}
	}

	public function filter($id){
		$sql = "SELECT * FROM akun WHERE id = '$id'";
		$data = $this->db->query($sql);
		if($data){
			return $data->result();
		}else{
			return 0;
		}
	}

	public function update($id, $nama, $jenis, $status){
		$sql = "UPDATE akun SET nama='$nama', jenis='$jenis', status='$status' WHERE id='$id'";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}

	public function hapus($id){
		$sql = "DELETE FROM akun WHERE id='$id'";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}

	public function reset($id, $password){
		$sql = "UPDATE akun SET password = '$password' WHERE id = '$id'";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}
}