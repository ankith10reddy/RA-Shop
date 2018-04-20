<?php
class ProductModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM product');
		$rows = $this->resultSet();
		return $rows;
	}
	public function add(){
		$this->query('SELECT * FROM product');
		$rows = $this->resultSet();
		return $rows;
	}

	public function added(){
		
		 $pos= strrpos($_SERVER['REQUEST_URI'],"?quantity=");
		  $p = substr($_SERVER['REQUEST_URI'],$pos);
		  $quan = trim($p,"?quantity=&addprod=Submit");
		
		if ($quan<=$_SESSION['prod_data']['avail_quan']){
			$this->query('INSERT INTO cart (user_id,prod_id,sel_id,quantity,total_price) VALUES (:user_id,:prod_id,:sel_id,:quantity,:total_price)');
			$this->bind(':user_id',$_SESSION['user_data']['id']);
			$this->bind(':prod_id',$_SESSION['prod_data']['prod_id']);
			$this->bind(':sel_id',$_SESSION['prod_data']['sel_id']);
			$this->bind(':quantity',$quan);
			$this->bind(':total_price',($quan*($_SESSION['prod_data']['mrp'] - $_SESSION['prod_data']['discount']) + $_SESSION['prod_data']['shipping_charges']));
			$this->execute();

			if($this->lastInsertId()){
				header('location: '.ROOT_URL.'products/added?success=true');
			}
		
		}

	}

}

?>