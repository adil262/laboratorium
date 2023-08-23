<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_Ruangan');
    }

    public function index()
    {
        $page_data['page_title'] = 'Daftar Ruangan';
        $page_data['page_tambah'] = 'Tambah Data Ruangan';
        $page_data['page_edit'] = 'Edit Data Ruangan';
        $page_data['page_detail'] = 'Detail Data Ruangan';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        //Pagination
        $config['base_url'] = 'http://localhost/laboratorium/ruangan/index';
        $config['total_rows'] = $this->Md_Ruangan->countRuangan();
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
        $page_data['data'] = $this->Md_Ruangan->getRuangan($config['per_page'], $page_data['start']);
        $page_data['ail'] = $this->Md_Ruangan->getAil();
        $page_data['kalab'] = $this->Md_Ruangan->getKalab();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('ruangan/index', $page_data);
        $this->load->view('templates/include_footer');
    }
    public function add()
    {
        $data = array(
            'id_ail' => $this->input->post('id_ail'),
            'id_kalab' => $this->input->post('id_kalab'),
            'no_ruangan' => $this->input->post('no_ruangan'),
            'nama_ruangan' => $this->input->post('nama_ruangan'),
            'status_ruangan' => $this->input->post('status_ruangan'),
            'is_active' => 1
        );

        $this->Md_Ruangan->add($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                role="alert">Ruangan Berhasil Ditambahkan!</div>');
        redirect('ruangan');
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
