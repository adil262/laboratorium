<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Lab_database extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('data_barang')->result_array();
    }
    public function getId1()
    {
        $this->db->distinct();
        $this->db->select('data_barang.*,'); // Ganti 'column_name' dengan kolom yang ingin Anda tampilkan
        $this->db->where('id_ruangan = 2');
        $query = $this->db->get('data_barang'); // Ganti 'projects' dengan nama tabel Anda
        return $query->result_array();
    }
    public function add($data)
    {
        $this->accesscontrol->grantForAccess('Kajur');
        $this->db->insert('data_barang', $data);
        return $this->db->insert_id();
    }
}
