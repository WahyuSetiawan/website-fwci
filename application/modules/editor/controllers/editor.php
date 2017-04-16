<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class editor  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    { 
    $data['isi'] = 'editor/tinymce/tinymce';
    $this->load->view('tpldefault',$data); 
    }
    
     public function ckeditor()
    { 
    $data['isi'] = 'editor/ckeditor/ckeditor';
    $this->load->view('tpldefault',$data); 
    }

    
   
    
}