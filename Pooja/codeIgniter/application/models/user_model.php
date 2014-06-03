<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model { 
	public $username;
	public $email;
	public $password;
	public $name;    
	
	public function __construct() {
		parent::__construct();
	}
	
	public function setUsername($new_username) {
		$this->username = $new_username;
	}
	
	public function setEmail($new_email) {
		$this->email = $new_email;
	}
	
	public function setPassword($new_password) {
		$this->password = $new_password;
	}
	
	public function setName($new_name) {
		$this->name = $new_name;
	}
	
	public function add_user() {
		if($this->input->post('username') != '' && $this->input->post('password')  != '' ) {
			$data = array('username'=>$this->input->post('username'),'email'=>$this->input->post('email'),'password'=>md5($this->input->post('password')),'name'=>$this->input->post('name'));
			 if($this->db->insert('user',$data)) return true;
			 else return false;	
		}
		return false;
	}
	
	public function chkUserExists($username) {
		if($username != '' || $username != NULL) {
		  $this->db->where("username",$username);
		  $query=$this->db->get("user");
			if($query->num_rows() > 0) {
				return true;		
			}
			else {
				return false;	
			}
		}
		return false;
	}
	
	public function getUsers() {
		$this->db->limit(100);
		$this->db->order_by("id","desc");
		$resultSet = $this->db->get("user");
		$list = array();
		foreach ($resultSet->result() as $row) {
			$list[] = $row;
		}
		return $list;
	}
	
	public function login($username,$password) {
		$this->db->where("username",$username);
		$this->db->where("password",$password);

		$query=$this->db->get("user");
		if($query->num_rows() > 0) {
			foreach($query->result() as $rows) {
				//add all data to session
				$newdata = array(
				  'user_id'  => $rows->id,
				  'username'  => $rows->username,
				  'email'    => $rows->email,
				  'logged_in'  => TRUE,
				);
			}
			$this->session->set_userdata($newdata);
			return true;
		}
		return false;
	}
	
	
}
