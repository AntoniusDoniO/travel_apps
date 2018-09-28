<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author durioindigo
 */
class Profile extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $useracces = $this->session->userdata('useracces');
        if (!empty($useracces)) {
            // load URL helper
            $this->load->model('ModelUserAdmin');
          
        } else {
            redirect(base_url());
        }
    }
    public function  index(){
        
    }
}
