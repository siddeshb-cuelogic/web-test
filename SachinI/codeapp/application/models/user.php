<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
    //$this->assertEquals("sachin", $username);
  //echo $this->input->post('email');exit;
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     //echo "<pre>";print_r($query->result());exit;
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function addNewUser($userData)
 {
   echo "<pre>";print_r($userData);exit;
    $this->db->insert('users', $userData); 

 }

 public function countUser($username,$password)
 {
  $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   return $query -> num_rows();
 }

 public function isUserExist($username)
 {
  $this -> db -> select('id');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   //$this -> db -> limit(1);

   $query = $this -> db -> get();
   return $query -> num_rows();
 }

 public function getAll($username,$password,$cpassword,$email,$phone)
    {     
        
           return array('username'=>$username,
      'password'=>$password,
      'cpassword'=>$cpassword,
      'email'=>$email,
      'phone'=>$phone);
    
    }
}
?>