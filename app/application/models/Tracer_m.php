<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tracer_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->from('periode_tracer');
		if (!empty($search['string'])) {
			$this->db->like('nm_periode',$search['string']);
		}
		if (!empty($search['tahun'])) {
			$this->db->like('tahun',$search['tahun']);
		}
		if (!empty($search['periode'])) {
			$this->db->like('periode',$search['periode']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('nm_periode','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount');
		$this->db->from('periode_tracer');
		if (!empty($search['string'])) {
			$this->db->like('nm_periode',$search['string']);
		}
		if (!empty($search['tahun'])) {
			$this->db->like('tahun',$search['tahun']);
		}
		if (!empty($search['periode'])) {
			$this->db->like('periode',$search['periode']);
		}
		$this->db->order_by('nm_periode','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function getAllPertanyaan($id) {
		$this->db->select('pertanyaan.*,type_pertanyaan.nm_type');
		$this->db->join('type_pertanyaan','type_pertanyaan.id_type = pertanyaan.type_opsi');
		$this->db->where('id_periode_t',$id);
		$this->db->order_by('no_urut','asc');
		$query = $this->db->get('pertanyaan');
		return $query->result();
	}
	public function detPertanyaan($id) {
		$this->db->select('pertanyaan.*,type_pertanyaan.nm_type');
		$this->db->join('type_pertanyaan','type_pertanyaan.id_type = pertanyaan.type_opsi');
		$this->db->where('kd_pertanyaan',$id);
		$query = $this->db->get('pertanyaan');
		return $query->row();
	}
	public function detPertanyaanById($id) {
		$this->db->select('pertanyaan.*,type_pertanyaan.nm_type');
		$this->db->join('type_pertanyaan','type_pertanyaan.id_type = pertanyaan.type_opsi');
		$this->db->where('id_pertanyaan',$id);
		$query = $this->db->get('pertanyaan');
		return $query->row();
	}
	public function getAllOpsi($id,$idtanya) {
		$this->db->select('opsi_pertanyaan.*,pertanyaan.kd_pertanyaan');
		$this->db->join('pertanyaan','pertanyaan.id_pertanyaan = opsi_pertanyaan.id_pertanyaan');
		$this->db->where('opsi_pertanyaan.id_periode_t',$id);
		$this->db->where('opsi_pertanyaan.id_pertanyaan',$idtanya);
		$this->db->order_by('nm_opsi','asc');
		$query = $this->db->get('opsi_pertanyaan');
		return $query->result();
	}
}