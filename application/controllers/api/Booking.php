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
//        $id_hotel= $this->post('id-hotel',TRUE);
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
        
//        $this->ModelBooking->insertBooking($id_user, $no_book, $id_card, $name, $phone, $addres, $duration, $start_date, $end_date, $total_price, $token);
        $databooking= $this->ModelBooking->getDetailBooking("WHERE token='".$token."'","*");
        $id_booking=$databooking->id_booking;
        for($i=0;$i<$array_length;$i++){
           $id_voucer= $this->post('id_voucer_'.$i,TRUE);
           $dataHotel=$this->ModelVoucher->getDetailVoucer_travel("WHERE id_voucer='".$id_voucer."'","id_hotel,price,id_room_type");
           $price= $dataHotel->price; 
           $id_hotel=$dataHotel->id_hotel;
           $id_room_type=$dataHotel->id_room_type;
//           $this->ModelBooking->insertDetailBooking($id_booking,$id_voucer,$price,$token);
       }
       $data['data_customer']['no_ktp']=$databooking->id_card;
       $data['data_customer']['name']=$databooking->name;
       $data['data_customer']['addres']=$databooking->addres;
       $data['data_customer']['phone']=$databooking->phone;
       
       $this->load->model('ModelHotel');
       $this->load->model('ModelRoom_type');
       $this->load->model('modelBank');
       $name_type= $this->ModelRoom_type->getDetailroom_type("WHERE id_room_type='".$id_room_type."'","name_type")->name_type;
       $dataHotel=$this->ModelHotel->getDetailHotel("WHERE id_hotel='".$id_hotel."'",'hotel_name,address,phone');
       $data['data_booking']['no_booking']=$databooking->no_book;
       $data['data_booking']['hotel_name']= $dataHotel->hotel_name;
       $data['data_booking']['address']= $dataHotel->address;
       $data['data_booking']['phone']= $dataHotel->phone;
       $data['data_booking']['Room_type']=$name_type;
       $data['data_booking']['start_date']=$start_date;
       $data['data_booking']['end_date']=$end_date;
       $data['data_booking']['duration']=$duration;
       $data['data_booking']['total_price']=$databooking->total_price;
       $data['info_payment']= $this->modelBank->getListBank('',"bank_name,no_acc")->result();
       $this->response($data, 200);
         
        
        
    }
}
