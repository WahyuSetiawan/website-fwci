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
    $data['isi'] = 'generator/tabelinduk';
    $this->load->view('tpldefault',$data); 
    }
    
    public function tabelinduk()
    { 
        $data['tabelinduk'] = $this->input->post('tabelinduk');
        $data['jumlahfieldinduk'] = $this->input->post('jumlahfieldinduk');
        $data['jumlahtabelrelasi'] =  $this->input->post('jumlahtabelrelasi');
        $data['isi'] = 'generator/tabelanak';
        $this->load->view('tpldefault',$data); 
    }
    
    public function crud()
    {
//    $data['tabelinduk'] = $this->input->post('tabelinduk');
//    echo $data['tabelinduk'];
//    echo '<hr>';
//    $data['fieldinduk'] = $this->input->post('fieldinduk');
//    print_r($data['fieldinduk']);
//    $data['typefieldinduk'] = $this->input->post('typefieldinduk');
//    print_r($data['typefieldinduk']);
//    $data['typeinputinduk'] = $this->input->post('typeinputinduk');
//    print_r($data['typeinputinduk']);
//    foreach ($data['fieldinduk'] as $key => $value) {
//       $arrGabung[] =  $value.'-'. $data['typefieldinduk'][$key]; 
//    }
//    $data['gabung'] =  $arrGabung;
    
    $newdata = array(
                   'tabelinduk'  => $this->input->post('tabelinduk'),
                   'fieldinduk'     => $this->input->post('fieldinduk'),
                   'typefieldinduk'     => $this->input->post('typefieldinduk')
               );
    $this->session->set_userdata($newdata);
    
    $data['tabelanak'] = $this->input->post('tabelanak');
//    print_r($data['tabelanak']);
    $data['jumlahfieldanak'] = $this->input->post('jumlahfieldanak');
//    print_r($data['jumlahfieldanak']);
    $data['isi'] = 'generator/crud';
    $this->load->view('tpldefault',$data);
    }
    
    public function crudhasil()
    {
//    $data['tabelinduk'] = $this->input->post('tabelinduk');
//    echo $data['tabelinduk'];    
//    $data['fieldinduk'] = $this->input->post('fieldinduk');
//    echo $data['fieldinduk'];    
//    print_r($data['fieldinduk']);
    
    $data['tabelrelasi'] = $this->input->post('tabelrelasi');
    print_r($data['tabelrelasi']);      
    $data['fieldanak'] = $this->input->post('fieldanak');
    print_r($data['fieldanak']);  
    $data['typefieldanak'] = $this->input->post('typefieldanak');
    print_r($data['typefieldanak']);
    echo '<br>';
                
    foreach ($data['tabelrelasi'] as $keyRelasi => $valRelasi) {
        echo 'Tabel Relasi : '.$valRelasi.'<br>';
        foreach ($data['fieldanak'] as $keyFieldAnak => $valFieldAnak) {
            $exkeyFieldAnak = explode("-", $keyFieldAnak);
            if($exkeyFieldAnak[0]== $keyRelasi){
                echo $valFieldAnak."-";
                echo $data['typefieldanak'][$keyFieldAnak]."<br>";
            }
        }
    }
    echo '<hr>';
    echo '<h1>View</h1>';
    echo '<br>';
    echo '<strong>Tabel Induk : '.$this->session->userdata('tabelinduk').'</strong><br>';
//    print_r($this->session->userdata('fieldinduk'));
//    print_r($this->session->userdata('typefieldinduk'));
    echo '<br>';
    $fieldinduk = $this->session->userdata('fieldinduk');
    $typefieldinduk = $this->session->userdata('typefieldinduk');
    foreach ($fieldinduk as $keyFieldInduk => $valueFieldInduk) {
        if($typefieldinduk[$keyFieldInduk]=="PK"){
         echo $valueFieldInduk.'-'.$typefieldinduk[$keyFieldInduk]."<br>";    
        }elseif ($typefieldinduk[$keyFieldInduk]=="FK") {
         echo $valueFieldInduk.'-'.$typefieldinduk[$keyFieldInduk]."<br>";   
         
        }elseif ($typefieldinduk[$keyFieldInduk]!="PK" || $typefieldinduk[$keyFieldInduk]!="FK") {
         echo $valueFieldInduk."<br>";        
        }
    }
    
    foreach ($data['tabelrelasi'] as $keyRelasi => $valRelasi) {
        echo '<strong>Tabel Relasi : '.$valRelasi.'</strong><br>';
        foreach ($data['fieldanak'] as $keyFieldAnak => $valFieldAnak) {
            $exkeyFieldAnak = explode("-", $keyFieldAnak);
            if($exkeyFieldAnak[0]== $keyRelasi){
                echo $valFieldAnak."-";
                echo $data['typefieldanak'][$keyFieldAnak]."<br>";
            }
        }
    }
//    foreach ($this->session->userdata('gabung') as $key => $value) {
//        echo $value;
//    }
    
    }
    
    public function tes()
    {
    $data['tabelinduk'] = $this->input->post('tabelinduk');
    echo $data['tabelinduk'];
    echo '<hr>';
    $data['fieldinduk'] = $this->input->post('fieldinduk');
    print_r($data['fieldinduk']);
    $data['typefieldinduk'] = $this->input->post('typefieldinduk');
    print_r($data['typefieldinduk']);
    $data['typeinputinduk'] = $this->input->post('typeinputinduk');
    print_r($data['typeinputinduk']);
    $data['tabelanak'] = $this->input->post('tabelanak');
    print_r($data['tabelanak']);
    $data['jumlahfieldanak'] = $this->input->post('jumlahfieldanak');
    print_r($data['jumlahfieldanak']);
    }
    
    public function hasil()
    { 
        $tabelinduk = $this->input->post('tabelinduk');
        $fieldinduk = $this->input->post('fieldinduk');
        $tabelanak =  $this->input->post('tabelanak');
        $fieldanak =  $this->input->post('fieldanak');
        
//        echo $tabelinduk."<br/>";
//        echo $fieldinduk."<br/>";
//        echo "<br/>";
//        print_r($tabelanak);
//        echo "<br/>";
//        print_r($fieldanak);
        $exfeldinduk = explode("|", $fieldinduk);
        foreach ($exfeldinduk as $value) {
            $arrV[] = $value; 
        }
        foreach ($arrV as $value) {
            if (preg_match("/-/i", $value)) {
               $exArrV = explode("-", $value);
               $arrexArrV[] = $exArrV[0];
               if($exArrV[1]=="PK"){
                   $idpk = $exArrV[0];
               }
            } else {
              $arrexArrV[] = $value;
            }
        }
//        print_r($arrexArrV);
        
        foreach ($arrexArrV as $key => $value) {
            $arrth[] =   '<th><div align="left">'.ucfirst($value).'</div></th>';
            $arrtd[] =   '<td> <?php echo $baris->'.$value.';?> </td>';
            $arradd[] = ' \''.$value.'\' =>$this->input->post(\''.$value.'\')';
            $arrvalid[] = ' $this->form_validation->set_rules(\''.$value.'\', \''.ucfirst($value).'\', \'trim|required\');';
            if($key==0){
            $arrlike[] = '$this->db->like(\''.$value.'\',$key); ';
            }else{
            $arrlike[] = '$this->db->or_like(\''.$value.'\',$key); ';    
            }
            
            $typetext = '
            <div class="control-group">
            <label for="textfield" class="control-label">Nama</label>
            <div class="controls">
            <input type="text" name="nama" id="textfield" class="input-xlarge" data-rule-required="true" placeholder="Nama Anda">
            </div>
            </div>
            <span class="help-block"> <?php echo form_error(\'nama\'); ?> </span>
            ';
            
            $typetextarea = '
            <div class="control-group">
            <label for="textfield" class="control-label">Alamat</label>
            <div class="controls">
                <textarea type="text" name="alamat" rows="3" class="input-xlarge" placeholder="Alamat Anda"></textarea>
            </div>
            </div>
            <span class="help-block"> </span>
            ';
            
            $typeselect = '
            <div class="control-group">
            <label for="textfield" class="control-label">Alamat</label>
            <div class="controls">
                <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>    
            </div>
            </div>
            <span class="help-block"> </span>
            ';
            
            }
        echo implode("\n", $arrlike);
//        echo implode("\n", $arrorlike);
//        print_r($arrth);
        print_r($arrtd);
//        echo implode("", $arrth);
                echo implode("", $arrtd);
        $view = 'list_'.$tabelinduk;
        $controller = $tabelinduk;
        $model = $tabelinduk.'model';     
        
        $file = 'tes/'.$view.'.php';
         $isi = '
    <table id="myTable" class="table table-striped table-hover tablesorter" cellspacing="0"> 
                <?php 
                $per_page = abs($this->input->get("per_page"));
                $no = $per_page + 1;
                if(count($'.ucfirst($tabelinduk).'->result()) > 0) {
                ?> 
                <thead> 
                    <tr>
                        <th width="33"><div align="center">No</div></th> 
                        '.implode("\n", $arrth).'
                        <th colspan="2"><div align="center">Aksi</div></th>
                    </tr>
                </thead> 
                <tbody> 
                    <?php
                    foreach($'.ucfirst($tabelinduk).'->result() as $baris){
                    ?>
                    <tr>
                      <td>
                          <?php echo $no; ?>
                      </td>
                      '.implode("\n", $arrtd).'
                      <td>
                          <?php echo $baris->nama;?>
                      </td>
                      <td width="90"><a href="<?php echo site_url() ?>'.$tabelinduk.'/ubah/<?php echo $baris->'.$idpk.';?>" class="btn btn-primary"><i class="icon-edit icon-white"></i> Ubah</a></td>
                      <td width="90"><a href="<?php echo site_url() ?>'.$tabelinduk.'/hapus/<?php echo $baris->'.$idpk.';?>" class="btn btn-danger" onClick="return confirm(\'Anda yakin ingin menghapus data ini?\')"><i class="icon-remove icon-white"></i> Hapus</a></td>
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
                        echo "<div class=\'alert alert-error\'> Data Tidak Tersedia </div>";
                        }
                        ?>
                     </tr>
                </tfoot>
            </table>    
    ';
        write_file($file, $isi);
        
        //controller
        $filecontroller = 'tes/'.$controller.'.php';
        $isicontroller ='
<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');

class '.$tabelinduk.' extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->model(\''.$model.'\');
}

public function index()
{  

$key = $this->input->get(\'q\');
$per_page = abs($this->input->get(\'per_page\'));
$limit = 5;

$tot = $this->'.$model.'->semuadata($key);
$data[\'biodata\']   = $this->'.$model.'->datalimit($key, $limit, $per_page);
$pagination[\'page_query_string\'] = TRUE;    
$pagination[\'base_url\'] 	= site_url().\''.$tabelinduk.'/index?q=\'.$key;
$pagination[\'total_rows\'] 	= $tot->num_rows();
$pagination[\'per_page\'] 	= $limit;
$pagination[\'uri_segment\']      = $per_page;
$pagination[\'num_links\'] 	= 2;


$pagination[\'full_tag_open\'] = \'<div class="pagination"><ul>\';
$pagination[\'full_tag_close\'] = \'</ul></div>\';

$pagination[\'first_link\'] = \'Awal\';
$pagination[\'first_tag_open\'] = \'<li class="prev page">\';
$pagination[\'first_tag_close\'] = \'</li>\';

$pagination[\'last_link\'] = \'Akhir\';
$pagination[\'last_tag_open\'] = \'<li class="next page">\';
$pagination[\'last_tag_close\'] = \'</li>\';

$pagination[\'next_link\'] = \'Selanjutnya\';
$pagination[\'next_tag_open\'] = \'<li class="next page">\';
$pagination[\'next_tag_close\'] = \'</li>\';

$pagination[\'prev_link\'] = \'Sebelumnya\';
$pagination[\'prev_tag_open\'] = \'<li class="prev page">\';
$pagination[\'prev_tag_close\'] = \'</li>\';

$pagination[\'cur_tag_open\'] = \'<li class="active"><a href="">\';
$pagination[\'cur_tag_close\'] = \'</a></li>\';

$pagination[\'num_tag_open\'] = \'<li class="page">\';
$pagination[\'num_tag_close\'] = \'</li>\';

$this->pagination->initialize($pagination);

//    $data[\'isi\'] = \''.$tabelinduk.'/'.$view.'\';
$this->load->view(\''.$view.'\',$data);	
}

public function tambah(){
'. implode("\n", $arrvalid).'
$this->form_validation->set_error_delimiters(\'<div class="alert alert-error input-large"> <button type="button" class="close" data-dismiss="alert">&times;</button>\', \'</div>\');
if ($this->form_validation->run() == FALSE)
{
//        $data[\'isi\']=\''.$tabelinduk.'/tambah\';
$this->load->view(\''.$tabelinduk.'/add\',$data);
}else{
$data = array(
'.implode(", \n", $arradd).'
);
$this->'.$model.'->tambahdata($data);
redirect(\''.$tabelinduk.'\');
} 
}

public function ubah(){
$id = $this->uri->segment(3);
$'.ucfirst($tabelinduk).' = $this->'.$model.'->datamenurutid($id)->row();
if ($id==$'.ucfirst($tabelinduk).'->'.$idpk.' && $id!="") {
'. implode("\n", $arrvalid).'
$this->form_validation->set_error_delimiters(\'<div class="alert alert-error input-large"> <button type="button" class="close" data-dismiss="alert">&times;</button>\', \'</div>\');
if ($this->form_validation->run() == FALSE)
{   
$data[\'biodata\'] = $this->'.$model.'->datamenurutid($id);
$data[\'isi\']=\''.$tabelinduk.'/ubah\';
$this->load->view(\'tplcrud\',$data);
}else{
$data = array(
'.implode(", \n", $arradd).'
);
$this->'.$model.'->ubahdata($id,$data);
redirect(\''.$tabelinduk.'\');
}
}else{
redirect(\''.$tabelinduk.'\');    
}     
}

public function hapus(){
$id = $this->uri->segment(3);
$'.ucfirst($tabelinduk).' = $this->'.$model.'->datamenurutid($id)->row();
if($id==$'.ucfirst($tabelinduk).'->'.$idpk.' && $id!=""){
$this->'.$model.'->hapusdata($id);    
}
redirect(\''.$tabelinduk.'\');
}

}
        ';
        write_file($filecontroller, $isicontroller);
   //Model     
 $filemodel = 'tes/'.$model.'.php';       
 $isimodel = '
<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');

class '.$model.' extends CI_Model {

public function __construct() {
parent::__construct();

}

function semuadata($key) {
$this->db->select(\''.$idpk.'\');
$this->db->from(\''.$tabelinduk.'\');
if($key!=""){
'.implode("\n", $arrlike).'
}
return  $this->db->get();
}

function datalimit($key,$limit,$per_page) {
$this->db->select(\'*\');
$this->db->from(\'biodata\');
if($key!=""){
'.implode("\n", $arrlike).'   
}
$this->db->limit($limit,$per_page);
return  $this->db->get();
}

function tambahdata($data)
{
$this->db->insert(\''.$tabelinduk.'\',$data);
}

function datamenurutid($id)
{
$this->db->where(\''.$idpk.'\',$id);
return $this->db->get(\''.$tabelinduk.'\');
}

function ubahdata($id,$data)
{
$this->db->where(\''.$idpk.'\',$id);
$this->db->update(\''.$tabelinduk.'\',$data);
}

function hapusdata($id)
{
$this->db->where(\''.$idpk.'\',$id);
$this->db->delete(\''.$tabelinduk.'\');
}

function hapusdatas($chk)
{
$this->db->where_in(\''.$idpk.'\',$chk);
$this->db->delete(\''.$tabelinduk.'\');
}
}         
';       
write_file($filemodel, $isimodel);   

 //Form Add
 $fileadd = 'tes/add.php';       
 $isiadd = '
 <form action="<?php echo site_url(); ?>'.$tabelinduk.'/add" method="POST" class="form-validate" id="validasi">
  <fieldset>
    <legend>Tambah Data</legend>
    
    <div class="control-group">
        <label for="textfield" class="control-label">Nama</label>
        <div class="controls">
            <input type="text" name="nama" id="textfield" class="input-xlarge" data-rule-required="true" placeholder="Nama Anda">
        </div>
    </div>
    <span class="help-block"> <?php echo form_error(\'nama\'); ?> </span>
    
    <div class="control-group">
        <label for="textfield" class="control-label">Alamat</label>
        <div class="controls">
            <textarea type="text" name="alamat" rows="3" class="input-xlarge" placeholder="Alamat Anda"></textarea>
        </div>
    </div>
    <span class="help-block"> </span>
    
    <button type="submit" class="btn" >Simpan</button>
  </fieldset>
</form>    
';
 
 write_file($fileadd, $isiadd);   
    }
    

}