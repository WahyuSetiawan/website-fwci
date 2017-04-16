<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usermodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
   
    function add($data)
    {
    $this->db->insert('user',$data);
    }
    
    function userbyid($id) {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user',$id);
    return  $this->db->get();
    }
    
    function update($id,$data)
    {
    $this->db->where('id_user',$id);
    $this->db->update('user',$data);
    }
    
    function delete($chk)
    {
    $this->db->where_in('id_user',$chk);
    $this->db->delete('user');
    }
    
    //usergroup
    function allusergroup($parent) {
    $this->db->select('id_usergroup,usergroup');
    $this->db->from('usergroup');
    $this->db->where('parent  >',$parent);
    return  $this->db->get();
    }
    
    //check username
    function isUsernameAvailable($username)
    {
    $this->db->select('username');
    $this->db->where('username', strtolower($username));
    $this->db->from('user');
    return  $this->db->get();
    }
    
    //username by id
    function usernamebyid($id)
    {
    $this->db->select('username');
    $this->db->where('id_user',$id);
    $this->db->from('user');
    return  $this->db->get();
    }
    //check email
    function isEmailAvailable($email)
    {
    $this->db->select('email');
    $this->db->where('email', strtolower($email));
    $this->db->from('user');
    return  $this->db->get();
    }
    
    //email by id
    function emailbyid($id)
    {
    $this->db->select('email');
    $this->db->where('id_user',$id);
    $this->db->from('user');
    return  $this->db->get();
    }
}    