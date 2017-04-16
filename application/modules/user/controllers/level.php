<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class level  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('usermodel');
    }

    public function index()
    { 
        $this->load->view('utama2/tpldefault'); 
    }

   
}