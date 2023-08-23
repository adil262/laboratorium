<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Kalab extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getByKalabid($id_kalab)
    {
        $query = $this->db->get_where('kalab', array('id_kalab' => $id_kalab));
        return $query->row();
    }

    public function getUser()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function getkalab($limit, $start)
    {
        $this->db->select('kalab.*, user.*');
        $this->db->from('kalab');
        $this->db->join('user', 'kalab.id_user = user.id_user');
        $this->db->where('kalab.is_active', 1);
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function add($data)
    {
        $this->db->insert('kalab', $data);
        return $this->db->insert_id();
    }

    public function updateLevel($id_user, $data_level)
    {
        $this->db->where('id_user', $id_user);
        $this->db->set('level', $data_level);
        $this->db->update('user');
    }

    public function update($id_kalab, $data)
    {
        $this->db->where('id_kalab', $id_kalab);
        $this->db->update('kalab', $data);
    }

    public function deletedata($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function countKalab()
    {
        $this->db->select('kalab.*, user.*');
        $this->db->from('kalab');
        $this->db->join('user', 'kalab.id_user = user.id_user');
        return $this->db->get()->num_rows();
    }
}
