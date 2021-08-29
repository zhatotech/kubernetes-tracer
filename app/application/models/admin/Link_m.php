<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Link_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('link.*');
		$this->db->from('link');
		if (!empty($search['string'])) {
			$this->db->like('link.nama_link',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('link.id_link','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,link.*');
		$this->db->from('link');
		if (!empty($search['string'])) {
			$this->db->like('link.nama_link',$search['string']);
		}
		$this->db->order_by('link.id_link','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}
