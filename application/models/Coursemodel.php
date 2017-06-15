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
			->where(['user_id'=>$user_id,'is_enrolled'=>'1'])
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

	/**
	 * this function add enrollment for a user
	 * it sets to 1 if it is 0
	 * else insert an entry in enrollement table
	 * return false if failure
	 */
	public function insertEnrollment($data)
	{
		#updating enrollments in courses table
		$sql="update courses set enrollments=enrollments+1 where course_id=?";
		$this->db->query($sql,array($data['course_id']));
		return $this->db->insert('enrollments',$data);
	}

	public function setEnrollment($user_id,$course_id)
	{
		return $this->db->set('is_enrolled',1)
			->where(['user_id'=>$user_id,'course_id'=>$course_id])
			->update('enrollments');
	}

	public function unsetEnrollment($user_id,$course_id)
	{
		return $this->db->set('is_enrolled',0)
			->where(['user_id'=>$user_id,'course_id'=>$course_id])
			->update('enrollments');
	}
	/**
	 * this function returns 1 if enrollment entry exist for a user,
	 * return false if not exists.
	 * else true
	 */
	public function isEnrollmentEntryExists($user_id,$course_id)
	{
		$sql="select enrollment_id,is_enrolled from enrollments where user_id=? and course_id=?";
		$query=$this->db->query($sql,[$user_id, $course_id]);
		if($query->num_rows()==1)  # if entry exists in db
			return $query->row_array();
		else
			return false;
	}

	/**
	 * this function return  true or false according to existance of a an enrollment for a user
	 * @param $user_id
	 * @param $course_id
	 * @return bool
	 *
	 */
	public function isEnrolled($user_id,$course_id)
	{
		$isEntryExist=$this->isEnrollmentEntryExists($user_id,$course_id);
      if($isEntryExist!=false && $isEntryExist['is_enrolled']==1)# is entry exist and if 'is_enrolled' is 1
		  return true;
      else
		  return false;
	}


}
