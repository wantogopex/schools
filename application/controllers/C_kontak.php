<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kontak extends CI_Controller {

	function __construct() {
		parent:: __construct();
		
	}
	
	public function index()
	{
		$data['title'] = 'halaman home perpage';
                $data['main'] = 'v_kontak';
		$this->load->view('v_header');
		$this->load->view('v_kontak');
		$this->load->view('v_footer');
	}
}
