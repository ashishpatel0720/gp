<?php

/**
 * Created by PhpStorm.
 * User: ashish_patel
 * Date: 2/3/2017
 * Time: 4:05 AM
 */
class test extends  CI_Controller
{	public $header_data=[];
    public function __construct()
{
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('usermodel');
    $this->load->helper('bookupload');
    $this->load->model('bookmodel');
    $this->categories= [];
    $this->load->database();
    // $this->output->cache(3);
    $books = ($this->bookmodel->fetchCategories());
    foreach ($books as $key => $value) {
        $this->categories[$value['main_category_title']][$value['sub_category_title']][] = $value['subject_title'];
    }
    $this->header_data['categories'] = $this->categories;

    $this->load->library('form_validation');
    if(isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])){
        $this->loggedIn = true;
    }
    date_default_timezone_set("Asia/Kolkata");
}

    public function index1(){
       foreach(range(1,3) as $i){
          if($role=$this->usermodel->getUserRole($i)){
             echo "for $i user role found = $role";

          }else
           echo "for $i user role not found";
           echo "<br>";

         }
       }

    public function index(){
        $this->load->view('site/header',$this->header_data);

        $this->load->view("errors/html/error_php");
        $this->load->view('site/footer');
    }
   }