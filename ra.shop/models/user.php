<?php
class UserModel extends Model{
	public function register(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$password = md5($post['password']);
		
		if($post['seller']){
			if($post['signup']){
			$this->query('SELECT * FROM seller WHERE username=:username');
			$this->bind(':username',$post['username']);
			$this->execute();

			$row = $this->single();

			if($row){
				echo 'Already a User';
			} else {
				$this->query('INSERT INTO seller (username,password,comp_name,door_no,area,city,contact)VALUES(:username,:password,:comp_name,:door_no,:area,:city,:contact)');
				$this->bind(':username',$post['username']);
				$this->bind(':password',$password);
				$this->bind(':comp_name',implode(" ", $area = array($post['first_name'],$post['last_name'])));
				$this->bind(':door_no',$post['door_no']);
				$this->bind(':area',implode(",", $area = array($post['area1'],$post['area2'])));
				$this->bind(':city',$post['city']);
				$this->bind(':contact',$post['contact']);
				$this->execute();

				if($this->lastInsertId()){
					header('location: '.ROOT_URL.'users/login');
				}
			}

		}
		}else {

		if($post['signup']){
			$this->query('SELECT * FROM user WHERE username=:username');
			$this->bind(':username',$post['username']);
			$this->execute();

			$row = $this->single();

			if($row){
				echo 'Already a User';
			} else {
				$this->query('INSERT INTO user (username,password,first_name,last_name,door_no,area,city,contact)VALUES(:username,:password,:first_name,:last_name,:door_no,:area,:city,:contact)');
				$this->bind(':username',$post['username']);
				$this->bind(':password',$password);
				$this->bind(':first_name',$post['first_name']);
				$this->bind(':last_name',$post['last_name']);
				$this->bind(':door_no',$post['door_no']);
				$this->bind(':area',implode(",", $area = array($post['area1'],$post['area2'])));
				$this->bind(':city',$post['city']);
				$this->bind(':contact',$post['contact']);
				$this->execute();

				if($this->lastInsertId()){
					header('location: '.ROOT_URL.'users/login');
				}
			}

		}



	}return;
	}
	public function login(){

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$password = md5($post['password']);
		
		if(isset($post['seller'])){

		if($post['signin']){
			$this->query('SELECT * FROM seller WHERE username=:username AND password=:password');
			$this->bind(':username',$post['username']);
			$this->bind(':password',$password);
			$this->execute();

			$row = $this->single();
			if ($row)
			{
				$_SESSION['sel_is_logged_in'] = true;
				$_SESSION['sel_data'] = array(
						"sel_id" => $row['sel_id'],
						"comp name" => $row['comp_name']
					);
				header('location: '.ROOT_URL.'products');

			}else {
				Messages::setMsg('Incorrect Login','error'); 
			}
		}
	}

	else
	{
		if($post['signin']){
			$this->query('SELECT * FROM user WHERE username=:username AND password=:password');
			$this->bind(':username',$post['username']);
			$this->bind(':password',$password);
			$this->execute();

			$row = $this->single();
			if ($row)
			{
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
						"id" => $row['id'],
						"first name" => $row['first_name']
					);

				//header('location: '.ROOT_URL.'products');
				Messages::setMsg('Logged in successfully','success');

			}else {
				Messages::setMsg('Incorrect Login','error'); 
			}
		}
	}



	}

	public function cart(){
		
		$this->query('SELECT * FROM (cart INNER JOIN product ON cart.prod_id=product.prod_id) WHERE user_id=:user_id');
		$this->bind(':user_id',$_SESSION['user_data']['id']);
		$rows = $this->resultSet();
		return $rows;
	}
	public function payment(){
		
		$this->query('SELECT * FROM cart INNER JOIN user ON cart.user_id=user.id');
		$rows = $this->resultSet();
		return $rows;
	}
	public function thanks(){
		
		$pos= strrpos($_SERVER['REQUEST_URI'],"?paymode=");
		$pay_mode = substr($_SERVER['REQUEST_URI'],$pos+9);
		$total_cost = 0;
		$this->query('SELECT * FROM cart INNER JOIN user ON cart.user_id=user.id');
		$rows = $this->resultSet();
		foreach($rows as $item)
		{
			$total_cost=$total_cost+$item['total_price'];
		}

		if ($total_cost!=0)
		{
			$this->query('INSERT INTO payment (user_id,pay_mode,total_cost) VALUES(:user_id,:pay_mode,:total_cost)');
			$this->bind(':user_id',$_SESSION['user_data']['id']);
			$this->bind(':pay_mode',$pay_mode);
			$this->bind(':total_cost',$total_cost);
			$this->execute();
		}

		$this->query('SELECT cart.user_id,MAX(payment.payment_id) AS payment_id,cart.quantity,cart.prod_id,payment.pay_mode,cart.sel_id FROM (cart INNER JOIN payment ON cart.user_id=payment.user_id) WHERE cart.user_id=:user_id');	
		$this->bind(':user_id',$_SESSION['user_data']['id']);
		$rows = $this->resultSet();

		foreach ($rows as $item) 
		{
			$this->query('INSERT INTO orders (user_id,payment_id,prod_id,quantity,pay_mode,sel_id) VALUES(:user_id,:payment_id,:prod_id,:quantity,:pay_mode,:sel_id)');
			$this->bind(':user_id',$item['user_id']);
			$this->bind(':payment_id',$item['payment_id']);
			$this->bind(':quantity',$item['quantity']);
			$this->bind(':prod_id',$item['prod_id']);
			$this->bind(':pay_mode',$item['pay_mode']);
			$this->bind(':sel_id',$item['sel_id']);
			$this->execute();
		}

		$this->query('UPDATE product SET avail_quan=:avail_quan-1 WHERE prod_id=:prod_id');
		$this->bind(':prod_id',$item['prod_id']);
		$this->execute();

		$this->query('DELETE FROM cart');
		$this->execute();

		if($this->lastInsertId()){
					header('location: '.ROOT_URL.'products');
				}
	}

	public function orders(){
		
		$this->query('SELECT * FROM ((orders INNER JOIN product on orders.prod_id=product.prod_id) INNER JOIN seller on orders.sel_id=seller.sel_id) WHERE orders.user_id=:user_id ORDER BY orders.order_time DESC');
		$this->bind(':user_id',$_SESSION['user_data']['id']);
		$rows = $this->resultSet();
		return $rows;
	}
	public function addprod(){
		
		if(isset($_POST["submit"])){
			$target_dir = 'C:\xampp\htdocs\ra.shop\images\\';

			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) 

			{
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType!= "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				$temp = explode(".", "jpg");
				$newfilename = $_POST['name']. '.' . end($temp);
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			$this->query('INSERT INTO product (sel_id,name,avail_quan,mrp,discount,shipping_charges,description,category) VALUES (:sel_id,:name,:avail_quan,:mrp,:discount,:shipping_charges,:description,:category)');
			$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
			$this->bind(':name',$_POST['name']);
			$this->bind(':avail_quan',$_POST['avail_quan']);
			$this->bind(':mrp',$_POST['mrp']);
			$this->bind(':discount',$_POST['discount']);
			$this->bind(':shipping_charges',$_POST['shipping_charges']);
			$this->bind(':description',$_POST['description']);
			$this->bind(':category',$_POST['category']);
			$this->execute();
			

			if($this->lastInsertId()){
					echo "Added to product";
					header('location: '.ROOT_URL.'products');
				}
				else
				{
					echo "failed to add";
				}
	}
}

	
	public function updprod(){
		
		if(isset($_POST["submit"])){
			if($_POST["avail_quan"]!=$_SESSION['prod_data']['avail_quan'])
			{
				$this->query('UPDATE product SET avail_quan=:avail_quan WHERE sel_id=:sel_id and prod_id=:prod_id');
				$this->bind(':avail_quan',$_POST["avail_quan"]);
				$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
				$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
				$this->execute();
				
			}
			if($_POST["mrp"]!=$_SESSION['prod_data']['mrp'])
			{
				$this->query('UPDATE product SET mrp=:mrp WHERE sel_id=:sel_id and prod_id=:prod_id');
				$this->bind(':mrp',$_POST["mrp"]);
				$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
				$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
				$this->execute();
				
			}
			if($_POST["discount"]!=$_SESSION['prod_data']['discount'])
			{
				$this->query('UPDATE product SET discount=:discount WHERE sel_id=:sel_id and prod_id=:prod_id');
				$this->bind(':discount',$_POST["discount"]);
				$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
				$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
				$this->execute();
				
			}
			if($_POST["shipping_charges"]!=$_SESSION['prod_data']['shipping_charges'])
			{
				$this->query('UPDATE product SET shipping_charges=:shipping_charges WHERE sel_id=:sel_id and prod_id=:prod_id');
				$this->bind(':shipping_charges',$_POST["shipping_charges"]);
				$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
				$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
				$this->execute();
				
			}
			if($_POST["description"]!=$_SESSION['prod_data']['description'])
			{
				$this->query('UPDATE product SET description=:description WHERE sel_id=:sel_id and prod_id=:prod_id');
				$this->bind(':description',$_POST["description"]);
				$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
				$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
				$this->execute();
				
			}
			if($_POST["category"]!=$_SESSION['prod_data']['category'])
			{
				$this->query('UPDATE product SET category=:category WHERE sel_id=:sel_id and prod_id=:prod_id');
				$this->bind(':category',$_POST["category"]);
				$this->bind(':sel_id',$_SESSION['sel_data']['sel_id']);
				$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
				$this->execute();
				
			}


			header('location :'.ROOT_URL.'products');

		}
	}

	public function remove(){
		$pos= strrpos($_SERVER['REQUEST_URI'],"?item=");
		$rprod = substr($_SERVER['REQUEST_URI'],$pos+6);
		
		$this->query('DELETE FROM cart where prod_id=:prod_id');
		$this->bind(':prod_id',$rprod);
		$this->execute();
		header('Location: '.ROOT_PATH.'/users/cart');

	}

}