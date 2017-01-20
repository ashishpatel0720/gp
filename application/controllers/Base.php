<?php
/*
 * Base.php
 *
 * Created on Fri Jan 06 2017 02:08:18 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Base extends CI_Controller
{
    public $header_data=[];
    public $footer_data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('emailcontent');
        $this->load->model('bookmodel');

        $this->load->library('form_validation');

       $this->header_data['categories'] = load_categories();
    }
    public function index()
    {
        $this->header_data['page_title'] = "Grabpustak | Read and Publish";
        $this->header_data['meta_title'] = "Grabpustak | Read and Publish";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";

        $home_data['top_books'] = $this->bookmodel->getBooksByLimit(5);
        $home_data['featured'] =  $this->bookmodel->getBooksByLimit(5, $start=10, $type_array = false);

        $this->load->view('site/header_home', $this->header_data);
        $this->load->view('site/home', $home_data);
        $this->load->view('site/footer', $this->footer_data);
    }
    public function about()
    {
        $this->header_data['page_title'] = "About Us";
        $this->header_data['meta_title'] = "About Us";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $this->footer_data['facebook'] = true;
        $this->footer_data['map'] = true;


        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/about');
        $this->load->view('site/footer', $this->footer_data);
    }
    public function contact()
    {
        $this->header_data['page_title'] = "Contact Us";
        $this->header_data['meta_title'] = "Contact Us";
        $this->header_data['description']="Contact us for any query or doubt.";
        $this->footer_data['facebook'] = true;
        $this->footer_data['map'] = true;

        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/contact');
        $this->load->view('site/footer', $this->footer_data);
    }
}
