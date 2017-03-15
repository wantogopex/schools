<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {

	function __construct() {
		parent:: __construct();
		
	}
	
	public function index()
	{
		$data['title'] = 'halaman beranda';
		$this->load->view('v_header');
		$this->load->view('v_template');
		$this->load->view('v_footer');
	}
        
        
}
