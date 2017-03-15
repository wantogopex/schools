<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kenaikan_kelas extends CI_Controller {

	function __construct() {
		parent:: __construct();
		
	}
	
	public function index()
	{
		$data['title'] = 'halaman home perpage';
                $data['main'] = 'v_kenaikan_kelas';
		$this->load->view('v_header');
		$this->load->view('v_home', $data);
		$this->load->view('v_footer');
	}
}
