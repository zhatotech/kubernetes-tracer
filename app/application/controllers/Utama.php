<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_m');
    $this->load->model('admin/Dokumen_m');
    $this->load->model('admin/Informasi_m');
    $this->load->model('admin/Statistik_m');
    $this->load->model('admin/Video_m');
    $this->load->model('Homepage_m');
  }
  public function index(){
    $post = $this->input->post();
    $tahunini = date('Y');
    $hariini = date('Y-m-d');
    $infopt = $this->Admin_m->info_pt('1');
    $allkategori = $this->Admin_m->select_data('kategori');
    $allsts = $this->Admin_m->select_data('status');
    $slider = $this->Admin_m->slider();
    $pejabat =$this->Statistik_m->view_ordering('dewan','id_dewan','asc')->result();
    $lastdok = $this->Dokumen_m->lastdok();
    $katgorbanyak = $this->Dokumen_m->katgorbanyak();
    $getberita3 = $this->Admin_m->getnewsall(4);
    $getberita2 = $this->Admin_m->getnewsoffest(4,0);
    $getdokumen = $this->Admin_m->select_limit('dokumen','id_dokumen','desc',3);
    $getinfo = $this->Admin_m->getinfo();
    $getberita1 = $this->Admin_m->getberita(3);
    $data['getinfo'] = $getinfo;
    $data['getberita'] = $getberita1;
    $data['getberita2'] = $getberita2;
    $data['getberita3'] = $getberita3;
    $data['getdokumen'] = $getdokumen;
    // echo "<pre>";print_r($katgorbanyak);echo "</pre>";exit();
    $data['title'] = $infopt->nama_info_pt;
    $data['infopt'] = $infopt;
    $data['page'] = 'utama/main-v';
    $data['allkategori'] = $allkategori;
    $alllaman = $this->Admin_m->laman_primer();
    $data['alllaman'] = $alllaman;
    $data['slider'] = $slider;
    $data['link'] = $this->Homepage_m->limit_link(16);
    $data['link2'] = $this->Homepage_m->limit_link(12);
    $data['allsts'] = $allsts;
    $data['halaman'] = $this->Homepage_m->all_laman();
    $data['informasi'] = $this->Homepage_m->informasi_home();
    $data['pejabat'] = $pejabat;
    $data['numpjbt'] = $this->Statistik_m->view('dewan');
    $data['video'] = $this->Homepage_m->result_table_limit('video','3');
    $data['infor'] = $this->Homepage_m->result_table_limit('info','5');
    $data['infor1'] = $this->Homepage_m->result_table_limit('info','3');
    $data['link'] = $this->Homepage_m->result_table_limit('link','6');
    $data['lastdok'] = $lastdok;
    $data['katgorbanyak'] = $katgorbanyak;
    $this->load->view('utama/dashboard-v',$data);
  }
  public function laman($alias){
    $post = $this->input->get();
    $maininfo = $this->Homepage_m->info_pt(1);
    $detail = $this->Admin_m->detail_data('laman','alias_laman',$alias);
    $data['title'] = $detail->judul_laman.'- '.$maininfo->nama_info_pt;
    $data['metadeskripsi'] = $detail->judul_laman;
    $data['metakeywords'] = $detail->judul_laman;
    $data['metakategori'] = $maininfo->nama_info_pt;
    $getinfo = $this->Admin_m->getinfo();
    $getberita1 = $this->Admin_m->getberita(3);
    $data['getinfo'] = $getinfo;
    $data['getberita'] = $getberita1;
    $data['brand'] ='assets/img/lembaga/'.$maininfo->logo_pt;
    $data['image'] ='assets/img/lembaga/'.$maininfo->logo_pt;
    $data['url'] = base_url('index.php/utama/laman/'.$detail->alias_laman);
    $data['infopt'] = $maininfo;
    $data['taglineuni'] = $maininfo->slogan;
    $data['halaman'] = $this->Homepage_m->all_laman();
    $data['link2'] = $this->Homepage_m->limit_link(6);
    $data['link'] = $this->Homepage_m->result_table_limit('link','6');
    $data['detail'] = $detail;
    $data['page'] = 'utama/laman-v';
    $this->load->view('utama/dashboard-v',$data);
  }
  public function allvideo($rowno=0){
  	
        $post = $this->input->post();
        $getuser = $this->ion_auth->user()->row();
        $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
        $allpt = $this->Admin_m->select_data('info_pt');
        $data['title'] = 'Daftar Video '.$infopt->nama_info_pt;
        $data['brand'] = $infopt->logo_pt;
        $data['infopt'] = $infopt;
        $data['users'] = $getuser;
        $getinfo = $this->Admin_m->getinfo();
        $getberita1 = $this->Admin_m->getberita(3);
        $data['getinfo'] = $getinfo;
        $data['getberita'] = $getberita1;
        $alllaman = $this->Admin_m->laman_primer();
        $data['alllaman'] = $alllaman;
        $data['halaman'] = $this->Homepage_m->all_laman();
        $data['infor'] = $this->Homepage_m->result_table_limit('info','5');
        $data['link'] = $this->Homepage_m->limit_link(16);
        $data['link2'] = $this->Homepage_m->limit_link(12);
        if ($getuser->id_info_pt =='1') {
          $data['allpt'] = $allpt;
        }else{
          $data['allpt'] = $this->Admin_m->select_data_order('info_pt','id_info_pt',$getuser->id_info_pt);
        }
        $data['aside'] = 'nav/nav';
        $data['detail'] = $getuser;

          $data['dtpt'] = $this->Admin_m->select_data('info_pt');
        $data['page'] = 'utama/halaman-video-v';
        $search_text = "";
        if($post == TRUE ){
         $search_text = $post;
         $this->session->set_userdata($post);
       }else{
         $post = array();
         if($this->session->userdata('string') != NULL){
          $post['string'] = $this->session->userdata('string');
        }
        if($this->session->userdata('id_info_pt') != NULL){
          $post['id_info_pt'] = $this->session->userdata('id_info_pt');
        }
        $search_text = $post;
      }
                   // Row per page
      $rowperpage = 20;
                   // Row position
      if($rowno != 0){
       $rowno = ($rowno-1) * $rowperpage;
     }
       $allcount = $this->Video_m->getrecordCount($search_text);
                   // Get records
       $users_record = $this->Video_m->getData($rowno,$rowperpage,$search_text);

                // Pagination Configuration
    $config['base_url'] = base_url().'index.php/utama/allvideo/';
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
    $this->load->view('utama/dashboard-v',$data);
  }
  public function video($alias){
  	
    $post = $this->input->get();
    $maininfo = $this->Homepage_m->info_pt(1);
    $detail = $this->Admin_m->detail_data('video','alias_video',$alias);
    $data['title'] = $maininfo->nama_info_pt;
    $data['metadeskripsi'] = $detail->alias_video;
    $data['metakeywords'] = $detail->alias_video;
    $data['metakategori'] = $maininfo->nama_info_pt;
    $data['brand'] ='assets/img/lembaga/'.$maininfo->logo_pt;
    $data['image'] ='assets/img/lembaga/'.$maininfo->logo_pt;
    $data['url'] = base_url('index.php/utama/video/'.$detail->alias_video);
    $data['infopt'] = $maininfo;
    $getinfo = $this->Admin_m->getinfo();
    $getberita1 = $this->Admin_m->getberita(3);
    $data['getinfo'] = $getinfo;
    $data['getberita'] = $getberita1;
    $data['taglineuni'] = $maininfo->slogan;
    $alllaman = $this->Admin_m->laman_primer();
    $data['alllaman'] = $alllaman;
    $data['halaman'] = $this->Homepage_m->all_laman();
    $data['link2'] = $this->Homepage_m->limit_link(6);
    $data['videor'] = $this->Homepage_m->result_table_limit('video','6');
    $data['detail'] = $detail;
    $data['infor'] = $this->Homepage_m->result_table_limit('info','6');
    $data['page'] = 'utama/video-v';
    $this->load->view('utama/dashboard-v',$data);
    }
  public function informasi($alias){
  	
    $post = $this->input->get();
    $maininfo = $this->Homepage_m->info_pt(1);
    $detail = $this->Admin_m->detail_data('informasi','alias_informasi',$alias);
    $data['title'] = $detail->nm_informasi;
    $data['metadeskripsi'] = $detail->desc_informasi;
    $data['metakeywords'] = $detail->desc_informasi;
    $data['metakategori'] = $maininfo->nama_info_pt;
    $getinfo = $this->Admin_m->getinfo();
    $getberita1 = $this->Admin_m->getberita(3);
    $data['getinfo'] = $getinfo;
    $data['getberita'] = $getberita1;
    $data['brand'] ='assets/img/lembaga/'.$maininfo->logo_pt;
    $data['image'] ='assets/informasi/'.$detail->img_informasi;
    $data['url'] = base_url('index.php/utama/informasi/'.$detail->alias_informasi);
    $data['infopt'] = $maininfo;
    $data['taglineuni'] = $maininfo->slogan;
    $alllaman = $this->Admin_m->laman_primer();
    $data['alllaman'] = $alllaman;
    $data['halaman'] = $this->Homepage_m->all_laman();
    $data['link2'] = $this->Homepage_m->limit_link(6);
    $data['link'] = $this->Homepage_m->result_table_limit('link','6');
    $data['detail'] = $detail;
    $data['terkait'] = $this->Homepage_m->result_order_limit('informasi','id_kategori','6',$detail->id_kategori);
    $data['page'] = 'utama/halaman_informasi-v';
    $this->load->view('utama/dashboard-v',$data);
    }
  public function detail($id){
  	
    $infopt = $this->Admin_m->info_pt('1');
    $allkategori = $this->Admin_m->select_data('kategori');
    $allsts = $this->Admin_m->select_data('status');
    $detail = $this->Dokumen_m->detaildok($id);
    $getinfo = $this->Admin_m->getinfo();
    $getberita1 = $this->Admin_m->getberita(3);
    $data['getinfo'] = $getinfo;
    $data['getberita'] = $getberita1;
    $data['getinfo'] = $getinfo;
    if ($detail == TRUE) {
      $data['title'] = $infopt->nama_info_pt;
      $data['infopt'] = $infopt;
      $data['page'] = 'utama/detail-dokumen-v';
      $alllaman = $this->Admin_m->laman_primer();
      $data['alllaman'] = $alllaman;
      $data['allkategori'] = $allkategori;
      $data['allsts'] = $allsts;
      $data['detail'] = $detail;
      $this->load->view('utama/dashboard-v',$data);
    }else{
     $pesan = 'Dokumen yang anda cari tidak lagi tersedia atau tidak ditemukan';
      $this->session->set_flashdata('message', $pesan );
      redirect(base_url());
    }
    // echo "<pre>";print_r($katgorbanyak);echo "</pre>";exit();
  }
  public function allnews($rowno=0){
  	
        $post = $this->input->post();
        $maininfo = $this->Homepage_m->info_pt(1);
        $getuser = $this->ion_auth->user()->row();
        $infopt = $this->Admin_m->info_pt('1');
        $allpt = $this->Admin_m->select_data('info_pt');
        $data['title'] = 'Daftar informasi '.$infopt->nama_info_pt;
        $data['brand'] = $infopt->logo_pt;
        $data['infopt'] = $infopt;
        $data['users'] = $getuser;
        $getinfo = $this->Admin_m->getinfo();
        $getberita1 = $this->Admin_m->getberita(3);
        $data['getinfo'] = $getinfo;
        $data['getberita'] = $getberita1;
        $alllaman = $this->Admin_m->laman_primer();
        $data['alllaman'] = $alllaman;
        $data['halaman'] = $this->Homepage_m->all_laman();
        $data['link'] = $this->Homepage_m->limit_link(16);
        $data['link2'] = $this->Homepage_m->limit_link(12);
        $data['allpt'] = $allpt;
        $data['aside'] = 'nav/nav';
        $data['detail'] = $getuser;
        $data['dtpt'] = $this->Admin_m->select_data('info_pt');
        $data['page'] = 'utama/semua-berita-v';
        $search_text = "";
        if($post == TRUE ){
         $search_text = $post;
         $this->session->set_userdata($post);
       }else{
         $post = array();
         if($this->session->userdata('string') != NULL){
          $post['string'] = $this->session->userdata('string');
        }
        if($this->session->userdata('id_info_pt') != NULL){
          $post['id_info_pt'] = $this->session->userdata('id_info_pt');
        }
        $search_text = $post;
      }
                   // Row per page
      $rowperpage = 20;
                   // Row position
      if($rowno != 0){
       $rowno = ($rowno-1) * $rowperpage;
     }
       $allcount = $this->Informasi_m->getrecordCount($search_text);
                   // Get records
       $users_record = $this->Informasi_m->getData($rowno,$rowperpage,$search_text);

                // Pagination Configuration
    $config['base_url'] = base_url().'index.php/utama/allnews/';
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
    $this->load->view('utama/dashboard-v',$data);
  }
  public function allgaleri($rowno=0){
  	
    $this->load->model('admin/Galeri_m');
        $post = $this->input->post();
        $getuser = $this->ion_auth->user()->row();
        $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
        $allpt = $this->Admin_m->select_data('info_pt');
        $data['title'] = 'Daftar Galeri '.$infopt->nama_info_pt;
        $data['brand'] = $infopt->logo_pt;
        $data['infopt'] = $infopt;
        $data['users'] = $getuser;
        $alllaman = $this->Admin_m->laman_primer();
        $data['alllaman'] = $alllaman;
        $getinfo = $this->Admin_m->getinfo();
        $getberita1 = $this->Admin_m->getberita(3);
        $data['getinfo'] = $getinfo;
        $data['getberita'] = $getberita1;
        $data['halaman'] = $this->Homepage_m->all_laman();
        $data['link'] = $this->Homepage_m->limit_link(16);
        $data['link2'] = $this->Homepage_m->limit_link(12);
        if ($getuser->id_info_pt =='1') {
          $data['allpt'] = $allpt;
        }else{
          $data['allpt'] = $this->Admin_m->select_data_order('info_pt','id_info_pt',$getuser->id_info_pt);
        }
        $data['aside'] = 'nav/nav';
        $data['detail'] = $getuser;
        $data['infor'] = $this->Homepage_m->result_table_limit('info','6');
        $data['dtpt'] = $this->Admin_m->select_data('info_pt');
        $data['page'] = 'utama/semua-galeri-v';
        $search_text = "";
        if($post == TRUE ){
         $search_text = $post;
         $this->session->set_userdata($post);
       }else{
         $post = array();
         if($this->session->userdata('string') != NULL){
          $post['string'] = $this->session->userdata('string');
        }
        if($this->session->userdata('id_info_pt') != NULL){
          $post['id_info_pt'] = $this->session->userdata('id_info_pt');
        }
        $search_text = $post;
      }
                   // Row per page
      $rowperpage = 20;
                   // Row position
      if($rowno != 0){
       $rowno = ($rowno-1) * $rowperpage;
     }
       $allcount = $this->Galeri_m->getrecordCountg($search_text);
                   // Get records
       $users_record = $this->Galeri_m->getDatag($rowno,$rowperpage,$search_text);

                // Pagination Configuration
    $config['base_url'] = base_url().'index.php/utama/allgaleri/';
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
    $this->load->view('utama/dashboard-v',$data);
  }
  public function listalbum($alias,$rowno=0){
    $this->load->model('admin/Galeri_m');
        $post = $this->input->post();
        $getuser = $this->ion_auth->user()->row();
        $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
        $allpt = $this->Admin_m->select_data('info_pt');
        $cek = $this->Admin_m->detail_data('kategori_gambar','alias_kategori',$alias);
        // echo "<pre>";print_r($cek);echo "</pre>";exit();
        if ($cek == TRUE) {
        	$data['title'] = 'Daftar Galeri '.$infopt->nama_info_pt;

		        $data['brand'] = $infopt->logo_pt;
		        // echo "<pre>";print_r($data['detail']->judul_kategori);echo "</pre>";exit();
		        $data['infopt'] = $infopt;
		        $data['users'] = $getuser;
		        $alllaman = $this->Admin_m->laman_primer();
		        $data['alllaman'] = $alllaman;
		        $data['halaman'] = $this->Homepage_m->all_laman();
		        $data['link'] = $this->Homepage_m->limit_link(16);
		        $data['link2'] = $this->Homepage_m->limit_link(12);
            $getinfo = $this->Admin_m->getinfo();
            $getberita1 = $this->Admin_m->getberita(3);
            $data['getinfo'] = $getinfo;
            $data['getberita'] = $getberita1;
		        if ($getuser->id_info_pt =='1') {
		          $data['allpt'] = $allpt;
		        }else{
		          $data['allpt'] = $this->Admin_m->select_data_order('info_pt','id_info_pt',$getuser->id_info_pt);
		        }
		        $data['aside'] = 'nav/nav';
		        $data['detail'] = $getuser;
		        $data['infor'] = $this->Homepage_m->result_table_limit('info','6');
		        $data['dtpt'] = $this->Admin_m->select_data('info_pt');
		        $data['page'] = 'utama/isi-galeri-v';
		        $search_text = "";
		        if($post == TRUE ){
		         $search_text = $post;
		         $this->session->set_userdata($post);
		       }else{
		         $post = array();
		         if($this->session->userdata('string') != NULL){
		          $post['string'] = $this->session->userdata('string');
		        }
		        if($this->session->userdata('id_info_pt') != NULL){
		          $post['id_info_pt'] = $this->session->userdata('id_info_pt');
		        }
		        $search_text = $post;
		      }
		                   // Row per page
		      $rowperpage = 20;
		                   // Row position
		      if($rowno != 0){
		       $rowno = ($rowno-1) * $rowperpage;
		     }
		       $allcount = $this->Galeri_m->getrecordCount($cek->id_kategori,$search_text);
		                   // Get records
		       $users_record = $this->Galeri_m->getData($cek->id_kategori,$rowno,$rowperpage,$search_text);

		                // Pagination Configuration
		    $config['base_url'] = base_url().'index.php/utama/listalbum/'.$cek->alias_kategori.'/';
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
		    $data['detail'] = $cek;
		    $data['jmldata'] = $allcount;
		    $data['search'] = $search_text;
		    $data['post'] = $search_text;
		    $data['pagination'] = $this->pagination->create_links();
		     // echo "<pre>";print_r($data['hasil']);echo "</pre>";exit();
		    $this->load->view('utama/dashboard-v',$data);
        }else{
        	$pesan = 'Album tidak ditemukan';
        	// echo $pesan;exit();
        	$this->session->set_flashdata('message', $pesan );
        	redirect(base_url('index.php/utama/allgaleri/'));
        }

  }
  public function allinfo($rowno=0){
     $this->load->model('admin/Info_m');
        $post = $this->input->post();
        $getuser = $this->ion_auth->user()->row();
        $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
        $allpt = $this->Admin_m->select_data('info_pt');
        $data['title'] = 'Daftar Info '.$infopt->nama_info_pt;
        $data['brand'] = $infopt->logo_pt;
        $data['infopt'] = $infopt;
        $getinfo = $this->Admin_m->getinfo();
        $getberita1 = $this->Admin_m->getberita(3);
        $data['getinfo'] = $getinfo;
        $data['getberita'] = $getberita1;
        $data['users'] = $getuser;
        $alllaman = $this->Admin_m->laman_primer();
        $data['alllaman'] = $alllaman;
        $data['halaman'] = $this->Homepage_m->all_laman();
        $data['link'] = $this->Homepage_m->limit_link(16);
         $data['link2'] = $this->Homepage_m->limit_link(12);
        if ($getuser->id_info_pt =='1') {
          $data['allpt'] = $allpt;
        }else{
          $data['allpt'] = $this->Admin_m->select_data_order('info_pt','id_info_pt',$getuser->id_info_pt);
        }
        $data['aside'] = 'nav/nav';
        $data['detail'] = $getuser;

          $data['dtpt'] = $this->Admin_m->select_data('info_pt');
        $data['page'] = 'utama/halaman-info-v';
        $search_text = "";
        if($post == TRUE ){
         $search_text = $post;
         $this->session->set_userdata($post);
       }else{
         $post = array();
         if($this->session->userdata('string') != NULL){
          $post['string'] = $this->session->userdata('string');
        }
        if($this->session->userdata('id_info_pt') != NULL){
          $post['id_info_pt'] = $this->session->userdata('id_info_pt');
        }
        $search_text = $post;
      }
                   // Row per page
      $rowperpage = 20;
                   // Row position
      if($rowno != 0){
       $rowno = ($rowno-1) * $rowperpage;
     }
       $allcount = $this->Info_m->getrecordCount($search_text);
                   // Get records
       $users_record = $this->Info_m->getData($rowno,$rowperpage,$search_text);

                // Pagination Configuration
    $config['base_url'] = base_url().'index.php/utama/allinfo/';
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
    $this->load->view('utama/dashboard-v',$data);
  }
  public function info($alias){
  	
    $this->load->model('admin/Info_m');
        $post = $this->input->get();
        $maininfo = $this->Homepage_m->info_pt(1);
        $detail = $this->Admin_m->detail_data('info','alias_info',$alias);
        $data['title'] = $detail->nm_info;
        $data['metadeskripsi'] = $detail->nm_info;
        $data['metakeywords'] = $detail->nm_info;
        $getinfo = $this->Admin_m->getinfo();
        $getberita1 = $this->Admin_m->getberita(3);
        $data['getinfo'] = $getinfo;
        $data['getberita'] = $getberita1;
        $data['metakategori'] = $maininfo->nama_info_pt;
        $data['brand'] ='assets/img/lembaga/'.$maininfo->logo_pt;
        $data['image'] ='assets/dokumen/'.$maininfo->logo_pt;
        $data['url'] = base_url('index.php/utama/info/'.$detail->alias_info);
        $data['infopt'] = $maininfo;
        $data['taglineuni'] = $maininfo->slogan;
        $alllaman = $this->Admin_m->laman_primer();
        $data['alllaman'] = $alllaman;
        $data['halaman'] = $this->Homepage_m->all_laman();
        $data['link2'] = $this->Homepage_m->limit_link(6);
        $data['detail'] = $detail;
        $data['infor'] = $this->Homepage_m->result_table_limit('info','6');
        $data['page'] = '/utama/info-v';
        $this->load->view('utama/dashboard-v',$data);
    }
  public function Dokumen($rowno=0){
  	
      $this->load->model('admin/Dokumen_m');
      $post = $this->input->post();
      $getuser = $this->ion_auth->user()->row();
      $infopt = $this->Admin_m->info_pt('1');
      $allkategori = $this->Admin_m->select_data('kategori');
      $getinfo = $this->Admin_m->getinfo();
      $data['getinfo'] = $getinfo;
      $data['title'] = 'Daftar Dokumen '.$infopt->nama_info_pt;
      $data['brand'] = $infopt->logo_pt;
      $data['infopt'] = $infopt;
      $data['users'] = $getuser;
      $alllaman = $this->Admin_m->laman_primer();
      $data['alllaman'] = $alllaman;
      $data['halaman'] = $this->Homepage_m->all_laman();
      $getinfo = $this->Admin_m->getinfo();
      $getberita1 = $this->Admin_m->getberita(3);
      $data['getinfo'] = $getinfo;
      $data['getberita'] = $getberita1;
      $data['allkategori'] = $allkategori;
      $data['detail'] = $getuser;
      $data['link2'] = $this->Homepage_m->limit_link(6);
      $data['dtpt'] = $this->Admin_m->select_data('info_pt');
      $data['infor'] = $this->Homepage_m->result_table_limit('info','6');
      $data['page'] = 'utama/semua-dokumen-v';
         $search_text = "";
         if($post == TRUE ){
             $search_text = $post;
             $this->session->set_userdata($post);
         }else{
             $post = array();
             if($this->session->userdata('nm_dokumen') != NULL){
              $post['nm_dokumen'] = $this->session->userdata('nm_dokumen');
             }
             if($this->session->userdata('nomor') != NULL){
              $post['nomor'] = $this->session->userdata('nomor');
             }
             if($this->session->userdata('tahun') != NULL){
              $post['tahun'] = $this->session->userdata('tahun');
             }
             if($this->session->userdata('id_kategori') != NULL){
              $post['id_kategori'] = $this->session->userdata('id_kategori');
             }
             $search_text = $post;
         }
         // Row per page
         $rowperpage = 20;
         // Row position
         if($rowno != 0){
           $rowno = ($rowno-1) * $rowperpage;
       }
        $allcount = $this->Dokumen_m->getrecordCount($search_text);
        // Get records
        $users_record = $this->Dokumen_m->getData($rowno,$rowperpage,$search_text);
      // Pagination Configuration
       $config['base_url'] = base_url().'index.php/utama/dokumen/';
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
       // echo "<pre>";print_r($users_record);echo "</pre>";exit();
      $this->load->view('utama/dashboard-v',$data);

  }
  public function akreditasi($rowno=0){
  	
      $this->load->model('admin/Akreditasi_m');
      $post = $this->input->post();
      $getuser = $this->ion_auth->user()->row();
      $infopt = $this->Admin_m->info_pt('1');
      $allkategori = $this->Admin_m->select_data('kategori_akreditasi');
      $getinfo = $this->Admin_m->getinfo();
      $data['getinfo'] = $getinfo;
      $data['title'] = 'Daftar Akreditasi '.$infopt->nama_info_pt;
      $data['brand'] = $infopt->logo_pt;
      $data['infopt'] = $infopt;
      $data['users'] = $getuser;
      $getinfo = $this->Admin_m->getinfo();
      $getberita1 = $this->Admin_m->getberita(3);
      $data['getinfo'] = $getinfo;
      $data['getberita'] = $getberita1;
      $alllaman = $this->Admin_m->laman_primer();
      $data['alllaman'] = $alllaman;
      $data['halaman'] = $this->Homepage_m->all_laman();
      $data['allkategori'] = $allkategori;
      $data['detail'] = $getuser;
      $data['link2'] = $this->Homepage_m->limit_link(6);
      $data['dtpt'] = $this->Admin_m->select_data('info_pt');
      $data['infor'] = $this->Homepage_m->result_table_limit('info','6');
      $data['page'] = 'utama/semua-akreditasi-v';
         $search_text = "";
         if($post == TRUE ){
             $search_text = $post;
             $this->session->set_userdata($post);
         }else{
             $post = array();
             if($this->session->userdata('nm_dokumen') != NULL){
              $post['nm_dokumen'] = $this->session->userdata('nm_dokumen');
             }
             if($this->session->userdata('nomor') != NULL){
              $post['nomor'] = $this->session->userdata('nomor');
             }
             if($this->session->userdata('tahun') != NULL){
              $post['tahun'] = $this->session->userdata('tahun');
             }
             $search_text = $post;
         }
         // Row per page
         $rowperpage = 20;
         // Row position
         if($rowno != 0){
           $rowno = ($rowno-1) * $rowperpage;
       }
        $allcount = $this->Akreditasi_m->getrecordCount2($search_text);
        // Get records
        $users_record = $this->Akreditasi_m->getData2($rowno,$rowperpage,$search_text);
      // Pagination Configuration
       $config['base_url'] = base_url().'index.php/utama/akreditasi/';
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
       // echo "<pre>";print_r($users_record);echo "</pre>";exit();
      $this->load->view('utama/dashboard-v',$data);

  }
  public function datadiri(){
    if ($this->ion_auth->logged_in()) {
      $level = array('admin','peserta');
      if (!$this->ion_auth->in_group($level)) {
        $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url());
      }else{
        $getuser = $this->ion_auth->user()->row();
        $infopt = $this->Admin_m->info_pt('1');
        $detail = $getuser;
        $getinfo = $this->Admin_m->getinfo();
        $data['getinfo'] = $getinfo;
        $data['title'] = 'Data diri peserta - '.$detail->username;
        $data['infopt'] = $infopt;
        $getinfo = $this->Admin_m->getinfo();
        $getberita1 = $this->Admin_m->getberita(3);
        $data['getinfo'] = $getinfo;
        $data['getberita'] = $getberita1;
        $data['users'] = $getuser;
        $alllaman = $this->Admin_m->laman_primer();
        $data['alllaman'] = $alllaman;
        $data['page'] = 'utama/data-diri-v';
        $this->load->view('utama/dashboard-v',$data);
      }
    }else{
      $pesan = 'Login terlebih dahulu';
      $this->session->set_flashdata('message', $pesan );
      redirect(base_url('index.php/login'));
    }
  }
  public function webinar01(){
    redirect('https://chat.whatsapp.com/EUP3Ks9mUkA9EowrhbqJTj');
  }
}
?>
