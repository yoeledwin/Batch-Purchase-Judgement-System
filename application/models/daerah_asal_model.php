<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daerah_asal_model extends CI_Model {
    public function get_data()
    {
        return $this->db->get('daerah_asal');
    }
}