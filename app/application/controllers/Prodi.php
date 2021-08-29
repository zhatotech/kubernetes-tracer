<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		// $this->load->model('prodi_m');
		$this->load->library('Myfeeder');
	}
	public function index(){

		$post = $this->input->post();
		$getuser = $this->ion_auth->user()->row();
		$infopt = $this->Admin_m->info_pt('1');
		$allpt = $this->Admin_m->select_data('info_pt');
		$data['title'] = 'Daftar prodi '.$infopt->nama_info_pt;
		$data['menu'] = 'menu';
		$data['brand'] = $infopt->logo_pt;
		$data['infopt'] = $infopt;
		$data['allprodi'] = $this->myfeeder->getAllProdi()->data;
		// echo "<pre>";print_r($data['allprodi']);echo "</pre>";exit();
		$data['getuser'] = $getuser;
		if ($this->ion_auth->in_group('admin')) {
			$data['nav'] = 'navigasi/nav-admin-v';
		}elseif ($this->ion_auth->in_group('peserta')) {
			$data['nav'] = 'navigasi/nav-peserta-v';
		}else{
			$data['nav'] = 'navigasi/nav-operator-v';
		}
		// echo "<pre>";print_r($data['allprodi']);echo"</pre>";exit();
		$data['detail'] = $getuser;
		$data['page'] = 'admin/prodi/index-v';
		$this->load->view('admin/dashboard-v',$data);
	}
}
