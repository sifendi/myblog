<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

	class Administrator extends CI_Controller{

		

		public function index(){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('auth');
			}		  
		   $this->load->view('admin/header');
		   $data['menu1'] = 'has-class';
		   $data['menu2'] = '';
		   $data['menu3'] = '';
		   $this->load->view('admin/header_menu',$data);
		   $this->load->view('admin/index');
		   $this->load->view('admin/footer');
		}

		

		
	}


	 