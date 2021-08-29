<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dokumen_m extends CI_Model
{
	// Fetch records
	public function getData($rowno,$rowperpage,$search) {
		$this->db->select('dokumen.*,kategori.nm_kategori,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('dokumen');
		if (!empty($search['string'])) {
			$this->db->like('dokumen.nm_dokumen',$search['string']);
		}
		if (!empty($search['id_kategori'])) {
			$this->db->where('dokumen.id_kategori',$search['id_kategori']);
		}
		if (!empty($search['nomor'])) {
			$this->db->where('dokumen.nomor',$search['nomor']);
		}
		if (!empty($search['tahun'])) {
			$this->db->where('dokumen.tahun',$search['tahun']);
		}
		if (!empty($search['id_info_pt'])) {
			$this->db->where('dokumen.id_info_pt',$search['id_info_pt']);
		}
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('dokumen.id_dokumen','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCount($search) {
		$this->db->select('count(*) as allcount,dokumen.*,kategori.nm_kategori,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('dokumen');
		if (!empty($search['string'])) {
			$this->db->like('dokumen.nm_dokumen',$search['string']);
		}
		if (!empty($search['id_kategori'])) {
			$this->db->where('dokumen.id_kategori',$search['id_kategori']);
		}
		if (!empty($search['nomor'])) {
			$this->db->where('dokumen.nomor',$search['nomor']);
		}
		if (!empty($search['tahun'])) {
			$this->db->where('dokumen.tahun',$search['tahun']);
		}
		if (!empty($search['id_info_pt'])) {
			$this->db->where('dokumen.id_info_pt',$search['id_info_pt']);
		}
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->order_by('dokumen.id_dokumen','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	// Fetch records
	public function getDataid($id,$rowno,$rowperpage,$search) {
		$this->db->select('dokumen.*,kategori.nm_kategori,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('dokumen');
		if (!empty($search['string'])) {
			$this->db->like('dokumen.nm_dokumen',$search['string']);
		}
		if (!empty($search['id_kategori'])) {
			$this->db->where('dokumen.id_kategori',$search['id_kategori']);
		}
		if (!empty($search['nomor'])) {
			$this->db->where('dokumen.nomor',$search['nomor']);
		}
		if (!empty($search['tahun'])) {
			$this->db->where('dokumen.tahun',$search['tahun']);
		}
		$this->db->limit($rowperpage, $rowno);
		$this->db->where('dokumen.id_info_pt',$id);
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->order_by('dokumen.id_kategori','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	  // Select total records
	public function getrecordCountid($id,$search) {
		$this->db->select('count(*) as allcount,dokumen.*,dokumen.nm_dokumen,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->from('dokumen');
		if (!empty($search['string'])) {
			$this->db->like('dokumen.nm_dokumen',$search['string']);
		}
		if (!empty($search['id_kategori'])) {
			$this->db->where('dokumen.id_kategori',$search['id_kategori']);
		}
		if (!empty($search['nomor'])) {
			$this->db->where('dokumen.nomor',$search['nomor']);
		}
		if (!empty($search['tahun'])) {
			$this->db->where('dokumen.tahun',$search['tahun']);
		}
		$this->db->where('dokumen.id_info_pt',$id);
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->order_by('dokumen.id_dokumen','desc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}
	public function lastdok(){
		$this->db->select('dokumen.*,kategori.nm_kategori,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->order_by('id_dokumen','desc');
		$this->db->limit(5);
		$query = $this->db->get('dokumen');
		return $query->result();
	}
	public function detaildok($id){
		$this->db->select('dokumen.*,kategori.nm_kategori,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->where('dokumen.id_dokumen',$id);
		$query = $this->db->get('dokumen');
		return $query->row();
	}
	public function katgorbanyak(){
		$this->db->select('count(dokumen.id_kategori),kategori.nm_kategori,dokumen.id_kategori');
		$this->db->join('kategori','kategori.id_kategori = dokumen.id_kategori');
		$this->db->group_by('dokumen.id_kategori');
		$this->db->order_by('count(dokumen.id_kategori)','desc');
		$this->db->limit(2);
		$query = $this->db->get('dokumen');
		return $query->result();
	}
	public function dokbykatdok($id){
		$this->db->select('dokumen.*,kategori.nm_kategori,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
		$this->db->join('info_pt', 'info_pt.id_info_pt = dokumen.id_info_pt');
		$this->db->where('dokumen.id_kategori',$id);
		$this->db->order_by('id_dokumen','desc');
		$this->db->limit(5);
		$query = $this->db->get('dokumen');
		return $query->result();
	}
}
