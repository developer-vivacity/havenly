<?php

Class Contest_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	
	
	function get_user_contests($userid) {
				
		$data = array();
		$this->db->where('userid', $userid);
		$this->db->where("status IN ('Completed', 'Saved')");
		$this->db->limit(20);
		$this->db->order_by("timestamp", "desc"); 
		$query=$this->db->get('contests');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}


	
function get_contest($contest_id) {
		$this->db->where('id', $contest_id);
		$query=$this->db->get('contests');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}

	
	}