<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();

    }
    // users
    public function getUser($email,$password)
    {
        $this->db->select('*');
        $this->db->from('authors');
        $this->db->where('a_email',$alias);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function login($email, $password)
    {
        $this->db->where("user_email", $email);
        //$this->db->where("user_password", $password);
        // $this->db->where("user_verified", 1);
        $query = $this->db->get("users");
        $userdata = array();
        if ($query->num_rows() == 1)
        {
            foreach ($query->result() as $rows)
            {
                //add all data to session
                $userdata = array(
                    'USER_ID' => $rows->user_id,
                    'USER_MAIL' => $rows->user_email,
                    'USER_NAME' =>$rows->user_name,
                    'USER_USERNAME' => $rows->user_username,
                    'USER_ROLES' => $rows->user_roles,
                    'USER_VERIFIED' => $rows->user_verified,
                );
           }
         }
     else return false;
    # adding from user_informationt table
    #table has been modified accordingly
        $this->db->where("user_id", $userdata['USER_ID']);
     
        $query = $this->db->get("user_information");
        if ($query->num_rows() == 1)
        {
            foreach ($query->result() as $rows)
            {
                //add all data to session
               
                  $userdata ['USER_TWITTER_ID'] = $rows->user_twitter_id;
                  $userdata ['USER_FACEBOOK_ID'] = $rows->user_facebook_id;
                  $userdata ['USER_INTERESTS'] = $rows->user_interests;
                  $userdata ['USER_PHONE'] = $rows->user_phone;
                  $userdata ['USER_WEBSITE'] = $rows->user_website;
           }
          return $userdata;
        }
        return false;
    }

    public function getUserInfo($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_information');
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function savePublisher($data){
     
        if(($this->db->insert('users', $data))&& $this->db->insert('user_information',array('user_id'=>$this->db->insert_id())))
            return $this->db->insert_id();
         else return false;
    }

    public function saveCourse($data){
        if($this->db->insert('courses', $data))
            return $this->db->insert_id();
        else return false;
    }
    public function saveAccountSettings($data){
        if($this->db->insert('user_information', $data))
            return $this->db->insert_id();
        
        else return false;
    }

    public function updateAccountSettings($data,$user_id){
        $this->db->where('user_id',$user_id);
        if($this->db->update('user_information', $data))
            return $this->db->affected_rows();

        else return false;
    }


}
