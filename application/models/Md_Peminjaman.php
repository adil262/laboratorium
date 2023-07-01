<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Peminjaman extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getPeminjaman()
    {
        $this->db->select('peminjaman.*, ruangan.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('ruangan', 'peminjaman.id_ruangan = ruangan.id_ruangan');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        return $this->db->get()->result_array();
    }

    public function add($data)
    {
        // Simpan data peminjaman ke tabel peminjaman
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }
    public function addPeminjamanLab($data_peminjaman)
    {
        // Simpan data peminjaman ke tabel peminjaman

        $this->db->insert('peminjaman_barang',  $data_peminjaman);
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

    public function updateStatus($id_peminjaman, $status_peminjaman, $status_barang)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->set('status', $status_peminjaman);
        $this->db->update('peminjaman');

        $this->db->where('id_lab', $id_peminjaman);
        $this->db->set('status_barang', $status_barang);
        $this->db->update('data_barang');
    }

    public function getRuangan()
    {
        return $this->db->get('ruangan')->result_array();
    }

    public function getdatauser($id_ruangan)
    {
        $this->db->select('ruangan.*, user.*');
        $this->db->from('ruangan');
        $this->db->join('user', 'user.id_user = ruangan.id_user');
        $this->db->where('id_ruangan', $id_ruangan);
        return $this->db->get()->result_array();
    }

    public function getdatabarang($id_ruangan)
    {
        $query = $this->db->query("SELECT id_lab, no_barang FROM data_barang WHERE id_ruangan = '$id_ruangan'");
        return $query->result();
    }

    public function getLevel()
    {
        return $this->db->get('level')->result_array();
    }
}
