<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

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
        $this->db->where('id_guru', $data['id_guru']);
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
        $this->db->like('nama_guru', $keyword);
        $this->db->or_like('pelajaran', $keyword);
        $this->db->or_like('alamat_guru', $keyword);
        $this->db->or_like('nomor_telepon', $keyword);
        $this->db->or_like('umur', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        return $this->db->get()->result();
    }
} 
    
/* End of File Guru_model.php */
/* Location: ./application/models/Guru_model.php */