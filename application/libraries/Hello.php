<?php
class Hello
{
	// public function test(){
	// 	echo " Custom Library in Codeigniter.........";

	// }

	//Get instance
	public function test(){
		$CI =& get_instance();
		$CI->load->library('Email');
		echo ('this is the email library');

	}
}

?>