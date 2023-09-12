<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud');
    }

    public function index()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $data['title'] = 'Setting_user';
        $data['setting_user'] = $this->crud->get_data('tbl_user')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('setting_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_user');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nik' => $this->input->post('nik'),
                'user' => $this->input->post('user'),
                'pabrik' => $this->input->post('pabrik'),
            );

            $this->setting_user_model->insert_data($data, 'tbl_user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            User Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
                aria-hidden="true">&times;</span></button></div>');
            redirect('setting_user');
        }
    }
public function edit($id)
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->index();
    }else {
        $data = array(
            'id' => $id,
            'nik' => $this->input->post('nik'),
            'user' => $this->input->post('user'),
            'pabrik' => $this->input->post('pabrik'),
        );

        $this->setting_user_model->update_data($data, 'tbl_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        User Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
            aria-hidden="true">&times;</span></button></div>');
        redirect('setting_user');
    }

}

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('user', 'User', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('pabrik', 'Pabrik', 'required', array(
            'required' => '%s harus diisi !!'
        ));

    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->setting_user_model->delete($where, 'tbl_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        User Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
            aria-hidden="true">&times;</span></button></div>');
        redirect('setting_user');
        
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['setting_user'] =$this->setting_user_model->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('setting_user', $data);
        $this->load->view('templates/footer');
    }
}

/* End of File Setting_user.php */
/* Location: ./application/controllers/Setting_user.php */

