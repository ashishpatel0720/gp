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
    public $header_data = [];
    public $footer_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('emailcontent');
        $this->load->model('bookmodel');
        $this->load->model('basemodel');
        $this->load->library('form_validation');
        $this->categories = [];
        // $this->output->cache(3);
        $books = $this->bookmodel->fetchCategories();
        foreach ($books as $key => $value) {
            $this->categories[$value['main_category_title']][$value['sub_category_title']][] = $value['subject_title'];
        }
        $this->header_data['categories'] = $this->categories;
    }

    public function index()
    {
        $this->header_data['page_title'] = "Grabpustak | Read and Publish";
        $this->header_data['meta_title'] = "Grabpustak | Read and Publish";
        $this->header_data['description'] = "Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";

        $home_data['top_books'] = $this->bookmodel->getBooksByLimit(5);
        $home_data['featured'] = $this->bookmodel->getBooksByLimit(5, $start = 10, $type_array = false);

        $this->load->view('site/header_home', $this->header_data);
        $this->load->view('site/home', $home_data);
        $this->load->view('site/footer', $this->footer_data);
    }

    public function about()
    {
        $this->header_data['page_title'] = "About Us";
        $this->header_data['meta_title'] = "About Us";
        $this->header_data['description'] = "Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $this->footer_data['facebook'] = true;
        $this->footer_data['map'] = true;


        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/about');
        $this->load->view('site/footer', $this->footer_data);
    }

    public function contact($message = "no_message")
    {
        $this->header_data['page_title'] = "Contact Us";
        $this->header_data['meta_title'] = "Contact Us";
        $this->header_data['description'] = "Contact us for any query or doubt.";
        $this->footer_data['facebook'] = true;
        $this->footer_data['map'] = true;


        if (!empty($_POST)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]|alpha_numeric_spaces',
                [
                    'required' => '%s is required.',
                    'max_length' => '%s must be of maximum 50 characters.',
                    'alpha' => '%s must contain only alphabet characters and spaces'
                ]);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
                'required' => '%s is required.'
            ]);
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[100]', [
                'max_length' => '%s must be of maximum 100 characters.',
                'required' => '%s is required.'

            ]);
            $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[1000]', [
                'required' => '%s is required.',
                'max_length' => '%s must be of maximum 1000 characters.'
            ]);
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|exact_length[10]|numeric', [
                'required' => '%s is required.',
                'exact_length' => '%s must be of 10 digits.',
                'numeric'=>'%s must contain numbers only.',
            ]);
            $this->form_validation->set_rules('place', 'Place', 'trim|required|max_length[200]', [
                'required' => '%s is required.',
                'max_length' => '%s must be of maximum 200 characters.',
            ]);

            if ($this->form_validation->run() == true) {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                $mobile = $this->input->post('mobile');
                $place = $this->input->post('place');

                $contact_data = [
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'mobile'=>$mobile,
                    'place'=>$place
                ];

                $result = $this->basemodel->saveContactMessage($contact_data);
                if ($result)
                    $data['message'] = 'success';
                else
                    $data['message'] = 'sql_error';
            }
            else
                $data['message']='validation_error';
        }
        else
            $data['message'] = $message;
        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/contact', $data);
        $this->load->view('site/footer', $this->footer_data);

    }
}
