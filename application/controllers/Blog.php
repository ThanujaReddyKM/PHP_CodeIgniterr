<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {	

	function index($page=1){
		$this->load->helper('text');
		$this->load->model('Article_model');
		$this->load->library('pagination');

		$perpage = 2;
		$param['offset'] = $perpage;
		$param['limit'] = ($page*$perpage)-$perpage;

		$this->load->model('Article_model');
		$this->load->library('pagination');
		$config['base_url'] = base_url('blog/index');
		$config['total_rows'] = $this->Article_model->getArticlesCount();
		$config['per_page'] = $perpage;
		$config['use_page_numbers'] = true;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a href = '#' class=\"page-link\">";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class=\"page-item\">";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li class=\"page-item\">";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li class=\"page-item\">";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li class=\"page-item\">";
		$config['last_tag_close'] = "</li>";
		$config['attributes'] = array('class'=> 'page-link');
		$this->pagination->initialize($config);
		$pagination_links =  $this->pagination->create_links();


		$artciles=$this->Article_model->getArticlesFront($param);
		$data=[];
		$data['articles'] = $artciles;
		 $data['pagination_links']=$pagination_links;
		
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

	function detail($id){
		$this->load->helper('text');

		$this->load->model('Article_model');
		$article = $this->Article_model->getArticle($id);
		if(empty($article))
		{
			redirect(base_url('blog'));
		}
		$data = [];
		$data['article'] = $article;
		// echo"<pre>";
		// print_r($article);
		// echo"</pre>";

		$this->load->view('front/detail',$data);

	}

	function category(){
		echo "Category Method";
	}


}