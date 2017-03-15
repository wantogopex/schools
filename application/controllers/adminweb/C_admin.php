<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $session_data = $this->session->userdata('logged_in_adm');
        if($session_data !== False && $session_data['verify'] == true)
        {
            $this->load->model('m_admin','',true);
        } else {
            redirect('adminweb', 'index');
        }
    }
    
    public function index()
    {
        $data['admin'] = $this->m_admin->get_admin(); //query dari model
        $session_data = $this->session->userdata('logged_in_adm');
        if($session_data !== False && $session_data['verify'] == true)
        {
            $data['username'] = $session_data['username'];
            
            $data["tittle"] = "Data Admin";
            $this->load->view('admin/v_header', $data);
            $this->load->view('admin/v_admin');
            $this->load->view('admin/v_footer');
        }
        else
        {
            redirect('adminweb', 'index');
        }
        
    }
    
    function tambah_admin()
    {
        $session_data = $this->session->userdata('logged_in_adm');  
        $data["tittle"] = "Tambah Admin";
        $data['username'] = $session_data['username'];
        $data['error']= ' ';
        $this->load->view('admin/v_header', $data);
        $this->load->view('admin/v_admin');
        $this->load->view('admin/v_footer');
        if($this->input->post("username"))
        {
            $this->m_admin->add_admin();
            redirect("adminweb/c_admin/",'refresh');
        }        
    }
    
    function update_admin()
    {
        $id = $this->uri->segment(4);
        $session_data = $this->session->userdata('logged_in_adm');  
        $data["tittle"] = "Update Admin";
        $data['username'] = $session_data['username'];
        $data['error']= ' ';
        $data['dt'] = $this->m_admin->get_id_admin($id);
        $this->load->view('admin/v_header',$data);
        $this->load->view('admin/v_update');
        $this->load->view('admin/v_footer');
        if($this->input->post("username"))
        {
            $this->m_admin->update_admin();
            redirect("adminweb/c_admin/",'refresh');
        }        
    }
    
    function hapus($id)
    {
        $this->m_admin->delete_admin($id);
        redirect("adminweb/c_admin/",'refresh');
    }
    
}

?>