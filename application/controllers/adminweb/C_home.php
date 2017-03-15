<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('cek_admin','',TRUE);
    }
    
    function index()
    {
        $session_data = $this->session->userdata('logged_in_adm');
        if($session_data !== False && $session_data['verify'] == true)
        {
            $menu = $this->uri->segment(2);
            $data['menu'] = $menu;      
            $data['username'] = $session_data['username'];
            $data['verify'] = $session_data['verify'];
            $data["tittle"] = "Home";
            
            $this->load->view('admin/v_header', $data);
            $this->load->view('admin/v_home');
            $this->load->view('admin/v_footer');
        }
        else
        {
//            redirect('adminweb', 'index');
            redirect(base_url('adminweb'), 'refresh');
        }
    }
    
    function logout()
    {
        $this->session->unset_userdata('logged_in_adm');
        $this->session->sess_destroy();
        redirect(base_url('adminweb'), 'refresh');
    }
}
