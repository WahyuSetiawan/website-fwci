<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usergroupmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function allusergroup($parent) {
    $this->db->select('*');
    $this->db->from('usergroup');
    $this->db->where('parent  >=',$parent);
    return  $this->db->get();
    }
    
    function usergrouplimitasc() {
    $this->db->select('*');
    $this->db->from('usergroup');
    $this->db->order_by('id_usergroup', 'asc'); 
    $this->db->limit(1);
    return  $this->db->get();
    }
    
    function usergrouplimitdesc() {
    $this->db->select('*');
    $this->db->from('usergroup');
    $this->db->order_by('id_usergroup', 'desc'); 
    $this->db->limit(1);
    return  $this->db->get();
    }
    
    function add($data)
    {
    $this->db->insert('usergroup',$data);
    }
    
    function usergroupbyid($id) {
    $this->db->select('*');
    $this->db->from('usergroup');
    $this->db->where('id_usergroup',$id);
    return  $this->db->get();
    }
    
    function usergroupbyparentlike($parent) {
    $this->db->select('*');
    $this->db->from('usergroup');
    $this->db->like('parent',$parent);
    return  $this->db->get();
    }
    
    function usergroupbyidarr($chk) {
    $this->db->select('*');
    $this->db->from('usergroup');
    $this->db->where_in('id_usergroup',$chk);
    return  $this->db->get();
    }
    
    function usergroupbyparent($parent) {
    $this->db->select('parent');
    $this->db->from('usergroup');
    $this->db->where('parent  !=',$parent);
    $this->db->like('parent', $parent);
    return  $this->db->get();
    }
    
    function update($id,$data)
    {
    $this->db->where('id_usergroup',$id);
    $this->db->update('usergroup',$data);
    }
    
    function delete($chk)
    {
    $this->db->where_in('id_usergroup',$chk);
    $this->db->delete('usergroup');
    }
    
    //Privilage
    function privilagebyid($id) {
    $this->db->select('*');
    $this->db->from('privilage');
    $this->db->where('id_usergroup',$id);
    return  $this->db->get();
    }
    
    function addprivilage($data)
    {
    $this->db->insert('privilage',$data);
    }
}    