<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('cek_admin', '', TRUE);
    }

    public function index() {
        $session_data = $this->session->userdata('logged_in_adm');

        if ($session_data !== False && $session_data['verify'] == true) {
            $session_data = $this->session->userdata('logged_in_adm');
            redirect('adminweb/c_home', 'refresh');
        } else {
            $this->load->view('admin/v_login');
        }
    }

    function verifikasi() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_cek_database');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', 'wrong username or password');
            redirect(base_url('adminweb'), 'refresh');
        } else {
            redirect(base_url('adminweb/c_home'), 'refresh');
        }
    }

    function cek_database() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->cek_admin->login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'verify' => true,
                    'is_login' => TRUE
                );
                $this->session->set_userdata('logged_in_adm',$sess_array);
            }
            return TRUE;
        } else {
            return false;
        }
    }

}
