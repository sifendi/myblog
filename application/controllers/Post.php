<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

	class Post extends CI_Controller{



		public function index(){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('auth');
			}		  
		   $this->load->view('admin/header');
		   $data['menu1'] = '';
		   $data['menu2'] = '';
		   $data['menu3'] = 'has-class';
		   $this->load->view('admin/header_menu',$data);
		   $this->load->view('admin/blog');
		   $this->load->view('admin/footer');
		}
	}


	 