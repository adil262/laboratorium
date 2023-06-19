<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Auth extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user')->result_array();
    }

    public function getByWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function add($table, $array)
    {
        return $this->db->insert($table, $array);
    }

    public function updateByWhere($table, $array, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $array);
    }

    public function deleteByWhere($table, $where)
    {
        return $this->db->delete($table, $where);
    }
}
