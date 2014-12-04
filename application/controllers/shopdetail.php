<?php

class Shopdetail extends CI_Controller {
     

     public function index($id)
	{
    	$this->load->model('Shop');
    	$this->load->model('Comment');
    	$this->load->model('User');
    	
    	$data['id']=$id;
    	$this->session->set_userdata('current_shop_id', $id);
    	$data['shop']=$this->Shop->get_shop_detail($id);
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
		$this->load->view('aggielp/header', $data);
		$this->load->view('shopdetail', $data);		
		
	}
	
	public function add_comment()
	{
		$this->load->helper(array('form', 'url'));
	 	$this->load->model('User');
	 	$this->load->model('Comment');
	 	$this->load->library('form_validation');
		$config = array(
		               array(
		                     'field'   => 'comment', 
		                     'label'   => 'Comment', 
		                     'rules'   => 'required|trim'
		                  ),
		                 array(
		                     'field'   => 'rate', 
		                     'label'   => 'Rate', 
		                     'rules'   => 'required|trim|numeric'
		                  ),
		            );
		            
		$this->form_validation->set_rules($config);  
		$sid = $this->input->post('sid');
		$data['is_logged_in']=$this->session->userdata('is_logged_in');
			if ($this->form_validation->run()){
						if($data['is_logged_in']==1){
							//add_comment();
							$this->Comment->add_comment($sid);
							redirect('main');
						}
						else{
							redirect('login');
						}
						
				} else {
					//$id  =  $this->session->userdata('current_shop_id'); 
					//$this->session->set_userdata('current_shop_id', $id); 
					$this->index($sid);			
			   }	
	}
	
	
	
	
}

?>