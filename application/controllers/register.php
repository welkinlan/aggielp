<?php

class Register extends CI_Controller {
    
    function index()
	{
		$this->load->helper(array('form', 'url'));	
    	$this->load->model('User');
    	$this->load->library('form_validation');  
    	
		$config = array(
			     		array(
		                     'field'   => 'username', 
		                     'label'   => 'Username', 
		                     'rules'   => 'required|trim|callback_username_exists'
		                 ),
		               array(
		                     'field'   => 'password', 
		                     'label'   => 'Password', 
		                     'rules'   => 'required|trim'
		                 ), 
		                 array(
		                     'field'   => 'password_conf', 
		                     'label'   => 'Confirm password', 
		                     'rules'   => 'required|trim|callback_password_match'
		                 ),    
		               array(
			                'field'=>'email',
			                'label'=>'Email',
			                'rules'=>'trim|required|valid_email|callback_email_exists'
						)   
		            );

		$this->form_validation->set_rules($config);    
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			$this->User->add_user($this->input->post('username'),$this->input->post('password'),$this->input->post('email'));
			redirect('main');
		}
	}
	
	
	function username_exists($username)
    {
        if ($this->User->get_by_username($username))
        {
            $this->form_validation->set_message('username_exists', 'Username exists');
            return FALSE;
        }
        return TRUE;
    }
    function email_exists($email)
    {
        if ($this->User->email_exists($email))
        {
            $this->form_validation->set_message('email_exists', 'Email exists');
            return FALSE;
        }
        return TRUE;
    }
    function password_match($password_conf)
    {
        if ($this->input->post('password') != $password_conf)
        {
            $this->form_validation->set_message('password_match', 'Password Not Match');
            return FALSE;
        }
        return TRUE;
    }

}

?>