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
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69') ;
			
	$query=$this->db->query('CREATE TABLE IF NOT EXISTS designer_mapping (
				designer_id int(11) NOT NULL,
				user_id int(11) NOT NULL			
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69') ;
			
         $query=$this->db->query('CREATE TABLE IF NOT EXISTS paint_colors (
  id int(10) NOT NULL AUTO_INCREMENT,
  design_id varchar(30) NOT NULL,
  color varchar(30) NOT NULL,
  description varchar(1000) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24');

  $query=$this->db->query('CREATE TABLE IF NOT EXISTS designer_availability (
  designer_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  day int(10) NOT NULL,
  week_day int(11) NOT NULL,
  week_number int(10) NOT NULL,
  month int(10) NOT NULL,
  year int(10) NOT NULL,
  start_time time NOT NULL,
  end_time time NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
');
}
  
  
  // For Designer informetion
  function designer_information($id)
  {
	  $query=$this->db->query("SELECT designer.designer_name,designer.designer_email,designer.designer_email,
	  designer.designer_picture,designer.designer_phone_number 
	  FROM designer inner join designer_mapping 
	  on designer.id=designer_mapping.designer_id 
	  and designer_mapping.user_id=".$id."");
      return $query->result();
	  	  
   }
   
   function availability($data)
   {
	
	//$data['user_id']=$this->session->userdata('id');
	
	
	 // $userid = $data['user_id'];
		
	 // $query = $this->db->query("SELECT designer_id FROM designer_mapping WHERE user_id=".$userid."");
	 // $id=$query->result_array();
		
	 // foreach ($id as $des){
			 // $id=$des['designer_id'];
			 // }
		
		$id = 1;
		
	 $date=$data['date'];
	 $startdate= date('y-m-d', strtotime($date));
	 $enddate=date("y-m-d h:i", strtotime("$date +24 hours"));
		 $query = $this->db->query("SELECT * from designer_availability 
		 WHERE designer_id = ".$id." AND status = 'available' AND time >= '".$startdate."' AND time <= '".$enddate."'");
		
		if ($query->num_rows()==0)
		{return 0;}
		else{
		 return $query->result_array();		}
   
      }
	  
function book($data)
   {
	
	$data['user_id']=$this->session->userdata('id');
	
	
	 $userid = $data['user_id'];
		
	 // $query = $this->db->query("SELECT designer_id FROM designer_mapping WHERE user_id=".$userid."");
	 // $id=$query->result_array();
		
	 // foreach ($id as $des){
			 // $id=$des['designer_id'];
			 // }
		
	$id = 1;
	$date=$data['date'];
		$timefind = date('y-m-d h:i:s', strtotime($date));
	$insert=array(
	'user_id'=>$userid,
	'time'=>$timefind);
	
	$update=array(
	'status'=>'busy');
	
	
	$this->db->insert('designer_calls', $insert);
	
	$this->db->where('time',$timefind);
	$this->db->update('designer_availability',$update);
		
		   
      }
       function insert_designer_availability($userid,$designerid,$date,$day,$currentyear,$currentmonth,$shour,$sminute,$ehour,$eminute,$weeknumber,$type)
      {
              
              if($type=='insert')
              {
                   $this->db->where('designer_id',$designerid);
		 $this->db->where('user_id',$userid);
		 $this->db->where('month',$currentmonth);
		 $this->db->where('year',$currentyear);
                   $this->db->where('week_number',$weeknumber);
                   
                   $query=$this->db->get('designer_availability');
                   $weektime=$query->result();
                   
                   
                   $this->db->where('designer_id',$designerid);
		 $this->db->where('user_id',$userid);
		 $this->db->where('month',$currentmonth);
		 $this->db->where('year',$currentyear);
                   $this->db->where('week_number',$weeknumber);
                   $this->db->delete('designer_availability');              
              
                   $starttime=$shour.":".$sminute;
                   $endtime=$ehour.":".$eminute;
	      
	      $data=array('designer_id'=>$designerid,'user_id'=>$userid,'day'=>$date,'week_day'=>$day,'week_number'=>$weeknumber,'month'=>$currentmonth,'year'=>$currentyear,'start_time'=>$starttime,'end_time'=>$endtime);
	      $this->db->insert('designer_availability',$data);
	      return $weektime;
	 }
	 elseif($type=='delete')
	 {
		 $this->db->where('designer_id',$designerid);
		 $this->db->where('user_id',$userid);
		 $this->db->where('day',$date);
		 $this->db->where('week_day',$day);
		 $this->db->where('month',$currentmonth);
		 $this->db->where('year',$currentyear);
		 $this->db->delete('designer_availability');
	 }
	 else
	 {
		 $this->db->where('designer_id',$designerid);
		 $this->db->where('user_id',$userid);
		 $this->db->where('month',$currentmonth);
		 $this->db->where('year',$currentyear);
		 $query=$this->db->get('designer_availability');
	         
	         
	          return $query->result();

		 
	  }
      }
      function designer_time_for_user($currentmonth,$currentyear)
      {
	      
	          $this->db->where('user_id',$this->session->userdata('id'));
		 $this->db->where('month',$currentmonth);
		 $this->db->where('year',$currentyear);
		  $query=$this->db->get('designer_availability');
	         
	         
	          return $query->result();
      }

	  
}
?>
