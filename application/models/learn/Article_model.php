<?php
class Article_model extends CI_Model{
	public function articles(){
		// $articles[0] = 'This is #1 dummy article title';
		// $articles[1] = 'This is #2 dummy article title';
		// $articles[2] = 'This is #3 dummy article title';
		// return $articles;

		$articles = $this->db->get('articles')->result_array();
		return $articles;
	}

	public function example()
	{
		//$users=	$this->db->query('select * from users')->result_array();
		//$this->db->select('name');
		//$this->db->where('id',2);
		//$users = $this->db->get('users')->result_array();

		$users = $this->db->select('id,name,email')
							->where('id',2)
							->get('users')
							->result_array();
		return $users;
	}
}
?>
<!--  $this->db->where('username',$username);
	 $admin = $this->db->get('admins')->row_array();
	 //Select * from admins where username = {}
	 return $admin; -->