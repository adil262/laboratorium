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
    public function getRuangan($limit, $start)
    {
        $this->db->select('ruangan.*, ail.*, user.*');
        $this->db->from('ruangan');
        $this->db->join('ail', 'ruangan.id_ail = ail.id_ail');
        $this->db->join('user', 'ail.id_user = user.id_user');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }
    public function graph()
    {
        $this->db->select('ruangan.*');
        $this->db->from('ruangan');
        return $this->db->get()->result_array();
    }

    public function getAil()
    {
        $this->db->select('ail.*, user.*');
        $this->db->from('ail');
        $this->db->join('user', 'ail.id_user = user.id_user');
        return $this->db->get()->result_array();
    }

    public function getKalab()
    {
        $this->db->select('kalab.*, user.*');
        $this->db->from('kalab');
        $this->db->join('user', 'kalab.id_user = user.id_user');
        return $this->db->get()->result_array();
    }

    public function add($data)
    {
        $this->db->insert('ruangan', $data);
        return $this->db->insert_id();
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
        $this->db->select('count(id_ruangan) as total_ruangan');
        $query = $this->db->get('ruangan');
        $result = $query->row();

        return $totalRuangan = $result->total_ruangan;
    }

    public function countRuangan()
    {
        $this->db->select('ruangan.*, ail.*');
        $this->db->from('ruangan');
        $this->db->join('ail', 'ruangan.id_ail = ail.id_ail');
        return $this->db->get()->num_rows();
    }
}
