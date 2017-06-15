<?php

/**
 * Created by PhpStorm.
 * User: ashish_patel
 * Date: 1/22/2017
 * Time: 3:05 AM
 */
class Basemodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveContactMessage($contact_data)
    {
        return $this->db->insert('contact',$contact_data);
    }
}