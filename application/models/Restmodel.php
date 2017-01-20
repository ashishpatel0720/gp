<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class RestModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    // users
    public function check_publisher($publisher_id, $auth)
    {
        $this->db->where('publisher_id', $publisher_id);
        $this->db->where("hash", $auth);
        $query = $this->db->get("publishers");
        $userdata = array();
        if ($query->num_rows() == 1) {
            return true;
        }
        return false;
    }
    public function check_user($user_id, $auth)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where("hash", $auth);
        $query = $this->db->get("users");
        $userdata = array();
        if ($query->num_rows() == 1) {
            return true;
        }
        return false;
    }
    public function login($email, $password)
    {
        $this->db->where("user_email", $email);
        //$this->db->where("user_password", $password);
       // $this->db->where("user_verified", 1);
        $query = $this->db->get("users");
        $userdata = array();
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $userdata = array(
                    'USER_ID' => $rows->user_id,
                    'USER_MAIL' => $rows->user_email,
                    'USER_NAME' =>$rows->user_name,
                    'USER_USERNAME' => $rows->user_username,
                    'USER_ROLES' => $rows->user_roles,
                    'USER_VERIFIED' => $rows->user_verified,
                    /**
                     * following are added @ashish_patel for future use( in view dashboard2 )
                     * USER_TWITTER_ID
                     * USER_FACEBOOK_ID
                     * USER_WEBSITE
                     * USER_INTERESTS
                     * USER_PHONE
                     * populate if a user have those
                     */
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
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function savePublisher($data)
    {
        if ($this->db->insert('users', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function saveCourse($data)
    {
        if ($this->db->insert('courses', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function saveAccountSettings($data)
    {
        if ($this->db->insert('user_information', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function saveToken($user_id, $token)
    {
        $data = array('hash' => $token);
        $this->db->where('publisher_id', $user_id);

        return $this->db->update('publishers', $data);
    }




    public function saveMaterial($data)
    {
        if ($this->db->insert('course_material', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
}
