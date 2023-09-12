<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_user_model extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }
}