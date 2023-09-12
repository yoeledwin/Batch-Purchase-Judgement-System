<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_user_model extends CI_Model {

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
        $this->db->from('tbl_user');
        $this->db->like('nik', $keyword);
        $this->db->or_like('user', $keyword);
        $this->db->or_like('pabrik', $keyword);
        return $this->db->get()->result();
    }
} 
    
/* End of File Setting_user_model.php */
/* Location: ./application/models/Setting_user_model.php */