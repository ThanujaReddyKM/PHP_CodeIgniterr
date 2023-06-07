<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	//This method will show article listing page.
	public function index($page=1)
	{
		$perpage = 5;
		$param['offset'] = $perpage;
		$param['limit'] = ($page*$perpage)-$perpage;
		$param['q'] = $this->input->get('q');


		$this->load->model('Article_model');
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/article/index');
		$config['total_rows'] = $this->Article_model->getArticlesCount();
		$config['per_page'] = $perpage;
		//Without this also pagination is working correctly (its going to next page correctly and also records also showing)
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

		//$count = $this->Article_model->getArticlesCount();
		// print_r($count);
		// exit;
		// $data['articles'] = $count;

		$articles = $this->Article_model->getArticles($param);

		$data['q'] = $this->input->get('q');
		dsfkj
		$data['articles'] = $articles;
		$data['pagination_links'] = $pagination_links;
		// print_r($articles); 
		// exit;
		$this->load->view('admin/article/list',$data);
	}

	//This method will show article create page.
	public function create()
	{
		$this->load->model('Category_model');
		$this->load->model('Article_model');
		$this->load->helper('common_helper');

		$categories = $this->Category_model->getCategories();
		$data['categories']=$categories;

		$config['upload_path'] = './public/uploads/articles/';
		$config['allowed_types'] = 'gif|jpg|png|csv|jpeg';
		$config['encrypt_name'] = true;

		$this->load->library('upload',$config);

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('category_id','Category' ,'trim|required');
		$this->form_validation->set_rules('title','Title','trim|required|min_length[2]');
		$this->form_validation->set_rules('author','Author','trim|required');

		if($this->form_validation->run() == true)
		{
			//Form validated successfully and we can proceed.
			//print_r($_FILES['image']); exit;
			if(!empty($_FILES['image']['name'])){
				if($this->upload->do_upload('image')){
					//Image successfully uploaded here.
					$data = $this->upload->data();
					
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);

					$formArray['image'] = $data['file_name'];
					$formArray['title'] = $this->input->post('title');
					$formArray['category'] = $this->input->post('category_id');
					$formArray['description'] = $this->input->post('description');
					$formArray['author'] = $this->input->post('author');
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:s');
					$this->Article_model->addArticle($formArray);
				$this->session->set_flashdata('success','Article added successfully');

					redirect(base_url().'admin/article/index/');
				}
				else
				{
					//Image selected ahs some errors.
					$errors = $this->upload->display_errors('<p class="invalid-feedback">','</p>');
					$data['imageError']= $errors;
					$this->load->view("admin/article/create/",$data);			
				}

			}
			else
			{
				$formArray['title'] = $this->input->post('title');
				$formArray['category'] = $this->input->post('category_id');
				$formArray['description'] = $this->input->post('description');
				$formArray['author'] = $this->input->post('author');
				$formArray['status'] = $this->input->post('status');
				$formArray['created_at'] = date('Y-m-d H:i:s');
				$this->Article_model->addArticle($formArray);
				$this->session->set_flashdata('success','Article added successfully');
				redirect(base_url().'admin/article/index/');


			}
		}
		else
		{
			$this->load->view('admin/article/create',$data);		
		}

	}
	//This method will show article edit page.
	public function edit()
	{

	}
	//This method will show article delete page.
	public function delete()
	{

	}

}