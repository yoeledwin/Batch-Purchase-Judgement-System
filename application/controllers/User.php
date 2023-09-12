<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }
    public function index()
    {
        $this->register();
    }

    public function register()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        
        $this->form_validation->set_rules('firstname','First Name', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('lastname','Last Name', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');

        $data['title'] = 'Register';

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/headerr', $data);
            $this->load->view('user/register');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($this->user_model->set_user())
            {
                $this->session->set_flashdata('msg_success','Registration Successful!');
                redirect('data');
            }
            else
            {
                $this->session->set_flashdata('msg_error','Error! Please try again later.');
                redirect('data');
            }
        }
    }

    public function login()
    {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('nik','trim|required|max:16');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $data['title'] = 'Login';

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        }
        else
        {
            if ($user = $this->user_model->get_user_login($nik, $password))
            {
                // *$user_data ='array(
                //     'email' => $email,
                //     'is_logged_in' => true
                // );
                // $this->session->set_userdata($user_data);*/
                $this->session->set_userdata('nik', $nik);
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('is_logged_in', true);

                $this->session->set_flashdata('msg_success','Login Successful!');
                redirect('data');
            }
            else
            {
                $this->session->set_flashdata('msg_error','Login credentials does not match!');

                $currentClass = $this->router->fetch_class(); // class = controller
                $currentAction = $this->router->fetch_method(); // action = function

                redirect("$currentClass/$currentAction");
                //redirect('user/login');
            }
        }
    }
    public function logout()
    {
        if ($this->session->userdata('is_logged_in')) {
            //$this->session->unset_userdata(array('email' => '', 'is_logged_in' => ''));
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('user_id');
            }
        redirect('data');
    }
}