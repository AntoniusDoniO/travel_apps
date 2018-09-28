<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelUser
 *
 * @author durioindigo
 */
class ModelUser extends CI_Model {

    //put your code here
    function getLogin($email, $password) {
        $xstr = "SELECT id_user,name,email,password from users WHERE email='$email' and password='$password'";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }

    public function is_valid($email) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    public function getDetail($id_user) {
       $xstr = "SELECT * from users WHERE id_user='$id_user'";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }

    public function is_valid_num($id_user) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }

}
