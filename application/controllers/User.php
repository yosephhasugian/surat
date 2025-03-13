<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function index()
    {
        $session = $this->session->userdata('status');

        if ($session == '') {
            $this->load->view('login');
        } else {
            redirect('Dashboard');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('password'));

            $data = $this->User_Model->login($username, $password);

            if ($data == false) {
                $this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
                redirect('User');
            } else {
                $session = [
                    'userdata' => $data,
                    'status' => "Loged in",
                    'user_id' => $data->id,
                    'username' => $data->username
                ];
                $this->session->set_userdata($session);
                redirect('Dashboard');
            }
        } else {
            $this->session->set_flashdata('error_msg', validation_errors());
            redirect('User');
        }
    }
}
?>