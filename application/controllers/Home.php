<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author durioindigo
 */
class Home extends CI_Controller{
    //put your code here
    public function index(){
        $useracces = $this->session->userdata('useracces');
         if (!empty($useracces)) {
        $data['path'] = base_url() . 'assets';
        $this->load->view('header', $data);
        $this->load->view('home', $data);
        $this->load->view('footer', $data);
         }else{
             redirect(base_url());
         }
        
    }
}
