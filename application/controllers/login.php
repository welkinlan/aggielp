<?php

class Login extends CI_Controller {
 
	 function index()
	 {
	 	//$this->load->view('login');
	 	$this->load->helper(array('form', 'url'));
	 	$this->load->model('User');
	 	$this->load->library('form_validation');
		$config = array(
		               array(
		                     'field'   => 'username', 
		                     'label'   => 'Username', 
		                     'rules'   => 'required|trim|callback_username_check'
		                  ),
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Password', 
		                     'rules'   => 'required|trim|callback_password_check'
		                  )         
		            );

			$this->form_validation->set_rules($config);    
			if ($this->form_validation->run()){
			           //redirect('main');
						$data = $this->User->get_user_detail($this->input->post('username'));
						$this->session->set_userdata($data);
						redirect('main');
				} else {
						$this->load->view('login');				
				}

	 }

	
	function username_check($username)
    {
        if ($this->User->get_by_username($username))
        {
            return TRUE;
        }
        else 
        {
            $this->form_validation->set_message('username_check', 'Username does not exist');
            return FALSE;
        }
    }
    /**
     * 检查用户的密码正确性
     */
    function password_check($password)
    {
        if ($this->User->password_check( $this->input->post('username'), $password))
        {
            return TRUE;
        }
        else 
        {
            $this->form_validation->set_message('password_check', 'Username and password do not match');
            return FALSE;
        }
    }
}
?>