<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->template->load('layouts/template', 'welcome_message');
	}

	public function get_pis()
	{
		$date = $this->input->get('date');
		$date = (empty($date) ? date('Y-m-d'): $date);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.terminalpulogebang.com/pis-baru?date=". $date,
	#	CURLOPT_URL => "http://Localhost/API-TTPG/pis-baru?date=". $date,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"X-TTPG-KEY: e10adc3949ba59abbe56e057f20f883e"
		),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$hasil = json_decode($response);
		header('Content-Type: application/json');
		echo json_encode($hasil);
	}

	function email(){
		$to = $this->input->post('email');
		$name = $this->input->post('name');
		$tentang = $this->input->post('subject');
		$teks = $this->input->post('message');
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'morait.test@gmail.com',
			'smtp_pass' => 'Test123@',
			'smtp_port' => 465,
			'crlf'      => "\r\n",
			'newline'   => "\r\n",
			'useragent'=> 'Website TTPG'
		];
		$b = '<p>Email FROM <strong>'. $name .'</strong></p>
				<p>Email: '. $to .'</p>
				<p>'. $teks .'</p>';
		$this->load->library('email', $config);
		$this->email->from($to, $name);
		$this->email->subject('[Web TTPG] '. $tentang);
		$this->email->message($b);
		$this->email->to('info@terminalpulogebang.com');
		if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
	}
}
