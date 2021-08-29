<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Informasi_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('informasi.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('informasi');
		if (!empty($search['string'])) {
			$this->db->like('informasi.nm_informasi',$search['string']);
		}
		if (!empty($search['id_info_pt'])) {
			$this->db->where('informasi.id_info_pt',$search['id_info_pt']);
		}
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('informasi.id_informasi','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,informasi.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('informasi');
		if (!empty($search['string'])) {
			$this->db->like('informasi.nm_informasi',$search['string']);
		}
		
		if (!empty($search['id_info_pt'])) {
			$this->db->where('informasi.id_info_pt',$search['id_info_pt']);
		}
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->order_by('informasi.id_informasi','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	// Fetch records
	public function getDataid($id,$rowno,$rowperpage,$search) {
		$this->db->select('informasi.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('informasi');
		if (!empty($search['string'])) {
			$this->db->like('informasi.nm_informasi',$search['string']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->where('informasi.id_info_pt',$id);
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->order_by('informasi.id_informasi','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCountid($id,$search) {
		$this->db->select('count(*) as allcount,informasi.*,informasi.nm_informasi,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('informasi');
		if (!empty($search['string'])) {
			$this->db->like('informasi.nm_informasi',$search['string']);
		}
		$this->db->where('informasi.id_info_pt',$id);
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->order_by('informasi.id_informasi','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function lastdok(){
		$this->db->select('informasi.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->order_by('id_informasi','desc');
		$this->db->limit(5);
		$query = $this->db->get('informasi');
		return $query->result();
	}
	public function detaildok($id){
		$this->db->select('informasi.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->where('informasi.id_informasi',$id);
		$query = $this->db->get('informasi');
		return $query->row();
	}
	public function katgorbanyak(){
		$this->db->select('count(informasi.id_informasi),informasi.id_informasi');
		$this->db->join('kategori','kategori.id_kategori = informasi.id_informasi');
		$this->db->group_by('informasi.id_informasi');
		$this->db->order_by('count(informasi.id_informasi)','desc');
		$this->db->limit(2);
		$query = $this->db->get('informasi');
		return $query->result();
	}
	public function dokbykatdok($id){
		$this->db->select('informasi.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('info_pt', 'info_pt.id_info_pt = informasi.id_info_pt');
		$this->db->where('informasi.id_informasi',$id);
		$this->db->order_by('id_informasi','desc');
		$this->db->limit(5);
		$query = $this->db->get('informasi');
		return $query->result();
	}
}