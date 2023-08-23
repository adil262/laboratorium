<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserAil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_Ail');
    }
    public function index()
    {
        $page_data['page_title'] = 'Daftar Asisten Instruktur Laboratorium';
        $page_data['page_tambah'] = 'Tambah Data AIL';
        $page_data['page_edit'] = 'Edit Data AIL';
        $page_data['page_detail'] = 'Detail Data AIL';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        //Pagination
        $config['base_url'] = 'http://localhost/laboratorium/ail/index';
        $config['total_rows'] = $this->Md_Ail->countAil();
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
        $page_data['data'] = $this->Md_Ail->getAil($config['per_page'], $page_data['start']);
        $page_data['user'] = $this->Md_Ail->getUser();

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('ail/index', $page_data);
        $this->load->view('templates/include_footer');
    }

    public function add()
    {
        $id_user = $this->input->post('id_user');
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'is_active' => 1,

        );
        $this->Md_Ail->add($data);
        $data_level = $this->input->post('level');
        $this->Md_Ail->updateLevel($id_user, $data_level);

        redirect('userail');
    }

    public function update($id_ail)
    {
        $page_data['data'] = $this->Md_Ail->getByAilId($id_ail);
        $id_user = $this->input->post('id_user');
        $data_level = $this->input->post('level');
        $this->Md_Ail->updateLevel($id_user, $data_level);
        $this->Md_Ail->deletedata('ail', array('id_ail' => $id_ail));
        // echo json_encode($data_level);

        redirect('userail');
    }
}
