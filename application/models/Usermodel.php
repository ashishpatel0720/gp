<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model { 
    public function __construct()
    {
        parent::__construct();

    }
    // users

    public function login($email, $password)
    {
        $this->db->where("user_email", $email);
        $this->db->where("user_password", $password);
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
        if ($query->num_rows() == 1)
        {
        return $query->row_array();
        }
      return false;
    }
    public function saveUser($data){
        if($this->db->insert('users', $data))   return $this->db->insert_id();
        return false;
    }

    /**
     * this function will return id of a user using its username
     * @param $user_username
     * @return bool
     */
    public function getUserByUserName($user_username){
        $this->db->select('user_id,user_username,user_name,user_email,user_roles');
        $this->db->from('users');
        $this->db->where('user_username',$user_username);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            return $query->row_array();
        }
        return false;
    }
    public function getUserByUserId($user_id){
        $this->db->select('user_id,user_username,user_name,user_email,user_roles');
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
        {
            return $query->row_array();
        }
        return false;
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

    public function getCurrentPassword($user_id)
    {

        $query = $this->db->select('user_password')
            ->where('user_id',$user_id)
            ->get('users');

        $user_data = $query->row_array();
        return $user_data;
    }

    public function  updatePassword($new_password,$user_id)
    {
          return $this->db->set('user_password',$new_password)
                     ->where('user_id',$user_id)
                     ->update('users');
    }
    public function getUserRole($user_id){
       // $user=$this->usermodel->getUserByUserId($this->session->userdata['USER_ID']);
        $query=$this->db->select("user_roles")
            ->from('users')
            ->where('user_id',$user_id)
            ->limit(1)->get();

        if($query->num_rows()==1){
            $user_role=$query->row_array()['user_roles'];
            return $user_role;  
        }
        return false;
    }
}
