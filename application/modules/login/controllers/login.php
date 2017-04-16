<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    { 
    $this->login();
    }

    public function login(){
    if($this->antauth->is_logged_in() == false){
        
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      $this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
 
    if ($this->form_validation->run() == FALSE){
    $this->load->view('login/login'); 
    }else{
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $success = $this->antauth->do_login($username,$password);
    if($success){
        redirect('user');
        }else{
          $data['login_info'] = "Maaf, username dan password salah!";
          $this->load->view('login/login',$data); 
        }
        }
    }else{
      redirect('user');
    }
    }
      
      function Logout()
      {
        if($this->antauth->is_logged_in() == true)
        {
		// jika dia memang sudah login, destroy session
		$this->antauth->do_logout();
	}
	// larikan ke halaman utama
	redirect('login');
      }
}