<?php // tests/UserModelTest.php 

class UserModelTest extends PHPUnit_Framework_TestCase { 	

	private $CI;
	private $name = "George";
	private $username = "george";
	private $password="kjd76879a67e";        
	private $cpassword="kjd76879a67e";
	private $email="test@test123.co.in";

	 	
    public function setUp() { 	
		$this->CI = &get_instance();
	}

	public function testGetUsersEmpty() {
		$this->CI->load->model('user_model');
		$users = $this->CI->user_model->getUsers();
		$this->assertNotEmpty($users);
	}
	
	public function testGetUsersCount() {
		$this->CI->load->model('user_model');
		$users = $this->CI->user_model->getUsers();
		$this->assertLessThanOrEqual(100,count($users));
	}
	
	public function testchkUserExistsEmpty() {
		$returnValue = $this->CI->user_model->chkUserExists('');
		$this->assertFalse($returnValue);
	}
	
	public function testchkUserExistsTrue() {
		$returnValue = $this->CI->user_model->chkUserExists('pooja');
		$this->assertTrue($returnValue);
	}
	
	public function testchkUserExistsFalse() {
		$returnValue = $this->CI->user_model->chkUserExists('nouser');
		$this->assertFalse($returnValue);
	}
	
	//This test could use a data provider to provide the data
	public function testAdd_user() {
		$this->CI->load->model('user_model');
		$test_type = 2;
		$_POST = array('username' => '','email' => 'hehe@test.com','password' => 'he heh','name' => 'Testing');
		$returnValue = $this->CI->user_model->add_user();
		switch($test_type) {
				case '1' :
					$this->assertTrue($returnValue);
					break;
				
				case '2' :
					$this->assertFalse($returnValue);
					break;		
		}
	}
	
	public function testLoginTrue() {
		$returnValue = $this->CI->user_model->login('pooja',md5('pooja'));
		$this->assertTrue($returnValue);
	}
	
	public function testLoginFalse() {
		$returnValue = $this->CI->user_model->login('pooja',md5('123459'));
		$this->assertFalse($returnValue);
	}
	
	//Using assretions on local class data
	public function testUsernameNotEmpty() {
		$this->assertNotempty($this->username);	
	}	
	
	public function testUsernameNotNull() {
		$this->assertNotNull($this->username, $message = 'Username cannot be Null');	
	}	

	public function testUsernameLengthLessThanSix() {
		$this->assertGreaterThanOrEqual(4, strlen($this->username));
	}

	public function testUsernameLengthGreaterThan15() {
		$this->assertLessThanOrEqual(15, strlen($this->username));
	}

	public function testPasswordNotEmpty() {
		$this->assertNotEmpty($this->password);
	}

	public function testPasswordEqualConfirmPassword() {
		$this->assertEquals($this->password, $this->cpassword);
	}

	public function testEmailNotEmpty() {
		$this->assertNotEmpty($this->email);
	}
}

?>
