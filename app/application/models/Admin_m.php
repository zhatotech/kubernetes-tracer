<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_m extends CI_Model
{
	public function info_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query->row();
	}
	public function dd($table,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($table);
		return $query;
	}
	public function detail_data($table,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($table);
		return $query->row();
	}
	public function sub_laman($id){
		$this->db->where('s_laman',$id);
		$this->db->order_by('id_laman','asc');
		$query = $this->db->get('laman');
		return $query->result();
	}
	public function select_data($table){
		$query = $this->db->get($table);
		return $query->result();
	}
	function create($table,$data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	function update($table,$field,$id,$data){
		$this->db->where($field,$id);
		$this->db->update($table,$data);
	}
	function delete($table,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($table);
	}
	public function allprodi(){
		$this->db->join('jenjang_pend','jenjang_pend.id_jenjang_pend = prodi.id_jenjang_pend');
		$query = $this->db->get('prodi');
		return $query->result();
	}
	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function cek_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query;
	}
	public function rupiah($angka){
	
		$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
		return $hasil_rupiah;
	 
	}
	public function slider(){
		$this->db->limit(5);
		$this->db->order_by('id_slider','desc');
		$query = $this->db->get('slider');
		return $query->result();
	}
	public function getTahun(){
		$this->db->group_by('tahun');
		$this->db->order_by('tahun','desc');
		$query = $this->db->get('periode_tracer');
		return $query->result();
	}
	public function getPeriode(){
		$this->db->group_by('periode');
		$this->db->order_by('periode','desc');
		$query = $this->db->get('periode_tracer');
		return $query->result();
	}
}