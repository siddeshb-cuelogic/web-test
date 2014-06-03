<?php // tests/UserControllerTest.php 

class UserControllerTest extends PHPUnit_Framework_TestCase { 	

	private $CI; 	
    public function setUp() { 	
		$this->CI = &get_instance();
	}

	public function testGetUsersEmpty() {
		$obj = $this->CI->load->model('user_model');
		$this->assertNull($obj);
		$users = $this->CI->user_model->getUsers();
		$this->assertNotEmpty($users);
		$this->assertLessThanOrEqual(100,count($users));
	}
	
		
	
	
}

?>
