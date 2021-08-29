<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Systembot extends CI_Controller {

	public function index()
	{
		// $TOKEN = "1107680264:AAGDTLFXccOM7gAiqKEDzMQ1LEFhMoBAJJs";
		// $apiURL = "https://api.telegram.org/bot$TOKEN/getupdates/";
		//$cek = file_get_contents("php://input");
		// $update = json_decode(, TRUE);
		// echo "<pre>";print_r($cek);echo "</pre>";exit();
		$API = "https://api.telegram.org/bot1107680264:AAGDTLFXccOM7gAiqKEDzMQ1LEFhMoBAJJs/getupdates";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, $API);
		$result = curl_exec($ch);
		curl_close($ch);
		// echo "<pre>";print_r($result);echo "</pre>";exit();
		// return $result;
		$hasil = json_decode($result);
		echo "<pre>";print_r($hasil);echo "</pre>";exit();
	}
	public function kirimpesan($idchat,$pesan) {
		$getidchat = trim($idchat);
		// $getuser= $this->ion_auth->users()->row();
	    $pesan = json_encode($pesan);
	    $API = "https://api.telegram.org/bot1107680264:AAGDTLFXccOM7gAiqKEDzMQ1LEFhMoBAJJs/sendmessage?chat_id=".$getidchat."&text=$pesan";
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_URL, $API);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
	}
	public function info(){
		phpinfo();
	}
	public function tes() {
		// persiapkan curl
		$ch = curl_init(); 

    // set url 
		curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot1107680264:AAGDTLFXccOM7gAiqKEDzMQ1LEFhMoBAJJs/getupdates");

    // return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
		$output = curl_exec($ch); 

    // tutup curl 
		curl_close($ch);      

    // menampilkan hasil curl
		$hasil = json_decode($output);
		echo "<pre>"; print_r($hasil);echo"</pre>";exit();
	}
}
