<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Ruangan extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getByPeminjamanid($id)
    {
        $query = $this->db->get_where('ruangan', array('id_ruangan' => $id));
        return $query->row();
    }
    public function getRuangan()
    {
        $this->db->select('ruangan.*, asistenlab.*,');
        $this->db->from('ruangan');
        $this->db->join('asistenlab', 'ruangan.id_ail = asistenlab.id_ail');
        return $this->db->get()->result_array();
    }
    public function getAll()
    {
        return $this->db->get('data_barang')->result_array();
    }
    public function getIdRuangan()
    {
        $this->db->select('data_barang.*, ruangan.*,');
        $this->db->from('data_barang');
        $this->db->where('ruangan.status_ruangan', "Tersedia");
        $this->db->where('data_barang.status_barang', "Tersedia");
        $this->db->join('ruangan', 'data_barang.id_ruangan = ruangan.id_ruangan');
        return $this->db->get()->result_array();
    }
    public function getRuanganwithadd()
    {
        $this->db->select('ruangan.*');
        $this->db->from('ruangan');
        $this->db->where('status_ruangan = "Tersedia"');
        return $this->db->get()->result_array();
    }

    public function getTotalRuangan()
    {
        $query = $this->db->select_sum('is_active')->get('ruangan');
        return $query->row()->is_active;
    }
}
