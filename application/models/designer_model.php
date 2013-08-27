<?php
class Designer_model extends CI_Model 
{
  function __construct() 
  {
	 parent::__construct();

  }
  
   function create_table()
   {
	   
	     $query=$this->db->query('CREATE TABLE IF NOT EXISTS designer (
			id int(11) NOT NULL AUTO_INCREMENT,
			designer_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			designer_phone_number varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			designer_picture varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			designer_email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			PRIMARY KEY (id)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci') ;
			
	$query=$this->db->query('CREATE TABLE IF NOT EXISTS designer_mapping (
				designer_id int(11) NOT NULL,
				user_id int(11) NOT NULL			
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci') ;
			
         $query=$this->db->query('CREATE TABLE IF NOT EXISTS paint_colors (
  id int(10) NOT NULL AUTO_INCREMENT,
  design_id varchar(30) NOT NULL,
  color varchar(30) NOT NULL,
  description varchar(1000) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1');

  $query=$this->db->query('CREATE TABLE IF NOT EXISTS designer_availability (
  id int(10) NOT NULL AUTO_INCREMENT,
  designer_id int(10) NOT NULL,
  status varchar(10) NOT NULL,
  time datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1');


$query=$this->db->query('CREATE TABLE IF NOT EXISTS designer_calls (
  id int(10) NOT NULL AUTO_INCREMENT,
  user_id int(10) NOT NULL,
  status varchar(10) NOT NULL,
  time datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1');
}
  
  
  // For Designer informetion
  function designer_information($id)
  {
	  $query=$this->db->query("SELECT designer.designer_name,designer.designer_email,
	  designer.designer_picture,designer.designer_phone_number 
	  FROM designer inner join designer_mapping 
	  on designer.id=designer_mapping.designer_id 
	  and designer_mapping.user_id=".$id."");
      return $query->result();
	  	  
   }
   
   function availability($data)
   {

	 $id = 1;
	 $date=$data['date'];
	
	 $startdate= date('Y-m-d', strtotime($date));
          
          $enddate=date("Y-m-d h:i", strtotime("$date +24 hours"));

	$query=(isset($data['display'])?$this->db->query("SELECT * from designer_availability 
		 WHERE designer_id = ".$id." AND  time >= '".$startdate."' AND time <= '".$enddate."'"):$this->db->query("SELECT * from designer_availability 
		 WHERE designer_id = ".$id." AND status = 'available' AND time >= '".$startdate."' AND time <= '".$enddate."'"));	 
    
	        if ($query->num_rows()==0)
		{
			return 0;
		}
		else
		{
		 return $query->result_array();
		}
   
      }
	  
function book($data)
   {
	
	$data['user_id']=$this->session->userdata('id');
	
	
	 $userid = $data['user_id'];

		
	$id = 1;
	
	$date=$data['date'];

	$timefind = date('Y-m-d H:i:s', strtotime($date));
	
	 
	$insert=array(
	'user_id'=>$userid,
	'time'=>$timefind);
	
	$update=array(
	'status'=>'busy');
	
	
	$this->db->insert('designer_calls', $insert);
	$this->db->where('time',$timefind);
	
	$this->db->update('designer_availability',$update);
	   
      }
      function insert_designer_availability($datetime,$designerid)
      {
	     $this->db->query("delete from designer_availability where DATE_FORMAT(time,'%Y-%m-%d %H') like '".date('Y-m-d H',strtotime($datetime))."%'");
             $data=array('designer_id'=>$designerid,'time'=>$datetime,'status'=>'available');
	    $this->db->insert('designer_availability',$data); 
      }
      function designer_time_for_user($currentmonth,$currentyear)
      {
	      
	          $this->db->where('user_id',$this->session->userdata('id'));
		 $this->db->where('month',$currentmonth);
		 $this->db->where('year',$currentyear);
		 $query=$this->db->get('designer_availability');
	          return $query->result();
      }
      function designer_call()
      {
	      $date=date("Y-m-d H:i:s");
	      $startdate= date('Y-m-d', strtotime($date));
	      $enddate=date("Y-m-d h:i", strtotime("$date +24 hours"));
	      
	      $this->db->where('time >=',$startdate);
	      $this->db->where('time <=',$enddate);
	      $this->db->where('user_id',$this->session->userdata('id'));
	      
	      $query=$this->db->get('designer_calls');
	     
	      return $query->result_array();
      }
      function update_designer_call()
      {
	      
	    $date=date("Y-m-d H:i:s");
	      
	    $startdate= date('Y-m-d', strtotime($date));
	    $enddate=date("Y-m-d H:i", strtotime("$date +24 hours"));
	    $this->db->query("update designer_availability set status='available' where time in (select time from designer_calls where (time >='".$startdate."' and time <='".$enddate."') and user_id=".$this->session->userdata('id').")");
	    
	    $this->db->where("time >=",$startdate);
	    
	    $this->db->where("time <=",$enddate);

	    $this->db->delete("designer_calls");

      }

	  
}
?>
