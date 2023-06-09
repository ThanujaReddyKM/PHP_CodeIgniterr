<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{

	public function getArticle(){

	}

	public function getArticles($param = array()){
		if(isset($param['offset']) && isset($param['limit'])){
			$this->db->limit($param['offset'],$param['limit']);	
		}

		if(isset($param['q'])){
			$this->db->or_like('title',trim($param['q']));
			$this->db->or_like('author',trim($param['q']));
		}

		$query = $this->db->get('articles');

		//echo $this->db->last_query();


		$articles = $query->result_array();
		 return $articles;
	} 

		public function getArticlesCount($param = array()){

				if(isset($param['q'])){
					$this->db->or_like('title',trim($param['q']));
					$this->db->or_like('author',trim($param['q']));
				}

			$count = $this->db->count_all_results('articles');
			 return $count;
		} 

	public function addArticle($formArray){
		$this->db->insert('articles',$formArray);
		return $this->db->insert_id();
	}

	public function updateArticle($id,$formArray){
				$this->db->where('id',$id);
		$this->db->update('categories',$formArray);
	}

	public function deleteArticle($id){
			$this->db->where('id',$id);
		$this->db->delete('categories');
	}

//--------> Front end Page
		public function getArticlesFront($param = array()){
		if(isset($param['offset']) && isset($param['limit'])){
			$this->db->limit($param['offset'],$param['limit']);	
		}

		if(isset($param['q'])){
			$this->db->or_like('title',trim($param['q']));
			$this->db->or_like('author',trim($param['q']));
		}

		$this->db->select('articles.* ,categories.name as category_name');
		$this->db->where('articles.status',1);
		$this->db->order_by('articles.created_at','DESC');
		$this->db->join('categories','categories.id=articles.category','left');

		$query = $this->db->get('articles');

		//echo $this->db->last_query();


		$articles = $query->result_array();
		// echo $this->db->last_query();
		 return $articles;
	} 
}
?>