<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller{

		public function index(){
			$this->load->view('auth/login');
		}


		public function login(){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('pass', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				redirect('Welcome');
			}else{
				// get email and Encrypt Password
				$username = $this->input->post('username');
				$encrypt_password = md5($this->input->post('pass'));
				$user_id = $this->User_Model->login($username, $encrypt_password);
				// echo $user_id->username;exit;
				if ($user_id && $user_id->role_id == 1) {
					//Create Session
					$user_data = array(
								'user_id' => $user_id->id,
				 				'username' => $user_id->username,
				 				'email' => $user_id->email,
				 				'login' => true,
				 				'role' => $user_id->role_id,
				 				'image' => $user_id->image
				 	);
				 	$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
					redirect('administrator');
				}else{
					$this->session->set_flashdata('danger', 'Username / Passord in invalid!');
					redirect('auth');
				}
				
			}
		}

		// log admin out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('image');

			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			redirect(base_url().'auth');
		}

// 		public function forget_password($page = 'forget-password'){
// 			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
// 				show_404();
// 			}
// 			$data['title'] = ucfirst($page);
// 			$this->load->view('administrator/header-script');
// 			//$this->load->view('administrator/header');
// 			//$this->load->view('administrator/header-bottom');
// 			$this->load->view('administrator/'.$page, $data);
// 			$this->load->view('administrator/footer');
// 		}

// 		public function add_user($page = 'add-user')
// 		{
// 			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
// 		    show_404();
// 		   }
// 			// Check login
// 			if(!$this->session->userdata('login')) {
// 				redirect('administrator/index');
// 			}

// 			$data['title'] = 'Create User';

// 			//$data['add-user'] = $this->Administrator_Model->get_categories();

// 			$this->form_validation->set_rules('name', 'Name', 'required');
// 			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
// 			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

// 			if($this->form_validation->run() === FALSE){
// 				 $this->load->view('administrator/header-script');
// 		 	 	 $this->load->view('administrator/header');
// 		  		 $this->load->view('administrator/header-bottom');
// 		   		 $this->load->view('administrator/'.$page, $data);
// 		  		 $this->load->view('administrator/footer');
// 			}else{
// 				//Upload Image
// 				$config['upload_path'] = './assets/images/users';
// 				$config['allowed_types'] = 'gif|jpg|png|jpeg';
// 				$config['max_size'] = '2048';
// 				$config['max_width'] = '2000';
// 				$config['max_height'] = '2000';

// 				$this->load->library('upload', $config);

// 				if(!$this->upload->do_upload()){
// 					$errors =  array('error' => $this->upload->display_errors());
// 					$post_image = 'noimage.jpg';
// 				}else{
// 					$data =  array('upload_data' => $this->upload->data());
// 					$post_image = $_FILES['userfile']['name'];
// 				}
// 				$password = md5('Test@123');
// 				$this->Administrator_Model->add_user($post_image,$password);

// 				//Set Message
// 				$this->session->set_flashdata('success', 'User has been created Successfull.');
// 				redirect('administrator/users');
// 			}
			
// 		}



// 		// Check user name exists
// 		public function check_username_exists($username){
// 			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

// 			if ($this->User_Model->check_username_exists($username)) {
// 				return true;
// 			}else{
// 				return false;
// 			}
// 		}


// 		// Check Email exists
// 		public function check_email_exists($email){
// 			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

// 			if ($this->User_Model->check_email_exists($email)) {
// 				return true;
// 			}else{
// 				return false;
// 			}
// 		}

// 		public function users($offset = 0)
// 		{
// 			// Pagination Config
// 			$config['base_url'] = base_url(). 'administrator/users/';
// 			$config['total_rows'] = $this->db->count_all('users');
// 			$config['per_page'] = 3;
// 			$config['uri_segment'] = 3;
// 			$config['attributes'] = array('class' => 'paginate-link');

// 			// Init Pagination
// 			$this->pagination->initialize($config);

// 			$data['title'] = 'Latest Users';

// 			$data['users'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);

// 			 	$this->load->view('administrator/header-script');
// 		 	 	 $this->load->view('administrator/header');
// 		  		 $this->load->view('administrator/header-bottom');
// 		   		 $this->load->view('administrator/users', $data);
// 		  		$this->load->view('administrator/footer');
// 		}

// 		public function delete($id)
// 		{
// 			$table = base64_decode($this->input->get('table'));
// 			//$table = $this->input->post('table');
// 			$this->Administrator_Model->delete($id,$table);       
// 			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
// 			header('Location: ' . $_SERVER['HTTP_REFERER']);
// 		}
// 		public function enable($id)
// 		{
// 			$table = base64_decode($this->input->get('table'));
// 			//$table = $this->input->post('table');
// 			$this->Administrator_Model->enable($id,$table);       
// 			$this->session->set_flashdata('success', 'Desabled Successfully.');
// 			header('Location: ' . $_SERVER['HTTP_REFERER']);
// 		}
// 		public function desable($id)
// 		{
// 			$table = base64_decode($this->input->get('table'));
// 			//$table = $this->input->post('table');
// 			$this->Administrator_Model->desable($id,$table);       
// 			$this->session->set_flashdata('success', 'Enabled Successfully.');
// 			header('Location: ' . $_SERVER['HTTP_REFERER']);
// 		}

// 		public function update_user($id = NULL)
// 		{
// 			$data['user'] = $this->Administrator_Model->get_user($id);
			
// 			if (empty($data['user'])) {
// 				show_404();
// 			}
// 			$data['title'] = 'Update User';

// 			$this->load->view('administrator/header-script');
// 	 	 	 $this->load->view('administrator/header');
// 	  		 $this->load->view('administrator/header-bottom');
// 	   		 $this->load->view('administrator/update-user', $data);
// 	  		$this->load->view('administrator/footer');
// 		}

// 		public function update_user_data($page = 'update-user')
// 		{
// 			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
// 		    show_404();
// 		   }
// 			// Check login
// 			if(!$this->session->userdata('login')) {
// 				redirect('administrator/index');
// 			}

// 			$data['title'] = 'Update User';

// 			//$data['add-user'] = $this->Administrator_Model->get_categories();

// 			$this->form_validation->set_rules('name', 'Name', 'required');

// 			if($this->form_validation->run() === FALSE){
// 				 $this->load->view('administrator/header-script');
// 		 	 	 $this->load->view('administrator/header');
// 		  		 $this->load->view('administrator/header-bottom');
// 		   		 $this->load->view('administrator/'.$page, $data);
// 		  		 $this->load->view('administrator/footer');
// 			}else{
// 				//Upload Image
				
// 				$config['upload_path'] = './assets/images/users';
// 				$config['allowed_types'] = 'gif|jpg|png|jpeg';
// 				$config['max_size'] = '2048';
// 				$config['max_width'] = '2000';
// 				$config['max_height'] = '2000';

// 				$this->load->library('upload', $config);

// 				if(!$this->upload->do_upload()){
// 					$id = $this->input->post('id');
// 					$data['img'] = $this->Administrator_Model->get_user($id);
// 					$errors =  array('error' => $this->upload->display_errors());
// 					$post_image = $data['img']['image'];
// 				}else{
// 					$data =  array('upload_data' => $this->upload->data());
// 					$post_image = $_FILES['userfile']['name'];
// 				}

// 				$this->Administrator_Model->update_user_data($post_image);

// 				//Set Message
// 				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
// 				redirect('administrator/users');
// 			}
			
// 		}


		
// public function reset_password($temp_pass){
//     $this->load->model('Administrator_Model');
//     if($this->Administrator_Model->is_temp_pass_valid($temp_pass)){

//         $this->load->view('reset-password');
//        //once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...

//     }else{
//         echo "the key is not valid";    
//     }

// }
// public function update_password(){
//     $this->load->library('form_validation');
//         $this->form_validation->set_rules('password', 'Password', 'required|trim');
//         $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
//             if($this->form_validation->run()){
//             echo "passwords match";
//             }else{
//             echo "passwords do not match";  
//             }
// }


		
	}
	




