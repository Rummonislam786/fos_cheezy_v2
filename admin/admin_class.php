<?php
session_start();
Class Action {
	private $db;
	private $db2;
	private $db3;
	private $db4;


	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn1;
    $this->db2 = $conn2;
    $this->db3 = $conn3;
    $this->db4 = $conn4;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM `users` where username = '".$username."' ");
		if($qry->num_rows > 0){
			$result = $qry->fetch_array();
			$is_verified = password_verify($password, $result['password']);
			if($is_verified){
			foreach ($result as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
			}
		}
			return 3;
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM user_info where email = '".$email."' ");
		if($qry->num_rows > 0){
			$result = $qry->fetch_array();
			$is_verified = password_verify($password, $result['password']);
			if($is_verified){
				foreach ($result as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
				$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_user_id']."' where client_ip ='$ip' ");
					return 1;
			}
		}
			return 3;
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$data = " `name` = '$name' ";
		$data .= ", `username` = '$username' ";
		$data .= ", `password` = '$password' ";
		$data .= ", `type` = '$type' ";
		$data .= ", `branch` = '$branch' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
			$save2 = $this->db2->query("INSERT INTO users set ".$data);
			$save3 = $this->db3->query("INSERT INTO users set ".$data);
			$save4 = $this->db4->query("INSERT INTO users set ".$data);
			
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
			$save2 = $this->db2->query("UPDATE users set ".$data." where id = ".$id);
			$save3 = $this->db3->query("UPDATE users set ".$data." where id = ".$id);
			$save4 = $this->db4->query("UPDATE users set ".$data." where id = ".$id);
			
		}
		if($save && $save2 && $save3 && $save4){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", password = '$password' ";
		$data .= ", branch = '$branch' ";
		$chk = $this->db->query("SELECT * FROM user_info where email = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO user_info set ".$data);
			$save2 = $this->db2->query("INSERT INTO user_info set ".$data);
			$save3 = $this->db3->query("INSERT INTO user_info set ".$data);
			$save4 = $this->db4->query("INSERT INTO user_info set ".$data);
		if($save && $save2 && $save3 && $save4){
			$login = $this->login2();
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";
		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
			$save2 = $this->db2->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
			$save3 = $this->db3->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
			$save4 = $this->db4->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
			$save2 = $this->db2->query("INSERT INTO system_settings set ".$data);
			$save3 = $this->db3->query("INSERT INTO system_settings set ".$data);
			$save4 = $this->db4->query("INSERT INTO system_settings set ".$data);
		}
		if($save && $save2 && $save3 && $save4){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	
	function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
			$save2 = $this->db2->query("INSERT INTO category_list set ".$data);
			$save3 = $this->db3->query("INSERT INTO category_list set ".$data);
			$save4 = $this->db4->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where id=".$id);
			$save2 = $this->db2->query("UPDATE category_list set ".$data." where id=".$id);
			$save3 = $this->db3->query("UPDATE category_list set ".$data." where id=".$id);
			$save4 = $this->db4->query("UPDATE category_list set ".$data." where id=".$id);
		}
		if($save && $save2 && $save3 && $save4)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		$delete2 = $this->db2->query("DELETE FROM category_list where id = ".$id);
		$delete3 = $this->db3->query("DELETE FROM category_list where id = ".$id);
		$delete4 = $this->db4->query("DELETE FROM category_list where id = ".$id);
		if($delete && $delete2 && $delete3 && $delete4)
			return 1;
	}
	function save_menu(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";
		if(isset($status) && $status  == 'on')
		$data .= ", status = 1 ";
		else
		$data .= ", status = 0 ";

		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product_list set ".$data);
			$save2 = $this->db2->query("INSERT INTO product_list set ".$data);
			$save3 = $this->db3->query("INSERT INTO product_list set ".$data);
			$save4 = $this->db4->query("INSERT INTO product_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
			$save2 = $this->db2->query("UPDATE product_list set ".$data." where id=".$id);
			$save3 = $this->db3->query("UPDATE product_list set ".$data." where id=".$id);
			$save4 = $this->db4->query("UPDATE product_list set ".$data." where id=".$id);
		}
		if($save && $save2 && $save3 && $save4)
			return 1;
	}

	function delete_menu(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
		$delete2 = $this->db2->query("DELETE FROM product_list where id = ".$id);
		$delete3 = $this->db3->query("DELETE FROM product_list where id = ".$id);
		$delete4 = $this->db4->query("DELETE FROM product_list where id = ".$id);
		if($delete && $delete2 && $delete3 && $delete4)
			return 1;
	}
	function delete_cart(){
		extract($_GET);
		$delete = $this->db->query("DELETE FROM cart where id = ".$id);
		if($delete)
			header('location:'.$_SERVER['HTTP_REFERER']);
	}
	function clear_cart(){
		if(isset($_SESSION['login_user_id'])){
			$delete = $this->db->query("DELETE FROM cart where user_id = ".$_SESSION['login_user_id']);
			if($delete)
				header('location:'.$_SERVER['HTTP_REFERER']);
		}else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$delete = $this->db->query("DELETE FROM cart where client_ip = '$ip'");
			if($delete)
				header('location:'.$_SERVER['HTTP_REFERER']);
		}
	}
	function add_to_cart(){
		extract($_POST);
		$data = " product_id = $pid ";	
		$qty = isset($qty) ? $qty : 1 ;
		$data .= ", qty = $qty ";	
		if(isset($_SESSION['login_user_id'])){
			$data .= ", user_id = '".$_SESSION['login_user_id']."' ";	
		}else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$data .= ", client_ip = '".$ip."' ";	
		}
		$save = $this->db->query("INSERT INTO cart set ".$data);
		if($save)
			return 1;
	}
	function get_cart_count(){
		extract($_POST);
		if(isset($_SESSION['login_user_id'])){
			$where =" where user_id = '".$_SESSION['login_user_id']."'  ";
		}
		else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
			$where =" where client_ip = '$ip'  ";
		}
		$get = $this->db->query("SELECT sum(qty) as cart FROM cart ".$where);
		if($get->num_rows > 0){
			return $get->fetch_array()['cart'];
		}else{
			return '0';
		}
	}

	function update_cart_qty(){
		extract($_POST);
		$data = " qty = $qty ";
		$save = $this->db->query("UPDATE cart set ".$data." where id = ".$id);
		if($save)
		return 1;	
	}

	function save_order(){
		extract($_POST);
		$data = " name = '".$first_name." ".$last_name."' ";
		$data .= ", address = '$address' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", email = '$email' ";
		$save = $this->db->query("INSERT INTO orders set ".$data);
		$save2 = $this->db2->query("INSERT INTO orders set ".$data);
		$save3 = $this->db3->query("INSERT INTO orders set ".$data);
		$save4 = $this->db4->query("INSERT INTO orders set ".$data);
		if($save && $save2 && $save3 && $save4){
			$id = $this->db->insert_id;
			$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_user_id']);
			while($row= $qry->fetch_assoc()){

					$data = " order_id = '$id' ";
					$data .= ", product_id = '".$row['product_id']."' ";
					$data .= ", qty = '".$row['qty']."' ";
					$save21=$this->db->query("INSERT INTO order_list set ".$data);
					$save22=$this->db2->query("INSERT INTO order_list set ".$data);
					$save23=$this->db3->query("INSERT INTO order_list set ".$data);
					$save24=$this->db4->query("INSERT INTO order_list set ".$data);
					if($save21 && $save22 && $save23 && $save24){
						$this->db->query("DELETE FROM cart where id= ".$row['id']);
					}
			}
			return 1;
		}
	}

	function confirm_order(){
		extract($_POST);
		$save = $this->db->query("UPDATE orders set status = $status where id= $id");
		$save2 = $this->db2->query("UPDATE orders set status = $status where id= $id");
		$save3 = $this->db3->query("UPDATE orders set status = $status where id= $id");
		$save4 = $this->db4->query("UPDATE orders set status = $status where id= $id");
		if($save && $save2 && $save3 && $save4)
			return 1;
	}

	function update_qty(){
		extract($_POST);
		$save = $this->db->query("UPDATE product_list set inv_qty = inv_qty + $qty where id= $id");
		$save2 = $this->db2->query("UPDATE product_list set inv_qty = inv_qty + $qty where id= $id");
		$save3 = $this->db3->query("UPDATE product_list set inv_qty = inv_qty + $qty where id= $id");
		$save4 = $this->db4->query("UPDATE product_list set inv_qty = inv_qty + $qty where id= $id");
		if($save && $save2 && $save3 && $save4)
			return 1;
	}
	function validate_cart_qty(){
		try {
			if(isset($_SESSION['login_user_id'])){
				// For logged in users
				$user_id = $_SESSION['login_user_id'];
				$cart_items = $this->db->query("SELECT * FROM cart WHERE user_id = '$user_id'");
				
				if(!$cart_items) {
					// SQL error
					return 1; // Default to allow checkout if query fails
				}
				
				$response = [];
				while ($item = $cart_items->fetch_assoc()) {
					$product_id = $item['product_id'];
					$qty = $item['qty'];

					$product_query = $this->db->query("SELECT available_qty, name FROM product_available_qty WHERE id = '$product_id'");
					
					// Check if product exists
					if(!$product_query || $product_query->num_rows == 0) {
						continue; // Skip this product if not found
					}
					
					$product = $product_query->fetch_assoc();
					
					if ($qty > $product['available_qty']) {
						$response[] = [
							'status' => 'unavailable',
							'name' => $product['name']
						];
					}
				}
				
				if(count($response) > 0){
					return 0; // Some items exceed available quantity
				}
				return 1; // All items are available
			} else {
				// For non-logged in users
				$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
				
				$cart_items = $this->db->query("SELECT * FROM cart WHERE client_ip = '$ip'");
				
				if(!$cart_items) {
					// SQL error
					return 1; // Default to allow checkout if query fails
				}
				
				$response = [];
				while ($item = $cart_items->fetch_assoc()) {
					$product_id = $item['product_id'];
					$qty = $item['qty'];

					$product_query = $this->db->query("SELECT available_qty, name FROM product_available_qty WHERE id = '$product_id'");
					
					// Check if product exists
					if(!$product_query || $product_query->num_rows == 0) {
						continue; // Skip this product if not found
					}
					
					$product = $product_query->fetch_assoc();
					
					if ($qty > $product['available_qty']) {
						$response[] = [
							'status' => 'unavailable',
							'name' => $product['name']
						];
					}
				}
				
				if(count($response) > 0){
					return 0; // Some items exceed available quantity
				}
				return 1; // All items are available
			}
		} catch (Exception $e) {
			// If any error occurs, default to allowing checkout
			return 1;
		}
	}
}