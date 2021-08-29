<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Mahasiswa_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','karyawan');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $datauser = $data['users'] = $this->ion_auth->user()->row();
                $info = $this->Admin_m->info_pt(1);
                $data['title'] = 'Daftar Mahasiswa - '.$info->nama_info_pt;
                $data['infopt'] = $info;
                $data['users'] = $datauser;
                $data['nav'] = 'nav/nav-admin';
                $data['page'] = 'admin/mahasiswa/main-v';
                $data['dttrans'] = $this->Admin_m->select_data('jenis_transaksi');
                $data['prodi'] = $this->Mahasiswa_m->prodi();
                // 
                if ($post == TRUE) {
                    $data['cari'] = $post;
                }else{
                    $data['cari'] = False;
                }
                $config['base_url'] = base_url('index.php/admin/mahasiswa/index');
                $data['offset'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                $config["uri_segment"] = $data['offset'];
                $config['total_rows'] = $this->Mahasiswa_m->count_data_mahasiswa(@$post); //total row
                $config['per_page'] = 20;  //show record per halaman
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
                
                $this->pagination->initialize($config);
                // $data['prodi'] = $this->Mahasiswa_m->get_prodi();
                $data['hasil'] = $this->Mahasiswa_m->select_all_data_mahasiswa($config["per_page"], $data['offset'],@$post);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('admin/dashboard-v', $data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function rtrx($nipd){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','karyawan');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Nota_m');
                $datauser = $data['users'] = $this->ion_auth->user()->row();
                $info = $this->Admin_m->info_pt(1);
                $data['title'] = 'Daftar Transaksi Mahasiswa - '.$nipd;
                $data['infopt'] = $info;
                $data['users'] = $datauser;
                $data['nav'] = 'nav/nav-admin';
                $data['page'] = 'admin/mahasiswa/rtrx-v';
                $data['dttrans'] = $this->Admin_m->select_data('jenis_transaksi');
                $data['hasil'] = $this->Admin_m->select_data_order('transaksi','nipd',$nipd);
                $this->load->view('admin/dashboard-v', $data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
}
?>