<?php
class Users extends Controller{
	protected function register(){
		if(isset($_SESSION['is_logged_in'])||isset($_SESSION['sel_is_logged_in']))
		{
			header('Location: '.ROOT_URL);
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(),true);
	}
	protected function login(){
		if(isset($_SESSION['is_logged_in'])||isset($_SESSION['sel_is_logged_in']))
		{
			header('Location: '.ROOT_URL);
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(),true);
	}
	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		unset($_SESSION['sel_is_logged_in']);
		unset($_SESSION['sel_data']);
		session_destroy();

		header('Location: '.ROOT_URL);
	}
	protected function cart(){
		if(!isset($_SESSION['is_logged_in']))
		{
			header('Location: '.ROOT_URL.'products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->cart(),true);
	}
	protected function payment(){
		if(!isset($_SESSION['is_logged_in']))
		{
			header('Location: '.ROOT_URL.'products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->payment(),true);
	}
	protected function thanks(){
		if(!isset($_SESSION['is_logged_in']))
		{
			header('Location: '.ROOT_URL.'users/products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->thanks(),true);
	}
	protected function orders(){
		if(!isset($_SESSION['is_logged_in']))
		{
			header('Location: '.ROOT_URL.'users/products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->orders(),true);
	}
	protected function addprod(){
		if(!isset($_SESSION['sel_is_logged_in']))
		{
			header('Location: '.ROOT_URL.'users/products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->addprod(),true);
	}
	protected function updprod(){
		if(!isset($_SESSION['sel_is_logged_in']))
		{
			header('Location: '.ROOT_URL.'users/products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->updprod(),true);
	}
	protected function remove(){
		if(!isset($_SESSION['is_logged_in']))
		{
			header('Location: '.ROOT_URL.'users/products');
		}
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->remove(),true);
	}
}
