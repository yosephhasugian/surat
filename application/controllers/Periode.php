<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; // Panggil autoload Composer

use Dompdf\Dompdf;
use Dompdf\Options;

class Periode extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('Periode_model');
		$this->load->library('pdf');

	}
	function index()
	{
		
		$data['title'] = "Dashboard";
        $data['content'] = $this->load->view('rekap/cetak_periode', $data, TRUE);
        $this->load->view('layout/main', $data);
    }

    public function laporan($tabel) {
        $data['data'] = $this->Periode_model->get_data($tabel); // Gunakan model Periode_model
        $data['tabel'] = $tabel; // Kirim variabel $tabel ke view
        $this->load->view('rekap/laporan', $data); // Gunakan view laporan
    }

    public function cetakperiode($tabel, $tgl_awal, $tgl_akhir) {
        $data['data'] = $this->Periode_model->get_data($tabel, $tgl_awal, $tgl_akhir); // Gunakan model Periode_model
        $data['tabel'] = $tabel; // Kirim variabel $tabel ke view
        $this->load->view('rekap/laporan', $data); // Gunakan view laporan
    }

}