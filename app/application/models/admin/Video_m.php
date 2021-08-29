<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Video_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('video.*');
		$this->db->from('video');
		if (!empty($search['string'])) {
			$this->db->like('video.judul_video',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('video.id_video','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,video.*');
		$this->db->from('video');
		if (!empty($search['string'])) {
			$this->db->like('video.judul_video',$search['string']);
		}
		$this->db->order_by('video.id_video','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
}
