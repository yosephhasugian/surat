<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; // Panggil autoload Composer

use Dompdf\Dompdf;
use Dompdf\Options;

class Rekap extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('Dashboard_model');
		$this->load->library('pdf');

	}
	function index()
	{
		
		$data['subJudul'] = "Data Surat Masuk";
		$data['subJudul1'] = "Data Surat Keluar";
		$data['subJudul2'] = "Data Paparan";
		$data['subJudul3'] = "Data Dokumentasi";

		$data['title'] = "Dashboard";
        $data['content'] = $this->load->view('rekap/surat', $data, TRUE);
        $this->load->view('layout/main', $data);
    }

	public function laporan_surat_masuk() {
        $data['surat_masuk'] = $this->Dashboard_model->get_all_surat_masuk();

        // Load tampilan laporan sebagai HTML
        $html = $this->load->view('laporan', $data, TRUE);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        // Buat instance Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Ukuran dan orientasi halaman
        $dompdf->render();

        // Tampilkan atau download PDF
        $dompdf->stream("Laporan_Surat_Masuk.pdf", array("Attachment" => 0)); // 1 untuk download otomatis
    }

	public function laporan_surat_keluar() {
        $data['surat_keluar'] = $this->Dashboard_model->get_all_surat_keluar();

        // Load tampilan laporan sebagai HTML
        $html = $this->load->view('laporan_keluar', $data, TRUE);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        // Buat instance Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Ukuran dan orientasi halaman
        $dompdf->render();

        // Tampilkan atau download PDF
        $dompdf->stream("Laporan_Surat_Keluar.pdf", array("Attachment" => 0)); // 1 untuk download otomatis
    }

	public function laporan_paparan() {
        $data['paparan'] = $this->Dashboard_model->get_all_paparan();

        // Load tampilan laporan sebagai HTML
        $html = $this->load->view('laporan_paparan', $data, TRUE);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        // Buat instance Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Ukuran dan orientasi halaman
        $dompdf->render();

        // Tampilkan atau download PDF
        $dompdf->stream("Laporan_paparan.pdf", array("Attachment" => 0)); // 1 untuk download otomatis
    }
	public function laporan_dokumentasi() {
        $data['dokumentasi'] = $this->Dashboard_model->get_all_dokumentasi();

        // Load tampilan laporan sebagai HTML
        $html = $this->load->view('laporan_dokumentasi', $data, TRUE);

        // Konfigurasi Dompdf
		$options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        // Buat instance Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Ukuran dan orientasi halaman
        $dompdf->render();

        // Tampilkan atau download PDF
        $dompdf->stream("Laporan_dokumentasi.pdf", array("Attachment" => 0)); // 1 untuk download otomatis
    }


	public function cetakperiode() {
		
		// Pastikan form dikirim dengan metode POST
		$awal = $this->input->post('tglawal', TRUE); // TRUE untuk sanitasi input
		$akhir = $this->input->post('tglakhir', TRUE);

		// Cek apakah input kosong
		if (empty($awal) || empty($akhir)) {
			show_error("Tanggal awal dan akhir harus diisi!");
			return;
		}
		$data['dokumentasi'] = $this->Dashboard_model->get_data_periode($awal, $akhir);

        // Load tampilan laporan sebagai HTML
        $html = $this->load->view('laporan_periode', $data, TRUE);

        // Konfigurasi Dompdf
		$options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        // Buat instance Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Ukuran dan orientasi halaman
        $dompdf->render();

        // Tampilkan atau download PDF
        $dompdf->stream("Laporan_Surat_Masuk.pdf", array("Attachment" => 0)); // 1 untuk download otomatis
	}
}