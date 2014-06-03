<?php

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('account');
        $this->baseurl = dirname(dirname(base_url()));
    }

    function members() {
        $data['content'] = 'success';
        $this->load->view('login_view', $data);
    }

    function index() {
        
        $this->load->helper(array('form'));
        $this->load->view('register_view');
    }

    function registration() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_username_check');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();      
        } else {
            if ($query = $this->account->createuser()) {
                $this->members();
            } else {
                //$this->load->view('registration');
                $this->index();
            }
        }
    }

    function username_check($username) {
        
        $str = $this->account->isUserExist($username);
    
        if (!$str) {
            $this->form_validation->set_message('username_check', '%s already exist in database.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>