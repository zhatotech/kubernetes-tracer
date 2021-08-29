<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_m extends CI_Model
{
	public function info_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query->row();
	}
	public function cek_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query;
	}
	function create($table,$data){
		$this->db->insert($table,$data);
	}
	function update($table,$field,$id,$data){
		$this->db->where($field,$id);
		$this->db->update($table,$data);
	}
	function delete($table,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($table);
	}
	public function detail_data($table,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($table);
		return $query->row();
	}
	public function select_all_data($table){
		$query = $this->db->get($table);
		return $query->result();
	}
	public function select_data($table){
		$query = $this->db->get($table);
		return $query->result();
	}
	public function select_data_order($table,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($table);
		return $query->result();
	}
	public function get_smt_kemarin($smt){
		$this->db2->where('id_stat_mhs','A');
		$this->db2->where('id_smt',$smt);
		$query = $this->db2->get('kuliah_mahasiswa');
		return $query;
	}
	public function mhsblmbayar($smt){
		$this->db->where_not_in('id_stat','1');
		$this->db->where('id_smt',$smt);
		$query = $this->db->get('transaksi');
		return $query;
	}
	public function mhssdhbayar($smt){
		$this->db->where('id_stat','1');
		$this->db->where('id_smt',$smt);
		$query = $this->db->get('transaksi');
		return $query;
	}
	public function rwlayanan($idkar){
		$this->db->select('transaksi.*,nota.id_users,jenis_transaksi.nm_transaksi');
		$this->db->where('id_users',$idkar);
		$this->db->limit(25);
		$this->db->join('nota', 'nota.kode_nota = transaksi.kode_nota');
		$this->db->join('jenis_transaksi', 'jenis_transaksi.id_jns_transaksi = transaksi.id_jns_transaksi');
		$this->db->order_by('id_transaksi','desc');
		$query = $this->db->get('transaksi');
		return $query->result();
	}
	public function getangtrxbysmt($smt){
		$this->db->select('transaksi.angkatan,COUNT(angkatan) as total');
		$this->db->group_by('angkatan');
		$this->db->where('id_smt',$smt);
		$query = $this->db->get('transaksi');
		return $query->result();
	}
	public function cektahun($idpt,$kode){
		$this->db->where('id_info_pt', $idpt);
		$this->db->where('kode_tahun', $kode);
		$query = $this->db->get('tahun');
		return $query->row();
	}
	public function cekbulan($idpt,$kode){
		$this->db->where('id_info_pt', $idpt);
		$this->db->where('kode_bulan', $kode);
		$query = $this->db->get('bulan');
		return $query->row();
	}
	public function cektanggal($idpt,$kode){
		$this->db->where('id_info_pt', $idpt);
		$this->db->where('kode', $kode);
		$query = $this->db->get('tanggal');
		return $query->row();
	}
	public function caritahun($idpt){
		$this->db->where('id_info_pt', $idpt);
		$query = $this->db->get('tahun');
		return $query->result();
	}
	public function caribulan($idpt){
		$this->db->where('id_info_pt', $idpt);
		$query = $this->db->get('bulan');
		return $query->result();
	}
	public function caritanggal($idpt){
		$this->db->where('id_info_pt', $idpt);
		$query = $this->db->get('tanggal');
		return $query->result();
	}
	// dashboardf
	public function dh_outlet_harian($tgl){
		$this->db->join('info_pt', 'info_pt.id_info_pt = tanggal.id_info_pt');
		$this->db->where('kode', $tgl);
		$this->db->order_by('tanggal.id_info_pt');
		$query = $this->db->get('tanggal');
		return $query->result();
	}
	public function getinfo(){
		$this->db->order_by('id_info','desc');
		$this->db->limit(6);
		$query = $this->db->get('info');
		return $query->result();
	}
	public function getberita($limit){
		$this->db->order_by('id_informasi','desc');
		$this->db->limit($limit);
		$query = $this->db->get('informasi');
		return $query->result();
	}
	public function getnewsoffest($limit,$offest){
		$this->db->order_by('id_informasi','desc');
		$this->db->limit($limit,$offest);
		$query = $this->db->get('informasi');
		return $query->result();
	}
	public function getnewsbykat($kate,$limit){
		$this->db->order_by('id_informasi','desc');
		$this->db->where('id_kategori',$kate);
		$this->db->limit($limit);
		$query = $this->db->get('informasi');
		return $query->result();
	}
	public function getnewsall($limit){
		$this->db->order_by('id_informasi','desc');
		$this->db->limit($limit);
		$query = $this->db->get('informasi');
		return $query->result();
	}
	public function getprodukterjual($date,$idinfopt) {
		$this->db->select('SUM(nota_keluar.jml_bayar) as total,type.nm_type,nota_keluar.*,info_pt.nama_info_pt,info_pt.kode_pt');
		$this->db->join('produk', 'produk.id_produk = nota_keluar.id_produk');
		$this->db->join('type', 'type.id_type = produk.id_type');
		$this->db->join('info_pt', 'info_pt.id_info_pt = nota_keluar.id_info_pt');
		$this->db->where('nota_keluar.tgl_jual',$date);
		$this->db->where('nota_keluar.id_info_pt',$idinfopt);
		$this->db->where_not_in('nota_keluar.id_produk','0');
		$this->db->group_by('produk.id_type');
		$query = $this->db->get('nota_keluar');
		return $query->result();
	}
	public function slider(){
		$this->db->limit(5);
		$this->db->order_by('id_slider','desc');
		$query = $this->db->get('slider');
		return $query->result();
	}
	public function pejabat(){
		$this->db->order_by('id_dewan','desc');
		$query = $this->db->get('dewan');
		return $query->result();
	}
	public function laman_primer(){
		$this->db->where('s_laman','0');
		$this->db->order_by('id_laman','asc');
		$query = $this->db->get('laman');
		return $query->result();
	}
	public function sub_laman($id){
		$this->db->where('s_laman',$id);
		$this->db->order_by('id_laman','asc');
		$query = $this->db->get('laman');
		return $query->result();
	}
	public function select_limit($table,$field,$ascdesc,$limit){
		$this->db->order_by($field,$ascdesc);
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result();
	}
	public function list_tgl(){
		$this->db->order_by('tgl_view','desc');
		$this->db->limit(20);
		$query = $this->db->get('view');
		return $query->result();
	}
	public function getjml($table){
		$query = $this->db->get($table);
		return $query->num_rows();
	}
}
