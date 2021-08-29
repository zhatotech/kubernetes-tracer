<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('Nusoap_lib');
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Siakad_m');
        $this->load->model('admin/Users_m');
        $this->load->library('resize');
    }
    public function index($rowno=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/dashboard'));
            }else{
                $post = $this->input->post();
                $getuser = $this->ion_auth->user()->row();
                $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
                $data['title'] = 'Daftar Karyawan Perusahaan '.$infopt->nama_info_pt;
                $data['brand'] = $infopt->logo_pt;
                $data['infopt'] = $infopt;
                $data['users'] = $getuser;
                $data['aside'] = 'nav/nav';
                $data['detail'] = $getuser;
                if ($this->ion_auth->in_group($level)) {
                    $data['dtpt'] = $this->Admin_m->select_data('info_pt');
                }
                $data['page'] = 'admin/users/main-v';
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
           if ($getuser->id_info_pt =='1') {
             $allcount = $this->Users_m->getrecordCount($search_text);
                   // Get records
             $users_record = $this->Users_m->getData($rowno,$rowperpage,$search_text);
         }else{
                    // All records count
            $allcount = $this->Users_m->getrecordCountid($getuser->id_info_pt,$search_text);
                    // Get records
            $users_record = $this->Users_m->getDataid($getuser->id_info_pt,$rowno,$rowperpage,$search_text);
        }
                // Pagination Configuration
        $config['base_url'] = base_url().'index.php/admin/users';
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
                 // echo "<pre>";print_r($search_text);echo "</pre>";exit();
        $this->load->view('admin/dashboard-v',$data);
    }
}else{
    $pesan = 'Login terlebih dahulu';
    $this->session->set_flashdata('message', $pesan );
    redirect(base_url('index.php/login'));
}
}
public function create(){
    if ($this->ion_auth->logged_in()) {
        $level = array('admin');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $post = $this->input->post();
            $getuser = $this->ion_auth->user()->row();
            $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
            $data['title'] = 'Tambah Karyawan Baru';
            $data['infopt'] = $infopt;
            $data['users'] = $getuser;
            $data['groups'] = $this->ion_auth->groups()->result();
            $data['dtpt'] = $this->Admin_m->select_data('info_pt');
            $data['page'] = 'admin/users/tambah-v';
            $this->load->view('admin/dashboard-v',$data);
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/login'));
    }
}
public function proses_create(){
    if ($this->ion_auth->logged_in()) {
        $level=array('admin');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
                // echo "<pre>";print_r($this->input->post());echo "</pre>";exit();
            $this->form_validation->set_rules('first_name', 'Nama Depan', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('last_name', 'Nama Belakang', 'alpha_numeric_spaces');
            $this->form_validation->set_rules('username', 'Username', 'alpha_numeric|min_length[5]|max_length[20]|required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|alpha|max_length[1]');
            $this->form_validation->set_rules('phone', 'Nomor HP', 'required|numeric|min_length[12]|max_length[15]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('id_info_pt', 'Cabang Perusahaan', 'required|numeric|max_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('repassword', 'Ulangi Password', 'required|alpha_numeric|min_length[5]|max_length[20]|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $pesan = validation_errors();
                $this->session->set_flashdata('message',$pesan); 
                redirect(base_url('index.php/admin/users/create/'));
            }else{
                $getuser = $this->ion_auth->user()->row();
                $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
                if ($getuser->id_info_pt == '1') {
                    $idpt = strip_tags($this->input->post('id_info_pt'));
                    $company = $this->Admin_m->detail_data('info_pt','id_info_pt',strip_tags($this->input->post('id_info_pt')))->nama_info_pt;
                }else{
                    $idpt = strip_tags($getuser->id_info_pt);
                    $company = $this->Admin_m->detail_data('info_pt','id_info_pt',$getuser->id_info_pt)->nama_info_pt;
                }
                    // $lastuser = $this->Users_m->lastuser();
                    // if ($lastuser == TRUE) {
                    //  $getlus = trim($lastuser->id+1);
                    // }else{
                    //  $getlus = trim('1');
                    // }
                    // $username = trim(date('Ymd').$getlus);
                $username = trim($this->input->post('username'));
                $email = trim($this->input->post('email'));
                $password = $this->input->post('password');
                $group = array($this->input->post('groups'));

                $additional_data = array(
                    'first_name' => strip_tags($this->input->post('first_name')),
                    'last_name' => strip_tags($this->input->post('last_name')),
                    'id_info_pt' => $idpt,
                    'company' => $company,
                    'phone' => strip_tags($this->input->post('phone')),
                    'repassword' => $this->input->post('password'),
                    'jk' => $this->input->post('jk'),
                );
                if (!empty($_FILES["logopt"]["tmp_name"])) {
                    $config['file_name'] = strtolower(url_title('karyawan'.'-'.$username.'-'.date('Ymd').'-'.time('Hms')));
                    $config['upload_path'] = './assets/img/users/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('logopt')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('eror', $error );
                        redirect(base_url('index.php/admin/users/create'));
                    }
                    else{
                        $img = $this->upload->data('file_name');
                        $additional_data['profile'] = $img;
                        $file = "assets/img/users/$img";
                            //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
                        $resizedFile = "assets/img/users/$img";
                        $this->resize->smart_resize_image(null , file_get_contents($file), 250 , 250 , false , $resizedFile , true , false ,100 );
                    }
                }
                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                $pesan = 'Karyawan '.$username.' Berhasil dibuat';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/users'));
            }
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/admin/login'));
    }
}
public function edit($id){
    if ($this->ion_auth->logged_in()) {
        $level = array('admin','members','peserta');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $getuser = $this->ion_auth->user()->row();
            $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
            $detail = $this->ion_auth->user($id)->row();
            $data['title'] = 'Edit Karyawan - '.$detail->username;
            $data['infopt'] = $infopt;
            $data['users'] = $getuser;
            $data['groups'] = $this->ion_auth->groups()->result();
            $data['dtpt'] = $this->Admin_m->select_data('info_pt');
            $data['usergroups'] = array();
            if($usergroups = $this->ion_auth->get_users_groups($id)->result()){
                foreach($usergroups as $group)
                {
                    $data['usergroups'][] = $group->id;
                }
            }
            $data['detail'] = $detail;
            $data['page'] = 'admin/users/edit-v';
            $this->load->view('admin/dashboard-v',$data);
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/login'));
    }
}
public function detail($id){
    if ($this->ion_auth->logged_in()) {
        $level = array('admin','members');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $getuser = $this->ion_auth->user()->row();
            $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
            $detail = $this->ion_auth->user($id)->row();
            $data['title'] = 'Detail Karyawan - '.$detail->username;
            $data['infopt'] = $infopt;
            $data['users'] = $getuser;
            $data['groups'] = $this->ion_auth->groups()->result();
            $data['usergroups'] = array();
            if($usergroups = $this->ion_auth->get_users_groups($detail->id)->result()){
                foreach($usergroups as $group)
                {
                    $data['usergroups'][] = $group->id;
                }
            }
            $data['detail'] = $detail;
            $data['page'] = 'admin/users/detail-v';
            $this->load->view('admin/dashboard-v',$data);
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/login'));
    }
}
public function proses_edit($id){
    if ($this->ion_auth->logged_in()) {
        $level=array('admin','members','peserta');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
                // echo "<pre>";print_r($this->input->post());echo "</pre>";exit();
            if ($this->ion_auth->in_group('peserta')) {
                $this->form_validation->set_rules('first_name', 'Nama Depan', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|alpha|max_length[1]');
                $this->form_validation->set_rules('phone', 'Nomor HP', 'required|numeric|min_length[12]|max_length[15]');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('pend_akhir', 'Pendidikan Terakhir', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|alpha_dash');
                $this->form_validation->set_rules('bb', 'Berat Badan', 'required|numeric|max_length[3]');
                $this->form_validation->set_rules('tb', 'Tinggi Badan', 'required|numeric|max_length[3]');
                $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|alpha|max_length[3]');
                $this->form_validation->set_rules('ukuran_baju', 'Ukuran Baju', 'required|alpha_numeric|max_length[5]');
                $this->form_validation->set_rules('alamat_peserta', 'Alamat Peserta', 'required');
                $this->form_validation->set_rules('rumus_sidik_jari', 'Rumus Sidik Jari', 'required');
                $this->form_validation->set_rules('company', 'Asal Perusahaan', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');
                $this->form_validation->set_rules('bujp', 'BUJP / Vendor', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('telp_kantor', 'No Telepon Kantor', 'required|numeric|max_length[13]');
                $this->form_validation->set_rules('hp_kantor', 'No HP Kantor', 'required|numeric|min_length[12]|max_length[15]');
                $this->form_validation->set_rules('nm_emergency', 'Nama Emergerncy', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('hp_emergency', 'HP Emergerncy', 'required|numeric|min_length[12]|max_length[15]');
                $this->form_validation->set_rules('hub_peserta_emergency', 'Hubungan Peserta dengan Emergerncy', 'required|alpha_numeric_spaces');
            }else{
                $this->form_validation->set_rules('first_name', 'Nama Depan', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('last_name', 'Nama Belakang', 'alpha_numeric_spaces');
                $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|alpha|max_length[1]');
                $this->form_validation->set_rules('phone', 'Nomor HP', 'required|numeric|min_length[12]|max_length[15]');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('id_info_pt', 'Cabang Perusahaan', 'required|numeric|max_length[3]');
            }
            
            if ($this->form_validation->run() == FALSE){
                $pesan = validation_errors();
                $this->session->set_flashdata('message',$pesan); 
                redirect(base_url('index.php/admin/users/edit/'.$id));
            }else{
                $getuser = $this->ion_auth->user(strip_tags(trim($id)))->row();
                if ($getuser == TRUE) {
                    $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
                    
                    if ($this->ion_auth->in_group('peserta')) {
                        $additional_data = array(
                            'first_name' => strip_tags(trim($this->input->post('first_name'))),
                            'email' => strip_tags(trim($this->input->post('email'))),
                            'company' => strip_tags(trim($this->input->post('company'))),
                            'phone' => strip_tags(trim($this->input->post('phone'))),
                            'jk' => strip_tags(trim($this->input->post('jk'))),
                            'pend_akhir' => strip_tags(trim($this->input->post('pend_akhir'))),
                            'tmpt_lahir' => strip_tags(trim($this->input->post('tmpt_lahir'))),
                            'tgl_lahir' => strip_tags(trim($this->input->post('tgl_lahir'))),
                            'usia' => strip_tags(trim($this->input->post('usia'))),
                            'bb' => strip_tags(trim($this->input->post('bb'))),
                            'tb' => strip_tags(trim($this->input->post('tb'))),
                            'gol_darah' => strip_tags(trim($this->input->post('gol_darah'))),
                            'alamat_peserta' => strip_tags(trim($this->input->post('alamat_peserta'))),
                            'rumus_sidik_jari' => strip_tags(trim($this->input->post('rumus_sidik_jari'))),
                            'alamat_perusahaan' => strip_tags(trim($this->input->post('alamat_perusahaan'))),
                            'bujp' => strip_tags(trim($this->input->post('bujp'))),
                            'jabatan' => strip_tags(trim($this->input->post('jabatan'))),
                            'telp_kantor' => strip_tags(trim($this->input->post('telp_kantor'))),
                            'hp_kantor' => strip_tags(trim($this->input->post('hp_kantor'))),
                            'ukuran_baju' => strip_tags(trim($this->input->post('ukuran_baju'))),
                            'nm_emergency' => strip_tags(trim($this->input->post('nm_emergency'))),
                            'hp_emergency' => strip_tags(trim($this->input->post('hp_emergency'))),
                            'hub_peserta_emergency' => strip_tags(trim($this->input->post('hub_peserta_emergency'))),
                        );
                    }else{
                        if ($getuser->id_info_pt == '1') {
                            $idpt = strip_tags($this->input->post('id_info_pt'));
                            $company = $this->Admin_m->detail_data('info_pt','id_info_pt',strip_tags($this->input->post('id_info_pt')))->nama_info_pt;
                        }else{
                            $idpt = strip_tags($getuser->id_info_pt);
                            $company = $this->Admin_m->detail_data('info_pt','id_info_pt',$getuser->id_info_pt)->nama_info_pt;
                        }
                        $additional_data = array(
                            'first_name' => strip_tags(trim($this->input->post('first_name'))),
                            'last_name' => strip_tags(trim($this->input->post('last_name'))),
                            'id_info_pt' => strip_tags(trim($idpt)),
                            'email' => strip_tags(trim($this->input->post('email'))),
                            'company' => strip_tags(trim($company)),
                            'phone' => strip_tags(trim($this->input->post('phone'))),
                            'jk' => strip_tags(trim($this->input->post('jk'))),
                        );
                    }
                        // echo "<pre>";print_r($additional_data);echo "</pre>";exit();
                    if (!empty($_FILES["profile"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title('karyawan'.'-'.$username.'-'.date('Ymd').'-'.time('Hms')));
                        $config['upload_path'] = './assets/img/users/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('profile')){
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('message', $error );
                            redirect(base_url('index.php/admin/users/create'));
                        }
                        else{
                            $file = $getuser->profile;
                            if ($file != "default.svg" || $file != "avatar.jpg" || $file != "default.png" ) {
                                unlink("assets/img/users/$file");
                            }
                            $img = $this->upload->data('file_name');
                            $additional_data['profile'] = $img;
                            $file = "assets/img/lembaga/$img";
                                //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
                            $resizedFile = "assets/img/lembaga/$img";
                            $this->resize->smart_resize_image(null , file_get_contents($file), 250 , 250 , false , $resizedFile , true , false ,100 );
                        }
                    }
                    if ($this->ion_auth->in_group('admin')) {
                        $groups = $this->input->post('groups');
                        $this->ion_auth->remove_from_group('', $getuser->id);
                        $this->ion_auth->add_to_group($groups, $getuser->id);
                    }
                    if ($this->input->post('password') == TRUE) {
                        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|max_length[20]|alpha_numeric|required');
                        $this->form_validation->set_rules('repassword', 'Ulangi Password', 'min_length[5]|max_length[20]|alpha_numeric|required|matches[password]');
                        $this->form_validation->set_rules('oldpassword', 'Password Lama', 'min_length[5]|max_length[20]|alpha_numeric|required');
                        if ($this->form_validation->run() == FALSE){
                            $pesan = $pesan = validation_errors();
                            $this->session->set_flashdata('message', $pesan );
                            redirect(base_url('index.php/admin/users/detail/'.$getuser->id));
                        }else{
                            if (password_verify($this->input->post('oldpassword'),$getuser->password)) {
                                $passdata = array(
                                    'password' => $this->input->post('password'),
                                    'repassword' =>$this->input->post('password'),
                                );
                                $this->ion_auth->update($getuser->id,$passdata);
                            } else {
                                $pesan = 'Password lama anda tidak sesuai';
                                $this->session->set_flashdata('message', $pesan );
                                redirect(base_url('index.php/admin/users/detail/'.$getuser->id));
                            }
                        }
                    }

                    $this->ion_auth->update($getuser->id,$additional_data);
                    $pesan = 'Karyawan '.$getuser->first_name.' Berhasil diubah';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/users/edit/'.$getuser->id));
                }else{
                    $pesan = 'Karyawan dengan ID '.strip_tags(trim($id)).' Tidak Ditemukan';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/users/'));
                }
            }
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/admin/login'));
    }
}
public function preview(){
    if ($this->ion_auth->logged_in()) {
        $level = array('admin','members','peserta');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $getuser = $this->ion_auth->user()->row();
            $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
            $detail = $getuser;
            $data['title'] = 'Cetak Formulir Pendaftaran - '.$detail->username;
            $data['infopt'] = $infopt;
            $data['users'] = $getuser;
            $data['groups'] = $this->ion_auth->groups()->result();
            $data['dtpt'] = $this->Admin_m->select_data('info_pt');
            $data['detail'] = $detail;
            $data['page'] = 'utama/preview-cetak-v';
            $this->load->view('admin/dashboard-v',$data);
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/login'));
    }
}
public function cetak_formulir(){
    if ($this->ion_auth->logged_in()) {
        $level = array('admin','members','peserta');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $getuser = $this->ion_auth->user()->row();
            $infopt = $this->Admin_m->info_pt($getuser->id_info_pt);
            $detail = $getuser;
            $data['title'] = 'Cetak Formulir Pendaftaran - '.$detail->username;
            $data['infopt'] = $infopt;
            $data['users'] = $getuser;
            $data['groups'] = $this->ion_auth->groups()->result();
            $data['dtpt'] = $this->Admin_m->select_data('info_pt');
            $data['detail'] = $detail;
            $this->load->view('utama/cetak-formulir-v',$data);
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/login'));
    }
}
public function nonaktifasiakun($id){
    if ($this->ion_auth->logged_in()) {
        $level=array('admin');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $getuser = $this->ion_auth->user(strip_tags(trim($id)))->row();
            if ($getuser == TRUE) {
                $sendata['active']='0';
                $this->ion_auth->update($getuser->id,$sendata);
                $pesan = 'Karyawan '.$getuser->fist_name.' berhasil di nonaktifkan';
                $this->session->set_flashdata('message',$pesan);
                redirect(base_url('index.php/admin/users/detail/'.$getuser->id));
            }else{
                $pesan = 'Karyawan dengan ID '.strip_tags(trim($id)).' tidak ditemukan';
                $this->session->set_flashdata('message',$pesan);
                redirect(base_url('index.php/admin/users/detail/'.$getuser->id));
            }
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/admin/login'));
    }
}
public function aktifasiakun($id){
    if ($this->ion_auth->logged_in()){
        $level=array('admin');
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard'));
        }else{
            $getuser = $this->ion_auth->user(strip_tags(trim($id)))->row();
            if ($getuser == TRUE) {
                $sendata['active']='1';
                $this->ion_auth->update($getuser->id,$sendata);
                $pesan = 'Karyawan '.$getuser->fist_name.' berhasil di aktifkan';
                $this->session->set_flashdata('message',$pesan);
                redirect(base_url('index.php/admin/users/detail/'.$getuser->id));
            }else{
                $pesan = 'Karyawan dengan ID '.strip_tags(trim($id)).' tidak ditemukan';
                $this->session->set_flashdata('message',$pesan);
                redirect(base_url('index.php/admin/users/detail/'.$getuser->id));
            }
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/admin/login'));
    }
}
public function delete($id){
    if(!$this->ion_auth->logged_in()){
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/admin/login'));
    }else{
        $this->ion_auth->delete_user($id);
        $this->session->set_flashdata('message', 'users berhasil di hapus');
        redirect(base_url('index.php/admin/users'));
    }
}
function mahasiswa($rowno=0){
    if ($this->ion_auth->logged_in()){
        $level = array('admin');  
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/dashboard/'));
        }else{
            $post = $this->input->post();
                // echo "<pre>";print_r($post);echo "</pre>";exit();
            $getuser = $this->ion_auth->user()->row();
            $infopt = $this->Admin_m->info_pt('1');
            $getprodi = $this->Admin_m->info_pt($getuser->id_info_pt);
            $data['title'] = 'Daftar Mahasiswa';
            $data['infopt'] = $infopt;
            $data['page'] = 'admin/users/mahasiswa-v';
            $data['nav'] = 'nav/nav-admin';
            if ($getuser->id_info_pt =='1') {
                $data['prodi'] = $this->Admin_m->select_data_order('info_pt','lvl','2');
            }else{
                $data['prodi'] = $this->Admin_m->select_data_order('info_pt','id_info_pt',$getprodi->id_info_pt);
            }
            $data['user'] = $getuser;
            $data['users'] = $getuser;
                    //setting web server
            $hostname = $infopt->hostname;
            $port = $infopt->port;
            $url = 'http://'.$hostname.':'.$port.'/ws/live.php?wsdl';
            $client = new nusoap_client($url, true);
            $proxy = $client->getProxy();
            $username =$infopt->userfeeder;
            $pass = $infopt->passfeeder;
            $token = $proxy->getToken($username, $pass); 
                // $tes = $proxy->getrecordset($token,'semester','','id_smt desc','','');
                // echo "<pre>";print_r($tes);echo "</pre>";exit();
                    // get jumlah data
            $table ='mahasiswa_pt';
                    // pencarian
            $search_text ="";
            if($post['string'] == TRUE || $post['id_sms'] == TRUE){
                $search_text = $post;
                $this->session->set_userdata($post);
            }else{
                $post = array();
                if($this->session->userdata('string') != NULL){
                    $post['string'] = $this->session->userdata('string');
                }
                if($this->session->userdata('id_sms') != NULL){
                    $post['id_sms'] = $this->session->userdata('id_sms');
                }
                $search_text = $post;
            }
            $order = "mulai_smt desc";
            if ($search_text == TRUE) {
                if ($getprodi->id_info_pt == '1') {
                    if ($search_text['string'] == TRUE && $search_text['id_sms'] == FALSE) {
                        if (is_numeric($search_text['string'])) {
                            $filter ="p.nipd = '{$search_text['string']}'";
                        }else{
                            $filter ="nm_pd ilike '%{$search_text['string']}%'";
                        }
                    }
                    if ($search_text['string'] == FALSE && $search_text['id_sms'] == TRUE) {
                        $filter ="p.id_sms = '{$search_text['id_sms']}'";
                    }
                    if ($search_text['string'] == TRUE && $search_text['id_sms'] == TRUE) {
                        if (is_numeric($search_text['string'])) {
                            $filter ="p.nipd = '{$search_text['string']}' and p.id_sms = '{$search_text['id_sms']}'";
                        }else{
                            $filter ="nm_pd ilike '%{$search_text['string']}%' and p.id_sms = '{$search_text['id_sms']}'";
                        }
                    }
                }else{
                    if ($search_text['string'] == TRUE && $getprodi->id_sms == FALSE) {
                        if (is_numeric($search_text['string'])) {
                            $filter ="p.nipd = '{$search_text['string']}'";
                        }else{
                            $filter ="nm_pd ilike '%{$search_text['string']}%'";
                        }
                    }
                    if ($search_text['string'] == FALSE && $getprodi->id_sms == TRUE) {
                        $filter ="p.id_sms = '{$getprodi->id_sms}'";
                    }
                    if ($search_text['string'] == TRUE && $getprodi->id_sms == TRUE) {
                        if (is_numeric($search_text['string'])) {
                            $filter ="p.nipd = '{$search_text['string']}' and p.id_sms = '{$getprodi->id_sms}'";
                        }else{
                            $filter ="nm_pd ilike '%{$search_text['string']}%' and p.id_sms = '{$getprodi->id_sms}'";
                        }
                    }
                }
            }else{
                if ($getprodi->id_info_pt == '1') {
                    $filter ="";
                }else{
                    $filter ="p.id_sms = '{$getprodi->id_sms}'";
                }
            }
                // echo "<pre>";print_r($filter);echo "</pre>";exit();
                // Row per page
            $rowperpage = 20;
                // Row position
            if($rowno != 0){
                $rowno = ($rowno-1) * $rowperpage;
            }
                // echo "<pre>";print_r($filter);echo "</pre>";exit();
            $allcount = $proxy->GetCountRecordset($token,$table,$filter);
                // Get records
            $users_record = $proxy->getrecordset($token,$table,$filter,$order,$rowperpage,$rowno);
            $thnajaran = $proxy->getrecordset($token,'semester','','id_smt desc','','');
                // Pagination Configuration
            $config['base_url'] = base_url().'index.php/admin/users/mahasiswa';
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount['result'];
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
            $data['jmldata'] = $allcount['result'];
            $data['search'] = $search_text;
            $data['post'] = $search_text;
            $data['thnajaran'] = $thnajaran;
            $data['pagination'] = $this->pagination->create_links();
                // echo "<pre>";print_r($post);echo "</pre>";exit();
                // echo "<pre>";print_r($users_record);echo "</pre>";exit();
            $this->load->view('admin/dashboard-v',$data);
        }
    }else{
        $pesan = 'Login terlebih dahulu';
        $this->session->set_flashdata('message', $pesan );
        redirect(base_url('index.php/login'));
    }
}
function update_mhs_angkatan(){
    if ($this->ion_auth->logged_in()){
        $level = 'admin';  
        if (!$this->ion_auth->in_group($level)) {
            $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin/dashboard_c'));
        }else{
                // $this->load->model('Isi_m');
            $getuser = $this->ion_auth->user()->row();
            $post = $this->input->post();
            $infopt = $this->Admin_m->info_pt(1);
            $data['infopt'] = $infopt;
            $data['user'] = $getuser;
                    //setting web server
            $angkatan = preg_replace("/[^0-9]/", "", $post['mulai_smt']);;
            $hostname = $infopt->hostname;
            $port = $infopt->port;
            $url = 'http://'.$hostname.':'.$port.'/ws/live.php?wsdl';
            $client = new nusoap_client($url, true);
            $proxy = $client->getProxy();
            $username =$infopt->userfeeder;
            $pass = $infopt->passfeeder;
            $token = $proxy->getToken($username, $pass);  
                    // get jumlah data
            $table ='mahasiswa_pt';
            $order = "";
            $filter ="mulai_smt = '{$angkatan}'";
                    // $filter2 = "id_pd = '7c4f6fb8-bf63-447f-ac00-7789ccdc269c'";
            $getmhs = $proxy->GetRecordSet($token,$table,$filter,'','','');
                    // $getmhs2 = $proxy->GetRecord($token,'mahasiswa',$filter2,'','','');
            $post=$this->input->post();
                    // echo "<pre>";print_r($getmhs2['result']['tmpt_lahir']);echo "<pre/>";exit();
            if ($getmhs['result'] == TRUE) {
                foreach ($getmhs['result'] as $data) {
                    $cekmhs = $this->Siakad_m->detail_data('mahasiswa_pt','nipd',trim($data['nipd']));
                    $dtsms = $this->Siakad_m->detail_data('sms','id_sms',$data['id_sms']);
                    $filmhspd = "id_pd = '{$data['id_pd']}'";
                    $getmhspd = $proxy->GetRecord($token,'mahasiswa',$filmhspd);
                            // echo "<pre>";print_r($getmhspd);echo "<pre/>";exit();
                    if ($cekmhs == TRUE) {
                        $datamhspt = array(
                            'kode_sms' =>$dtsms->kode_prodi,
                            'id_sp'      => trim($data['id_sp']),
                            'id_pd'      => trim($data['id_pd']),
                            'id_reg_pd'      => $data['id_reg_pd'],
                            'id_sms' => $data['id_sms'],
                            'nipd' => trim($data['nipd']),
                            'tgl_masuk_sp' => $data['tgl_masuk_sp'],
                            'mulai_smt' => $data['mulai_smt'],
                        );
                        $this->Siakad_m->update_data('mahasiswa_pt','id',$cekmhs->id,$datamhspt);
                        $datamhspd = array(
                            'nm_pd' => trim(strtoupper($data['nm_pd'])),
                            'id_pd' => trim($data['id_pd']),
                            'nim'=> trim($data['nipd']),
                            'jk'=> $data['jk'],
                            'nik' => $getmhspd['result']['nik'],
                            'tmpt_lahir' => $getmhspd['result']['tmpt_lahir'],
                            'tgl_lahir' => $getmhspd['result']['tgl_lahir'],
                        );
                        $this->Siakad_m->update_data('mahasiswa','id_pd',$cekmhs->id_pd,$datamhspd);
                        $ceksiakad = @$this->Siakad_m->detail_data('users','username',trim($data['nipd']));
                        if ($ceksiakad == FALSE) {
                            $cekpeserta = @$this->Admin_m->detail_data('peserta','nipd',trim($data['nipd']));
                            $cekuser = @$this->Admin_m->detail_data('users','username',trim($cekpeserta->noreg));
                            if ($cekuser == TRUE) {
                                $password = $cekuser->password;
                                $repassword = $cekuser->repassword;
                            }else{
                                $password = '$2y$10$vu7NXmlTeGIR6ythmIz23OaCn3y59BUyFk9C05a7iWR919TF2yBTS';
                                $repassword = '6ckd4';
                            }
                            $username = trim($data['nipd']);
                            $email = strtolower(url_title(trim($getmhspd['result']['nm_pd']).'@unidayan.ac.id'));
                            $additional_data = array(
                                'ip_address'=>'10.64.163.231',
                                'id_pd'=>$getmhspd['result']['id_pd'],
                                'id_reg_pd'=>$data['id_reg_pd'],
                                'password'=>trim($password),
                                'repassword'=>trim($repassword),
                                'username'=>$username,
                                'salt'=>NULL,
                                'email'=> strtolower(url_title(trim($getmhspd['result']['nm_pd']).'@unidayan.ac.id')),
                                'first_name' => trim(strtoupper($getmhspd['result']['nm_pd'])),
                                'id_mhs' => $this->Siakad_m->last_id_mhs_pt($username)->id,
                                'last_name' => $this->Siakad_m->info_pt(1)->nama_info_pt,
                                'company' => $this->Siakad_m->info_pt(1)->nama_info_pt,
                                'phone' => '123456789',
                                'created_on'=>'1564049773',
                                'last_login'=>'1564049773',
                                'active'=>'1',
                            );
                            $this->Siakad_m->insert_data('users',$additional_data);
                            $siakadusr = $this->Siakad_m->detail_data('users','username',trim($username));
                            $group = array(
                                'user_id'=>$siakadusr->id,
                                'group_id'=>'2',
                            );
                            $this->Siakad_m->insert_data('users_groups',$group);
                        }else{
                            $additional_data = array(
                                'id_pd'=>$getmhspd['result']['id_pd'],
                                'id_reg_pd'=>$data['id_reg_pd'],
                                'first_name' => trim(strtoupper($getmhspd['result']['nm_pd'])),
                            );
                            $this->Siakad_m->update_data('users','id',$ceksiakad->id,$additional_data);
                        }
                            }else{//end cek mhs
                                $datamhspd2 = array(
                                    'nm_pd'      => trim(strtoupper($getmhspd['result']['nm_pd'])),
                                    'id_mhs_pt'      => trim($data['nipd']),
                                    'id_pd'      => trim($data['id_pd']),
                                    'nim'      => trim($data['nipd']),
                                    'jk'      => $data['jk'],
                                    'nik' => $getmhspd['result']['nik'],
                                    'tmpt_lahir' => $getmhspd['result']['tmpt_lahir'],
                                    'tgl_lahir' => $getmhspd['result']['tgl_lahir'],
                                    'nm_ayah' => $getmhspd['result']['nm_ayah'],
                                    'tgl_lahir_ayah' => $getmhspd['result']['tgl_lahir_ayah'],
                                    'nik_ayah' => NULL,
                                    'id_jenjang_pendidikan_ayah' => $getmhspd['result']['id_jenjang_pendidikan_ayah'],
                                    'id_pekerjaan_ayah' => $getmhspd['result']['id_pekerjaan_ayah'],
                                    'id_penghasilan_ayah' => $getmhspd['result']['id_penghasilan_ayah'],
                                    'id_kebutuhan_khusus_ayah' => NULL,
                                    'nm_ibu_kandung' => $getmhspd['result']['nm_ibu_kandung'],
                                    'tgl_lahir_ibu' => $getmhspd['result']['tgl_lahir_ibu'],
                                    'nik_ibu' => NULL,
                                    'id_jenjang_pendidikan_ibu' => $getmhspd['result']['id_jenjang_pendidikan_ibu'],
                                    'id_pekerjaan_ibu' => $getmhspd['result']['id_pekerjaan_ibu'],
                                    'id_penghasilan_ibu' => $getmhspd['result']['id_penghasilan_ibu'],
                                    'id_kebutuhan_khusus_ibu' => NULL,
                                    'no_hp' => '123456789',
                                    'email' => $getmhspd['result']['email'],
                                    'a_terima_kps' => 0,
                                    'no_kps' => NULL,
                                    'npwp' => NULL,
                                    'id_wil' => '999999',
                                    'id_jns_tinggal' => NULL,
                                    'id_agama' => $getmhspd['result']['id_agama'],
                                    'id_alat_transport' => NULL,
                                    'kewarganegaraan' => 'ID',
                                );
                                $this->Siakad_m->insert_data('mahasiswa',$datamhspd2);
                                $datamhspt2 = array(
                                    'id_pd_siakad' => $this->Siakad_m->last_id_mhs2()->id,
                                    'id_pd' => $getmhspd['result']['id_pd'],
                                    'id_reg_pd'=>trim($data['id_reg_pd']),
                                    'kode_sms' =>$dtsms->kode_prodi,
                                    'id_sp'      => $data['id_sp'],
                                    'id_sms' => $data['id_sms'],
                                    'nipd' => trim($data['nipd']),
                                    'tgl_masuk_sp' => $data['tgl_masuk_sp'],
                                    'tgl_keluar' => $data['tgl_keluar'],
                                    'ket' => $data['ket'],
                                    'skhun' => $data['skhun'],
                                    'a_pernah_paud' => 0,
                                    'a_pernah_tk' => 0,
                                    'tgl_create' => date('Y-m-d'),
                                    'mulai_smt' => $data['mulai_smt'],
                                    'sks_diakui' => $data['sks_diakui'],
                                    'ipk' => $data['ipk'],
                                    'id_jns_daftar' => $data['id_jns_daftar'],
                                    'id_jns_keluar' => $data['id_jns_keluar'],
                                    'id_jalur_masuk' => 1,
                                    'id_pembiayaan' => 1,
                                );
                                $this->Siakad_m->insert_data('mahasiswa_pt',$datamhspt2);
                                // membuat akun Siakad
                                $cekpeserta = @$this->Admin_m->detail_data('peserta','nipd',trim($data['nipd']));
                                $cekuser = @$this->Admin_m->detail_data('users','username',trim($cekpeserta->noreg));
                                if ($cekuser == TRUE) {
                                    $password = $cekuser->password;
                                    $repassword = $cekuser->repassword;
                                }else{
                                    $password = '$2y$10$vu7NXmlTeGIR6ythmIz23OaCn3y59BUyFk9C05a7iWR919TF2yBTS';
                                    $repassword = '6ckd4';
                                }
                                $username = trim($data['nipd']);
                                $email = 'peserta@unidayan.ac.id';
                                $additional_data = array(
                                    'ip_address'=>'10.64.163.231',
                                    'password'=>trim($password),
                                    'repassword'=>trim($repassword),
                                    'username'=>$username,
                                    'salt'=>NULL,
                                    'email'=> strtolower(url_title(trim($getmhspd['result']['nm_pd']).'@unidayan.ac.id')),
                                    'first_name' => trim(strtoupper($getmhspd['result']['nm_pd'])),
                                    'id_mhs' => $this->Siakad_m->last_id_mhs_pt($username)->id,
                                    'last_name' => $this->Siakad_m->info_pt(1)->nama_info_pt,
                                    'company' => $this->Siakad_m->info_pt(1)->nama_info_pt,
                                    'phone' => '123456789',
                                    'created_on'=>'1564049773',
                                    'last_login'=>'1564049773',
                                    'active'=>'1',
                                );
                                $this->Siakad_m->insert_data('users',$additional_data);
                                $siakadusr = $this->Siakad_m->detail_data('users','username',trim($username));
                                $group = array(
                                    'user_id'=>$siakadusr->id,
                                    'group_id'=>'2',
                                );
                                $this->Siakad_m->insert_data('users_groups',$group);
                                // $this->ion_auth->register($username, $password,$email,$additional_data, $group);
                                // buat aktifitas mahasiswa
                                $aktvkul = array(
                                    'id_smt' => $data['mulai_smt'],
                                    'id_mhs_pt' =>$this->Siakad_m->last_id_mhs_pt($username)->id,
                                    'id_stat_mhs' => 'A',
                                    'ips' => 0,
                                    'sks_smt' => 0,
                                    'ipk' => 0,
                                    'sks_total' => 0
                                );
                                $this->Siakad_m->insert_data('kuliah_mahasiswa',$aktvkul);
                            }//elsenya
                        }//end perulangan getmhs
                    }//end getmhs['result']
                }
            }else{
                $pesan = 'Login terlebih dahulu';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/login'));
            }
        }
    }
