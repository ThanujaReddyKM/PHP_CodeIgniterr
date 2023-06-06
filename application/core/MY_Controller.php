<?php
class MY_Controller extends CI_Controller{
	public function mytest(){
		echo " I just extended core controller class";
	}
}

class AdminController extends MY_Controller{
	public function test(){
		echo " I am part of admin";
	}
}
class VendorController extends MY_Controller{
	public function test(){
		echo " I am part of vendor";
	}
}

?>