<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Ail extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getByAilid($id_ail)
    {
        $query = $this->db->get_where('ail', array('id_ail' => $id_ail));
        return $query->row();
    }

    public function getUser()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('level', "Peminjam");
        return $this->db->get()->result_array();
    }

    public function getAil($limit, $start)
    {
        $this->db->select('ail.*, user.*');
        $this->db->from('ail');
        $this->db->join('user', 'ail.id_user = user.id_user');
        $this->db->where('ail.is_active', 1);
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function add($data)
    {
        $this->db->insert('ail', $data);
        return $this->db->insert_id();
    }

    public function updateLevel($id_user, $data_level)
    {
        $this->db->where('id_user', $id_user);
        $this->db->set('level', $data_level);
        $this->db->update('user');
    }

    public function update($id_ail, $data)
    {
        $this->db->where('id_ail', $id_ail);
        $this->db->update('ail', $data);
    }

    public function deletedata($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function countAil()
    {
        $this->db->select('ail.*, user.*');
        $this->db->from('ail');
        $this->db->join('user', 'ail.id_user = user.id_user');
        return $this->db->get()->num_rows();
    }
}
