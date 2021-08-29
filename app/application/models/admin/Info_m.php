<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Info_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('info.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('info');
		$this->db->join('info_pt', 'info_pt.id_info_pt = info.id_info_pt');
		if (!empty($search['string'])) {
			$this->db->like('info.nm_info',$search['string']);
			$this->db->or_like('info.kode_info',$search['string']);
		}
		if (!empty($search['kode_pt'])) {
			$this->db->like('info.kode_pt',$search['kode_pt']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('info.id_info','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,info.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('info_pt', 'info_pt.id_info_pt = info.id_info_pt');
		$this->db->from('info');
		if (!empty($search['string'])) {
			$this->db->like('info.nm_info',$search['string']);
			$this->db->or_like('info.kode_info',$search['string']);
		}
		if (!empty($search['kode_pt'])) {
			$this->db->like('info.kode_pt',$search['kode_pt']);
		}
		$this->db->order_by('info.id_info','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	// Fetch records
	public function getDataid($id,$rowno,$rowperpage,$search) {
		$this->db->select('info.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('info');
		$this->db->join('info_pt', 'info_pt.id_info_pt = info.id_info_pt');
		if (!empty($search['string'])) {
			$this->db->like('info.nm_info',$search['string']);
			$this->db->or_like('info.kode_info',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->where('info.id_info_pt',$id);
		$this->db->order_by('info.id_info','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Select total records
	public function getrecordCountid($id,$search) {
		$this->db->select('count(*) as allcount,info.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('info_pt', 'info_pt.id_info_pt = info.id_info_pt');
		$this->db->from('info');
		if (!empty($search['string'])) {
			$this->db->like('info.nm_info',$search['string']);
			$this->db->or_like('info.kode_info',$search['string']);
		}
		$this->db->where('info.id_info_pt',$id);
		$this->db->order_by('info.id_info','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function lastinfo(){
		$this->db->order_by('id_info','desc');
		$query = $this->db->get('info');
		return $query->row();
	}
}
