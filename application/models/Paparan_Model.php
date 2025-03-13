<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paparan_Model extends CI_Model {
	
	

	public function getdata($kode = null)
	{
		return $this->db->get('tb_Paparan');
		
	}
	public function getDataById($id)
	{
		
		return $this->db->get('tb_Paparan');
	}

	public function add($data)
	{
		$data = array(
			'id_paparan' => null,
			'hal' => $data['hal'],
			'lampiran' => $data['lampiran'],
			'tanggal' => $data['tanggal'],
			'berkas' => $data['berkas'],
		);
		$this->db->set($data);
		$query = $this->db->insert('tb_Paparan',$data);
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
		$this->db->where('id_paparan',$id);
		$query = $this->db->delete('tb_Paparan');
		redirect('Paparan');
	}

	function get_all()
		{
			$this->db->select('*');
			
			$query = $this->db->get('tb_Paparan');
			return $query->result();
		}

	public function getPeriode($awal,$akhir)
	{
		$this->db->select('*');
		$this->db->join('tb_jenis','tb_jenis.id = tb_surat.id_jenis');
		//$this->db->join('tb_kategori','tb_kategori.id = tb_surat.id');
		$this->db->where('tanggal >=', $awal);
		$this->db->where('tanggal <=', $akhir);
		
		$hasil = $this->db->get('tb_Paparan');
		return $hasil;
	}
}
