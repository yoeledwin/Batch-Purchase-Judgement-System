<?php
class CRUD extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
    }

    public function update_data($id,$table,$data){
        $this->db->where('id',$id);
        $this->db->update($table, $data);
    }

    public function update_data_2($id,$table,$data){
        $this->db->where('id_antri',$id);
        $this->db->update($table, $data);
    }

    public function delete($data, $table){
        $this->db->where($data);
        $this->db->delete($table);
    }

    public function get_data_coba($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_data');
        $this->db->where('tbl_data.id',$id);
        $this->db->join('tbl_data2', 'tbl_data2.id_antri = tbl_data.id');
        $query = $this->db->get();
        return $query;
    }
}
