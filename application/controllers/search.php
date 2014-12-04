<?php 
class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
    		$this->load->model('User');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
		$data['title'] = 'Search';
		$this->load->view('aggielp/header',$data);
		$this->load->view('aggielp/search', $data);
	}

	public function query()
	{
		$this->load->model('search_model');
		$data['title'] = 'Search';
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
		$data['result'] = $this->search_model->search_in_website();
		if(empty($data['result']))
		{
			$this->load->view('aggielp/header',$data);
			$this->load->view('aggielp/search', $data);
		}
		else
		{
			$this->load->view('aggielp/header',$data);
			$this->load->view('aggielp/searchresult',$data);
		}
	}
}
