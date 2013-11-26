<?php
class  vendor_model extends CI_Model 
{ 
	
	 function __construct() 
	 {
	   parent::__construct();

	 }

   function fetchvendors(){
	   $query =$this->db->query('SELECT DISTINCT vendor_name,vendors.vendor_id FROM `design`.`products` INNER JOIN `design`.`vendors` ON (`products`.`vendor_id` = `vendors`.`vendor_id`) LEFT JOIN `design`.`shoppingcart` ON (`shoppingcart`.`product_id` = `products`.`product_id`) WHERE `shoppingcart`.`ordered`= "yes"');	 
	      return $query->result();
		 
   }


function fetchVendorOrders($venID){
	$query =$this->db->query('SELECT users.first_name, users.last_name, users.email, users.phone, users.address, users.zipcode, products.product_name, products.price, products.ship_cost, products.ship_cost,shoppingcart .user_id, shoppingcart.id as shopID FROM `design`.`products` LEFT JOIN `design`.`shoppingcart` ON (`products`.`product_id` = `shoppingcart`.`product_id`) LEFT JOIN `design`.`users` ON (`shoppingcart`.`user_id` = `users`.`id`) WHERE `products`.`vendor_id` = "'.$venID.'" and `shoppingcart`.`ordered`="yes"');
	return $query->result();
	
}

}
?>
