<?php
class Article extends CI_Controller
//class Article extends MY_Controller
//class Article extends VendorController
//class Article extends AdminController


{
	/*Default*/
	public function index(){

		  $this->load->model('learn/Article_model');
		  	 $articles = $this->Article_model->articles();
		 $data['articles'] = $articles ;		
		  $this->load->view('learn/articles',$data);

		//Custom Helper.
		//  $this->load->helper('common_helper');

		//Custom library.
		// $this->load->library('hello');
		// $this->hello->test();

		//Text helper.
		// $this->load->helper('text');
		// $string = "Here is a nice text string consisting of eleven words.";
		// echo word_limiter($string, 4);
		  // $data['string'] = $string;

	

		//Extended Library.
		//  $this->load->library('email');
		// echo $this->email->mytest();

		//Extended Helper.
		// $this->load->helper('html');
		// mytest();

		//Extended Helper.
		// $this->load->helper('html');
		// heading();
	
	//Core Class , for this the extended class CI_Controller should be changed to MY_Controller
		  //class Article extends MY_Controller
		//class Article extends VendorController
		//class Article extends AdminController
		 // $this->mytest();
		 // echo"<br>";
		 // $this->test();


		 	//get_instance example.
		  	// $this->load->library('hello');
			// $this->hello->test();

	}

	// public function test(){
	// 	echo " Hello Test";
	// }

}
?>

<!-- 

		// $data = array();
		// $name = 'thanuaj reddy';
		// $email = 'thanuja@gmail.com';
		// $data['name'] = $name;
		// $data['email']= $email;
		// $data['nameArray'] = array('Mohit','Ravi','Jack');
		// $articles = $this->Article_model->articles();
		// $data['articleArray']= $articles;

		// $users = $this->Article_model->example();
		// echo "<pre>";
		// print_r($users);
		// echo"</pre>"; -->
