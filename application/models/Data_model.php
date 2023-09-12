<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }


    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($table, $data);
    }

    public function delete($data, $table)
    {
        $this->db->where($data);
        $this->db->delete($table);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_data');
        $this->db->like('pabrik', $keyword);
        $this->db->or_like('supplier', $keyword);
        $this->db->or_like('daerah_asal', $keyword);
        $this->db->or_like('drc_patokan', $keyword);
        return $this->db->get()->result();
    }
} 
    
/* End of File Data_model.php */
/* Location: ./application/models/Data_model.php */