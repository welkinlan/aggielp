<?php

class Comment extends CI_Model {
	
	public function all_comments (){
		$this->db->select('uid, sid, comment,Review.rating,time, name, username');
		$this->db->from('Review');
		$this->db->join('Shops', 'Shops.id = Review.sid');
		$this->db->join('Users', 'Users.id = Review.uid');
		$this->db->order_by("time", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	public function get_user_comments()
    {
        $uid = $this->session->userdata('userid');
        //$sid  = $this->session->userdata('current_shop_id');
        $this->db->select('comment, name,sid');
		//$this->db->limit(5);
		$this->db->from('Review');
		$this->db->where('uid', $uid); 
		$this->db->join('Shops', 'Shops.id = Review.sid');
		
		$query = $this->db->get();
		return $query->result_array();
		
    }
    
    public function add_comment($sid)
    {
        $uid = $this->session->userdata('userid');
        $this->load->helper('date');
        $data = array(
            'uid'=>$uid,
            'sid'=>$sid,
            'comment'=>$this->input->post('comment'),
            'rating'=>$this->input->post('rate'),
        );
        $this->db->set('time', 'NOW()', FALSE);
        $this->db->insert('Review',$data);		
    }

    
    
    public function get_user_rating()
    {
        $uid = $this->session->userdata('userid');
        //$sid  = $this->session->userdata('current_shop_id');
        $this->db->select('Review.rating, name,sid');
		//$this->db->limit(5);
		$this->db->from('Review');
		$this->db->where('uid', $uid); 
		$this->db->join('Shops', 'Shops.id = Review.sid');
		
		$query = $this->db->get();
		return $query->result_array();   
		}

}