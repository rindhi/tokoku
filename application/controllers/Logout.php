<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {
	public function index(){
		$this->session->sess_destroy(nama_sesi);
	}
	public function ganti_password(){
		$plama = $this->input->post("plama");
		$pbaru = $this->input->post("pbaru");
		$passe = enkripsi($plama);
		$passx = enkripsi($pbaru);
		$xy = $this->encryption->decrypt(base64_decode($this->session->userdata(nama_sesi)));
		$dt = explode("|", $xy);
		$hasil = $this->Mlogin->ceklogin($dt[0], $passe);
		if(is_array($hasil)){
			if(count($hasil)>0){
				$opr = $this->Mlogin->ganti_password($dt[0], $passx);
				if($opr == "1"){
					echo base64_encode("1|Password Berhasil di Update");
				}else{
					echo base64_encode("0|Password Gagal di Update");
				}
			}else{
				echo base64_encode("0|Password Salah atau Akun Tidak ditemukan");
			}
		}else{
			echo base64_encode("0|Password Salah atau Akun Tidak ditemukan");
		}
	}
}