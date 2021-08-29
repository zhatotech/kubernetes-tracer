<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laman_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('laman.*');
		$this->db->from('laman');
		if (!empty($search['string'])) {
			$this->db->like('laman.judul_laman',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('laman.id_laman','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,laman.*');
		$this->db->from('laman');
		if (!empty($search['string'])) {
			$this->db->like('laman.judul_laman',$search['string']);
		}
		$this->db->order_by('laman.id_laman','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}
