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

  $this->db->query("CREATE TABLE IF NOT EXISTS user_design(design_id int(10) NOT NULL,room_id int(10) NOT NULL,design_name varchar(100) NOT NULL)");
 
  $this->db->query("CREATE TABLE IF NOT EXISTS design_product_mapping(design_id int(10) NOT NULL,product_id int(10) NOT NULL)");
  

 }  

 //-----For Product Details 
 function get_all_product($pid=null)
  {	
	
	
	  $this->db->select('productid,product_name,link');
	  $this->db->from('products');
	  if($pid!="")   
	  $this->db->where('productid',$pid);
		
          return $this->db->get()->result(); 
  }
 //-------
 function  upload_design_info_user_room_design($userid=null,$roomid=null,$filename=null,$design_status=null,$designid=null)
 {
  	$data = array(
   'user_id' => $userid ,
   'room_id' => $roomid ,
   'design_id'=> $designid ,
   'design_status' => $design_status,
   'filename'=>$filename
     );

   $this->db->insert('user_room_designs', $data);    
 }
function save_product_associated_with_room($roomid=null,$productid=null,$product_design_plan=null,$design_id=null)
{
 // die(var_dump($productid));
   if($productid=="")
   {
    $this->db->from('products','product_room_mapping');
   
    $this->db->select('productid,product_name,link,Design_Plan'); 
   
    $this->db->join('product_room_mapping', 'products.productid = product_room_mapping.product_id');     
   
    $this->db->where('room_id',$roomid);  
    $this->db->distinct();
    $query=$this->db->get();
    return $query->result();
   }
   else
   {
           $product_id_have=array();
           foreach($productid as $designkey=>$designvalue)          
          {    
               if($designkey!="product")
               {               
               $this->db->where('design_id',$designkey);
               $this->db->delete('design_product_mapping');      
               } 
             foreach($designvalue as $key=>$value) 
              {
                $product_id_have[sizeof($product_id_have)]=$value;           
                
                if($designkey!="product")
                {      
                $data=array('design_id' => $designkey,'product_id' => $value);
                $this->db->insert('design_product_mapping',$data);
                }

              }

          }

            $product_id_have=array_unique($product_id_have);   
           
            $this->db->where('room_id',$roomid);
            $this->db->delete('product_room_mapping');      
       foreach($product_id_have as $productkey=>$productvalue)
       {

                $data = array('room_id' => $roomid ,'product_id' => $productvalue,'Design_Plan'=> $product_design_plan);
                $this->db->insert('product_room_mapping', $data);    
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


function search_product($product_name=null,$search_type=null,$search_price=null,$search_color=null,$search_style=null,$search_material=null)
{
	
	if(!empty($search_type))
	{
		$search_type=','.$search_type.',';
		$this->db->like("concat(',',product_type_id)",$search_type);
	}

       	
	if(!empty($search_style))
	{
	   $search_style=','.$search_style.',';
	   $this->db->like("concat(',',product_style_id)",$search_style);
        }

        if(!empty($search_material))
	{
	  $search_material=','.$search_material.',';
	  $this->db->like("concat(',',product_material_id)",$search_material);
	  
        }
        if(!empty($search_color))
	{
	  $search_color=','.$search_color.',';
	  $this->db->like("concat(',',product_color_id)",$search_color);
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
       $this->db->distinct();
	
       $query=$this->db->from('products','product_room_mapping');
	
       $this->db->join('product_room_mapping', 'products.productid = product_room_mapping.product_id','left');
       
       //$this->db->group_by('product_room_mapping.product_id');
       
       $this->db->group_by('products.productid');
       $this->db->order_by('count(product_room_mapping.room_id)', 'desc');
       
       $query = $this->db->get();	

 
       return $query->result();
}


function product_sort_by_type($producttypecheck,$productstylecheck,$productmaterialtypecheck,$productcolortypecheck,$searchoptionforprice)
{
	$_like='';
	
         $_typelike='';
	
	$_stylelike='';
	
	$_materiallike='';
	
	$_colorlike='';
	
         $_likeprice='';
    
	
	if(!empty($producttypecheck))
	{
	  
             $producttypecheck=explode(',',$producttypecheck);
             sort($producttypecheck);
             $producttypecheck=(implode(',',$producttypecheck));          
            $producttypecheck=','.$producttypecheck.',';
           if($_like=='')
           {        
           $_typelike=" concat(',',product_type_id) like '%".$producttypecheck."%'";	 
           $_like=1;
           }
	}
	if(!empty($productstylecheck))
	{
                

             $productstylecheck=explode(',',$productstylecheck);
             sort($productstylecheck);
             $productstylecheck=(implode(',',$productstylecheck));


		$productstylecheck=','.$productstylecheck.',';
                $_stylelike=($_like==""?" concat(',',product_style_id) like '%".$productstylecheck."%'":" and concat(',',product_style_id) like '%".$productstylecheck."%'");
 $_like=1;
	}
	if(!empty($productmaterialtypecheck))
	{
             $productmaterialtypecheck=explode(',',$productmaterialtypecheck);
             sort($productmaterialtypecheck);
             $productmaterialtypecheck=(implode(',',$productmaterialtypecheck));
                              

		$productmaterialtypecheck=','.$productmaterialtypecheck.',';
	        $_materiallike=($_like==""?" concat(',',product_material_id) like '%".$productmaterialtypecheck."%'":" and concat(',',product_material_id) like '%".$productmaterialtypecheck."%'");
	        $_like=1;	 
	}
	if(!empty($productcolortypecheck))
	{
        

             $productcolortypecheck=explode(',',$productcolortypecheck);
             sort($productcolortypecheck);
             $productcolortypecheck=(implode(',',$productcolortypecheck));

          $productcolortypecheck=','.$productcolortypecheck.',';
          $_colorlike=($_like==""?" concat(',',product_color_id) like '%".$productcolortypecheck."%'":" and concat(',',product_color_id) like '%".$productcolortypecheck."%'");
          $_like=1;
	}
	
	switch ($searchoptionforprice) 
	{
         case "1,2,3":
         $num=0;
         $_likeprice=   ($_like==""? " price>".$num."":" and price>".$num."");
         break;
         case "1,2":
         $num=500.00;
         $_likeprice=   ($_like==""? " price>=".$num."":" and price>=".$num."");
         break;
         case "2,3":
         $num=500;
         $_likeprice=   ($_like==""? " price<".$num."":" and price<".$num."");
         break;
         case "1,3":
         $_likeprice=   ($_like==""? " price<100 and price>=1000":" and price<100 and price>=1000");
         break;
         case "1":
         $_likeprice=   ($_like==""? "  price>=1000":" and price>=1000");
         break;
         case "2":
         $_likeprice=   ($_like==""? " price>=500 and price<1000":" and price>=500 and price<1000");
         break;
         case "3":
         $_likeprice=   ($_like==""? " price<100 ":" and price<100");
         break;
     }
	
$query=$this->db->query("select productid,product_name,vendor_id,price,rent_price,ship_cost,qty_in_stock,link,product_type_id,product_color_id,product_material_id,product_style_id,dimensions,description, 	note  from products  where ".$_typelike." ".$_stylelike." ".$_materiallike."  ". $_colorlike."  ".$_likeprice."
UNION
select productid,product_name,vendor_id,price,rent_price,ship_cost,qty_in_stock,link,product_type_id,product_color_id,product_material_id,product_style_id,dimensions,description, 	note from products where productid not in (select concat(',',productid)  from products  where ".$_typelike." ".$_stylelike." ".$_materiallike."  ". $_colorlike."  ".$_likeprice.")");	

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
function product_details_by_id($id)
{
	$this->db->where('productid',$id);
	$query=$this->db->get('products');
	return $query->result();
}
function userdesign($room_id=null,$design_id=null)
{
         $this->db->select('design_id,design_name'); 
         $this->db->where('room_id',$room_id);
         if($design_id!=null)
         $this->db->where('design_id',$design_id);	
	 $query=$this->db->get('user_design');
	 return $query->result();
}
function productassociatewithdesign($room_id,$designid)
{
       $this->db->from('design_product_mapping','user_design');
      
       $this->db->select('design_product_mapping.design_id,design_product_mapping.product_id');
       
       $this->db->join('user_design','design_product_mapping.design_id=user_design.design_id');
       
       $this->db->where('user_design.room_id',$room_id);
       $this->db->where('user_design.design_id',$designid);
       $this->db->order_by('user_design.design_id', 'asc');
      
      $query=$this->db->get();
   
       return $query->result();
}
function display_design_associated_products($design_id)
{
	$this->db->from('design_product_mapping','products');
	$this->db->select('products.product_name,products.link');
	$this->db->join('products','design_product_mapping.product_id=products.productid');
	
	 $this->db->where('design_product_mapping.design_id',$design_id);
	
	$query = $this->db->get();	
         
         return $query->result();
}
function  design_image_for_rooms($room_id,$designid)
{
	 $this->db->where('room_id',$room_id);
         $this->db->where('design_id',$designid);
	 $this->db->from('user_room_designs');
	 $this->db->select('filename');
         $query = $this->db->get();	
	 return $query->result();
}
function Add_Design_For_Room($room_id,$design_name,$design_id)
{
	if($design_id=="" & $design_name!="not submitted")
	{
	   $data=array("room_id"=>$room_id,"design_name"=>$design_name);
	   $this->db->insert('user_design',$data);
         }
	
	
}
}

?>
