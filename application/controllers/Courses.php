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
        $this->load->model('coursemodel');

        $this->load->model('bookmodel');

        $this->header_data['categories'] = load_categories();
        $this->load->library('form_validation');
        if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
            $this->loggedIn = true;
        }
    }


    public function index()
    {

        $this->header_data['page_title'] = "Course List | Grabpustak";
        $this->header_data['meta_title'] = "Course List | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";

        // calculate the type of the book which is a comma separated parameter

        $config["total_rows"] = $this->coursemodel->recordCount(false);

        $config["per_page"] = 8;

        $choice = $config["total_rows"] / $config["per_page"];

        $config["num_links"] = round($choice);
        $page = ($this->input->get('page', true))? $this->input->get('page', true) : 1;

        $start = ($page-1)* $config['per_page'];

        $course_data["links"] = $config['num_links'];

        $course_data['vard'] = $config["num_links"];

        $course_data['courses'] = $this->coursemodel->getCoursesByLimit($config["per_page"], $start);
      
        #author - ashish patel 
        $course_data['enrolled_array']=$this->coursemodel->getEnrolledCourses($this->session->userdata("USER_ID"));

        ########
        $this->load->view('site/header', $this->header_data);
        $this->load->view('courses/course_list', $course_data);
        $this->load->view('site/footer');
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

      $data['course_data'] = $this->coursemodel->getCourseById($course_id);
      $data['study_material'] = $this->coursemodel->getMaterialByIdType($course_id,$this->config->item('material_type')['STUDY']);
      $data['assignments'] = $this->coursemodel->getMaterialByIdType($course_id,$this->config->item('material_type')['ASSIGNMENT']);
      $data['syllabus'] = $this->coursemodel->getMaterialByIdType($course_id,$this->config->item('material_type')['SYLLABUS']);

      if (!$this->loggedIn) {
        $this->load->view('courses/course_detail_view', $data);
      }else{
        $user = $this->session->userdata('USER_ID');
        $user_ = $user+20000;
        $this->load->helper('string');
        $token = $this->generateToken($user);
        $save =  $this->restmodel->saveToken($user, $token);
      // redirect("http://upload.grabpustak.com/cp?auth=$token.'&'.$user");

        $data['upload_url'] = "http://gpapi/cp/upload_book?auth=$token&user=$user_&course=$course_id";
        $this->load->view('courses/course_detail_edit', $data);
      }
        $this->load->view('site/footer');
    }


}

/* End of file Courses.php */
/* Location: ./application/controllers/Courses.php */
