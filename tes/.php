
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  extends CI_Controller {

public function __construct()
{
parent::__construct();
$this->load->model('model');
}

public function index()
{  

$key = $this->input->get('q');
$per_page = abs($this->input->get('per_page'));
$limit = 5;

$tot = $this->model->semuadata($key);
$data['biodata']   = $this->model->datalimit($key, $limit, $per_page);
$pagination['page_query_string'] = TRUE;    
$pagination['base_url'] 	= site_url().'/index?q='.$key;
$pagination['total_rows'] 	= $tot->num_rows();
$pagination['per_page'] 	= $limit;
$pagination['uri_segment']      = $per_page;
$pagination['num_links'] 	= 2;


$pagination['full_tag_open'] = '<div class="pagination"><ul>';
$pagination['full_tag_close'] = '</ul></div>';

$pagination['first_link'] = 'Awal';
$pagination['first_tag_open'] = '<li class="prev page">';
$pagination['first_tag_close'] = '</li>';

$pagination['last_link'] = 'Akhir';
$pagination['last_tag_open'] = '<li class="next page">';
$pagination['last_tag_close'] = '</li>';

$pagination['next_link'] = 'Selanjutnya';
$pagination['next_tag_open'] = '<li class="next page">';
$pagination['next_tag_close'] = '</li>';

$pagination['prev_link'] = 'Sebelumnya';
$pagination['prev_tag_open'] = '<li class="prev page">';
$pagination['prev_tag_close'] = '</li>';

$pagination['cur_tag_open'] = '<li class="active"><a href="">';
$pagination['cur_tag_close'] = '</a></li>';

$pagination['num_tag_open'] = '<li class="page">';
$pagination['num_tag_close'] = '</li>';

$this->pagination->initialize($pagination);

//    $data['isi'] = '/list_';
$this->load->view('list_',$data);	
}

public function tambah(){
 $this->form_validation->set_rules('', '', 'trim|required');
$this->form_validation->set_error_delimiters('<div class="alert alert-error input-large"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
if ($this->form_validation->run() == FALSE)
{
//        $data['isi']='/tambah';
$this->load->view('/add',$data);
}else{
$data = array(
 '' =>$this->input->post('')
);
$this->model->tambahdata($data);
redirect('');
} 
}

public function ubah(){
$id = $this->uri->segment(3);
$ = $this->model->datamenurutid($id)->row();
if ($id==$-> && $id!="") {
 $this->form_validation->set_rules('', '', 'trim|required');
$this->form_validation->set_error_delimiters('<div class="alert alert-error input-large"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
if ($this->form_validation->run() == FALSE)
{   
$data['biodata'] = $this->model->datamenurutid($id);
$data['isi']='/ubah';
$this->load->view('tplcrud',$data);
}else{
$data = array(
 '' =>$this->input->post('')
);
$this->model->ubahdata($id,$data);
redirect('');
}
}else{
redirect('');    
}     
}

public function hapus(){
$id = $this->uri->segment(3);
$ = $this->model->datamenurutid($id)->row();
if($id==$-> && $id!=""){
$this->model->hapusdata($id);    
}
redirect('');
}

}
        