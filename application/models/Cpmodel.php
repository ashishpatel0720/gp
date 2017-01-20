<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CpModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();

	}
	public function login($email, $password)
    {
        $this->db->where("publisher_email", $email);
        $this->db->where("publisher_password", $password);
        $this->db->where("publisher_verified", 1);
        $query = $this->db->get("publishers");
        $userdata = false;
        if ($query->num_rows() == 1)
            {
            foreach ($query->result() as $rows)
                {
                //add all data to session
                $userdata = array(
                    'PUBLISHER_ID' => $rows->publisher_id,
                    'PUBLISHER_MAIL' => $rows->publisher_email,
                    'PUBLISHER_TITLE' =>$rows->publisher_title,
                    'PUBLISHER_ALIAS' => $rows->publisher_alias,
                    'PUBLISHER_VERIFIED' => $rows->publisher_verified,
                );

                }
                return $userdata;
            }
        return false;
    }
    public function savePublisher($data){
    	if($this->db->insert('publishers', $data))
    		return $this->db->insert_id();
    		else return false;
    }
		public function saveToken($user_id,$token){
			$data = array('hash' => $token);
			$this->db->where('publisher_id', $user_id);
			
			return $this->db->update('publishers', $data);
		}
}
