<?php

class User extends CI_Model {
	
	public function can_log_in (){
		
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('passwd', $this->input->post('passwd'));
		
		$query = $this->db->get('Users');

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	
	public function add_user($name,$pwd,$email)
	{
		$data=array(
			'username'=>$name,
			'email'=>$email,
			'passwd'=>$pwd
			);
		$this->db->insert('Users',$data);
	}
	
	
	public function get_user_detail($username){
		$this->db->select('id, email');
		$this->db->from('Users');
		$this->db->where('username', $username); 
		$query = $this->db->get();
		if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'userid' 		=> $rows->id,
                    	'username' 	=> $username,
		                'useremail'    => $rows->email,
		                'current_shop_id'    => '',
	                    'is_logged_in' 	=> 1
                   );
			}
           return $newdata;
                       
		}
	}
	
	/**
     * 添加用户session数据,设置用户在线状态
     * @param string $username
     */
    function login($username)
    {
        $data = array('username'=>$username, 'logged_in'=>TRUE);
        $this->session->set_userdata($data);                    //添加session数据
        }
    /**
     * 通过用户名获得用户记录
     * @param string $username
     */
    function get_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('Users');
        //return $query->row();                            //不判断获得什么直接返回
        if ($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * 用户名不存在时,返回false
     * 用户名存在时，验证密码是否正确
     */
    function password_check($username, $password)
    {                
        if($user = $this->get_by_username($username))
        {
            return $user->passwd == $password ? TRUE : FALSE;
        }
        return FALSE;                                    //当用户名不存在时
    }
    
 	/**
     * 添加用户
     */
    function add_2user($username, $password, $email)
    {
        $data = array('username'=>$username, 'passwd'=>$password, 'email'=>$email);
        $this->db->insert('Users', $data);
        if ($this->db->affected_rows() > 0)
        {
            $this->login($username);
            return TRUE;
        }
        return FALSE;
        }
/**
     * 检查邮箱账号是否存在.
     * @param string $email
     * @return boolean
     */
    function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('Users');
        return $query->num_rows() ? TRUE : FALSE;
    }   
    
 }