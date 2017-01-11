<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HandlerModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function saveSubscriber($data){
    	if($this->db->insert('subscribers', $data))
    		return $this->db->insert_id();
    		else return false;
    }
	public function saveContact($data){
    	if($this->db->insert('contact', $data))
    		return $this->db->insert_id();
    		else return false;
    }

}
