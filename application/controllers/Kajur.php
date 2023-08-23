<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kajur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (null == $this->session->level) {
            redirect('auth');
        } else {
            if ($this->session->level != "Kajur") {
                redirect('auth', 'refresh');
            }
        }
        $this->load->model('Md_Peminjaman');
        $this->load->model('Md_Ruangan');
        $this->load->model('Md_r225');
    }
    public function index()
    {
        $page_data['page_title'] = 'Dashboard';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $id_user = $this->session->userdata('id_user');

        if (!$id_user) {
            // Jika tidak ada ID user dalam sesi, mungkin pengguna belum login
            // Lakukan aksi sesuai kebijakan Anda, misalnya arahkan ke halaman login
            // ...
            return;
        }

        $page_data['peminjaman'] = $this->Md_Peminjaman->getByPeminjamanSukses();
        $page_data['ruangan'] = $this->Md_Ruangan->getTotalRuangan();
        $page_data['barang'] = $this->Md_r225->getTotalBarang();
        $page_data['request'] = $this->Md_Peminjaman->getTotalRequest();
        $page_data['paktif'] = $this->Md_Peminjaman->getTotalPeminjaman();
        $page_data['riwayat_peminjaman'] = $this->Md_Peminjaman->getPeminjamanByUser2($id_user);
        $page_data['graph'] = $this->Md_Ruangan->graph();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('dashboard/index', $page_data);
        $this->load->view('templates/include_footer');
    }
}
