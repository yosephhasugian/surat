<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    // Listing semua data konfigurasi
    public function listing() {
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $query = $this->db->get();
        return $query->row(); // Mengembalikan satu baris hasil query
    }

    // Detail data konfigurasi (berdasarkan ID)
    public function detail($id_konfigurasi) {
        $this->db->select('*');
        $this->db->from('konfigurasi');
        $this->db->where('id', $id_konfigurasi);
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data konfigurasi
    public function tambah($data) {
        $this->db->insert('konfigurasi', $data);
    }

    // Edit data konfigurasi
    public function edit($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('konfigurasi', $data);
    }

    // Hapus data konfigurasi
    public function delete($data) {
        $this->db->where('id', $data['id']);
        $this->db->delete('konfigurasi', $data);
    }
}