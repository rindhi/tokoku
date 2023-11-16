<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
	public $namauser;
	function __construct() {
		parent::__construct();
		if($this->session->userdata(nama_sesi)){
			$token = $this->session->userdata(nama_sesi);
			$decrypttoken = $this->encryption->decrypt(base64_decode($token));
			$x = explode("|", $decrypttoken);
			$id = $x[0];
			$p = $x[1];
			$hasil = $this->Mlogin->ceklogin($id, $p);
			if(is_array($hasil)){
				if(count($hasil)>0){
					foreach($hasil as $y){
						$this->namauser = $y->nama;
					}
				}else{
					redirect(base_url('Login'));
				}
			}else{
				redirect(base_url('Login'));
			}
		}else{
			redirect(base_url('Login'));
		}
	}
	public function index(){
		$xyz["konten"] = "beranda";
		$z["nama"] = $this->namauser;
		$this->load->view("Administrator/beranda", $z, true);
		$this->load->view("Administrator/home", $xyz);
	}

	// function menu barang
	public function barang(){
		$xyz["konten"] = "barang";
		$this->load->view("Administrator/home", $xyz); //diarahkan ke home agar bisa menerapkan konsep modular
	}

	public function barang_tampil(){
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->Mbarang->data();
		foreach ($dt as $k){
			$id = $k->id;
			$nama = $k->nama;
			$harga = $k->harga;
			$satuan = $k->satuan;
			$barcode = $k->barcode;
			$stok = $k->stok;
			$tombol = "<button type='button' class='btn btn-primary' data-idx='".$id."' onclick='filter(this)'>Edit</button>";
			$dtisi .= '["'.$tombol.'","'.$id.'","'.$nama.'","'.$harga.'","'.$stok.'","'.$satuan.'","'.$barcode.'"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}

	public function barang_tambah(){
		$id = $this->input->post("id");
		$nama = $this->input->post("nama");
		$harga = $this->input->post("harga");
		$satuan = $this->input->post("satuan");
		$barcode = $this->input->post("barcode");
		$hasil = $this->Mbarang->tambah($id, $nama, $harga, $satuan, $barcode);
		if($hasil == "1"){
			echo base64_encode("1|Tambah Barang Berhasil");
		}else{
			echo base64_encode("0|Tambah Barang Gagal, Silahkan Cek Datanya");
		}
	}

	public function barang_filter(){
		$id = $this->input->post("id");
		$hasil = $this->Mbarang->filter($id);
		if(is_array($hasil)){
			if(count($hasil)>0){
				foreach($hasil as $y){
					$nama = $y->nama;
					$harga = $y->harga;
					$sat = $y->satuan;
					$bar = $y->barcode;
				}
				echo base64_encode("1|$nama|$harga|$sat|$bar");
			}else{
				echo base64_encode("0|Barang Tidak Ditemukan");
			}
		}else{
			echo base64_encode("0|Barang Tidak Ditemukan");
		}
	}

	public function barang_update(){
		$id = $this->input->post("id");
		$nama = $this->input->post("nama");
		$harga = $this->input->post("harga");
		$satuan = $this->input->post("satuan");
		$barcode = $this->input->post("barcode");
		$hasil = $this->Mbarang->update($id, $nama, $harga, $satuan, $barcode);
		if($hasil == "1"){
			echo base64_encode("1|Update Barang Berhasil");
		}else{
			echo base64_encode("0|Update Barang Gagal, Silahkan Cek Datanya");
		}
	}

	public function barang_hapus(){
		$id = $this->input->post("id");
		$hasil = $this->Mbarang->hapus($id);
		if($hasil == "1"){
			echo base64_encode("1|Hapus Barang Berhasil");
		}else{
			echo base64_encode("0|Hapus Barang Gagal, Silahkan Cek Datanya");
		}
	}

	// funcion menu akun
	public function akun(){
		$xyz["konten"] = "akun";
		$this->load->view("Administrator/home", $xyz); //diarahkan ke home agar bisa menerapkan konsep modular
	}

	public function akun_tampil(){
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->Makun->data();
		foreach ($dt as $k){
			$id = $k->id;
			$nama = $k->nama;
			$jenis = $k->jenis;
			$status = $k->status == "1" ? "Aktif" : "Tak Aktif"; // if tennary digunakan jika hanya ada 2 pilihan seperti aktif dan tidak aktif, tanda ? digunakan sebagai pembatas.
			$tombol = "<button type='button' class='btn btn-primary' data-idx='".$id."' onclick='filter(this)'>Edit</button>&nbsp<button type='button' class='btn btn-danger' data-idx='".$id."' onclick='reset(this)'>Reset</button>";
			$dtisi .= '["'.$tombol.'","'.$id.'","'.$nama.'","'.$jenis.'","'.$status.'"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}

	public function akun_tambah(){
		$id = strtotime(date("Y-m-d H:i:s"));
		$nama = $this->input->post("nama");
		$jenis = $this->input->post("jenis");
		$status = $this->input->post("status");
		$password = enkripsi("123456");
		$hasil = $this->Makun->tambah($id, $nama, $jenis, $status, $password);
		if($hasil == "1"){
			echo base64_encode("1|Tambah Akun Berhasil, Default Password: 123456");
		}else{
			echo base64_encode("0|Tambah Akun Gagal, Silahkan Cek Datanya");
		}
	}

	public function akun_filter(){
		$id = $this->input->post("id");
		$hasil = $this->Makun->filter($id);
		if(is_array($hasil)){
			if(count($hasil)>0){
				foreach($hasil as $y){
					$nama = $y->nama;
					$jenis = $y->jenis;
					$status = $y->status;
				}
				echo base64_encode("1|$nama|$jenis|$status");
			}else{
				echo base64_encode("0|Akun Tidak Ditemukan");
			}
		}else{
			echo base64_encode("0|Akun Tidak Ditemukan");
		}
	}

	public function akun_update(){
		$id = $this->input->post("id");
		$nama = $this->input->post("nama");
		$jenis = $this->input->post("jenis");
		$status = $this->input->post("status");
		$hasil = $this->Makun->update($id, $nama, $jenis, $status);
		if($hasil == "1"){
			echo base64_encode("1|Update Akun Berhasil");
		}else{
			echo base64_encode("0|Update Akun Gagal, Silahkan Cek Datanya");
		}
	}

	public function akun_hapus(){
		$id = $this->input->post("id");
		$hasil = $this->Makun->hapus($id);
		if($hasil == "1"){
			echo base64_encode("1|Hapus Akun Berhasil");
		}else{
			echo base64_encode("0|Hapus Akun Gagal, Silahkan Cek Datanya");
		}
	}

	public function akun_reset(){
		$id = $this->input->post("id");
		$password = enkripsi("123456");
		$hasil = $this->Makun->reset($id, $password);
		if($hasil == "1"){
			echo base64_encode("1|Reset Akun Berhasil");
		}else{
			echo base64_encode("0|Reset Akun Gagal, Silahkan Cek Datanya");
		}
	}

	public function pembelian_tampil(){
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->Mbarang->data();
		foreach ($dt as $k){
			$id = $k->id;
			$nama = $k->nama;
			$harga = $k->harga;
			$satuan = $k->satuan;
			$barcode = $k->barcode;
			$stok = $k->stok;
			$tombol = "<button type='button' class='btn btn-primary' data-idx='".$id."' onclick='filter(this)'>Edit</button>";
			$dtisi .= '["'.$tombol.'","'.$id.'","'.$nama.'","'.$harga.'","'.$stok.'","'.$satuan.'","'.$barcode.'"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}

	// function menu barang masuk
    public function brgmasuk(){
        $xyz["konten"] = "brgmasuk";
        $this->load->view("Administrator/home", $xyz);
    }

    // function menu detail barang
    public function detailbrg(){
        $xyz["konten"] = "detailbrg";
        $this->load->view("Administrator/home", $xyz);
    }

    // function menu transaksi
    public function transaksi(){
        $xyz["konten"] = "transaksi";
        $this->load->view("Administrator/home", $xyz);
    }

    // function menu detail transaksi
    public function detailtrans(){
        $xyz["konten"] = "detailtrans";
        $this->load->view("Administrator/home", $xyz);
    }

    // function menu keranjang
    public function keranjang(){
        $xyz["konten"] = "keranjang";
        $this->load->view("Administrator/home", $xyz);
    }

    // function menu pelanggan
    public function pelanggan(){
        $xyz["konten"] = "pelanggan";
        $this->load->view("Administrator/home", $xyz);
    }

}
