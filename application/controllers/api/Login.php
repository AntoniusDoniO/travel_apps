<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_api
 *
 * @author durioindigo
 */
require APPPATH . '../vendor/autoload.php';
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use \Firebase\JWT\JWT;

class Login extends REST_Controller{
    //put your code here
    private $secretkey = 'sur4d1r4l3mburd3n3n9p4ng4stut1';
    
     public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser');
    }

    // method untuk melihat token pada user
    public function login_post(){
        
        $date = new DateTime();
        $email = $this->post('email',TRUE); //ini adalah kolom username pada database yang saya berinama username.
        $password = $this->post('password',TRUE); //ini adalah kolom password pada database yang saya berinama password.
        $dataadmin = $this->ModelUser->getLogin($email,$password);
        if ($dataadmin) {
            if (password_verify($this->post('password'),password_hash($dataadmin->password, PASSWORD_DEFAULT))) {
                $payload['id_user'] = $dataadmin->id_user;
               
                $payload['iat'] = $date->getTimestamp(); //waktu di buat
                $payload['exp'] = $date->getTimestamp() + 3600; //satu jam
                
                $output['name'] = $dataadmin->name;
                $output['email'] = $dataadmin->email;
                $output['info']='Success, You are now login!';
                $output['status']='sukses';
                $output['code']='1';
                $output['token'] = JWT::encode($payload,$this->secretkey);
                return $this->response($output,REST_Controller::HTTP_OK);
                } else {
                    $this->viewtokenfail($email);
                }
            
        } else {
            $this->viewtokenfail($email);
        }
    }

    // method untuk jika generate token diatas salah   
    public function viewtokenfail($email){
        $this->response([
          'status'=>'gagal',
          'email'=>$email,
          'code'=>'0',
          'info'=>'Login Failed, Incorrect Email or Password!!'
          ],REST_Controller::HTTP_BAD_REQUEST);
    }

    // method untuk mengecek token setiap melakukan post, put, etc
    public function cektoken(){
      
        $jwt = $this->input->get_request_header('Authorization');
        try {
            $decode = JWT::decode($jwt,$this->secretkey,array('HS256'));
            if ($this->ModelUser->is_valid_num($decode->id_user)>0) {
                $dataUser=$this->ModelUser->getDetail($decode->id_user);
                $data['id_user']=$dataUser->id_user;
                $data['id_card']=$dataUser->id_card;
                $data['name']=$dataUser->name;
                $data['email']=$dataUser->email;
                $data['phone']=$dataUser->phone;
                $data['addres']=$dataUser->addres;
               return $data;
            }
        } catch (Exception $e) {
            exit('Wrong Token');
        }
    }

}
