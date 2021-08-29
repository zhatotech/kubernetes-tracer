<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori_m extends CI_Model
{
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('nama_kategori',$string);
		}
		return $this->db->get('kategori')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('nama_kategori',$cari);
		}
		$query = $this->db->get('kategori',$sampai,$dari);
		return $query->result();
	}
	function insert_kategori($data){
		$this->db->insert('kategori', $data);
	}
	function update_kategori($id,$data){
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori', $data);
	}
	public function detail_kategori($id){
		$this->db->where('id_kategori',$id);
		$query = $this->db->get('kategori');
		return $query->row();
	}
	public function cek_kategori($id){
		$this->db->where('id_kategori',$id);
		$query = $this->db->get('kategori');
		return $query->row();
	}
	public function delete_kategori($id){
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
}
