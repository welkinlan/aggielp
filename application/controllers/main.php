<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->model('Shop');
		$this->load->model('User');
		$this->load->model('Comment');
		$data['shops']=$this->Shop->shop_rating();
		$data['comments']=$this->Comment->all_comments();
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
		$this->load->view('aggielp/header', $data);
		$this->load->view('index', $data);
	}

	public function members()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('members');
		} else {
			redirect('main/restricted');
		}
	}

	public function restricted()
	{
		$this->load->view('restricted');
	}


	public function logout()
	{
		$data = array(
							'username' => '',
							'is_logged_in' => 0
						);
		$this->session->set_userdata($data);
		redirect('main');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */