<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelSubdistricr
 *
 * @author durioindigo
 */
class ModelSubdistricr extends CI_Model{
    //put your code here
    function getDetailSubdistricr($statement,$customefield){
        $xstr="SELECT $customefield FROM sub_district $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_sub_district($limit, $start) {
 
       $this->db->limit($limit, $start);
       $this->db->select('id_sub_district,sub_district.id_district,sub_district_name,district_name,province_name');
       $this->db->join('district','district.id_district=sub_district.id_district');
       $this->db->join('province','province.id_province=district.id_province');
       $query = $this->db->order_by('province_name,district_name,sub_district_name','ASC')->get("sub_district");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("sub_district");
 
   }
 

    function getListSubdistricr($statement,$customefield){
        $xstr="SELECT $customefield FROM sub_district $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertSubdistricr($sub_district_name,$id_district){
        $xstr="INSERT INTO sub_district (sub_district_name,id_district) VALUES('".$sub_district_name."','".$id_district."')";
        $this->db->query($xstr);
    }
    function updateSubdistricr($id_sub_district,$sub_district_name,$id_district){
        $xstr="UPDATE sub_district SET sub_district_name='".$sub_district_name."',id_district='".$id_district."' WHERE id_sub_district='".$id_sub_district."'";
        $this->db->query($xstr);
    }
    function deleteSubdistricr($id_sub_district){
        $xstr="DELETE FROM sub_district  WHERE id_sub_district='".$id_sub_district."'";
        $this->db->query($xstr);
    }
}
