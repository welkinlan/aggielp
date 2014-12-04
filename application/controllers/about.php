<?php
class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$data['title'] = 'About';
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
		$this->load->view('aggielp/header',$data);
		$this->load->view('about');
	}
}
