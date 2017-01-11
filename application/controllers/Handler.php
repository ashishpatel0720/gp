<?php
/*
 * Handler.php
 *
 * Created on Fri Jan 06 2017 02:09:45 GMT+0530 (IST)
 * Copyright (c) 2017 by Arvind Dhakad. All Rights Reserved.
 *
 * @author Arvind Dhakad
 *
 */
 
defined('BASEPATH') or exit('No direct script access allowed');
class Handler extends CI_Controller
{
    public $header_data=[];
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('bookmodel');
        $this->load->library('form_validation');
        $this->footer_data['reader'] = false;
        $this->header_data['reader'] = false;
        $this->categories= [];
        // $this->output->cache(3);
        $books = ($this->bookmodel->fetchCategories());
        foreach ($books as $key => $value) {
            $this->categories[$value['main_category_title']][$value['sub_category_title']][] = $value['subject_title'];
        }
        $this->header_data['categories'] = $this->categories;
    }
    public function index()
    {
        show_404();
    }

    public function newsletter()
    {
        if (isset($_POST['email_'])) {
            $this->form_validation->set_rules('email_', 'Email', 'required|max_length[255]|valid_email');
            if ($this->form_validation->run() == true) {
                $data = array(
                's_email' => $_POST['email_'],
                'created_at' => date('Y-m-d H:i:s'),
                'sent_mails' => 0,
                'unsubscribed'=>0);
                $insert_id = $this->handlerModel->saveSubscriber($data);
                if ($insert_id) {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>true,'msg'=>'समाचार पत्रक के लिए आपका धन्यवाद पंजीयन सफ़ल हुआ, आपको नयी जानकारी अणुडाक द्वारा प्राप्त होगी ')));
                } else {
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>false,'msg'=>'क्षमा करें आपका पंजीयन असफ़ल हुआ कृपया दोबारा प्रयास कैर्न ..')));
                }
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>false,'msg'=>'कृपया अणुडाक अंग्रेजी वर्णमाला में डालें')));
            }
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>false,'msg'=>'')));
        }
    }
    public function contactus()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $mobile = $this->input->post('phone', true);
        $msg = $this->input->post('message', true);

        if (isset($email) && !empty($email)) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'mob' => $mobile,
                'msg' => $msg,
                'created_at' => date('Y-m-d H:i:s')
                );
            $insert_id = $this->handlerModel->saveContact($data);
            if ($insert_id) {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>true,'msg'=>'Thank you very much for signing up for newsletter')));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>false,'msg'=>'A problem occured, please try again later.')));
            }
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode(array('res'=>false,'msg'=>'')));
        }
    }


    public function categories()
    {
        $books = ($this->bookmodel->fetchCategories());
        foreach ($books as $key => $value) {
            $categories[$value['main_category_id']][$value['sub_category_title']][] = $value['subject_title'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($categories));
    }
    public function load_subcategories()
    {
        $main = $this->uri->segment(3);
        if (!empty($main)) {
            $sub = ($this->bookmodel->getSubCategoryByMain($main));
            $this->output->set_content_type('application/json')->set_output(json_encode($sub));
        }
    }
    public function load_subjects()
    {
        $subc = $this->uri->segment(3);
        if (!empty($subc)) {
            $sub = ($this->bookmodel->getSubjectsBySubMain($subc));
            $this->output->set_content_type('application/json')->set_output(json_encode($sub));
        }
    }
    public function page()
    {
        $book = $this->uri->segment(2);
        $file_name = $this->uri->segment(4);
        $hash = $this->uri->segment(5);
        if (!empty($book) && !empty($file_name)) {
            if ($this->session->userdata('hash')!=$hash) {
                return;
            }

            // $file = $this->config->item('book_').$file.'/1.png';
            $file = 'static/book_images/'.$book.'/'.base_convert(base64_decode($file_name), 35, 10).'.png';
            // echo $file.'  '.file_exists($file);
            // exit;
            header("Pragma-directive: no-cache");
            header("Cache-directive: no-cache");
            header("Cache-control: no-cache");
            header("Pragma: no-cache");
            header("Expires: 0");
            $im = imagecreatefrompng($file);
            header('Content-Type: image/png');
            imagepng($im);
            imagedestroy($im);
        }
    }

    public function page_html()
    {
        $whetheriswhether = false;
        $content = 'whether is not whether';

        $book = $this->uri->segment(2);
        $file_name = $this->uri->segment(5);
        // $hash = $this->uri->segment(5);
        if (!empty($book) && !empty($file_name)) {
            // if($this->session->userdata('hash')!=$hash) return;
            try {
                $path = 'static/book_html/'.$book.'/';
                $file = 'static/book_html/'.$book.'/'.$book.'.html';

                $doc = new DOMDocument();
                $doc_ = new DOMDocument();
                $doc->loadHTMLFile($file);
                $page = $doc->getElementById('pf'.dechex($file_name));

                if ($page) {
                    $html_ = ($doc->saveHTML($page));
                    $doc_->loadHTML('<?xml encoding="UTF-8">' .$html_);
                    $img_ele = $doc_->getElementsByTagName('img');
                    foreach ($img_ele as $key => $value) {
                        $temp = $value->getAttribute('src');
                        $value->setAttribute('src', $path.$temp);
                    }

                    $whetheriswhether = true;
                    $content = $doc_->saveHTML();
                }
            } catch (Exception $e) {
                $whetheriswhether = false;
            }
            $output = array('whetheriswhether' => $whetheriswhether,'content'=>$content);
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }
}
