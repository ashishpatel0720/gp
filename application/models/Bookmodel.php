<?php
/*
 * Bookmodel.php
 *
 * Created on Fri Jan 06 2017 02:08:50 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bookmodel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	// public function getMenu(){
	// 	$this->db->select('title,alias');
	// 	$this->db->from('events');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }
	public function recordCount($type_array = false,$keyword=false){
		$this->db->select('*');
		$this->db->from('books');
		if($type_array):
		foreach ($type_array as $value) {
			$this->db->or_where('book_type',$value);
		}
		endif;

		// if(!empty($keyword)):
		// 	$this->db->where('book_title',$keyword);
		// 	$this->db->where('book_alias',$keyword);
		// endif;
		$this->db->join('subjects', 'books.book_category = subjects.subject_id');
		$this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');
		$this->db->join('main_category', 'main_category.main_category_id = sub_category.sub_category_main_category');
		$this->db->join('publishers', 'publishers.publisher_id = books.book_publisher');
		// $this->db->limit($limit,$start);
		$query = $this->db->get();
		return count($query->result_array());

	}
	public function recordCount_($keyword='',$limit,$start=0,$type_array = false,$cat_){
		// $this->db->select('b.*,sb.*,sc.*,pu.*');
		// $this->db->from('books b,subjects sb,sub_category sc,publishers pu');

 	//     $this->db->join('main_category', 'main_category.main_category_id = sc.sub_category_main_category');
		// $this->db->join('publishers', 'publishers.publisher_id = b.book_publisher');


		$this->db->select('*');
		$this->db->from('books');
		$this->db->join('subjects', 'books.book_category = subjects.subject_id');
		$this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');
		$this->db->join('main_category', 'main_category.main_category_id = sub_category.sub_category_main_category');
		$this->db->join('publishers', 'publishers.publisher_id = books.book_publisher');

		// if($keyword){
		// $this->db->where("book_alias LIKE '%$keyword%'");
		// $this->db->or_where("book_title LIKE '%$keyword%'");
		// }

		$this->db->group_start();
		$this->db->group_start();
        // $this->db->where('a', 'a')
		// if($keyword){
		$this->db->where("book_alias LIKE '%$keyword%'");
		$this->db->or_where("book_title LIKE '%$keyword%'");
		// }
        $this->db->group_end();

		if($type_array && !empty($type_array)):
			$this->db->group_start();
		foreach ($type_array as $value) {
			$this->db->or_where('book_type',$value);
		}
			$this->db->group_end();
		endif;

		$this->db->group_end();

		// $this->db->join('subjects', 'books.book_category = subjects.subject_id');
		// $this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');

		if(!empty($cat_['sc'])) {
			$sc = $cat_['sc'];
			$this->db->where('sub_category.sub_category_title',$sc);
		}
		if(!empty($cat_['sb'])) {
			$sb = $cat_['sb'];
			$this->db->where('subjects.subject_title',$sb);
		}

		$this->db->limit($limit,$start);
		$query = $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		return count($query->result_array());
	}
	public function getBooksAll_id_alias_title(){
		$this->db->select('id,alias,title');
		$this->db->from('books');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBookByAlias($alias){
		$this->db->select('*');
		$this->db->from('books');
		$this->db->where('book_alias',$alias);
		$this->db->join('subjects', 'books.book_category = subjects.subject_id');
		$this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');
		$this->db->join('main_category', 'main_category.main_category_id = sub_category.sub_category_main_category');
		$this->db->join('publishers', 'publishers.publisher_id = books.book_publisher');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBooksByLimit($limit,$start=0,$type_array = false){
		$this->db->select('*');
		$this->db->from('books');
		if($type_array):
		foreach ($type_array as $value) {
			$this->db->or_where('book_type',$value);
		}
		endif;
		$this->db->join('subjects', 'books.book_category = subjects.subject_id');
		$this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');
		$this->db->join('main_category', 'main_category.main_category_id = sub_category.sub_category_main_category');
		$this->db->join('publishers', 'publishers.publisher_id = books.book_publisher');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getBooksByPriority($priority=1,$limit=3){
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('priority',$priority);
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function searchBook($keyword='',$limit,$start=0,$type_array = false,$cat_){
		// $this->db->select('b.*,sb.*,sc.*,pu.*');
		// $this->db->from('books b,subjects sb,sub_category sc,publishers pu');

 	//     $this->db->join('main_category', 'main_category.main_category_id = sc.sub_category_main_category');
		// $this->db->join('publishers', 'publishers.publisher_id = b.book_publisher');


		$this->db->select('*');
		$this->db->from('books');
		$this->db->join('subjects', 'books.book_category = subjects.subject_id');
		$this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');
		$this->db->join('main_category', 'main_category.main_category_id = sub_category.sub_category_main_category');
		$this->db->join('publishers', 'publishers.publisher_id = books.book_publisher');

		// if($keyword){
		// $this->db->where("book_alias LIKE '%$keyword%'");
		// $this->db->or_where("book_title LIKE '%$keyword%'");
		// }

		$this->db->group_start();
		$this->db->group_start();
        // $this->db->where('a', 'a')
		// if($keyword){
		$this->db->where("book_alias LIKE '%$keyword%'");
		$this->db->or_where("book_title LIKE '%$keyword%'");
		// }
        $this->db->group_end();

		if($type_array && !empty($type_array)):
			$this->db->group_start();
		foreach ($type_array as $value) {
			$this->db->or_where('book_type',$value);
		}
			$this->db->group_end();
		endif;

		$this->db->group_end();

		// $this->db->join('subjects', 'books.book_category = subjects.subject_id');
		// $this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');

		if(!empty($cat_['sc'])) {
			$sc = $cat_['sc'];
			$this->db->where('sub_category.sub_category_title',$sc);
		}
		if(!empty($cat_['sb'])) {
			$sb = $cat_['sb'];
			$this->db->where('subjects.subject_title',$sb);
		}

		$this->db->limit($limit,$start);
		$query = $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		return ($query->result_array());
	}

	   public function register($data){
    	if($this->db->insert('registration', $data))
    	{
     		return $this->db->insert_id();
    	}
    		else return false;
       }
     public function saveEvents($id,$data){
     	$this->db->where('id', $id);
    	if($this->db->update('registration', $data))
    		return true;
    		else return false;
     }

     public function getAd(){
		$this->db->select('*');
		$this->db->from('advertisements');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function fetchCategories(){
		// $this->db->select('*');
		// $this->db->from('subjects');
		// // $this->db->join('subjects', 'books.book_category = subjects.subject_id');
		// $this->db->join('sub_category','sub_category.sub_category_id = subjects.subject_subcategory');
		// $this->db->join('main_category', 'main_category.main_category_id = sub_category.sub_category_main_category');
		// // $this->db->distinct();
		// // $this->db->group_by(array('subjects.subject_main_category','subjects.subject_title','subjects.subject_id'));
		// $this->db->order_by('subjects.subject_main_category');
		// $this->db->join('publishers', 'publishers.publisher_id = books.book_publisher');
		// $this->db->limit($limit,$start);

		$this->db->select('*');
		$this->db->from('main_category');
		// $this->db->join('subjects', 'books.book_category = subjects.subject_id');
		$this->db->join('sub_category','sub_category.sub_category_main_category = main_category.main_category_id');
		$this->db->join('subjects', 'subjects.subject_subcategory = sub_category.sub_category_id');
		// $this->db->distinct();
		// $this->db->group_by(array('main_category.main_category_id','subjects.subject_id','sub_category.sub_category_id'));
		$this->db->order_by('subjects.subject_main_category');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getMainCategory(){
		$this->db->select('main_category_id,main_category_title');
		$this->db->from('main_category');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getSubCategoryByMain($main){
		$this->db->select('sub_category_id id,sub_category_title text');
		$this->db->from('sub_category');
		$this->db->where('sub_category_main_category',$main);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getSubjectsBySubMain($sub,$main=false){
		$this->db->select('subject_id id,subject_title text');
		$this->db->from('subjects');
		$this->db->where('subject_subcategory',$sub);
		if(!empty($main)){
			$this->db->where('subject_main_category',$main);
		}

		$query = $this->db->get();
		return $query->result_array();
	}


	public function saveBook($data){
		if($this->db->insert('books',$data)){
			return $this->db->insert_id();
		}
		return false;
	}
}
