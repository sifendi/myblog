<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

	class Write extends CI_Controller{



		public function index(){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('auth');
			}		  
		   $this->load->view('admin/header');
		   $data['menu1'] = '';
		   $data['menu2'] = 'has-class';
		   $data['menu3'] = '';

		   $data['category'] = $this->Post_Model->get_categories();

		   $this->load->view('admin/header_menu',$data);
		   $this->load->view('admin/create_post');
		   $this->load->view('admin/footer');
		}



		public function save(){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}

			$data['categories'] = $this->Post_Model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				redirect('write');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->Post_Model->create_post($post_image);

				//Set Message
				$this->session->set_flashdata('post_created', 'Your post has been created.');
				redirect('posts');
			}
			
		}

	}


	 