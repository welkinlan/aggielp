<?php 
class Search_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function search_in_website()
	{
		$keyword = $this->input->post('keyword');
		$data = array('key' => ($keyword)? $keyword : null);
		if(!$data['key'])
			return null;
		else
		{
			$this->db->select('Shops.id, name');
			$this->db->from('Shops');
			$this->db->join('Menu', 'Menu.id = Shops.menuid');
			$this->db->like('LOWER(name)', strtolower($data['key']));
			$this->db->or_like('LOWER(addr)', strtolower($data['key']));
			$this->db->or_like('LOWER(dishes)', strtolower($data['key']));
			$this->db->distinct();
			$query = $this->db->get();
			return $query->result_array();
		}
	}	
}