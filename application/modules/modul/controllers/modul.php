<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modul  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modulmodel');
    }

    public function index()
    { 
        
    $typeModul = $this->modulmodel->alltypemodul()->result();
    foreach ($typeModul as $value) {
        $arrTypeModul[] = '"'.$value->typemodul.'"';
    }
    $data['typeModul'] = $arrTypeModul;
    $data['isi'] = 'modul/list';
    $this->load->view('tpldefault',$data); 
    }

    public function get_data()
    {
        /* Field of Table */
        $aColumns = array('id_modul','modul','typemodul');
        
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id_modul";
        
        /* DB table to use */
        $sTable = "modul m";
       
        $sJoin = "LEFT JOIN typemodul t ON m.id_typemodul = t.id_typemodul";
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
        $sWhere = "";
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
                    $sWhere .= ") AND ";
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
   
    public function add(){
    $filepost =$_FILES['userfile']['name'];
    if($filepost==""){
    $data['isi'] = 'modul/add';
    $this->load->view('tpldefault',$data);     
    }else{
        
    }
    $nm=str_replace(" ","_","$filepost");

    $id = $this->uri->segment(3);
    $config["file_name"]=$nm;
    $config['upload_path'] = './application/modules/';
    $config['allowed_types'] = 'zip';
    $config['max_size'] = '1000000';
    $config['max_width'] = '12000';
    $config['max_height'] = '12000';
    $this->load->library('upload', $config);
    if ( !$this->upload->do_upload())
    {
    $data['error_upload']  = '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'.$this->upload->display_errors().'</div>';
    $data['isi'] = 'modul/add';
    $this->load->view('tpldefault',$data); 
    
    }
    else
    {
      $pisahnm = explode('.', $nm);
      if ($pisahnm[1]=='zip'){

       $this->load->library('unzip');

       $this->unzip->allow(array('sql', 'psd', 'pdf', 'xls', 'ppt', 'php', 'php4', 'php3', 'js', 'swf', 'Xhtml', 'zip', 'rar', 'wav', 'bmp', 'gif', 'jpg', 'jpeg', 'png', 'html', 'htm', 'txt', 'rtf', 'mpeg', 'mpg', 'avi', 'doc', 'docx', 'xlsx', 'css', 'js'));

       $this->unzip->extract('./application/modules/'.$nm, './application/modules/');

       $this->unzip->close();
       if($nm!=""){
       unlink('./application/modules/'.$nm);
       }}
    }
    
    $filename = './application/modules/'.$pisahnm[0].'/install.txt';

    if (file_exists($filename)) {
        $string = read_file($filename);
        //echo $string;
        $pisahstring = explode("|", $string);
        //print_r($pisahstring);
        $action = explode(",", $pisahstring[0]);
        $typemodul = $pisahstring[1];
        $modul = $pisahstring[2];
        
        // check action
        $actionList = $this->modulmodel->allaction()->result();
        foreach ($actionList as $valAction){
            $arrActionList[] = $valAction->function;
        }
        
        foreach ($action as $value) {
           if(!empty($arrActionList)){
               if (in_array($value, $arrActionList)) 
                {
                // same     
                }else{
                  $data = array(
                    'action' =>ucfirst($value),
                    'function' =>strtolower($value)      
                  );
                  $this->modulmodel->addaction($data);
                }
           }else{
                $data = array(
                    'action' =>ucfirst($value),
                    'function' =>strtolower($value)      
                );
                $this->modulmodel->addaction($data);
           } 
           
        }
        
        //check typemodul
        $typeModulList = $this->modulmodel->alltypemodul()->result();
        foreach ($typeModulList as $valTypeModul){
            $arrTypeModul[] = strtolower($valTypeModul->typemodul);
        }
        if(!empty($arrTypeModul)){
               if (in_array(strtolower($typemodul), $arrTypeModul)) 
                {
                // same     
                }else{
                  $data = array(
                    'typemodul' =>ucfirst($typemodul)      
                  );
                  $this->modulmodel->addtypemodul($data);
                }
        }else{
                $data = array(
                    'typemodul' =>ucfirst($typemodul)           
                );
                $this->modulmodel->addtypemodul($data);
           } 
        
        //check detail action
        $actionId = $this->modulmodel->allaction()->result();
        foreach ($actionId as $valActionId){
            if (in_array($valActionId->function, $action)) 
                {
                 $arrActionId[] = $valActionId->id_action;   
                }
        } 
        
        $typeModulId = $this->modulmodel->alltypemodul()->result();
        foreach ($typeModulId as $valTypeModulId){
            if(ucfirst($pisahstring[1])== $valTypeModulId->typemodul){
              $typeModulId = $valTypeModulId->id_typemodul;   
            }
           
        }
        $id_action =  $arrActionId;
        $id_typemodul = $typeModulId;
//        print_r( $id_action);
//        echo $id_typemodul;
        $detailaction = $this->modulmodel->alldetailaction($id_typemodul)->result();
        foreach ($detailaction as $valDetailAction) {
             $arrDetailAction[] = $valDetailAction->id_action;
        }
        
        if(empty($arrDetailAction)){
         foreach ($id_action as $valArrActionId) {
                   $data = array(
                    'id_typemodul' =>$id_typemodul,
                    'id_action' =>$valArrActionId     
                  );
                  $this->modulmodel->adddetailaction($data);
        }        
        }else{
        foreach ($id_action as $valArrActionId) {
           if (in_array($valArrActionId, $arrDetailAction)) 
                {
                   //same
                }else{
                   $data = array(
                    'id_typemodul' =>$id_typemodul,
                    'id_action' =>$valArrActionId     
                  );
                  $this->modulmodel->adddetailaction($data);
                } 
                
        }    
        }    
       
//        print_r($detailaction);
        // Check Modul
        $modulList = $this->modulmodel->allmodul(strtolower($modul));
        if ($modulList->num_rows() == 0)
        {
            $data = array(
                'modul' =>ucfirst($modul),
                'class' =>strtolower($modul),
                'id_typemodul' =>$id_typemodul
             );
             $this->modulmodel->add($data);
        }
        
//        print_r($modulList);
       // Privilage
        $modulId = $this->modulmodel->allmodul(strtolower($modul))->row();
        $userGroupId = $this->modulmodel->allusergroup()->result();
        foreach ($userGroupId as $valUserGroupId) {
           $id_usergroup[] =   $valUserGroupId->id_usergroup;
        }
         $detailactions = $this->modulmodel->alldetailactions($id_action,$id_typemodul)->result();
        foreach ($detailactions as $valDetailActions) {
                $id_detailaction[] =$valDetailActions->id_detailaction;
        }
        
        $privilage = $this->modulmodel->allprivilage($modulId->id_modul,$id_detailaction,$id_usergroup);
          if ($privilage->num_rows() == 0)
        {
          
        $userGroup = $this->modulmodel->allusergroup()->result();
        foreach ($userGroup as $valUserGroup) {
        $detailactions = $this->modulmodel->alldetailactions($id_action,$id_typemodul)->result();
        foreach ($detailactions as $valDetailActions) {
            
              $data = array(
                'id_modul' =>$modulId->id_modul,
                'id_detailaction' =>$valDetailActions->id_detailaction,
                'id_usergroup' =>$valUserGroup->id_usergroup,
                'status' =>0  
             );
             $this->modulmodel->addprivilage($data);
        }
        }    
              
        }else{
        //    echo 'no';
        }
        unlink($filename);
        redirect('modul') ;   
    } else {
       if($pisahnm[0]!=""){
           $this->deleteDir('./application/modules/'.$pisahnm[0]);
       }
    $data['error_upload']  = '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> Install the file Not Available </div>';
    $data['isi'] = 'modul/add';
    $this->load->view('tpldefault',$data);  
    }
   
    }
       
    public function delete(){
    $chk = $this->input->post('chk');
    if($chk!=""){
    $moduls = $this->modulmodel->modulbyids($chk)->result();
    if(!empty($moduls)){
    foreach ($moduls as $valModuls) {
        $this->deleteDir('./application/modules/'.$valModuls->class);
    }
    $this->modulmodel->delete($chk);    
    }
    }
    redirect('modul');
    }
    
    public function deleteDir($dirPath) { //function untuk menghapus folder project
    if (! is_dir($dirPath)) {
    throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
    $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
    if (is_dir($file)) {
        self::deleteDir($file);
    } else {
        unlink($file);
    }
    }
    rmdir($dirPath);
    }

}