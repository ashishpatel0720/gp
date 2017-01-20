<?php
/*
 * Courses.php
 *
 * Created on Fri Jan 06 2017 02:05:41 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

 if (! defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

class Courses extends CI_Controller
{
    private $loggedIn = false;
    private $userPermissions = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('usermodel');
        $this->load->model('restmodel');

        $this->load->model('bookmodel');

        $this->header_data['categories'] = load_categories();
        $this->load->library('form_validation');
        if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
            $this->loggedIn = true;
        }
    }

    public function index()
    {
    }


    public function create_course()
    {
        if (!$this->loggedIn) {
            redirect(generateUrl('user', 'login'), 'refresh');
        }
        if (isset($_POST) && !empty($_POST)) {
            $title = $this->input->post('course_title', true);
            $course_desc = $this->input->post('course_desc', true);
            $alias = url_title(strtolower($title));
            $data = array(
            'course_alias'=> $alias ,
            'course_title' => $title,
            'course_description' => $course_desc,
            'course_is_published'=> 1,
            'course_is_deleted'=>0,
            'course_created_at' => date('Y-m-d H:i:s'),
            'course_updated_at' => date('Y-m-d H:i:s'),
            );
            $insert_id = $this->usermodel->saveCourse($data);
            if ($insert_id) {
                redirect('/courses/view/'.$insert_id.'/'.$alias, 'refresh');
            }
        } else {
            $this->load->view('site/header', $this->header_data);
            $this->load->view('courses/create_course');
            $this->load->view('site/footer');
        }
    }

    public function my_courses()
    {
        $this->load->view('site/header', $this->header_data);
        $this->load->view('courses/my_courses_1');
        $this->load->view('site/footer');
    }


    private function generateToken($user_id)
    {
        $salt = random_string('alnum', 16);
        $salt1 = strrev(md5($user_id));
        return hash('SHA512', ($salt.'GPIO'.$salt1));
    }


    public function view()
    {
        $this->load->view('site/header', $this->header_data);
        $course_id = $this->uri->segment(3);

        $user = $this->session->userdata('USER_ID');
        $user_ = $user+20000;
        $this->load->helper('string');
        $token = $this->generateToken($user);
        $save =  $this->restmodel->saveToken($user, $token);

      // var_dump($save);
      // $upload_data['main_categories'] = $this->bookmodel->getMainCategory();
      // redirect("http://upload.grabpustak.com/cp?auth=$token.'&'.$user");

      $data['upload_url'] = "http://gpapi/cp/upload_book?auth=$token&user=$user_&course=$course_id";
        $this->load->view('courses/course_detail', $data);
        $this->load->view('site/footer');
    }
}

/* End of file Courses.php */
/* Location: ./application/controllers/Courses.php */
