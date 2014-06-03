<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		$this->load->view( 'header' ); 
		if(($this->session->userdata('username')!="")) {
			$data['title']= 'Welcome';
			//~ $data['list'] = $this->user_model->getUsers();
			//~ $this->load->view('users_list', $data);
			$this->load->view('welcome_view', $data);
		}
		else{
			$data['title']= 'Sign In';
			$this->load->view('login', $data);
		} 
		$this->load->view( 'footer' );
	}
	 
	 public function login() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$is_form_submit = $this->input->post( 'submit' );
		if ( $is_form_submit ) {
			if ( $this->form_validation->run() ) {
				$username=$this->input->post('username');
				$password=md5($this->input->post('password'));	
				$result=$this->user_model->login($username,$password);
			}
		}
		$this->index();
	 }
	 
	 public function userlist() {
		$this->load->view( 'header' ); 
		if(($this->session->userdata('username')!="")) {
			$data['title']= 'Newest Users';
			$data['list'] = $this->user_model->getUsers();
			$this->load->view('users_list', $data);
		}
		else{
			$data['title']= 'Sign In';
			$this->load->view('login', $data);
		} 
		$this->load->view( 'footer' );
	 }
	
	public function register() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[4]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirm', 'trim|required|min_length[4]|max_length[32]|matches[password]');
		
		$data['title'] = 'Hello There';
		$this->load->view( 'header' );   
		$is_form_submit = $this->input->post( 'submit' );
		if ( $is_form_submit ) {
			if ( $this->form_validation->run()) {// && $this->validateInputData() ) {
				// form submitted and validated continue processing
				$userExists = $this->user_model->chkUserExists($this->input->post('username'));
				if($userExists === false) {
					$userAdded = $this->user_model->add_user();	
					if($userAdded) {
						$data['title']= 'Sign In';
						$this->load->view('login', $data);
					}
					else {
						$this->session->set_flashdata('message', 'Database Error.'); 
						$this->load->view('users_register_form',$data);	
					}
				}
				else {
					$this->session->set_flashdata('message', 'Username already taken. Please try a new one.'); 
					$this->load->view('users_register_form',$data);
				}
			}
			else {
				$this->load->view('users_register_form',$data);
			}
		}
		else {
			$this->load->view('users_register_form',$data);
		}
		$this->load->view( 'footer' );	
	}
	//~ 
	//~ public function validateInputData() {
		//~ require_once('validate.php');
		//~ $validate = new validate();	
		//~ $isNameValid = ($validate->isNotEmpty($this->input->post('name')) && $validate->isNameValid($this->input->post('name')));
		//~ $isUsernameValid = ($validate->isNotEmpty($this->input->post('name')) && $validate->isUsernameValid($this->input->post('name')));
		//~ return ($isNameValid && $isUsernameValid);
	//~ }
	
	public function logout() {
		$newdata = array(
			'user_id'   =>'',
			'user_name'  =>'',
			'user_email'     => '',
			'logged_in' => FALSE,
			);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
