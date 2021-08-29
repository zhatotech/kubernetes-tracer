<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galeri_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('galeri.*');
		$this->db->from('galeri');
		if (!empty($search['string'])) {
			$this->db->like('galeri.nama_galeri',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('galeri.id_galeri','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,galeri.*');
		$this->db->from('galeri');
		if (!empty($search['string'])) {
			$this->db->like('galeri.nama_galeri',$search['string']);
		}
		$this->db->order_by('galeri.id_galeri','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	// Fetch records
	public function getDatag($rowno,$rowperpage,$search) {
		$this->db->select('kategori_gambar.*');
		$this->db->from('kategori_gambar');
		if (!empty($search['string'])) {
			$this->db->like('kategori_gambar.judul_kategori',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('kategori_gambar.id_kategori','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCountg($search) {
		$this->db->select('count(*) as allcount,kategori_gambar.*');
		$this->db->from('kategori_gambar');
		if (!empty($search['string'])) {
			$this->db->like('kategori_gambar.judul_kategori',$search['string']);
		}
		$this->db->order_by('kategori_gambar.id_kategori','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	// Fetch records
	public function getDataisig($idkategori,$rowno,$rowperpage,$search) {
		$this->db->select('galeri.*');
		$this->db->from('galeri');
		if (!empty($search['string'])) {
			$this->db->like('galeri.nama_galeri',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->where('galeri.id_kategori', $idkategori);
		$this->db->order_by('galeri.id_galeri','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	  // Select total records
	public function getrecordCountisig($idkategori,$search) {
		$this->db->select('count(*) as allcount,galeri.*');
		$this->db->from('galeri');
		if (!empty($search['string'])) {
			$this->db->like('galeri.nama_galeri',$search['string']);
		}
		$this->db->where('galeri.id_kategori', $idkategori);
		$this->db->order_by('galeri.id_galeri','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}
