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

	public function updateArticle(){
		
	}

	public function deleteArticle(){
		
	}
}
?>