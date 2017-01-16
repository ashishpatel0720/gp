<?php
/*
 * Reader.php
 *
 * Created on Thu Jan 05 2017 05:03:41 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Reader extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{

 	}

 	public function reader()
 	{
 		$this->header_data['page_title'] = "Home | Grabpustak";
 		$this->header_data['meta_title'] = "Home | Grabpustak ";
 		$this->header_data['page_type'] = "index-opt-1 catalog-product-view catalog-view_default page-no-bg";
 		$this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
 	    $this->header_data['reader'] = true;


 	    $this->load->view('site/reader_header',$this->header_data);
 		if(!$this->uri->segment(2)){
 		$books_data['books'] = $this->bookmodel->getBooksAll();
 		$this->load->view('site/book_list',$books_data);

 	   }else{
 		$alias = $this->uri->segment(2);
 		if(preg_match('/^[A-Za-z0-9_ ]+$/', $alias))
 			{
 				$books_data['related_books'] = $this->bookmodel->getBooksByLimit(4);
 				$books_data['book'] = $this->bookmodel->getBookByAlias($alias);
 				if(!empty($books_data['book'])) $books_data['book'] = $this->bookmodel->getBookByAlias($alias)[0];
 				if($books_data['book'])
 				{
 				$this->footer_data['reader'] = true;
 		        $this->header_data['reader'] = true;
 				$title = $books_data['book']['book_title'];
 				$books_data['hash'] = substr(md5(openssl_random_pseudo_bytes(20)),-$this->hash_length);

 				$array = array(
 					'hash' => $books_data['hash']
 				);

 				$this->session->set_userdata( $array );

 				$this->header_data['page_title'] = "Grabpustak | ".$title;
 				$this->header_data['meta_title'] = "Grabpustak | ".$title;
 				$this->load->view('site/reader_view',$books_data);
 			}
 			else show_404();
 			}
 			else{
 				show_404();
 			}
 	}
 		$this->load->view('site/reader_footer',$this->footer_data);

 	}


	public function reader_html()
	{
		$this->header_data['page_title'] = "Home | Grabpustak";
		$this->header_data['meta_title'] = "Home | Grabpustak ";
		$this->header_data['page_type'] = "index-opt-1 catalog-product-view catalog-view_default page-no-bg";
		$this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
	    $this->header_data['reader'] = true;


	    $this->load->view('site/reader_header_html',$this->header_data);
		if(!$this->uri->segment(2)){
		$books_data['books'] = $this->bookmodel->getBooksAll();
		$this->load->view('site/book_list',$books_data);

	   }else{
		$alias = $this->uri->segment(2);
		if(preg_match('/^[A-Za-z0-9_ ]+$/', $alias))
			{
				$books_data['related_books'] = $this->bookmodel->getBooksByLimit(4);
				$books_data['book'] = $this->bookmodel->getBookByAlias($alias);
				if(!empty($books_data['book'])) $books_data['book'] = $this->bookmodel->getBookByAlias($alias)[0];
				if($books_data['book'])
				{
				$page = $this->input->get('page', TRUE);

				$this->footer_data['reader'] = true;
		        $this->header_data['reader'] = true;
				$title = $books_data['book']['book_title'];
				$books_data['hash'] = substr(md5(openssl_random_pseudo_bytes(20)),-$this->hash_length);
				$book_data['page_num'] = $page;

				$array = array(
					'hash' => $books_data['hash']
				);

				$this->session->set_userdata($array);

				 $path = '/static/book_html/'.$alias.'/';
				 $file = 'static/book_html/'.$alias.'/'.$alias.'.html';
				 $doc = new DOMDocument();
				 $doc->loadHTMLFile($file);
				 $doc->encoding ='utf-8';
				 $classname = 'pf';
				 $xpath = new DOMXPath($doc);
				 $totalobj = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
				 $doc->loadHTMLFile($file);
				 $page = $doc->getElementById('pf1');
				 $total = $totalobj->length;

				 $books_data['total_pages'] = $total;

				$this->header_data['page_title'] = "Grabpustak | ".$title;
				$this->header_data['meta_title'] = "Grabpustak | ".$title;
				$this->load->view('site/reader_html',$books_data);
			}
			else show_404();
			}
			else{
				show_404();
			}
	}
		$this->load->view('site/reader_footer_html',$this->footer_data);

	}




 }

 /* End of file Reader.php */
 /* Location: ./application/controllers/Reader.php */
