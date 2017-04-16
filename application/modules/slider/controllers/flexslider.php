<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class flexslider extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
       
//        $cls = $this->router->fetch_class();
//        $mtd = $this->router->fetch_method();
//        $usergroup = $this->session->userdata('id_usergroup');
//        $check = $this->antauth->check($usergroup,$cls,$mtd);
//        if($check == false){
//           redirect('login');
//        }
       
    }

    public function index()
    { 
    $data['isi'] = 'slider/flexslider/basic';
    $this->load->view('tpldefault',$data); 
    }
    
    public function thumbnail_controlnav()
    { 
    $data['isi'] = 'slider/flexslider/thumbnail_controlnav';
    $this->load->view('tpldefault',$data); 
    }
  
    public function carousel_minmax()
    { 
    $data['isi'] = 'slider/flexslider/carousel_minmax';
    $this->load->view('tpldefault',$data); 
    }
}