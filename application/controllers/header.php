<?php
class Header extends CI_Controller {

	public function index()
	{
		$this->load->view('header', $data);
	}
	
?>