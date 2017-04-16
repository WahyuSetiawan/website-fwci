<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafik  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $usergroup = $this->session->userdata('id_usergroup');
        $cls = $this->router->fetch_class();
        $mtd = $this->router->fetch_method();
        $this->antauth->check($usergroup,$cls,$mtd);
    }

    public function index()
    { 
    $data['isi'] = 'grafik/line';
    $this->load->view('tpldefault',$data); 
    }

    public function area()
    { 
    $data['isi'] = 'grafik/area';
    $this->load->view('tpldefault',$data); 
    }
    
    public function bar()
    { 
    $data['isi'] = 'grafik/bar';
    $this->load->view('tpldefault',$data); 
    }
    
    public function pie()
    { 
    $data['isi'] = 'grafik/pie';
    $this->load->view('tpldefault',$data); 
    }
   
    public function combination()
    { 
    $data['isi'] = 'grafik/combination';
    $this->load->view('tpldefault',$data); 
    }
}