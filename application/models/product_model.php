<?php
class Product_model extends CI_Model 
{ 
	 function __construct() 
	 {
	   parent::__construct();

	 }
  function create_table()
  { 
  
  $this->db->query("CREATE TABLE IF NOT EXISTS user_room_designs(user_id int(10) NOT NULL,
room_id int(10) NOT NULL,design_status varchar(100) NOT NULL,filename varchar(100) NOT NULL)");

  $this->db->query("CREATE TABLE IF NOT EXISTS products(productid int(10) NOT NULL AUTO_INCREMENT,vendor_id int(10) NOT NULL,product_name varchar(100) NOT NULL,price decimal(10,2) NOT NULL,rent_price decimal(10,2) NOT NULL,ship_cost decimal(10,2) NOT NULL ,qty_in_stock  int(10) NOT NULL,link varchar(200) NOT NULL,
product_type_id varchar(100) NOT NULL,product_color_id varchar(100) NOT NULL,product_material_id varchar(100) NOT NULL,product_style_id varchar(100) NOT NULL,
description varchar(300) NOT NULL,dimensions varchar(50) NOT NULL,note varchar(100) NOT NULL,PRIMARY KEY(productid))");

  $this->db->query("CREATE TABLE IF NOT EXISTS product_image(product_id int(10) NOT NULL,filename varchar(50) NOT NULL)");

  $this->db->query("CREATE TABLE IF NOT EXISTS product_type(type_id int(10) NOT NULL AUTO_INCREMENT,type varchar(50) NOT NULL,PRIMARY KEY(type_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_colors(color_id int(10) NOT NULL AUTO_INCREMENT,color varchar(50) NOT NULL,PRIMARY KEY(color_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_material(material_id int(10) NOT NULL AUTO_INCREMENT,material varchar(100) NOT NULL,PRIMARY KEY(material_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_style(style_id int(10) NOT NULL AUTO_INCREMENT,style varchar(100) NOT NULL,PRIMARY KEY(style_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS vendors(vendor_id int(10) NOT NULL AUTO_INCREMENT,vendor_name varchar(100) NOT NULL,address varchar(100) NOT NULL,
phone_number varchar(50) NOT NULL,
contact varchar(100) NOT NULL,website_link varchar(100) NOT NULL, PRIMARY KEY(vendor_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_room_mapping(room_id int(10) NOT NULL,product_id varchar(100) NOT NULL,status varchar(50) NOT NULL,
timestamp timestamp NOT NULL)");


 }  

 //-----For Product Details 
 function get_all_product($orderby=null)
  {	    
	
		$query=$this->db->query("select *from products ".$orderby."");
		return $query->result();; 
  }
 //-------
 function  upload_design_info_user_room_design($userid=null,$roomid=null,$filename=null,$design_status=null)
 {
   $this->db->where('user_id',$userid);
   $this->db->where('room_id',$roomid);
   
   if($this->db->count_all('user_room_designs')=="")
   {
	
	$data = array(
   'user_id' => $userid ,
   'room_id' => $roomid ,
   'design_status' => $design_status,
   'filename'=>$filename
     );

   $this->db->insert('user_room_designs', $data);    
   }
   else
   {
	  $data = array(
      'design_status' => $design_status,
      'filename'=>$filename
      );
      $this->db->update('user_room_designs', $data);    
   }
 }

function save_product_associated_with_room($roomid=null,$productid=null)
{
	
      $this->db->where('room_id',$roomid);
      
      if($productid=="")
      {
        $query=$this->db->get('product_room_mapping');
	    return $query->result();
      }
    else
    {
      if($this->db->count_all_results('product_room_mapping')==0)
      {
      
       $data = array(
         'room_id' => $roomid ,
         'product_id' => $productid 
        );
        
         $this->db->insert('product_room_mapping', $data);    
     }
     else
     {
	  
	   $data = array(
    'product_id' => $productid 
        );
	   
	   $this->db->update('product_room_mapping', $data);    
    }
  }
	
} 
function product_search($text=null,$id=null)
{
	if($id==1)
	{
       $this->db->select('style_id,style');
       $this->db->like('style', $text);	
       $query = $this->db->get('product_style');
    }
    elseif($id==2)
    {
	   $this->db->select('color_id,color');
       $this->db->like('color', $text);	
       $query = $this->db->get('product_colors');
	}
	elseif($id==3)
	{
		$this->db->select('material_id,material');
		$this->db->like('material', $text);	
        $query = $this->db->get('product_material');
	}
	elseif($id==4)
	{
		$this->db->select('type_id,type');
		$this->db->like('type', $text);	
        $query = $this->db->get('product_type');
	}
    return $query->result(); 	
}
function get_vendors_details()
{
	$this->db->select('vendor_id,vendor_name');
	$query=$this->db->get('vendors');
	return $query->result(); 	
}
function insert_data_in_db($tablename,$data)
{
	
	 $this->db->insert($tablename, $data);    
	 return $this->db->insert_id();
	
}
function insert_data_in_product_table($data)
{
	$this->db->insert("products", $data);    
	return  $this->db->insert_id();
	
}
function insert_image_link_with_product_id($product_id,$link_array)
{
	$i=0;
	while($i<sizeof($link_array))
	{
	  if($link_array[$i]!="")
	  {
	  $data=array('product_id'=>$product_id,'filename'=>$link_array[$i]);	
	  $this->db->insert("product_image", $data);    
      }
	 $i=$i+1;
	}

}
function search_product($product_name=null,$search_type=null,$search_price=null)
{
	$search_type=trim($search_type);
	if(!empty($search_type))
	{
	   $search_type=explode(',',$search_type);
	   $search_type_id="";
	  foreach($search_type as $key=>$value)
	  {
	    $value=$value.',';
	    if($search_type_id=="")	
	    {
	    $this->db->like('product_type_id',$value);
        $search_type_id=1;
        }
	    else
	    {
	    $this->db->or_like('product_type_id', $value);
        }
	  }
   }    
	$this->db->like('product_name', $product_name); 
	switch ($search_price) 
	{
         case "1,2,3":
         $num=0;
         $this->db->where('price >',$num); 
         break;
         case "1,2":
         $num=500.00;
         $this->db->where('price >=',$num); 
         break;
         case "2,3":
         $num=500;
         $this->db->where('price <',$num); 
         break;
         case "1,3":
         $num=100;
         $this->db->where('price <',$num);
         $num=1000;
         $this->db->or_where('price >=',$num); 
         break;
         case "1":
         $num=1000.00;
         $this->db->where('price >=',$num);
         
         break;
         case "2":
         $num=500;
         $this->db->where('price >=',$num);
         $num=1000;
         $this->db->where('price <',$num);
         break;
         case "3":
         $num=100;
         $this->db->where('price <',$num);
         break;
}
	$query=$this->db->get('products');
	//echo $this->db->last_query();
	//die();
	return $query->result();
}

function product_sort_by_type($producttypecheck,$productstylecheck,$productmaterialtypecheck,$productcolortypecheck)
{
	$_like="";
	$_not_like="";
	if(!empty($producttypecheck))
	{
		$producttypecheck=explode(',',$producttypecheck);
	   foreach($producttypecheck as $key=>$value)	
		{
			$value=$value.',';
			if($_like=="")
			{
			$_like=" product_type_id like '%".$value."%'";
		    $_not_like=" product_type_id not like '%".$value."%'";
		    }
			else
			{
			$_like=$_like." or product_style_id like '%".$value."%'";
		    $_not_like=$_not_like." or product_style_id not like '%".$value."%'";
		    }
		}
		
	}
	if(!empty($productstylecheck))
	{
		
		  $productstylecheck=explode(',',$productstylecheck);
	   foreach($productstylecheck as $key=>$value)	
		{
			$value=$value.',';
			if($_like=="")
			{
			$_like=" product_style_id like '%".$value."%'";
		    $_not_like=" product_style_id not like '%".$value."%'";
		    }
			else
			{
			$_like=$_like." or product_style_id like '%".$value."%'";
		    $_not_like=$_not_like." or product_style_id not like '%".$value."%'";
		    }
		}
	}
	if(!empty($productmaterialtypecheck))
	{
		
		  $productmaterialtypecheck=explode(',',$productmaterialtypecheck);
	   foreach($productmaterialtypecheck as $key=>$value)	
		{
			$value=$value.',';
			if($_like=="")
			{
			$_like=" product_material_id like '%".$value."%'";
		    $_not_like=" product_material_id not like '%".$value."%'";
		    }
			else
			{
			$_like=$_like." or product_material_id like '%".$value."%'";
		    $_not_like=$_not_like." or product_material_id not like '%".$value."%'";
		    }
		}
	}
	if(!empty($productcolortypecheck))
	{

	   $productcolortypecheck=explode(',',$productcolortypecheck);
	   foreach($productcolortypecheck as $key=>$value)	
		{
			$value=$value.',';
			if($_like=="")
			{
		
			$_like=" product_color_id like '%".$value."%'";
		    $_not_like=" product_color_id not like '%".$value."%'";
		    }
			else
			{
			$_like=$_like." or product_color_id like '%".$value."%'";
		    $_not_like=$_not_like." or product_color_id like '%".$value."%'";
		    }
		}
	}
$query=$this->db->query("select *from products where ".$_like." 
union
select *from products where ".$_not_like."");	

return $query->result();	
	
}
function product_type()
{
    $query=$this->db->get('product_type');
	return $query->result();
	
}
function color_type()
{
    $query=$this->db->get('product_colors');
	return $query->result();
	
}
function product_material()
{
    $query=$this->db->get('product_material');
	return $query->result();
	
}
function product_style()
{
    $query=$this->db->get('product_style');
	return $query->result();
	
}
}

?>
