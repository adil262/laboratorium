<?php

class Accesscontrol
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    public function grantForAccess($level)
    {
        $user_level = $this->CI->session->userdata('level');

        if ($user_level != $level) {
            redirect('error');
        }
    }
}
