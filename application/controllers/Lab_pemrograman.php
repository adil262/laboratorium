<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lab_pemrograman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('md_lab_pemrograman');
    }

    public function index()
    {
        $page_data['page_title'] = 'Lab Pemrograman - R.301';
        $page_data['page_judul'] = 'Tambah Data Laboratorium';
        $page_data['page_detail'] = 'Detail Data Laboratorium';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        $page_data['lab_pemrograman'] = $this->md_lab_pemrograman->getId1();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_barang', 'No_barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status_barang', 'Status_barang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/include_header', $page_data);
            $this->load->view('templates/include_topbar', $page_data);
            $this->load->view('templates/include_sidebar', $page_data);
            $this->load->view('lab301/index', $page_data);
            $this->load->view('templates/include_footer');
        } else {
            $data = [
                'id_user' => 4,
                'nama' => $this->input->post('nama'),
                'no_barang' => $this->input->post('no_barang'),
                'gambar' => 'oke',
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan'),
                'status_barang' => $this->input->post('status_barang'),
                'id_ruangan' => 1
            ];

            $this->md_lab_pemrograman->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Barang Berhasil Ditambahkan!</div>');
            redirect('lab_pemrograman');
        }
    }


    public function lab_database()
    {
        $page_data['page_title'] = 'Lab Pemrograman - R.301';
        $page_data['page_judul'] = 'Tambah Data Laboratorium';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;
    }
    // public function lab()
    // {
    //     $page_data['page_title'] = 'Lab Pemrograman - R.301';
    //     $page_data['email'] = $this->session->email;
    //     $page_data['name'] = $this->session->name;

    //     $page_data['lab_pemrograman'] = $this->Md_Lab_pemrograman->getAll();

    //     $this->load->view('templates/include_header', $page_data);
    //     $this->load->view('templates/include_sidebar', $page_data);
    //     $this->load->view('templates/include_topbar', $page_data);
    //     $this->load->view('peminjam/lab301/index', $page_data);
    //     $this->load->view('templates/include_footer');
    // }
}
