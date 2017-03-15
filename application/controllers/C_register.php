<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_register extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->library('Recaptcha');
        $this->load->model('M_register');
    }

    public function index() {
        $data['title'] = 'Registration';
        $data['main'] = 'v_register';
        $this->load->view('v_header');
        $this->load->view('v_register');
        $this->load->view('v_footer');
    }

    public function submit() {
        // Load the library
        $this->load->library('Recaptcha');
        //passing post data dari view
        // Catch the user's answer
        $captcha_answer = $this->input->post('g-recaptcha-response');

        // Verify user's answer
        $response = $this->recaptcha->verifyResponse($captcha_answer);

        if ($response['success']) {
            $this->load->helper(array('form', 'url'));
            $nama = $this->input->post('name');
            $fullname = $this->input->post('fullname');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $avatar = base_url('asset/images/avatar.png');

            //memasukan ke array
            $data = array(
                'password' => $password,
                'name' => $nama,
                'fullname' => $fullname,
                'email' => $email,
                'avatar' => $avatar,
            );
            //tambahkan akun ke database
            
            $this->M_register->add_account($data);


            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['protocol'] = "smtp";
            $config['mailtype'] = "html";
            $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
            $config['smtp_port'] = "465";
            $config['smtp_timeout'] = "400";
            $config['smtp_user'] = "irawanpurwanto88@gmail.com"; // isi dengan email kamu
            $config['smtp_pass'] = "purwantoro88**"; // isi dengan password kamu
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['starttls'] = TRUE;
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Verification Account");

            $this->email->message(
                    "Thank you for registering, to verify please click the link below<br>" .
                    site_url("register/verify/" . md5($email))
            );

            if ($this->email->send()) {
                echo "Berhasil melakukan registrasi, silahkan cek email kamu";
            } else {
                echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
            }
            echo $this->email->print_debugger();
        } else {
            // Something goes wrong
            var_dump($response);
//            echo'captcha tidak boleh kosong';
        }
    }

    function verify($hash = NULL) {
        $this->load->helper('url');
        $this->load->model('Register_model');
        $this->M_register->verifyEmailID($hash);
        echo "<div style='color: red; width: 100%; text-align: center; margin: 50px auto 0; font-weight: bold; font-size: 25px;'>Congratulations, you've verified your account.</div>";
        echo "<div style='color: red; width: 100%; text-align: center; font-weight: bold; font-size: 25px;'><br><a href='" . base_url("Home") . "'>Back to menu login</a></div>";
    }

    function cekmail() {
        $email = $this->input->post('email');

        $data = array(
            'email' => $email
        );

        
        $ada = $this->M_register->cekemail($email);

        header('Content-Type: application/json');

        if ($ada)
            echo json_encode(false);
        else
            echo json_encode(true);
    }

    function edit($id = null) {

        if (!is_dev())
            $this->output->cache((60 * 60 * 15));

        $this->load->helper(array('form', 'url'));

        $params = array(
            'events' => array(),
            'banners' => array(),
            'users' => array(),
            'suppliers' => array(),
            'home' => (object) array(
                'schema' => $this->_schemaHome()
            )
        );

        $this->load->model('Banner_model', 'Banner');
        $this->load->library('ObjectFormatter', '', 'formatter');
        $this->load->model('User_model', 'User');
        $this->load->library('SiteForm', '', 'form');

        $cond = array();

        $rpp = 5;
        $page = $this->input->get('page');
        if (!$page)
            $page = 1;

        $rpp = 100;
        $banner = $this->Banner->getByCond($cond, $rpp, $page);
        if ($banner)
            $params['banners'] = $this->formatter->banner($banner, false, true);

        $result = $this->User->get($id);


        if ($result)
            $params['user'] = $this->formatter->user($result, false, true);

        $this->respond('edit', $params);
    }

    public function update() {
        //passing post data dari view
        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('idx');
        $nama = $this->input->post('name');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $email = $this->input->post('email');

        //memasukan ke array
        $data = array(
            'id' => $id,
            'password' => $password,
            'name' => $nama,
            'email' => $email
        );
        //tambahkan akun ke database
        $this->Register_model->edit_account($data);

        redirect('Home', 'refresh');
    }

    public function verification($key) {
        $this->load->helper('url');
        $this->load->model('Register_model');
        $this->Register_model->changeActiveState($key);
        echo "Selamat kamu telah memverifikasi akun kamu";
        echo "<br><br><a href='" . site_url("Register") . "'>Kembali ke Menu Login</a>";
    }

    function mydata($id = null) {

        if (!is_dev())
            $this->output->cache((60 * 60 * 15));

        $this->load->helper(array('form', 'url'));

        $params = array(
            'events' => array(),
            'banners' => array(),
            'users' => array(),
            'suppliers' => array(),
            'home' => (object) array(
                'schema' => $this->_schemaHome()
            )
        );

        $this->load->model('Banner_model', 'Banner');
        $this->load->library('ObjectFormatter', '', 'formatter');
        $this->load->model('User_model', 'User');
        $this->load->library('SiteForm', '', 'form');

        $cond = array();

        $rpp = 5;
        $page = $this->input->get('page');
        if (!$page)
            $page = 1;

        $rpp = 100;
        $banner = $this->Banner->getByCond($cond, $rpp, $page);
        if ($banner)
            $params['banners'] = $this->formatter->banner($banner, false, true);

        $result = $this->User->get($id);


        if ($result)
            $params['user'] = $this->formatter->user($result, false, true);

        $this->respond('mydata', $params);
    }

    public function updatemydata() {
        //passing post data dari view
        $this->load->library('MediaFile', '', 'media');
        $this->load->library('ObjectFormatter', '', 'formatter');
        $this->load->library('SiteForm', '', 'form');


        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('idy');
        $nama = $this->input->post('name');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');

        $file = $_FILES['avatar'];
        $avatar = $this->media->processUpload('avatar', $file['name'], 'mydata.avatar', $this->user->id);

        $avatar = $avatar['local_media_file'];


        $this->load->library('upload');


        //memasukan ke array
        $data = array(
            'id' => $id,
            'name' => $nama,
            'fullname' => $fullname,
            'email' => $email,
            'avatar' => $avatar
        );
        //tambahkan akun ke database
        $this->Register_model->updatemydata_account($data);

        redirect('Register/mydata', 'refresh');
    }

}
