<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class googlemap  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
//        $usergroup = $this->session->userdata('id_usergroup');
//        $cls = $this->router->fetch_class();
//        $mtd = $this->router->fetch_method();
//        $this->antauth->check($usergroup,$cls,$mtd);
    }

    public function index()
    {
    $this->load->library('googlemaps');

    $config['center'] = '-7.571469,112.348024';
    $config['zoom'] = '16';
    $this->googlemaps->initialize($config);

    $marker = array();
    $marker['position'] = '-7.571469,112.348024';
    $this->googlemaps->add_marker($marker);
    $data['map'] = $this->googlemaps->create_map();     
    $data['isi'] = 'googlemap/basic';
    $this->load->view('tpldefault',$data); 

    }
   
}