<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class antauth{
	var $CI = NULL;
	function __construct()
	{
		// get CI's object
		$this->CI =& get_instance();
	}

	// untuk validasi login
	function do_login($username,$password)
	{
		// cek di database, ada ga?
		$this->CI->db->from('user');
		$this->CI->db->where('username',$username);
		$this->CI->db->where('password=MD5("'.$password.'")','',false);
                $this->CI->db->join('usergroup','usergroup.id_usergroup=user.id_usergroup');
		$result = $this->CI->db->get();
		if($result->num_rows() == 0){
			return false;
                }else{
			$userdata = $result->row();
                       
			$session_data = array(
				'id_user'          => $userdata->id_user,
                                'username'         => $userdata->username,
                                'id_usergroup'     => $userdata->id_usergroup,
                                'parent'           => $userdata->parent
                               
                );
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}

	function is_logged_in()
	{
		if($this->CI->session->userdata('id_user') == '')
		{
			return false;
		}
		return true;
	}
	
	function check($usergroup,$cls,$mtd){
        if($mtd == 'index' || $mtd = 'list' || $mtd = 'detail'){
        $this->CI->db->from('privilage');
	$this->CI->db->join('modul','modul.id_modul=privilage.id_modul');
	$this->CI->db->join('detailaction','detailaction.id_detailaction=privilage.id_detailaction');
	$this->CI->db->join('action','action.id_action=detailaction.id_action');
	$this->CI->db->where('privilage.id_usergroup',$usergroup);
	$this->CI->db->where('modul.class',$cls);
	$this->CI->db->where('privilage.status',1);
	$result = $this->CI->db->get();	
		if($result->num_rows() == 0) 
		{
                    return false;
                }else{
                    return true;
                }       
        }else{
        $this->CI->db->from('privilage');
	$this->CI->db->join('modul','modul.id_modul=privilage.id_modul');
	$this->CI->db->join('detailaction','detailaction.id_detailaction=privilage.id_detailaction');
	$this->CI->db->join('action','action.id_action=detailaction.id_action');
	$this->CI->db->where('privilage.id_usergroup',$usergroup);
	$this->CI->db->where('modul.class',$cls);
	$this->CI->db->where('action.function',$mtd);
	$this->CI->db->where('privilage.status',1);
	$result = $this->CI->db->get();	
		if($result->num_rows() == 0) 
		{
			return false;
                }else{
                        return true;
                }      
        }    
	return false;	
	}

	function do_logout()
	{
		$this->CI->session->sess_destroy();	
	}
}