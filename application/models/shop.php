<?phpclass Shop extends CI_Model {		public function shop_rating (){				$this->db->select('id, name, addr, rating');		$this->db->limit(5);		$this->db->from('Shops');		$this->db->order_by('rating', 'desc');				$query = $this->db->get();		return $query->result_array();			}			public function get_shop_detail($id){		$this->db->select('id, name, addr, rating');		$this->db->from('Shops');		$this->db->where('id', $id); 		$query = $this->db->get();		return $query->row_array();	}		public function get_shop_avg($id){		$this->db->select('id, name, addr, rating');		$this->db->from('Shops');		$this->db->where('id', $id); 		$query = $this->db->get();		return $query->row_array();	}	}