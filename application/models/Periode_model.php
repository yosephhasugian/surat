<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {

    public function get_data($tabel, $tgl_awal = null, $tgl_akhir = null) {
        // Gunakan nama tabel yang diberikan oleh controller
        $nama_tabel = 'tb_' . $tabel;

        if ($tgl_awal && $tgl_akhir) {
            $this->db->where('tanggal >=', $tgl_awal); // Asumsi ada kolom 'tanggal'
            $this->db->where('tanggal <=', $tgl_akhir);
        }
        return $this->db->get($nama_tabel)->result();
    }
}