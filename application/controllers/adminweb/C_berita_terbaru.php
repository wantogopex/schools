<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_berita_terbaru extends CI_Controller {
    

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita_terbaru');
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
        $data['berita'] = $this->m_berita_terbaru->get_berita(); //query dari model
        $session_data = $this->session->userdata('logged_in_adm');
        if($session_data !== False && $session_data['verify'] == true)
        {
            $data['username'] = $session_data['username'];
            
            $data["tittle"] = "Berita terbaru";
            $this->load->view('admin/v_header', $data);
            $this->load->view('admin/v_berita_terbaru');
            $this->load->view('admin/v_footer');
        }
        else
        {
            redirect('adminweb', 'index');
        }
        
    }
    
    function edit($id) {
        
        $data['berita'] = $this->m_berita_terbaru->get_berita(); //query dari model
        $session_data = $this->session->userdata('logged_in_adm');
        if($session_data !== False && $session_data['verify'] == true)
        {
            $dd['username'] = $session_data['username'];
            $data = $this->db->query("select * from berita_terbaru where id_berita = '{$id}'");
            $row = $data->row();
            
            $this->load->view('admin/v_header', $dd);
            $this->load->view('admin/v_ubah_berita', array('r' => $row));
            $this->load->view('admin/v_footer');
        }
        else
        {
            redirect('adminweb', 'index');
        }
        
        
    }
    
    function update() {
        $id = $this->input->post('id_berita');
        $path = $this->input->post('path');
        
        
        $this->load->library('upload');
        $nama_asli = $_FILES['filefoto']['name'];
        $nmfile = "file" . '_' . $nama_asli; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './asset/uploads/berita_baru/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '1288'; //lebar maksimum 1288 px
        $config['max_height'] = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if ($_FILES['filefoto']['name']) {
            if ($this->upload->do_upload('filefoto')) {
                if (unlink('asset/uploads/berita_baru/' . $path)) {
                    $gbr = $this->upload->data();
                }
            }
        }
        
        $data = array(
            'id_berita' => $_POST['id_berita'],
            'judul_berita' => $_POST['judul_berita'],
            'isi_berita' => $_POST['isi_berita']
            );
        
        
        
        if ($_FILES['filefoto']['name']) {
            $data = array_merge($data, array('img_berita' => $gbr['file_name']));
        }
        
        $this->m_berita_terbaru->get_update($data); //akses model untuk menyimpan ke database
//pesan yang muncul jika berhasil diupload pada session flashdata
// $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
        redirect('adminweb/c_berita_terbaru'); //jika berhasil maka akan ditampilkan view vupload
    }
    
    function do_upload() {
        $data = array('error' => '');
        $config = array(
            'upload_path' => './asset/uploads/berita_baru',
            'allowed_types' => 'gif|jpg|png|jpeg|bmp',
            'max_size' => '2048',
            'max_width' => '1288',
            'max_height' => '768',
            'encrypt_name' => true
            );
        
        $this->load->library('upload', $config);
        $nama_asli = $_FILES['filefoto']['name'];
        $nmfile = "file" . '_' . $nama_asli; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './asset/uploads/berita_baru'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '1288'; //lebar maksimum 1288 px
        $config['max_height'] = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
        $this->upload->initialize($config);
        
        if ($_FILES['filefoto']['name']) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                $data = array(
                    'judul_berita' => $this->input->post('judul_berita'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'img_berita' => $gbr['file_name']
                    );
                
                $this->m_berita_terbaru->insert_berita($data); //akses model untuk menyimpan ke database
                
                redirect('adminweb/c_berita_terbaru', 'index');
            } else {
                
                echo "gagal tuh";
            }
        }
    }
    
    
    public function proses_hapus($id) {

        $photo = $this->m_berita_terbaru->link_photo($id);

        if ($photo->num_rows() > 0) {

            $row = $photo->row();

            $file_photo = $row->img_berita;

            $path_file = './asset/uploads/berita_baru/';
            unlink($path_file . $file_photo);
        }

        $this->m_berita_terbaru->hapus_photo($id);

        redirect('adminweb/c_berita_terbaru', 'index');
    }

}
?>