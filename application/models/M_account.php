<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class M_account extends CI_Model{

       function daftar($data)
       {
            $this->db->insert('users',$data);
       }

       function alluser(){
       	return $this->db->get('users');
       }

       function delete($cond){
        $this->db->delete('users', $cond);
       }

       function update($data,$id){
        $this->db->where('id_user',$id)->update('users', $data);
       }
  }