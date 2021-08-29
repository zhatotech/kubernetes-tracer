<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dewan_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('dewan.*');
		$this->db->from('dewan');
		if (!empty($search['string'])) {
			$this->db->like('dewan.nama',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('dewan.id_dewan','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,dewan.*');
		$this->db->from('dewan');
		if (!empty($search['string'])) {
			$this->db->like('dewan.nama',$search['string']);
		}
		$this->db->order_by('dewan.id_dewan','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}