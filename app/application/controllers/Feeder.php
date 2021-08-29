<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feeder extends CI_Controller {
	function __construct()
	{
	    parent::__construct();
	    $this->load->library('Myfeeder');
	}
	function getMahasiswa(){
		// echo "<pre>";print_r('tes');echo"</pre>";exit(); 
		$act = 'GetDataLengkapMahasiswaProdi';
		$filter = "id_prodi = 'c3103088-6dfe-4d03-9e87-94acc7d28446'";
		$limit = '10';
		$offset = '0';
		$jml = $this->myfeeder->runWS('GetCountMahasiswa',$filter,$limit,$offset,'json');
		$hasil = $this->myfeeder->runWS($act,$filter,$limit,$offset,'json');
		echo "<pre>";print_r($jml);echo"</pre>"; 
		echo "<pre>";print_r($hasil);echo"</pre>";exit(); 
	}
	function getProfilPt(){
		// echo "<pre>";print_r('tes');echo"</pre>";exit(); 
		$act = 'GetProfilPT';
		$filter = "";
		$limit = '';
		$offset = '';
		// $jml = $this->myfeeder->runWS('GetCountProdi',$filter,$limit,$offset,'json');
		$hasil = $this->myfeeder->runWS($act,$filter,$limit,$offset,'json');
		// echo "<pre>";print_r($jml);echo"</pre>"; 
		echo "<pre>";print_r($hasil);echo"</pre>";exit(); 
	}
	function getProdi(){
		// echo "<pre>";print_r('tes');echo"</pre>";exit(); 
		$act = 'GetAllProdi';
		$filter = "id_perguruan_tinggi = 'bca1db95-f1e1-473f-9e5c-0bf75a79a835'";
		$limit = '';
		$offset = '';
		// $jml = $this->myfeeder->runWS('GetCountProdi',$filter,$limit,$offset,'json');
		$hasil = $this->myfeeder->runWS($act,$filter,$limit,$offset,'json');
		// echo "<pre>";print_r($jml);echo"</pre>"; 
		echo "<pre>";print_r($hasil);echo"</pre>";exit(); 
	}
}
