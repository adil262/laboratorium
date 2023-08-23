<?php
defined('BASEPATH') or exit('No direct script access allowed');

class R330 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_R330');
    }

    public function index()
    {
        $page_data['page_title'] = 'Lab Web Programming 2 - R.330';
        $page_data['page_tambah'] = 'Tambah Data Laboratorium';
        $page_data['page_edit'] = 'Edit Data Laboratorium';
        $page_data['page_detail'] = 'Detail Data Laboratorium';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        //Pagination
        $config['base_url'] = 'http://localhost/laboratorium/R330/index';
        $config['total_rows'] = $this->Md_R330->countBarang();
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
        $page_data['data'] = $this->Md_R330->getId1($config['per_page'], $page_data['start']);

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('lab225/index', $page_data);
        $this->load->view('templates/include_footer');
    }

    public function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_barang' => $this->input->post('no_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'status_barang' => $this->input->post('status_barang'),
            'id_ruangan' => 10,
            'is_active' => 1,
        );

        $this->Md_R330->add($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                role="alert">Barang Berhasil Ditambahkan!</div>');
        redirect('R330');
    }

    public function update($id_lab)
    {
        $data_update = array(
            'nama' => $this->input->post('nama'),
            'no_barang' => $this->input->post('no_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'status_barang' => $this->input->post('status_barang'),
            'id_ruangan' => 10,
            'is_active' => 1,
        );
        $this->Md_R330->update($id_lab, $data_update);

        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    role="alert">Barang Berhasil Diperbarui!</div>');
        redirect('R330');
    }
}
