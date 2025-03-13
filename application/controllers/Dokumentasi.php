<?php
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Dokumentasi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dokumentasi_Model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		 $this->load->model('Dokumentasi_Model'); // Pastikan model di-load
		 $data['title'] = "Form Dokumentasi";
		 $data['sub_title'] = "Tambah Data Dokumentasi";
		 $data['dokumentasi'] = $this->Dokumentasi_Model->getdata()->result_array();


		 $data['content'] = $this->load->view('dokumentasi/index', $data, TRUE);

		 // Load layout utama
		 $this->load->view('layout/main', $data);
	}

	public function tampil($id = null)
	{
		$data['title'] = "Dokumentasi";
		$data['sub_title'] = "Tambah Data Dokumentasi";
		
		// Jika $id ada, ambil data spesifik, jika tidak ambil semua
		if ($id) {
			$data['dokumentasi'] = $this->Dokumentasi_Model->getdata($id)->result_array();
		} else {
			$data['dokumentasi'] = $this->Dokumentasi_Model->getdata()->result_array();
		}

		$data['content'] = $this->load->view('dokumentasi/index', $data, TRUE);
		$this->load->view('layout/main', $data);
	}

	public function tambah()
	{

		$data['title'] = "Dokumentasi";
        $data['sub_title'] = "Tambah Data Dokumentasi";
		

		 $data['content'] = $this->load->view('Dokumentasi/form-tambah', $data, TRUE);

        $this->load->view('layout/main', $data);
	}
	public function simpan()
	{
			$this->form_validation->set_rules('lampiran', 'hal', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('okumentasi/index');
			}else{
				
				//get the form values
				$data['hal'] = $this->input->post('hal', TRUE);
				$data['lampiran'] = $this->input->post('lampiran', TRUE);
				$data['tanggal'] = $this->input->post('tanggal', TRUE);

					$filenye	= "file_" . time();
					$config['upload_path'] = './uploads/dokumentasi/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
					$config['max_size'] = '0';
					$config['max_width'] = '0'; 
					$config['max_height'] = '0';
					$config['file_name'] = $filenye;
					//$config['gambar'] = $_FILES['gambar']['nama'];
					//$config['berkas'] = $berkas;

					$this->load->library('upload', $config);
					
					
					if ( ! $this->upload->do_upload('berkas')){
						$error = array('error' => $this->upload->display_errors());
						redirect('Dokumentasi');
					}else{

						//file is uploaded successfully
						//now get the file uploaded data 
						$upload_data = $this->upload->data();

						//get the uploaded file name
						$data['berkas'] = $upload_data['file_name'];

						//store pic data to the db
						$this->Dokumentasi_Model->add($data);

						redirect('Dokumentasi');
					}

					}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$query = $this->Dokumentasi_Model->getdata($id);
		$isi['content'] = "surat/form-edit";
		$isi['judul']   = "Surat";
		$isi['subJudul']= "Edit surat 11";
		$jenis = $this->Dokumentasi_Model->getJenis();
		$isi['jenis'] = $jenis->result_array();
		$isi['data']    = $query->row();
		$this->load->view('index',$isi);
	}

	public function proses_edit()
	{
		$id = $this->uri->segment(3);
		$filenye	= "file_" . time();
		$config['upload_path'] = 'uploads/surat_masuk/';
		$config['allowed_types'] = 'pdf|docs|gif|jpg|png|jpeg|bmp'; 
		$config['max_size'] = '2040';
		$config['max_width'] = '1024'; 
		$config['max_height'] = '900';
		$config['file_name'] = $filenye;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		if(!empty($_FILES['berkas']['name'])){
			if($this->upload->do_upload('berkas')){
				$bks = $this->upload->data();
				$berkas = $bks['file_name'];
				$id_data= $this->input->post("id");
				$no_surat = $this->input->post("no_surat");
				 $hal = $this->input->post("hal");
				 $lampiran =  $this->input->post("lampiran");
				 $tujuan = $this->input->post("tujuan");
				 $id_jenis = $this->input->post("id_jenis");
				 $tanggal = $this->input->post("tanggal");

				 $this->Surat_masuk_Model->edit($id_data,$no_surat,$hal,$lampiran,$tujuan,$id_jenis,$tanggal,$berkas);
				 redirect('Dokumentasi');

			}
		//$input = $this->input->post(null, TRUE);
		//$this->Surat_masuk_Model->edit($id_data,$no_surat,$hal,$lampiran,$tujuan,$id_jenis,$tanggal,$id_keterangan,$berkas);
		}
		
	}

	private function _do_upload()
{
	$filenye	= "file_" . time();
	$config['upload_path'] = './uploads/dokumentasi/';
	$config['allowed_types'] = 'pdf|docs|gif|jpg|png|jpeg|bmp'; 
	$config['max_size'] = '1000';
	$config['max_width'] = '1024'; 
	$config['max_height'] = '900';
	$config['file_name'] = $filenye;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
        redirect('Dokumentasi');
    }
    return $this->upload->data('file_name');
}


	public function hapus($id)
	{
	
		$key = $this->uri->segment(3);
		$query = $this->Dokumentasi_Model->getDataById($id);
		$isi['key'] = $query->result_array();
		$this->Dokumentasi_Model->getHapus($key);
	}

	public function rules()
	{
		$this->form_validation->set_rules('berkas', 'Nama File', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	
	}
	
}