<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Rest extends CI_Controller
{
    public $header_data=[];
    private $loggedIn = false;
    private $userPermissions = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('bookupload');

        $this->load->model('restmodel');
    }
    public function index()
    {
    }
    public function check_valid_publisher()
    {
        // $output = array('response' =>'true','args' => array('' => , ));
      $output_ = array('response'=>'false');

        $publisher =  $this->input->post_get('publisher', true);
        $publisher = $publisher-20000;
        $auth =  $this->input->post_get('auth', true);
      // var_dump($publisher);

      if (!empty($publisher) && !empty($auth)) {
          $is_valid = $this->restmodel->check_publisher($publisher, $auth);
          $output_['response'] = true;
          $output_['args'] = array('valid' => $is_valid,'redirectto'=>true, 'redirecturi'=>'http://grabpustak.in/cp');
      } else {
          $output_['response'] = true;
          $output_['args'] = array('valid' => 'false','redirectto'=>true, 'redirecturi'=>'http://grabpustak.in/cp');
      }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($output_));
    }

    public function check_valid_user()
    {
        // $output = array('response' =>'true','args' => array('' => , ));
      $output_ = array('response'=>'false');

        $user =  $this->input->post_get('publisher', true);
        $user = $user-20000;
        $auth =  $this->input->post_get('auth', true);
        $course =  $this->input->post_get('course', true);
      // var_dump($publisher);

      if (!empty($user) && !empty($auth)) {
          $is_valid = $this->restmodel->check_publisher($user, $auth);
          $output_['response'] = true;
          $output_['args'] = array('valid' => $is_valid,'redirectto'=>true, 'redirecturi'=>'http://grabpustak.in/users');
      } else {
          $output_['response'] = true;
          $output_['args'] = array('valid' => 'false','redirectto'=>true, 'redirecturi'=>'http://grabpustak.in/users');
      }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($output_));
    }

    public function gethtmlbook()
    {
        $config['upload_path']= FCPATH.'static/book_tar/';
        $config['allowed_types']= '*';
        $config['max_size']= 25000;
        // var_dump($_POST);
        // var_dump($_FILES);
        // exit;

        // curl --data 'course_id=$course&book_id=$book_id&upload_metadata=$upload_metadata&auth=$auth&user_id=$user_id' http://gpapi/cp/update_book.php

        $book_id = $this->input->post('book_id', true);
        $course_id = $this->input->post('course_id', true);
        $upload_metadata = $this->input->post('upload_metadata', true);
        $user_id = $this->input->post('user_id', true);
        $description = $this->input->post('book_description', false);

        $upload_metadata = json_decode($upload_metadata);



        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('book_data')) {
            $error = array('error' => $this->upload->display_errors());
                            // var_dump($error);
                          $this->output->set_content_type('application/json')->set_output(json_encode($error));
                            // $this->load->view('upload_form', $error);
                            $msg['msg'] = 'Bfgg uploaded books.';
        } else {
            $data_upload = $this->upload->data();
                    // $this->output->set_content_type('application/json')->set_output(json_encode($data));

                    $data = array(
                    'course_id'=> $course_id,
                    'material_title'=>$upload_metadata->title,
                    'material_description'=>$upload_metadata->description,
                    'folder_path'=> $data_upload['full_path'],
                    'is_html' => 1,
                    'material_created_at'=> date('Y-m-d H:i:s'),
                    'is_deleted'=>0,
                    );
            $insert_id = $this->restmodel->saveMaterial($data);
            // var_dump($insert_id);
            // $file_path =  'static/book_html/'.$alias;
                        // var_dump(file_exists($file_path));
              // mkdir('static/book_html/'.$insert_id);

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
                  $path = $data_upload['full_path'];
            $extraction_path  = FCPATH.'static/book_html/';
            shell_exec("tar -xvf $path -C $extraction_path");


                    // if(pdf_to_img($data['full_path'],$data['file_path'].'../book_images/'.$alias)){
                      // $dir = $data['file_path'].'../book_images/'.$alias;
                      // $pages = count(array_filter(glob("$dir/*.png") ,"is_file"));
                      // $msg = [];
                      // if(file_exists("$dir/1.png"))
              $msg['type']= "Book Upload Success";
               $msg['msg'] = 'Book has been uploaded successfully. <a href="/cp/list_book">Click Here</a> to see your uploaded books.';

                      // copy("$dir/1.png", "$dir/$alias.png");


                  // // }else{
                  //     $msg['type']= "Book Upload Failed";
                  //     $msg['msg'] = 'Sorry unable to process book, Please try again after some time.
                  //     <br><a href="/cp/list_book">Click Here</a> to see your uploaded books.';
        }
        $this->session->flashdata('msg', $msg);
        // redirect('cp/upload_book_info', 'refresh');

                      // foreach (array_filter(glob("$dir/*.png") ,"is_file") as $f)
                      //  rename ($f, md5(uniqid().$f));
                      // $this->load->view('upload_success', $data);
                // }
            // }
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
