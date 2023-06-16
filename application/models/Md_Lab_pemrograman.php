<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Lab_pemrograman extends CI_model
{
    public function getAll()
    {
        return $this->db->get('data_barang')->result_array();
    }
    public function getByLabpemrogramanid($id)
    {
        $query = $this->db->get_where('data_barang', array('id' => $id))->result_array();
        return $query->row();
    }
    public function add($data)
    {
        $this->accesscontrol->grantForAccess('Kajur');
        $this->db->insert('data_barang', $data);
        return $this->db->insert_id();
    }
    public function updateByLabpemrograman($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('data_barang', $data);
    }
    public function deleteByLabpemrograman($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_barang');
    }
    public function getId1()
    {
        $this->db->distinct();
        $this->db->select('data_barang.*,'); // Ganti 'column_name' dengan kolom yang ingin Anda tampilkan
        $this->db->where('id_ruangan = 1');
        $query = $this->db->get('data_barang'); // Ganti 'projects' dengan nama tabel Anda
        return $query->result_array();
    }
}
