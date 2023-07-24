<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_Peminjaman');
        $this->load->model('Md_Ruangan');
        $this->load->model('Md_Auth');
    }

    public function index()
    {
        $page_data['page_title'] = "Riwayat Peminjaman";
        $page_data['page_judul'] = 'Detail Peminjaman';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;
        $page_data['level'] = $this->session->level;

        $page_data['sukses'] = $this->Md_Peminjaman->getByPeminjamanSukses();
        $page_data['proses'] = $this->Md_Peminjaman->getByPeminjamanProses();
        $page_data['selesai'] = $this->Md_Peminjaman->getByPeminjamanSelesai();
        $page_data['ditolak'] = $this->Md_Peminjaman->getByPeminjamanDitolak();
        $page_data['peminjaman'] = $this->Md_Peminjaman->getByPeminjaman();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('riwayat/index', $page_data);
        $this->load->view('templates/include_footer');
    }
}
