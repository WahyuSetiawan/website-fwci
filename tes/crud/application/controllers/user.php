
        <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class user  extends CI_Controller {

            public function __construct()
            {
                parent::__construct();
                $this->load->model('usermodel');
                $this->load->library(array('form_validation', 'pagination')); 
                $this->load->helper('url');
            }

            public function index()
            { 
            
            $nama_user = $this->input->get('nama_user');
$usergroup = $this->input->get('usergroup');
            
            $per_page = abs($this->input->get('per_page'));
            $limit = 5;
            $tot = $this->usermodel->all($nama_user,$usergroup);
            $data['user']   = $this->usermodel->limit($nama_user,$usergroup, $limit, $per_page);
            
            $data['usergroup']   = $this->usermodel->usergroup();
            

            $pagination['page_query_string']  = TRUE;    
            $pagination['base_url']           = site_url().'user?';
            $pagination['total_rows'] 	= $tot->num_rows();
            $pagination['per_page']           = $limit;
            $pagination['uri_segment']        = $per_page;
            $pagination['num_links']          = 2;


            $pagination['full_tag_open'] = '<ul class="pagination">';
            $pagination['full_tag_close'] = '</ul>';

            $pagination['first_link'] = '<<';
            $pagination['first_tag_open'] = '<li class="prev page">';
            $pagination['first_tag_close'] = '</li>';

            $pagination['last_link'] = '>>';
            $pagination['last_tag_open'] = '<li class="next page">';
            $pagination['last_tag_close'] = '</li>';

            $pagination['next_link'] = '>';
            $pagination['next_tag_open'] = '<li class="next page">';
            $pagination['next_tag_close'] = '</li>';

            $pagination['prev_link'] = '<';
            $pagination['prev_tag_open'] = '<li class="prev page">';
            $pagination['prev_tag_close'] = '</li>';

            $pagination['cur_tag_open'] = '<li class="active"><a href="">';
            $pagination['cur_tag_close'] = '</a></li>';

            $pagination['num_tag_open'] = '<li class="page">';
            $pagination['num_tag_close'] = '</li>';

            $this->pagination->initialize($pagination);    
            $data['isi'] = 'list';
            $this->load->view('tpl',$data); 
            }

            public function add()
            {
            
                $this->form_validation->set_rules('nama_user', 'nama_user', 'required');    
                

                $this->form_validation->set_rules('id_usergroup', 'id_usergroup', 'required');    
                
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
            if ($this->form_validation->run() == FALSE)
            {
            
            $data['usergroup']   = $this->usermodel->usergroup();
            
            $data['isi'] = 'add';
            $this->load->view('tpl',$data);
            }else{
            $data = array(
            'nama_user' =>$this->input->post('nama_user'), 
'id_usergroup' =>$this->input->post('id_usergroup')
            );
            $this->usermodel->add($data);
            redirect('user');
            }     
            }

            public function update()
            {
            $id = $this->uri->segment(3);
            $user = $this->usermodel->userbyid($id)->row();
            if ($id==$user->id_user && $id!="") {

            
                    $this->form_validation->set_rules('nama_user', 'nama_user', 'required');    
                    

                    $this->form_validation->set_rules('id_usergroup', 'id_usergroup', 'required');    
                    
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
            if ($this->form_validation->run() == FALSE)
            {
            
            $data['usergroup']   = $this->usermodel->usergroup();
            
            $data['user'] = $this->usermodel->userbyid($id);

            $data['isi'] = 'update';
            $this->load->view('tpl',$data);
            }else{
            $data = array(
            'nama_user' =>$this->input->post('nama_user'), 
'id_usergroup' =>$this->input->post('id_usergroup')    
            );
            $this->usermodel->update($id,$data);
            redirect('user');
            }     
            }else{
            redirect('user');
            }
            }

            public function delete(){
            $id = $this->uri->segment(3);
            $user = $this->usermodel->userbyid($id)->row();
            if($id==$user->id_user && $id!=""){
            $this->usermodel->delete($id);    
            redirect('user');
            }}
        }    
        