<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_Peminjaman');
        $this->load->model('Md_Ruangan');
    }

    public function index()
    {
        $page_data['page_title'] = "Daftar Peminjaman";
        $page_data['page_judul'] = 'Tambah Data Peminjaman';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;

        $page_data['peminjaman'] = $this->Md_Peminjaman->getPeminjaman();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();
        $page_data['ruangan2'] = $this->Md_Ruangan->getRuanganwithadd();

        $page_data['barang'] = $this->Md_Peminjaman->getIdRuangan1();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/include_header', $page_data);
            $this->load->view('templates/include_topbar', $page_data);
            $this->load->view('templates/include_sidebar', $page_data);
            $this->load->view('peminjaman/index', $page_data);
            $this->load->view('templates/include_footer');
        } else {
        }
    }
    public function riwayat()
    {
        $page_data['page_title'] = "Riwayat Peminjaman";
        $page_data['page_judul'] = 'Tambah Data Peminjaman';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;

        $page_data['peminjaman'] = $this->Md_Peminjaman->getPeminjaman();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('peminjaman/riwayat', $page_data);
        $this->load->view('templates/include_footer');
    }
}
