<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelBooking
 *
 * @author durioindigo
 */
class ModelBooking extends CI_Model {

    //put your code here
    function getDetailBooking($statement,$customefield){
        $xstr="SELECT $customefield FROM booking $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
    
    function insertBooking($id_user, $no_book, $id_card, $name, $phone, $addres, $duration, $start_date, $end_date, $total_price, $token) {
        $xstr = "INSERT INTO booking (id_user,no_book,id_card,name,phone,addres,duration,start_date,end_date,total_price,token) VALUES('".$id_user."','".$no_book."','".$id_card."','".$name."','".$phone."','".$addres."','".$duration."','".$start_date."','".$end_date."','".$total_price."','".$token."')";
        $this->db->query($xstr);
    }
    
    function insertDetailBooking($id_booking,$id_voucer,$price,$token){
        $xstr="INSERT INTO detail_book (id_booking,id_voucer,price,token) VALUES ('".$id_booking."','".$id_voucer."','".$price."','".$token."')";
        $this->db->query($xstr);
    }
    
    function UpdateDetailBooking($id_booking,$token){
        $xstr="UPDATE detail_book SET id_booking='".$id_booking."' WHERE token='".$token."'";
        $this->db->query($xstr);  
    }
    

}
