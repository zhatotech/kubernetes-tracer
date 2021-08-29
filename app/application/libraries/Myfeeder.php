<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myfeeder {

	// $getuser = $this->db->get_where('info_pt',['id_info_pt'=>1])->row();
	private $UserFeeder  = '091032';
	private $PassFeeder  = '147852369';

	public function getToken() {
		$type='json';
		$url = 'http://192.168.12.10:8082/ws/live2.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		$headers = array();
		if ($type == 'xml') 
			$headers[] = 'Content-Type: application/xml'; 
		else 
			$headers[] = 'Content-Type: application/json';
		$data = [
			'act'=>'GetToken',
			'username'=>$this->UserFeeder,
			'password'=>$this->PassFeeder
		];
		$data = json_encode($data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		/* contoh json: {"act":"GetToken","username":"agus","password":"abcdef"} */ 
		// $data = json_encode($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec($ch); curl_close($ch); 
		$hasil = json_decode($result);
		return $hasil;
		// echo "<pre>";print_r($hasil->data->token);echo"</pre>";exit(); 
	}
	public function runWS($act,$filter,$limit,$offset,$type='json') { 
		$url = 'http://192.168.12.10:8082/ws/live2.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		$headers = array();
		if ($type == 'xml') 
			$headers[] = 'Content-Type: application/xml'; 
		else 
			$headers[] = 'Content-Type: application/json';
		$getToken = $this->getToken();
		$data = [
			'act'=>$act,
			'token'=>$getToken->data->token,
			'filter'=>$filter,
			'limit'=>$limit,
			'offset'=>$offset,
		];
		$data = json_encode($data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec($ch); curl_close($ch); 
		$hasil = json_decode($result);
		return $hasil;
	}
	function getMhsByNIM($nim){
		// echo "<pre>";print_r('tes');echo"</pre>";exit();
		$newnim = preg_replace("/[^0-9]/", "",$nim); 
		$act = 'GetDataLengkapMahasiswaProdi';
		$filter = "nim = '{$newnim}'";
		$limit = '';
		$offset = '';
		$hasil = $this->runWS($act,$filter,$limit,$offset,'json'); 
		return $hasil;
	}
	function getMhsByIdreg($idreg){
		// echo "<pre>";print_r('tes');echo"</pre>";exit();
		$newidreg = preg_replace("/[^a-zA-Z0-9\-]/", "",$idreg); 
		$act = 'GetDataLengkapMahasiswaProdi';
		$filter = "id_registrasi_mahasiswa = '{$newidreg}'";
		$limit = '';
		$offset = '';
		$hasil = $this->runWS($act,$filter,$limit,$offset,'json'); 
		return $hasil;
	}
	function getMhsById($id){
		// echo "<pre>";print_r('tes');echo"</pre>";exit();
		$newid = preg_replace("/[^a-zA-Z0-9\-]/", "",$id); 
		$act = 'GetDataLengkapMahasiswaProdi';
		$filter = "id_mahasiswa = '{$newid}'";
		$limit = '';
		$offset = '';
		$hasil = $this->runWS($act,$filter,$limit,$offset,'json'); 
		return $hasil;
	}
	function getProfilPT(){
		$act = 'GetProfilPT';
		$filter = "";
		$limit = '';
		$offset = '';
		$hasil = $this->runWS($act,$filter,$limit,$offset,'json'); 
		return $hasil;
	}
	function getAllProdi(){
		$profil = $this->getProfilPT()->data[0];
		// echo "<pre>";print_r('tes');echo"</pre>";exit();
		$newid = preg_replace("/[^a-zA-Z0-9\-]/", "",$profil->id_perguruan_tinggi); 
		$act = 'GetAllProdi';
		$filter = "id_perguruan_tinggi = '{$newid}'";
		$limit = '';
		$offset = '';
		$hasil = $this->runWS($act,$filter,$limit,$offset,'json'); 
		return $hasil;
	}
}