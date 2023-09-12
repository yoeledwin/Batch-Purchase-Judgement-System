<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis_bokar_model extends CI_Model {
    public function get_data()
    {
        return $this->db->get('jenis_bokar');
    }
}