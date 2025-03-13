<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_surat_masuk() {
		$this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->get('tb_surat_masuk')->result();
    }

    public function get_surat_keluar() {
		$this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->get('tb_surat_keluar')->result();
    }

    public function get_paparan() {
		$this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->get('tb_paparan')->result();
    }

    public function get_dokumentasi() {
		$this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->get('tb_dokumentasi')->result();
    }

    public function get_statistik_surat_masuk()
		{
		$this->db->select('MONTH(tanggal) AS bulan, COUNT(id_surat) AS total');
		$this->db->where('YEAR(tanggal)', date('Y')); // Ambil data hanya tahun ini
		$this->db->group_by('MONTH(tanggal)');
		$this->db->order_by('MONTH(tanggal)', 'ASC');
		return $this->db->get('tb_surat_masuk')->result();
	}
	
	public function get_statistik_surat_keluar() {
		$this->db->select('MONTH(tanggal) AS bulan, COUNT(id_surat) AS total');
		$this->db->where('YEAR(tanggal)', date('Y')); // Ambil data hanya tahun ini
		$this->db->group_by('MONTH(tanggal)');
		$this->db->order_by('MONTH(tanggal)', 'ASC');
		return $this->db->get('tb_surat_keluar')->result();
	}
	
	public function get_statistik_paparan() {
		$this->db->select('MONTH(tanggal) AS bulan, COUNT(id_paparan) AS total');
		$this->db->where('YEAR(tanggal)', date('Y')); // Ambil data hanya tahun ini
		$this->db->group_by('MONTH(tanggal)');
		$this->db->order_by('MONTH(tanggal)', 'ASC');
		return $this->db->get('tb_paparan')->result();
	}
	
	public function get_statistik_dokumentasi() {
		$this->db->select('MONTH(tanggal) AS bulan, COUNT(id_dokumentasi) AS total');
		$this->db->where('YEAR(tanggal)', date('Y')); // Ambil data hanya tahun ini
		$this->db->group_by('MONTH(tanggal)');
		$this->db->order_by('MONTH(tanggal)', 'ASC');
		return $this->db->get('tb_dokumentasi')->result();
	}

	public function get_all_surat_masuk() {
        return $this->db->get('tb_surat_masuk')->result();
    }

	public function get_all_surat_keluar() {
        return $this->db->get('tb_surat_keluar')->result();
    }

	public function get_all_paparan() {
        return $this->db->get('tb_paparan')->result();
    }

	public function get_all_dokumentasi() {
        return $this->db->get('tb_dokumentasi')->result();
    }

	public function get_data_periode($awal, $akhir) {
		$this->db->where('tanggal >=', $awal);
		$this->db->where('tanggal <=', $akhir);
		return $this->db->get('tb_dokumentasi')->result_array(); // Sesuaikan dengan nama tabel yang benar
	}

	

}
