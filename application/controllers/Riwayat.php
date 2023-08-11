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

        $config['base_url'] = 'http://localhost/laboratorium/riwayat/index';
        $config['total_rows'] = $this->Md_Peminjaman->countBarang();
        $config['per_page'] = 10;

        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'first';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page_data['start'] = $this->uri->segment(3);
        $page_data['sukses'] = $this->Md_Peminjaman->getByPeminjamanSukses($config['per_page'], $page_data['start']);
        $page_data['proses'] = $this->Md_Peminjaman->getByPeminjamanProses2($config['per_page'], $page_data['start']);
        $page_data['selesai'] = $this->Md_Peminjaman->getByPeminjamanSelesai($config['per_page'], $page_data['start']);
        $page_data['ditolak'] = $this->Md_Peminjaman->getByPeminjamanDitolak($config['per_page'], $page_data['start']);
        $page_data['peminjaman'] = $this->Md_Peminjaman->getByPeminjaman();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('riwayat/index', $page_data);
        $this->load->view('templates/include_footer');
    }
}
