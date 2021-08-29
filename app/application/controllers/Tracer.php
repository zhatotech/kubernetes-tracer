<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracer extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_m');
		$this->load->model('Tracer_m');
	}
	public function index($rowno=0){

		$post = $this->input->post();
		$getuser = $this->ion_auth->user()->row();
		$infopt = $this->Admin_m->info_pt('1');
		$allpt = $this->Admin_m->select_data('info_pt');
		$data['title'] = 'Daftar Tracer '.$infopt->nama_info_pt;
		$data['menu'] = 'menu';
		$data['brand'] = $infopt->logo_pt;
		$data['infopt'] = $infopt;
		$data['alltahun'] = $this->Admin_m->getTahun();
		$data['allperiode'] = $this->Admin_m->getPeriode();
		$data['getuser'] = $getuser;
		if ($this->ion_auth->in_group('admin')) {
			$data['nav'] = 'navigasi/nav-admin-v';
		}elseif ($this->ion_auth->in_group('peserta')) {
			$data['nav'] = 'navigasi/nav-peserta-v';
		}else{
			$data['nav'] = 'navigasi/nav-operator-v';
		}
		$data['detail'] = $getuser;
		$data['page'] = 'admin/tracer/index-v';
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
		if ($this->ion_auth->in_group('admin')) {
			$allcount = $this->Tracer_m->getrecordCount($search_text);
		    // Get records
			$users_record = $this->Tracer_m->getData($rowno,$rowperpage,$search_text);
		    // Pagination Configuration
		}else{
			$allcount = $this->Tracer_m->getrecordCountNim($getuser->usernme,$search_text);
			    // Get records
			$users_record = $this->Tracer_m->getDataNim($getuser->usernme,$rowno,$rowperpage,$search_text);
			    // Pagination Configuration
		}
		$config['base_url'] = base_url().'/tracer/index/';
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
	public function tambah(){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$post = $this->input->post();
				$getuser = $this->ion_auth->user()->row();
				$infopt = $this->Admin_m->info_pt('1');
				$allpt = $this->Admin_m->select_data('info_pt');
				$data['title'] = 'Tambah Tracer '.$infopt->nama_info_pt;
				$data['menu'] = 'menu';
				$data['brand'] = $infopt->logo_pt;
				$data['infopt'] = $infopt;
				$data['getuser'] = $getuser;
				if ($this->ion_auth->in_group('admin')) {
					$data['nav'] = 'navigasi/nav-admin-v';
				}elseif ($this->ion_auth->in_group('peserta')) {
					$data['nav'] = 'navigasi/nav-peserta-v';
				}else{
					$data['nav'] = 'navigasi/nav-operator-v';
				}
				$data['detail'] = $getuser;
				$data['page'] = 'admin/tracer/tambah-v';
				$this->load->view('admin/dashboard-v',$data);
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('login'));
		}
	}
	public function prosestambah(){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$post = $this->input->post();
				$getuser = $this->ion_auth->user()->row();
				$infopt = $this->Admin_m->info_pt('1');
				$post = $this->input->post();
				$data = array(
					'tahun'=>preg_replace("/[^0-9]/", "", $post['tahun']),
					'periode'=>preg_replace("/[^0-9]/", "", $post['periode']),
					'nm_periode'=>$post['nm_periode'],
					'created_at'=>date('Y-m-d H:i:s'),
					'user_create'=>$getuser->id,
					'user_edit'=>$getuser->id,
					'status_t'=>'1',
				);
				$this->db->insert('periode_tracer',$data);
				// echo "<pre>";print_r($data);echo"</pre>";exit();
				$msg = 'Tracer Studi baru berhasil dibuat';
				$this->session->set_flashdata('msgsukses', $msg);
				redirect(base_url('tracer'));
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('login'));
		}
	}
	public function detail($id){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$post = $this->input->post();
				$newid = preg_replace("/[^0-9]/", "",$id);
				$gettracer = $this->db->get_where('periode_tracer',['id_periode_t'=>$newid])->row();
				$getuser = $this->ion_auth->user()->row();
				$infopt = $this->Admin_m->info_pt('1');
				if ($gettracer == TRUE) {
					$data['title'] = 'Detail Tracer '.$gettracer->nm_periode;
					$data['menu'] = 'menu';
					$data['brand'] = $infopt->logo_pt;
					$data['infopt'] = $infopt;
					$data['getuser'] = $getuser;
					$data['gettracer'] = $gettracer;
					$data['alltype'] = $this->db->get('type_pertanyaan')->result();
					$data['allpertanyaan'] = $this->Tracer_m->getALlPertanyaan($gettracer->id_periode_t);
					// echo "<pre>";print_r($data['detail']);echo"</pre>";exit();
					if ($this->ion_auth->in_group('admin')) {
						$data['nav'] = 'navigasi/nav-admin-v';
					}elseif ($this->ion_auth->in_group('peserta')) {
						$data['nav'] = 'navigasi/nav-peserta-v';
					}else{
						$data['nav'] = 'navigasi/nav-operator-v';
					}
					$data['detail'] = $getuser;
					$data['page'] = 'admin/tracer/detail-v';
					$this->load->view('admin/dashboard-v',$data);
				}else{
					$msg = 'Tracer Study tidak ditemukan, data telah di hapus atau terjadi error';
					$this->session->set_flashdata('msgeror', $msg);
					redirect(base_url('tracer/'));
				}
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('login'));
		}
	}
	public function prsaddpertanyaan($id){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$newid = preg_replace("/[^0-9]/", "", $id);
				$gettracer = $this->db->get_where('periode_tracer',['id_periode_t'=>$newid])->row();
				if ($gettracer == TRUE) {
					$this->form_validation->set_rules('no_urut','Nomor Urut', 'numeric|required|max_length[4]|trim');
					$this->form_validation->set_rules('nm_pertanyaan','Soal Pertanyaan', 'required|trim');
					if ($this->form_validation->run() == TRUE) {
						$post = $this->input->post();
						$getuser = $this->ion_auth->user()->row();
						$infopt = $this->Admin_m->info_pt('1');
						$post = $this->input->post();
						$getcount = $this->db->get('pertanyaan')->num_rows();
						$newcount = $getcount+1;
						$kodes = trim('kp'.sprintf("%06s", $newcount));
						$data = array(
							'id_periode_t'=>$newid,
							'kd_pertanyaan'=>$kodes,
							'no_urut'=>preg_replace("/[^0-9]/", "", $post['no_urut']),
							'nm_pertanyaan'=>$post['nm_pertanyaan'],
							'type_opsi'=>$post['type_opsi'],
							'created_at'=>date('Y-m-d H:i:s'),
							'user_create'=>$getuser->id,
							'user_edit'=>$getuser->id,
							'status'=>'1',
						);
						$this->db->insert('pertanyaan',$data);
						// echo "<pre>";print_r($data);echo"</pre>";exit();
						$msg = 'Tracer Studi baru berhasil dibuat';
						$this->session->set_flashdata('msgsukses', $msg);
						redirect(base_url('tracer/detailpertanyaan/'.$newid.'/'.$kodes));
					}else{
						// pesan eror ketika hak validasi tidak sesuai
						$msg = validation_errors();
						$this->session->set_flashdata('msgeror',$msg);
						redirect(base_url('tracer/detail/'.$newid));
					}
				}else{
					$msg = 'Data tidak ditemukan atau telah di hapus, harap periksa kembali data anda.';
					$this->session->set_flashdata('msgeror',$msg);
					redirect(base_url('tracer'));
				}
					
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('login'));
		}
	}
	public function detailpertanyaan($id,$kode){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$post = $this->input->post();
				$newid = preg_replace("/[^0-9]/", "",$id);
				$newkode = preg_replace("/[^a-zA-Z0-9]/", "",$kode);
				$gettracer = $this->db->get_where('periode_tracer',['id_periode_t'=>$newid])->row();
				$gettkode = $this->Tracer_m->detPertanyaan($newkode);
				$getuser = $this->ion_auth->user()->row();
				$infopt = $this->Admin_m->info_pt('1');
				if ($gettracer == TRUE && $gettkode == TRUE) {
					$data['title'] = 'Detail Pertanyaan - '.$gettkode->kd_pertanyaan;
					$data['menu'] = 'menu';
					$data['brand'] = $infopt->logo_pt;
					$data['detail'] = $getuser;
					$data['infopt'] = $infopt;
					$data['getuser'] = $getuser;
					$data['gettracer'] = $gettracer;
					$data['gettkode'] = $gettkode;
					$data['allopsi'] = $this->Tracer_m->getAllOpsi($gettracer->id_periode_t,$gettkode->id_pertanyaan);
					// echo "<pre>";print_r($data['detail']);echo"</pre>";exit();
					if ($this->ion_auth->in_group('admin')) {
						$data['nav'] = 'navigasi/nav-admin-v';
					}elseif ($this->ion_auth->in_group('peserta')) {
						$data['nav'] = 'navigasi/nav-peserta-v';
					}else{
						$data['nav'] = 'navigasi/nav-operator-v';
					}
					$data['page'] = 'admin/tracer/detail-pertanyaan-v';
					$this->load->view('admin/dashboard-v',$data);
				}else{
					$msg = 'Tracer Study tidak ditemukan, data telah di hapus atau terjadi error';
					$this->session->set_flashdata('msgeror', $msg);
					redirect(base_url('tracer/'));
				}
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('login'));
		}
	}
	public function prstambahopsi($id,$idtanya){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$newid = preg_replace("/[^0-9]/", "", $id);
				$newidtanya = preg_replace("/[^0-9]/", "", $idtanya);
				$gettracer = $this->db->get_where('periode_tracer',['id_periode_t'=>$newid])->row();
				$getpertanyaan = $this->Tracer_m->detPertanyaanById($newidtanya);
				if ($gettracer == TRUE && $getpertanyaan == TRUE) {
					$this->form_validation->set_rules('nm_opsi','Kode Opsi', 'alpha_numeric|required|max_length[4]|trim');
					$this->form_validation->set_rules('isi_opsi','Judul Opsi', 'required|trim');
					$this->form_validation->set_rules('kunci_opsi','Kunci Jawaban', 'numeric|required|trim');
					$this->form_validation->set_rules('opsi_lainnya','Opsi Lainnya', 'numeric|required|trim');
					if ($this->form_validation->run() == TRUE) {
						$post = $this->input->post();
						$getuser = $this->ion_auth->user()->row();
						$infopt = $this->Admin_m->info_pt('1');
						$post = $this->input->post();
						$data = array(
							'id_periode_t'=>$gettracer->id_periode_t,
							'id_pertanyaan'=>$getpertanyaan->id_pertanyaan,
							'nm_opsi'=>$post['nm_opsi'],
							'isi_opsi'=>$post['isi_opsi'],
							'kunci_opsi'=>$post['kunci_opsi'],
							'opsi_lainnya'=>$post['opsi_lainnya'],
							'created_at'=>date('Y-m-d H:i:s'),
							'user_create'=>$getuser->id,
							'user_edit'=>$getuser->id,
						);
						$this->db->insert('opsi_pertanyaan',$data);
						// echo "<pre>";print_r($data);echo"</pre>";exit();
						$msg = 'Opsi Pertanyaan untuk Soal - '.$getpertanyaan->kd_pertanyaan.' berhasil di tambahkan.';
						$this->session->set_flashdata('msgsukses', $msg);
						redirect(base_url('tracer/detailpertanyaan/'.$gettracer->id_periode_t.'/'.$getpertanyaan->kd_pertanyaan));
					}else{
						// pesan eror ketika hak validasi tidak sesuai
						$msg = validation_errors();
						$this->session->set_flashdata('msgeror',$msg);
						redirect(base_url('tracer/detailpertanyaan/'.$gettracer->id_periode_t.'/'.$getpertanyaan->kd_pertanyaan));
					}
				}else{
					$msg = 'Data tidak ditemukan atau telah di hapus, harap periksa kembali data anda.';
					$this->session->set_flashdata('msgeror',$msg);
					redirect(base_url('tracer'));
				}
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('login'));
		}
	}
	public function delopsi($idtc,$idtanya,$id){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin','members');
			if ($this->ion_auth->in_group($level)) {
				$newid = preg_replace("/[^0-9]/", "", $idtc);
				$newidtanya = preg_replace("/[^0-9]/", "", $idtanya);
				$newidopsi = preg_replace("/[^0-9]/", "", $id);
				$gettracer = $this->db->get_where('periode_tracer',['id_periode_t'=>$newid])->row();
				$getpertanyaan = $this->Tracer_m->detPertanyaanById($newidtanya);
				if ($gettracer == TRUE && $getpertanyaan == TRUE) {
					$this->db->delete('opsi_pertanyaan',['id_opsi'=>$newidopsi]);
					$msg = 'Opsi Pertanyaan berhasil di hapus';
					$this->session->set_flashdata('msgsukses', $msg);
					redirect(base_url('tracer/detailpertanyaan/'.$gettracer->id_periode_t.'/'.$getpertanyaan->kd_pertanyaan));
				}else{
						// pesan eror ketika hak validasi tidak sesuai
					$msg = validation_errors();
					$this->session->set_flashdata('msgeror',$msg);
					redirect(base_url('tracer/detailpertanyaan/'.$gettracer->id_periode_t.'/'.$getpertanyaan->kd_pertanyaan));
				}
			}else{
				$msg = 'anda tidak memiliki hak untuk mengakses halaman ini.';
				$this->session->set_flashdata('msgeror', $msg);
				redirect(base_url('dashboard'));
			}
		}else{
			$msg = 'Harap login terlebih dahulu';
			$this->session->set_flashdata('msgeror', $msg);
			redirect(base_url('login'));
		}
	}
}
