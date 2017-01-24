<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Cp extends CI_Controller
{
    public $header_data=[];
    private $loggedIn = false;
    private $userPermissions = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('cpmodel');
        $this->load->helper('bookupload');

        $this->load->model('bookmodel');
        $this->categories= [];
      // $this->output->cache(3);
       $books = ($this->bookmodel->fetchCategories());
        foreach ($books as $key => $value) {
            $this->categories[$value['main_category_title']][$value['sub_category_title']][] = $value['subject_title'];
        }
        $this->header_data['categories'] = $this->categories;


        $this->load->library('form_validation');
        if (isset($_SESSION['PUBLISHER_ID']) && !empty($_SESSION['PUBLISHER_ID'])) {
            $this->loggedIn = true;
        }
        date_default_timezone_set("Asia/Kolkata");
    }
    public function index()
    {
        if (!$this->loggedIn) {
            redirect('/cp/login', true);
        } else {
            $this->load->view('site/header', $this->header_data);
            $this->load->view('site/dashboard', $data);
            $this->load->view('site/footer');
        }
    }
    public function dashboard()
    {
        if (!$this->loggedIn) {
            redirect('/cp/login', true);
        }
        $this->load->view('site/header', $this->header_data);
        $this->load->view('site/dashboard', $data);
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
        if ($this->loggedIn) {
            redirect('/cp/dashboard', 'refresh');
        }
        $data['login_err']='';
        $this->data['title'] = 'Publisher Login';
        if (isset($_POST['_lgn'])) {
            $data['login_err'] = 'Credentials are not valid';
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == true) {
                $userdata = $this->cpmodel->login($_POST['email'], $this->user_password_hash($_POST['password']));
                if ($userdata) {
                    $this->session->set_userdata($userdata);
                    redirect('/cp/dashboard');
                } else {
                    $this->load->view('site/header', $this->header_data);
                    $this->load->view('site/login', $data);
                    $this->load->view('site/footer');
                }
            } else {
                $this->load->view('site/header', $this->header_data);
                $this->load->view('site/login', $data);
                $this->load->view('site/footer');
            }
        } else {
            $this->load->view('site/header', $this->header_data);
            $this->load->view('site/login', $data);
            $this->load->view('site/footer');
        }
        // redirect('admin','refresh');
    }
    public function signup()
    {
        if (isset($_POST)) {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('name_title', 'Name or Title', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password1]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|required|numeric');
            if ($this->form_validation->run() == true) {
                $title = $this->input->post('name_title', true);
                $email = $this->input->post('email', true);
                $contact = $this->input->post('contact_no', true);
                $password1 = $this->input->post('password1', true);
                $password2 = $this->input->post('password2', true);
                if ($password1==$password2) {
                    $password= $this->user_password_hash($password1);
                }
                $alias = url_title($title, 'underscore');

                $data = array(
            'publisher_title' => $title,
            'publisher_alias' => $alias,
            'publisher_email' => $email,
            'publisher_password' => $password,
            'publisher_contact' =>$contact,
            'publisher_desc' => '',
            'publisher_created_at' => date('Y-m-d H:i:s'),
            'publisher_updated_at' => date('Y-m-d H:i:s'),
            );
                $insert_id = $this->cpmodel->savePublisher($data);
                if ($insert_id) {
                    $this->load->view('site/header', $this->header_data);
                    $this->load->view('site/publisher_reg_after', $data);
                    $this->load->view('site/footer');
                }
            } else {
                $this->load->view('site/header', $this->header_data);
                $this->load->view('site/register', $data);
                $this->load->view('site/footer');
            }
        }
        // $this->load->view('old/footer_admin_main');
    }

    public function uploadHandler()
    {
        if (!$this->loggedIn) {
            redirect('/cp/login', 'refresh');
        }
        $config['upload_path']          = FCPATH.'static/images/blog/posts/uploads';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
                    // $config['max_width']            = 1024;
                    // $config['max_height']           = 768;

                    $this->load->library('upload', $config);
                    // var_dump($_POST);
                    if (! $this->upload->do_upload('image')) {
                        $error = array('status'=>0,'msg' => $this->upload->display_errors());
                        $this->output->set_content_type('application/json')->set_output(json_encode($error));
                    } else {
                        $u = $this->upload->data();
                        $data = array('status'=>1,'msg'=>array('file_name' => $u['file_name'],'url'=>base_url().$this->config->item('BLOG_MEDIA').$u['file_name']));
                        $this->output->set_content_type('application/json')->set_output(json_encode($data));
                    }
    }

    public function editBlog()
    {
        // $this->load->view('old/header_admin');
        if (!$this->loggedIn) {
            redirect('/cp/login', 'refresh');
        }
        if (isset($_POS) && !empty($_POST)) {
            $title = $this->input->post('blog_title', true);
            $alias = $this->input->post('blog_alias', true);
            $tags = $this->input->post('blog_tags', true);
            $zenre = $this->input->post('blog_zenre', true);
            $type = $this->input->post('blog_type', true);
            $original_author = $this->input->post('blog_original_author', true);
            $savenopublish = $this->input->post('savenopublish', true);
            if ($savenopublish) {
                $savenopublish = 1;
            } else {
                $savenopublish = 0;
            }
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
            $insert_id = $this->cpmodel->saveBlog($data);
            if ($insert_id) {
                redirect('/blog/'.$insert_id.'/'.$alias, 'refresh');
            }
        } else {
            if ($this->uri->segment(3) && $this->uri->segment(4)) {
                $blog_data['blog'] = $this->blogmodel->getSingleBlogById($this->uri->segment(3));
                if (url_title($blog_data['blog']['alias']) == $this->uri->segment(4)) {
                    $this->header_data['meta_title'] = "तूर्यनाद | ".$blog_data['blog']['title'];
                    $this->header_data['page_title'] = "तूर्यनाद | ".$blog_data['blog']['title'];
                    $this->header_data['description']=strip_tags(substr($blog_data['blog']['content'], 0, 400));
                    $this->load->view('old/header_admin', $this->header_data);
                    $this->load->view('old/edit', $blog_data);
                    $this->load->view('old/footer_admin', $this->footer_data);
                } else {
                    echo $this->uri->segment(4);
                }
            }
        }
        // $this->load->view('old/footer_admin_main');
    }


    private function generateToken($user_id)
    {
        $salt = random_string('alnum', 16);
        $salt1 = strrev(md5($user_id));
        return hash('SHA512', ($salt.'GPIO'.$salt1));
    }

    public function upload_book()
    {
        if (!$this->loggedIn) {
            redirect('/cp/login', 'refresh');
        }
        $this->header_data['page_title'] = "Home | Grabpustak";
        $this->header_data['meta_title'] = "Home | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $user = $this->session->userdata('PUBLISHER_ID');
        $user_ = $user+20000;
        $this->load->helper('string');
        $token = $this->generateToken($user);
        $save =  $this->cpmodel->saveToken($user, $token);
        // var_dump($save);
        // $upload_data['main_categories'] = $this->bookmodel->getMainCategory();
        // redirect("http://upload.grabpustak.com/cp?auth=$token.'&'.$user");


        redirect("http://gpapi/cp/handle?auth=$token&publisher=$user_", 'refresh');
        //
        // $this->load->view('site/header', $this->header_data);
        // $this->load->view('site/upload_book_form', $upload_data);
        // $this->load->view('site/footer', $this->footer_data);
    }



    public function process_book_upload()
    {
        if (!$this->loggedIn) {
            redirect('/cp/login', 'refresh');
        }
        $config['upload_path']= 'static/books_pdf/';
        $config['allowed_types']= 'pdf';
        $config['max_size']= 1000000;

        $title = $this->input->post('title', true);
        $isbn = $this->input->post('isbn', true);
        $author = $this->input->post('author', true);
        $publication_date = $this->input->post('publication_date', true);
        $description = $this->input->post('book_description', false);
        $category = $this->input->post('book_cat_subject', false);
        $type = $this->input->post('book_type', false);


        $alias = url_title($title, 'underscore');

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('pdf_book')) {
            $error = array('error' => $this->upload->display_errors());
                        // var_dump($error);
                      $this->output->set_content_type('application/json')->set_output(json_encode($error));
                        // $this->load->view('upload_form', $error);
        } else {
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
                'book_pages'=>0,
                'book_category' => $category,
                'book_publisher' => $this->session->userdata('PUBLISHER_ID'),
                'book_image' => 'poster.png',
                'book_path'=>$data['file_path'],
                'book_created_at'=> date('Y-m-d H:i:s'),
                'paper_or_publication_date'=>date('Y-m-d'),
                'is_html'=> 1,
                'book_deleted'=> 0,
                );

            $insert_id = $this->bookmodel->saveBook($data);
            $file_path =  'static/book_html/'.$alias;
                  // var_dump(file_exists($file_path));
                  mkdir('static/book_html/'.$insert_id);

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


                // if(pdf_to_img($data['full_path'],$data['file_path'].'../book_images/'.$alias)){
                  // $dir = $data['file_path'].'../book_images/'.$alias;
                  // $pages = count(array_filter(glob("$dir/*.png") ,"is_file"));
                  // $msg = [];
                  // if(file_exists("$dir/1.png")){

               $msg['type']= "Book Upload Success";
            $msg['msg'] = 'Book has been uploaded successfully. <a href="/cp/list_book">Click Here</a> to see your uploaded books.';

                  // copy("$dir/1.png", "$dir/$alias.png");


              // // }else{
              //     $msg['type']= "Book Upload Failed";
              //     $msg['msg'] = 'Sorry unable to process book, Please try again after some time.
              //     <br><a href="/cp/list_book">Click Here</a> to see your uploaded books.';
        }
        $this->session->flashdata('msg', $msg);
        redirect('cp/upload_book_info', 'refresh');

                  // foreach (array_filter(glob("$dir/*.png") ,"is_file") as $f)
                  //  rename ($f, md5(uniqid().$f));
                  // $this->load->view('upload_success', $data);
            // }
        // }
    }
    public function upload_book_info()
    {
        $this->header_data['page_title'] = "Home | Grabpustak";
        $this->header_data['meta_title'] = "Home | Grabpustak ";
        $this->header_data['description']="Grabpustak is the online repository for books. Which contains the large variety of children, college books and large dataset of the nobels.";
        $this->footer_data['facebook'] = true;

        $this->load->view('site/header', $this->header_data);
        $this->load->view('books/book_upload_msg');
        $this->load->view('site/footer', $this->footer_data);
    }
    public function upload_file_server()
    {
        $file = $this->input->get('file', true);
        if (empty($file)) {
            echo 'i cant upload without file ?';
            return;
        }

        $ch = curl_init('http://gpapi/welcome/upload_handler');

        $cfile = new CURLFile('static/book_pdfs/'.$file, 'application/pdf', $file);

        $data = array('file' => $cfile);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        var_dump(curl_exec($ch));
        var_dump(curl_error($ch));
    }
}
