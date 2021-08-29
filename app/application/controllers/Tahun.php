<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Tahun_m');
	}
	public function index($rowno=0){

		$post = $this->input->post();
		$getuser = $this->ion_auth->user()->row();
		$infopt = $this->Admin_m->info_pt('1');
		$allpt = $this->Admin_m->select_data('info_pt');
		$data['title'] = 'Daftar Tahun '.$infopt->nama_info_pt;
		$data['menu'] = 'menu';
		$data['brand'] = $infopt->logo_pt;
		$data['infopt'] = $infopt;
		// echo "<pre>";print_r($data['allprodi']);echo "</pre>";exit();
		$data['getuser'] = $getuser;
		if ($this->ion_auth->in_group('admin')) {
			$data['nav'] = 'navigasi/nav-admin-v';
		}elseif ($this->ion_auth->in_group('peserta')) {
			$data['nav'] = 'navigasi/nav-peserta-v';
		}else{
			$data['nav'] = 'navigasi/nav-operator-v';
		}
		$data['detail'] = $getuser;
		$data['page'] = 'admin/tahun/index-v';
		$search_text = "";
		if($post == TRUE ){
			$search_text = $post;
			$this->session->set_userdata($post);
		}else{
			$post = array();
			if($this->session->userdata('string') != NULL){
				$post['string'] = $this->session->userdata('string');
			}
			$search_text = $post;
		}
	    // Row per page
		$rowperpage = 20;
	    // Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
		$allcount = $this->Tahun_m->getrecordCount($search_text);
	    // Get records
		$users_record = $this->Tahun_m->getData($rowno,$rowperpage,$search_text);
	    // Pagination Configuration
		$config['base_url'] = base_url().'/tahun/index/';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
	                 // style pagging
		$config['first_link']       = 'Pertama';
		$config['last_link']        = 'Terakhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-sm justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
	                // Initialize
		$this->pagination->initialize($config);
		$data['hasil'] = $users_record;
		$data['row'] = $rowno;
		$data['jmldata'] = $allcount;
		$data['search'] = $search_text;
		$data['post'] = $search_text;
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('admin/dashboard-v',$data);
	}
}
