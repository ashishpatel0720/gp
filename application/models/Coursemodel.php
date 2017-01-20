<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CourseModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();

	}
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
                return $userdata;
            }
        return false;
    }
    public function savePublisher($data){
        if($this->db->insert('users', $data))
            return $this->db->insert_id();
            else return false;
    }

    public function saveCourse($data){
    	if($this->db->insert('courses', $data))
    		return $this->db->insert_id();
    		else return false;
    }

		public function saveToken($user_id,$token){
			$data = array('hash' => $token);
			$this->db->where('user_id', $user_id);
			return $this->db->update('users', $data);
		}

}
