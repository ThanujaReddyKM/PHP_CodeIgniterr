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
		$config['base_url'] = base_url('blog/category');
		
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
		$this->load->model('Comments_model');
		$this->load->library('form_validation');
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

		$comments = $this->Comments_model->getComments($id,TRUE);
		$data['comments'] = $comments;

		$this->form_validation->set_rules('name','Name','required|min_length[5]');
		$this->form_validation->set_rules('comment','Comment','required|min_length[10]');
		$this->form_validation->set_error_delimiters('<p class="mb-0">','</p>');

		if($this->form_validation->run()== TRUE){
			//Insert here
			$formArray = [];
			$formArray['name']= $this->input->post('name');
			$formArray['comment']= $this->input->post('comment');
			$formArray['article_id']= $id;
			//$formArray['created_at']= date('Y-m-d H:i:s');
				$formArray['created_at'] = date('Y-m-d H:i:s');
			$this->Comments_model->create($formArray);

		$this->session->set_flashdata('message','Your comment has been posted successfully');
		redirect(base_url('blog/detail/'.$id));
		}
		else
		{
			$this->load->view('front/detail',$data);
		}



	}

	function category($category_id,$page=1){

		$this->load->helper('text');
		$this->load->model('Article_model');
		$this->load->model('Category_model');
		$this->load->library('pagination');
		$category = $this->Category_model->getCategory($category_id);
		if(empty($category)){
			redirect(base_url('blog'));
		}
		// echo "<pre>";
		// print_r($category);
		// echo "</pre>";


		$perpage = 1;
		$param['offset'] = $perpage;
		$param['limit'] = ($page*$perpage)-$perpage;
		$param['category_id']=$category_id;

		$this->load->model('Article_model');
		$this->load->library('pagination');
		// $config['base_url'] = base_url('blog/index');
		$config['base_url'] = base_url('blog/category/'.$category_id);
		$config['total_rows'] = $this->Article_model->getArticlesCount($param);
		$config['uri_segment']=4;
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


		$articles=$this->Article_model->getArticlesFront($param);
		$data=[];
		$data['articles'] = $articles;
		$data['category']= $category;
		 $data['pagination_links']=$pagination_links;
		

		$this->load->view('front/category_articles',$data);
	
	}


}