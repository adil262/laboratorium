<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Peminjaman extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // Peminjaman
    public function getPeminjaman()
    {
        $this->db->select('peminjaman.*, ruangan.*, user.*, level.*');
        $this->db->from('peminjaman');
        $this->db->join('ruangan', 'peminjaman.id_ruangan = ruangan.id_ruangan');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        $this->db->join('level', 'peminjaman.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function add($data)
    {
        // Simpan data peminjaman ke tabel peminjaman
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }


    public function getByPeminjamanId($id_peminjaman)
    {
        // Ambil data peminjaman berdasarkan id_peminjaman
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->get('peminjaman')->row_array();
    }

    public function update($id_peminjaman, $approval_column, $status)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->set($approval_column, $status);
        $this->db->update('peminjaman');
    }

    public function updateStatus($id_peminjaman, $status_peminjaman)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->set('status', $status_peminjaman);
        $this->db->update('peminjaman');
    }

    // // Peminjaman Barang
    public function addPeminjamanLab($data_peminjaman)
    {
        // Simpan data peminjaman ke tabel peminjaman
        $this->db->insert('peminjaman_barang',  $data_peminjaman);
        return $this->db->insert_id();
    }

    public function updateStatusBarang($id_peminjaman)
    {
        $this->db->select('data_barang.id_lab');
        $this->db->from('peminjaman_barang');
        $this->db->join('peminjaman', 'peminjaman_barang.id_peminjaman = peminjaman.id_peminjaman');
        $this->db->join('data_barang', 'data_barang.id_lab = peminjaman_barang.id_lab');
        $this->db->where('peminjaman_barang.id_peminjaman', $id_peminjaman);
        return $this->db->get()->result_array();
        // $this->db->set('data_barang.status_barang', $status_barang);
    }

    // Data Barang
    public function updateStatusData($id_peminjaman, $status_barang)
    {
        $this->db->where('id_lab', $id_peminjaman);
        $this->db->set('status_barang', $status_barang);
        $this->db->update('data_barang');
    }

    //Ruangan
    public function getRuangan()
    {
        // Ambil data peminjaman berdasarkan id_peminjaman
        return $this->db->get('ruangan')->result_array();
    }

    // Get Data
    public function getdatauser($id_ruangan)
    {
        $this->db->select('ail.*, user.*');
        $this->db->from('ail');
        $this->db->join('user', 'user.id_user = ail.id_user');
        $this->db->where('id_ail', $id_ruangan);
        return $this->db->get()->result_array();
    }

    public function getdatabarang($id_ruangan)
    {
        $this->db->select('data_barang.*,'); // Ganti 'column_name' dengan kolom yang ingin Anda tampilkan
        $this->db->where('status_barang = "Tersedia"');
        $this->db->where('id_ruangan', $id_ruangan);
        $query = $this->db->get('data_barang'); // Ganti 'projects' dengan nama tabel Anda
        return $query->result_array();
    }

    public function getLevel()
    {
        return $this->db->get('level')->result_array();
    }
}
