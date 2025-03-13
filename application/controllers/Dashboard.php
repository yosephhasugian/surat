<?php
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	
	}
	function index()
	{
		$data['surat_masuk'] = $this->Dashboard_model->get_surat_masuk();
        $data['surat_keluar'] = $this->Dashboard_model->get_surat_keluar();
        $data['paparan'] = $this->Dashboard_model->get_paparan();
        $data['dokumentasi'] = $this->Dashboard_model->get_dokumentasi();

        // Ambil data statistik bulanan
		$data['statistik_surat_masuk'] = $this->Dashboard_model->get_statistik_surat_masuk();
		$data['statistik_surat_keluar'] = $this->Dashboard_model->get_statistik_surat_keluar();
		$data['statistik_paparan'] = $this->Dashboard_model->get_statistik_paparan();
		$data['statistik_dokumentasi'] = $this->Dashboard_model->get_statistik_dokumentasi();

		$data['title'] = "Dashboard";
        $data['content'] = $this->load->view('dashboard', $data, TRUE);
        $this->load->view('layout/main', $data);
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}