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

  $this->db->query("CREATE TABLE IF NOT EXISTS products(product_id int(10) NOT NULL AUTO_INCREMENT,vendor_id int(10) NOT NULL,product_name varchar(100) NOT NULL,price decimal(10,2) NOT NULL,rent_price decimal(10,2) NOT NULL,ship_cost decimal(10,2) NOT NULL ,qty_in_stock  int(10) NOT NULL,weblink text NOT NULL,
product_type_id varchar(100) NOT NULL,product_color_id varchar(100) NOT NULL,product_material_id varchar(100) NOT NULL,
description varchar(300) NULL, dimensions varchar(50) NULL, note varchar(100) NULL, material_name varchar(300) NULL, color_name varchar (300) NULL, PRIMARY KEY(product_id))");

  $this->db->query("CREATE TABLE IF NOT EXISTS product_image(product_id int(10) NOT NULL,filename varchar(50) NOT NULL)");

  $this->db->query("CREATE TABLE IF NOT EXISTS product_type(type_id int(10) NOT NULL AUTO_INCREMENT,type varchar(50) NOT NULL,PRIMARY KEY(type_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_colors(color_id int(10) NOT NULL AUTO_INCREMENT,color varchar(50) NOT NULL,PRIMARY KEY(color_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_material(material_id int(10) NOT NULL AUTO_INCREMENT,material varchar(100) NOT NULL,PRIMARY KEY(material_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_color(color_id int(10) NOT NULL AUTO_INCREMENT,color varchar(100) NOT NULL,PRIMARY KEY(color_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS vendors(vendor_id int(10) NOT NULL AUTO_INCREMENT,vendor_name varchar(100) NOT NULL,address varchar(100) NULL,
phone_number varchar(50)  NULL,
contact varchar(100)  NULL,website_link varchar(100) NULL, PRIMARY KEY(vendor_id))");

 $this->db->query("CREATE TABLE IF NOT EXISTS product_room_mapping(room_id int(10) NOT NULL,product_id varchar(100) NOT NULL,status varchar(50) NOT NULL,
timestamp timestamp NOT NULL)");


  $this->db->query("CREATE TABLE IF NOT EXISTS user_design (
  design_id int(10) NOT NULL AUTO_INCREMENT,
  room_id int(10) NOT NULL,
  design_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  status varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  designer_notes varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (design_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=134");
 
  $this->db->query("CREATE TABLE IF NOT EXISTS design_product_mapping(design_id int(10) NOT NULL,product_id int(10) NOT NULL)");
  

 }  

 //-----For Product Details 
 function get_all_product($pid=null)
  {	
		  $this->db->select('products.product_id, filename, product_name,color_name, material_name, weblink,dimensions,description,ship_cost,time_to_ship,ship_cost,price');
		  $this->db->from('products');
		  $this->db->join('product_image','products.product_id=product_image.product_id','left outer');
		  if($pid!="")   
		  $this->db->where('products.product_id',$pid);
		  $this->db->where('product_image.type','main');
			return $this->db->get()->result(); 
  }
  
  function get_all_products_and_images($pid)
  
  { 	 $this->db->select('products.product_id, filename, product_name,color_name, material_name, weblink,dimensions,description,ship_cost,time_to_ship,ship_cost,price');
		  $this->db->from('products');
		  $this->db->join('product_image','products.product_id=product_image.product_id','left outer');
		  if($pid!="")   
		  $this->db->where('products.product_id',$pid);
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

   if($productid=="")
   {
    $this->db->from('products','product_room_mapping');
   
    $this->db->select('products.product_id, filename, product_name,weblink,Design_Plan'); 
   
    $this->db->join('product_room_mapping', 'products.product_id = product_room_mapping.product_id');
	$this->db->join('product_image', 'products.product_id = product_image.product_id');  	
   
    $this->db->where('room_id',$roomid);  
	 $this->db->where('product_image.type','main');  
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
               $this->db->where('design_product_mapping.design_id',$designkey);
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
          $this->db->select('color_id,color');
          $this->db->like('color', $text);	
          $query = $this->db->get('product_color');
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
	  $data=array('product_id'=>$product_id,'filename'=>$link_array[$i]['filename'], 'type'=>$link_array[$i]['type']);	
	  $this->db->insert("product_image", $data);    
           }
	  $i=$i+1;
	}

}




function filter_products($product_type, $product_color, $product_color, $product_material)

{
	if ($product_type !="")
	{
		
		$product_type_separate = explode(",", $product_type);
		$product_type_array = array_map('intval', $product_type_separate);
		$this->db->where_in('product_type_id',$product_type_array);
		
	}
	
	if ($product_color !="")
	{
		$product_color_separate = explode(",", $product_color);
		$product_color_array = array_map('intval', $product_color_separate);
	
		$this->db->where_in('product_color_id', $product_color_array);
	}
	
		if ($product_color !="")
	{
		$product_color_separate = explode(",", $product_color);
		$product_color_array = array_map('intval', $product_color_separate);
		$this->db->where_in('product_color_id', $product_color_array);
	}
	
	
	if ($product_material !="")
	{
	
		$product_material_separate = explode(",", $product_material);
		$product_material_array = array_map('intval', $product_material_separate);
		$this->db->where_in('product_material_id', $product_material_array);
	}
	
		$this->db->where('product_image.type','main');
		$this->db->from('products');
		$this->db->join('product_image', 'product_image.product_id=products.product_id','left');
		$query = $this->db->get();
		return $query->result();

}


function search_product_name($productname)
{
	$this->db->like('product_name', $productname);
	$this->db->or_like ('material_name', $productname);
	$this->db->or_like ('color_name', $productname);
	$this->db->or_like ('vendor_name', $productname);
	$this->db->or_like ('description', $productname);
	$this->db->or_like ('color', $productname);
	$this->db->or_like ('product_type.type', $productname);
	$this->db->or_like ('material', $productname);
	$this->db->where('product_image.type','main');
	$this->db->select('products.*, filename');
	$this->db->from('products');
	$this->db->join('vendors', 'products.vendor_id = vendors.vendor_id', 'left');
	$this->db->join('product_type', 'products.product_type_id = product_type.type_id', 'left');
	$this->db->join('product_color', 'products.product_color_id=product_color.color_id', 'left');
	$this->db->join('product_material', 'products.product_material_id=product_material.material_id','left');
	$this->db->join('product_image', 'product_image.product_id=products.product_id','left');
	$this->db->group_by('products.product_id');
	$query = $this->db->get();
	return $query->result();
}

function product_sort_by_type($producttypecheck,$productcolorcheck,$productmaterialtypecheck,$productcolortypecheck,$searchoptionforprice)
{

	$_like='';
	
    $_typelike='';
	
	$_colorlike='';
	
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
	if(!empty($productcolorcheck))
	{
                

             $productcolorcheck=explode(',',$productcolorcheck);
             sort($productcolorcheck);
             $productcolorcheck=(implode(',',$productcolorcheck));


		$productcolorcheck=','.$productcolorcheck.',';
                $_colorlike=($_like==""?" concat(',',product_color_id) like '%".$productcolorcheck."%'":" and concat(',',product_color_id) like '%".$productcolorcheck."%'");
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
	
$query=$this->db->query("select product_id,product_name,vendor_id,price,rent_price,ship_cost,qty_in_stock,link,product_type_id,product_color_id,product_material_id,product_color_id,dimensions,description, 	note  from products  where ".$_typelike." ".$_colorlike." ".$_materiallike."  ". $_colorlike."  ".$_likeprice."
UNION
select product_id,product_name,vendor_id,price,rent_price,ship_cost,qty_in_stock,link,product_type_id,product_color_id,product_material_id,product_color_id,dimensions,description, 	note from products where product_id not in (select concat(',',product_id)  from products  where ".$_typelike." ".$_colorlike." ".$_materiallike."  ". $_colorlike."  ".$_likeprice.")");	

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
	$this->db->where('product_id',$id);
	$query=$this->db->get('products');
	return $query->result();
}
function userdesign($room_id=null,$design_id=null)
{
         $this->db->select('design_id,design_name,status,designer_notes'); 
         $this->db->where('room_id',$room_id);
         if($design_id!=null)
         $this->db->where('user_design.design_id',$design_id);
         $this->db->where('status !=','close');	
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


function display_products($design_id)
{
	
	$this->db->select('products.*');
	$this->db->where('design_id', $design_id);
	$this->db->from('design_product_mapping');
	$this->db->join('products','products.product_id=design_product_mapping.product_id');
	$this->db->join('product_image','products.product_id=product_image.product_id', 'left');
	$query = $this->db->get();
	
return $query->result();
}


function display_design_associated_products($design_id,$status=null)
{
	
       ($status==null?$this->db->from('design_product_mapping','products','vendors','product_image'):$this->db->from('design_product_mapping','products','user_design', 'product_image','vendors'));
       $this->db->select('products.*,product_image.filename,((CAST(products.price AS UNSIGNED)*CAST(vendors.shipping_percent AS UNSIGNED))/100+CAST(vendors.shipping_flat AS UNSIGNED)) as ven_shipping');
        
        $this->db->join('products','design_product_mapping.product_id=products.product_id');
        $this->db->join('vendors','vendors.vendor_id=products.vendor_id');
	if($status!=null)
	{
	$this->db->join('product_image','products.product_id=product_image.product_id');		
	$this->db->join('user_design','user_design.design_id=design_product_mapping.design_id');
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.This join find variant key of the product from shopify_product_variant table.........	
	 $this->db->join('shopify_product_variant','shopify_product_variant.product_id=products.product_id', 'left');
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	 $this->db->where('user_design.status',$status);
	 $this->db->where('product_image.type','main');
	}
	else
	{
	$this->db->join('product_image','products.product_id=product_image.product_id');	
	$this->db->order_by('products.product_id', 'asc');
	}
	    $this->db->where('design_product_mapping.design_id',$design_id);
		$this->db->group_by('products.product_id');
	    $query = $this->db->get();	
     //die($this->db->last_query());
        return $query->result();
}
function  design_image_for_rooms($room_id=null,$designid=null)
{
			if($designid!="")
			$this->db->where('design_id',$designid);
	 		$this->db->select('user_room_designs.filename');
			$query = $this->db->get('user_room_designs');
			return $query->result();
}
function Add_Design_For_Room($design_name,$design_id,$design_status=null)
{
	
if(($design_id=="" || $design_id=="null") & $design_name!="not submitted")
	{
	   $data=array("room_id"=>$room_id,"design_name"=>$design_name);
	   $this->db->insert('user_design',$data);
	 
	   return $this->db->insert_id();
	   
         }
         elseif($design_id!="")
         {
			
          $this->db->where('design_id',$design_id);
         
          $data=array('status'=>$design_status,'design_name'=>$design_name);
          $this->db->update('user_design',$data);
          return $design_id;
	}

}
function paint_color_delete($design_id, $id)
{
	$this->db->where('design_id',$design_id);
	$this->db->where('id',$id);
	$this->db->delete('paint_colors');
	
}
function paint_colors_for_design($design_id,$color_code,$description)
{
	
	$data=array('design_id'=>$design_id,'color'=>$color_code,'description'=>$description);
	$this->db->insert('paint_colors',$data);
        return $this->db->insert_id();
}

function update_designer_notes($design_id,$designernotes)
{
	$this->db->where('design_id',$design_id);
	$data=array('designer_notes'=>$designernotes);
	$this->db->update('user_design',$data);
	
	
}
function get_paint_color($design_id)
{
	$this->db->where('design_id',$design_id);
	$query=$this->db->get('paint_colors');
         return $query->result();
}
function valid_user($room_id,$user_id,$design_id)
{
	$this->db->from('user_design','user_rooms');
	
	$this->db->join('user_rooms','user_design.room_id=user_rooms.id');
	$this->db->where('user_rooms.user_id',$user_id);
	$this->db->where('user_design.design_id',$design_id);
	$this->db->where('user_design.room_id',$room_id);
	$query=$this->db->get();
	
	return $query->num_rows();
}


function update_assignproducts($design_id,$data)
{


         $this->db->where('design_id',$design_id);
        $this->db->update('user_design',$data);

}

}

?>
