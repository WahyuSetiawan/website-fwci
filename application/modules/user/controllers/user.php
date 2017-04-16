<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
        $usergroup = $this->session->userdata('id_usergroup');
        $cls = $this->router->fetch_class();
        $mtd = $this->router->fetch_method();
        $this->antauth->check($usergroup,$cls,$mtd);
    }

    public function index()
    { 
    $parent = $this->session->userdata('parent');  
    $useGroup = $this->usermodel->allusergroup($parent)->result();
    foreach ($useGroup as $value) {
        $arrUserGroup[] = '"'.$value->usergroup.'"';
    }
    $data['userGroup'] = $arrUserGroup;
    $data['isi'] = 'user/list';
    $this->load->view('tpldefault',$data); 
    }

     public function get_data()
    {
        /* Field of Table */
        $aColumns = array('id_user','nama_user','username','email','usergroup');
        
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id_user";
        
        /* DB table to use */
        $sTable = "user u";
       
        $sJoin = "LEFT JOIN usergroup g ON u.id_usergroup = g.id_usergroup";
        /* 
         * Paging
         */
        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
        {
            $sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
                mysql_real_escape_string( $_GET['iDisplayLength'] );
        }
        
        /*
         * Ordering
         */
        $sOrder = "";
        if ( isset( $_GET['iSortCol_0'] ) )
        {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
            {
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
                {
                    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] )-1 ]."
                        ".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
                }
            }
            
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" )
            {
                $sOrder = "";
            }
        }
        
        /*
        * Filtering
        */
        $sWhere = " parent >'".$this->session->userdata('parent')."'";
        if ( $_GET['sSearch'] != "" )
        {
            $sWhere = "(";
            $aWords = preg_split('/\s+/', $_GET['sSearch']);
            for ( $j=0 ; $j<count($aWords) ; $j++ )
            {
                if ( $aWords[$j] != "" )
                {
                    $sWhere .= "(";
                    for ( $i=0 ; $i<count($aColumns) ; $i++ )
                    {
                        $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $aWords[$j] )."%' OR ";
                    }
                    $sWhere = substr_replace( $sWhere, "", -3 );
                    $sWhere .= ") AND  parent >'".$this->session->userdata('parent')."'";
                }
            }
             
            $sWhere = substr_replace( $sWhere, "", -5 );
            $sWhere .= ")";
        }
     
        /* Individual column filtering */
        $sColumnWhere = "";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {  
            if ( $_GET['sSearch_'.$i] != "" )
            {
                $aWords = preg_split('/\s+/', $_GET['sSearch_'.$i]);
                $sColumnWhere .= "(";
                for ( $j=0 ; $j<count($aWords) ; $j++ )
                {
                    if ( $aWords[$j] != "" )
                    {
                        $sColumnWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $aWords[$j] )."%' OR ";
                    }
                }
                $sColumnWhere = substr_replace( $sColumnWhere, "", -3 );
                $sColumnWhere .= ") AND ";
            }
        }
     
        if ( $sColumnWhere != "" ) {
            $sColumnWhere = substr_replace( $sColumnWhere, "", -5 );
            if ( $sWhere == "" ) {
                $sWhere = $sColumnWhere;
            } else {
                $sWhere .= " AND ".$sColumnWhere;
            }
        }
         
        if ( $sWhere != "" )
        {
            $sWhere = "WHERE ".$sWhere;
        }
        
        
        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "
            SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
            FROM   $sTable
            $sJoin   
            $sWhere
            $sOrder
            $sLimit
        ";
        $rResult = $this->db->query($sQuery);
        
        /* Data set length after filtering */
        $sQuery = "
            SELECT FOUND_ROWS() AS total_display
        ";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->result_array();
        $iFilteredTotal = $aResultFilterTotal[0]['total_display'];
        
        /* Total data set length */
        $sQuery = "
            SELECT COUNT(".$sIndexColumn.") AS total_data
            FROM   $sTable
        ";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->result_array();
        $iTotal = $aResultTotal[0]['total_data'];
        
        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        foreach( $rResult->result_array() as $key => $aRow )
        {
            $row = array();
    
            /* Add the  details image at the start of the display array */
            //$row[] = ++$_GET['iDisplayStart'];
    
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                if ( $aColumns[$i] != ' ' )
                {
                        /* General output */
                        $row[] = $aRow[ $aColumns[$i] ];
                }
            }
            $output['aaData'][] = $row;
        }
      echo json_encode($output);  
    }
    
    public function add()
    { 
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]|is_unique[user.username]|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[user.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[100]|matches[confPassword]|md5');
    $this->form_validation->set_rules('confPassword', 'Password Confirmation', 'trim|required|min_length[6]|max_length[100]');
    $this->form_validation->set_rules('userGroup', 'User Group', 'trim|required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
    $parent = $this->session->userdata('parent');       
    $data['userGroup'] = $this->usermodel->allusergroup($parent);
    $data['isi'] = 'user/add';
    $this->load->view('tpldefault',$data); 
    }else{
    $data = array(
    'nama_user' =>$this->input->post('nama'),
    'username' =>$this->input->post('username'),
    'email' =>$this->input->post('email'),
    'password' =>  md5($this->input->post('password')),
    'id_usergroup' =>$this->input->post('userGroup')    
    );
    $this->usermodel->add($data);
    redirect('user');
    } 
    }
    
    
    public function update()
    {
    $chk = $this->input->post('chk');  
    if(!empty($chk)){
    $id = implode($chk);    
    $this->session->set_userdata('sess_id', $id);    
    }else {
    $id = $this->session->userdata('sess_id');        
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    
    $username = $this->input->post('username');    
    $usernameById = $this->usermodel->usernamebyid($id)->row();
    if($usernameById->username!=$username){
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]|is_unique[user.username]|xss_clean');
    }else{
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[15]|xss_clean');
    }
    
    $email = $this->input->post('email');    
    $emailById = $this->usermodel->emailbyid($id)->row();
    if($emailById->email!=$email){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[user.email]');    
    }else{
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');    
    }
        
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[100]|matches[confPassword]|md5');
    $this->form_validation->set_rules('confPassword', 'Password Confirmation', 'trim|required|min_length[6]|max_length[100]');
    $this->form_validation->set_rules('userGroup', 'User Group', 'trim|required');
    }
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
    $parent = $this->session->userdata('parent');       
    $data['userGroup'] = $this->usermodel->allusergroup($parent);
    $data['user'] = $this->usermodel->userbyid($id);
    $data['isi'] = 'user/update';
    $this->load->view('tpldefault',$data); 
    }else{
    $data = array(
    'nama_user' =>$this->input->post('nama'),
    'username' =>$this->input->post('username'),
    'email' =>$this->input->post('email'),
    'password' =>  md5($this->input->post('password')),
    'id_usergroup' =>$this->input->post('userGroup')    
    );
    $this->usermodel->update($id,$data);
    redirect('user');
    }
    }
    
    public function delete(){
    $chk = $this->input->post('chk');
    if($chk!=""){
    $this->usermodel->delete($chk);    
    }
    redirect('user');
    }
    
    public function isUsernameAvailable()
    {
    $username = $this->input->post('username');    
    $id = $this->session->userdata('sess_id');
    $usernameById = $this->usermodel->usernamebyid($id)->row();
    if($usernameById->username!=$username){
    $qusername = $this->usermodel->isUsernameAvailable($username);    
    if ($qusername->num_rows() == 0)
    {
        echo 'true';
    }
    else
    {
        echo 'false';
    }
    }else{
        echo 'true';
    }
    }
    
    public function isEmailAvailable()
    {
    $email = $this->input->post('email');    
    $id = $this->session->userdata('sess_id');
    $emailById = $this->usermodel->emailbyid($id)->row();
    if($emailById->email!=$email){
    $qemail = $this->usermodel->isEmailAvailable($email);    
    if ($qemail->num_rows() == 0)
    {
        echo 'true';
    }
    else
    {
        echo 'false';
    }
    }else{
        echo 'true';
    } 
    }
}