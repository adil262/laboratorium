<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (null == $this->session->level) {
            redirect('auth');
        } else {
            if ($this->session->level != "Kalab") {
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

        $page_data['peminjaman'] = $this->Md_Peminjaman->getByPeminjamanSukses();
        $page_data['ruangan'] = $this->Md_Ruangan->getTotalRuangan();
        $page_data['barang'] = $this->Md_r225->getTotalBarang();
        $page_data['request'] = $this->Md_Peminjaman->getTotalRequest();
        $page_data['paktif'] = $this->Md_Peminjaman->getTotalPeminjaman();
        $page_data['riwayat_peminjaman'] = $this->Md_Peminjaman->getPeminjamanByUser($id_user, $config['per_page'], $page_data['start']);

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('dashboard/index', $page_data);
        $this->load->view('templates/include_footer');
    }
}
