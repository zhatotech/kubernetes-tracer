<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mahasiswa_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		// $this->db->select('alumni.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('alumni');
		if (!empty($search['string'])) {
			$this->db->like('nama_mahasiswa',$search['string']);
		}
		if (!empty($search['nama_program_studi'])) {
			$this->db->where('nama_program_studi',$search['nama_program_studi']);
		}
		if (!empty($search['id_periode_masuk'])) {
			$this->db->where('id_periode_masuk',$search['id_periode_masuk']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('nim','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount');
		$this->db->from('alumni');
		if (!empty($search['string'])) {
			$this->db->like('nama_mahasiswa',$search['string']);
		}
		if (!empty($search['nama_program_studi'])) {
			$this->db->where('nama_program_studi',$search['nama_program_studi']);
		}
		if (!empty($search['id_periode_masuk'])) {
			$this->db->where('id_periode_masuk',$search['id_periode_masuk']);
		}
		$this->db->order_by('nim','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	// Fetch records
	public function getDataid($id,$rowno,$rowperpage,$search) {
		$this->db->from('alumni');
		if (!empty($search['string'])) {
			$this->db->like('nama_mahasiswa',$search['string']);
		}
		if (!empty($search['id_periode_masuk'])) {
			$this->db->where('id_periode_masuk',$search['id_periode_masuk']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->where('nama_program_studi',$id);
		$this->db->order_by('nim','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCountid($id,$search) {
		$this->db->select('count(*) as allcount');
		$this->db->from('alumni');
		if (!empty($search['string'])) {
			$this->db->like('nama_mahasiswa',$search['string']);
		}
		if (!empty($search['id_periode_masuk'])) {
			$this->db->where('id_periode_masuk',$search['id_periode_masuk']);
		}
		$this->db->where('nama_program_studi',$id);
		$this->db->order_by('nim','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}