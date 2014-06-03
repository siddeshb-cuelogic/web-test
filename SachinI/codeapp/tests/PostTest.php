<?php

// tests/PostTest.php 
include "PasswordValidator.php";

class PostTest extends PHPUnit_Framework_TestCase {

    private $CI;
    private $firstname = "sasAas";
    private $lastname = "Ingale";
    private $username = "sachin1";
    private $password = "abcdefgh#$1";        // Min:6 Max:15, Atleast one digit,one Special char
    private $cpassword = "abcdefgh#$1";
    private $email = "ingale.sachin002@gmail.com";
    private $phone = "1234567890";
    private $gender = 'male';
    private $genderArr = array("male", "female");

    public function setUp() {

        $this->CI = &get_instance();
    }

    public function testGetAllPost() {

        $this->CI->load->model('user');
        $posts = $this->CI->user->getAll($this->username, $this->password, $this->cpassword, $this->email, $this->phone);
        $this->assertNotEmpty($posts['username']);
    }

    public function testFirstnameNotEmpty() {
        $this->assertNotEmpty($this->firstname);
    }

    public function testFirstnameNotNull() {
        $this->assertNotNull($this->firstname, $message = 'Firstname should not be Null');
    }

    public function testFirstnameContainsChar() {
        $this->assertRegExp("/^[a-zA-Z]+$/", $this->firstname, $message = 'Firstname should contains only character');
    }

    public function testLastnameNotEmpty() {
        $this->assertNotEmpty($this->lastname);
    }

    public function testLastnameNotNull() {
        $this->assertNotNull($this->lastname, $message = 'Lastname should not be Null');
    }

    public function testLastnameContainsChar() {
        $this->assertRegExp("/^[a-zA-Z]+$/", $this->lastname, $message = 'Lastname should contains only character');
    }

    public function testUsernameNotEmpty() {
        $this->assertNotEmpty($this->username);
    }

    public function testUsernameNotNull() {
        $this->assertNotNull($this->username, $message = 'Username should not be Null');
    }

    public function testIsUsernameExist() {
        $userExist = $this->CI->user->isUserExist($this->username);
        $this->assertEquals(0, $userExist);
    }

    public function testUsernameLengthLessThanSix() {
        $this->assertGreaterThanOrEqual(6, strlen($this->username));
    }

    public function testUsernameLengthGreaterThan15() {
        $this->assertLessThanOrEqual(15, strlen($this->username));
    }

    public function testValidPassword() {
        $pwd = new Validator();
        $this->assertEquals(true, $pwd->isPasswordValid($this->password));
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

    public function testValidEmail() {
        $emailObj = new Validator();
        $this->assertEquals(true, $emailObj->isEmailValid($this->email));
    }

    public function testGenderNotEmpty() {
        $this->assertNotEmpty($this->gender);
    }

    public function testGenderValue() {
        $this->assertContains($this->gender, $this->genderArr, $ignoreCase = FALSE, $checkForObjectIdentity = TRUE);
    }

    public function testMobileNotEmpty() {
        $this->assertNotEmpty($this->phone);
    }

    public function testMobileContainsDigit() {
        $this->assertRegExp("/^[0-9]+$/", $this->phone, $message = 'Mobile Number contains only Digit');
    }

    public function testCountMobileDigit() {
        $this->assertEquals(10, strlen($this->phone), $message = 'Mobile Number Length should be 10');
    }

    /* public function testEmailExists()
      {
      $emailObj=new Validator();
      $this->assertEquals('valid',$emailObj->verifyEmail($this->email));

      } */
}

?>