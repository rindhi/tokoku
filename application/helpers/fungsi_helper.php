<?php
    function enkripsi($x){
        $hasil = base64_encode(openssl_encrypt($x, "AES-256-CBC", "sembarang", 0, "0123456789abcdef"));
        return $hasil;
    }

    function deskripsi($x){
        $hasil = openssl_decrypt(base64_decode($x), "AES-256-CBC", "sembarang", 0, "0123456789abcdef");
        return $hasil;
    }


    function tgl_indo($xy){
    	$tgl = substr($xy, 8, 2);
    	$bln = substr($xy, 5, 2);
     	$thn = substr($xy, 0, 4);
    	return $tgl."-".$bln."-".$thn;
    }

    function tgl_indo_lengkap($xy){
        $tgl = substr($xy, 8, 2);
    	$thn = substr($xy, 0, 4);
    	switch(substr($xy, 5, 2)){
    		case "01":
    			$bln = "Jan";
    			break;
    		case "02":
    			$bln = "Feb";
    			break;
    		case "03":
    			$bln = "Mar";
    			break;
    		case "04":
    			$bln = "Apr";
    			break;
    		case "05":
    			$bln = "Mei";
    			break;
    		case "06":
    			$bln = "Jun";
    			break;
    		case "07":
    			$bln = "Jul";
    			break;
    		case "08":
    			$bln = "Agu";
    			break;
    		case "09":
    			$bln = "Sep";
    			break;
    		case "10":
    			$bln = "Okt";
    			break;
    		case "11":
    			$bln = "Nov";
    			break;
    		default:
    			$bln = "Des";
    			break;
    	}
    	return $tgl. " ".$bln." ".$thn;
	}
	
	function tgl_indo_lengkap2($xy){
        $tgl = substr($xy, 8, 2);
    	$thn = substr($xy, 0, 4);
    	switch(substr($xy, 5, 2)){
    		case "01":
    			$bln = "Jan";
    			break;
    		case "02":
    			$bln = "Feb";
    			break;
    		case "03":
    			$bln = "Mar";
    			break;
    		case "04":
    			$bln = "Apr";
    			break;
    		case "05":
    			$bln = "Mei";
    			break;
    		case "06":
    			$bln = "Jun";
    			break;
    		case "07":
    			$bln = "Jul";
    			break;
    		case "08":
    			$bln = "Agu";
    			break;
    		case "09":
    			$bln = "Sep";
    			break;
    		case "10":
    			$bln = "Okt";
    			break;
    		case "11":
    			$bln = "Nov";
    			break;
    		default:
    			$bln = "Des";
    			break;
		}
		$c = explode(" ", $xy);
    	return $tgl. " ".$bln." ".$thn." ".$c[1];
	}


    function hari_indo($xy){
    	$h = date("w", strtotime($xy));
    	$hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
    	return $hari[$h];
    }

    function tgl_terakhir_bulan_lalu($xy){
    	$bln = substr($xy, 5, 2);
     	$thn = substr($xy, 0, 4);
     	$h = date("Y-m-d", strtotime($thn."-".$bln."-00"));
     	return $h;
    }

    function tgl_terakhir_bulan_ini($xy){
        $bln = substr($xy, 5, 2);
        $thn = substr($xy, 0, 4);
        $h = date("t", strtotime($xy));
        return $thn."-".$bln."-".$h;
    }

    function kode_oto(){
        return strtotime(date("Y-m-d H:i:s"));
	}

	function terjemah_periode($x){
		$bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des');
		$tahun = substr($x,0,4);
		$buln = substr($x,4,2);
		return $bulan[(int)$buln]." ".$tahun;
	
	}

	function status_approve($x){
		if($x == "1"){$status = "Disetujui";}
		else{
			if($x == "2"){$status = "Ditolak";}
			else{$status = "Proses";}
		}
		return $status;
	}