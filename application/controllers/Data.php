<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
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
        $data['title'] = 'Data';
        $data['data'] = $this->crud->get_data('tbl_data')->result();
        $data['data2'] = $this->crud->get_data('tbl_data2')->result();
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('data', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data';
        $data['pabrik'] = $this->data_model->get_data('tbl_pabrik')->result();
        $data['supplier'] = $this->data_model->get_data('tbl_supplier')->result();
        $data['daerah_asal'] = $this->daerah_asal_model->get_data()->result();
        $data['jenis_bokar'] = $this->jenis_bokar_model->get_data()->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_data',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
            $data = array(
                'tanggal_waktu' => $this->input->post('tanggal_waktu'),
                'pabrik' => $this->input->post('kode_pabrik'),
                'supplier' => $this->input->post('nama_supplier'),
                'daerah_asal' => $this->input->post('daerah_asal'),
                'jenis_bokar' => $this->input->post('jenis_bokar'),
                'drc_patokan' => $this->input->post('drc_patokan'),
                'drc_taksir' => $this->input->post('drc_taksir'),
                'drc_beli_nego' => $this->input->post('drc_beli_nego'),
                'drc_lab' => $this->input->post('drc_lab'),
                'adjustment_drc_lab' => $this->input->post('adjustment_drc_lab'),
                'mobile_notarin' => $this->input->post('mobile_notarin'),
                'hasil_kering_nego' => $this->input->post('hasil_kering_nego'),
                'timbang_basah' => $this->input->post('timbang_basah'),
                'notarin_awal' => $this->input->post('notarin_awal'),
                'hasil_kering_patokan_lab' => $this->input->post('hasil_kering_patokan_lab'),
                'total_harga_beli_awal' => $this->input->post('total_harga_beli_awal'),
                'total_harga_beli_patokan' => $this->input->post('total_harga_beli_patokan'),
                'notarin_bpjs' => $this->input->post('notarin_bpjs'),
                'selisih_notarin' => $this->input->post('selisih_notarin'),
            );
        
            $this->data_model->insert_data($data, 'tbl_data');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
                aria-hidden="true">&times;</span></button></div>');
            redirect('data');
    }


    public function edit($id)
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $data['data'] = $this->crud->get_data_coba($id)->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data1 = array(
            'tgl_antri'=>$this->input->post('tgl_antri'),
            'no_antri'=>$this->input->post('no_antri'),
            'no_plat'=>$this->input->post('no_plat'),
            'supplier' => $this->input->post('supplier'),
            'daerah_asal' => $this->input->post('daerah_asal'),
        );

        $data2 = array(
            'jenis_bokar' => $this->input->post('jenis_bokar'),
            'kelas' => $this->input->post('kelas'),
            'partai' => $this->input->post('partai'),
            'drc_history' => $this->input->post('drc_history'),
            'drc_taksir' => $this->input->post('drc_taksir'),
            'file' => $this->input->post('file'),
        );

        $this->crud->update_data($id,'tbl_data', $data1);
        $this->crud->update_data_2($id,'tbl_data2', $data2);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
            aria-hidden="true">&times;</span></button></div>');
        redirect('data');
    

    }


    public function _rules()
    {
        $this->form_validation->set_rules('pabrik', 'Pabrik', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('supplier', 'Supplier', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('daerah_asal', 'Daerah Asal', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('drc_patokan', 'DRC Patokan', 'required', array(
            'required' => '%s harus diisi !!'
        ));

    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->data_model->delete($where, 'tbl_data');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
            aria-hidden="true">&times;</span></button></div>');
        redirect('data');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['data'] =$this->data_model->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('data', $data);
        $this->load->view('templates/footer');
    }
}

/* End of File Data.php */
/* Location: ./application/controllers/Data.php */

