<?php
/**
 * 
 */
class Profil extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_profil');
	}
	function index()
	{
		$data['title'] = "Form Profil";
		$data['sub_title'] = "Tambah Data Profil";
		$isi['error'] = null;
		$data['content'] = $this->load->view('User/profile', $data, TRUE);
		$this->load->view('layout/main', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function getuser()
		{
			
			$user = $this->session->userdata("username");
			$old = $this->input->post('oldpass');
			$new = $this->input->post('newpass');
			$renew = $this->input->post('repass');  
		}
}