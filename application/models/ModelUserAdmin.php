<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelUserAdmin
 *
 * @author durioindigo
 */
class ModelUserAdmin extends CI_Model{
    //put your code here
    function getLogin($username,$password){
        $xstr="SELECT id_adm,name from users_adm WHERE user_name='$username' and password='$password'";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
}
