<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Lab_pemrograman extends CI_model
{
    public function getAll()
    {
        return $this->db->get('data_barang')->result_array();
    }
    public function getByLabpemrogramanid($id_lab)
    {
        $query = $this->db->get_where('data_barang', array('id_lab' => $id_lab))->result_array();
        return $query->row();
    }
    public function add($data)
    {
        $this->accesscontrol->grantForAccess('Kajur');
        $this->db->insert('data_barang', $data);
        return $this->db->insert_id();
    }
    public function updateByLabpemrograman($id_lab, $data)
    {
        $this->db->where('id_lab', $id_lab);
        $this->db->update('data_barang', $data);
    }
    public function deleteByLabpemrograman($id_lab)
    {
        $this->db->where('id_lab', $id_lab);
        $this->db->delete('data_barang');
    }
    public function getId1()
    {
        $this->db->distinct();
        $this->db->select('data_barang.*, ruangan.*');
        $this->db->from('data_barang');
        $this->db->join('ruangan', 'data_barang.id_ruangan = ruangan.id_ruangan');
        $this->db->where('data_barang.id_ruangan = 1');
        return $this->db->get()->result_array();
    }

    public function getTotalBarang()
    {
        $this->db->select('count(id_lab) as total_barang');
        $query = $this->db->get('data_barang');
        $result = $query->row();

        return $totalBarang = $result->total_barang;
    }
}
