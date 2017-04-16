<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modulmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function allmodul($modul)
    {
    $this->db->select('*');
    $this->db->from('modul');
    $this->db->where('class',$modul);
    return  $this->db->get();
    }
    
    function add($data)
    {
    $this->db->insert('modul',$data);
    }
    
    function modulbyid($id) {
    $this->db->select('*');
    $this->db->from('modul');
    $this->db->where('id_modul',$id);
    return  $this->db->get();
    }
    
    function modulbyids($chk) {
    $this->db->select('class');
    $this->db->from('modul');
    $this->db->where_in('id_modul',$chk);
    return  $this->db->get();
    }
    
    function update($id,$data)
    {
    $this->db->where('id_modul',$id);
    $this->db->update('modul',$data);
    }
    
    function delete($chk)
    {
    $this->db->where_in('id_modul',$chk);
    $this->db->delete('modul');
    }
    
    //typemodul
    function alltypemodul() {
    $this->db->select('*');
    $this->db->from('typemodul');
    return  $this->db->get();
    }
    
    function addtypemodul($data)
    {
    $this->db->insert('typemodul',$data);
    }
    
    //action
    function allaction()
    {
    $this->db->select('*');
    $this->db->from('action');
    return  $this->db->get();
    }
    
    function addaction($data)
    {
    $this->db->insert('action',$data);
    }
    
    //detail action
    function alldetailaction($id_typemodul)
    {
    $this->db->select('*');
    $this->db->from('detailaction');
    $this->db->where('id_typemodul',$id_typemodul);
    return  $this->db->get();
    }
    
    function alldetailactions($id_action,$id_typemodul)
    {
    $this->db->select('*');
    $this->db->from('detailaction');
    $this->db->where_in('id_action',$id_action);
    $this->db->where('id_typemodul',$id_typemodul);
    return  $this->db->get();
    }
    
    function adddetailaction($data)
    {
    $this->db->insert('detailaction',$data);
    }
    
    //usergroup
    function allusergroup()
    {
    $this->db->select('*');
    $this->db->from('usergroup');
    return  $this->db->get();
    }
    
    //privilage
    function addprivilage($data)
    {
    $this->db->insert('privilage',$data);
    }
    
    function allprivilage($id_modul,$id_detailaction,$id_usergroup)
    {
    $this->db->select('*');
    $this->db->from('privilage');
    $this->db->where('id_modul',$id_modul);
    $this->db->where_in('id_detailaction',$id_detailaction);
    $this->db->where_in('id_usergroup',$id_usergroup);
    return  $this->db->get();
    }
}    