<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
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
        $page_data['page_title'] = "Daftar Peminjaman";
        $page_data['page_judul'] = 'Tambah Data Peminjaman';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
        $page_data['nip'] = $this->session->nip;


        $page_data['user'] = $this->Md_Auth->getAll();
        $page_data['ruangan'] = $this->Md_Peminjaman->getRuangan();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_barang', 'No_barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status_barang', 'Status_barang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/include_header', $page_data);
            $this->load->view('templates/include_topbar', $page_data);
            $this->load->view('templates/include_sidebar', $page_data);
            $this->load->view('peminjaman/index', $page_data);
            $this->load->view('templates/include_footer');
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_ruangan' => $this->input->post('id_ruangan'),
                'id_lab' => $this->input->post('id_lab'),
                'tanggal' => $this->input->post('tanggal'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_berakhir' => $this->input->post('jam_berakhir'),
                'keterangan' => $this->input->post('keterangan'),
                'status_peminjaman' => 0
            ];
            $this->Md_Peminjaman->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Peminjaman Berhasil Diajukan!</div>');
            $this->db->get_where('user', ['level' => 'Admin'])->row_array();
            redirect('peminjaman');
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

    public function getdatauser()
    {
        $id_ruangan = $this->input->post('no_ruangan');
        $page_data = $this->Md_Peminjaman->getdatauser($id_ruangan);
        echo json_encode($page_data);
    }
    public function getdatabarang()
    {
        $id_ruangan = $this->input->post('no_ruangan');
        $page_data = $this->Md_Peminjaman->getdatabarang($id_ruangan);
        echo json_encode($page_data);
    }
}
