<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Master_m');
        $this->load->library('Nusoap_lib');
        $this->load->helper('form');
    }

    function index(){
        if($this->ion_auth->logged_in()){
        //sudah login, redirect ke halaman welcome
            redirect(base_url('index.php/dashboard'));
        }
        //user tidak login, tampilkan halaman login
        $info = $this->Admin_m->info_pt(1);
        $data['title'] = 'Pendaftaran Wisuda Online '.$info->nama_info_pt;
        $data['infopt'] = $info ;
        $data['brand'] = 'assets/img/lembaga/'.$info->logo_pt;
        $this->load->view('admin/login-v', $data);
    }
    function proses_login(){
        $infopt = $this->Admin_m->info_pt(1);
        $this->form_validation->set_rules('username', 'Username', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[5]|max_length[30]');
        if ($this->form_validation->run() == FALSE)
        {
            $pesan = validation_errors();
            $this->session->set_flashdata('message',$pesan); 
            redirect(base_url('index.php/login'));
        }
        else
        {
            $ceksiakad = $this->Master_m->cek_mahasiswa($this->input->post('username'));
            // echo "<pre>";print_r($ceksiakad);echo "<pre/>";exit();
            if ($ceksiakad == TRUE) {
                $passiakad = $ceksiakad->password;
                // echo "<pre>";print_r($passiakad);echo "<pre/>";exit();
                // echo "<pre>";print_r($this->input->post('password'));echo "<pre/>";exit();
                if (password_verify($this->input->post('password'),$passiakad)) {
                    // echo "<pre>";print_r(array('jadi'));echo "<pre/>";exit();
                    $cekusers = $this->Admin_m->detail_data('users','username',$this->input->post('username'));
                    // echo "<pre>";print_r($cekusers);echo "<pre/>";exit();
                    if ($cekusers == TRUE) {
                        // jika password beda dengan siakad
                        if (password_verify($this->input->post('password'), $cekusers->password)) {
                           // suskes
                        } else {
                            $passdata = array(
                                'password' => $this->input->post('password'),
                            );
                            $this->ion_auth->update($cekusers->id,$passdata);
                        }
                    }else{
                        //jika belum ada user maka dibuatkan terlebih dahulu
                        // get data feeder
                        $hostname = $infopt->hostname;
                        $port = $infopt->port;
                        $url = 'http://'.$hostname.':'.$port.'/ws/live.php?wsdl';
                        $client = new nusoap_client($url, true);
                        $proxy = $client->getProxy();
                        $username =$infopt->userfeeder;
                        $pass = $infopt->passfeeder;
                        $token = $proxy->getToken($username, $pass); 
                        //get jumlah data
                        $table ='mahasiswa_pt';
                        $order = "";
                        // $filter ="p.nipd = '{$this->input->post('username')}'";
                        $filter ="p.id_reg_pd = '{$ceksiakad->id_reg_pd}'";
                        $group = array('2');
                        $dtmhsfdr = $proxy->GetRecord($token,$table,$filter);
                        // echo "<pre>";print_r($dtmhsfdr);echo "<pre/>";exit();
                        if ($dtmhsfdr['result'] == TRUE) {
                            $dtemail = strtolower(url_title($dtmhsfdr['result']['nm_pd'])).'@unidayan.ac.id';
                            $cekemail = $this->Admin_m->detail_data('users','email',$dtemail);
                            if ($cekemail == TRUE) {
                                $email = 'w'.strtolower(url_title($dtmhsfdr['result']['nm_pd'].'2')).'@unidayan.ac.id';
                            }else{
                                $email = 'w'.strtolower(url_title($dtmhsfdr['result']['nm_pd'])).'@unidayan.ac.id';
                            }
                            $additional_data = array(
                                'id_pd' => $dtmhsfdr['result']['id_pd'],
                                'id_reg_pd' => $dtmhsfdr['result']['id_reg_pd'],
                                'first_name' => $dtmhsfdr['result']['nm_pd'],
                                'last_name' => 'Wisudawan',
                                'company' => $infopt->nama_info_pt,
                                'phone' => '0812345678',
                            );
                            $this->ion_auth->register(trim($this->input->post('username')),$this->input->post('password'),$email, $additional_data, $group);
                            // pebuatan database wisudawan
                            $getuser = $this->Admin_m->detail_data('users','username',$this->input->post('username'));
                            $wisudawan = array(
                                'id_pd' => $dtmhsfdr['result']['id_pd'],
                                'id_reg_pd' => $dtmhsfdr['result']['id_reg_pd'],
                                'id_user' =>$getuser->id,
                                'nipd' =>$this->input->post('username'),
                                'nm_pd' =>$dtmhsfdr['result']['nm_pd'],
                                'tgl_lahir' =>$dtmhsfdr['result']['tgl_lahir'],
                                'id_sms' =>$dtmhsfdr['result']['id_sms'],
                                'tgl_masuk_sp' =>$dtmhsfdr['result']['tgl_masuk_sp'],
                                'mulai_smt' =>$dtmhsfdr['result']['mulai_smt'],
                                'tmpt_lahir' =>$dtmhsfdr['result']['tmpt_lahir'],
                                'nik' =>@$dtmhsfdr['result']['nik'],
                                'tahun_wisuda' =>$infopt->tahun_wisuda,
                                'periode_wisuda' =>$infopt->periode_wisuda,
                                'email_wisuda' =>$email,
                                'tgl_create' =>date('Y-m-d'),
                                'tgl_update' =>date('Y-m-d'),
                            );
                            $this->Admin_m->create('wisudawan',$wisudawan);
                        }else{
                            $getdatamhs = $this->Master_m->detail_data('mahasiswa_pt','nipd',$this->input->post('username'));
                            // echo "<pre>";print_r($getdatamhs);echo "<pre/>";exit();
                            if ($getdatamhs->id_reg_pd == TRUE) {
                                $dtmhsfdr2 = $proxy->GetRecord($token,'mahasiswa_pt',"id_reg_pd = '{$getdatamhs->id_reg_pd}'");
                                // echo "<pre>";print_r($dtmhsfdr2);echo "<pre/>";exit();
                                if ($dtmhsfdr2['result'] == TRUE) {
                                    $email = strtolower(url_title($dtmhsfdr2['result']['nm_pd'])).'@unidayan.ac.id';
                                    $additional_data2 = array(
                                        'id_pd' => $dtmhsfdr2['result']['id_pd'],
                                        'id_reg_pd' => $dtmhsfdr2['result']['id_reg_pd'],
                                        'first_name' => $dtmhsfdr2['result']['nm_pd'],
                                        'last_name' => 'Wisudawan',
                                        'company' => $infopt->nama_info_pt,
                                        'phone' => '0812345678',
                                    );
                                    // echo "<pre>";print_r($additional_data2);echo "<pre/>";exit();
                                    $this->ion_auth->register(trim($this->input->post('username')),$this->input->post('password'),$email, $additional_data2, $group);
                                    // buat
                                    $getuser2 = $this->Admin_m->detail_data('users','username',$this->input->post('username'));
                                    // echo "<pre>";print_r($getuser2);echo "<pre/>";exit();
                                    $wisudawan2 = array(
                                        'id_pd' => $dtmhsfdr2['result']['id_pd'],
                                        'id_reg_pd' => $dtmhsfdr2['result']['id_reg_pd'],
                                        'id_user' =>$getuser2->id,
                                        'nipd' =>$this->input->post('username'),
                                        'nm_pd' =>$dtmhsfdr2['result']['nm_pd'],
                                        'tgl_lahir' =>$dtmhsfdr2['result']['tgl_lahir'],
                                        'id_sms' =>$dtmhsfdr2['result']['id_sms'],
                                        'tgl_masuk_sp' =>$dtmhsfdr2['result']['tgl_masuk_sp'],
                                        'mulai_smt' =>$dtmhsfdr2['result']['mulai_smt'],
                                        'tmpt_lahir' =>$dtmhsfdr2['result']['tmpt_lahir'],
                                        'nik' =>@$dtmhsfdr2['result']['nik'],
                                        'tahun_wisuda' =>$infopt->tahun_wisuda,
                                        'periode_wisuda' =>$infopt->periode_wisuda,
                                        'email_wisuda' =>$email,
                                        'tgl_create' =>date('Y-m-d'),
                                        'tgl_update' =>date('Y-m-d'),
                                    );
                                    $this->Admin_m->create('wisudawan',$wisudawan2);
                                }else{
                                    $pesan = 'Mahasiswa dengan NIM / NIPD / Nomor Stambuk '.$this->input->post('username').' Tidak ditemukan pada data Pangkalan PDIKTI sehingga tidak dapat di lakukan Input data. Harap Periksa kembali Status Mahasiswa Tersebut pada Pangkatan Data PDIKTI';
                                    $this->session->set_flashdata('message',$pesan); 
                                    redirect(base_url('index.php/login'));
                                } 
                            }else{
                                $pesan = 'Mahasiswa dengan NIM / NIPD / Nomor Stambuk '.$this->input->post('username').' Tidak ditemukan pada database Feeder Maupun Database Universitas. Mohon tinjau ulang kembali data anda.';
                                $this->session->set_flashdata('message',$pesan); 
                                redirect(base_url('index.php/login'));
                            }
                        }
                    }
                    if ($this->ion_auth->login($this->input->post('username'),$this->input->post('password'))) {
                    //jika login sukses, redirect ke halaman admin
                         redirect(base_url('index.php/dashboard'));
                    }else{
                     //jika login gagal, redirect kembali ke halaman login
                     //redirect('login','refresh'); //use redirect instead of loading views compatibility with MY_Controller libraries
                        $pesan = $this->ion_auth->errors();
                        $this->session->set_flashdata('message', $pesan ); 
                        redirect(base_url('index.php/login'));
                    }
                }else{
                    $pesan = 'Password yang anda masukan tidak seusai dengan data SIAKAD Anda, Harap ulangi dan perhatikan penulisan huruf besar dan kecil pada password anda.';
                    $this->session->set_flashdata('message',$pesan); 
                    redirect(base_url('index.php/login'));
                }
            }else{
                $pesan = 'Mahasiswa tidak ditemukan Pada database SIAKAD, Harap periksa kembali NIM / NIPD / Nomor Stambuk Anda';
                $this->session->set_flashdata('message',$pesan); 
                redirect(base_url('index.php/login'));
            }
        }
    }
    function logout(){
        //log the user out
        $logout = $this->ion_auth->logout();
        //redirect ke halaman sebelumnya
        redirect(base_url('index.php/login'));
    }
    function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        if ($this->form_validation->run() == false) {
                //setup the input
            $data['title'] ='Forgot Password';
            $data['email'] = array('name' => 'email','id' => 'email');
                //set any errors and display the form
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('forgot-password-v', $data);
        }
        else {
                //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

                if ($forgotten) { //if there were no errors
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect(base_url('index.php/login')); //we should display a confirmation page here instead of the login page
                }
                else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect(base_url('index.php/login/forgot_password'));
                }
            }
        }
    }
?>