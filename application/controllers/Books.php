<?php
/*
 * Books.php
 *
 * Created on Fri Jan 06 2017 02:06:47 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public $header_data=[];
    public $footer_data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('emailcontent');
        $this->load->library('pagination');
        $this->load->library('form_validation');

        // model
        $this->load->model('bookmodel');
        

        $this->header_data['categories'] = load_categories();
        $this->hash_length = $this->config->item('hash_length_session');
    }
    public function index()
    {
    }
    public function book_list()
    {
        $this->header_data['page_title'] = "Books, Notes and Papers | Grabpustak";
        $this->header_data['meta_title'] = "Books, Notes and Papers | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";

        // calculate the type of the book which is a comma separated parameter
        $type_array = array();
        $book_type = $this->config->item('book_type');
        $book_type_f = $this->input->get('f', true);
        $book_type_f = explode(',', $book_type_f);
        $valid_types = array();
        foreach ($book_type_f as $value) {
            if (array_key_exists($value, $book_type)) {
                array_push($valid_types, $value);
                array_push($type_array, $book_type[$value]);
            }
        }


        $config["total_rows"] = $this->bookmodel->recordCount($type_array, false);

        $config["per_page"] = 8;

        $choice = $config["total_rows"] / $config["per_page"];

        $config["num_links"] = round($choice);
        $page = ($this->input->get('page', true))? $this->input->get('page', true) : 1;

        $start = ($page-1)* $config['per_page'];

        $extra_params='f='.implode(',', $valid_types);

        $books_data["links"] = $config['num_links'];

        $books_data['vard'] = $config["num_links"];

        $books_data['extra_params_to_link'] = $extra_params ;
        $books_data['books'] = $this->bookmodel->getBooksByLimit($config["per_page"], $start, $type_array);
        $this->load->view('site/header', $this->header_data);
        $this->load->view('books/book_list', $books_data);
        $this->load->view('site/footer', $this->footer_data);
    }


    public function book_detail()
    {
        $this->header_data['page_title'] = "Home | Grabpustak";
        $this->header_data['meta_title'] = "Home | Grabpustak ";
        $this->header_data['page_type'] = "index-opt-1 catalog-product-view catalog-view_default page-no-bg";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $this->header_data['reader'] = true;


        $this->load->view('site/header', $this->header_data);
        if (!$this->uri->segment(2)) {
            $books_data['books'] = $this->bookmodel->getBooksAll();
            $this->load->view('books/book_list', $books_data);
        } else {
            $alias = $this->uri->segment(2);
            if (preg_match('/^[A-Za-z0-9_ ]+$/', $alias)) {
                $books_data['related_books'] = $this->bookmodel->getBooksByLimit(4);
                $books_data['book'] = $this->bookmodel->getBookByAlias($alias);
                if (!empty($books_data['book'])) {
                    $books_data['book'] = $this->bookmodel->getBookByAlias($alias)[0];
                }
                if ($books_data['book']) {
                    $this->footer_data['reader'] = true;
                    $this->header_data['reader'] = true;
                    $title = $books_data['book']['book_title'];
                    $books_data['hash'] = substr(md5(openssl_random_pseudo_bytes(20)), -$this->hash_length);

                    $array = array(
                    'hash' => $books_data['hash']
                );

                    $this->session->set_userdata($array);

                    $this->header_data['page_title'] = "Grabpustak | ".$title;
                    $this->header_data['meta_title'] = "Grabpustak | ".$title;
                    $this->load->view('books/book_detail', $books_data);
                } else {
                    show_404();
                }
            } else {
                show_404();
            }
        }
        $this->load->view('site/footer', $this->footer_data);
    }

    // public function reader()
    // {
    // 	error_reporting(1);
    // 	$this->header_data['page_title'] = "Home | Grabpustak";
    // 	$this->header_data['meta_title'] = "Home | Grabpustak ";
    // 	$this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
    // 	$this->footer_data['reader'] = true;
    // 	$this->header_data['reader'] = true;

    // 	$books_data =array('books' => $this->bookmodel->getBooksAll());
 // 	    $this->load->view('site/header',$this->header_data);
    // 	$this->load->view('site/reader',$books_data);
    // 	$this->load->view('site/footer',$this->footer_data);
    // }


    public function search()
    {
        $per_page = 15;

        $books_data['total_rows'] = '';
        $books_data['pagination'] = '';
        $books_data['pagination']['max_view_links'] = 7;
        $books_data['url_params'] = '';

        $this->header_data['reader'] = false;
        $this->header_data['page_title'] = "Search | Grabpustak";
        $this->header_data['meta_title'] = "Search | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";

        $type_array = array();
        $filter_params = array();
        $book_type = $this->config->item('book_type');


        $book_type_f = $this->input->get('f', true);
        $_query =  $this->input->get('q', true);
        $sc =  $this->input->get('sc', true);
        $sb =  $this->input->get('sb', true);

        $valid_types = array();
        if (!empty($book_type_f)) {
            $book_type_f = explode(',', $book_type_f);
            foreach ($book_type_f as $value) {
                if (array_key_exists($value, $book_type)) {
                    array_push($valid_types, $value);
                    array_push($type_array, $book_type[$value]);
                }
            }

            $extra_params=implode(',', $valid_types);
        }
        $cat_['sb']= $sb;
        $cat_['sc']= $sc;

        if (!empty($sb)) {
            $filter_params['sb']= $sb;
        }
        if (!empty($sc)) {
            $filter_params['sc']= $sc;
        }
        if (!empty($valid_types)) {
            $filter_params['f']= implode(',', $valid_types);
        }
        if (!empty($q)) {
            $filter_params['q']= $q;
        }

        // echo $sc .'= ';
        // exit;
        // $config["total_rows"] = $this->bookmodel->recordCount($type_array,$_query);
        $config["total_rows"] = $this->bookmodel->recordCount_($_query, false, $start=0, $type_array, $cat_);

        // pagination
        $books_data['pagination']['total_rows'] = $config['total_rows'];
        $config["per_page"] = $per_page;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $page = ($this->input->get('page', true))? $this->input->get('page', true) : 1;
        if (!preg_match("/^([0-9]+)$/", $page)) {
            $page = 1;
        }

        $start = ($page-1)* $config['per_page'];

        $books_data['pagination']["num_links"] = $config['num_links'];
        $books_data['pagination']["current_page"] = $page;

        $books_data['url_params']["filters"] = $filter_params;

        $books_data['url_params']['extra_params_to_link'] = http_build_query($filter_params);

        $books_data['books'] = $this->bookmodel->searchBook($_query, $config["per_page"], $start, $type_array, $cat_);
        // echo $this->output->set_content_type('application/json')->set_output(json_encode($books_data));

        $this->load->view('site/header', $this->header_data);
        $this->load->view('books/search', $books_data);
        $this->load->view('site/footer', $this->footer_data);
    }

    public function old_papers()
    {
        $this->header_data['page_title'] = "Search | Grabpustak";
        $this->header_data['meta_title'] = "Search | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $this->footer_data['reader'] = false;
        $this->header_data['reader'] = false;
        //$config['book_type'] = array('book' =>1, 'old_papers'=>2,'student_notes'=>3,'teacher_notes'=>4);

        $_book_type = $this->config->item('book_type')['old_papers'];
        $_query= false;
        $books_data['books'] = $this->bookmodel->searchBook(false, $_book_type, 10);
        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/old_paper', $books_data);
        $this->load->view('site/footer', $this->footer_data);
    }

    public function notes()
    {
        $this->header_data['page_title'] = "Notes | Grabpustak";
        $this->header_data['meta_title'] = "Notes | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $this->footer_data['reader'] = false;
        $this->header_data['reader'] = false;
        //$config['book_type'] = array('book' =>1, 'old_papers'=>2,'student_notes'=>3,'teacher_notes'=>4);

        $_book_type = $this->config->item('book_type')['student_notes'];
        $_query= false;
        $books_data['books'] = $this->bookmodel->getNotes(false, $_book_type, 10, true);
        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/old_paper', $books_data);
        $this->load->view('site/footer', $this->footer_data);
    }


    public function loadAds()
    {
         $ads_data = $this->bookmodel->getAd();
        echo $this->output->set_content_type('application/json')->set_output(json_encode($ads_data));
    }

  // function check_name($name){
  //       // if(preg_match("/^[a-zA-Z ]*$/", $name)){
  //       if(preg_match("/^\w+$/", $name)){
  //       	return true;
  //       }
  //       return false;
  //
}
