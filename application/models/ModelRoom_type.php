<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelRoom_type
 *
 * @author durioindigo
 */
class ModelRoom_type extends CI_Model{
    //put your code here
    function getDetailroom_type($statement,$customefield){
        $xstr="SELECT $customefield FROM room_type $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_room_type($limit, $start) {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->order_by('name_type','ASC')->get("room_type");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("room_type");
 
   }
 

    function getListRoom_type($statement,$customefield){
        $xstr="SELECT $customefield FROM room_type $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertRoom_type($name_type){
        $xstr="INSERT INTO room_type (name_type) VALUES('".$name_type."')";
        $this->db->query($xstr);
    }
    function updateRoom_type($id_room_type,$name_type){
        $xstr="UPDATE room_type SET name_type='".$name_type."' WHERE id_room_type='".$id_room_type."'";
        $this->db->query($xstr);
    }
    function deleteRoom_type($id_room_type){
        $xstr="DELETE FROM room_type  WHERE id_room_type='".$id_room_type."'";
        $this->db->query($xstr);
    }
}
