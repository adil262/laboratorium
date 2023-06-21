<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lab_database extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_lab_database');
    }
    public function index()
    {
        $page_data['page_title'] = 'Lab Database - R.302';
        $page_data['page_judul'] = 'Tambah Data Laboratorium';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        $page_data['lab_database'] = $this->Md_lab_database->getId1();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_barang', 'No_barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('status_barang', 'Status_barang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/include_header', $page_data);
            $this->load->view('templates/include_topbar', $page_data);
            $this->load->view('templates/include_sidebar', $page_data);
            $this->load->view('lab302/index', $page_data);
            $this->load->view('templates/include_footer');
        } else {
            $data = [
                'ail_id' => 5,
                'nama' => $this->input->post('nama'),
                'no_barang' => $this->input->post('no_barang'),
                'gambar' => 'oke',
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan'),
                'status_barang' => $this->input->post('status_barang'),
                'id_ruangan' => 2
            ];

            $this->Md_lab_database->add($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Barang Berhasil Ditambahkan!</div>');
            redirect('lab_database');
        }
    }
}
