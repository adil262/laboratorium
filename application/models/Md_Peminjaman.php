<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Md_Peminjaman extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getByPeminjamanid($id)
    {
        $query = $this->db->get_where('peminjaman', array('id_peminjaman' => $id));
        return $query->row();
    }
    public function add($data)
    {
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }

    public function updateByLabpemrograman($id, $data)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->update('peminjaman', $data);
    }

    public function deleteByLabpemrograman($id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('peminjaman');
    }
    public function getPeminjaman()
    {
        $this->db->select('peminjaman.*, ruangan.*, user.*');
        $this->db->from('peminjaman');
        $this->db->join('ruangan', 'peminjaman.id_ruangan = ruangan.id_ruangan');
        $this->db->join('user', 'peminjaman.id_user = user.id_user');
        return $this->db->get()->result_array();
    }
    public function getRuangan()
    {
        $this->db->select('ruangan.*, asistenlab.*,');
        $this->db->from('ruangan');
        $this->db->join('asistenlab', 'ruangan.id_ail = asistenlab.id_ail');
        return $this->db->get()->result_array();
    }
    public function getIdRuangan()
    {
        $id_ruangan = $this->input->get('id_ruangan'); // Mengambil nilai parameter ID Ruangan dari URL
        $this->db->distinct();
        // Mengambil data barang berdasarkan ID Ruangan
        $this->db->select('data_barang.*, ruangan.*');
        $this->db->from('data_barang');
        // $this->db->where('ruangan.id_ruangan', $id_ruangan);
        $this->db->join('ruangan', 'data_barang.id_ruangan = ruangan.id_ruangan');
        return $this->db->get()->result_array();
    }
    public function getIdRuangan1()
    {
        $query = $this->db->select('r.no_ruangan, r.nama_ruangan, r.status_ruangan, r.id_ruangan, a.nama, d.no_barang')
            ->from('ruangan r')
            ->join('data_barang d', 'd.id_ruangan = r.id_ruangan', 'left')
            ->join('asistenlab a', 'a.id_ail = r.id_ail')
            ->group_by('r.id_ruangan')
            ->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach ($result as $row) {
                $no_ruangan = $row['no_ruangan'];
                $nama_ruangan = $row['nama_ruangan'];
                $no_barang = $row['no_barang'];

                return $result;
            }
        } else {
            // Tidak ada data yang ditemukan
        }
    }
    public function getIdR()
    {
        $this->db->select('ruangan.*, data_barang.*');
        $this->db->from('ruangan');
        $this->db->join('data_barang', 'ruangan.id_ruangan = data_barang.id_ruangan');
        return $this->db->get()->result_array();
    }
}
