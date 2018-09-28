<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelBank
 *
 * @author durioindigo
 */
class ModelBank extends CI_Model{
    //put your code here
    function getDetailbank_account($statement,$customefield){
        $xstr="SELECT $customefield FROM bank_account $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_bank_account($limit, $start) {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->order_by('name_type','ASC')->get("bank_account");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("bank_account");
 
   }
 

    function getListBank($statement,$customefield){
        $xstr="SELECT $customefield FROM bank_account $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertBank($bank_name,$no_acc){
        $xstr="INSERT INTO bank_account (bank_name,no_acc) VALUES('".$name_type."','".$no_acc."')";
        $this->db->query($xstr);
    }
    function updateBank($id_bank_account,$bank_name,$no_acc){
        $xstr="UPDATE bank_account SET bank_name='".$bank_name."',no_acc='".$no_acc."' WHERE id_bank_account='".$id_bank_account."'";
        $this->db->query($xstr);
    }
    function deleteBank($id_bank_account){
        $xstr="DELETE FROM bank_account  WHERE id_bank_account='".$id_bank_account."'";
        $this->db->query($xstr);
    }
}
