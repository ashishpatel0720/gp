<?php
/*
 * User.php
 *
 * Created on Fri Jan 06 2017 02:10:22 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public $header_data=[];
	private $loggedIn = false;
	private $userPermissions = [];
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
	// public function index()
	// {
	//   if(!$this->loggedIn){
	//     redirect('/user/login',true);
	//   }else{
	//   $this->load->view('site/header',$this->header_data);
	//   $this->load->view('user/dashboard');
	//   $this->load->view('site/footer');
	//   }
	// }

	/**
	 * this function loads dashboard which shows all user information
	which can be edited.
	 */
	public function dashboard()
	{

		if(!$this->loggedIn)
			redirect('/user/login');
              $this->db->select('user_website,user_facebook_id,user_twitter_id');
              $this->db->where('user_id',$this->session->userdata('USER_ID'));
              $query=$this->db->get("user_information");
              $social_info=$query->row_array();
        
		$this->load->view('site/header',$this->header_data);
//                echo "<pre>";
//                var_dump($social_info);
//                echo "</pre>";
	$this->load->view('user/dashboard2',$social_info);
		$this->load->view('site/footer');
	}


	private function user_password_hash($password)
	{
		$salt = '*a**r%%v@#$i^^n((d))_+ ';
		$salt1 = strrev(md5($password));
		return (hash('SHA256', ($salt . md5($salt1 . base64_encode($password)) . '==""==""=54')));
	}
	public function login()
	{
		// $this->output->set_output(json_encode(array('dfd' => 'arivi')));
		if($this->loggedIn)
			redirect('/user/dashboard','refresh');
		$data['login_err']='';
		$this->data['title'] = 'Login';
		if (isset($_POST['_lgn']))
		{
			$data['login_err'] = 'Credentials are not valid';
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE)
			{
     			$userdata = $this->usermodel->login(strtolower($_POST['email']), $this->user_password_hash($_POST['password']));
				if($userdata){
					$this->session->set_userdata($userdata);
					$userinfo = $this->usermodel->getUserInfo($session['USER_ID']);
					if(!empty($userinfo))  $this->session->set_userdata($userinfo);
			                redirect('/user/dashboard');

				}else{
					$this->load->view('site/header',$this->header_data);
					$this->load->view('user/login',$data);
					$this->load->view('site/footer');
				}
			}else{
				$this->load->view('site/header',$this->header_data);
				$this->load->view('user/login',$data);
				$this->load->view('site/footer');
			}
		}else{
			$this->load->view('site/header',$this->header_data);
			$this->load->view('user/login',$data);
			$this->load->view('site/footer');
		}
		// redirect('admin','refresh');
	}

	/**
	 * this function updates information form view user/account_settings
	 */
	public function account_settings(){
            if(!$this->loggedIn) 
                redirect('user/login');
            
            //getting user data from 'user_information' and populating in $user_info
            $this->db->where("user_id",$this->session->userdata('USER_ID'));
            $query=$this->db->get("user_information");
            $user_info=$query->row_array();
        if(!empty($_POST)){
          
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('user_phone', 'Phone Number', 'trim|exact_length[10]|numeric',array('exact_length'=>'%s is not valid.','numeric'=>'%s should be numeric'));
		$this->form_validation->set_rules('user_interests', 'Interests', 'trim|max_length[100]',array('max_length'=>'Word Limit Exceed.'));
		$this->form_validation->set_rules('user_twitter_id', 'Twitter Handle', 'trim|max_length[50]',array('max_length'=>'Your Twitter Handle is not valid.'));
		$this->form_validation->set_rules('user_facebook_id', 'Facebook Profile', 'trim|max_length[50]',array('max_length'=>'You Facebook Profile is not valid.'));
     if ($this->form_validation->run()==TRUE)
         {
//         echo "validation true";
		    $data=$this->input->post(NULL,TRUE);
	            if($this->usermodel->updateAccountSettings($data, $this->session->userdata('USER_ID'))){
		//	 echo "udpate true";	
                        $user_info['update_flag']=true;
                        $user_info['validation_flag']=true;
//                                 $this->load->view('/site/header');
//		                   $this->load->view('/user/account_settings',$user_info);
//                                 $this->load->view('/site/footer');
                       $this->session->set_userdata(array('is_updated'=>true));
                        redirect("/user/account_settings");              
                 }else
			 {
            //                  echo "Update false";
				 $user_info['update_flag']=false;
                                 $user_info['validation_flag']=true;
                              
                                 $this->load->view('/site/header');
		                 $this->load->view('/user/account_settings',$user_info);
                                 $this->load->view('/site/footer');
                                unset($user_info);
                                 }
	 }else{
   //          echo "validation flase";
             	        $user_info['update_flag']=false;
                        $user_info['validation_flag']=false;
                                 
                                 $this->load->view('/site/header');
                                            
		                 $this->load->view('/user/account_settings',$user_info);
                                 $this->load->view('/site/footer');
                         unset($user_info);
                                 
                                 }
        }
        else
        {
     //       echo "not a post request";
             if($this->session->userdata('is_updated')!=true) #so that we can tell that we have come here with out success_redirection
                 $this->session->set_userdata('is_updated',false);
	        $this->load->view('site/header');
		$this->load->view('user/account_settings',$user_info);
		$this->load->view('site/footer');
                unset($user_info);               
 	}
}
        
	public function update_password(){

	}



	public function signup(){
		if(isset($_POST)){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	               $this->form_validation->set_rules('fname', 'First Name', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('mname', 'Middle Name', 'trim|max_length[30]');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]',array('required'=>'Password is required','min_length'=>'Password must be of Minimum 6 Digits'));
			$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password1]|min_length[6]',array('required'=>'Password Confirmation is required','min_length'=>'Password must be of Minimum 6 Digits'));
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array('required'=>'Email is required'));
			if ($this->form_validation->run() == TRUE){

				$fname = $this->input->post('fname', TRUE);
				$mname = $this->input->post('mname', TRUE);
				$lname = $this->input->post('lname', TRUE);

				$email = $this->input->post('email', TRUE);
				// $contact = $this->input->post('contact_no', TRUE);
				$password1 = $this->input->post('password1', TRUE);
				$password2 = $this->input->post('password2', TRUE);
				if($password1==$password2){
					$password= $this->user_password_hash($password1);
				}

				$data = array(
					'user_name' => ucwords(strtolower($fname.' '.$mname.' '.$lname)),
					'user_email' => strtolower($email),
					'user_password' => $password,
					'user_roles' =>'0',
					'user_verified' => 0,
					'user_created_at' => date('Y-m-d H:i:s')
				);
				$insert_id = $this->usermodel->savePublisher($data);
				if($insert_id){
					redirect('user/dashboard', 'refresh');
				}
			}else{
				$this->load->view('site/header',$this->header_data);
				$this->load->view('user/register');
				$this->load->view('site/footer');
			}
		}
		// $this->load->view('old/footer_admin_main');
	}


	public function uploadHandler(){
		if(!$this->loggedIn){
			redirect('/user/login','refresh');
		}
		$config['upload_path']          = FCPATH.'static/images/blog/posts/uploads';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 50000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		// var_dump($_POST);
		if ( ! $this->upload->do_upload('image'))
		{
			$error = array('status'=>0,'msg' => $this->upload->display_errors());
			$this->output->set_content_type('application/json')->set_output(json_encode($error));
		}
		else
		{
			$u = $this->upload->data();
			$data = array('status'=>1,'msg'=>array('file_name' => $u['file_name'],'url'=>base_url().$this->config->item('BLOG_MEDIA').$u['file_name']));
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function editBlog(){
		// $this->load->view('old/header_admin');
		if(!$this->loggedIn){
			redirect('/user/login','refresh');
		}
		if(isset($_POST) && !empty($_POST)){
			$title = $this->input->post('blog_title', TRUE);
			$alias = $this->input->post('blog_alias', TRUE);
			$tags = $this->input->post('blog_tags', TRUE);
			$zenre = $this->input->post('blog_zenre', TRUE);
			$type = $this->input->post('blog_type', TRUE);
			$original_author = $this->input->post('blog_original_author', TRUE);
			$savenopublish = $this->input->post('savenopublish', TRUE);
			if($savenopublish)
				$savenopublish = 1;
			else $savenopublish = 0;
			$contents = $this->input->post('ckeditor', false);
			$author = $this->session->userdata('USERID');
			$data = array(
				'title' => $title,
				'alias' => $alias,
				'tags' => $tags,
				'content' =>$contents,
				'author' => 1,
				'zenre' => $zenre,
				'original_author' => $original_author,
				'type' => $type,
				'is_published'=> $savenopublish,
				'is_approved'=>$this->userCan('approve'),
				'is_deleted'=>0,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'views'=>1,
			);
			$insert_id = $this->usermodel->saveBlog($data);
			if($insert_id){
				redirect('/blog/'.$insert_id.'/'.$alias,'refresh');
			}
		}else{


			if($this->uri->segment(3) && $this->uri->segment(4)){
				$blog_data['blog'] = $this->blogmodel->getSingleBlogById($this->uri->segment(3));
				if(url_title($blog_data['blog']['alias']) == $this->uri->segment(4)){
					$this->header_data['meta_title'] = "तूर्यनाद | ".$blog_data['blog']['title'];
					$this->header_data['page_title'] = "तूर्यनाद | ".$blog_data['blog']['title'];
					$this->header_data['description']=strip_tags(substr($blog_data['blog']['content'],0,400));
					$this->load->view('old/header_admin',$this->header_data);
					$this->load->view('old/edit',$blog_data);
					$this->load->view('old/footer_admin',$this->footer_data);
				}else{
					echo $this->uri->segment(4);
				}
			}
		}
		// $this->load->view('old/footer_admin_main');
	}
	public function upload_book()
	{
		if(!$this->loggedIn){
			redirect('/user/login','refresh');
		}
		error_reporting(1);
		$this->header_data['page_title'] = "Home | Grabpustak";
		$this->header_data['meta_title'] = "Home | Grabpustak ";
		$this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
		$this->footer_data['facebook'] = true;
		$this->footer_data['map'] = true;
		$upload_data['main_categories'] = $this->bookmodel->getMainCategory();
		$this->load->view('site/header',$this->header_data);
		$this->load->view('site/upload_book_form',$upload_data);
		$this->load->view('site/footer',$this->footer_data);
	}



	public function process_book_upload(){
		if(!$this->loggedIn){
			redirect('/user/login','refresh');
		}
		$config['upload_path']= 'static/books_pdf/';
		$config['allowed_types']= 'pdf';
		$config['max_size']= 1000000;

		$title = $this->input->post('title', TRUE);
		$isbn = $this->input->post('isbn', TRUE);
		$author = $this->input->post('author', TRUE);
		$publication_date = $this->input->post('publication_date', TRUE);
		$description = $this->input->post('book_description', false);
		$category = $this->input->post('book_cat_subject', false);
		$type = $this->input->post('book_type', false);


		$alias = url_title($title, 'underscore');

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('pdf_book'))
		{

			$error = array('error' => $this->upload->display_errors());
			// var_dump($error);
			$this->output->set_content_type('application/json')->set_output(json_encode($error));
			// $this->load->view('upload_form', $error);
		}
		else
		{
			$data = $this->upload->data();
			// $this->output->set_content_type('application/json')->set_output(json_encode($data));

			$data = array(
				'book_type'=>$type,
				'book_alias'=>$alias,
				'book_title'=>$title,
				'book_author'=>$author,
				'book_isbn' => $isbn,
				'book_short_desc' => $description,
				'book_long_desc' => $description,
				'book_pages'=>$pages,
				'book_category' => $category,
				'book_publisher' => $this->session->userdata('PUBLISHER_ID'),
				'book_image' => 'poster.png',
				'book_created_at'=> date('Y-m-d H:i:s'),
				'paper_or_publication_date'=>date('Y-m-d'),
				'book_pdf'=> $data['full_path'],
				'book_deleted'=> 1,
			);

			$insert_id = $this->bookmodel->saveBook($data);

			// $this->db->trans_begin();

			// $this->db->query('AN SQL QUERY...');
			// $this->db->query('ANOTHER QUERY...');
			// $this->db->query('AND YET ANOTHER QUERY...');
			// if ($this->db->trans_status() === FALSE)
			// {
			//         $this->db->trans_rollback();
			// }
			// else
			// {
			//         $this->db->trans_commit();
			// }


			if(pdf_to_img($data['full_path'],$data['file_path'].'../book_images/'.$alias)){
				$dir = $data['file_path'].'../book_images/'.$alias;
				$pages = count(array_filter(glob("$dir/*.png") ,"is_file"));
				$msg = [];
				if(file_exists("$dir/1.png")){

					$msg['type']= "Book Upload Success";
					$msg['msg'] = 'Book has been uploaded successfully. <a href="/user/list_book">Click Here</a> to see your uploaded books.';

					copy("$dir/1.png", "$dir/$alias.png");


				}else{
					$msg['type']= "Book Upload Failed";
					$msg['msg'] = 'Sorry unable to process book, Please try again after some time.
				<br><a href="/user/list_book">Click Here</a> to see your uploaded books.';

				}
				$this->load->view('site/header',$this->header_data);
				$this->load->view('site/book_upload_msg',$msg);
				$this->load->view('site/footer',$this->footer_data);

				// foreach (array_filter(glob("$dir/*.png") ,"is_file") as $f)
				//  rename ($f, md5(uniqid().$f));
				// $this->load->view('upload_success', $data);
			}
		}

	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/','refresh');
	}


}