<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_masuk_Model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		// Pastikan model di-load
		$this->load->model('Surat_masuk_Model'); 
		
		// Buat variabel $data yang akan dikirim ke view
		$data['title'] = "Form Surat Keluar";
		$data['sub_title'] = "Tambah Data Surat_masuk";
		$data['Surat_masuk'] = $this->Surat_masuk_Model->getdata()->result_array();

		// Pastikan view menerima data dengan benar
		$data['content'] = $this->load->view('Surat_masuk/index', $data, TRUE);

		// Load layout utama
		$this->load->view('layout/main', $data);
	}

    public function tampil($id = null)
	{
		$data['title'] = "Surat Keluar";
		$data['sub_title'] = "Tambah Data Surat Keluar";
		$data['Surat_masuk'] = $this->Surat_masuk_Model->getdata()->result_array();
		

		$data['content'] = $this->load->view('Surat_masuk/index', $data, TRUE);
		$this->load->view('layout/main', $data);
	}

    public function tambah()
    {
        $data['title'] = "Surat Keluar";
        $data['sub_title'] = "Tambah Data Surat Keluar";
     
        $data['content'] = $this->load->view('Surat_masuk/form-tambah', $data, TRUE);

        $this->load->view('layout/main', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('lampiran', 'Lampiran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'hal' => $this->input->post('hal', TRUE),
                'lampiran' => $this->input->post('lampiran', TRUE),
              
                'tanggal' => $this->input->post('tanggal', TRUE),
            ];

            // Proses Upload File
            if (!empty($_FILES['berkas']['name'])) {
                $data['berkas'] = $this->_upload_file();
            }

            // Simpan ke database
            $this->Surat_masuk_Model->add($data);
            redirect('Surat_masuk');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Surat Keluar";
        $data['sub_title'] = "Edit Data Surat Keluar";
        $data['Surat_masuk'] = $this->Surat_masuk_Model->getdata($id)->row();
        $data['jenis'] = $this->Surat_masuk_Model->getJenis()->result_array();
        $data['content'] = $this->load->view('Surat_masuk/form-edit', $data, TRUE);

        $this->load->view('layout/main', $data);
    }

    public function proses_edit($id)
    {
        $data = [
            'hal' => $this->input->post('hal', TRUE),
            'lampiran' => $this->input->post('lampiran', TRUE),
            'id_jenis' => $this->input->post('id_jenis', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
        ];

        // Jika ada file yang diupload
        if (!empty($_FILES['berkas']['name'])) {
            $data['berkas'] = $this->_upload_file();
        }

        $this->Surat_masuk_Model->update($id, $data);
        redirect('Surat_masuk');
    }

    private function _upload_file()
    {
        $config['upload_path'] = './uploads/Surat_masuk/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|png|jpeg';
        $config['max_size'] = 2048; // Maksimal 2MB
        $config['file_name'] = "Surat_masuk_" . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('Surat_masuk');
        }

        return $this->upload->data('file_name');
    }

    public function hapus($id)
    {
        $this->Surat_masuk_Model->getHapus($id);
        redirect('Surat_masuk');
    }
}
?>
