<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class privilagemodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function allprivilage($usergroup) {    
    $this->db->select('*');
    $this->db->from('privilage');
    $this->db->where('id_usergroup',$usergroup);
    return  $this->db->get();
    }
    
    function update($id,$data)
    {
    $this->db->where('id_privilage',$id);
    $this->db->update('privilage',$data);
    }
    
    // Modul
    function allmodul() {
    $this->db->select('*');
    $this->db->from('modul');
    return  $this->db->get();
    }

    // Tipe Modul
    function alltypemodul() {
    $this->db->select('*');
    $this->db->from('typemodul');
    $this->db->order_by('id_typemodul','asc'); 
    return  $this->db->get();
    }

    // Action
    function alldetailaction() {
    $this->db->select('*');
    $this->db->from('detailaction');
    $this->db->join('action','action.id_action=detailaction.id_action');
    return  $this->db->get();
    }
    

}    