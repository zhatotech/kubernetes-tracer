<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
	    parent::__construct();
	    $this->load->model('Admin_m');
	}
	public function index()
	{
		// cek user sudah login atau belum
		if (!$this->ion_auth->logged_in()) {
			$msg = 'Login terlebih dahulu';
			$this->session->set_flashdata('msgeror',$msg);
			redirect(base_url('login'));
		}else{
			// cek hak akses user saat login
			$level = array('admin','members');
			$data['menu'] = 'home';
			if ($this->ion_auth->in_group($level)) {
				$getuser = $this->ion_auth->user()->row();
				$infopt = $this->Admin_m->info_pt('1');				
				$data['title'] = 'Dashboard '.$infopt->nama_info_pt;
				$data['getuser'] = $getuser;
				$data['infopt'] = $infopt;
				$infoptpmb = $infopt;
				if ($this->ion_auth->in_group('admin')) {
					$data['nav'] = 'navigasi/nav-admin-v';
				}elseif ($this->ion_auth->in_group('peserta')) {
					$data['nav'] = 'navigasi/nav-peserta-v';
				}else{
					$data['nav'] = 'navigasi/nav-operator-v';
				}
				$data['infoptpmb'] = $infopt;
				// $data['berkasgel1'] = $this->Peserta_m->jml_by_gel($infoptpmb->angkatan,'1','1','0');
				$this->load->view('templates/h-dashboard-v',$data);
				$this->load->view('dashboard/index-v');
				$this->load->view('templates/f-dashboard-v');
			}else{
				// pesan eror ketika hak akses tidak sesuai
				$msg = 'Anda tidak memiliki hak untuk mengakses halaman ini';
				$this->session->set_flashdata('msgeror',$msg);
				redirect(base_url('dashboard'));
			}
		}
	}
}
