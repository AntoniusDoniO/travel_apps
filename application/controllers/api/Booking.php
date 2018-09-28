<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booking
 *
 * @author durioindigo
 */
require APPPATH . 'controllers/api/Login.php';
class Booking extends Login{
    //put your code here
    function __construct($config = 'rest') {
        parent::__construct($config);

        $this->load->model('ModelVoucher');
        $this->load->model('ModelUser');
    }
    function index_post() {
        $this->load->model('ModelBooking');
        $id_user=$this->post('id_user', TRUE);
        
        $array_length= $this->post('array_length',TRUE);
        $start_date= $this->post('start_date',TRUE);
        $end_date= $this->post('end_date',TRUE);
        $token=$this->post('token',TRUE);
        $array_date= explode('-', $start_date);
        $total_price= $this->post('total_price',TRUE);
        
        $lastBook= $this->ModelBooking->getDetailBooking("WHERE start_date>='".$start_date."' and end_date<='".$end_date."'",'Count(id_booking) as count')->count;
        $count = $lastBook;
        $count = $count + 1;

        $no_urut = str_pad($count, 5, "0", STR_PAD_LEFT);
        
        $no_book="CDOD/".$array_date['0'].'/'.$array_date['1'].'/'.$no_urut;
        $dataUser= $this->ModelUser->getDetail($id_user);
        $id_card=$dataUser->id_card;
        $name=$dataUser->name;
        $phone=$dataUser->phone;
        $addres=$dataUser->addres;
        $duration=$array_length.'  Day';
        
        $this->ModelBooking->insertBooking($id_user, $no_book, $id_card, $name, $phone, $addres, $duration, $start_date, $end_date, $total_price, $token);
        $databooking= $this->ModelBooking->getDetailBooking("WHERE token='".$token."'","*");
        $id_booking=$databooking->id_booking;
        for($i=0;$i<$array_length;$i++){
           $id_voucer= $this->post('id_voucer_'.$i,TRUE);
           $price= $this->ModelVoucher->getDetailVoucer_travel("WHERE id_voucer='".$id_voucer."'","price")->price; 
           $this->ModelBooking->insertDetailBooking($id_booking,$id_voucer,$price,$token);
       }
       $data['no_booking']=$databooking->no_book;
       $data['name']=$databooking->name;
       $data['no_ktp']=$databooking->id_card;
       $data['addres']=$databooking->addres;
       $data['phone']=$databooking->phone;
       $data['total_price']=$databooking->total_price;
      
        $this->response($data, 200);
         
        
        
    }
}
