<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar_Model extends CI_Model {
	
	

	public function getdata($kode = null)
{
    $this->db->select('
        tb_surat_keluar.id_surat,
        tb_surat_keluar.hal,
        tb_surat_keluar.lampiran,
        tb_surat_keluar.tanggal,
        tb_surat_keluar.berkas,
       
    ');

    $this->db->from('tb_surat_keluar'); // Tabel utama
  

    // Jika $kode tidak null, tambahkan filter WHERE
    if ($kode != null) {
        $this->db->where('tb_surat_keluar.id_surat', $kode);
    }

    $hasil = $this->db->get();
			log_message('error', $this->db->last_query()); // Log query untuk debugging
			return $hasil;
			}
	public function getDataById($id)
	{
			return $this->db->get('tb_surat_keluar');
	}
	
	public function add($data)
	{
		$data = array(
			'id_surat' => null,
			'hal' => $data['hal'],
			'lampiran' => $data['lampiran'],
			
			'tanggal' => $data['tanggal'],
			'berkas' => $data['berkas'],
		);
		$this->db->set($data);
		$query = $this->db->insert('tb_surat_keluar',$data);
		if ($query) {
			echo "true";
		}else{
			echo "false";
		}
	}


	public function edit($id_data,$no_surat,$hal,$lampiran,$tujuan,$id_jenis,$tanggal,$berkas)
	{
		
		$query = $this->db->query("UPDATE tb_surat SET no_surat='$no_surat',hal='$hal',lampiran='$lampiran',tujuan='$tujuan',id_jenis='$id_jenis',tanggal='$tanggal',berkas='$berkas' WHERE id_surat='$id_data'");
		//return  $query;
		if ($query) {
			echo "true";
		}else{
			echo "false";
		}
	}
	

	public function getHapus($id)
	{
		$this->db->where('id_surat',$id);
		$query = $this->db->delete('tb_surat_keluar');
		redirect('Surat_keluar');
	}

	function get_all()
		{
			$this->db->select('*');
			$this->db->join('tb_jenis', 'tb_surat_keluar.id_jenis = tb_jenis.id', 'left'); // JOIN dengan tb_jenis
			$this->db->join('tb_kategori', 'tb_surat_keluar.id_keterangan = tb_kategori.id', 'left'); // JOIN dengan tb_kategori
			$query = $this->db->get('tb_surat_keluar');
			return $query->result();
		}

	public function getPeriode($awal,$akhir)
	{
		$this->db->select('*');
		$this->db->join('tb_jenis', 'tb_surat_keluar.id_jenis = tb_jenis.id', 'left'); // JOIN dengan tb_jenis
		$this->db->join('tb_kategori', 'tb_surat_keluar.id_keterangan = tb_kategori.id', 'left'); // JOIN dengan tb_kategori
		$this->db->where('tanggal >=', $awal);
		$this->db->where('tanggal <=', $akhir);
		
		$hasil = $this->db->get('tb_surat_keluar');
		return $hasil;
	}

	
}
