<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->level) {
            redirect($this->session->level, 'refresh');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $page_data['page_title'] = 'Login';
            $this->load->view('templates/auth_header', $page_data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $cek_email = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($cek_email) {
            $data = ['password' => $cek_email['password']];

            if ($cek_email['is_active'] == 1) {
                if ($data['password'] == ($password)) {
                    $userdata = [
                        'id_user' => $cek_email['id_user'],
                        'email' => $cek_email['email'],
                        'level' => $cek_email['level'],
                        'name' => $cek_email['name'],
                        'nip' => $cek_email['nip'],
                    ];
                    $this->session->set_userdata($userdata);
                    redirect(strtolower($cek_email['level']));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">This email is not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // $this->form_validation->set_rules(
        //     'email',
        //     'Email',
        //     'required|trim|valid_email|is_unique[user.email]',
        //     [
        //         'is_unique' => 'This email has already registered!'
        //     ]
        // );
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // if ($this->form_validation->run() == false) {
        //     $this->load->library('form_validation');
        //     $data['title'] = 'Registration';
        //     $this->load->view('templates/auth_header', $data);
        //     $this->load->view('auth/registration');
        //     $this->load->view('templates/auth_footer');
        // } else {
        //     $data = [
        //         'name' => htmlspecialchars($this->input->post('name', true)),
        //         'email' => htmlspecialchars($this->input->post('email', true)),
        //         'password' => password_hash(
        //             $this->input->post('password1'),
        //             PASSWORD_DEFAULT
        //         ),
        //         'role_id' => 6,
        //         'is_active' => 1
        //     ];

        //     $this->db->insert('user', $data);
        //     $this->session->set_flashdata('message', '<div class="alert
        //     alert-success" role="alert">Congratulation! your account has been
        //     created. Please Login</div>');
        //     redirect('auth');
        // }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('name');
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert">You have been logout !</div>');
        redirect('auth');
    }
}
