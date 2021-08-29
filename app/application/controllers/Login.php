<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
	    parent::__construct();
	    $this->load->model('Admin_m');
	    $this->load->library('Myfeeder');
	}
	public function index()
	{
		if ($this->ion_auth->logged_in()) {
			redirect(base_url('dashboard'));
		}else{
			$infopt = $this->Admin_m->info_pt('1');
			// echo "<pre>";print_r($infopt);echo "</pre>";exit();
			$data['title'] = 'Login Sistem '.$infopt->nama_info_pt;
			$data['infopt'] = $infopt;
			$this->load->view('templates/login-v',$data);
		}
	}
	public function proseslogin(){
		// validate form input
		$this->form_validation->set_rules('username','Noreg', 'alpha_numeric|required|max_length[13]|trim');
		$this->form_validation->set_rules('password', 'Password', 'alpha_numeric|required|max_length[20]|min_length[6]|trim');
		if ($this->form_validation->run() == TRUE) {
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('msgsukses', $this->ion_auth->messages());
				redirect(base_url('dashboard'));
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('msgeror', $this->ion_auth->errors());
				redirect(base_url('login')); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}else{
			// pesan eror ketika hak validasi tidak sesuai
			$msg = validation_errors();
			// echo "<pre>";print_r($msg);echo "</pre>";exit();
			$this->session->set_flashdata('msgeror',$msg);
			redirect(base_url('login'));
		}
	}
	public function register()
	{
		if ($this->ion_auth->logged_in()) {
			redirect(base_url('dashboard'));
		}else{
			$infopt = $this->Admin_m->info_pt('1');
			// echo "<pre>";print_r($infopt);echo "</pre>";exit();
			$data['title'] = 'Register ALumni Baru '.$infopt->nama_info_pt;
			$data['infopt'] = $infopt;
			$this->load->view('templates/register-v',$data);
		}
	}
	public function prosesregistrasi(){
		// validate form input
		$this->form_validation->set_rules('username','Noreg', 'numeric|required|min_length[9]|max_length[12]|trim');
		if ($this->form_validation->run() == TRUE) {
			$post = $this->input->post();
			// cek feeder
			$cekfeeder = $this->myfeeder->getMhsByNIM($post['username']);
			// echo "<pre>";print_r($cekfeeder->data->nim);echo "</pre>";exit();
			if ($cekfeeder->data == FALSE) {
				// echo "<pre>";print_r($msg);echo "</pre>";exit();
				$msg = 'Mahasiswa dengan NIM '.$post['username'].' tidak ditemukan.';
				$this->session->set_flashdata('msgeror',$msg);
				redirect(base_url('login/register/'));
			}else{
				$infopt = $this->Admin_m->info_pt('1');
				$data['title'] = 'Detail Register ALumni dengan NIM '.$post['username'];
				$data['getmhs'] = $cekfeeder->data;
				$data['infopt'] = $infopt;
				// echo "<pre>";print_r($data['getmhs']);echo "</pre>";exit();
				$this->load->view('templates/detail-register-v',$data);
			}
		}else{
			// pesan eror ketika hak validasi tidak sesuai
			$msg = validation_errors();
			// echo "<pre>";print_r($msg);echo "</pre>";exit();
			$this->session->set_flashdata('msgeror',$msg);
			redirect(base_url('login/register/'));
		}
	}
	public function konfirmasidata($idregmhs,$idmhs){
		$infopt = $this->Admin_m->info_pt('1');
		$newidregmhs =preg_replace("/[^a-zA-Z0-9\-]/", "", $idregmhs);
		$newidmhs =preg_replace("/[^a-zA-Z0-9\-]/", "", $idmhs);
		$cekfeeder = $this->myfeeder->getMhsByIdreg($newidregmhs);
		$data['title'] = 'Detail Registrasi ALumni dengan NIM '.$cekfeeder->data[0]->nim;
		$data['infopt'] = $infopt;
		$data['getmhs'] = $cekfeeder->data[0];
		// echo "<pre>";print_r($data['getmhs']);echo "</pre>";exit();
		$this->load->view('templates/konfirmasi-data-v',$data);
	}
	public function createmhs($idregmhs,$idmhs){
		$newidregmhs =preg_replace("/[^a-zA-Z0-9\-]/", "", $idregmhs);
		$newidmhs =preg_replace("/[^a-zA-Z0-9\-]/", "", $idmhs);
		$getmhsreg = $this->myfeeder->getMhsByIdreg($newidregmhs);
		// echo "<pre>";print_r($getmhsreg->data[0]->nim);echo "</pre>";exit();
		if ($getmhsreg->data[0] == TRUE) {
			$cekdatabase = $this->db->get_where('alumni',['nim'=>trim($getmhsreg->data[0]->nim)])->row();
			if ($cekdatabase == TRUE) {
				$msg = 'Alumni dengan NIM '.$getmhsreg->data[0]->nim.' - '.$getmhsreg->data[0]->nama_mahasiswa.' sudah terdaftar sebelumnya.';
				$this->session->set_flashdata('msgeror',$msg);
				redirect(base_url('login/register/'));exit();
			}else{
				$username = trim($getmhsreg->data[0]->nim);
				$email = trim($this->input->post('email'));
				$password = 'trc'.$username.date('ms');
				$group = array('2');
				$additional_data = array(
					'first_name' => strip_tags($getmhsreg->data[0]->nama_mahasiswa),
					'id_registrasi_mahasiswa' =>strip_tags(trim($getmhsreg->data[0]->id_registrasi_mahasiswa)),
					'id_mahasiswa' =>strip_tags(trim($getmhsreg->data[0]->id_mahasiswa)),
					'last_name' => 'Tracer Umbuton',
					'company' => 'Umbuton',
					'phone' => strip_tags(trim($this->input->post('handphone'))),
					'repassword' => $password,
					'lvl' => '2',
				);
				$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				$insdata = array(
					'id_registrasi_mahasiswa' =>strip_tags(trim($getmhsreg->data[0]->id_registrasi_mahasiswa)),
					'id_mahasiswa' =>strip_tags(trim($getmhsreg->data[0]->id_mahasiswa)),
					'nim' =>strip_tags(trim($getmhsreg->data[0]->nim)),
					'nama_mahasiswa' =>strip_tags(trim($getmhsreg->data[0]->nama_mahasiswa)),
					'id_prodi' =>strip_tags(trim($getmhsreg->data[0]->id_prodi)),
					'handphone' =>strip_tags(trim($this->input->post('handphone'))),
					'email' =>strip_tags(trim($this->input->post('email'))),
					'nama_program_studi' =>strip_tags(trim($getmhsreg->data[0]->nama_program_studi)),
					'id_periode_masuk' =>strip_tags(trim($getmhsreg->data[0]->id_periode_masuk)),
					'nama_periode_masuk' =>strip_tags(trim($getmhsreg->data[0]->nama_periode_masuk)),
					'jenis_kelamin' =>strip_tags(trim($getmhsreg->data[0]->jenis_kelamin)),
					'tempat_lahir' =>strip_tags(trim($getmhsreg->data[0]->tempat_lahir)),
					'tanggal_lahir' =>strip_tags(trim($getmhsreg->data[0]->tanggal_lahir)),
					'id_agama' =>strip_tags(trim($getmhsreg->data[0]->id_agama)),
					'nama_agama' =>strip_tags(trim($getmhsreg->data[0]->nama_agama)),
					'nik' =>strip_tags(trim($getmhsreg->data[0]->nik)),
					'created_at' =>date('Y-m-d'),
				);
				$this->db->insert('alumni',$insdata);
				$msg = 'Akun Alumni '.$getmhsreg->data[0]->nama_mahasiswa.' Berhasil di Buat, Password telah di kirim ke email anda, silahkan di periksa.';
				$this->session->set_flashdata('msgsukses',$msg);
				redirect(base_url('login/'));
			}
		}else{
			$msg = 'Terjadi kesalahan, harap lakukan pengisian ulang';
			$this->session->set_flashdata('msgeror',$msg);
			redirect(base_url('login/'));
		}
		// echo "<pre>";print_r($getmhsreg);echo "</pre>";
		// echo "<pre>";print_r($newidmhs);echo "</pre>";exit();
	}
	public function logout()
	{
		$this->ion_auth->logout();
		$msg = 'Anda telah berhasil Logout';
		$this->session->set_flashdata('msgsukses',$msg);
		// redirect them to the login page
		redirect(base_url('login'));
	}
}
