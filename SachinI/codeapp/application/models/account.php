<?php

class Account extends CI_Model {

    function createuser() {
        $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'password' => MD5($this->input->post('password')),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'city' => $this->input->post('city')
        );


        $insert = $this->db->insert('users', $new_member_insert_data);
        return $insert;
    }

    public function isUserExist($username) {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $username);
        //$this -> db -> limit(1);

        $query = $this->db->get();
        if($query->num_rows()!=0)
            return false;
        return true;
    }

}

?>