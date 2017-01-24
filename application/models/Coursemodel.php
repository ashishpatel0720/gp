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

	public function recordCount($keyword=false){
		$query = $this->db->get('courses');
		return $query->num_rows();
	}

	public function getCoursesByLimit($limit,$start=0){
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getCourseById($id){
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('course_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getMaterialByIdType($course_id,$material_type = null){
		$this->db->select('*');
		$this->db->from('course_material');
		$this->db->where('material_course_id',$course_id);

		if(!empty($material_type)) $this->db->where('material_type',$material_type);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMaterialById($material_id){
		$this->db->select('*');
		$this->db->from('course_material');
		$this->db->where('material_id',$material_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function getEnrolledCourses($user_id)
	{
		$query=$this->db->select('course_id')
			->where('student_id',$user_id)
			->get('enrollments');
		if($query->num_rows()==0)
			return false;
		else{
			$course_array=[];
			foreach ($query->result_array() as $item) {
				$course_array[]=$item['course_id'];
			}
			return $course_array;
		}
	}

}
