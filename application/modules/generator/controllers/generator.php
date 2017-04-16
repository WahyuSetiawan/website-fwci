<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class generator  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
//        $usergroup = $this->session->userdata('id_usergroup');
//        $cls = $this->router->fetch_class();
//        $mtd = $this->router->fetch_method();
//        $check = $this->antauth->check($usergroup,$cls,$mtd);
//        if($check==false){
//            redirect('login');  
//        }
    }

    public function index()
    { 
    $fieldutama = array(
           "user" => array("id_user-PK","nama_user","id_usergroup-FK")
        );

    $fieldrelasi =  array(
           "usergroup" =>  array("id_usergroup-PK","usergroup")
        );
            
    $data['fieldutama'] = $fieldutama;
    $data['fieldrelasi'] = $fieldrelasi;
    
    $data['isi'] = 'generator/generate';
    $this->load->view('tpldefault',$data); 
    }
    
    public function tes()
    {
//        echo 'view <br/>';
//        print_r($this->input->post('view')); 
        $view = $this->input->post('view');
        // get key tabel 0 ;
        $tabels = array_keys($view);
        $tabelutama = current($tabels);
//        print_r($tabelutama);
//        echo $tabelutama;
        // for method get 
      
        foreach ($view as $keyview => $valview) {
            foreach ($valview as $keyvalview => $valviews) {
//                echo $valviews;
                $exvalviews = explode("-", $valviews);
//                echo $exvalviews[0];
//                echo $exvalviews[1];
            $arrsearchget[] = '$'.$exvalviews[0].' = $this->input->get(\''.$exvalviews[0].'\');';
            $arrkeysearchget[] = '$'.$exvalviews[0];
//            echo $keyview;
            $exkeyview = explode("-", $keyview);
            
            
            //tabel header name 
            $tabelheadername[] = '
             <th><div align="left">'.$exvalviews[0].' </div></th> 
            ';
            
            //tabel content
            $tabelcontent[] = '
            <td>
                <?php echo $baris->'.$exvalviews[0].';?>
            </td>
            ';
            
            if($tabelutama==$keyview){
            $arrsearchmodel[] = '
            if($'.$exvalviews[0].'!=""){
            $this->db->like(\''.$exvalviews[0].'\',$'.$exvalviews[0].');    
            }    
            ';  
            
            // form search list
            $listsearch[] = '
            <th>
                 <input type="text" class="form-control" name="'.$exvalviews[0].'" placeholder="Enter '.$exvalviews[0].'">
            </th> 
            ';
            
            }else{
            $arrsearchmodel[] ='
            if($'.$exvalviews[0].'!=""){
            $this->db->where(\''.$exkeyview[0].'.'.$exvalviews[0].'\',$'.$exvalviews[0].');
            }    
            ';    
            
            // show data tabel relasi 
            $showdatatabelrelasi[] = '
            $data[\''.$exkeyview[0].'\']   = $this->'.$tabelutama.'model->'.$exkeyview[0].'();
            ';
            
            //join
            $modeljoin[] = '
            $this->db->join(\''.$exkeyview[0].'\',\''.$exkeyview[0].'.'.$exkeyview[1].'='.$tabelutama.'.'.$exkeyview[1].'\');
            ';
            
            // tabel other
            $tabeljoins[] = '
            function '.$exkeyview[0].'() {
            $this->db->select(\'*\');
            $this->db->from(\''.$exkeyview[0].'\');
            return  $this->db->get();
            }    
            ';
            
             // form search list
            $listsearch[] = '
            <th>
                 <select name="'.$exvalviews[0].'" class="form-control">
                  <option value="">Pilih '.$exvalviews[0].'</option>
                  <?php foreach ($'.$exkeyview[0].'->result() as $val'.$exkeyview[0].') { ?>
                  <option value="<?php echo $val'.$exkeyview[0].'->'.$exvalviews[0].'; ?>"><?php echo $val'.$exkeyview[0].'->'.$exvalviews[0].'; ?></option>
                  <?php } ?>
                 </select>
            </th>     
            ';
            }
          
            }
        }
//        print_r($listsearch);
//        echo implode("\n", $listsearch);
        
//        print_r($tabeljoins);
//        echo implode("\n", $tabeljoins);
//        print_r($modeljoin);
//        echo implode("\n", $modeljoin);
//        print_r($showdatatabelrelasi);
//        echo implode("\n", $showdatatabelrelasi);
//        print_r($arrsearchmodel);
//        echo implode("\n", $arrsearchmodel);
//        if($nama!=""){
//            $this->db->like(\'nama_user\',$nama);    
//            }
//            if($usergroup!=""){
//            $this->db->where(\'usergroup.usergroup\',$usergroup);
//            }
//            
//         echo '<br/> add <br/>';
//        print_r($this->input->post('typeinputadd')); 
//        print_r($this->input->post('autoadd')); 
//        print_r($this->input->post('fieldviewrelasiadd')); 
//        print_r($this->input->post('validationadd')); 
        $typeinputadd = $this->input->post('typeinputadd');
        $autoadd = $this->input->post('autoadd');
        $fieldviewrelasiadd = $this->input->post('fieldviewrelasiadd'); 
        $validationadd = $this->input->post('validationadd');
        
        foreach ($typeinputadd  as $keytypeinputadd  => $valtypeinputadd ) {
            foreach ($autoadd as $keyautoadd => $valautoadd) {
                $idpk =  $keyautoadd;
                $exidpk = explode("-", $idpk);
                if($keytypeinputadd== $keyautoadd && $valautoadd==1){
//                    echo '1';
//                    echo $valtypeinputadd.'='.$keytypeinputadd."<br>";
                    $extypeinputadd = explode("-", $keytypeinputadd);
                    $arrpostadd[] = '\''.$extypeinputadd[0].'\' =>$this->input->post(\''.$extypeinputadd[0].'\')'; 
                    
                // Validation
                foreach ($validationadd as $keyvalidationadd => $valvalidationadd) {
                $exkeyvalidationadd = explode("-", $keyvalidationadd);   
                if($exkeyvalidationadd[0]==$extypeinputadd[0]){
                echo $exkeyvalidationadd[0].'=='.$extypeinputadd[0]."<br/>";
                    
                    //form add
                    if($valtypeinputadd=="text" || $valtypeinputadd=="email" || $valtypeinputadd="number" ){
                    $formadd[] = '
                    <div class="form-group">
                          <label for="'.$extypeinputadd[0].'">'.$extypeinputadd[0].'</label>
                           <input type="'.$valtypeinputadd.'" class="form-control" name="'.$extypeinputadd[0].'" value="<?php echo set_value(\''.$extypeinputadd[0].'\'); ?>" placeholder="Enter '.$extypeinputadd[0].'">
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputadd[0].'\'); ?> </span>
                    ';    
                    }
                $formvalidationadd[] = '
                $this->form_validation->set_rules(\''.$exkeyvalidationadd[0].'\', \''.$exkeyvalidationadd[0].'\', \''.implode("|", $valvalidationadd).'\');    
                ';
                }
                }    
                }elseif ($keytypeinputadd!= $keyautoadd) {
//                    echo '2';
//                    echo $keyautoadd;
//                    echo $valtypeinputadd.'='.$keytypeinputadd."<br>";
                    $extypeinputadd = explode("-", $keytypeinputadd);
                    $arrpostadd[] = '\''.$extypeinputadd[0].'\' =>$this->input->post(\''.$extypeinputadd[0].'\')'; 
                
                // Validation
                foreach ($validationadd as $keyvalidationadd => $valvalidationadd) {
                $exkeyvalidationadd = explode("-", $keyvalidationadd);
                if($exkeyvalidationadd[0]==$extypeinputadd[0]){
//                echo $exkeyvalidationadd[0].'=='.$extypeinputadd[0]."<br/>";
                    
                
                    //form add
                    $exvaltypeinputadd = explode("-", $valtypeinputadd);
                    if($valtypeinputadd=="text" || $valtypeinputadd=="email" || $valtypeinputadd=="number" || $valtypeinputadd=="url" || $valtypeinputadd=="password"  || $valtypeinputadd=="date" ){
                    $formadd[] = '
                    <div class="form-group">
                          <label for="'.$extypeinputadd[0].'">'.$extypeinputadd[0].'</label>
                          <input type="'.$valtypeinputadd.'" class="form-control" name="'.$extypeinputadd[0].'" value="<?php echo set_value(\''.$extypeinputadd[0].'\'); ?>" placeholder="Enter '.$extypeinputadd[0].'">
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputadd[0].'\'); ?> </span>
                    ';    
                    }elseif ($valtypeinputadd=="textarea") {
                    $formadd[] = '
                    <div class="form-group">
                          <label for="'.$extypeinputadd[0].'">'.$extypeinputadd[0].'</label>
                          <textarea class="form-control" name="'.$extypeinputadd[0].'" rows="3"><?php echo set_value(\''.$extypeinputadd[0].'\'); ?></textarea>    
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputadd[0].'\'); ?> </span>
                    ';    
                    
                    }elseif ($exvaltypeinputadd[0]=="select") {
                    foreach ($fieldviewrelasiadd as $keyfieldviewrelasiadd => $valfieldviewrelasiadd) { 
                    if($keyfieldviewrelasiadd==$keytypeinputadd){    
                    $formadd[] = '
                    <div class="form-group">
                          <label for="'.$extypeinputadd[0].'">'.$exvaltypeinputadd[1].'</label>
                          <select class="form-control" name="'.$extypeinputadd[0].'">
                              <option value="">Pilih '.$exvaltypeinputadd[1].'</option>
                              <?php foreach ($'.$exvaltypeinputadd[1].'->result() as $val'.$exvaltypeinputadd[1].') { ?>
                              <option value="<?php echo $val'.$exvaltypeinputadd[1].'->'.$extypeinputadd[0].'; ?>"><?php echo $val'.$exvaltypeinputadd[1].'->'.$valfieldviewrelasiadd.'; ?></option>
                              <?php } ?>
                          </select>
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputadd[0].'\'); ?> </span>    
                    ';
                    }
                    }
                    }
                $formvalidationadd[] = '
                $this->form_validation->set_rules(\''.$exkeyvalidationadd[0].'\', \''.$exkeyvalidationadd[0].'\', \''.implode("|", $valvalidationadd).'\');    
                ';    
                }                 
            }
            }
            }
            }
            
        
         // Validation
//        foreach ($validationadd as $keyvalidationadd => $valvalidationadd) {
//            $exkeyvalidationadd = explode("-", $keyvalidationadd);   
//            $formvalidationadd[] = '
//            $this->form_validation->set_rules(\''.$exkeyvalidationadd[0].'\', \''.$exkeyvalidationadd[0].'\', \''.implode("|", $valvalidationadd).'\');    
//            ';
//        }
        
//        print_r($formvalidationadd);
//        echo implode("\n", $formvalidationadd);
//        
//        $validationadd = '
//        $this->form_validation->set_rules(\'nama_user\', \'Nama User\', \'trim|required\');    
//        ';
//        print_r($formadd);
//        echo implode("\n", $formadd);
            
//        echo '<br/> update <br/>';
//        print_r($this->input->post('typeinputupdate')); 
//        print_r($this->input->post('autoupdate'));
//        print_r($this->input->post('fieldviewrelasiupdate')); 
//        print_r($this->input->post('validationupdate')); 
        $typeinputupdate = $this->input->post('typeinputupdate');
        $autoupdate = $this->input->post('autoupdate');
        $fieldviewrelasiupdate = $this->input->post('fieldviewrelasiupdate'); 
        $validationupdate = $this->input->post('validationupdate');
         
        foreach ($typeinputupdate  as $keytypeinputupdate  => $valtypeinputupdate ) {
           
            foreach ($autoupdate as $keyautoupdate => $valautoupdate) {
                $idpk =  $keyautoupdate;
                $exidpk = explode("-", $idpk);
//                echo $exidpk[0];
                if($keytypeinputupdate== $keyautoupdate && $valautoupdate==1){
//                    echo $valtypeinputupdate.'='.$keytypeinputupdate."<br>";
                    $extypeinputupdate = explode("-", $keytypeinputupdate);
                    $arrpostupdate[] = '\''.$extypeinputupdate[0].'\' =>$this->input->post(\''.$extypeinputupdate[0].'\')';
                   
                    foreach ($validationupdate as $keyvalidationupdate => $valvalidationupdate) {
                    $exkeyvalidationupdate = explode("-", $keyvalidationupdate); 
                    if($exkeyvalidationupdate[0]==$extypeinputupdate[0]){
                    
                    //form update
                    if($valtypeinputupdate=="text" || $valtypeinputupdate=="email" || $valtypeinputupdate="number" ){
                    $formupdate[] = '
                    <div class="form-group">
                    <label for="'.$extypeinputupdate[0].'">'.$extypeinputupdate[0].'</label>
                    <input type="'.$valtypeinputupdate.'" class="form-control" name="'.$extypeinputupdate[0].'" value="<?php echo $baris->'.$extypeinputupdate[0].'; ?>" placeholder="Enter '.$extypeinputupdate[0].'">
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputupdate[0].'\'); ?> </span>

                    ';    
                    }
                    $formvalidationupdate[] = '
                    $this->form_validation->set_rules(\''.$exkeyvalidationupdate[0].'\', \''.$exkeyvalidationupdate[0].'\', \''.implode("|", $valvalidationupdate).'\');    
                    ';
                    }}
                }elseif ($keytypeinputupdate!= $keyautoadd) {
//                    echo $valtypeinputupdate.'='.$keytypeinputupdate."<br>";
                    $extypeinputupdate = explode("-", $keytypeinputupdate);
                    $arrpostupdate[] = '\''.$extypeinputupdate[0].'\' =>$this->input->post(\''.$extypeinputupdate[0].'\')'; 
                    foreach ($validationupdate as $keyvalidationupdate => $valvalidationupdate) {
                    $exkeyvalidationupdate = explode("-", $keyvalidationupdate); 
                    if($exkeyvalidationupdate[0]==$extypeinputupdate[0]){
                    
                    //form update
                    $exvaltypeinputupdate = explode("-", $valtypeinputupdate);
                    if($valtypeinputupdate=="text" || $valtypeinputupdate=="email" || $valtypeinputupdate=="number" || $valtypeinputupdate=="url" || $valtypeinputupdate=="password"  || $valtypeinputupdate=="date" ){
                    $formupdate[] = '
                    <div class="form-group">
                          <label for="'.$extypeinputupdate[0].'">'.$extypeinputupdate[0].'</label>
                          <input type="'.$valtypeinputupdate.'" class="form-control" name="'.$extypeinputupdate[0].'" value="<?php echo $baris->'.$extypeinputupdate[0].'; ?>" placeholder="Enter '.$extypeinputupdate[0].'">
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputupdate[0].'\'); ?> </span>
                    ';    
                    }elseif ($valtypeinputupdate=="textarea") {
                    $formupdate[] = '
                    <div class="form-group">
                          <label for="'.$extypeinputupdate[0].'">'.$extypeinputupdate[0].'</label>
                          <textarea class="form-control" name="'.$extypeinputupdate[0].'" rows="3"><?php echo $baris->'.$extypeinputupdate[0].'; ?></textarea>    
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputupdate[0].'\'); ?> </span>
                    ';    
                    }elseif ($exvaltypeinputupdate[0]=="select") {
                        
                    foreach ($fieldviewrelasiupdate as $keyfieldviewrelasiupdate => $valfieldviewrelasiupdate) {
                    if($keyfieldviewrelasiupdate==$keytypeinputupdate){    
                    $formupdate[] = '
                    <div class="form-group">
                    <label for="'.$extypeinputupdate[0].'">'.$exvaltypeinputupdate[1].'</label>
                    <select class="form-control" name="'.$extypeinputupdate[0].'">
                        <option value="">Pilih '.$exvaltypeinputupdate[1].'</option>
                        <?php foreach ($'.$exvaltypeinputupdate[1].'->result() as $val'.$exvaltypeinputupdate[1].') {
                        if($baris->'.$extypeinputupdate[0].'==$val'.$exvaltypeinputupdate[1].'->'.$extypeinputupdate[0].'){
                        ?>
                        <option value="<?php echo $val'.$exvaltypeinputupdate[1].'->'.$extypeinputupdate[0].'; ?>" selected><?php echo $val'.$exvaltypeinputupdate[1].'->'.$valfieldviewrelasiupdate.'; ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $val'.$exvaltypeinputupdate[1].'->'.$extypeinputupdate[0].'; ?>"><?php echo $val'.$exvaltypeinputupdate[1].'->'.$valfieldviewrelasiupdate.'; ?></option>
                        <?php }} ?>
                    </select>
                    </div>
                    <span class="help-block"> <?php echo form_error(\''.$extypeinputupdate[0].'\'); ?> </span>     
                    ';    
                    }
                    }
                    }
                    $formvalidationupdate[] = '
                    $this->form_validation->set_rules(\''.$exkeyvalidationupdate[0].'\', \''.$exkeyvalidationupdate[0].'\', \''.implode("|", $valvalidationupdate).'\');    
                    ';
                    }}
                }
            }
        }
        
         // Validation
//        foreach ($validationupdate as $keyvalidationupdate => $valvalidationupdate) {
//            $exkeyvalidationupdate = explode("-", $keyvalidationupdate); 
//            $formvalidationupdate[] = '
//            $this->form_validation->set_rules(\''.$exkeyvalidationupdate[0].'\', \''.$exkeyvalidationupdate[0].'\', \''.implode("|", $valvalidationupdate).'\');    
//            ';
//        }
        
//          print_r($formvalidationupdate);
//        echo implode("\n", $formvalidationupdate);
          
//        print_r($formupdate);
//        echo implode("\n", $formupdate);
        
//        print_r($arrpostupdate);
//        echo implode(", \n", $arrpostupdate);  
//        print_r($arrpostadd);
//        echo implode(", \n", $arrpostadd);  
//         \'nama_user\' =>$this->input->post(\'nama_user\'),
        
//        print_r($arrkeysearchget);
//        print_r($arrsearchget);
//        echo implode("\n", $arrsearchget);
//        $nama = $this->input->get(\'nama\');
//        echo  implode(",", $arrkeysearchget);
        
        $controller = '
        <?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');

        class '.$tabelutama.'  extends CI_Controller {

            public function __construct()
            {
                parent::__construct();
                $this->load->model(\''.$tabelutama.'model\');
                $this->load->library(array(\'form_validation\', \'pagination\')); 
                $this->load->helper(\'url\');
            }

            public function index()
            { 
            
            '.implode("\n", $arrsearchget).'
            
            $per_page = abs($this->input->get(\'per_page\'));
            $limit = 5;
            $tot = $this->'.$tabelutama.'model->all('.implode(",", $arrkeysearchget).');
            $data[\''.$tabelutama.'\']   = $this->'.$tabelutama.'model->limit('.implode(",", $arrkeysearchget).', $limit, $per_page);
            '.implode("\n", $showdatatabelrelasi).'

            $pagination[\'page_query_string\']  = TRUE;    
            $pagination[\'base_url\']           = site_url().\''.$tabelutama.'?\';
            $pagination[\'total_rows\'] 	= $tot->num_rows();
            $pagination[\'per_page\']           = $limit;
            $pagination[\'uri_segment\']        = $per_page;
            $pagination[\'num_links\']          = 2;


            $pagination[\'full_tag_open\'] = \'<ul class="pagination">\';
            $pagination[\'full_tag_close\'] = \'</ul>\';

            $pagination[\'first_link\'] = \'<<\';
            $pagination[\'first_tag_open\'] = \'<li class="prev page">\';
            $pagination[\'first_tag_close\'] = \'</li>\';

            $pagination[\'last_link\'] = \'>>\';
            $pagination[\'last_tag_open\'] = \'<li class="next page">\';
            $pagination[\'last_tag_close\'] = \'</li>\';

            $pagination[\'next_link\'] = \'>\';
            $pagination[\'next_tag_open\'] = \'<li class="next page">\';
            $pagination[\'next_tag_close\'] = \'</li>\';

            $pagination[\'prev_link\'] = \'<\';
            $pagination[\'prev_tag_open\'] = \'<li class="prev page">\';
            $pagination[\'prev_tag_close\'] = \'</li>\';

            $pagination[\'cur_tag_open\'] = \'<li class="active"><a href="">\';
            $pagination[\'cur_tag_close\'] = \'</a></li>\';

            $pagination[\'num_tag_open\'] = \'<li class="page">\';
            $pagination[\'num_tag_close\'] = \'</li>\';

            $this->pagination->initialize($pagination);    
            $data[\'isi\'] = \'list\';
            $this->load->view(\'tpl\',$data); 
            }

            public function add()
            {
            '.implode("\n", $formvalidationadd).'
            $this->form_validation->set_error_delimiters(\'<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>\', \'</div>\');
            if ($this->form_validation->run() == FALSE)
            {
            '.implode("\n", $showdatatabelrelasi).'
            $data[\'isi\'] = \'add\';
            $this->load->view(\'tpl\',$data);
            }else{
            $data = array(
            '.implode(", \n", $arrpostadd).'
            );
            $this->'.$tabelutama.'model->add($data);
            redirect(\''.$tabelutama.'\');
            }     
            }

            public function update()
            {
            $id = $this->uri->segment(3);
            $user = $this->'.$tabelutama.'model->'.$tabelutama.'byid($id)->row();
            if ($id==$user->'.$exidpk[0].' && $id!="") {

            '.implode("\n", $formvalidationupdate).'
            
            $this->form_validation->set_error_delimiters(\'<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>\', \'</div>\');
            if ($this->form_validation->run() == FALSE)
            {
            '.implode("\n", $showdatatabelrelasi).'
            $data[\''.$tabelutama.'\'] = $this->'.$tabelutama.'model->'.$tabelutama.'byid($id);

            $data[\'isi\'] = \'update\';
            $this->load->view(\'tpl\',$data);
            }else{
            $data = array(
            '.implode(", \n", $arrpostupdate).'    
            );
            $this->'.$tabelutama.'model->update($id,$data);
            redirect(\''.$tabelutama.'\');
            }     
            }else{
            redirect(\''.$tabelutama.'\');
            }
            }

            public function delete(){
            $id = $this->uri->segment(3);
            $'.$tabelutama.' = $this->'.$tabelutama.'model->'.$tabelutama.'byid($id)->row();
            if($id==$'.$tabelutama.'->'.$exidpk[0].' && $id!=""){
            $this->'.$tabelutama.'model->delete($id);    
            redirect(\''.$tabelutama.'\');
            }}
        }    
        ';
        
         
        
         
        $model = '
        <?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');

        class '.$tabelutama.'model extends CI_Model {

            public function __construct() {
                parent::__construct();
                $this->load->database();
            }

            function all('.implode(",", $arrkeysearchget).') {
            $this->db->select(\'*\');
            $this->db->from(\''.$tabelutama.'\');
            '.implode("\n", $modeljoin).'
            '.implode("\n", $arrsearchmodel).'
            return  $this->db->get();
            }

            function limit('.implode(",", $arrkeysearchget).',$limit,$per_page) {
            $this->db->select(\'*\');
            $this->db->from(\''.$tabelutama.'\');
            '.implode("\n", $modeljoin).'
            '.implode("\n", $arrsearchmodel).'
            $this->db->limit($limit,$per_page);
            return  $this->db->get();
            }

            function '.$tabelutama.'byid($id)
            {
            $this->db->where(\''.$exidpk[0].'\',$id);
            return $this->db->get(\''.$tabelutama.'\');
            }

            function add($data)
            {
            $this->db->insert(\''.$tabelutama.'\',$data);
            }

            function update($id,$data)
            {
            $this->db->where(\''.$exidpk[0].'\',$id);
            $this->db->update(\''.$tabelutama.'\',$data);
            }

            function delete($id)
            {
            $this->db->where(\''.$exidpk[0].'\',$id);
            $this->db->delete(\''.$tabelutama.'\');
            }

            '.implode("\n", $tabeljoins).'
        }        
        ';
        
               
        //view
        $list='
        <div class="panel panel-default">
        <div class="panel-heading">List</div>

        <table id="myTable" class="table table-striped table-hover tablesorter" cellspacing="0"> 
                      <?php 
                      $per_page = abs($this->input->get(\'per_page\'));
                      $no = $per_page + 1;
                      if(count($'.$tabelutama.'->result()) > 0) {
                      ?> 
                      <thead> 
                      <form name="cari" action="<?php echo site_url() ?>'.$tabelutama.'" method="GET">
                          <tr>
                              <th width="33"><div align="center">#</div></th> 
                              '.implode("\n", $listsearch).'
                              <th width="160" colspan="2">
                                  <div class="btn-group">
                                      <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                      <a href="<?php echo site_url() ?>'.$tabelutama.'" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></a>
                                      <a href="<?php echo site_url() ?>'.$tabelutama.'/add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></a>
                                  </div>
                              </th> 
                          </tr>
                      </form> 
                      </thead>
                      <thead> 
                          <tr>
                              <th width="33"><div align="center">No</div></th> 
                              '.  implode("\n", $tabelheadername).'
                              <th colspan="2"><div align="center">Aksi</div></th> 
                          </tr>
                      </thead> 
                      <tbody> 
                          <?php
                          foreach($'.$tabelutama.'->result() as $baris){
                          ?>
                          <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>           
                            '.  implode("\n", $tabelcontent).'
                            <td width="80"><a href="<?php echo site_url() ?>'.$tabelutama.'/update/<?php echo $baris->'.$exidpk[0].';?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td width="80"><a href="<?php echo site_url() ?>'.$tabelutama.'/delete/<?php echo $baris->'.$exidpk[0].';?>" class="btn btn-danger" onClick=\'return confirm("Anda yakin ingin menghapus data ini?")\'><span class="glyphicon glyphicon-trash"></span></a></td>
                          </tr> 
                          <?php
                          $no++;
                          }
                          ?>
                      </tbody> 
                      <tfoot>
                          <tr>
                              <td colspan="6">
                              <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
                              </td>
                              <?php
                              } else {
                              ?>
                              <table id="myTable" class="table table-striped table-hover tablesorter" cellspacing="0"> 
                              <thead> 
                              <form name="cari" action="<?php echo site_url() ?>'.$tabelutama.'" method="GET">
                                  <tr>
                                      <th width="33"><div align="center">#</div></th> 
                                      '.implode("\n", $listsearch).'
                                      <th width="160" colspan="2">
                                          <div class="btn-group">
                                            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                            <a href="<?php echo site_url() ?>'.$tabelutama.'" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></a>
                                            <a href="<?php echo site_url() ?>'.$tabelutama.'/add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></a>
                                         </div>
                                      </th> 
                              </tr>
                              </form> 
                              </thead>
                              <thead> 
                                  <tr>
                                      <th width="33"><div align="center">No</div></th> 
                                      '.  implode("\n", $tabelheadername).'
                                      <th colspan="2"><div align="center">Aksi</div></th> 
                                  </tr>
                              </thead> 
                              <tbody> 
                              <td colspan="6">
                                Data Tidak Tersedia
                              </td>    
                              </tbody>
                              </table>    
                              <?php
                              }
                              ?>
                           </tr>
                      </tfoot>
        </table>
        </div>      
        ';
        
        
        $add = '
        <div class="panel panel-default">
        <div class="panel-heading">Add</div>
        <form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>'.$tabelutama.'/add">
              '.implode("\n", $formadd).'  
              <button type="submit" class="btn btn-default">Save</button>
        </form>
        </div>    
        ';
        
        $update = '
        <?php 
        $baris = $'.$tabelutama.'->row();
        ?>
        <div class="panel panel-default">
        <div class="panel-heading">Update</div>
        <form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>'.$tabelutama.'/update/<?php echo $baris->'.$exidpk[0].'; ?>">
                '.implode("\n", $formupdate).'
                <button type="submit" class="btn btn-default">Save</button>
        </form>
        </div>      
        ';
        
        $options = $this->input->post('options');
        if($options==0){
        $filecontroller = 'tes/crud/application/controllers/'.$tabelutama.'.php';
        write_file($filecontroller, $controller);
         
        $filemodel = 'tes/crud/application/models/'.$tabelutama.'model.php';
        write_file($filemodel, $model);
        
        $filelist = 'tes/crud/application/views/list.php';
        write_file($filelist, $list);
        
        $fileadd = 'tes/crud/application/views/add.php';
        write_file($fileadd, $add);
        
        $fileupdate = 'tes/crud/application/views/update.php';
        write_file($fileupdate, $update);
        
        }else{
        $filecontroller = 'tes/controllers/'.$tabelutama.'.php';
        write_file($filecontroller, $controller);
         
        $filemodel = 'tes/models/'.$tabelutama.'model.php';
        write_file($filemodel, $model);
        
        $filelist = 'tes/views/list.php';
        write_file($filelist, $list);
        
        $fileadd = 'tes/views/add.php';
        write_file($fileadd, $add);
        
        $fileupdate = 'tes/views/update.php';
        write_file($fileupdate, $update);    
        }
    }
    
}