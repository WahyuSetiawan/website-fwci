<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usergroup  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usergroupmodel');
        $usergroup = $this->session->userdata('id_usergroup');
        $cls = $this->router->fetch_class();
        $mtd = $this->router->fetch_method();
        $check = $this->antauth->check($usergroup,$cls,$mtd);
        if($check==false){
            redirect('login');  
        }
    }

    public function index()
    { 
    $data['isi'] = 'usergroup/list';
    $this->load->view('tpldefault',$data); 
    }

    public function get_data()
    {
        /* Field of Table */
        $aColumns = array('id_usergroup','usergroup','parent');
        
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id_usergroup";
        
        /* DB table to use */
        $sTable = "usergroup";
       
        $sJoin = "";
//        $sWheres = " WHERE parent >'".$this->session->userdata('parent')."'";
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
                    $sWhere .= ") AND parent >'".$this->session->userdata('parent')."'";
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
            $sWheres    
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
    $this->form_validation->set_rules('userGroup', 'User Group', 'trim|required');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
    $parent = $this->session->userdata('parent');    
    $data['userGroup'] = $this->usergroupmodel->allusergroup($parent);    
    $data['isi'] = 'usergroup/add';
    $this->load->view('tpldefault',$data); 
    }else{
    $data = array(
    'usergroup' =>$this->input->post('userGroup'), 
    'parent' => $this->input->post('parent') + 1     
    );
    $this->usergroupmodel->add($data);
    $userGroupLimitAsc = $this->usergroupmodel->usergrouplimitasc()->row();
    $userGroupLimitDecs = $this->usergroupmodel->usergrouplimitdesc()->row();
    if(!empty($userGroupLimitAsc)){
    $privilage = $this->usergroupmodel->privilagebyid($userGroupLimitAsc->id_usergroup)->result();
    foreach ($privilage as $valPrivilage) {
        $data = array(
        'id_modul' =>$valPrivilage->id_modul, 
        'id_detailaction' =>$valPrivilage->id_detailaction,
        'id_usergroup' =>$userGroupLimitDecs->id_usergroup,
        'status' =>0    
        );
        $this->usergroupmodel->addprivilage($data);
    }}
    redirect('usergroup');
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
    $this->form_validation->set_rules('userGroup', 'User Group', 'trim|required');
    }
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
    $data['usergroup'] = $this->usergroupmodel->usergroupbyid($id);
    $parent = $this->session->userdata('parent');    
    $data['userGroup'] = $this->usergroupmodel->allusergroup($parent);    
    $data['isi'] = 'usergroup/update';
    $this->load->view('tpldefault',$data); 
    }else{
    $userGroupbyId = $this->usergroupmodel->usergroupbyid($id)->row();
    $parent = $this->input->post('parent');
    if($userGroupbyId->parent == $parent){
    $data = array(
    'usergroup' =>$this->input->post('userGroup')    
    );
    $this->usergroupmodel->update($id,$data);
    redirect('usergroup');    
    }else{
     $data = array(
    'usergroup' =>$this->input->post('userGroup'), 
    'parent' =>$parent + 1     
    );
    $this->usergroupmodel->update($id,$data);
    redirect('usergroup');    
    }}
    }
    
    public function delete(){
    $chk = $this->input->post('chk');
    if($chk!=""){
    $this->usergroupmodel->delete($chk);    
    }
    redirect('usergroup');
    }
   
}