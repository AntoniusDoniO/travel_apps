<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author durioindigo
 */
class Login extends CI_Controller {

    //put your code here


    public function index() {
        $data['path'] = base_url() . 'assets';
        $this->load->view('LoginPage', $data);
    }

    function loginadmin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->load->model('ModelUserAdmin');
        $row = $this->ModelUserAdmin->getLogin($username, $password);
        if (!empty($row->id_adm)) {
            $this->session->set_userdata('useracces', $row->id_adm);
            $this->session->set_userdata('name', $row->name);
//            
            redirect(base_url() . 'Home');
        } else {
            echo '<script type="text/javascript">'
            . 'alert("User Name or Password invalid");'
            . 'document.location.href="' . base_url() . '"'
            . '</script>';
        }
    }

    function logout() {
        $this->session->unset_userdata('useracces');
        $this->session->unset_userdata('name');
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
