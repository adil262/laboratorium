<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (null == $this->session->level) {
            redirect('auth');
        } else {
            if ($this->session->level != "Ail") {
                redirect('auth', 'refresh');
            }
        }
    }
    public function index()
    {
        $page_data['page_title'] = 'Dashboard';
        $page_data['email'] = $this->session->email;
        $page_data['name'] = $this->session->name;

        $this->load->view('templates/include_header', $page_data);
        $this->load->view('templates/include_topbar', $page_data);
        $this->load->view('templates/include_sidebar', $page_data);
        $this->load->view('dashboard/index', $page_data);
        $this->load->view('templates/include_footer');
    }
}
