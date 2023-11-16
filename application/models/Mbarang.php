<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mbarang extends CI_Model {
	public function tambah($id, $nama, $harga, $satuan, $barcode){
		$sql = "INSERT INTO barang VALUES('$id','$nama','$harga','0','$satuan','$barcode');";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}

	public function data(){
		$sql = "SELECT * FROM barang";
		$data = $this->db->query($sql);
		if($data){
			return $data->result();
		}else{
			return 0;
		}
	}

	public function filter($id){
		$sql = "SELECT * FROM barang WHERE id = '$id'";
		$data = $this->db->query($sql);
		if($data){
			return $data->result();
		}else{
			return 0;
		}
	}

	public function update($id, $nama, $harga, $satuan, $barcode){
		$sql = "UPDATE barang SET nama='$nama', harga='$harga', satuan='$satuan', barcode='$barcode' WHERE id='$id'";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}

	public function hapus($id){
		$sql = "DELETE FROM barang WHERE id='$id'";
		$data = $this->db->query($sql);
		if($data){
			return "1";
		}else{
			return "0";
		}
	}
}