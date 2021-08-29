<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Admin_m');
        $this->load->library('Resize');
    }
    public function index()
    {
        // cek user sudah login atau belum asd
        if (!$this->ion_auth->logged_in()) {
            $msg = 'Login terlebih dahulu';
            $this->session->set_flashdata('msgeror',$msg);
            redirect(base_url('login'));
        }else{
            // cek hak akses user saat login
            $level = array('admin');
            $data ['menu'] = 'setting';
            if ($this->ion_auth->in_group($level)) {
                $getuser = $this->ion_auth->user()->row();
                $infopt = $this->Admin_m->info_pt('1');             
                $data['title'] = 'Setting '.$infopt->nama_info_pt;
                $data['getuser'] = $getuser;
                $data['infopt'] = $infopt;
                if ($this->ion_auth->in_group('admin')) {
                    $data['nav'] = 'navigasi/nav-admin-v';
                }elseif ($this->ion_auth->in_group('peserta')) {
                    $data['nav'] = 'navigasi/nav-peserta-v';
                }else{
                    $data['nav'] = 'navigasi/nav-operator-v';
                }               
                $this->load->view('templates/h-dashboard-v',$data);
                $this->load->view('setting/index-v');
                $this->load->view('templates/f-dashboard-v');
            }else{
                // pesan eror ketika hak akses tidak sesuai
                $msg = 'Anda tidak memiliki hak untuk mengakses halaman ini';
                $this->session->set_flashdata('msgeror',$msg);
                redirect(base_url('dashboard'));
            }
        }
    }
    public function update(){
        if ($this->ion_auth->logged_in()) {
            $level=array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('msgeror', $pesan );
                redirect(base_url('dashboard'));
            }else{
                $this->form_validation->set_rules('nama_info_pt','Nama Perusahaan', 'required|trim');
                $this->form_validation->set_rules('kode_pt','Kode Perusahaan', 'alpha_numeric_spaces|required|trim');
                $this->form_validation->set_rules('kontak_1','Kontak 1', 'required|trim');
                $this->form_validation->set_rules('kontak_2','Kontak 2', 'trim');
                $this->form_validation->set_rules('kontak_3','Kontak 3', 'trim');
                $this->form_validation->set_rules('kontak_4','Kontak 4', 'trim');
                $this->form_validation->set_rules('alamat_pt','Alamat Perusahaan', 'required|trim');
                $this->form_validation->set_rules('slogan','Slogan Perusahaan', 'trim');
                $this->form_validation->set_rules('angkatan','Angkatan yang digunakan', 'required|numeric|trim|min_length[4]|max_length[5]');
                $this->form_validation->set_rules('tahun','Tahun yang digunakan', 'required|numeric|trim|min_length[2]|max_length[5]');
                $this->form_validation->set_rules('gelombang','Gelombang yang digunakan', 'required|numeric|trim|min_length[1]|max_length[5]');
                $this->form_validation->set_rules('biaya','Biaya yang digunakan', 'required|numeric|trim|min_length[4]|max_length[10]');
                $this->form_validation->set_rules('batas_bayar','Batas Waktu Varfikasi Pembayaran', 'required|numeric|trim|min_length[1]|max_length[2]');
                if ($this->form_validation->run() == TRUE) {
                    $post = $this->input->post();
                    // echo "<pre>";print_r($post);echo "</pre>";exit();
                    $id = $this->input->post('id_member');
                    $data = array(
                        'nama_info_pt' => $post['nama_info_pt'],
                        'kode_pt' => $post['kode_pt'],
                        'kontak_1' => $post['kontak_1'],
                        'kontak_2' => $post['kontak_2'],
                        'kontak_3' => $post['kontak_3'],
                        'kontak_4' => $post['kontak_4'],
                        'alamat_pt' => $post['alamat_pt'],
                        'slogan' => $post['slogan'],
                        'angkatan' => $post['angkatan'],
                        'tahun' => $post['tahun'],
                        'gelombang' => $post['gelombang'],
                        'biaya' => $post['biaya'],
                        'batas_bayar' => $post['batas_bayar'],
                        );
                    if (!empty($_FILES["logopt"]["tmp_name"])) {
                        $config['file_name'] = strtolower(url_title($post['nama_info_pt'].'-'.date('Ymd').'-'.date('Hms')));
                        $config['upload_path'] = './assets/img/lembaga/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['max_width'] = '';
                        $config['max_height'] = '';

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('logopt')){
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('msgeror', $error );
                            redirect(base_url('setting'));
                        }
                        else{
                            $file = $this->Admin_m->cek_pt(1)->row('logo_pt');
                            if ($file != "logo.png") {
                                unlink("assets/img/lembaga/$file");
                            }
                            $img = $this->upload->data('file_name');
                            $data['logo_pt'] = $img;
                            $file = "assets/img/lembaga/$img";
                            //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
                            $resizedFile = "assets/img/lembaga/$img";
                            $this->resize->smart_resize_image(null , file_get_contents($file), 965 , 201 , false , $resizedFile , true , false ,100 );
                        }
                    }
                    if (!empty($_FILES["logopt2"]["tmp_name"])) {
                        $config2['file_name'] = strtolower(url_title('logo'.'-'.$post['nama_info_pt'].'-'.date('Ymd').'-'.date('Hms')));
                        $config2['upload_path'] = './assets/img/lembaga/';
                        $config2['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config2['max_size'] = 2048;
                        $config2['max_width'] = '';
                        $config2['max_height'] = '';

                        $this->load->library('upload', $config2);
                        if (!$this->upload->do_upload('logopt2')){
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('msgeror', $error );
                            redirect(base_url('setting'));
                        }
                        else{
                            $file2 = $this->Admin_m->cek_pt(1)->row('logo_kecil_pt');
                            if ($file2 != "logo.png") {
                                unlink("assets/img/lembaga/$file2");
                            }
                            $img2 = $this->upload->data('file_name');
                            $data['logo_kecil_pt'] = $img2;
                            $file2 = "assets/img/lembaga/$img2";
                            //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
                            $resizedFile = "assets/img/lembaga/$img2";
                            $this->resize->smart_resize_image(null , file_get_contents($file2), 250 , 250 , false , $resizedFile , true , false ,100 );
                        }
                    }
                    // echo "<pre>";print_r($data);echo "</pre>";exit();
                    $this->Admin_m->update('info_pt','id_info_pt','1',$data);
                    $pesan = 'Lembaga '.$post['nama_info_pt'].' Berhasil diubah';
                    $this->session->set_flashdata('msgsukses', $pesan );
                    redirect(base_url('setting'));
                }else{
                    $pesan = validation_errors();
                    // echo "<pre>";print_r($pesan);echo "</pre>";exit();
                    $this->session->set_flashdata('msgeror', $pesan);
                    redirect(base_url('setting'));
                }
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('msgeror', $pesan );
            redirect(base_url('login'));
        }
    }
}
?>