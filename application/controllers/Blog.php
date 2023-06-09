<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {	

	function index(){
		$this->load->helper('text');
		$this->load->model('Article_model');
		$artciles=$this->Article_model->getArticlesFront();
		$data=[];
		$data['articles'] = $artciles;
		$this->load->view('front/blog',$data);
	}

	function categories(){
			$this->load->model('Category_model');
			$categories=$this->Category_model->getCategoriesFront();
			$data=[];
			$data['categories'] = $categories;
			// echo "<pre>";
			// print_r($categories);
			// echo "</pre>";

		$this->load->view('front/categories',$data);

	}
}