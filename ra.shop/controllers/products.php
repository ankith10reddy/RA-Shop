<?php
class Products extends Controller{
	protected function Index(){
		$viewmodel= new ProductModel();
		$this->returnView($viewmodel->Index(),true);
	}
	protected function add(){
		$viewmodel= new ProductModel();
		$this->returnView($viewmodel->add(),true);
	}
	protected function added(){
		if (!isset($_SESSION['is_logged_in']))
		{
			header('Location: '.ROOT_URL.'user/login');
		}
		$viewmodel= new ProductModel();
		$this->returnView($viewmodel->added(),true);
	}
	protected function sort(){
		$pos= strrpos($_SERVER['REQUEST_URI'],"?z=");
		  $p = substr($_SERVER['REQUEST_URI'],$pos);
		  $cat = trim($p,"?z=");
		  if ($cat=="Office")
		  {
		  	$_SESSION['sort_cat']="Office Products";
		  }
		  else if ($cat=="Men")
		  {
		  	$_SESSION['sort_cat']="Men Clothing";
		  }
		  else if ($cat=="Women")
		  {
		  	$_SESSION['sort_cat']="Women Clothing";
		  }
		  else if ($cat=="Kids")
		  {
		  	$_SESSION['sort_cat']="Kids Clothing";
		  }
		  else if ($cat=="All")
		  {
		  	unset($_SESSION['sort_cat']);
		  }
		  else
		  {
		  	$_SESSION['sort_cat']=$cat;
		  }


		header('Location: '.ROOT_URL.'products');
	}
}

?>