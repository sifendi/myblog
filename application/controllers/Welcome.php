<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('default/header');
	// 	$this->load->view('default/index');
	// 	$this->load->view('default/footer');
	// }

	public function index($offset = 0)
	{
			// Pagination Config
			$config['base_url'] = base_url(). 'write/index/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 2;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);
			$data['posts'] = $this->Post_Model->get_posts(FALSE, $config['per_page'], $offset);

		$this->load->view('default/header');
		$this->load->view('default/index',$data);
		$this->load->view('default/footer');
		}
}
