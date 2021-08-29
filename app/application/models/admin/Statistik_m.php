<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statistik_m extends CI_Model
{
  public function getData($table1,$table2,$field1,$field2,$order,$ordering, $rowno,$rowperpage){
      $this->db->select('*');
      $this->db->from($table1);
      $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
			$this->db->limit($rowperpage, $rowno);
      $this->db->order_by($order,$ordering);
			$query = $this->db->get();
			return $query->result_array();
  }

  public function getrecordCount($table1,$order,$ordering){
      $this->db->select('count(*) as allcount');
      $this->db->from($table1);
      $this->db->order_by($order,$ordering);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result[0]['allcount'];
  }

  public function view($table){
      return $this->db->get($table);
  }

  public function view_where($table,$where,$id){
      $this->db->where($where,$id);
      return $this->db->get($table);
  }

  public function view_ordering($table,$order,$ordering){
      $this->db->order_by($order,$ordering);
      return $this->db->get($table);
  }

  public function cek_eksis_data($table, $where1, $id1){
      $this->db->where($where1,$id1);
      $query = $this->db->get($table,1);

      if ($query->num_rows() > 0){
          return $query->row_array();
      }else{
          return NULL;
      }
  }

  public function view_join_where($table1,$table2,$field1,$field2,$where,$id){
      $this->db->select('*');
      $this->db->from($table1);
      $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
			$this->db->where($where, $id);
			$query = $this->db->get();
			return $query;
  }

  public function edit_data_id($args, $data){
      extract($args);
      $this->db->where($wheres, $id);
      $this->db->update($table_name, $data);
      return TRUE;
  }

}
