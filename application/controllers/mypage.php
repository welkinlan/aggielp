<?php
class Mypage extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->model('Shop');
		$this->load->model('Comment');
		$this->load->model('User');
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
		$data['ratings'] = $this->Comment->get_user_rating();
		$data['comments'] = $this->Comment->get_user_comments();
		if($data['is_logged_in']==1){
			$this->load->view('header', $data);
			$this->load->view('mypage', $data);
		}
	    else{
		    redirect('login');
	    }
	}

	public function logout()
	{
		$data = array(
							'username' => '',
							'useremail'=>'',
							'userid'=>'',
							'is_logged_in' => 0
						);
		$this->session->set_userdata($data);
		redirect('main');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */