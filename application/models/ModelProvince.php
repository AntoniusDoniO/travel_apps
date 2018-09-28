<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelProvince
 *
 * @author durioindigo
 */
class ModelProvince extends CI_Model{
    //put your code here
    function getDetailProvice($statement,$customefield){
        $xstr="SELECT $customefield FROM province $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_province($limit, $start) {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->order_by('province_name','ASC')->get("province");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("province");
 
   }
 

    function getListProvince($statement,$customefield){
        $xstr="SELECT $customefield FROM province $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertProvince($province_name){
        $xstr="INSERT INTO province (province_name) VALUES('".$province_name."')";
        $this->db->query($xstr);
    }
    function updateProvince($id_province,$province_name){
        $xstr="UPDATE province SET province_name='".$province_name."' WHERE id_province='".$id_province."'";
        $this->db->query($xstr);
    }
    function deleteProvince($id_province){
        $xstr="DELETE FROM province  WHERE id_province='".$id_province."'";
        $this->db->query($xstr);
    }
}
